<?php

namespace App\Http\Controllers;

use App\Models\ThongBao;
use App\Repositories\NoiDungThongBaoRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Jobs\JobGuiThongBao;
use App\Jobs\JobGuiThongBaoDiemDanhVe;
use App\Repositories\GiaoVien\GiaoVienRepository;
use App\Repositories\NotificationRepository;
use App\Models\Notification;
use App\Models\NoiDungThongBao;
use App\Models\HocSinh;

class ThongBaoController extends Controller
{
    protected $NoiDungThongBaoRepository;
    protected $NotificationRepository;
    protected $GiaoVienRepository;
    public function __construct(
        GiaoVienRepository $GiaoVienRepository,
        NoiDungThongBaoRepository $NoiDungThongBaoRepository,
        NotificationRepository $NotificationRepository

    ) {
        $this->GiaoVienRepository = $GiaoVienRepository;
        $this->NoiDungThongBaoRepository = $NoiDungThongBaoRepository;
        $this->NotificationRepository = $NotificationRepository;
    }

    public function index()
    {
        $data = ThongBao::where('type', 1)
                        ->where(function($query){
                                $query->whereIn('user_id', [0, Auth::id()]);
                        })
                        ->orderBy('id', 'desc')
                        ->paginate(config('common.paginate_size.default'));
        return view('thong-bao.index', compact('data'));
    }

    public function showThongBao($id)
    {
        $data = $this->NoiDungThongBaoRepository->findById($id);
        $check = $data->thuocThongBao->where('user_id', Auth::id())->where('thongbao_id', $id)->first();
        if ($check && ($check->user_id == Auth::id() || $check->user_id == 0)) {
            return view('thong-bao.chitiet', compact('data'));
        } else {
            return redirect()->route('thong-bao.index');
        }
    }

    public function create()
    {
        $data = Auth::user()->profile->Lop->Student()->get();
        return view('thong-bao.create',compact('data'));
    }

    public function store(Request $request)
    {
        $content = $request->all();
        unset($content['list_id_hoc_sinh']);
        $list_id_hoc_sinh = $request->list_id_hoc_sinh;
        $content['auth_id'] = Auth::id();
        $content['role'] = Auth::user()->role;

        $content['type'] = 1;
        $content['route'] = 'tin_tuc';

        $list_id_hoc_sinh_save_noti=[];
        foreach ($list_id_hoc_sinh as $key => $value) {
            $user_id =['user_id'=>$value];
            $data_notifi = collect([$user_id,$content]);
            $data_save_notifi = $data_notifi->collapse();
            $list_id_hoc_sinh_save_noti[$key]=$data_save_notifi->toArray();
        }
      
        $list_device = Auth::user()->profile->Lop->Student->map(function($student)
        {
           return $student->user()->select('users.device')->first();
        });

        foreach ($list_device as $key => $value) {
            $data_device = collect([$value->toArray(),$content]);
            $data_send_device = $data_device->collapse();
            $list_device[$key] = $data_send_device;
        }
        $id_noi_dung_thong_bao = $this->NoiDungThongBaoRepository->create($content)->id;

        $list_id_hoc_sinh_save_thong_bao = [];

        foreach ($list_id_hoc_sinh as $key => $value) {
            $user_id =['user_id'=>$value,'thongbao_id'=>$id_noi_dung_thong_bao];
            array_push($list_id_hoc_sinh_save_thong_bao,$user_id);
        }
        // ThongBao::insert($list_id_hoc_sinh_save_thong_bao);
        // dd(1);

        JobGuiThongBao::dispatch($list_id_hoc_sinh_save_noti,$list_id_hoc_sinh_save_thong_bao,$list_device->toArray(),$content,$this->NotificationRepository)->onQueue('giao_vien');
        return 'thành công';
    }

    /* Danh sách thông báo Giáo Viên Gửi tới Phụ Huynh.
     * @author: phucnv
     * @created_at 09/11/2020
     */
    public function thongBaoDaGui()
    {
        $thongBaoDaGui = NoiDungThongBao::where('auth_id', Auth::id())
                                        ->where('isShow', 1)
                                        ->paginate(config('common.paginate_size.default'));
        return view('thong-bao.thong_bao_da_gui', compact('thongBaoDaGui'));
    }

    /* Xóa thông báo Nhà Trường gửi tới Giáo Viên.
     * @author: phucnv
     * @created_at 09/11/2020
     */
    public function remove(Request $request)
    {
        $data = ThongBao::where('thongbao_id', $request->thongbao_id)
                        ->where(function($query) {
                                $query->whereIn('user_id', [0, Auth::id()]);
                        })
                        ->first();
        $data->type = 2;
        $data->save();
        return response()->json([
            'message' => 'Xóa thành công',
            'code' => 201,
        ], 201);
    }

    /* Chi tiết thông báo Giáo Viên gửi tới Phụ Huynh.
     * @author: phucnv
     * @created_at 09/11/2020
     */
    public function showThongBaoGuiDi($id)
    {
        $data = $this->NoiDungThongBaoRepository->findById($id);
        if ($data && $data->isShow == 1 && $data->auth_id == Auth::id()) {
            return view('thong-bao.chi_tiet_thong_bao_da_gui', compact('data'));
        } else {
            return redirect()->route('thong-bao.index');
        }
    }

    /* Xóa thông báo Giáo Viên gửi tới Phụ Huynh.
     * @author: phucnv
     * @created_at 09/11/2020
     */
    public function removeThongBaoGuiDi(Request $request)
    {
        $data = NoiDungThongBao::find($request->id);
        $data->isShow = 2;
        $data->save();

        return response()->json([
            'message' => 'Xóa thành công',
            'code' => 201,
        ], 201);
    }

    public function sendNotifyDiemDanhVe(Request $request)
    {
        $listHocSinh = json_decode($request->data);

        JobGuiThongBaoDiemDanhVe::dispatch($listHocSinh, Auth::id(), $this->NotificationRepository)->onQueue('giao_vien');
        
        return response()->json([
            'message' => 'Gửi thông báo điểm danh thành công',
            'code' => 201,
        ], 201);
    }
}
