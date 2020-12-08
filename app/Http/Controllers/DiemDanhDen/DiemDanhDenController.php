<?php

namespace App\Http\Controllers\DiemDanhDen;

use App\Http\Controllers\Controller;
use App\Repositories\DiemDanhDen\DiemDanhDenRepository;
use App\Repositories\GiaoVien\GiaoVienRepository;
use App\Repositories\HocSinh\HocSinhRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use CarBon\Carbon;

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

        $response['data'] = [];
        $response['code'] = 288;
        $now = Carbon::now();
        $thoi_gian_hien_tai = strtotime($now);

        if($type == 1){
            $thoi_gian_bat_dau = strtotime($now->format('Y-m-d') . " 07:00:00");
            $thoi_gian_ket_thuc = strtotime($now->format('Y-m-d') . " 09:00:00");
            if( $thoi_gian_bat_dau < $thoi_gian_hien_tai && $thoi_gian_hien_tai < $thoi_gian_ket_thuc){
                $response = $this->DiemDanhDenRepository->createdOrUpdate($data, $type);
            }
        }else {
            $thoi_gian_bat_dau = strtotime($now->format('Y-m-d') . " 13:00:00");
            $thoi_gian_ket_thuc = strtotime($now->format('Y-m-d') . " 14:00:00");
            if( $thoi_gian_bat_dau < $thoi_gian_hien_tai && $thoi_gian_hien_tai < $thoi_gian_ket_thuc){
                $response = $this->DiemDanhDenRepository->createdOrUpdate($data, $type);
            }
        }

        return response()->json([
            'data' => $response['data'],
            'code' => $response['code'],
        ], $response['code']);
    }
}
