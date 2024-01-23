<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyArticle ;
use App\User;


class CompanyArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $articles= CompanyArticle::where('company_id',$id)->orderBy('id', 'desc')->paginate(10);

    return view('articles.index',compact('articles'));
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
        $article=new CompanyArticle();
        $article->company_id=$request->company;
        $article->article_url=$request->article_url;
        $article->article_type=$request->article_type;
        $article->start_date=$request->start_date;
        $article->month=$request->month;
        $article->end_date=$request->end_date;
        $article->save();
        addEventTrigger($request->company,$article->id,'Article',$request->start_date,$request->end_date);
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
    public function edit($id, CompanyArticle $companyarticle)
    {
         $heads = User::all()->pluck('name','id');

         $articledata=CompanyArticle::where('id',$id)->first();
         
         return response(view('articles.edit', compact('articledata','heads')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,CompanyArticle $companyarticle)
    {
        $article = CompanyArticle::find($id);
        $article->article_url=$request->article_url;
        $article->article_type=$request->article_type;
        $article->month=$request->month;
        $article->start_date=$request->start_date;
        $article->end_date=$request->end_date;
        $article->save();
        updateEventTrigger($id,'Article',$request->start_date,$request->end_date);
        return redirect()->route('article',$request->company);
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
