<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use InvalidArgumentException;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Cart;
use App\Models\Cart_item;
use Validator;

use DB;
class GenerateBillController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {	
	    $data = array();				
        return view('admin.generate_bill', $data);
    }
	
	public function saveCart(Request $request){
		
		//define rules
		$rules = [
			'customer' => 'required',
			"id"    => "required|array",
            "id.*"  => "required",
		];
		
		$validator = Validator::make($request->all(), $rules);
		if($validator->fails()){
			return response()->json(array(
				'errors' => $validator->getMessageBag()->toArray(),
				'status' => false,
				'message' => "<div class='alert alert-danger'>There Were Errors.</div>"
			));
		}
		
		$cart_data = array();
		$cart_data = array(
			'customer_id' => $request->customer,
		);		
		$cart = Cart::create($cart_data);
		if($cart){
			$cart_item_data = array();
			$ids = $request->id;
			$qty = $request->qty;
			$i = 0;
			foreach($ids as $id){
				$cart_item_data = array(
					'cart_id' => $cart->id,
					'product_id' => $id,
					'qty' => $qty[$i],		
				);
				$cart_item = Cart_item::create($cart_item_data);
				$i++;
			}			
			if($cart_item){
				return response()->json(array(
					'redirect' => route('admin.cart', $cart->id),
					'status' => true,
					'message' => "<div class='alert alert-success'>Cart saved. please wait...</div>",
				));
			}			
		}else{
			/*--- if unsuccessful, then show error ---*/
            return response()->json(array('errors' => [ 0 => 'Cart not saved. Please try agian !' ]));
		}
		/*--- if unsuccessful, then show error ---*/
        return response()->json(array('errors' => [ 0 => 'Cart not saved. Please try agian !' ]));
	}
	
	public function updateCart(Request $request, $cartid){		

		$cart_item_data = array();
		$product_ids = $request->product_id;
		$qty = $request->qty;
		$i = 0;
		foreach($product_ids as $product_id){
			$cart_item_data = array(
				'qty' => $qty[$i],		
			);
			$cart_item = Cart_item::where('cart_id', '=', $cartid)->where('product_id', '=', $product_id)->update($cart_item_data);
			$i++;
		}			
		if($cart_item){
			return response()->json(array(
				'redirect' => route('admin.cart', $cartid),
				'status' => true,
				'message' => "<div class='alert alert-success'>Cart updated. please wait...</div>",
			));
		}			
	
		/*--- if unsuccessful, then show error ---*/
        return response()->json(array('errors' => [ 0 => 'Cart not saved. Please try agian !' ]));
	}
	
	public function getCart($id){
		
		$data = array();
		$data['cart'] = Cart::where('id', '=', $id)->first();
		if(!isset($data['cart'])){
			abort(404);
		}			
		$data['cart_items'] = Cart_item::where('cart_id', '=', $id)->get();
		$customer_id = $data['cart']->customer_id;
		$data['customer'] = Customer::where('id', '=', $customer_id)->first();
		return view('admin.cart', $data);
		
	}
	
	public function removeCartItem($product_id, $cart_id){		
		$delete = Cart_item::where('product_id', '=', $product_id)->delete();
        return redirect()->route('admin.cart', $cart_id)->with('success', "Item removed successfully.");
	}
	
	public function getCheckout($id){
		
		$data = array();
		$data['cart'] = Cart::where('id', '=', $id)->first();
		if(!isset($data['cart'])){
			abort(404);
		}			
		$data['cart_items'] = Cart_item::where('cart_id', '=', $id)->get();
		$customer_id = $data['cart']->customer_id;
		$data['customer'] = Customer::where('id', '=', $customer_id)->first();
		return view('admin.checkout', $data);
		
	}
	

}
