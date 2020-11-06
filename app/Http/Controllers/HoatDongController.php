<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Repositories\GiaoVien\GiaoVienRepository;
use App\Repositories\HoatDong\HoatDongRepository;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Protection;

use PhpOffice\PhpWord\Settings;


class HoatDongController extends Controller
{

    protected $GiaoVienRepository;
    public function __construct(
        GiaoVienRepository $GiaoVienRepository,
        HoatDongRepository $HoatDongRepository
    )
    {
        $this->GiaoVienRepository = $GiaoVienRepository;
        $this->HoatDongRepository = $HoatDongRepository;
    }

    public function index(){
        $date = Carbon::now(); // or $date = new Carbon()
        $numberNextWeek = $date->weekOfYear + 1;
        return view('hoat-dong-hoc.index',compact('numberNextWeek'));
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

    public function store(Request $request){
        $nameFile=$request->file->getClientOriginalName();
        $nameFileArr=explode('.',$nameFile);
        $duoiFile=end($nameFileArr);

        $now = Carbon::now();
        $giao_vien = $this->GiaoVienRepository->getGVTheoIdUser($request->user_id);
        $nameFile = $this->generateRandomString(50).$now->year.$now->day.$now->hour.$now->minute.$now->second;

        $link_file_pdf = '';
        if($duoiFile == 'xls' || $duoiFile == 'xlsx'){
                $spreadsheet = IOFactory::load($_FILES['file']['tmp_name']);
                $writer = new \PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf($spreadsheet);
                $writer->save("file_pdf/excel/".$nameFile.'.pdf');
                $link_file_pdf = 'file_pdf/excel/'.$nameFile.'.pdf';
        }else{
                $domPdfPath = base_path('vendor/dompdf/dompdf');
                \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
                \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
                $Content = \PhpOffice\PhpWord\IOFactory::load($_FILES['file']['tmp_name']);
                $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'PDF');
                $PDFWriter->save('file_pdf/word/'.$nameFile.'.pdf'); 
                $link_file_pdf = 'file_pdf/word/'.$nameFile.'.pdf';
        }
        $dateCreate = [
            'id_gv' => $giao_vien->id,
            'lop_id' => $giao_vien->lop_id,
            'tuan' => $request->tuan,
            'nam' => $now->year,
            'link_file_hd' => $link_file_pdf,
            'type' => 1
        ];
        $this->HoatDongRepository->create($dateCreate);
        return redirect()->route('hoat-dong-hoc-index')->with('status', ' Thanh cong! ');
    }
}
