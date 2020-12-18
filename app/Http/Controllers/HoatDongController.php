<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Repositories\GiaoVien\GiaoVienRepository;
use App\Repositories\HoatDong\HoatDongRepository;
use App\Repositories\NamHocRepository;
use App\Http\Requests\HoatDong\StoreHoatDong;


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Protection;

use PhpOffice\PhpWord\Settings;
use Illuminate\Support\Facades\Auth;

class HoatDongController extends Controller
{

    protected $GiaoVienRepository;
    public function __construct(
        GiaoVienRepository $GiaoVienRepository,
        HoatDongRepository $HoatDongRepository,
        NamHocRepository $NamHocRepository
    )
    {
        $this->GiaoVienRepository = $GiaoVienRepository;
        $this->HoatDongRepository = $HoatDongRepository;
        $this->NamHocRepository = $NamHocRepository;
    }

    public function index(){
        $user_id = Auth::user()->id;
        $giao_vien = $this->GiaoVienRepository->getGVTheoIdUser($user_id);
        
        $date = Carbon::now(); // or $date = new Carbon()
        $id_nam_hoc = $this->NamHocRepository->maxID();
        $nam_hoc_moi = $this->NamHocRepository->find($id_nam_hoc);
        
        //

        $date_start = Carbon::createFromFormat('Y-m-d', $nam_hoc_moi->start_date);
        $numberNextWeek = $date->weekOfYear -$date_start->weekOfYear ;
        //
        
        $ten_lop = $giao_vien->Lop->ten_lop;
        $hoat_dong = $this->HoatDongRepository->getHoatDongByIdLop($giao_vien->lop_id);
        $namArr = $this->HoatDongRepository->getNamOfHoatDongInLop($giao_vien->lop_id);
        // dd($namArr);
        $arr_hd=[];
        for($i = 0; $i < count($namArr); $i++){
            $arr = [];
            for($j = 0 ; $j < count($hoat_dong) ; $j++){
                if($hoat_dong[$j]->id_nam_hoc == $namArr[$i]->id_nam_hoc){
                    
                    array_push($arr,$hoat_dong[$j]);
                }
            }
            $arr_hd[$this->NamHocRepository->find($namArr[$i]->id_nam_hoc)['name']] = $arr;
            
        }
        return view('hoat-dong-hoc.index',compact('numberNextWeek','ten_lop','arr_hd'));
    }

    function generateRandomString($length = 6) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function store(StoreHoatDong $request){
        $id_nam_hoc = $this->NamHocRepository->maxID();
        $giao_vien = $this->GiaoVienRepository->getGVTheoIdUser($request->user_id);
        if ($giao_vien->type !=1 ) {
            return redirect()->route('hoat-dong-hoc-index')->with('thong_bao','Bạn không phải là giáo viên chủ nhiệm');
        }
        $id_don = $this->HoatDongRepository->kiemTraTonTaiHoatDongTuan($request->tuan,$giao_vien->lop_id,$id_nam_hoc);
        if($id_don == null){

        }else{
            if ($id_don->type == 2) {
                return redirect()->route('hoat-dong-hoc-index')->with('thong_bao','Hoạt động tuần này của bạn đã được phê duyệt không thể gửi lại');
            }
        }

        $nameFile=$request->file->getClientOriginalName();
        $nameFileArr=explode('.',$nameFile);
        $duoiFile=end($nameFileArr);

        $now = Carbon::now();
        
        $nameFile = $this->generateRandomString(50).$now->year.$now->day.$now->hour.$now->minute.$now->second;

        $link_file_pdf = '';
        if($duoiFile == 'xls' || $duoiFile == 'xlsx'){
                $spreadsheet = IOFactory::load($_FILES['file']['tmp_name']);
                $writer = new \PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf($spreadsheet);
                $writer->save("file_pdf/excel/".$nameFile.'.pdf');
                $link_file_pdf = 'file_pdf/excel/'.$nameFile.'.pdf';
        }else{
            // dd($_FILES['file']['tmp_name']);
                $domPdfPath = base_path('vendor/dompdf/dompdf');
                \PhpOffice\PhpWord\Settings::setZipClass(\PhpOffice\PhpWord\Settings::PCLZIP);
                \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
                \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
                \PhpOffice\PhpWord\Settings::setOutputEscapingEnabled(true);
                
                $Content = \PhpOffice\PhpWord\IOFactory::load($_FILES['file']['tmp_name']);
                $Content->setDefaultFontName('DejaVu Sans, sans-serif');

                $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'PDF');
                $PDFWriter->save('file_pdf/word/'.$nameFile.'.pdf'); 

                $link_file_pdf = 'file_pdf/word/'.$nameFile.'.pdf';
        }
        $dateCreate = [
            'id_gv' => $giao_vien->id,
            'lop_id' => $giao_vien->lop_id,
            'tuan' => $request->tuan,
            'id_nam_hoc' => $id_nam_hoc,
            'link_file_hd' => $request->getSchemeAndHttpHost().'/'.$link_file_pdf,
            'type' => 1
        ];
        // dd($id_don);
        if($id_don == null){
            $this->HoatDongRepository->create($dateCreate);
        }else{
            $this->HoatDongRepository->update($id_don['id'],['link_file_hd'=>$request->getSchemeAndHttpHost().'/'.$link_file_pdf, 'type'=>0]);
        }
        
        return redirect()->route('hoat-dong-hoc-index')->with('status', ' Thanh cong! ');
    }
}
