<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use App\Designation;
use \Session;
use Ntrust;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $model;
    public function __construct(Designation $model)
    {
                $this->middleware('auth');

                $this->model = $model;
    }
    public function index()
    {
          $designationinfo=Designation::where('active_flag', 1)->orderBy('id', 'desc')->paginate(10);

         return view('designation.index',compact('designationinfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('designation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         request()->validate([
            'designation_name' => 'required',          
            'active_flag' => 'required'
        ]);

         $designation = new Designation();
        
         $designation->designation_name = ucfirst($request->designation_name);         
       // $department->short_description = ucfirst($request->input("short_description")); 
        $designation->created_by = $request->user()->id;      
         $designation->active_flag = $request->input("active_flag");
        
         $designation->save();
        
        return redirect()->route('designation.index');
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
    public function edit(Designation $designation)
    {        
        return response(view('designation.modal_edit', compact('designation'))->render());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Designation $designation)
    {
         request()->validate([
            'designation_name' => 'required',          
            'active_flag' => 'required'
        ]);

         $designation->designation_name = ucfirst($request->designation_name);         
       // $department->short_description = ucfirst($request->input("short_description"));       
         $designation->active_flag = $request->input("active_flag");
        $designation->updated_by = $request->user()->id; 
         $designation->save();
    //  $category->technology()->sync($request->input("technologies"));

        Session::flash('message_type', 'warning');
        Session::flash('message_icon', 'checkmark');
        Session::flash('message_header', 'Success');
        Session::flash('message', "The Category ". $designation->designation_name . " was Updated.");

        return redirect()->route('designation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Designation $designation)
    {

        $status=$designation->active_flag;

        if($status=='1'){

        $designation->active_flag = 0;
        $message="De-Activated";

        }
        else{

         $designation->active_flag = 1;
         $message="Activated";

        }
         $designation->save();

        Session::flash('message_type', 'negative');
        Session::flash('message_icon', 'hide');
        Session::flash('message_header', 'Success');
        Session::flash('message', 'The Category ' . $designation->dept_name . ' was'.$message);

        return redirect()->route('designation.index');
    }
   
}
