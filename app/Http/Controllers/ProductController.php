<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use App\CompanyProfile;
use App\Product;
use App\Company;
use \Session;
use App\Category;
use Ntrust;
use Mail;
use App\Mail\ProductsMail;
use App\Http\Requests\ProductRequest;


class ProductController extends Controller
{
	protected $model;
	public function __construct(Product $model)
	{
		$this->middleware('auth');
		$this->model = $model;
	}
    public function index(Request $request)
    {
 	
    	  $user = Auth::user();

    	  $company = Company::where('email',$user->email)->get(); 
   		  $profiles = CompanyProfile::where('company_id',@$company[0]->id)->get();
       	if($request->get('search')){
		$search = \Request::get('search');
 			$products = Product::whereHas('company' , function($query) use($search) {
 			$query->where('comp_name', 'like', '%'.$search.'%');})
	 		->where('title', 'like', '%'.$search.'%')
	 		->paginate(20);
   		 }else{
   		 	if(Ntrust::hasRole('admin')){
   		 		$products = Product::orderBy('id', 'desc')->paginate(10);   		 		
   		 		$companylist = Company::where('active_flag',1)->pluck('comp_name','id');
   		 	}
   		 	else{
   		 		
   		 		$products = Product::where('company_id',@$company[0]->id)->orderBy('id', 'desc')->paginate(10);
   		 		$companylist = Company::where('active_flag',1)->where('email',$user->email)->pluck('comp_name','id');
   		 	}
   			
		 }		
 	    $categories = Category::where('active_flag',1)->where('id','!=',22)->pluck('name','id');
		$active = Product::where('active_flag', 0);
		
		return view('products.index', compact('products', 'active','companylist','categories','company','profiles'));
    }

    public function create()
	{
		
		return redirect()->route('products.index');
		// $companylist = Company::where('active_flag',1)->pluck('comp_name','id');
		// return view('products.create',compact('companylist'));		
	}
	
