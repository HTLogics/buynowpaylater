<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use InvalidArgumentException;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use App\Models\Category;
use Validator;
use DataTables;
use Response;
use DB;
use Illuminate\Support\Str;
class ItemsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {	
	    $data = array();				
        return view('admin.items', $data);
    }
	
	public function itemsData(){
		$data = Product::get();
		return 	DataTables::of($data)
				->addIndexColumn()
				->addColumn('status', function($data){
					$status = $data->status == 1 ? '<span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill">Enable</span>' : '<span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill">Disable</span>';
					return "<div class='action-list'>".$status."</div>";					
				})
				->addColumn('action', function($data){					
					return '<a class="btn btn-sm btn-warning" href="'.route('admin.edit_item', $data->id).'"><i class="la la-edit"></i> Edit</a>  <a id="del_product_single" class="btn btn-sm btn-primary" onclick="confirm_del('.$data->id.');" href="javascript:void(0);" data-href="'. route('admin.delete_item', $data->id) .'"><i class="la la-trash"></i> Delete </a>';
				})
				->rawColumns(['status', 'action'])
				->make(true);				
	}
	
	public function addItem(Request $request){
		//get categories
		$getCategories = Category::all();
		
		$childs = array();
		
		foreach($getCategories as $category){			
			$childs[$category['parent']][] = $category;
		}
		
		foreach($getCategories as $category){ 
			$cate_id = $category['id'];
			if (isset($childs[$cate_id])){
				$category->childs = $childs[$category['id']];
			}
		}

		$catgory_tree = $childs[0];
		
		//return view
		return view('admin.add_item', ['categories' => $getCategories, 'catgory_tree' => $catgory_tree]);
	}
	
	public function saveItem(request $request){
		
		/* define rules */
		$rules = [
				"name" => "required",
				"slug" => "required|unique:products,slug",
				"sku" => "required",
				"price" => "required|numeric",			
				"description" => "required",				
			];
		
		$validator = Validator::make($request->all(), $rules);
		/* If validation fails */
		if($validator->fails()){
			return response()->json(array(
				'errors' => $validator->getMessageBag()->toArray(),
				'status' => false,
				'message' => "<div class='alert alert-danger'>There Were Errors.</div>"
			));
		}
				   
		$data = new Product;
		$data->name = $request->name;
		$data->slug = Str::slug($request->slug, '-');
		$data->sku = $request->sku;		
		$data->price = $request->price;	
		$data->description = $request->description;
		$data->status = $request->status;
		if($request->category_ids){
			$data->category_ids = implode(',', $request->category_ids);
		}
		
		$data->photo = $request->photo;
		
		if($data->save()){
			return response()->json(array(
						'redirect' => route('admin.items'),
						'status' => true,
						'message' => "<div class='alert alert-success'>Item created. please wait...</div>",	
					));
		}
		
		/*--- if unsuccessful, then show error ---*/
        return response()->json(array(
								'errors' => [ 0 => 'Something went wrong. Please try again' ],
								'status' => false,
								'message' => "<div class='alert alert-danger'>Something went wrong. Please try again.</div>",	
							));		
		
	}
	
	public function editItem($id){
		//get product
		$getProduct = Product::find($id);
		//get categories
		$getCategories = Category::all();
		$childs = array();
		foreach($getCategories as $category){			
			$childs[$category['parent']][] = $category;
		}
		foreach($getCategories as $category){ 
			$cate_id = $category['id'];
			if (isset($childs[$cate_id])){
				$category->childs = $childs[$category['id']];
			}
		}
		$catgory_tree = $childs[0];
		return view('admin.edit_item', ['products'=>$getProduct, 'categories'=>$getCategories, 'catgory_tree'=> $catgory_tree]);
	}
	
	public function updateItem(Request $request){
		
		/* define rules */
		$rules = [
				"name" => "required",
				"slug" => 'required|unique:products,slug,'.$request->slug.',slug',
				"sku" => "required",
				"price" => "required|numeric",				
				"description" => "required",			
			];
		
		$validator = Validator::make($request->all(), $rules);
		
		/* If validation fails */
		if($validator->fails()){
			return response()->json(array(
								'errors' => $validator->getMessageBag()->toArray(),
								'status' => false,
								'message' => '<div class="alert alert-danger">There were error.</div>'
			));
		}
		
		$data = Product::find($request->id);		
		$data->name = $request->name;
		$data->slug = Str::slug($request->slug, '-');
		$data->sku = $request->sku;
		$data->price = $request->price;	
		$data->description = $request->description;
		$data->status = $request->status;
		if($request->category_ids){
			$data->category_ids = implode(',', $request->category_ids);
		}
		$data->photo = $request->photo;		
		if($data->save()){
			return response()->json(array(
						'redirect' => route('admin.edit_item', $request->id),
						'status' => true,
						'message' => "<div class='alert alert-success'>Item updated. please wait...</div>",	
					));
		}
		
		
		/*--- if unsuccessful, then show error ---*/
        return response()->json(array(
							'errors' => [ 0 => 'Something went wrong. Please try again' ],
							'status' => false,
							'message' => "<div class='alert alert-danger'>Something went wrong. Please try again</div>",	
						));
		
	}
	
	public function photoUpload(request $request){
		if($file = $request->file('photo')){
			$image = time().$file->getClientOriginalName();
			$file->move(public_path('images/product'), $image);
			$image_path = url('/').'/public/images/product/'.$image;
			return response()->json(array(
				"url" => $image_path,
				"filename" => $image,
				"id" => 1,
			));
		}
	}
	
	public function deleteFile(request $request){
		
	   		$image = $request->fileList;
			if($image != null)
			{
				if (file_exists(public_path('images/product').'/'.$image)) {
					unlink(public_path('images/product').'/'.$image);
				}
			}			
    }
	
	public function deleteItem($id){
		$item = Product::find($id );
		if($item){
		    $item->delete();
		}
        return redirect()->route('admin.items')->with('success',"Item deleted successfully.");
	}
	
	public function searchItem(){
		$data = array();
		if (request('q')) {
			$data['total_count'] = Product::select('id', 'name as text')->where('name', 'Like', '%' . request('q') . '%')->count();
			$data['results'] = Product::select('id', 'name as text', 'price')->where('name', 'Like', '%' . request('q') . '%')->get();
		}	
		return Response::json($data);
	}
	
	public function getItem($id){
		//get product
		$data['product'] = Product::find($id);
		return Response::json($data);
	}

}