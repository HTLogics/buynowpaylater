<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use InvalidArgumentException;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
use App\Models\Country;
use App\Models\State;
use DB;
use DataTables;
use Validator;
use Response;
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
                    return '<a class="btn btn-sm btn-info" href="'.route('admin.view_customer', $data->id).'"><i class="la la-eye"></i> View</a> <a class="btn btn-sm btn-warning" href="'.route('admin.edit_customer', $data->id).'"><i class="la la-edit"></i> Edit</a> <a class="btn btn-sm btn-elevate btn-danger" href="javascript:void(0);" onclick="confirm_del('.$data->id.')"><i class="la la-trash"></i> Delete</a>';
                })
				->rawColumns(['firstname', 'lastname', 'email', 'phone', 'status', 'action'])
				->make(true);
		
	}
	
	public function getState($country){
		$getState = State::where('country_code', '=', $country)->get();
		return view('admin.state', ['states' => $getState]);
	}
	
	public function addCustomer()
    {	
	    $data = array();
        $getCountries = Country::all();	
        $data['countries'] = $getCountries;		
        return view('admin.add_customers', $data);
    }
	
	public function saveCustomer(Request $request){
		$rules = [
			'firstname' => 'required',
			'lastname' => 'required',
			'email' => 'required|unique:customers',
			'phone' => 'required',
			'address' => 'required',
			'state' => 'required',
			'country' => 'required',
			'zip' => 'required',
		];
		$validator = Validator::make($request->all(), $rules);
		if($validator->fails()){
			return response()->json(array(
									'errors' => $validator->getMessageBag()->toArray(),
									'status' => false,
									'message' => "<div class='alert alert-danger'>There Were Errors.</div>",
								));
		}
		
		$data = array(
			'firstname' => $request->firstname,
			'lastname' => $request->lastname,
			'email' => $request->email,
			'phone' => $request->phone,
			'address' => $request->address,
			'state' => $request->state,
			'country' => $request->country,
			'zip' => $request->zip,
		);
		
		$customer = Customer::create($data);
		if($customer){
			return response()->json(array(
									'redirect' => route('admin.customers'),
									'status' => true,
									'message' => "<div class='alert alert-success'>Customer created. please wait...</div>",	
								));
		}
		
		/*--- if unsuccessful, then show error ---*/
        return response()->json(array('errors' => [ 0 => 'Customer not created. Please try agian !' ]));
	}
	
	public function editCustomer($id)
    {	
	    $data = array();
		$data['customer'] = Customer::find($id);
		$data['countries'] = Country::all();
        return view('admin.edit_customers', $data);
    }
	
	public function updateCustomer(Request $request){
		$rules = [
			'firstname' => 'required',
			'lastname' => 'required',
			'email' => 'required|unique:customers,email,'.$request->id,
			'phone' => 'required',
			'address' => 'required',
			'state' => 'required',
			'country' => 'required',
			'zip' => 'required',
		];
		$validator = Validator::make($request->all(), $rules);
		if($validator->fails()){
			return response()->json(array(
									'errors' => $validator->getMessageBag()->toArray(),
									'status' => false,
									'message' => "<div class='alert alert-danger'>There Were Errors.</div>",
								));
		}
		
		$data = Customer::where('id', '=', $request->id);
		$update_data = array(
			'firstname' => $request->firstname,
			'lastname' => $request->lastname,
			'email' => $request->email,
			'phone' => $request->phone,
			'address' => $request->address,
			'state' => $request->state,
			'country' => $request->country,
			'zip' => $request->zip,
		);
		
		$update = $data->update($update_data);
		if($update){
			return response()->json(array(
									'redirect' => route('admin.customers'),
									'status' => true,
									'message' => "<div class='alert alert-success'>Customer updated.</div>",	
								));
		}
		
		/*--- if unsuccessful, then show error ---*/
        return response()->json(array('errors' => [ 0 => 'Customer not updated. Please try agian !' ]));
	}
	
	function deleteCustomer($id){
		$delete = Customer::where('id', '=', $id)->delete();
		if($delete){
			return redirect()->route('admin.customers')->with('success', "Customer deleted successfully.");
		}
	}
	
    public function viewCustomer($id)
    {	
	    $data = array();
		$data['customer'] = Customer::find($id);
		$data['countries'] = Country::all();
        return view('admin.view_customers', $data);
    }
	
	public function searchCustomer(){
		$data = array();
		if (request('q')) {
			$data['total_count'] = Customer::select('id', 'firstname as text')->where('firstname', 'Like', '%' . request('q') . '%')->count();
			$data['results'] = Customer::select('id', 'firstname as text')->where('firstname', 'Like', '%' . request('q') . '%')->get();
		}	
		return Response::json($data);
	}
	
	
}
