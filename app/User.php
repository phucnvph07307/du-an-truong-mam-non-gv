<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'token', 'time_code',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function thongTinNguoiDonHo()
    {
        return $this->hasMany('App\Models\NguoiDonHo');
    }

    public function ThongBao()
    {
        return $this->hasMany('App\Models\ThongBao');
    }

    public function profile()
    {
        return $this->hasOne('App\Models\GiaoVien');
    }
}
