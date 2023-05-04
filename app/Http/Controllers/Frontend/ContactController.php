<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Mail;

class ContactController extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {	
	    $data = array();				
        return view('frontend.contact', $data);
    }
	
	public function submitContact(Request $request){
		
		/*validation rules*/
		$rules = [
			"name" => "required",
			"email" => "email|required",
			"mobile" => "required",
			"service" => "required",
			"note" => "required"
		];
		
		$validator = Validator::make($request->all(), $rules);
		if($validator->fails()){
			return response()->json(array(
			    "errors" => $validator->getMessageBag()->toArray(),
				"status" => false,
				"message" => "<div class='alert alert-danger'>There Were Errors.</div>"
			));
		}
		

		$data = array(
				'name'=> $request->name,
				'email'=> $request->email,
				'mobile'=> $request->mobile,
				'service'=> $request->service,
				'note'=> $request->note,
			);
			
		$send = Mail::send('frontend.contact_mail', $data, function($message) {
			$message->to('daljit@htlogics.com', 'Safe Buy')->subject('Safe Buy - Contact');
			$message->from('jon623126@gmail.com','Safe Buy');
		});
	  
		if($send){
			return response()->json(array(
				"status" => true,
				"message" => "<div class='alert alert-success'>Message sent successfully. We will get back to you soon.</div>",
			));
		}else{
			return response()->json(array(
				"status" => false,
				"message" => "<div class='alert alert-danger'>There Were Errors.</div>",
			));
		}
		
		
	}

}
