<?php
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', 'HomeController@index')->name('home');


/*Users Roles Permissions*/
/*Route::resource("/users","UserController");
Route::group(['middleware' => ['permission:settings']], function() {
 Route::resource("/permissions", "PermissionController"); 
});
Route::group(['middleware' => ['permission:settings']], function() {
 Route::resource("/roles", "RoleController");
  });*/
/*Users Roles Permissions end*/
Auth::routes();

Route::get("logout","UserController@logout");	

Route::post("password-update/{user}","UserController@passwordUpdate")->name('user.passwordUpdate');

Route::group(['middleware' => ['role:admin']], function() {
	Route::resource("users","UserController");	
	Route::resource("permissions", "PermissionController"); 
	Route::resource("roles", "RoleController");
});

Route::get('/ajax-employee/{id}','EmployeeController@getemployee');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/products', 'ProductController');
Route::resource('/categories', 'CategoryController');

// Route::group(['middleware' => ['permission:settings']], function() {
	
// });

Route::group(['middleware' => ['role:admin']], function() {
	Route::resource('department', 'DepartmentController');
	Route::resource('designation', 'DesignationController');
});

//clients routes with permissions
Route::group(['middleware' => ['permission:clients']], function() {	
	Route::get('clients', 'ClientController@index')->name('clients.index'); 	
});
Route::group(['middleware' => ['permission:client_add', 'permission:client_edit','permission:client_delete' ]], function() {
	Route::post('clients', 'ClientController@store')->name('clients.store');
	Route::get('clients/{client}/edit', 'ClientController@edit')->name('clients.edit');
	Route::match(['put', 'patch'],'clients/{client}', 'ClientController@update')->name('clients.update');	

});
// End clients routes with permissions

// 'middleware' => ['ability:admin|manager|employee,team_add|team_edit|team_add_member|team_remove_member|teams,true']

//Teams routes with permissions
Route::group(['middleware' => ['permission:teams']], function() {	
	Route::get('teams', 'TeamController@index')->name('teams.index'); 	
});
Route::group(['middleware' => ['permission:team_add', 'permission:team_edit', 'permission:team_add_member', 'permission:team_remove_member']], function() {
	Route::post('teams', 'TeamController@store')->name('teams.store');
	Route::get('teams/{team}/edit', 'TeamController@edit')->name('teams.edit');
	Route::match(['put', 'patch'],'teams/{team}', 'TeamController@update')->name('teams.update');

	Route::get('teams/{team}/add-users', 'TeamController@addUsers');
	Route::post('teams/{team}/add-users', 'TeamController@addUsersPost')->name('teams.adduser');
});
// End Teams routes with permissions


//tasks routes with permissions
// Route::resource('/tasks', 'TaskController');
Route::group(['middleware' => ['permission:tasks']], function() {	
	Route::get('tasks', 'TaskController@index')->name('tasks.index'); 	
	Route::get('tasks/{task}', 'TaskController@show')->name('tasks.show');

	Route::post('tasks/{task}/comment', 'TaskController@addComment')->name('tasks.addComment');	
});
Route::group(['middleware' => ['permission:task_add', 'permission:task_edit', 'permission:task_add_member', 'permission:task_remove_member','permission:task_delete']], function() {

	Route::post('tasks', 'TaskController@store')->name('tasks.store');
	Route::get('tasks/{task}/edit', 'TaskController@edit')->name('tasks.edit');
	Route::match(['put', 'patch'],'tasks/{task}', 'TaskController@update')->name('tasks.update');

	Route::get('tasks/{task}/add-users', 'TaskController@addUsers');
	Route::post('tasks/{task}/add-users', 'TaskController@addUsersPost')->name('task.adduser');
	

});
// End tasks routes with permissions


//Projet routes with permissions
Route::group(['middleware' => ['permission:projects']], function() {	
	Route::get('projects', 'ProjectController@index')->name('projects.index'); 	
	Route::get('projects/{project}', 'ProjectController@show')->name('projects.show'); 	
	Route::post('projects/{project}/comment', 'ProjectController@addComment')->name('projects.addComment');

	Route::get('projects/{project}/taskboard', 'ProjectController@taskBoard')->name('projects.taskboard');
	Route::get('projects/{project}/taskboard/{task}/{progress}', 'ProjectController@updatetaskBoard')->name('projects.taskboard.update');
});

Route::group(['middleware' => ['permission:project_add', 'permission:project_edit']], function() {	
	Route::post('projects', 'ProjectController@store')->name('projects.store');
	Route::get('projects/{project}/edit', 'ProjectController@edit')->name('projects.edit');
	Route::match(['put', 'patch'],'projects/{project}', 'ProjectController@update')->name('projects.update');
});

Route::group(['middleware' => [ 'permission:project_manage']], function() {

	Route::post('projects/{project}/add-team', 'ProjectController@addTeamPost')->name('projects.addteam');
	Route::get('projects/{project}/{team}/remove-team', 'ProjectController@removeTeam')->name('projects.removeteam');
	Route::post('projects/{project}/add-member', 'ProjectController@addMemberPost')->name('projects.addmember');
	Route::get('projects/{project}/{member}/remove-member', 'ProjectController@removeMember')->name('projects.removemember');

});
// End Project routes



// Route::resource('employee', 'EmployeeController');


Route::get('/taskshedule/{id}', 'TaskController@shedule')->name('taskshedule');
Route::post('/taskshedulepost','TaskController@shedulepost')->name('taskshedulepost');

Route::resource('/leave', 'LeaveController');
Route::get('/leaveapply','LeaveController@request');
Route::Post('/leaveapply.post','LeaveController@request')->name('leaveapply.post');

Route::get('company', 'CompanyController@index')->name('company.index');
	Route::post('company', 'CompanyController@store')->name('company.store');
	Route::get('company/{company}/edit', 'CompanyController@edit')->name('company.edit');
	Route::match(['put', 'patch'],'company/{company}', 'CompanyController@update')->name('company.update');	
    Route::get('company/{company}', 'CompanyController@show')->name('company.show');
    Route::post('company/{company}/comment', 'CompanyController@addComment')->name('company.addComment');
	Route::get('/import_excel', 'ImportExcelController@index');
	Route::post('/import_excel/import', 'ImportExcelController@import');



	Route::get('enquiry', 'EnquiryController@index')->name('enquiry.index');
	Route::post('enquiry', 'EnquiryController@store')->name('enquiry.store');
	Route::get('enquiry/{enquiry}/edit', 'EnquiryController@edit')->name('enquiry.edit');
	Route::match(['put', 'patch'],'enquiry/{enquiry}', 'EnquiryController@update')->name('enquiry.update');	
    Route::get('enquiry/{enquiry}', 'enquiryController@show')->name('enquiry.show');

    Route::get('/banners/{id}','CompanyBannerController@index');

    Route::get('bannerstore/{id}','CompanyBannerController@create')->name('banner.store');

    Route::get('/profile/{id}','CompanyProfileController@index');

  // Route::get('company/{name}/{cmpid}', function (Request $request) {

 	//   $route = $request->route('name');

 	//   // $id=$request->route('cmpid');

	 //     if($route =='Banners'){

	 //       return redirect()->route('company.banners');
	 //     }
	 //     else
	 //     {
	 //     	echo"aaaa";
	 //     }
  // });