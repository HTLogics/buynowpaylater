<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use InvalidArgumentException;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use DB;
class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
		
	    $data = array();
        $data['totalproducts'] = Product::count();
		$data['products'] = Product::orderBy('id', 'desc')->take(10)->get();
		
        $data['totalcutomers'] = Customer::count();
	    $data['totalcutomers_last30days'] = Customer::where('created_at', '>', now()->subDays(30)->endOfDay())->count();
		$data['customers'] = Customer::orderBy('id', 'desc')->take(10)->get();
		
        $data['totalorders'] = Order::count();
		$data['totalorders_last30days'] = Order::where('created_at', '>', now()->subDays(30)->endOfDay())->count();
        $data['completedorders'] = Order::where('status', 'completed')->count();
        $data['pendingorders'] = Order::where('status', 'pending')->count();
		$data['orderbymonths'] = Order::select(DB::raw("count(*) as count_per_month, date_format(created_at, '%M-%Y') as monthname"))->groupBy('monthname')->get();   
				
        return view('admin.dashboard', $data);
		
    }

}
