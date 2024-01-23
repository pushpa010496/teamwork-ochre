<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Leave;
use App\Employee;
use \Session;
use Ntrust;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $model;
    public function __construct(Leave $model)
    {
                $this->middleware('auth');

                $this->model = $model;
    }
    public function index()
    {
        $leavesinfo=Leave::get();
        return view('leave.index',compact('leavesinfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('leave.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $leave = new leave();
        
         $leave->name = ucfirst($request->input("name")); 
         $leave->total_days =$request->input("total_days");
         $leave->applicable =$request->input("applicable");        
         // $leave->short_description = ucfirst($request->input("short_description"));       
         $leave->access_flag = $request->input("active_flag");
        
         $leave->save();
        
        return redirect()->route('leave.index');
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
      public function edit(Leave $leave)
    {

       return view('leave.edit', compact('leave'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leave $leave)
    {
         $leave->name = ucfirst($request->input("name")); 
         $leave->total_days =$request->input("total_days");
         $leave->applicable =$request->input("applicable");        
         $leave->access_flag = $request->input("active_flag");
        
         $leave->save();
        
        return redirect()->route('leave.index');
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

    public function request()
    {
        $employeeinfo=Employee::where('access_flag',1)->pluck('name','user_id');
        return view('leave.request',compact('employeeinfo'));

        if(\Request::isMethod('post')){

        $leavereq = new Leaverequest();
               
        $leavereq->name = $request->input("name");
        $leavereq->superior = $request->input("superior");
        $leavereq->from_date = $request->input("from_date");
        $leavereq->to_date = $request->input("to_date");
        $leavereq->message = $request->input("message");
        $leavereq->save();
        /*Send email admin*/  
        $data = [
            'name'=>$request->input("name"),
            'email'=>$request->input("email"),
            'startdate'=>$request->input('start_date'),
            'enddate'=>$request->input('end_date'),
            'description'=>$request->input("message"),
            'subject_client' =>$request->input('client-subject'),
            'subject_admin' =>$request->input('admin-subject'),
         ];
        
        /*Client Mail*/
         Mail::send('emails.client', $data, function($message) use ($data) {
        $message->to($data['email']);
        $message->subject($data['subject_client']);
        });
            /*
             $filePath = config_path("rpa/_DGdSJrpa_eu_delegate_analysis_final.pdf");
            $headers = ['Content-Type: application/pdf'];
            $fileName = time().'.pdf';
*/
            return redirect()->route('medical.japan')->with(['thank_message'=>$request->input('thank_message')]);
    }
   

    }


}
