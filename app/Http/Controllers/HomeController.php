<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Auth;
use App\Department;
use App\Project;
use App\Team;
use App\Task;
use App\ProjectComment;
use App\TaskComment;
use App\Client;
use \Session;
use Ntrust;
use \Mail;
Use Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         $user= Auth::user();

         $userdep= Department::where('id',$user->department_id)->first();

        if($userdep->dept_name =='CRM'){
            //return $userdep= User::with('test')->get();
           // return redirect()->route('events');
        return view('home.dashboard');
        }
        return view('home.dashboard');
    }

    public function prev()
    {
        return redirect()->back();
    }
}
