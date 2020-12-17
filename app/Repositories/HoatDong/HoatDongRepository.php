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
        return $this->model->where('lop_id',$lop_id)->select('id_nam_hoc')->groupBy('id_nam_hoc')->get();
    }

}
