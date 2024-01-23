<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use App\Category;
use \Session;
use Ntrust;

class CategoryController extends Controller
{
	protected $model;
	public function __construct(Category $model)
	{
		        $this->middleware('auth');

		$this->model = $model;
	}
    public function index(Request $request)
    {
    	//print_r(Ntrust::hasRole('admin'));exit();
       	if($request->get('search')){
		$search = \Request::get('search'); //<-- we use global request to get the param of URI
 		$categories = Category::where('name', 'like', '%'.$search.'%')->where('active_flag', 1)->paginate(20);
   		 }else{
   		 	
   		 		$categories = Category::where('active_flag', 1)->orderBy('id', 'desc')->paginate(10);
   		 
   		 	
   			
		 }

		$active = Category::where('active_flag', 0);
		return view('categories.index', compact('categories', 'active'));
    }

    public function create()
	{
		
            return view('categories.create',compact('category'));		
	}
	public function store(Request $request)
	{
		//return $request;
		$category = new category();
		
		$category->name = ucfirst($request->input("name"));			
		$category->short_description = ucfirst($request->input("short_description"));		
		$category->active_flag = $request->input("active_flag");
		
		$category->save();
		
		return redirect()->route('categories.index');
	}
	public function show(Category $category)
	{
		return view('categories.show', compact('category'));

	}
	public function edit(Category $category)
	{
		
	    $categories = Category::all();
	   // $technologies = Technology::where('active_flag', 1)->orderBy('tech_name')->pluck('tech_name', 'id');
		    
        return view('categories.edit', compact('category','categories'));
	}
	public function update(Request $request, Category $category)
	{
		
		$category->name = ucfirst($request->input("name"));		
		
		$category->active_flag =$request->input('active_flag');
		$category->author_id = $request->user()->id;
		
		$category->save();
	//	$category->technology()->sync($request->input("technologies"));

		Session::flash('message_type', 'warning');
		Session::flash('message_icon', 'checkmark');
		Session::flash('message_header', 'Success');
		Session::flash('message', "The Category ". $category->name . " was Updated.");

		return redirect()->route('categories.index');
	}

	public function destroy(Category $category)
	{
		$category->active_flag = 0;
		$category->save();

		Session::flash('message_type', 'negative');
		Session::flash('message_icon', 'hide');
		Session::flash('message_header', 'Success');
		Session::flash('message', 'The Category ' . $category->name . ' was De-Activated.');

		return redirect()->route('categories.index');
	}
	public function reactivate(Category $category){
		$category->active_flag = 1;
		$category->save();

		Session::flash('message_type', 'success');
		Session::flash('message_icon', 'checkmark');
		Session::flash('message_header', 'Success');
		Session::flash('message', 'The Category ' . $category->name . ' was Re-Activated.');

		return redirect()->route('categories.index');
	}
	
}
