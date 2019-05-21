<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Nguoidung extends Authenticatable
{
    use Notifiable;

    const ADMIN = 1;
    const KHACHHANG = 2;
    const KHO = 3;
    const QUANLY = 4;

    protected $fillable=['HoTen','DiaChi','email','SDT','password','Quyen'];
    protected $table = 'nguoidung';

    protected $primaryKey='MaND';

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function binhluans()
    {
        return $this->hasMany('App\Binhluan');
    }

    public function dondathangs()
    {
        return $this->hasMany('App\Dondathang');
    }

    public function phieunhaps()
    {
        return $this->hasMany('App\Phieunhap');
    }
}
