<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	
	/*
	*
	*
	@var String
	*
	*/
	protected $table = 'products';	
    use HasFactory;
	
}
