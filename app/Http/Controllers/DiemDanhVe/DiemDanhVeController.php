<?php

namespace App\Http\Controllers\DiemDanhVe;

use App\Http\Controllers\Controller;
use App\Repositories\DiemDanhVe\DiemDanhVeRepository;
use App\Repositories\GiaoVien\GiaoVienRepository;
use App\Repositories\HocSinh\HocSinhRepository;
use App\Repositories\NguoiDonHo\NguoiDonHoRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use CarBon\Carbon;

class DiemDanhVeController extends Controller
{

    protected $DiemDanhVeRepository;
    protected $HocSinhRepository;
    protected $GiaoVienRepository;
    protected $NguoiDonHoRepository;

    public function __construct(
        DiemDanhVeRepository $DiemDanhVeRepository,
        HocSinhRepository $HocSinhRepository,
        GiaoVienRepository $GiaoVienRepository,
        NguoiDonHoRepository $NguoiDonHoRepository
    ) {
        $this->DiemDanhVeRepository = $DiemDanhVeRepository;
        $this->HocSinhRepository = $HocSinhRepository;
        $this->GiaoVienRepository = $GiaoVienRepository;
        $this->NguoiDonHoRepository = $NguoiDonHoRepository;
    }

    public function showDiemDanhVe()
    {
        $giaoVien = $this->GiaoVienRepository->teacherInClass();
        $edit = $this->DiemDanhVeRepository->editData($giaoVien->lop_id);
        $students = [];
        if ($edit == null || count($edit) == 0) {
            $students = $this->HocSinhRepository->getHocSinhInClass();
        }
        $nguoi_don_ho = $this->NguoiDonHoRepository->getInfo();
        $index = 1;
        return view('diem-danh.diem-danh-ve', compact('index', 'students', 'edit', 'nguoi_don_ho'));
    }

    public function postDiemDanhVe(Request $request)
    {
        $dataAjax = $request->all();
        $data = json_decode($dataAjax['data']);

        $response['data'] = [];
        $response['code'] = 288;
        $now = Carbon::now();
        $thoi_gian_hien_tai = strtotime($now);
        $thoi_gian_bat_dau = strtotime($now->format('Y-m-d') . " 12:00:00");
        $thoi_gian_ket_thuc = strtotime($now->format('Y-m-d') . " 18:00:00");

        if( $thoi_gian_bat_dau < $thoi_gian_hien_tai && $thoi_gian_hien_tai < $thoi_gian_ket_thuc){
            $response = $this->DiemDanhVeRepository->createdOrUpdate($data);
        }

        return response()->json([
            'data' => $response['data'],
            'code' => $response['code'],
        ], $response['code']);
    }
}