	public function store(ProductRequest $request, User $user)
	{
		
	// return redirect()->route('products.success',3);
 		$user = Auth::user();
		$companyc = new Product();

		// request()->validate([
		// 	'title' => 'required|max:250|unique:company_profiles',
		// 	'company_id' => 'required',
		// 	'category_id' => 'required',
		// 	'company_profile_id' =>'required',
  //           'small_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20000',           
  //           'big_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20000',           
  //           'tech_spec_pdf' => 'max:20000',
  //           'url'           =>'required|max:250' 
  //       ]);
		$cpm = Company::find($request->input("company_id"));
		$company_path = 'suppliers/'.str_slug($cpm->comp_name); 

        if($request->file('small_image')){
        $small_imageName = preg_replace('/\s+/','-',time().'-small-'.$request->file('small_image')->getClientOriginalName());
        request()->small_image->move(public_path($company_path.'/products'), $small_imageName);
		$companyc->small_image = $small_imageName;	
	    }
	    if($request->file('big_image')){
        $big_imageName = preg_replace('/\s+/','-',time().'-big-'.$request->file('big_image')->getClientOriginalName());
        request()->big_image->move(public_path($company_path.'/products'), $big_imageName);
		$companyc->big_image = $big_imageName;	
	    }
	    if($request->file('tech_spec_pdf')){
        $tech_spec_pdfName = preg_replace('/\s+/','-',time().'-'.$request->file('tech_spec_pdf')->getClientOriginalName());
        request()->tech_spec_pdf->move(public_path($company_path.'/products'), $tech_spec_pdfName);
		$companyc->tech_spec_pdf = $tech_spec_pdfName;	
	    }
		
		$companyc->title = ucfirst($request->input("title"));		
		$companyc->title_tag = ucfirst($request->input("title_tag"));
		$companyc->category_id = $request->input("category_id");
		$companyc->alt_tag = ucfirst($request->input("alt_tag"));
		$companyc->description = ucfirst($request->input("description"));
		$companyc->url = str_slug($request->input("url"));
		$companyc->googleplus = $request->input("googleplus");
		$companyc->linkedin = $request->input("linkedin");
		$companyc->facebook = $request->input("facebook");
		$companyc->twitter = $request->input("twitter");
		$companyc->keyword1 = $request->input("keyword1");
		$companyc->keyword2 = $request->input("keyword2");
		$companyc->keyword3 = $request->input("keyword3");
		$companyc->keyword4 = $request->input("keyword4");
		$companyc->keyword5 = $request->input("keyword5");
		$companyc->active_flag = $request->active_flag;
		$companyc->stage = 1;
		$companyc->author_id = $request->user()->id;
		$companyc->type = 'client';
		$comp = Company::find($request->input("company_id"));
		$comp->companyproduct()->save($companyc);
		$compro = CompanyProfile::find($request->input("company_profile_id"));
		$compro->pproduct()->save($companyc);

		// $category = Category::find($request->input("category_id"));
		// $companyc->categories()->save($category);
			/*Mail::send('emails.registration.admin', $data, function($message) use ($data) {
        $message->to('venkatasiva@ochre-media.com');
        $message->cc(['naveen@ochre-media.com','nag@ochre-media.com']);
        $message->subject('New User Signed Up for Plant Automation Technology!');
        });
        Client Mail
         Mail::send('emails.registration.client', $data, function($message) use ($data) {
        $message->to($data['email']);*/
		Session::flash('message_type', 'success');
        Session::flash('message_icon', 'checkmark');
        Session::flash('message_header', 'Success');
        Session::flash('message', "Success! You have successfully Added product.");

		if($request->save == 'yes'){
		
			return redirect()->route('products.index')->with('save', 'Success!!');
		}elseif ($request->next == 'yes') {
			
				$success = 'Product Added successfully';	
				return \Redirect::route('companypressrealeses.index')->with('next', 'Success!!');
		}else{
  		$data=[
            'name' => $user->name,
            'product'=>$request->input("title")
        ];
        Mail::to($user->email)
            ->send(new ProductsMail($data));
			return redirect()->route('products.index')->with('moderation', 'Success!!');
		}
	}
	public function show(Product $product)
	{
		return view('products.show', compact('product'));
	}
	public function edit(Product $product){   
		
		$companylist = Company::where('active_flag',1)->pluck('comp_name','id');
		$profilelist = CompanyProfile::where('active_flag',1)->where('company_id',$product->company_id)->pluck('title','id');
		$categories = Category::where('active_flag',1)->pluck('name','id');

        $companylist = Company::where('active_flag',1)->where('email',Auth::User()->email)->pluck('comp_name','id');
        return view('products.edit', compact('product','companylist','profilelist','categories'));
	}
	public function update(Request $request, Product $product, User $user){
		
		// request()->validate([
		// 	'title' => 'required|max:250|unique:company_profiles',
		// 	'company_id' => 'required',
		// 	'category_id' => 'required',
		// 	'company_profile_id' =>'required',
		// 	'description' =>'required',
  //           // 'small_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20000',           
  //           // 'big_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20000',           
  //           'tech_spec_pdf' => 'max:20000',
  //           'url'           =>'required|max:250'           
  //       ]);
		$cpm = Company::find($request->input("company_id"));
		$company_path = 'temp_companies/'.str_slug($cpm->comp_name); 

        if($request->file('small_image')){
        $small_imageName = preg_replace('/\s+/','-',time().'-small-'.$request->file('small_image')->getClientOriginalName());
        request()->small_image->move(public_path($company_path.'/products'), $small_imageName);
		$product->small_image = $small_imageName;	
	    }
	    if($request->file('big_image')){
        $big_imageName = preg_replace('/\s+/','-',time().'-big-'.$request->file('big_image')->getClientOriginalName());
        request()->big_image->move(public_path($company_path.'/products'), $big_imageName);
		$product->big_image = $big_imageName;	
	    }
	    if($request->file('tech_spec_pdf')){
        $tech_spec_pdfName = preg_replace('/\s+/','-',time().'-'.$request->file('tech_spec_pdf')->getClientOriginalName());
        request()->tech_spec_pdf->move(public_path($company_path.'/products'), $tech_spec_pdfName);
		$product->tech_spec_pdf = $tech_spec_pdfName;	
	    }
		
		$product->title = ucfirst($request->input("title"));		
		$product->title_tag = ucfirst($request->input("title_tag"));
		$product->category_id = $request->input("category_id");
		$product->alt_tag = ucfirst($request->input("alt_tag"));
		$product->description = ucfirst($request->input("description"));
		$product->url = str_slug($request->input("url"));
		$product->googleplus = $request->input("googleplus");
		$product->linkedin = $request->input("linkedin");
		$product->facebook = $request->input("facebook");
		$product->twitter = $request->input("twitter");
		$product->keyword1 = $request->input("keyword1");
		$product->keyword2 = $request->input("keyword2");
		$product->keyword3 = $request->input("keyword3");
		$product->keyword4 = $request->input("keyword4");
		$product->keyword5 = $request->input("keyword5");
		$product->active_flag = $request->active_flag;		
		$product->author_id = $request->user()->id;
		
				
		$comp = Company::find($request->input("company_id"));
		$comp->companyproduct()->save($product);
		$compro = CompanyProfile::find($request->input("company_profile_id"));
		$compro->pproduct()->save($product);

		/*$category = Category::find($request->input("category_id"));
		$product->categories()->sync($category);*/

		// Session::flash('message_type', 'warning');
		// Session::flash('message_icon', 'checkmark');
		// Session::flash('message_header', 'Success');
		// Session::flash('message', "The company profile \"<a href='products/$product->slug'>" . $product->title . "</a>\" was Updated.");

		return redirect()->route('products.index')->with('update', 'Success!!');
	}



