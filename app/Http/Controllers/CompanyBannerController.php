<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyBanner;
use App\User;
use App\Event;

class CompanyBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

    $banners= CompanyBanner::where('company_id',$id)->orderBy('id', 'desc')->paginate(10);

    return view('banners.index',compact('banners'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $banner=new CompanyBanner();

        if($request->file('banner_image')){


         $imageName = str_slug(time().'-'.$request->file('banner_image')->getClientOriginalName(), "-");
        request()->banner_image->move(public_path('companybanner'), $imageName);
        $banner->banner_image = $imageName;    
        }
        $banner = CompanyBanner::create([
            'company_id'=>$request->company,
            'banner_name'=>$request->banner_name,
            'banner_type'=>$request->banner_type,
            'banner_position'=>$request->banner_position,
            'month'=>$request->month,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
        ]);
        addEventTrigger($request->company,$banner->id,'Banner',$request->start_date,$request->end_date);
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
    public function edit($id,CompanyBanner $companybanner )
    {
        
         $heads = User::all()->pluck('name','id');
         $bannerdata=CompanyBanner::where('id',$id)->first();
         return response(view('banners.edit', compact('bannerdata','heads')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request, CompanyBanner $banner, User $user)
    {
            $banner = CompanyBanner::find($id);

            if($request->file('banner_image')){

             $path = public_path('companybanner');     

             $imageName = str_slug(time().'-'.$request->file('banner_image')->getClientOriginalName(), "-");

            if(request()->banner_image->move($path, $imageName)){
               /* if(File::exists($path.'/'.$company->banner_image)){                 
                    // \File::delete($path.'/'.$company->banner_image);                         
                }   */                
            }
            $banner->banner_image = $imageName;  
        }


        $banner->update([
            'banner_name'=>$request->banner_name,
            'banner_type'=>$request->banner_type,
            'banner_position'=>$request->banner_position,
            'start_date'=>$request->start_date,
            'month'=>$request->month,
            'end_date'=>$request->end_date,
        ]);
        updateEventTrigger($id,'Banner',$request->start_date,$request->end_date);
        return redirect()->route('banners',$request->company);
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
