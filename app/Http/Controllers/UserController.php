<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use App\Designation;
use App\Department;
use App\Role;
use Illuminate\Http\Request;
use \Session;
use \Redirect;
use Illuminate\Support\Facades\Hash;
use App\Technology;
use DB;

class UserController extends Controller{
	
	protected $model;

	public function __construct(User $model)
	{
		$this->middleware('auth');
		$this->model = $model;
	}


	public function index()
	{
	    	$users = User::orderBy('id', 'desc')->paginate(10);
			$active = User::where('active_flag', 1);
			$roles = Role::where('active_flag', 1)->orderBy('name')->pluck('name', 'id');
			$designations = Designation::where('active_flag', 1)->orderBy('designation_name')->pluck('designation_name', 'id');
            $technology = Technology::where('category','web')->orderBy('technologie')->pluck('technologie', 'id');
			$departments = Department::where('active_flag', 1)->orderBy('dept_name')->pluck('dept_name', 'id');
			$companyType = DB::table('company_types')->pluck('type','type');
			return view('users.index', compact('users', 'active','roles','designations','departments','technology','companyType'));	
			
	}

	public function create()
	{

		if (Auth::user()->can('settings')) {

			$roles = Role::where('active_flag', 1)->orderBy('name')->pluck('name', 'id');
			return view('users.create',compact('roles'));

		}else{
			Session::flash('message_type', 'danger');
			Session::flash('message_icon', 'hide');
			Session::flash('message_header', 'Success');

			Session::flash('message', "You do not have User permissions");
			return redirect('home');
		}
	}

	public function store(Request $request, User $user)
	{		
		if (Auth::user()->can('settings')) {

			request()->validate([
				'name' => 'required|string|max:255',
				'email' => 'required|string|email|max:255|unique:users',
				'password' => 'required|string|min:6|confirmed',
				'department_id' => 'required',
				'designation_id' => 'required',
				'technology' => 'required',
				'company_type' => 'required',
			]);

			$user = new User();
			$user->name = ucfirst($request->input("name"));
			$user->email = $request->input("email");
			$user->password = bcrypt($request->input("password"));
			$user->department_id = $request->department_id;
			$user->designation_id  =$request->designation_id;
			$user->active_flag = 1;
			$user->created_by = $request->user()->id;
            $user->technology =implode(',',$request->technology);
			$user->company_type =implode(',',$request->company_type);
			$user->save();

			$user->attachRole($request->input("roles"));

			Session::flash('message_type', 'success');
			Session::flash('message_icon', 'checkmark');
			Session::flash('message_header', 'Success');
			Session::flash('message', "The User \"<a href='users/$user->slug'>" . $user->name . "</a>\" was Created.");

			return redirect()->route('users.index');


		}else{
			Session::flash('message_type', 'danger');
			Session::flash('message_icon', 'hide');
			Session::flash('message_header', 'Success');

			Session::flash('message', "You do not have User permissions");
			return redirect('home');
		}
	}

	public function show(User $user)
	{
	    	return view('users.show', compact('user'));
	}

	
	public function edit(User $user)
	{

		if (Auth::user()->can('settings')) {
		//$user = $this->model->findOrFail($id);
			$roles = Role::where('active_flag', 1)->orderBy('name')->pluck('name', 'id');
			$designations = Designation::where('active_flag', 1)->orderBy('designation_name')->pluck('designation_name', 'id');

			$departments = Department::where('active_flag', 1)->orderBy('dept_name')->pluck('dept_name', 'id');
            $technology = Technology::where('category','web')->orderBy('technologie')->pluck('technologie', 'id');
            $companyType = DB::table('company_types')->pluck('type','type');
			return response(view('users.modal_edit', compact('user','roles','designations','departments','technology','companyType'))->render());
            Session::flash('message_type', 'danger');
			Session::flash('message_icon', 'hide');
			Session::flash('message_header', 'Success');

		}else{
			

			Session::flash('message', "You do not have User permissions");
			return redirect('home');
		}
	}

	
	public function update(Request $request, User $user, Role $role)
	{
		request()->validate([
				'name' => 'required|string|max:255',
				'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
				'roles' => 'required',
				'department_id' => 'required',
				'designation_id' => 'required',
				'active_flag' => 'required',
                'technology' => 'required',
                'company_type' => 'required',

			]);

		if (Auth::user()->can('settings')) {
			
			$user->name = ucfirst($request->input("name"));
			$user->email = $request->input("email");
			$user->password = $request->password ? bcrypt($request->password) : $user->password;
			$user->active_flag = $request->active_flag;
			$user->department_id = $request->department_id;
			$user->designation_id  =$request->designation_id;
			$user->designation_id  =$request->designation_id;
			$user->designation_id  =$request->designation_id;
			$user->updated_by = $request->user()->id;
			$user->technology =implode(',',$request->technology);
			$user->company_type =implode(',',$request->company_type);

			$user->save();
			$user->roles()->sync($request->input("roles"));

			Session::flash('message_type', 'warning');
			Session::flash('message_icon', 'checkmark');
			Session::flash('message_header', 'Success');
			Session::flash('message', "The User \"<a href='users/$user->slug'>" . $user->name . "</a>\" was Updated.");

			return redirect()->route('users.index');

		}else{
			Session::flash('message_type', 'danger');
			Session::flash('message_icon', 'hide');
			Session::flash('message_header', 'Success');

			Session::flash('message', "You do not have User permissions");
			return redirect('home');
		}
	}

	
	public function destroy(User $user)
	{
		if (Auth::user()->can('settings')) {

			$user->active_flag = 0;
			$user->save();
			Session::flash('message_type', 'danger');
			Session::flash('message_icon', 'hide');
			Session::flash('message_header', 'Success');
			Session::flash('message', 'The User ' . $user->name . ' was De-Activated.');

			return redirect()->route('users.index');

		}else{
			Session::flash('message_type', 'danger');
			Session::flash('message_icon', 'hide');
			Session::flash('message_header', 'Success');

			Session::flash('message', "You do not have User permissions");
			return redirect('home');
		}
	}

	public function reactivate(User $user)
	{
		if (Auth::user()->can('settings')) {

			$user->active_flag = 1;
			$user->save();

			Session::flash('message_type', 'success');
			Session::flash('message_icon', 'checkmark');
			Session::flash('message_header', 'Success');
			Session::flash('message', 'The User ' . $user->name . ' was Re-Activated.');

			return redirect()->route('users.index');
		}else{
			Session::flash('message_type', 'danger');
			Session::flash('message_icon', 'hide');
			Session::flash('message_header', 'Success');

			Session::flash('message', "You do not have User permissions");
			return redirect('home');
		}

	}
	public function logout()
	{
		$user = Auth::user();
		if($user){

			Auth::logout();
			return redirect('login');
		}else{

			return redirect('login');
		}

	}

	public function passwordUpdate(Request $request, User $user)
	{
		if(Auth::user()->id !== $user->id){
			return redirect()->back();
		}

		request()->validate([
			'old_password' => 'required',			
			'password' => 'required|string|min:6|confirmed',
		]);


		if (Hash::check($request->old_password, $user->password)) { 
			
			$user->fill([
				'password' => Hash::make($request->password)
			])->save();
			
			return redirect()->route('users.show',Auth::user()->id);

		} else {
			
			Session::flash('message', 'Password does not match'); 
			return redirect()->route('users.show',Auth::user()->id);	
		}


	}


}
