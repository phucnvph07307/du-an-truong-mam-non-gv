<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\HocSinh;
use App\Models\Notification;
use App\Models\ThongBao;
use App\Models\NoiDungThongBao;
use Carbon\Carbon;
use App\Repositories\NotificationRepository;

class JobGuiThongBaoDiemDanhVe implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $listHocSinh;
    protected $auth_id;
    protected $NotificationRepository;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($listHocSinh, $auth_id, $NotificationRepository)
    {
        $this->listHocSinh = $listHocSinh;
        $this->auth_id     = $auth_id;
        $this->NotificationRepository = $NotificationRepository;
    }

    /**     
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach($this->listHocSinh as $item){
            $hoc_sinh = HocSinh::find($item->hoc_sinh_id);
            $content =    $item->trang_thai == 1 ? 'Cháu ' . $hoc_sinh->ten . ' đã được Bố mẹ đón, Lời nhắn: "' . 
                                                    $item->chu_thich . '" ' . $item->thoi_gian_don : 
                        ( $item->trang_thai == 2 ? 'Cháu ' . $hoc_sinh->ten . ' đã được Người đón hộ đón, Lời nhắn: "' . 
                                                    $item->chu_thich . '" ' . $item->thoi_gian_don : 
                        ( $item->trang_thai == 3 ? 'Cháu ' . $hoc_sinh->ten . ' không đến lớp, ' . 
                                                    $item->thoi_gian_don : 
                                                   'Cháu ' . $hoc_sinh->ten . ' được Trả muộn, Lời nhắn: "' . 
                                                    $item->chu_thich . '" ' . $item->thoi_gian_don));

            $noidung_thongbao_id = NoiDungThongBao::insertGetId([
                'title'     => 'Thông báo điểm danh về',
                'content'   => $content,
                'auth_id'   => 0,
                'type'      => 3
            ]);
            $thongbao_id = ThongBao::insertGetId([
                'thongbao_id' => $noidung_thongbao_id,
                'user_id'      => $hoc_sinh->user_id
            ]);

            $data_thong_bao = [
                'device'    => $hoc_sinh->User->device,
                'title'     => 'Thông báo điểm danh về',
                'content'   => $content,
                'user_id'   => $hoc_sinh->user_id,
                'id_hs'     => $item->hoc_sinh_id,
                'role'      => 3,
                'auth_id'   => 0,
                'route'     => json_encode([
                    'name_route' => 'ShowThongBao',
                    'id'         => $noidung_thongbao_id,
                    'id_hs'      => $item->hoc_sinh_id,
                ])
            ];
            Notification::create($data_thong_bao);
            $this->NotificationRepository->notificationApp([$data_thong_bao]);
        }
    }
}
