<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyNewsletter;
use App\User;

class CompanyNewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $newsletter= CompanyNewsletter::where('company_id',$id)->orderBy('id', 'desc')->paginate(10);
        return view('newsletter.index',compact('newsletter'));
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
       

        $newsletter=new CompanyNewsletter();
        $newsletter->company_id=$request->company;
        $newsletter->url=$request->newsletter_url;
        $newsletter->type=$request->newsletter_type;
        $newsletter->month=$request->month;
        $newsletter->start_date=$request->start_date;
        $newsletter->end_date=$request->end_date;
        $newsletter->save();
        addEventTrigger($request->company,$newsletter->id,'Newsletter',$request->start_date,$request->end_date);
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
    public function edit($id, CompanyNewsletter $newsletter)
    {
         $heads = User::all()->pluck('name','id');

         $newsletterdata=CompanyNewsletter::where('id',$id)->first();
         
         return response(view('newsletter.edit', compact('newsletterdata','heads')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,CompanyNewsletter $companynewsletter)
    {
        $newsletter = CompanyNewsletter::find($id);
        $newsletter->url=$request->newsletter_url;
        $newsletter->type=$request->newsletter_type;
        $newsletter->start_date=$request->start_date;
        $newsletter->end_date=$request->end_date;
        $newsletter->month=$request->month;
        $newsletter->save();
        updateEventTrigger($id,'Newsletter',$request->start_date,$request->end_date);
        return redirect()->route('newsletter',$request->company);
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
