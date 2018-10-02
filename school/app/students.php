<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class students extends Model
{
   	protected $table='students';
   	protected $fillable = ['id','code','name','class','email','tel'];
}