	public function destroy(Product $products,$id){
		$products = Product::findOrFail($id);
		$products->active_flag = 0;
		$products->stage = 0;
		$products->save();

		Session::flash('message_type', 'negative');
		Session::flash('message_icon', 'hide');
		Session::flash('message_header', 'Success');
		Session::flash('message', 'The company profile ' . $products->title . ' was De-Activated.');

		return redirect()->route('products.index');
	}
	public function reactivate(Product $products,$id){
		$products = Product::findOrFail($id);
		$products->active_flag = 1;
		$products->stage = 1;
		$products->save();
		Session::flash('message_type', 'success');
		Session::flash('message_icon', 'checkmark');
		Session::flash('message_header', 'Success');
		Session::flash('message', 'The company profile ' . $products->title . ' was Re-Activated.');

		return redirect()->route('products.index');
	}
	public function selectAjax(Request $request){

    	if($request){
    		$profiles = CompanyProfile::where('company_id',$request->company_id)->where('active_flag',1)->pluck("title","id")->all();

    		$data = view('ajax-select',compact('profiles'))->render();
    		return response()->json(['options'=>$data]);
       	}
   	}
   	public function metatag(Request $request, $id){
   		$meta = Product::findOrFail($id);
		$meta->meta_title = $request->input("meta_title");
		$meta->meta_keywords = $request->input("meta_keywords");
		$meta->meta_description = $request->input("meta_description");
		$meta->og_title = $request->input("og_title");
		$meta->og_description = $request->input("og_description");
		$meta->og_keywords = $request->input("og_keywords");
		$meta->og_image = $request->input("og_image");
		$meta->og_video = $request->input("og_video");
		$meta->meta_region = $request->input("meta_region");
		$meta->meta_position = $request->input("meta_position");
		$meta->meta_icbm = $request->input("meta_icbm");
		$meta->save();

		Session::flash('message_type', 'success');
		Session::flash('message_icon', 'checkmark');
		Session::flash('message_header', 'Success');
		Session::flash('message', 'The Product ' . $meta->meta_title . ' Metatags was added.');

		return redirect()->route('products.index');
	}
}
