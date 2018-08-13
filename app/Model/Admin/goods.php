<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use DateTime;

class Goods extends Model
{
    protected $table = 'goods';
    protected $pk = 'gid';

    public $timestamps = false;

    protected $fillable = ['cate_cid','gname','stock','price','status','gdesc','addtime','gpic','size','company','color'];

    //商品主表关联商品图片表的方法，方法名称会在页面中遍历类别名称时作为键使用
    public function goodstospic()
    {
        //该关联为一个商品对应多个图片，所以使用关键字hasMany，
        return $this->hasMany('App\Model\Admin\Goodsimg','s_gid');
    }
    //商品主表关联商品类别表的方法
    public function goodstocate()
    {
        //该关联为一个商品只能对应属于一种类别，用到hasOne，
        return $this->hasOne('App\Model\Admin\cate','cid','cate_cid');
    }

    //动态添加时间
    public static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            $dt = new DateTime;
            $model->addtime = $dt->format('y-m-d H:i:s');
            return true;
        });

        // static::updating(function($model) {
        //     $dt = new DateTime;
        //     $model->updated_at = $dt->format('m-d-y H:i:s');
        //     return true;
        // });
    }
}
