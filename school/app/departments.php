<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class departments extends Model
{
   	protected $table='departments';
   	protected $fillable = ['id','code','name','email','tel'];
}
