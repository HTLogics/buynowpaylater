<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class LoginFrontController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function index()
    {	
	    $data = array();		
        return view('frontend.login', $data);
    }

}
