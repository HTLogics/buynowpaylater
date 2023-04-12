<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart_item extends Model
{
    use HasFactory;
	/*
		@var string
	*/
	protected $fillable = ['cart_id','product_id','qty'];
}
