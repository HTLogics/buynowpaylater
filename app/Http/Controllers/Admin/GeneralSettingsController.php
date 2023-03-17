<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\Facades\DB;
use Auth;
use App\Models\GeneralSettings;
use App\Models\Contact;
use Validator;
use Datatables;


class GeneralSettingsController extends Controller
{
	//call constructor
    public function __construct(){
		$this->middleware('auth:admin');
	}
	
	public function logo(){		
	
	    $data = array();
		$data['general_setting'] = GeneralSettings::find(1);
		return view('admin.logo', $data);
		
	}	
	
	public function uploadLogo(request $request){
		//define rule
		$rules = [				
				"logo" => "required|mimes:jpeg,jpg,png,gif,svg|max:4096",
		];
		
		$validator = Validator::make($request->all(), $rules);
		if($validator->fails()){
			return response()->json(array(
				"errors" => $validator->getMessageBag()->toArray(),
				"status" => false,
				"message" => "<div class='alert alert-danger'>There were error. please try again</div>"
			));
		}
		
		//create object 		
		$data = GeneralSettings::find($request->id);
		$data->logo = $request->logo;
		
		//upload logo
		if($file = $request->file('logo')){
			$logo = time().$file->getClientOriginalName();
			$file->move(public_path('images/logo'), $logo);
			$data->logo = $logo;
		}
		
		/*--- if data saved, then show success and redirect  ---*/
		if($data->save()){
			return response()->json(array(
				"status" => true,
				"redirect" => route("admin.logo_image"),
				"message" => "<div class='alert alert-success'>Logo added. please wait...</div>"				
			));
		}
		
		/*--- if unsuccessful, then show error ---*/
		return response()->json(array(
				"errors" => $validator->getMessageBag()->toArray(),
				"status" => false,
				"message" => "<div class='alert alert-danger'>There were error. please try again</div>"
			));
	}
	
	public function uploadFooterLogo(request $request){
		//define rule
		$rules = [				
				"footer_logo" => "required|mimes:jpeg,jpg,png,gif,svg|max:4096",
		];
		
		$validator = Validator::make($request->all(), $rules);
		if($validator->fails()){
			return response()->json(array(
				"errors" => $validator->getMessageBag()->toArray(),
				"status" => false,
				"message" => "<div class='alert alert-danger'>There were error. please try again</div>"
			));
		}
		
		//create object 		
		$data = GeneralSettings::find($request->id);
		$data->footer_logo = $request->footer_logo;
		
		//upload logo
		if($file = $request->file('footer_logo')){
			$footer_logo = time().$file->getClientOriginalName();
			$file->move(public_path('images/logo'), $footer_logo);
			$data->footer_logo = $footer_logo;
		}
		
		/*--- if data saved, then show success and redirect  ---*/
		if($data->save()){
			return response()->json(array(
				"status" => true,
				"redirect" => route("admin.logo_image"),
				"message" => "<div class='alert alert-success'>Logo added. please wait...</div>"				
			));
		}
		
		/*--- if unsuccessful, then show error ---*/
		return response()->json(array(
				"errors" => $validator->getMessageBag()->toArray(),
				"status" => false,
				"message" => "<div class='alert alert-danger'>There were error. please try again</div>"
			));
	}
	
	public function uploadEmailLogo(request $request){
		//define rule
		$rules = [				
				"email_logo" => "required|mimes:jpeg,jpg,png,gif,svg|max:4096",
		];
		
		$validator = Validator::make($request->all(), $rules);
		if($validator->fails()){
			return response()->json(array(
				"errors" => $validator->getMessageBag()->toArray(),
				"status" => false,
				"message" => "<div class='alert alert-danger'>There were error. please try again</div>"
			));
		}
		
		//create object 		
		$data = GeneralSettings::find($request->id);
		$data->email_logo = $request->email_logo;
		
		//upload logo
		if($file = $request->file('email_logo')){
			$email_logo = time().$file->getClientOriginalName();
			$file->move(public_path('images/logo'), $email_logo);
			$data->email_logo = $email_logo;
		}
		
		/*--- if data saved, then show success and redirect  ---*/
		if($data->save()){
			return response()->json(array(
				"status" => true,
				"redirect" => route("admin.logo_image"),
				"message" => "<div class='alert alert-success'>Logo added. please wait...</div>"				
			));
		}
		
		/*--- if unsuccessful, then show error ---*/
		return response()->json(array(
				"errors" => $validator->getMessageBag()->toArray(),
				"status" => false,
				"message" => "<div class='alert alert-danger'>There were error. please try again</div>"
			));
	}
	
	public function favicon(){		
	
	    $data = array();
		$data['general_setting'] = GeneralSettings::find(1);
		return view('admin.favicon', $data);
		
	}
	
