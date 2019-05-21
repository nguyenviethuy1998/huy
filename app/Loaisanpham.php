<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loaisanpham extends Model
{
    protected $fillable=['MaNhom','TenLoai'];
    protected $table = 'loaisanpham';

    protected $primaryKey='MaLoai';

    public function sanphams()
    {
        return $this->hasMany('App\Sanpham','MaLoai');
    }

    public function nhomsanpham()
    {
        return $this->belongsTo('App\Nhomsanpham','MaNhom');
    }
}
