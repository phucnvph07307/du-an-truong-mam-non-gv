<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThongBao extends Model
{
    protected $table = "thong_bao";
    protected $fillable = ['user_id', 'thongbao_id'];

    public function NoiDungThongBao()
    {
        return $this->belongsTo('App\Models\NoiDungThongBao', 'thongbao_id', 'id');
    }
}
