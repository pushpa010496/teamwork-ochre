<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use App\Task;
use App\Employee;
use App\SheduledTask;
use App\Project;
use App\TaskComment;
use \Session;
use Ntrust;
use \Mail;

class TaskController extends Controller
{
    

    protected $model;

    public function __construct(Task $model)
    {
        $this->middleware('auth');

        $this->model = $model;
    }

    public function index()
    {
        $user = Auth::user();

       if($user->hasRole('employee')){
             $user_id = $user->id;
             $tasks = Task::whereHas('employees', function ($q) use($user_id) {
                 $q->where('id', '=',$user_id);  
             })->orderBy('id', 'desc')->paginate(10);
        }else {
            $tasks=Task::orderBy('id', 'desc')->paginate(10);
       }

        $projects = Project::where('active_flag',1)->pluck('project_name','id');
        return view('tasks.index',compact('tasks','projects'));

   }

    public function create()
    {
        $employeeinfo=Employee::where('access_flag',1)->pluck('name','id');
        return view('task.create',compact('employeeinfo'));
    }


    public function store(Request $request,User $user)
    {



        request()->validate([
            'task_name' => 'required',
            'project_id' => 'required',
            'message' => 'required',
            'start_date' => 'required',
            'due_date' => 'required',
            'priority' => 'required',
            'active_flag' => 'required'
        ]);   

     $task=new Task;
     $task->task_name=$request->task_name;
     $task->created_by=$request->user()->id;
     $task->message=$request->message;
     $task->progress= 1;
     $task->start_date=$request->start_date;
     $task->services=$request->services;
     $task->due_date=$request->due_date;
     $task->target = $request->target;   
     $task->project_id=$request->project_id;
     $task->priority=$request->priority;
     $task->active_flag=$request->active_flag;
     $task->save();

     return redirect()->route('tasks.index');

 }

    public function show(Task $task)
    {
         return view('tasks.show',compact('task'));
    }


    public function edit(Request $request,Task $task)
    {    
        $projects = Project::where('active_flag',1)->pluck('project_name','id');
        return response(view('tasks.modal_edit', compact('task','projects'))->render());         
    }

    public function update(Request $request,Task $task)
    {
       request()->validate([
        'task_name' => 'required',
        'project_id' => 'required',
        'message' => 'required',
        'start_date' => 'required',
        'due_date' => 'required',
        'priority' => 'required',
        'active_flag' => 'required'
    ]);  

    $task->task_name=$request->task_name;
     $task->created_by=$request->user()->id;
     $task->message=$request->message;
     $task->start_date=$request->start_date;
     $task->due_date=$request->due_date;
     $task->services=$request->services;
     $task->priority=$request->priority;
     $task->project_id=$request->project_id;
     $task->active_flag=$request->active_flag;
     $task->updated_by = $request->user()->id; 
     $task->target = $request->target;     
     $task->reached_target = $request->reached_target;
     $task->save();

     return redirect()->route('tasks.index');
 }

     public function addUsers(Task $task)
     {    
        
        // $members = $task->project->load('employees');
         //$members =  $members->employees->pluck('name','id');

         $members =User::where('active_flag',1)->pluck('name','id');
         
        return response(view('tasks.modal_add_user', compact('task','members'))->render());         
    }

    public function addUsersPost(Request $request,Task $task){

//print_r($task);


       $members_list=$task->employees()->sync($request->memberlist);

         $project_info=$task->project()->first();

       $data = [
                'name'=> $task->task_name,
                'start_date'=>$task->start_date,
                'end_date'=>$task->due_date,
                'project'=>$project_info->project_name
               
                

              
             ];

             /*return $data;*/

       foreach($members_list['attached'] as $key => $value){

            $get_email= $value;

            $get_value=$task->employees()->where('id',$get_email)->first();
                $email=  $get_value->email;
              

                $data = array_merge($data, ['employee' => $get_value->name]);

             Mail::send('emails.taskassign', $data,function($message) use ($data,$email) {
                
                $message->to($email);
                $message->subject("Assigned Task");
            });
            
       }

        return redirect()->route('tasks.index');

    }


    public function addComment(Request $request,Task $task){
        request()->validate([       
            'message' => 'required',       
        ]);  

         $comment = new TaskComment();

         $comment->task_id = $task->id;
         $comment->message = $request->message;   
         $comment->user_id =  Auth::user()->id;   
         $comment->save();         
        return redirect()->route('tasks.show',$task->id);

    }


    public function shedule($id,Request $request,Task $task)
    {


        $task=Task::where('id',$id)->first();
        
        $employeeinfo=Employee::where('access_flag',1)->pluck('name','id');

        return view('task.sheduletask',compact('task','employeeinfo'));

    }

    public function shedulepost(Request $request,Task $task)
    {

        $sheduledtasks = new SheduledTask;

        $sheduledtasks->task_name=$request->task_name;

        //$sheduledtasks->task_id=$request->taskid;

        $sheduledtasks->created_by=$request->user()->id;

        $sheduledtasks->message=$request->message;

        $sheduledtasks->start_date=$request->start_date;

        $sheduledtasks->end_date=$request->end_date;

        $sheduledtasks->priority=$request->priority;

        $sheduledtasks->alloted=$request->alloted;

        $sheduledtasks->save();

    }
}
