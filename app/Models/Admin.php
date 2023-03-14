<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
	use HasApiTokens, HasFactory, Notifiable;
    protected $guard = 'admin';
   
    protected $fillable = [
        'name', 'email', 'phone', 'password', 'role_id', 'photo', 'created_at', 'updated_at', 'remember_token'
    ];
	
	

    protected $hidden = [
        'password', 'remember_token',
    ];
   
}