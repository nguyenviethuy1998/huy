<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nhacungcap extends Model
{
    protected $fillable=['TenNCC','DiaChi','SDT','Email'];
    protected $table = 'nhacungcap';

    protected $primaryKey='MaNCC';

    public function sanphams()
    {
        return $this->hasMany('App\Sanpham');
    }
}
