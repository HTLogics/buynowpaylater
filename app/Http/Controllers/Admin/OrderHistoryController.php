<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use InvalidArgumentException;
use Illuminate\Support\Facades\Hash;
use App\Models\Order;
use App\Models\Order_item;
use DataTables;

use DB;
class OrderHistoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {	
	    $data = array();		
        return view('admin.order_history', $data);
    }
	
	public function orderData(){
		$data = Order::get();
		return DataTables::of($data)
		       ->addIndexColumn()
			   ->addColumn('order_number', function($data){
				   $order_number = '<a href="'.route("admin.order_view", $data->id).'">#'.$data->order_number.'</a>';
				   return $order_number;
			   })
			   ->addColumn('total_amount', function($data){
				   $total_amount =  number_format($data->total_amount, 2);
				   return $total_amount;
			   })
			   ->addColumn('status', function($data){
					$status = $data->status == 'completed' ? '<span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill">Completed</span>' : '<span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill">Pending</span>';
					return "<div class='action-list'>".$status."</div>";					
				})
			   ->addColumn('action', function($data){					
					return '<a class="btn btn-sm btn-warning" href="'.route("admin.order_view", $data->id).'"><i class="la la-eye"></i> View</a>';
				})
				->rawColumns(['order_number', 'total_amount', 'status','action'])
				->make(true);
	}
	
	public function viewOrder($id){
		if(!Order::where('id',$id)->exists())
        {
            return redirect()->route('admin.dashboard')->with('unsuccess',__('Sorry the page does not exist.'));
        }
		$data = array();
		$data['order_data'] = Order::findOrFail($id);
		$data['order_items'] = Order_item::where('order_id', '=',$id)->get();
		return view('admin.order_view', $data);
		
	}

}
