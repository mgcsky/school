<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class classes extends Model
{
   	protected $table='classes';
   	protected $fillable = ['id','code','name','department','email','tel'];
}
