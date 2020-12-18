<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\HocSinh\HocSinhRepository;
use App\Models\NhanXet;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Jobs\JobGuiThongBao;
use App\Repositories\NoiDungThongBaoRepository;
use App\Repositories\NotificationRepository;

class NhanXetController extends Controller
{

    protected $HocSinhRepository;
    protected $NoiDungThongBaoRepository;
    protected $NotificationRepository;

    public function __construct(
        HocSinhRepository $HocSinhRepository,
        NoiDungThongBaoRepository $NoiDungThongBaoRepository,
        NotificationRepository $NotificationRepository
    ) {
        $this->HocSinhRepository = $HocSinhRepository;
        $this->NoiDungThongBaoRepository = $NoiDungThongBaoRepository;
        $this->NotificationRepository = $NotificationRepository;
    }

    public function index()
    {
        $students = $this->HocSinhRepository->getHocSinhInClass();
        return view('nhanxet.index', compact('students'));
    }

    public function store(Request $request)
    {
        $dataInput = $request->hoc_sinh_id;
        $dataHocSinhCreateNew = [];
        $danhsachIdNhanXet = [];

        foreach ($dataInput as $value) {
            $nhan_xet = NhanXet::where('hoc_sinh_id', $value)
                ->whereDate('created_at', '=', date('Y-m-d'))
                ->first();

            if ($nhan_xet !== null) {
                $nhan_xet->update([
                    'giao_vien_id' => request('giao_vien_id'),
                    'nhan_xet_ngay' => request('nhan_xet_ngay'),
                    'bua_an' => request('bua_an'),
                    'ngu' => request('ngu'),
                    've_sinh' => request('ve_sinh')
                ]);
                array_push($danhsachIdNhanXet, $nhan_xet['id']);
            } else {
                $id_insert =  NhanXet::create(
                    [
                        'giao_vien_id' => request('giao_vien_id'),
                        'hoc_sinh_id' => $value,
                        'nhan_xet_ngay' => request('nhan_xet_ngay'),
                        'bua_an' => request('bua_an'),
                        'ngu' => request('ngu'),
                        've_sinh' => request('ve_sinh')
                    ]
                )->id;
                array_push($danhsachIdNhanXet, $id_insert);
            }
        }


        // $data = NhanXet::insert($dataHocSinhCreateNew);
        $this->guiThongBaoHocSinh($dataInput,$danhsachIdNhanXet);
        return response()->json($request->all(), Response::HTTP_OK);
    }


    public function find(Request $request)
    {
        $data = NhanXet::where('hoc_sinh_id', request('hoc_sinh_id'))
            ->whereDate('created_at', request('search_time'))
            ->first();
        return response()->json($data, Response::HTTP_OK);
    }


    public function guiThongBaoHocSinh($data_hs,$danhsachIdNhanXet)
    {
        $list_id_hoc_sinh = $data_hs;
        $content['auth_id'] = Auth::id();
        $content['role'] = Auth::user()->role;

        $content['type'] = 1;
        $id_noi_dung_thong_bao = $this->NoiDungThongBaoRepository->create($content)->id;

        $list_id_hoc_sinh_save_noti = [];
        foreach ($list_id_hoc_sinh as $key => $value) {
            // dd($value);
            $content['id_hs'] = $value;
            $content['title'] = 'Nhận xét hoạt động hằng ngày';
            $content['content'] = 'Nhận xét hoạt động hằng ngày';

            $content['id_hs'] = $value;
            $content['route'] = json_encode(
                [
                    'name_route' => 'ChiTietNhanXet',
                    'id' => $danhsachIdNhanXet[$key],
                    'id_hs' => $value
                ]
            );
            $user_id = ['user_id' => $this->HocSinhRepository->find($value)->user_id];
            $data_notifi = collect([$user_id, $content]);
            $data_save_notifi = $data_notifi->collapse();
            $list_id_hoc_sinh_save_noti[$key] = $data_save_notifi->toArray();
        }
        $list_device = [];

        foreach ($list_id_hoc_sinh as $key => $value) {
            array_push($list_device, [
                'id_hs' => $value,
                'device' => $this->HocSinhRepository->find($value)->User->device
            ]);
        }

        foreach ($list_device as $key => $value) {
            $content['route'] = [
                'name_route' => 'ChiTietNhanXet',
                'id' => $danhsachIdNhanXet[$key],
                'id_hs' => $value['id_hs']
            ];
            // dd($list_device);

            $data_device = collect([$value, $content]);
            $data_send_device = $data_device->collapse();
            $list_device[$key] = $data_send_device;
        }
        // dd($list_device);
        $list_id_hoc_sinh_save_thong_bao = [];

        foreach ($list_id_hoc_sinh as $key => $value) {
            $user_id = ['user_id' => $value, 'thongbao_id' => $id_noi_dung_thong_bao];
            array_push($list_id_hoc_sinh_save_thong_bao, $user_id);
        }

        // dd($list_id_hoc_sinh_save_thong_bao);
        JobGuiThongBao::dispatch($list_id_hoc_sinh_save_noti, $list_id_hoc_sinh_save_thong_bao, $list_device, $content, $this->NotificationRepository)->onQueue('giao_vien');
    }
}
