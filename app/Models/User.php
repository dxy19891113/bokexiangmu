<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';

    public function user_info()
    {
    	return $this->hasOne('App\Models\User_info','uid');
    }
}
