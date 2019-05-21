<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $fillable=['Anh'];
    protected $table = 'slide';

    protected $primaryKey='id';
}