	public function uploadFavicon(request $request){		
	
	    //define rule
		$rules = [				
				"favicon" => "required|mimes:jpeg,jpg,png,gif,svg|max:4096",
		];
		
		$validator = Validator::make($request->all(), $rules);
		if($validator->fails()){
			return response()->json(array(
				"errors" => $validator->getMessageBag()->toArray(),
				"status" => false,
				"message" => "<div class='alert alert-danger'>There were error. please try again</div>"
			));
		}
		
		//create object 		
		$data = GeneralSettings::find($request->id);
		$data->favicon = $request->favicon;
		
		//upload logo
		if($file = $request->file('favicon')){
			$favicon = time().$file->getClientOriginalName();
			$file->move(public_path('images/logo'), $favicon);
			$data->favicon = $favicon;
		}
		
		/*--- if data saved, then show success and redirect  ---*/
		if($data->save()){
			return response()->json(array(
				"status" => true,
				"redirect" => route("admin.favicon"),
				"message" => "<div class='alert alert-success'>Logo added. please wait...</div>"				
			));
		}
		
		/*--- if unsuccessful, then show error ---*/
		return response()->json(array(
				"errors" => $validator->getMessageBag()->toArray(),
				"status" => false,
				"message" => "<div class='alert alert-danger'>There were error. please try again</div>"
			));
		
	}
	
	public function footer(){		
	
	    $data = array();
		$data['general_setting'] = GeneralSettings::find(1);
		return view('admin.footer', $data);
		
	}
	
	public function updateFooter(request $request){		
	
	    //define rule
		$rules = [				
				"footer_copyright" => "required",
		];
		
		$validator = Validator::make($request->all(), $rules);
		if($validator->fails()){
			return response()->json(array(
				"errors" => $validator->getMessageBag()->toArray(),
				"status" => false,
				"message" => "<div class='alert alert-danger'>There were error. please try again</div>"
			));
		}
		
		//create object 		
		$data = GeneralSettings::find($request->id);
		$data->footer_text = $request->footer_text;
		$data->footer_copyright = $request->footer_copyright;
		
		/*--- if data saved, then show success and redirect  ---*/
		if($data->save()){
			return response()->json(array(
				"status" => true,
				"redirect" => route("admin.footer"),
				"message" => "<div class='alert alert-success'>Text Updated.</div>"				
			));
		}
		
		/*--- if unsuccessful, then show error ---*/
		return response()->json(array(
				"errors" => $validator->getMessageBag()->toArray(),
				"status" => false,
				"message" => "<div class='alert alert-danger'>There were error. please try again</div>"
			));
		
	}
	
	public function socialLink(){		
	
	    $data = array();
		$data['general_setting'] = GeneralSettings::find(1);
		return view('admin.social_links', $data);
		
	}
	
	public function updateSocialLinks(request $request){
		
		//create object 		
		$data = GeneralSettings::find($request->id);
		$data->facebook = $request->facebook;
		$data->twitter = $request->twitter;
		$data->instagram = $request->instagram;
		$data->youtube = $request->youtube;
		$data->linkedin = $request->linkedin;
		$data->vimeo = $request->vimeo;
		$data->pinterest = $request->pinterest;
		$data->tumblr = $request->tumblr;
		$data->snapchat = $request->snapchat;
		$data->telegram = $request->telegram;
		
		/*--- if data saved, then show success and redirect  ---*/
		if($data->save()){
			return response()->json(array(
				"status" => true,
				"redirect" => route("admin.update_social_links"),
				"message" => "<div class='alert alert-success'>Social Links Saved.</div>"				
			));
		}
		
		/*--- if unsuccessful, then show error ---*/
		return response()->json(array(
				"errors" => $validator->getMessageBag()->toArray(),
				"status" => false,
				"message" => "<div class='alert alert-danger'>There were error. please try again</div>"
			));
		
	}
	
	public function contacts(){		
	
	    $data = array();
		$data['contacts'] = Contact::find(1);
		return view('admin.contacts', $data);
		
	}
	
	public function updateContacts(request $request){
		
		//define rule
		$rules = [				
				"main_title" => "required",
				"email" => "required",
		];
		
		$validator = Validator::make($request->all(), $rules);
		if($validator->fails()){
			return response()->json(array(
				"errors" => $validator->getMessageBag()->toArray(),
				"status" => false,
				"message" => "<div class='alert alert-danger'>There were error. please try again</div>"
			));
		}
		
		//create object 		
		$data = Contact::find($request->id);
		$data->main_title = $request->main_title;
		$data->subtitle = $request->subtitle;
		$data->description = $request->description;
		$data->email = $request->email;
		$data->contact_number = $request->contact_number;
		$data->google_map_script = $request->google_map_script;
		$data->head_office_address = $request->head_office_address;
		$data->office_address_2 = $request->office_address_2;
		
		/*--- if data saved, then show success and redirect  ---*/
		if($data->save()){
			return response()->json(array(
				"status" => true,
				"redirect" => route("admin.update_social_links"),
				"message" => "<div class='alert alert-success'>Contact Settings Saved.</div>"				
			));
		}
		
		/*--- if unsuccessful, then show error ---*/
		return response()->json(array(
				"errors" => $validator->getMessageBag()->toArray(),
				"status" => false,
				"message" => "<div class='alert alert-danger'>There were error. please try again</div>"
			));
		
	}
}
