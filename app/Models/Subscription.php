<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
	
	/*
	  @var string
	*/	
	protected $table = 'subscription';	
	protected $fillable = ['subscription_id','customer_id', 'order_id', 'cart_id'];
	
}
