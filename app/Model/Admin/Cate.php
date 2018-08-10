<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    protected $table = 'cates';
    protected $pk = 'cid';

    public $timestamps = false;

    protected $fillable = ['cname','pid','path'];

    
}
