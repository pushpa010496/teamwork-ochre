<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use App\Employee;
use \Session;
use Ntrust;
use App\Department;
use App\Designation;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $employeeinfo=Employee::get();

        return view('employee.index',compact('employeeinfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments=Department::where('access_flag',1)->pluck('dept_name','id');
        $designation=Designation::where('access_flag',1)->pluck('designation_name','id');

        return view('employee.create',compact('departments','designation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $this->validate($request, [
                    'contact' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255|unique:users',
                    
                    // 'g-recaptcha-response' => 'required|captcha',
             ]);
           
        $user =new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->client_token=$request->password;
        $user->active_flag=$request->status;
        $user->save();

        $employee=new Employee;

         if($request->file('profile_img')){
        $imageName = preg_replace('/\s+/','-',time().'-'.$request->file('profile_img')->getClientOriginalName());
      request()->profile_img->move(public_path('emp_images'), $imageName);
       
        $employee->profile_img = $imageName;   
        }
        $employee->name=$request->name;
        $employee->email=$request->email;
        $employee->password=$request->password;
        $employee->gender=$request->gender;
        $employee->dob=$request->dateofb;
        $employee->department=$request->department;
        $employee->designation=$request->designation;
        $employee->blood_type=$request->type;
        $employee->experience=$request->experience;
        $employee->contact=$request->contact;
        $employee->join_date=$request->postdate;
        $employee->access_flag=$request->status;
        $employee->pan_no=$request->pan;
        $employee->national_id=$request->nid;
        $employee->prv_employer=$request->prvemployer;
        $employee->prv_org_hr=$request->prvhr;
        $employee->prv_emp_contact=$request->prvemployercnt;
        $employee->address=$request->address;
        $employee->user_id=$user->id;
        $employee->save();



        return redirect()->route('employee.create');

        //
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
    public function edit(Request $request,Employee $employee)
    {
        $departments=Department::where('access_flag',1)->pluck('dept_name','id');
        $designation=Designation::where('access_flag',1)->pluck('designation_name','id');

        return view('employee.edit',compact('employee','departments','designation'));
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Employee $employee)
    {
         if($request->file('profile_img')){
        $imageName = preg_replace('/\s+/','-',time().'-'.$request->file('profile_img')->getClientOriginalName());
      request()->profile_img->move(public_path('emp_images'), $imageName);
       
        $employee->profile_img = $imageName;   
        }
        $employee->name=$request->name;
        $employee->email=$request->email;
        $employee->password=$request->password;
        $employee->gender=$request->gender;
        $employee->dob=$request->dateofb;
        $employee->department=$request->department;
        $employee->designation=$request->designation;
        $employee->blood_type=$request->blood_type;
        $employee->experience=$request->experience;
        $employee->contact=$request->contact;
        $employee->join_date=$request->join_date;
        $employee->access_flag=$request->access_flag;
        $employee->pan_no=$request->pan_no;
        $employee->national_id=$request->national_id;
        $employee->prv_employer=$request->prv_employer;
        $employee->prv_org_hr=$request->prv_org_hr;
        $employee->prv_emp_contact=$request->prv_emp_contact;
        $employee->address=$request->address;
        $employee->save();

        return redirect()->route('employee.index');
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

    public function getemployee($superior_id)
    {


    $employeeinfo=Employee::where('user_id',$superior_id)->first();

    echo $employeeinfo->email;

    }
}
