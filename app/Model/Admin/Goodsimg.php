<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Goodsimg extends Model
{
    
    protected $table = 'gpic';
    protected $pk = 'gsid';

    public $timestamps = false;
    protected $fillable = ['gsid','smgpic'];
}
