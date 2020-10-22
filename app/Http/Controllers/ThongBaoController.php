<?php

namespace App\Http\Controllers;

use App\Models\ThongBao;
use App\Repositories\NoiDungThongBaoRepository;
use Illuminate\Support\Facades\Auth;

class ThongBaoController extends Controller
{
    protected $NoiDungThongBaoRepository;
    protected $NotificationRepository;

    public function __construct(
        NoiDungThongBaoRepository $NoiDungThongBaoRepository

    ) {
        $this->NoiDungThongBaoRepository = $NoiDungThongBaoRepository;
    }

    public function index()
    {
        $data = [];
        $thongBao = ThongBao::where('user_id', Auth::id())
                            ->orWhere('user_id',0)
                            ->get();
        foreach ($thongBao as $item) {
            array_push($data, $item->NoiDungThongBao);
        }
        return view('thong-bao.index', compact('data'));
    }

    public function showThongBao($id)
    {
        $data = $this->NoiDungThongBaoRepository->findById($id);
        if ($data && ($data->thuocThongBao->user_id == Auth::id() || $data->thuocThongBao->user_id == 0)) {
            return view('thong-bao.chitiet', compact('data'));
        } else {
            return redirect()->route('thong-bao.index');
        }
    }
}
