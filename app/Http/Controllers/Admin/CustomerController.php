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
				->addColumn('status', function($data) {
					$status = $data->status == 1 ? '<span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill">Active</span>' : '<span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill">Deactive</span>';
					return '<div class="action-list">'.$status.'</div>';                   
                })
				->addColumn('action', function($data) {
                    return '<a class="btn btn-sm btn-info" href="'.route('admin.customers', $data->id).'"><i class="la la-eye"></i> View</a> <a class="btn btn-sm btn-warning" href="'.route('admin.customers', $data->id).'"><i class="la la-edit"></i> Edit</a>';
                })
				->rawColumns(['firstname', 'lastname', 'email', 'phone', 'status', 'action'])
				->make(true);
		
	}
	

}
