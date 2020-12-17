<?php

namespace App\Repositories\HoatDong;

use App\Models\HoatDong;
use App\Repositories\BaseModelRepository;


class HoatDongRepository extends BaseModelRepository
{
    protected $model;
    public function __construct(
        HoatDong $model
    ) {
        parent::__construct();
        $this->model = $model;
    }

    public function getModel()
    {
        return HoatDong::class;
    }

    public function getTable()
    {
        return 'hoat_dong';
    }
    public function getHoatDongByIdLop($lop_id){
        return $this->model->where('lop_id',$lop_id)->get();
    }
    public function getNamOfHoatDongInLop($lop_id){
        return $this->model->where('lop_id',$lop_id)->select('id_nam_hoc')->groupBy('id_nam_hoc')->orderBy('id_nam_hoc','DESC')->get();
    }

    public function kiemTraTonTaiHoatDongTuan($tuan,$lop,$id_nam_hoc){
        // dd($tuan,$lop,$id_nam_hoc);
        return $this->model->where('lop_id',$lop)->where('tuan',$tuan)->where('id_nam_hoc',$id_nam_hoc)->select('id','type')->first();

    }

}
