<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

class ProjectController extends Controller
{
    
    protected $model;
    public function __construct(Project $model)
    {
                $this->middleware('auth');

                $this->model = $model;
    }


    public function index(Request $request)
    {
         $projects=Project::orderBy('id','desc')->paginate(10);
         $clients = Client::where('active_flag',1)->pluck('client_name','id');

        return view('projects.index',compact('projects','clients'));
    }

    public function create()
    {
        return view('projects.create');
    }

 
    public function store(Request $request)
    {
        
        request()->validate([
            'project_name' => 'required',
            'client_id' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'due_date' => 'required',
            'priority' => 'required',
            'active_flag' => 'required'
        ]);

         $project = new Project();        
         $project->project_name = ucfirst($request->project_name);
         $project->client_id = ucfirst($request->client_id);   
         $project->description = $request->description;   
         $project->start_date = date('Y-m-d', strtotime($request->start_date));
         $project->due_date = date('Y-m-d', strtotime($request->due_date));
         $project->priority = $request->priority;       
        // $project->target = $request->target;     
         $project->active_flag = $request->active_flag;                     
         $project->active_flag = $request->input("active_flag"); 
         $project->created_by = $request->user()->id;       
         $project->save(); 

        return redirect()->route('projects.index');
    }

    public function show(Project $project)
    {

        $teams = Team::where('active_flag', 1)->orderBy('team_name')->pluck('team_name', 'id');

        $employees = $project->teams()->with('employees')->get();
        
        $u_ids = [];

        if($project->teams){          
            foreach ($project->teams as  $team) {
                foreach ($team->employees as $key => $emp) {                  
                     array_push($u_ids,$emp->id);
                }
            }

        }
         $members =  User::whereIn('id',$u_ids)->pluck('name','id');
         $members_list =  User::whereIn('id',$u_ids)->get();
 

        return view('projects.show',compact('project','teams','members','members_list'));
    }

    public function edit(Project $project)
    {
       $clients = Client::where('active_flag',1)->pluck('client_name','id');
       return response(view('projects.modal_edit', compact('project','clients'))->render());       
    }

 
    public function update(Request $request,Project $project)
    {
          request()->validate([
            'project_name' => 'required',
            'client_id' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'due_date' => 'required',
            'priority' => 'required',
            'active_flag' => 'required'
        ]);         
         $project->project_name = ucfirst($request->project_name);
         $project->client_id = ucfirst($request->client_id);   
         $project->description = $request->description;   
         $project->start_date = $request->start_date;         
         $project->due_date = $request->due_date;         
         $project->priority = $request->priority;   
         //$project->target = $request->target;     
         //$project->reached_target = $request->reached_target;      
         $project->active_flag = $request->active_flag;                     
         $project->active_flag = $request->input("active_flag"); 
        $project->updated_by = $request->user()->id;        
         $project->save(); 


        Session::flash('message_type', 'warning');
        Session::flash('message_icon', 'checkmark');
        Session::flash('message_header', 'Success');
        Session::flash('message', "The Category ". $project->dept_name . " was Updated.");

        return redirect()->route('projects.index');
    }


  
    public function destroy(Project $project)
    {
       $status=$project->active_flag;

        if($status=='1'){

        $project->active_flag = 0;
        $message="De-Activated";

        }
        else{

         $project->active_flag = 1;
         $message="Activated";

        }
         $project->save();

        Session::flash('message_type', 'negative');
        Session::flash('message_icon', 'hide');
        Session::flash('message_header', 'Success');
        Session::flash('message', 'The Category ' . $Project->dept_name . ' was'.$message);

        return redirect()->route('projects.index');
    }



    public function addTeamPost(Project $project, Request $request)
    {
        
        $project->teams()->sync($request->teams); 

       
        //send email to head of the department
        return redirect()->back();
    }

     public function removeTeam(Project $project, $team)
    {
        
        $project->teams()->detach($team);        
        return redirect()->back();
    }


    public function addMemberPost(Project $project, Request $request)
    {

        $project->employees()->sync($request->members);        
        //send email to employees which are added into the project
        return redirect()->back();
    }

    public function removeMember(Project $project, $member)
    {
        
        $project->employees()->detach($member);        
        return redirect()->back();
    }
    

     public function addComment(Request $request,Project $project){
        request()->validate([       
            'message' => 'required',       
        ]);  

         $comment = new ProjectComment();

         $comment->project_id = $project->id;
         $comment->message = $request->message;   
         $comment->user_id =  Auth::user()->id;   
         $comment->save();         
        return redirect()->route('projects.show',$project->id);

    }


    public function taskBoard(Project $project){       

                
        return view('projects.taskboard',compact('project'));

    }
    public function updatetaskBoard(Project $project,Task $task,$progress,user $user){               
          
     
 
  //return Auth::user();


           $task->progress = $progress;
           $task->moved_by = Auth::user()->id;
           $task->save();    
           $username=Auth::user()->name;  
           $sentmail="";

           if($progress == 1){
            $status = 'Todo';
           }elseif ($progress == 2) {
               $status = 'In Progress';
           }else{
            $status = 'Completed';
           }

           $data = [
                'status'=> $status,
                'employee'=>$username,
                'project'=>$project->project_name,
                'name'=>$task->task_name,
                'start_date'=>$task->start_date,
                'end_date'=>$task->due_date
              
             ];
        
           $comment = new TaskComment();

           $comment->task_id = $task->id;
           $comment->message = Auth::user()->name ." Moved to ". $status;  
           $comment->user_id =  Auth::user()->id;   
           $comment->save();  

           if(Auth::user()->roles->first()->name == 'admin'){
         /*   return "taskBoard section mail";*/
                     $sentmail= Auth::user()->email;
                Mail::send('emails.admin', $data, function($message) use ($data,$sentmail) {
                        
                        $message->to($sentmail);
                        $message->subject("Project Task status");
                    });
        }
           //send email to the manager
           
            return 'Moved successfully';

    }


}
