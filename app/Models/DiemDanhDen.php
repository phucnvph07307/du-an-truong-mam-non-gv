<?php

namespace App\Models;

use App\Models\HocSinh;
use Illuminate\Database\Eloquent\Model;

class DiemDanhDen extends Model
{
    protected $table = "diem_danh_den";
    protected $fillable = [
        'ngay_diem_danh_den',
        'hoc_sinh_id',
        'giao_vien_id',
        'chu_thich',
        'trang_thai',
        'type',
        'lop_id',
        'phieu_an'
    ];
    public function student()
    {
        return $this->belongsTo(HocSinh::class, 'hoc_sinh_id', 'id');
    }
}
