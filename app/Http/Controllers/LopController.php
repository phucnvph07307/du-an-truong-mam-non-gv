<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LopHoc;
use App\Models\GiaoVien;
use Auth;

class LopController extends Controller
{
    public function index(){
        $giaoVien = GiaoVien::where('user_id', Auth::user()->id)->first();
        $lopHoc = LopHoc::where('id', $giaoVien->lop_id)->first();
        return view('danh-sach-lop.index',compact('lopHoc'));
    }
}
