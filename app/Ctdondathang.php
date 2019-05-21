<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ctdondathang extends Model
{
    protected $fillable=['MaDDH','MaSP','SoLuong','DonGia','ThanhTien'];
    protected $table = 'ctdondathang';

    protected $primaryKey='MaCTDDH';

    public function sanpham()
    {
        return $this->belongsTo('App\Sanpham','MaSP');
    }

    public function dondathang()
    {
        return $this->belongsTo('App\Dondathang');
    }
}
