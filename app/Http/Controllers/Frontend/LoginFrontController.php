<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginFrontController extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {	
	    $data = array();				
        return view('frontend.login', $data);
    }

}
