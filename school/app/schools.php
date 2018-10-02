<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class schools extends Model
{
   	protected $table='schools';
   	protected $fillable = ['id','schoolname','code','email','address'];
}
