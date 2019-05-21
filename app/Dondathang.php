<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dondathang extends Model
{
    const CHUAXULY = 1;
    const DAXULY= 2;
    const HUYBO = 3;
    const HOANLAI = 4;
    const VANCHUYEN = 5;
    const HOANTHANH = 6;

    protected $fillable=['MaND','TrangThai','DiaChiNN','SDTNN','TenNN','NgayDat','NgayGiao','TongTien'];
    protected $table = 'dondathang';

    protected $primaryKey='MaDDH';

    public function ctdondathangs()
    {
        return $this->hasMany('App\Ctdondathang');
    }

    public function nguoidung()
    {
        return $this->belongsTo('App\Nguoidung');
    }
}
