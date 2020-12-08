<?php

namespace App\Http\Controllers\DonDanThuoc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\DonDanThuoc\DonDanThuocRepository;
use App\Repositories\NotificationRepository;
use App\Models\PhanHoiDonThuoc;
use App\Repositories\HocSinh\HocSinhRepository;
use App\Repositories\GiaoVien\GiaoVienRepository;
use App\User;
use Illuminate\Support\Facades\Auth;


class DonDanThuocController extends Controller
{
    protected $DonDanThuocRepository;
    protected $NotificationRepository;
    protected $HocSinhRepository;
    protected $GiaoVienRepository;

    public function __construct(
        DonDanThuocRepository $DonDanThuocRepository,
        NotificationRepository $NotificationRepository,
        HocSinhRepository $HocSinhRepository,
        GiaoVienRepository $GiaoVienRepository
    )
    {
        $this->NotificationRepository = $NotificationRepository;
        $this->DonDanThuocRepository = $DonDanThuocRepository;
        $this->HocSinhRepository = $HocSinhRepository;
        $this->GiaoVienRepository = $GiaoVienRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lop_id = Auth::user()->profile->lop_id;
        $don_dan_thuoc = $this->DonDanThuocRepository->getDonDanThuocHomNay($lop_id);
        $lich_su_don_dan_thuoc = $this->DonDanThuocRepository->getLichSuDonDanThuoc($lop_id);
        // dd($lich_su_don_dan_thuoc);
        return view('don-dan-thuoc.index',compact('don_dan_thuoc','lich_su_don_dan_thuoc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function guiPhanHoi(Request $request)
    {
        $data = $request->all();
        $don_thuoc = $this->DonDanThuocRepository->find($request->don_dan_thuoc_id);
        $thong_tin_nguoi_nhan = $don_thuoc->HocSinh;
        // dd($thong_tin_nguoi_nhan->id);
        $nguoi_phan_hoi_id = $request->nguoi_phan_hoi_id;
        $noi_dung = $request->noi_dung;
        PhanHoiDonThuoc::create($data);
        $thongbao=[];
        $thongbao['title'] ='Trả lời đơn dặn thuốc';
        $thongbao['content'] =$noi_dung;
        $thongbao['route'] = json_encode([
            'name_route' => 'detail_medicine',
            'id' => $don_thuoc->id
        ]);
        $thongbao['id_hs'] =$thong_tin_nguoi_nhan->id;
        $thongbao['user_id'] =$thong_tin_nguoi_nhan->user_id;
        $thongbao['auth_id'] =$nguoi_phan_hoi_id;
        $thongbao['role'] =Auth::user()->role;
       
        $this->NotificationRepository->create($thongbao);
        // dd($thongbao);
        $data_thong_bao['device'] = $don_thuoc->HocSinh->user->device;
        $data_thong_bao['title'] = 'Giáo viên đã phản hồi về đơn dặn thuốc của bạn';
        $data_thong_bao['content'] = $noi_dung;
        $data_thong_bao['route'] = [
            'name_route' => 'detail_medicine',
            'id' => $don_thuoc->id
        ];
       
        $this->NotificationRepository->notificationApp([$data_thong_bao]);
        return 'thành công';
    }

    public function infoPhanHoi(Request $request)
    {
        $type = $request->type;
        $id_phan_hoi = $request->nguoi_phan_hoi_id;
        if($type==1){
            $info = $this->HocSinhRepository->find($id_phan_hoi);
        }else{
            $user_giao_vien = User::find($id_phan_hoi);
            $info = $user_giao_vien->profile;
        }

        return $info;
    }
}
