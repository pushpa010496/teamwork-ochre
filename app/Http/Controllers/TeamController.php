<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use App\Department;
use App\Team;
use \Session;
use Ntrust;

class TeamController extends Controller
{
    
    protected $model;
    public function __construct(Team $model)
    {
                $this->middleware('auth');

                $this->model = $model;
    }


    public function index(Request $request)
    {
         $teams=Team::where('active_flag', 1)->orderBy('id', 'desc')->paginate(10);
         $departments = Department::where('active_flag', 1)->orderBy('dept_name')->pluck('dept_name', 'id');
        return view('teams.index',compact('teams','departments'));
    }

    public function create()
    {
        return view('teams.create');
    }

 
    public function store(Request $request)
    {
           request()->validate([
            'team_name' => 'required',
            'department_id' => 'required',
            'description' => 'required',
            'active_flag' => 'required'
        ]);

         $team = new Team();        
         $team->team_name = ucfirst($request->team_name);
         $team->department_id = $request->department_id;
         $team->description = $request->description;                              
         $team->active_flag = $request->input("active_flag");
         $team->created_by = $request->user()->id;        
         $team->save();        
        return redirect()->route('teams.index');
    }

    public function show(Team $team)
    {
        return $team->load('employerel');
    }

 
    public function edit(Team $team)
    {
        $departments = Department::where('active_flag', 1)->orderBy('dept_name')->pluck('dept_name', 'id');

       return response(view('teams.modal_edit', compact('team','departments'))->render());

       // return view('teams.edit', compact('department'));
    }

    public function addUsers(Team $team){
       
       $users = User::where('active_flag',1)->pluck('name', 'id');       
       return response(view('teams.modal_add_user', compact('team','users'))->render());
       
    }

    public function addUsersPost(Request $request,Team $team){
        
        $team->employees()->sync($request->memberlist);

         return redirect()->route('teams.index');
    }


    public function update(Request $request,Team $team)
    {
         request()->validate([
            'team_name' => 'required',
            'department_id' => 'required',
            'active_flag' => 'required',
            'description' => 'required'
        ]);
         
         $team->team_name = ucfirst($request->team_name);
         $team->department_id = $request->department_id;
         $team->description = $request->description;
         $team->active_flag = $request->input("active_flag"); 
         $team->updated_by = $request->user()->id;
        
         $team->save();
    //  $category->technology()->sync($request->input("technologies"));

        Session::flash('message_type', 'warning');
        Session::flash('message_icon', 'checkmark');
        Session::flash('message_header', 'Success');
        Session::flash('message', "The Category ". $team->dept_name . " was Updated.");

        return redirect()->route('teams.index');
    }


  
    public function destroy(Team $team)
    {
       $status = $team->active_flag;

        if($status=='1'){

        $team->active_flag = 0;
        $message="De-Activated";

        }
        else{

         $team->active_flag = 1;
         $message="Activated";

        }
         $team->save();

        Session::flash('message_type', 'negative');
        Session::flash('message_icon', 'hide');
        Session::flash('message_header', 'Success');
        Session::flash('message', 'The Category ' . $team->dept_name . ' was'.$message);

        return redirect()->route('teams.index');
    }
}
