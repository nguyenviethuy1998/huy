<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    protected $fillable=['MaLoai','MaNCC','TenSP','Gia','GiaKM','GhiChu','SoLuongCon','KichThuoc','Anh','MoTa'];
    protected $table = 'sanpham';

    protected $primaryKey='MaSP';

    public function ctdondathangs()
    {
        return $this->hasMany('App\Ctdondathang','MaSP');
    }

    public function phieunhaps()
    {
        return $this->hasMany('App\Phieunhap','MaSP');
    }

    public function binhluans()
    {
        return $this->hasMany('App\Binhluan');
    }

    public function loaisanpham()
    {
        return $this->belongsTo('App\Loaisanpham','MaLoai');
    }

    public function nhacungcap()
    {
        return $this->belongsTo('App\Nhacungcap','MaNCC');
    }
}
