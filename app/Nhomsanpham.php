<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nhomsanpham extends Model
{
    protected $fillable=['TenNhom'];
    protected $table = 'nhomsanpham';

    protected $primaryKey='MaNhom';

    public function loaisanphams()
    {
        return $this->hasMany('App\Loaisanpham','MaNhom');
    }



}