<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Usersinfo extends Model
{
	
    protected $table = 'users_info';

    protected $primarykey = 'iid';

    public $timestamps = false;

    protected $guarded =[];

    
    public function users()
    {
        return $this->belongsTo('App\Model\Admin\Users','users_id');
    }


}
