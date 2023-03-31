<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use Illuminate\Support\Arr;

class LoginController extends Controller
{
	
	public function __construct()
    {
       $this->middleware('guest:admin', ['except' => ['logout']]);
    }
	
    public function showLoginForm()
    {
      return view('admin.login');
    }
	
	public function login(Request $request)
    {
        /*--- Validation Section ---*/
        $rules = [
                  'user'   => 'required',
                  'password' => 'required'
                ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
			return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        /*--- Validation Section Ends  ---*/

		/*--- Attempt to log the user in   ---*/
		if (Auth::guard('admin')->attempt(['user' => $request->user, 'password' => $request->password], $request->remember)) {
			// if successful, then redirect to dashboard
			return response()->json(route('admin.dashboard'));
		}

		/*--- if unsuccessful, then show error ---*/
        return response()->json(array('errors' => [ 0 => 'Credentials Doesn\'t Match !' ]));
		
    }
	
	public function showForgotForm()
    {
      return view('admin.forgot');
    }
	
	public function forgot(Request $request)
    {
      
		$input =  $request->all();
		if (Admin::where('email', '=', $request->email)->count() > 0) {
			
			// user found
			$admin = Admin::where('email', '=', $request->email)->firstOrFail();
			
			// Available alpha caracters
			$characters = 'abcdefghijklmnopqrstuvwxyz';

			// generate a pin based on 2 * 7 digits + a random character
			$pin = mt_rand(1000000, 9999999)
				. mt_rand(1000000, 9999999)
				. $characters[rand(0, strlen($characters) - 1)];

			$string = str_shuffle($pin);
			$string = 'recurringbills';
			$input['password'] = bcrypt($string);
			$admin->update($input);
			$subject = "Reset Password Request";
			$msg = "Your New Password is : ".$string;
			$headers = "From: Recurring <admin@recurring.co.za>";
			mail($request->email,$subject,$msg,$headers);
			return response()->json('Your Password Reseted Successfully. Please Check your email for new Password.');
			
		}
		else{
			// user not found
			return response()->json(array('errors' => [ 0 => 'No Account Found With This Email.' ]));    
		}  
    }
	
	public function logout(){
		Auth::guard('admin')->logout();
        return redirect()->route('login');
		//return redirect()->route('admin.login');
	}
	
}
