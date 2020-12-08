<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\GiaoVien\GiaoVienRepository;
use App\Repositories\HocSinh\HocSinhRepository;
use App\Repositories\SucKhoe\SucKhoeRepository;
class SucKhoeController extends Controller
{   
    protected $GiaoVienRepository;
    protected $HocSinhRepository;
    protected $SucKhoeRepository;
    public function __construct
    (
        GiaoVienRepository $GiaoVienRepository,
        HocSinhRepository $HocSinhRepository,
        SucKhoeRepository $SucKhoeRepository
    )
    {
        $this->GiaoVienRepository = $GiaoVienRepository;
        $this->HocSinhRepository = $HocSinhRepository;
        $this->SucKhoeRepository = $SucKhoeRepository;
    }
    public function index()
    {
        
        $dot = $this->SucKhoeRepository->getDotMoiNhat();
        if($dot){
            $params = request()->all();
            $hoc_sinh = $this->HocSinhRepository->getHocSinhInClassTheoDot($dot->id, $params);
            $hoc_sinh_theo_lop = $this->HocSinhRepository->getHocSinhInClass();
            $getDotAll = $this->SucKhoeRepository->getDotKhamSK();
            $view = view('suc-khoe.index', compact('hoc_sinh', 'dot', 'hoc_sinh_theo_lop', 'getDotAll', 'params'));
        }
        else{
            $view = view('suc-khoe.index');
        }
        
        return $view;
        
    }
    public function checkdot()
    {   
        $params = "";
        $dot = $this->SucKhoeRepository->getDotMoiNhat();
        $hoc_sinh = $this->HocSinhRepository->getHocSinhInClassTheoDot($dot->id, $params);
        
        return $hoc_sinh;
    }
    public function create()
    {   
        $params = "";
        $getHocSinh = $this->HocSinhRepository->getHocSinhInClass();
        $dot = $this->SucKhoeRepository->getDotMoiNhat();
        $lop_id_gv = $this->GiaoVienRepository->teacherInClass();
        $checkdot = $this->HocSinhRepository->getHocSinhInClassTheoDot($dot->id, $params);
        $data = view('suc-khoe.create', compact('getHocSinh', 'dot', 'lop_id_gv'));
        if(count($checkdot) > 0){
            $data = redirect()->route('quan-suc-khoe-index')->with('thongbao', 'Hoan thanh');
        }
        return $data;
    }
    public function store(Request $request)
    {
        $data = $request->all();
        
        $count = count($data);
       
        for ($i=1; $i < $count; $i++) { 
            $this->SucKhoeRepository->store($data[$i]);
        }
       
    }

    public function edit($id)
    {   
        $data = $this->SucKhoeRepository->getSucKhoeTheoHocSinh($id);
        $dot_suc_khoe = [];
        $chieu_cao = [];
        $can_nang = [];
        foreach($data as $item){
            array_push($dot_suc_khoe, $item->ten_dot);
            array_push($chieu_cao, $item->chieu_cao);
            array_push($can_nang, $item->can_nang);
        }
        return view('suc-khoe.edit', compact('data', 'id', 'dot_suc_khoe', 'chieu_cao', 'can_nang'));
    }

    public function update(Request $request, $id)
    {   
        $data = $request->all();
        $this->SucKhoeRepository->updateSk($data, $id);
        return redirect()->back()->with('thongbaoedit','66');
    }

    public function ShowSucKhoeTheoDot(Request $request){
        $params = "";
        $request = $request->all();
        $id = $request['id'];
        $suc_khoe_hoc_sinh = $this->HocSinhRepository->getHocSinhInClassTheoDot($id, $params);
        return $suc_khoe_hoc_sinh;
    }
}
