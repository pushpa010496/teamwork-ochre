<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyEmailMarketing;
use App\User;


class CompanyEmailMarketingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $emailmarketing= CompanyEmailMarketing::where('company_id',$id)->orderBy('id', 'desc')->paginate(10);

    return view('emailmarketing.index',compact('emailmarketing'));
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
        $emailmarketing=new CompanyEmailMarketing();
        $emailmarketing->company_id=$request->company;
        $emailmarketing->email_url=$request->email_url;
        $emailmarketing->month=$request->month;
        $emailmarketing->email_date=$request->email_date;
        $emailmarketing->end_date=$request->end_date;
        $emailmarketing->save();
             
addEventTrigger($request->company,$emailmarketing->id,'Email marketing',$request->email_date,$request->end_date);
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
    public function edit($id,CompanyEmailMarketing $emailmarketing)
    {
         $heads = User::all()->pluck('name','id');

         $emaildata=CompanyEmailMarketing::where('id',$id)->first();
         
         return response(view('emailmarketing.edit', compact('emaildata','heads')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,CompanyEmailMarketing $emailmarketing)
    {
        $webinar = CompanyEmailMarketing::find($id);
        $webinar->email_url=$request->email_url;
        $webinar->email_date=$request->email_date;
        $webinar->end_date=$request->end_date;
        $webinar->save();
        
 updateEventTrigger($id,'Email marketing',$request->email_date,$request->end_date);
        return redirect()->route('emailmarketing',$request->company);
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
