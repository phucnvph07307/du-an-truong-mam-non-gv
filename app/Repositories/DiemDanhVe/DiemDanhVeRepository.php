<?php

namespace App\Repositories\DiemDanhVe;

use App\Models\DiemDanhVe;
use App\Repositories\BaseModelRepository;

class DiemDanhVeRepository extends BaseModelRepository
{
    protected $model;
    public function __construct(
        DiemDanhVe $model
    ) {
        parent::__construct();
        $this->model = $model;
    }

    public function getModel()
    {
        return DiemDanhVe::class;
    }

    public function createdOrUpdate($data = [])
    {
        $mydate = new \DateTime();
        $currrenDate = $mydate->format('Y-m-d');
        $code = 201;

        foreach ($data as $item) {
            $result = $this->model::where('ngay_diem_danh_ve', '=', $currrenDate)
                ->where('hoc_sinh_id', $item->hoc_sinh_id)
                ->first();
            if (!$result) {
                $code = 200;
                $data_create = $this->model::create(
                    [
                        'ngay_diem_danh_ve' => $currrenDate,
                        'hoc_sinh_id' => $item->hoc_sinh_id,
                        'giao_vien_id' => $item->giao_vien_id,
                        'user_id' => $item->user_id,
                        'trang_thai' => $item->trang_thai,
                        'chu_thich' => $item->chu_thich,
                        'nguoi_don_ho_id' => $item->nguoi_don_ho_id,
                        'lop_id' => $item->lop_id,
                        'created_at' => $currrenDate,
                    ]);
            } else {
                $result->giao_vien_id = $item->giao_vien_id;
                $result->trang_thai = $item->trang_thai;
                $result->chu_thich = $item->chu_thich;
                $result->save();
            }
        }

        return $response = ['data' => $data, 'code' => $code];
    }

    public function editData($lop_id)
    {
        $mydate = new \DateTime();
        $currrenDate = $mydate->format('Y-m-d');

        return $this->model::whereDate('created_at', '=', $currrenDate)
            ->where('lop_id', $lop_id)
            ->get();
    }
}
