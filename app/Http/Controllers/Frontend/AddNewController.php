<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddNewController extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {	
	    $data = array();				
        return view('frontend.add_new', $data);
    }

}