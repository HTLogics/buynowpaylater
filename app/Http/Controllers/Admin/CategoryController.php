<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use InvalidArgumentException;
use App\Models\Category;
use DB;
use DataTables;
use Validator;
use Illuminate\Support\Str;
class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {	
	    $data = array();		
        return view('admin.category', $data);
    }
	
	public function categoriesData(){
		$data = Category::get();
		return DataTables::of($data)
				->addIndexColumn()
				->editColumn('parent', function(Category $data) {  
					if ($data->parent){
						$category_name = Category::select('name')->find($data->parent);
						if($category_name){
							return $category_name->name;
						}else{
							return "--";
						}
					}else{
						return 'Parent';
					}								
				})
				->addColumn('status', function($data) {
					$status = $data->status == 1 ? '<span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill">Active</span>' : '<span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill">Deactive</span>';
					return '<div class="action-list">'.$status.'</div>';                   
                })
				->addColumn('action', function($data) {
                    return '<a class="btn btn-sm btn-warning" href="'.route('admin.edit_category', $data->id).'"><i class="la la-edit"></i> Edit</a> <a class="btn btn-sm btn-elevate btn-danger" href="javascript:void(0);" onclick="confirm_del('.$data->id.')"><i class="la la-trash"></i> Delete</a>';
                })
				->rawColumns(['name', 'slug', 'parent', 'status', 'action'])
				->make(true);
	}
	
	public function addCategory(){        		
        $getCategories  = Category::where('parent', '=', 0)->get();
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
		return view('admin.add_category', [ 'categories' => $getCategories, 'catgory_tree'=> $catgory_tree ]);
	}
	
	public function saveCategory(Request $request){
		
		/* define rules */
		$rules = [
			'name' => 'required',
			'slug' => 'required|unique:categories,slug',
		];	
	
		$validator = Validator::make($request->all(), $rules);
		/* If validation fails */
		if($validator->fails()){
			return response()->json(array(
									'errors' => $validator->getMessageBag()->toArray(), 
									'status' => false,
									'message' => "<div class='alert alert-danger'>There Were Errors.</div>",								
								));
		}
		
		$data = new Category;
		$data->name = $request->name;
		$data->description = $request->description;
		$data->status = $request->status;		
		$data->slug = Str::slug($request->slug, '_');
		
		if($request->parent){
			$data->parent = $request->parent;
		}else{
			$data->parent = 0;
		}	
		
		if($data->save()){
			return response()->json(array(
									'redirect' => route('admin.category'),
									'status' => true,
									'message' => "<div class='alert alert-success'>Category created. please wait...</div>",	
								));
		}
		
		/*--- if unsuccessful, then show error ---*/
        return response()->json(array(
									'errors' => [ 0 => 'Something went wrong. Please try again' ],
									'status' => false,
									'message' => "<div class='alert alert-danger'>Something went wrong. Please try again</div>",	
								));		
		
	}
	
	public function editCategory($id){
		$getCategoryData = Category::Where('id', '=', $id)->first();
		$getCategoriesData = Category::Where('parent', '=', 0)->get();
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
		return view('admin.edit_category', ['category' => $getCategoryData, 'categories' => $getCategoriesData, 'catgory_tree'=> $catgory_tree]);
	}
	
	public function updateCategory(request $request){
		/* define rules */
		$rules = [
			'name' => 'required',
            'slug' => 'required|unique:categories,slug,'. $request->id,			
		];
		
		$validator = Validator::make($request->all(), $rules);
		/* If validation fails */
		if($validator->fails()){
			return response()->json(array(
									'errors' => $validator->getMessageBag()->toArray(), 
									'status' => false,
									'message' => "<div class='alert alert-danger'>There Were Errors.</div>",								
								));
		}
		
		$data = Category::where('id', '=', $request->id);

		$updatedata = array(
			'name' => $request->name,
			'description' => $request->description,
			'slug' => Str::slug($request->slug, '_'),
		);
				
		if($request->parent){
			$updatedata['parent'] = $request->parent;
		}else{
			$updatedata['parent'] = 0;
		}
				
		$updatedata['status'] = $request->status;
		
		if($data->update($updatedata)){
			return response()->json(array(
									'redirect' =>route('admin.edit_category', $request->id),
									'status' => true,
									'message' => "<div class='alert alert-success'>Category updated. please wait...</div>",	
								));
		}
		
		
		/*--- if unsuccessful, then show error ---*/
        return response()->json(array(
								'errors' => [ 0 => 'Something went wrong. Please try again' ],
								'status' => false,
								'message' => "<div class='alert alert-danger'>Something went wrong. Please try again</div>",	
								));
	}
	
	public function deleteCategory($id){
		$data = Category::where('id', '=', $id)->delete();
		return redirect()->route('admin.category')->with('success', 'Category deleted successfully.');		
	}

}