<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
	protected $table='permissions';
    public function users(){
        return $this->belongsToMany('App\User', 'user_permissions', 'permission_id', 'user_id');
    }
}
