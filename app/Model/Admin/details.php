<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class details extends Model
{
    //
    protected $table = 'details';
    protected $primaryKey = 'gid';
    public $timestamps = false;


    public function orders()
    {
    	return $this->belongsTo('App\Model\Admin\orders','oid','id');
    }


    public function goods()
    {
        return $this->hasMany('App\Model\Admin\goods','gid','gid');
    }

}
