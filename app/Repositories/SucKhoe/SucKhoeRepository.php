<?php

namespace App\Repositories\SucKhoe;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use App\Models\SucKhoe;
use Carbon\Carbon;

class SucKhoeRepository extends BaseRepository 
{
    protected $model;
    public function __construct(
        SucKhoe $model
    ) {
        parent::__construct();
        $this->model = $model;
    }

    public function getTable()
    {
        return 'suc_khoe';
    }

    public function getAllKhoi(){
		return  $this->model->get();
    }

    public function getDotMoiNhat()
    {   
        $date_now = Carbon::now('Asia/Ho_Chi_Minh');
        $query = DB::table('dot_kham_suc_khoe')
        ->where('dot_kham_suc_khoe.thoi_gian', '<=', $date_now->toDateString())
        ->orderBy('id', 'desc')->limit(1)->first();
        return $query;
    }

    public function store($data)
    {
        return $this->model::insert($data);
    }

    public function getSucKhoeTheoHocSinh($id)
    {
        $query = $this->table
        ->join('hoc_sinh', 'hoc_sinh.id', '=', 'suc_khoe.hoc_sinh_id')
        ->join('dot_kham_suc_khoe', 'dot_kham_suc_khoe.id', '=', 'suc_khoe.dot_id')
        ->select(
            'hoc_sinh.*',
             'suc_khoe.chieu_cao', 
             'suc_khoe.can_nang', 
            'suc_khoe.id as suc_khoe_id',
             'dot_kham_suc_khoe.ten_dot',
             'dot_kham_suc_khoe.thoi_gian'
             )
        ->where('suc_khoe.hoc_sinh_id', $id)
        ->get();
        
        return $query;
    }

    public function updateSk($data, $id)
    {   
        unset($data['_token']);
        $query = $this->table
        ->where('suc_khoe.id', $id)
        ->update($data);
        return $query;
    }

    public function getDotKhamSK()
    {
        $data = DB::table('dot_kham_suc_khoe')->get();
        return $data;
    }


    

    

    
}