<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
	
	protected $fillable = ['order_number','customer_id', 'customer_name', 'customer_email', 'customer_phone', 'customer_address', 'customer_city', 'customer_country', 'customer_zip', 'method', 'total_qty', 'total_amount', 'pay_amount', 'pay_id', 'payment_status', 'status', 'subscription_id','pay_currency','method_type','invoice_id'];
}
