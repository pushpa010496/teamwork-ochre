<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CompanyWebinar;
use App\user;

class CompanyWebinarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
         $webinars= CompanyWebinar::where('company_id',$id)->orderBy('id', 'desc')->paginate(10);

    return view('webinars.index',compact('webinars'));
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
        $webinar=new CompanyWebinar();
        $webinar->company_id=$request->company;
        $webinar->webinar_url=$request->webinar_url;
        $webinar->webinar_start_date=$request->start_date; 
        $webinar->total_leads=$request->total_leads;
        $webinar->month=$request->month;
        $webinar->webinar_end_date=$request->end_date;
        $webinar->save();
addEventTrigger($request->company,$webinar->id,'Webinar',$request->start_date,$request->end_date);
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
    public function edit($id,CompanyWebinar $companywebinar)
    {
         $heads = User::all()->pluck('name','id');

         $webinardata=CompanyWebinar::where('id',$id)->first();
         
         return response(view('webinars.edit', compact('webinardata','heads')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,CompanyWebinar $companywebinar)
    {
        $webinar = CompanyWebinar::find($id);
        $webinar->webinar_url=$request->webinar_url;
        $webinar->webinar_start_date=$request->start_date;
        $webinar->webinar_end_date=$request->end_date;
        $webinar->total_leads=$request->total_leads;
        $webinar->month=$request->month;
        $webinar->save();
updateEventTrigger($id,'Webinar',$request->start_date,$request->end_date);
        return redirect()->route('webinars',$request->company);
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
