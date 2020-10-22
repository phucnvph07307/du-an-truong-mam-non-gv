<?php

namespace App\Http\Controllers\DiemDanhDen;

use App\Http\Controllers\Controller;
use App\Repositories\DiemDanhDen\DiemDanhDenRepository;
use App\Repositories\GiaoVien\GiaoVienRepository;
use App\Repositories\HocSinh\HocSinhRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

class DiemDanhDenController extends Controller
{
    protected $DiemDanhDenRepository;
    protected $HocSinhRepository;
    protected $GiaoVienRepository;

    public function __construct(
        DiemDanhDenRepository $DiemDanhDenRepository,
        HocSinhRepository $HocSinhRepository,
        GiaoVienRepository $GiaoVienRepository
    ) {
        $this->DiemDanhDenRepository = $DiemDanhDenRepository;
        $this->HocSinhRepository = $HocSinhRepository;
        $this->GiaoVienRepository = $GiaoVienRepository;
    }

    public function showDiemDanh()
    {
        $route_name = Route::current()->action['as'];
        $type = $route_name == "diem_danh_ban_sang.create" ? 1 : 2;
        $renderView = $route_name == "diem_danh_ban_sang.create" ? 'diem-danh.diem-danh-den-ban-sang' : 'diem-danh.diem-danh-den-ban-chieu';

        $giaoVien = $this->GiaoVienRepository->teacherInClass();
        $edit = $this->DiemDanhDenRepository->editData($giaoVien->lop_id, $type);
        $students = [];
        if ($edit == null || count($edit) == 0) {
            $students = $this->HocSinhRepository->getHocSinhInClass();
        }
        $index = 1;
        return view($renderView, compact('index', 'students', 'edit'));
    }

    public function postDiemDanh(Request $request)
    {
        $route_name = Route::current()->action['as'];
        $type = $route_name == "diem_danh_ban_sang.store" ? 1 : 2;
        $dataAjax = $request->all();
        $data = json_decode($dataAjax['data']);
        $response = $this->DiemDanhDenRepository->createdOrUpdate($data, $type);
        return response()->json([
            'data' => $response['data'],
            'code' => $response['code'],
        ], $response['code']);
    }
}
