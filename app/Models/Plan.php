<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
	
	/*
	  @var string
	*/	
	protected $table = 'plan';	
	protected $fillable = ['plan_id','name', 'customer_id', 'cart_id'];
	
}
