<?php

namespace App\Http\Controllers;

use DB;
use App\Company;
use App\Technology;
use App\CompanyProfile;
use Illuminate\Http\Request;


class WebController extends Controller
{
   private $technology;

  public function __construct(Technology $technology)
  {
     $this->technology = $technology;
  }
    public function index()
    {
      $year = $this->technology->financialyear();
      $technology = Technology::where('category','web')->get();
      return view('home.web',compact('technology','year'));
    }
}
