<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class Customer extends Model
{
    use HasFactory;
	use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'firstname', 'lastname', 'email', 'phone', 'address', 'country', 'state', 'created_at', 'updated_at', 'zip', 'status'
    ];
}
