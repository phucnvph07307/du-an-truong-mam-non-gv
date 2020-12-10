<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Khoi;

class NamHoc extends Model
{
    protected $table = 'nam_hoc';
    protected $fillable = ['name', 'start_date', 'end_date','backup'];

}
