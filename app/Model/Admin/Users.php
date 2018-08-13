<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
   
    protected $table ='users';

    protected $primarykey = 'id';

    public $timestamps = false;

    protected $guarded =[];

    
    public function info()
    {
        return $this->hasOne('App\Model\Admin\Usersinfo','users_id');
    }
}
