<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyContentMarketing ;
use App\user;
class CompanyContentMarketingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $cmpmarketing= CompanyContentMarketing::where('company_id',$id)->orderBy('id', 'desc')->paginate(10);

    return view('contentmarketing.index',compact('cmpmarketing'));
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
        request()->validate([       
            'url' => 'required',
            'content_type' => 'required',
            'launch_date' => 'required',
        ]);
        $contant = CompanyContentMarketing::create([
            'company_id'=>$request->company,
            'content_type'=>$request->interview_type,
            'url'=>$request->url,
            'launch_date'=>$request->launch_date,
        ]);
        addEventTrigger($request->company,$article->id,'content marketing',$request->start_date,$request->end_date);
        if($contant){
        return redirect()->back();
        }

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
    public function edit($id, CompanyContentMarketing $CompanyContentMarketing)
    {
         $heads = User::all()->pluck('name','id');
         $contentdata=CompanyContentMarketing::where('id',$id)->first();
         return response(view('contentmarketing.edit', compact('contentdata','heads')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,CompanyContentMarketing $contentmarketing)
    {
        $contentmarketing = CompanyContentMarketing::find($id);
        $contentmarketing->url=$request->url;
        $contentmarketing->content_type=$request->content_type;
        $contentmarketing->launch_date=$request->launch_date;
        $contentmarketing->save();
        updateEventTrigger($id,'content marketing',$request->start_date,$request->end_date);
        return redirect()->route('contentmarketing',$request->company);
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
