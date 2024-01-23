<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyInterview ;
use App\user;
class CompanyInterviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $interviews= CompanyInterview::where('company_id',$id)->orderBy('id', 'desc')->paginate(10);

    return view('interviews.index',compact('interviews'));
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
        $interview=new CompanyInterview();
        $interview->company_id=$request->company;
        $interview->interview_url=$request->interview_url;
        $interview->interview_type=$request->interview_type;
        $interview->start_date=$request->start_date;
        $interview->month=$request->month;
        $interview->end_date=$request->end_date;
        $interview->save();
        addEventTrigger($request->company,$interview->id,'Interview',$request->start_date,$request->end_date);
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
    public function edit($id, CompanyInterview $companyinterview)
    {
         $heads = User::all()->pluck('name','id');

         $interviewdata=CompanyInterview::where('id',$id)->first();
         
         return response(view('interviews.edit', compact('interviewdata','heads')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,CompanyInterview $companycnterview)
    {
        $interview = Companyinterview::find($id);
        $interview->interview_url=$request->interview_url;
        $interview->interview_type=$request->interview_type;
        $interview->start_date=$request->start_date;
        $interview->month=$request->month;
        $interview->end_date=$request->end_date;
        $interview->save();
        updateEventTrigger($id,'Interview',$request->start_date,$request->end_date);
        return redirect()->route('interview',$request->company);
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
