<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use InvalidArgumentException;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
use DB;
use DataTables;
class CustomerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {	
	    $data = array();				
        return view('admin.customers', $data);
    }
	
	public function customersdata(){
		$data = Customer::get();
		return 	DataTables::of($data)
				->addIndexColumn()
				->addColumn('firstname', function($user) {
                    return $user->name;
                })
				->addColumn('action', function($user) {
                    return '<a href="">View</a>';
                })
				->rawColumns(['firstname'])
				->make(true);
		
	}
	

}
