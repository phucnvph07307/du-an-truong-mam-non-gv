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
        $don_dan_thuoc = $this->DonDanThuocRepository->getDonDanThuocHomNay();
        // $test = $don_dan_thuoc[1]->PhanHoiDonThuoc()->where('type',2)->get();
        // // dd($test[0]);
        // // dd($don_dan_thuoc[0]->HocSinh);
        return view('don-dan-thuoc.index',compact('don_dan_thuoc'));
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
        $device = 'fiuTWIB5Rt6ZpPYn76zXVc:APA91bFmBH1cNZMx-ZqfXumM8ktE4UbGbJHKA02IQXCfI6KPeYFg75i9pyl8WE17IY_7aeM6iN-LAt4xsaioVGJqctiXpnE5PXMG5EynbMV1OO52LChV5sDBelAMO177RflYna52Ca_q';
        PhanHoiDonThuoc::create($data);
        $thongbao=[];
        $thongbao['title'] ='Trả lời đơn dặn thuốc';
        $thongbao['content'] =$noi_dung;
        $thongbao['route'] = 'route';
        $thongbao['user_id'] =$thong_tin_nguoi_nhan->id;
        $thongbao['auth_id'] =$nguoi_phan_hoi_id;
        $this->NotificationRepository->create($thongbao);
        
        $data_thong_bao['title'] = 'Giáo viên đã phản hồi về đơn dặn thuốc của bạn';
        $data_thong_bao['content'] = $noi_dung;

        $this->NotificationRepository->notificationApp($device,$data_thong_bao);
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
