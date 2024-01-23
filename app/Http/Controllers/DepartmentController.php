<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use App\Department;
use \Session;
use Ntrust;

class DepartmentController extends Controller
{
    
    protected $model;
    public function __construct(Department $model)
    {
                $this->middleware('auth');

                $this->model = $model;
    }


    public function index(Request $request)
    {
         $departmentinfo=Department::where('active_flag', 1)->orderBy('id', 'desc')->paginate(10);
           $heads = User::all()->pluck('name','id');
        return view('department.index',compact('departmentinfo','heads'));
    }

    public function create()
    {
        return view('department.create');
    }

 
    public function store(Request $request)
    {
           request()->validate([
            'dept_name' => 'required',
            'dept_head' => 'required',
            'active_flag' => 'required'
        ]);

         $department = new Department();        
         $department->dept_name = ucfirst($request->dept_name);
         $department->dept_head = ucfirst($request->dept_head);
         $department->created_by = $request->user()->id;    
        $department->active_flag = $request->input("active_flag");        
         $department->save();        
        return redirect()->route('department.index');
    }

    public function show(Department $department)
    {
        return $department->load('employerel');
    }

 
    public function edit(Department $department)
    {   
        $heads = User::all()->pluck('name','id');
       return response(view('department.modal_edit', compact('department','heads'))->render());

       // return view('department.edit', compact('department'));
    }

 
    public function update(Request $request,Department $department)
    {
         request()->validate([
            'dept_name' => 'required',
            'dept_head' => 'required',
            'active_flag' => 'required'
        ]);
         
         $department->dept_name = ucfirst($request->dept_name);         
         $department->dept_head = ucfirst($request->dept_head);                
         $department->active_flag = $request->active_flag;
         $department->updated_by = $request->user()->id;  
         $department->save();
    //  $category->technology()->sync($request->input("technologies"));

        Session::flash('message_type', 'warning');
        Session::flash('message_icon', 'checkmark');
        Session::flash('message_header', 'Success');
        Session::flash('message', "The Category ". $department->dept_name . " was Updated.");

        return redirect()->route('department.index');
    }


  
    public function destroy(Department $department)
    {
       $status=$department->active_flag;

        if($status=='1'){

        $department->active_flag = 0;
        $message="De-Activated";

        }
        else{

         $department->active_flag = 1;
         $message="Activated";

        }
         $department->save();

        Session::flash('message_type', 'negative');
        Session::flash('message_icon', 'hide');
        Session::flash('message_header', 'Success');
        Session::flash('message', 'The Category ' . $department->dept_name . ' was'.$message);

        return redirect()->route('department.index');
    }
}
