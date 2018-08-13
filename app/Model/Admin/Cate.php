<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    protected $table = 'cates';
    protected $pk = 'cid';

    public $timestamps = false;

    protected $fillable = ['cname','pid','path'];  
    //商品类别关联商品表，一对多模型关联
    public function catetogoods()
    {
    	//                        被关联模型     被关联表外键    用本表主键关联
    	return $this->hasMany('App\Model\Admin\Goods','cate_cid','cid');
    }
}
