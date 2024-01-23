<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanySocialMediaMarketing;
use App\User;

class CompanySocialMediaMarketingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $socialmedia= CompanySocialMediaMarketing::where('company_id',$id)->orderBy('id', 'desc')->paginate(10);

    return view('socialmedia.index',compact('socialmedia'));
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
        $socialmedia=new CompanySocialMediaMarketing();

         if($request->file('fb_image')){

        $imageName = time().'-'.$request->file('fb_image')->getClientOriginalName();
        request()->fb_image->move(public_path('socialimages'), $imageName);
        $socialmedia->fb_image = $imageName;    
        }

        if($request->file('linkedin_image')){


         $imageName =time().'-'.$request->file('linkedin_image')->getClientOriginalName();
        request()->linkedin_image->move(public_path('socialimages'), $imageName);
        $socialmedia->linkedin_image = $imageName;    
        }

        if($request->file('twitter_image')){


         $imageName =time().'-'.$request->file('twitter_image')->getClientOriginalName();
        request()->twitter_image->move(public_path('socialimages'), $imageName);
        $socialmedia->twitter_image = $imageName;    
        }
         $socialmedia->company_id= $request->input("company");
         $socialmedia->fb_date= $request->input("fb_date");
         $socialmedia->linkedin_date= $request->input("linkedin_date");
         $socialmedia->twitter_date= $request->input("twitter_date");
         $socialmedia->save();
         addEventTrigger($request->company,$article->id,'Social Media Marketing',$request->start_date,$request->end_date);


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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        updateEventTrigger($id,'Social Media Marketing',$request->start_date,$request->end_date);
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
