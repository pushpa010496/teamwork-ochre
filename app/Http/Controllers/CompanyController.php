<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Client;
use App\Company;
use \Session;
use App\Project;
use App\Team;
use Ntrust;
use App\CompanyComment;
use App\CompanyBanner;
use App\CompanySlider;
use App\CompanyProfile;
use App\CompanyWebinar;
use App\CompanySocialMediaMarketing;
use App\CompanyRFQ;
use App\CompanyArticle;
use App\CompanyInterview;
use App\CompanyNewsletter;
use App\CompanyContentMarketing;
use App\CompanyEmailMarketing;
use DB;
use App\Event;
use Carbon\Carbon;
use App\CompanyService;
use App\Technology;
use App\Traits\CompanyProfileUpdate;

class CompanyController extends Controller
{
    use CompanyProfileUpdate;
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $model;
    protected $technology;

    public function __construct(Company $model,Technology $technology)
    {
        $this->middleware('auth');

        $this->model = $model;
        $this->technology = $technology;
    }
    public function index(Request $request,$id)
    {
       $data = $this->technologyWiseCompaines($id);
       $technology=Company::where('technology_id',$id)->where('active_flag',1)->get();
       $users = User::get();
        return view('company.companyreport', compact('data','technology','users'));
    }

    public function getcompany()
    {
         $tech = explode(',',Auth::user()->technology);
         $companyType = explode(',',Auth::user()->company_type);
         $companies =Company::whereIn('technology_id',$tech)->whereIn('company_type',$companyType)->orderBy('id','desc')->where('active_flag',1)->get();
        return view('company.index', compact('companies'));
    }
    
