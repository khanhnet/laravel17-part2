<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = 'todos';
    protected $fillable = ['title', 'content','user_id'];
    protected $dates = ['created_at','updated_at'];
    public $timestamps = true;
}
