<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductLunch;
use App\User;
class ProductLunchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $productlunch= ProductLunch::where('company_id',$id)->orderBy('id', 'desc')->paginate(10);
        return view('productlunch.index',compact('productlunch'));
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
       

        $productluanch=new ProductLunch();
        $productluanch->company_id=$request->company;
        $productluanch->url=$request->productlunch_url;
        $productluanch->type=$request->productlunch_type;
        $productluanch->start_date=$request->start_date;
        $productluanch->end_date=$request->end_date;
        $productluanch->month=$request->month;
        $productluanch->save();
          addEventTrigger($request->company,$productluanch->id,'Productlunch',$request->start_date,$request->end_date);
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
    public function edit($id, ProductLunch $productluanch)
    {
         $heads = User::all()->pluck('name','id');

         $productluanchdata=ProductLunch::where('id',$id)->first();
       
         return response(view('productlunch.edit', compact('productluanchdata','heads')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,ProductLunch $productluanch)
    {
        $productluanch = ProductLunch::find($id);
		$productluanch->url=$request->productlunch_url;
		$productluanch->type=$request->productlunch_type;
		$productluanch->start_date=$request->start_date;
		$productluanch->end_date=$request->end_date;
        $productluanch->month=$request->month;
		$productluanch->save();
  updateEventTrigger($id,'Productlunch',$request->start_date,$request->end_date);
        return redirect()->route('productlunch',$request->company);
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
