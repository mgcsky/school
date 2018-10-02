<?php

namespace App;

use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
class Admin extends Model implements Authenticatable
{
    use Notifiable;
    use AuthenticableTrait;
// The authentication guard for admin
     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $primaryKey = 'id';
    protected $table   = 'admin';
    protected $fillable = [
        'email', 'password',
    ];
     /**
      * The attributes that should be hidden for arrays.
      *
      * @var array
      */
    protected $hidden = [
        'password', 'remember_token',
    ];
}