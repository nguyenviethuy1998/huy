<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Binhluan extends Model
{
    protected $fillable=['MaND','MaSP','NoiDung'];

    protected $table = 'binhluan';

    protected $primaryKey='MaBL';

    public function nguoidung()
    {
        return $this->belongsTo('App\Nguoidung');
    }
    public function sanpham()
    {
        return $this->belongsTo('App\Sanpham');
    }
}

