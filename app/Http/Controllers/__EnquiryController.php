<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Client;
use App\Enquiry;
use App\Company;
use \Session;
use App\Project;
use App\Team;
use Ntrust;
use App\CompanyComment;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data=Enquiry::get();
         $company=Company::get();

         return view('enquiry.index',compact('company','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $company=Company::get();

        return view('enquiry.create',compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->all();

        $companyenquiry = new Enquiry();
        
        $companyenquiry->full_name = $request->input("full_name");     
        $companyenquiry->email = $request->input("email");     
        $companyenquiry->phone = $request->input("phone");     
        $companyenquiry->mobile = $request->input("mobile");    
        $companyenquiry->job_title = $request->input("job_title");     
        $companyenquiry->country = $request->input("country")   ;  
        $companyenquiry->state = $request->input("state");  
        $companyenquiry->city = $request->input("city");  
        $companyenquiry->company = $request->input("company");      
        $companyenquiry->address = $request->input("address");     
        //$companyenquiry->profile_type = $request->profile_type;
        $companyenquiry->active_flag = 1;
        $companyenquiry->author_id = $request->user()->id;
        
        
        $companyenquiry->save();
        
     

        return redirect()->route('enquiry.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Enquiry $enquiry)
    {        
        return response(view('enquiry.modal_edit', compact('enquiry'))->render());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Enquiry $enquiry)
    {
         $companyenquiry->full_name = $request->input("full_name");     
        $companyenquiry->email = $request->input("email");     
        $companyenquiry->phone = $request->input("phone");     
        $companyenquiry->mobile = $request->input("mobile");    
        $companyenquiry->job_title = $request->input("job_title");     
        $companyenquiry->country = $request->input("country")   ;  
        $companyenquiry->state = $request->input("state");  
        $companyenquiry->city = $request->input("city");  
        $companyenquiry->company = $request->input("company");      
        $companyenquiry->address = $request->input("address");     
        //$companyenquiry->profile_type = $request->profile_type;
        $companyenquiry->active_flag = 1;
        $companyenquiry->author_id = $request->user()->id;
        
        
        $companyenquiry->save();
        
     

        return redirect()->route('enquiry.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
