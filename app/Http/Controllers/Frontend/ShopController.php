<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {	
	    $data = array();				
        return view('frontend.shop', $data);
    }

}
