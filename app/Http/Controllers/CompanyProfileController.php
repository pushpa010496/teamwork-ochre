<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyProfile;
use App\User;
use App\FiscalYear;
class CompanyProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
    
    $users = User::where('active_flag', 1)->orderBy('name')->pluck('name', 'id');

    $profile= CompanyProfile::where('company_id',$id)->orderBy('id', 'desc')->paginate(10);
    return view('profile.index',compact('profile','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profile=new Companyprofile();
        $profile->company_id=$request->company;
        $profile->profile_url=$request->profile_url;
        $profile->profile_service=$request->profile_service;
        $profile->start_date=$request->start_date;
        $profile->end_date=$request->end_date;
        $profile->tech_category=$request->tech_category;
        $profile->deal_amount=$request->deal_amount;
        $profile->fiscal_year=$request->fiscal_year;
        $profile->user_id=$request->sale_person;
        $profile->save();

        addEventTrigger($request->company,$profile->id,'Profile',$request->start_date,$request->end_date);

       /* $Fiscalinfo=new FiscalYear();
         
           $Fiscalinfo->company_id=$request->company;
           $Fiscalinfo->deal_amount=$request->deal_value;
           $Fiscalinfo->fiscal_year=$request->fiscal_year;
            
           $Fiscalinfo->save();*/

        return redirect()->back();
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
    public function edit($id,CompanyProfile $companyprofile)
    {
         $heads = User::all()->pluck('name','id');

         $profiledata=CompanyProfile::where('id',$id)->first();
         $users = User::where('active_flag', 1)->orderBy('name')->pluck('name', 'id');
         return response(view('profile.edit', compact('profiledata','heads','users')));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,CompanyProfile $companyprofile)
    {
        $profile = CompanyProfile::find($id);
        $profile->profile_url=$request->profile_url;
        $profile->profile_service=$request->profile_service;
        $profile->start_date=$request->start_date;
        $profile->end_date=$request->end_date;
        $profile->tech_category=$request->tech_category;
        $profile->deal_amount=$request->deal_amount;
        $profile->fiscal_year=$request->fiscal_year;
        $profile->user_id=$request->user_id;
        $profile->save();

          
        updateEventTrigger($id,'Profile',$request->start_date,$request->end_date);
        return redirect()->route('profile',$request->company);
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
