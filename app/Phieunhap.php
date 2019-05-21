<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phieunhap extends Model
{
    protected $fillable=['MaSP','NgayNhap','SoLuong','GiaNhap','ThanhTien','MaND'];
    protected $table = 'phieunhap';

    protected $primaryKey='MaPN';

    public function sanpham()
    {
        return $this->belongsTo('App\Nhacungcap','MaSP');
    }

    public function nguoidung()
    {
        return $this->belongsTo('App\Nguoidung','MaND');
    }
}
