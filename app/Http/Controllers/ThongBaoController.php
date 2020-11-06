<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ThongBao;
use App\Repositories\NoiDungThongBaoRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\NoiDungThongBao;
use App\Models\Notification;
use App\Repositories\NotificationRepository;

class ThongBaoController extends Controller
{
    protected $NoiDungThongBaoRepository;
    protected $NotificationRepository;

    public function __construct(
        NotificationRepository $NotificationRepository,
        NoiDungThongBaoRepository $NoiDungThongBaoRepository

    ) {
        $this->NotificationRepository = $NotificationRepository;
        $this->NoiDungThongBaoRepository = $NoiDungThongBaoRepository;
    }

    public function index()
    {
        $data = ThongBao::where('type', 1)
                        ->where(function($query){
                                $query->whereIn('user_id', [0, Auth::id()]);
                        })
                        ->orderBy('id', 'desc')
                        ->paginate(10);
        return view('thong-bao.index', compact('data'));
    }

    public function thongBaoDaGui()
    {
        $thongBaoDaGui = NoiDungThongBao::where('auth_id', Auth::id())
                                        ->where('isShow', 1)
                                        ->paginate(10);
        return view('thong-bao.tab_da_gui', compact('thongBaoDaGui'));
    }

    public function showThongBao($id)
    {
        $data = $this->NoiDungThongBaoRepository->findById($id);
        if ($data 
            && ($data->thuocThongBao->user_id == Auth::id() || $data->thuocThongBao->user_id == 0) 
            && $data->thuocThongBao->type == 1) {
            return view('thong-bao.chitiet', compact('data'));
        } else {
            return redirect()->route('thong-bao.index');
        }
    }

    public function create()
    {
        return view('thong-bao.create');
    }

    public function store(Request $request)
    {
        $array_users = [];
        $lop_id = Auth::user()->profile->lop_id;
        $users = DB::table('hoc_sinh')
                   ->where('type', 1)
                   ->where('lop_id', $lop_id)
                   ->get();

        foreach ($users as $item) {
            array_push($array_users, $item->user_id);
        }
        $thongbao_id = NoiDungThongBao::create([
                            'title'   => $request->title,
                            'content' => $request->content,
                            'auth_id' => Auth::id(),
                            'type'    => 4,
                       ])->id;

        $link = [
            'route_name' => 'thong-bao.show',
            'params'     => ['id' => $thongbao_id]
        ];
        $route = json_encode($link);
        $data = [];
        foreach ($array_users as $user_id) {
            $dataInput = [
                'thongbao_id' => $thongbao_id,
                'user_id'     => $user_id,
            ];
            $object = (object) $dataInput;
            array_push($data, $object);
            ThongBao::create($dataInput);
            $this->NotificationRepository->createNotifications([
                'title'   => $request->title,
                'content' => $request->content,
                'route'   => $route,
                'user_id' => $user_id,
                'auth_id' => Auth::id(),
                'type'    => 1,
                'bell'    => 1
            ]);
        };
        return response()->json([
            'data' => $data,
            'code' => 200,
        ], 200);
    }

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

    public function showThongBao2($id)
    {
        $data = $this->NoiDungThongBaoRepository->findById($id);
        if ($data && $data->isShow == 1) {
            return view('thong-bao.chitiet2', compact('data'));
        } else {
            return redirect()->route('thong-bao.index');
        }
    }

    public function remove2(Request $request)
    {
        $data = NoiDungThongBao::find($request->id);
        $data->isShow = 2;
        $data->save();

        return response()->json([
            'message' => 'Xóa thành công',
            'code' => 201,
        ], 201);
    }
}
