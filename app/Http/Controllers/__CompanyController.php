<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use App\Company;
use \Session;
use Ntrust;

class companyController extends Controller
{
	protected $model;
	public function __construct(company $model)
	{
		        $this->middleware('auth');

		$this->model = $model;
	}
    public function index(Request $request)
    {
       	if($request->get('search')){
		$search = \Request::get('search'); //<-- we use global request to get the param of URI
 		$companies = Company::where('comp_name', 'like', '%'.$search.'%')->paginate(20);
   		 }else{
   		 	if(Ntrust::hasRole('admin')){
   		 		$companies = Company::where('active_flag', 0)->orderBy('id', 'desc')->paginate(10);
   		 	}
   		 	else{
   		 		$companies = Company::where('author_id',Auth::user()->id)->orderBy('id', 'desc')->paginate(10);
   		 	}
   			
		 }
		$active = Company::where('active_flag', 0);
		return view('companies.index', compact('companies', 'active'));
    }

    public function create()
	{
		$company = $this->model->get();
		//print_r($company);
		//exit();
            return view('companies.create',compact('company'));		
	}
	public function store(Request $request, User $user)
	{
		$company = new company();

		request()->validate([
			'comp_name' => 'alpha_dash|required|max:255|unique:companies',
            'comp_logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20000'
        ]);
		
		if($request->file('comp_logo')){
        $imageName = preg_replace('/\s+/','-',time().'-'.$request->file('comp_logo')->getClientOriginalName());
        request()->comp_logo->move(public_path('company'), $imageName);
		$company->comp_logo = $imageName;	
	    }

		$company->comp_name = ucfirst($request->input("comp_name"));		
		$company->contact_name = ucfirst($request->input("contact_name"));		
		$company->email = $request->input("email");		
		$company->phone = $request->input("phone");		
		$company->start_date = date("Y-m-d H:i:s",strtotime($request->input("start_date")));
		$company->end_date = date("Y-m-d H:i:s",strtotime($request->input("end_date")));	
		$company->country = $request->input("country");		
		$company->website = $request->input("website");		
		$company->fax = $request->input("fax");		
		$company->address = $request->input("address");		
		$company->active_flag = 0;
		$company->author_id = $request->user()->id;
		
		$company->save();
		Session::flash('message_type', 'warning');
		Session::flash('message_icon', 'checkmark');
		Session::flash('message_header', 'Success');
		Session::flash('message', "The company \"<a href='companies/$company->slug'>" . $company->comp_name . "</a>\" was Created.");
		return redirect()->route('companies.index');
	}
	public function show(company $company)
	{
		return view('companies.show', compact('company'));

	}
	public function edit(company $company)
	{
		
	    $companies = Company::all();
	   // $technologies = Technology::where('active_flag', 1)->orderBy('tech_name')->pluck('tech_name', 'id');
		    
        return view('companies.edit', compact('company','companies'));
	}
	public function update(Request $request, company $company, User $user)
	{
		 request()->validate([
			'comp_name' => 'required|max:255',
            'comp_logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20000'
        ]);
		
		if($request->file('comp_logo')){
        $imageName = preg_replace('/\s+/','-',time().'-'.$request->file('comp_logo')->getClientOriginalName());
        request()->comp_logo->move(public_path('company'), $imageName);
		$company->comp_logo = $imageName;	
	    }

		$company->comp_name = ucfirst($request->input("comp_name"));		
		$company->contact_name = ucfirst($request->input("contact_name"));		
		$company->email = $request->input("email");		
		$company->phone = $request->input("phone");		
		$company->start_date = date("Y-m-d H:i:s",strtotime($request->input("start_date")));		
		$company->end_date = date("Y-m-d H:i:s",strtotime($request->input("end_date")));		
		$company->country = $request->input("country");		
		$company->website = $request->input("website");		
		$company->fax = $request->input("fax");		
		$company->address = $request->input("address");		
		$company->active_flag = 1;
		$company->author_id = $request->user()->id;
	
		$company->save();
	//	$company->technology()->sync($request->input("technologies"));

		Session::flash('message_type', 'warning');
		Session::flash('message_icon', 'checkmark');
		Session::flash('message_header', 'Success');
		Session::flash('message', "The company \"<a href='companies/$company->slug'>" . $company->comp_name . "</a>\" was Updated.");

		return redirect()->route('companies.index');
	}

	public function destroy(Company $company)
	{
		$company->active_flag = 0;
		$company->save();
		$company->companyprofile()->update(['active_flag' => 0]);
		$company->companycatalogs()->update(['active_flag' => 0]);
		$company->companypress()->update(['active_flag' => 0]);
		$company->companywp()->update(['active_flag' => 0]);
		$company->companyvideo()->update(['active_flag' => 0]);
		$company->companyproduct()->update(['active_flag' => 0]);
		Session::flash('message_type', 'negative');
		Session::flash('message_icon', 'hide');
		Session::flash('message_header', 'Success');
		Session::flash('message', 'The Company ' . $company->comp_name . ' was De-Activated.');

		return redirect()->route('companies.index');
	}
		public function reactivate(Company $company,$id)
	{

		$company = Company::findOrFail($id);
		$company->active_flag = 1;
		$company->save();
		$company->companyprofile()->update(['active_flag' => 1]);
		$company->companycatalogs()->update(['active_flag' => 1]);
		$company->companypress()->update(['active_flag' => 1]);
		$company->companywp()->update(['active_flag' => 1]);
		$company->companyvideo()->update(['active_flag' => 1]);
		$company->companyproduct()->update(['active_flag' => 1]);
		Session::flash('message_type', 'success');
		Session::flash('message_icon', 'checkmark');
		Session::flash('message_header', 'Success');
		Session::flash('message', 'The Company ' . $company->comp_name . ' was Re-Activated.');

		return redirect()->route('companies.index');
	}
}
