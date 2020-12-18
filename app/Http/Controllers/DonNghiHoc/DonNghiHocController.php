<?php

namespace App\Http\Controllers\DonNghiHoc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\DonNghiHoc\DonNghiHocRepository;
use App\Repositories\NotificationRepository;
use App\Repositories\HocSinh\HocSinhRepository;
use App\Repositories\GiaoVien\GiaoVienRepository;
use App\User;
use Illuminate\Support\Facades\Auth;

class DonNghiHocController extends Controller
{
    protected $DonNghiHocRepository;
    protected $NotificationRepository;
    protected $HocSinhRepository;
    protected $GiaoVienRepository;

    public function __construct(
        DonNghiHocRepository $DonNghiHocRepository,
        NotificationRepository $NotificationRepository,
        HocSinhRepository $HocSinhRepository,
        GiaoVienRepository $GiaoVienRepository
    )
    {
        $this->NotificationRepository = $NotificationRepository;
        $this->DonNghiHocRepository = $DonNghiHocRepository;
        $this->HocSinhRepository = $HocSinhRepository;
        $this->GiaoVienRepository = $GiaoVienRepository;
    }
    public function index()
    {
        $lop_id = Auth::user()->profile->lop_id;
        $don_nghi_hoc = $this->DonNghiHocRepository->getDonNghiHocHomNay($lop_id);
        $lich_su_don_nghi_hoc = $this->DonNghiHocRepository->getLichSuDonNghiHoc($lop_id);
        // dd($lich_su_don_nghi_hoc);
        return view('don-xin-nghi-hoc.index',compact('don_nghi_hoc','lich_su_don_nghi_hoc'));
    }

    public function xacNhanDonNghiHoc(Request $request)
    {
        $id = $request->id;
        $id_hs = $request->id_hs;

        $don_nghi_hoc = $this->DonNghiHocRepository->find($id);
        $hoc_sinh = $this->HocSinhRepository->find($id_hs);

        $thongbao=[];
        $thongbao['title'] ='Đơn nghỉ học';
        $thongbao['content'] ='Đã xác nhận cho học sinh';
        $thongbao['route'] = json_encode([
            'name_route' => 'ChiTietNghiHoc',
            'id' => $don_nghi_hoc->id
        ]);
        $thongbao['id_hs'] =$hoc_sinh->id;
        $thongbao['user_id'] =$hoc_sinh->user_id;
        $thongbao['auth_id'] =Auth::user()->id;
        $thongbao['role'] =Auth::user()->role;
       
        $this->NotificationRepository->create($thongbao);
        // dd($thongbao);
        $data_thong_bao['device'] = $don_nghi_hoc->HocSinh->user->device;
        $data_thong_bao['title'] = $hoc_sinh['ten'].' : giáo viên đã xác nhận về đơn nghỉ học của bạn';
        $data_thong_bao['content'] = 'Đã xác nhận cho học sinh';
        $data_thong_bao['route'] = [
            'name_route' => 'ChiTietNghiHoc',
            'id' => $don_nghi_hoc->id,
            'id_hs' => $hoc_sinh['id']
        ];
       
        $this->NotificationRepository->notificationApp([$data_thong_bao]);
        $this->DonNghiHocRepository->update($request->id,['trang_thai'=>1]);
    }
}
