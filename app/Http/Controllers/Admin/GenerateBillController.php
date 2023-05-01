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
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Subscription;
use App\Models\Plan;
use Validator;
use DB;
use Razorpay\Api\Api;
use Session;
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
		$data['subscriptions'] = Subscription::where('customer_id', '=', $customer_id)->where('cart_id', '=', $id)->get();
		return view('admin.checkout', $data);
		
	}
	
    public function placeOrder(Request $request,  $cartid){
		
		//define rules
		$rules = [
			'customer_id' => 'required',
			'subscription_id' => 'required',
			"product_id"    => "required|array",
            "product_id.*"  => "required",
		];
		
		$validator = Validator::make($request->all(), $rules);
		if($validator->fails()){
			return response()->json(array(
				'errors' => $validator->getMessageBag()->toArray(),
				'status' => false,
				'message' => "<div class='alert alert-danger'>There Were Errors.</div>"
			));
		}
		
		$order_data = array();
		$order_data = array(
		    'order_number' => $this->generateUniqueCode(),
			'customer_id' => $request->customer_id,
			'customer_name' => $request->customer_name,
			'customer_email' => $request->customer_email,
			'customer_phone' => $request->customer_phone,
			'customer_address' => $request->customer_address,
			'customer_state' => $request->customer_state,
			'customer_country' => $request->customer_country,
			'customer_zip' => $request->customer_zip,
			'method' => $request->payment_method,
			'total_qty' => $request->total_qty,
			'subscription_id' => $request->subscription_id,
			'total_amount' => str_replace(',', '', $request->total_amount),
			'pay_amount' => str_replace(',', '', $request->total_amount),
			'payment_status' => 'pending',
			'status' => 'pending',
		);		
		$order = Order::create($order_data);		
		if($order){
			$order_item_data = array();
			$ids = $request->product_id;
			$product_name = $request->product_name;
			$price = $request->price;
			$qty = $request->qty;
			$i = 0;
			foreach($ids as $id){
				$order_item_data = array(
					'order_id' => $order->id,
					'product_id' => $id,
					'product' => $product_name[$i],	
					'qty' => $qty[$i],
					'price' => $price[$i],
				);
				$order_item = Order_item::create($order_item_data);
				$i++;
			}			
			if($order_item){
				return response()->json(array(
					'redirect' => route('admin.payment_collect', $order->id),
					'status' => true,
					'message' => "<div class='alert alert-success'>Order Placed. please wait...</div>",
				));
			}			
		}else{
			/*--- if unsuccessful, then show error ---*/
            return response()->json(array('errors' => [ 0 => 'Order not placed. Please try agian !' ]));
		}
		/*--- if unsuccessful, then show error ---*/
        return response()->json(array('errors' => [ 0 => 'Order not saved. Please try agian !' ]));
	}
	
	/**
     * Write code on Method
     *
     * @return response()
     */
    public function generateUniqueCode()
    {
        do {
            $code = random_int(1000000, 9999999);
        } while (Order::where("order_number", "=", $code)->first());
  
        return $code;
    }
	
	public function createPlan($customer_id, $cart_id, $amount)
    {   
	    $data = array();
	    $data['customer_id'] = $customer_id;
	    $data['cart_id'] = $cart_id;
	    $data['amount'] = $amount/4;
        return view('admin.create_plan_form', $data);
    }
	
	public function savePlan(Request $request){
		
		//define rules
		$rules = [
			'name' => 'required',
			"amount"    => "required",
            "period"  => "required",
            "customer_id"  => "required",
            "cart_id"  => "required",
		];
		
		$validator = Validator::make($request->all(), $rules);
		if($validator->fails()){
			return response()->json(array(
				'errors' => $validator->getMessageBag()->toArray(),
				'status' => false,
				'message' => "<div class='alert alert-danger'>There Were Errors.</div>"
			));
		}
		
		$amount = $request->amount*100;
		$api = new Api (env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
		$data =  $api->plan->create(
			array(
				'period' => 'monthly', 
				'interval' => 1, 
				'item' => array(
					'name' => $request->name,
					'description' => $request->name.' subscription plan',
					'amount' => $amount,
					'currency' => 'INR'
				),
				'notes'=> array('key1'=> 'value3','key2'=> 'value2')
				)
			);
		if($data->id){
			    $plan_data = array();
				$plan_data = array(
					'name' => $request->name,
					'plan_id' => $data->id,
					'customer_id' => $request->customer_id,
					'cart_id' => $request->cart_id,
				);		
				$plan = Plan::create($plan_data);
				return response()->json(array(
					'plan_id' => $data->id,
					'url' => route('admin.create_subscription', ['plan_id' => $data->id, 'customer_id' => $request->customer_id, 'cart_id' => $request->cart_id]),
					'status' => true,
					'message' => "<div class='alert alert-success'>Plan created. please wait...</div>",
				));
		}
		else{
			/*--- if unsuccessful, then show error ---*/
            return response()->json(array('errors' => [ 0 => 'Plan not created. Please try agian !' ]));
		}
		
		/*--- if unsuccessful, then show error ---*/
        return response()->json(array('errors' => [ 0 => 'Plan not saved. Please try agian !' ]));

	}
	
	public function createSubscription($plan_id,$customer_id,$cart_id)
    {   
	    $data = array();
	    $data['plan_id'] = $plan_id;
	    $data['customer_id'] = $customer_id;
	    $data['cart_id'] = $cart_id;
        return view('admin.add_subscription_form', $data);
    }	
	
	public function saveSubscription(Request $request){
		
		//define rules
		$rules = [
			'plan_id' => 'required',
			"customer_id"    => "required",
			"cart_id"    => "required",
		];
		
		$validator = Validator::make($request->all(), $rules);
		
		if($validator->fails()){
			
			return response()->json(array(
				'errors' => $validator->getMessageBag()->toArray(),
				'status' => false,
				'message' => "<div class='alert alert-danger'>There Were Errors.</div>"
			));
			
		}
		
		$api = new Api (env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
		$timestamp = now();
		$data = $api->subscription->create(
		
			array(
				'plan_id' => $request->plan_id,
				'customer_notify' => 1,
				'quantity'=>1,
				'total_count' => 4,
				'start_at' => $timestamp,
			)
			
		);

		if($data->id){
			    $subs_data = array();
				$subs_data = array(
					'subscription_id' => $data->id,
					'customer_id' => $request->customer_id,
					'cart_id' => $request->cart_id,
				);		
				$plan = Subscription::create($subs_data);
				return response()->json(array(
					'subscription_id' => $data->id,
					'customer_id' => $request->customer_id,
					'status' => true,
					'message' => "<div class='alert alert-success'>Subscription created. please wait...</div>",
				));
		}
		else{
			/*--- if unsuccessful, then show error ---*/
            return response()->json(array('errors' => [ 0 => 'Subscription not created. Please try agian !' ]));
		}
		
		/*--- if unsuccessful, then show error ---*/
        return response()->json(array('errors' => [ 0 => 'Subscription not saved. Please try agian !' ]));
	}
	
	public function paymentCollect($id){
		$data = array();
		$data['order'] = Order::where('id', '=', $id)->where('payment_status', '=', 'pending')->first();
		if(!isset($data['order'])){
			abort(404);
		}
		return view('admin.collect_payment', $data);
	}
	
	public function paymentResponse(Request $request) {
		$data =array();
		$input = $request->all();
		$api = new Api (env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
		$payment = $api->payment->fetch($input['razorpay_payment_id']);
		if(count($input) && !empty($input['razorpay_payment_id'])) {
			try {				
				$response = $api->payment->fetch($input['razorpay_payment_id']);
				if($response['status'] == "captured"){
					$status = 'completed';
				}else{
					$status = 'pending';
				}
				$payment = Order::where('id', '=', $input['order_id'])->update([
					'pay_id' => $response['id'],
					'pay_amount' => $response['amount']/100,
					'payment_status' => $response['status'],
					'pay_currency' => $response['currency'],
					'method_type' => $response['method'],
					'invoice_id' => $response['invoice_id'],
					'status' => $status,
				]);
			} catch(Exceptio $e) {
				$response = $api->payment->fetch($input['razorpay_payment_id']);
				Session::put('error',$e->getMessage());
				return view('admin.payment_response', $response);
			}
		}
		$data['response'] = $response;		
		if($response['status'] == "captured"){
			Session::flash('success', 'Payment Successful');
		}else{
			Session::flash('error', 'Payment Error');
		}
        return view('admin.payment_response', $data);
	}
	
	public function getSubscriptionData(Request $request) {
		
		$api = new Api (env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
		$subscription = $api->subscription->fetch($request['subscription_id']);
		
		$api2 = new Api (env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
		$plan = $api2->plan->fetch($subscription->plan_id);
		
		$data['subscription'] = $subscription;	
		$data['plan'] = $plan;
		
        return view('admin.get_subscription_data', $data);
		
	}
	
	public function getSubscriptionsSelect(Request $request){
		
		$data = array();		
		$data['subscriptions'] = Subscription::where('customer_id', '=', $request['customer_id'])->where('cart_id', '=', $request['cart_id'])->get();
		return view('admin.get_subscriptions_select', $data);
		
	}
	
	/*test purpose razorpay*/
	public function razorTest(Request $request) {
		return view('admin.razor_test');		
	}
	
	public function create_plan(){
		$api = new Api (env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
		$data =  $api->plan->create(
			array(
				'period' => 'monthly', 
				'interval' => 1, 
				'item' => array(
					'name' => 'Test monthly 1 plan',
					'description' => 'Description for the monthly 1 plan',
					'amount' => 600,
					'currency' => 'INR'
				),
				'notes'=> array('key1'=> 'value3','key2'=> 'value2')));
		print_r($data->id);
	}
	
	public function create_sub(){
		$api = new Api (env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
		$timestamp = now();
		$data = $api->subscription->create(
		array(
			'plan_id' => 'plan_LgQUpCLhKYDHRb',
			'customer_notify' => 1,
			'quantity'=>1,
			'total_count' => 4,
			'start_at' => $timestamp,
		));
		print_r($data->id);
	}
	
	public function razorResponse(Request $request) {
		$input = $request->all();
		$api = new Api (env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
		$payment = $api->payment->fetch($input['razorpay_payment_id']);
		if(count($input) && !empty($input['razorpay_payment_id'])) {
			try {
				$response = $api->payment->fetch($input['payment_id'])->capture(array('amount' => $payment['amount']));
				$payment = Payment::create([
					'r_payment_id' => $response['id'],
					'method' => $response['method'],
					'currency' => $response['currency'],
					'user_email' => $response['email'],
					'amount' => $response['amount']/100,
					'json_response' => json_encode((array)$response)
				]);
			} catch(Exceptio $e) {
				return $e->getMessage();
				Session::put('error',$e->getMessage());
				return redirect()->back();
			}
		}
		Session::put('success', 'Payment Successful!');
		return redirect()->back();
	}
}