    public function getCompanyFilter()
    {
         $tech = explode(',',Auth::user()->technology);
         $companyType = explode(',',Auth::user()->company_type);
         $companies =Company::whereIn('technology_id',$tech)->whereIn('company_type',$companyType)->orderBy('id','desc')->where('active_flag',1)->get();
        return view('company.index', compact('companies'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([       
            'company_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'company_type' => 'required',
        ]);
        $services = $request->service;
        $company = new Company();
        $company->comp_name = $request->input("company_name");     
        $company->email = $request->input("email"); 
        $company->contact_person=$request->input('contact_name');    
        $company->phone = $request->input("phone"); 
        $company->fax = $request->input("fax");        
        $company->country = $request->input("country");     
        $company->website = $request->input("website"); 
        $company->deals = $request->input("deals");        
        $company->technology_id = $request->input("technology");     
        $company->company_type = $request->input("company_type");     
        $company->address = $request->input("address"); 
        $company->company_enquires = $request->input("enquiries"); 
        $company->inception = $request->input("inception");      
        $company->author_id = $request->user()->id;
        $company->services =implode(',',$request->service);
        $company->save();

        //redirect()->url('companyinfo');
        return redirect()->to('companyinfo');
        //return redirect()->route('technocompany.index',$request->input("technology"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(project $project,Company $company)
    {
        $time = \Carbon\Carbon::now()->format('Y-m-d');
          $completedservices=Event::where('company_id',$company->id)
         ->where('start_date', '<=' , $time)
         ->get();

          $pendingservices=Event::where('company_id',$company->id)
         ->where('start_date', '>=' , $time)
         ->get();
        // dd($company);
        return view('company.show',compact('company','completedservices','pendingservices'));

    }
    public function livewareshow(project $project,Company $company)
    {
          $id = \Request::segment(2);
           $company = Company::find($id);
          $time = \Carbon\Carbon::now()->format('Y-m-d');
          $completedservices=Event::where('company_id',$id)
         ->where('start_date', '<=' , $time)
         ->get();

          $pendingservices=Event::where('company_id',$id)
         ->where('start_date', '>=' , $time)
         ->get();

        return view('company.livewareshow',compact('company','completedservices','pendingservices'));
    }

    public function addComment(Request $request,Company $company){

        request()->validate([       
            'message' => 'required',       
        ]);  
         $comment = new CompanyComment();
         $comment->company_id = $company->id;
          $comment->message = $request->message; 
         $comment->user_id =  Auth::user()->id;   
         $comment->save();         
        return redirect()->route('company.show',$company->id);
    }
    
    public function livewareEdit(Company $company)
    {
        dd(11);
        $data =Company::orderBy('id','desc')->get();
        return view('company.livewareedit',compact('company','data'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {   
        $data =Company::orderBy('id','desc')->get();
        return view('company.edit',compact('company','data'));
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Company $company)
    {
        $company->comp_name = $request->input("company_name");     
        $company->email = $request->input("email");     
        $company->phone = $request->input("phone");  
        $company->fax = $request->input("fax");    
        $company->start_date = date("Y-m-d H:i:s",strtotime($request->input("start_date")));
        $company->end_date = date("Y-m-d H:i:s",strtotime($request->input("end_date")));    
        $company->country = $request->input("country");     
        $company->website = $request->input("website");  
        $company->contact_person=$request->input('contact_name');    
        $company->technology_id = $request->input("technology");   
        $company->company_type = $request->input("company_type");   
        $company->company_enquires = $request->input("enquiries");
        $company->deals = $request->input("deals");  
        $company->address = $request->input("address");     
        $company->profile_type = $request->type;
        $company->active_flag = 1;
        $company->author_id = $request->user()->id;
        $company->email1 = $request->email1;
        $company->inception =$request->input("inception"); 
        $company->services =$request->service ? implode(',',$request->service) : '';
        $company->save();
        //dd($company);
        if(!empty($company->plant_company_id)){
            $this->updatePlantCompanyProfile($company->plant_company_id,$company->company_type);
        }elseif(!empty($company->package_company_id)){
            $this->updatePackageCompanyProfile($company->package_company_id,$company->company_type);
        }elseif(!empty($company->defence_company_id)){
            $this->updateDefenceCompanyProfile($company->defence_company_id,$company->company_type);
        }elseif(!empty($company->pulp_company_id)){
            $this->updatePulpCompanyProfile($company->pulp_company_id,$company->company_type);
        }elseif(!empty($company->steel_company_id)){
            $this->updateSteelCompanyProfile($company->steel_company_id,$company->company_type);
        }elseif(!empty($company->hospital_company_id)){
            $this->updateHospitalCompanyProfile($company->hospital_company_id,$company->company_type);
        }elseif(!empty($company->sports_company_id)){
            $this->updateSportsCompanyProfile($company->sports_company_id,$company->company_type);
        }elseif(!empty($company->automotive_company_id)){
            $this->updateAutomotiveCompanyProfile($company->automotive_company_id,$company->company_type);
        }elseif(!empty($company->pharmaceutical_company_id)){
            $this->updatePharmatechCompanyProfile($company->pharmaceutical_company_id,$company->company_type);
        }elseif(!empty($company->plastics_company_id)){
            $this->updatePlasticCompanyProfile($company->plastics_company_id,$company->company_type);
        }
        return redirect()->route('company-list');

        // return redirect()->route('technocompany.index',$request->input("technology"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {

        $status=$client->active_flag;
        if($status=='1'){
        $client->active_flag = 0;
        $message="De-Activated";
        }
        else{
         $client->active_flag = 1;
         $message="Activated";
        }
         $client->save();
        Session::flash('message_type', 'negative');
        Session::flash('message_icon', 'hide');
        Session::flash('message_header', 'Success');
        Session::flash('message', 'The Category ' . $client->dept_name . ' was'.$message);
        return redirect()->route('company.index');
    }

    protected function technologyWiseCompaines($technology)
    {
        $technology = Technology::where('id',$technology)->first();
        return $technology->company_profiles;
    }
    public function filterByTechnoCompaniesOld(Request $request)
    {
        $technology = $request->technology;
        $company =  $request->company;
        $year = $request->year;
        $user = $request->user;
        $deal = $request->deal_amount;
        $technology = Technology::where('id',$technology)->first();
        $result =  $technology->filterByCompanyProfile
                              ->when($user  != null, function ($query) use ($user) {
                                  return $query->where('user_id', $user);
                                 })
                              ->when($deal  != null, function ($query) use ($deal) {
                                  return $query->where('deal_amount', $deal);
                                 })
                              ->when($year  != null, function ($query) use ($year) {
                                  return $query->where('fiscal_year', $year);
                                 })
                              ->when($company  != null, function ($query) use ($company) {
                                  return $query->where('company_id', $company);
                                 })
                              ->take(10);
        if(!empty($result)){
           $data = $result->map(function($query){
            return [
              'company_id'=>$query->company->id,
              'company'=>$query->company->comp_name,
              'sale_persion'=>$query->user ? $query->user->name : '' ,
              'fiscal_year'=>$query->fiscal_year,
              'deal_amount'=>$query->deal_amount,
            ];
        });
        return json_decode($data,true);
        }else{
            return [];
        }
    }
    
    public function filterByTechnoCompanies(Request $request)
    {
        $technology = $request->technology;
        $company =  $request->company;
        $year = $request->year;
        $user = $request->user;
        $deal = $request->deal_amount;
        $technology = Technology::where('id',$technology)->first();
        $data =  $technology->filterByCompanyProfile
                              ->when($user  != null, function ($query) use ($user) {
                                  return $query->where('user_id', $user);
                                 })
                              ->when($deal  != null, function ($query) use ($deal) {
                                  return $query->where('deal_amount', $deal);
                                 })
                              ->when($year  != null, function ($query) use ($year) {
                                  return $query->where('fiscal_year', $year);
                                 })
                              ->when($company  != null, function ($query) use ($company) {
                                  return $query->where('company_id', $company);
                                 })
                              ->take(10);
        if($request->ajax()) {
        // partial view returned in html
          return $html = view('company.filterResults', compact('data'));
        }
    }
    
    public function filterByTechnologieFiscalYear(Request $request)
    {
        $year = $request->year;
        $technologies = Technology::where('category','web')->get();
        $technology = $technologies->map(function($query) use($year){
            return [
                'id'=>$query->id,
                'technology'=>$query->technologie,
                'company'=>$this->companyProfiles($query->companies->pluck('id'),$year),
                'dealvalue'=>'$'.$query->filterByCompanyProfile->where('fiscal_year',$year)->sum('deal_amount'),
                'year'=>$year 
            ];
        });
        return json_decode($technology,true);
    }
    public function companyProfiles($ids,$year)
    {
    return CompanyProfile::whereIn('company_id',$ids)->where('fiscal_year',$year)->count();
    }
    public function filterByCompaines(Request $request)
    {
        $technology = $request->get('technology');
        $companytype =  $request->get('companytype');
        $company =  $request->get('company');
        $tech = explode(',',Auth::user()->technology);
        $companyType = explode(',',Auth::user()->company_type);
         
        $companies =  Company::whereIn('technology_id',$tech)
                              ->whereIn('company_type',$companyType)
                              ->when($technology  != null, function ($query) use ($technology) {
                                  return $query->where('technology_id', $technology);
                                 })
                              ->when($companytype  != null, function ($query) use ($companytype) {
                                  return $query->where('company_type', $companytype);
                                })
                              ->when($company  != null, function ($query) use ($company) {
                                  return $query->where('comp_name', 'like', '%' . $company. '%');
                                 })
                              ->paginate(10);
        if($request->ajax()) {
        // partial view returned in html
          return $html = view('company.filterResults', compact('companies'));
        }
    }
}
