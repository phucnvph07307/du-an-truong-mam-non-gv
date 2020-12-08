<?php

namespace App\Repositories\DiemDanhDen;

use App\Models\DiemDanhDen;
use App\Repositories\BaseModelRepository;

class DiemDanhDenRepository extends BaseModelRepository
{
    protected $model;
    public function __construct(
        DiemDanhDen $model
    ) {
        parent::__construct();
        $this->model = $model;
    }

    public function getModel()
    {
        return DiemDanhDen::class;
    }

    public function createdOrUpdate($data = [], $type = null)
    {
        $mydate = new \DateTime();
        $currrenDate = $mydate->format('Y-m-d');
        $code = 201;
        foreach ($data as $item) {
            $result = $this->model::whereDate('ngay_diem_danh_den', '=', $currrenDate)
                ->where('hoc_sinh_id', $item->hoc_sinh_id)
                ->where('type', $type)
                ->first();
            $phieu_an = 2;
            if($type == 1){
                $phieu_an = $item->trang_thai == 2 ? $phieu_an : ($item->phieu_an == true ? 1 : 2);
            }

            if (!$result) {
                $code = 200;
                $data_create = $this->model::create(
                    [
                        'ngay_diem_danh_den' => $currrenDate,
                        'hoc_sinh_id' => $item->hoc_sinh_id,
                        'type' => $type,
                        'giao_vien_id' => $item->giao_vien_id,
                        'trang_thai' => $item->trang_thai,
                        'chu_thich' => $item->chu_thich,
                        'lop_id' => $item->lop_id,
                        'phieu_an' => $phieu_an,
                    ]);
            } else {
                $result->giao_vien_id = $item->giao_vien_id;
                $result->trang_thai = $item->trang_thai;
                $result->phieu_an = $phieu_an;
                $result->chu_thich = $item->chu_thich;
                $result->save();
            }
        }
        return $response = ['data' => $data, 'code' => $code];
    }

    public function editData($lop_id, $type)
    {
        $mydate = new \DateTime();
        $currrenDate = $mydate->format('Y-m-d');

        return $this->model::whereDate('created_at', '=', $currrenDate)
            ->where('lop_id', $lop_id)
            ->where('type', $type)
            ->get();
    }
}
