<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyRFQ;
use App\User;

class CompanyRFQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
         $rfq=CompanyRFQ::where('company_id',$id)->orderBy('id', 'desc')->paginate(10);

         return view('rfq.index',compact('rfq'));
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
        $rfq=new CompanyRFQ();
        if($request->file('banner_image')){

        $imageName = str_slug(time().'-'.$request->file('banner_image')->getClientOriginalName(), "-");
        request()->banner_image->move(public_path('rfq'), $imageName);
        $rfq->attachment = $imageName;    
        }

        $rfq->company_id=$request->company;
        $rfq->totalenquiries=$request->totalenq;
        $rfq->month=$request->month;
        $rfq->save();
       /* addEventTrigger($request->company,$article->id,'Guaranteed RFQ',$request->start_date,$request->end_date);*/

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
    public function edit($id,CompanyRFQ $companyrfq)
    {
         $heads = User::all()->pluck('name','id');

         $rfqdata=CompanyRFQ::where('id',$id)->first();
         
         return response(view('rfq.edit', compact('rfqdata','heads')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,CompanyRFQ $companyrfq)
    {
        $rfq = CompanyRFQ::find($id);
        $rfq->guaranteed_url=$request->guaranteed_url;
        $rfq->guaranteed_start_date=$request->guaranteed_start_date;
        $rfq->guaranteed_end_date=$request->guaranteed_end_date;
        $rfq->save();
        updateEventTrigger($id,'Guaranteed RFQ',$request->start_date,$request->end_date);
        return redirect()->route('guaranteedrfq',$request->company);
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
