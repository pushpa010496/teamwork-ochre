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

Route::get('pharmatech-company-enquires','Jobs\CompanyController@updatePharmatechCompanyEnquires');

Route::get('automotive-company-enquires','Jobs\CompanyController@updateAutomotiveCompanyEnquires');

Route::get('hospitals-company-enquires','Jobs\CompanyController@updateHospitalsCompanyEnquires');

Route::get('sports-company-enquires','Jobs\CompanyController@updateSportsCompanyEnquires');

Route::get('plastics-company-enquires','Jobs\CompanyController@updatePlasticsCompanyEnquires');

Route::get('/', 'HomeController@index')->name('home');
Route::get('technocompanies/{id}', 'CompanyController@index')->name('technocompany.index');
    Route::get('companies', 'CompanyController@index')->name('company.index');
    
    Route::get('companyinfo', 'CompanyController@getcompany')->name('company-list');
    
    Route::get('companyinfo/{technology}/{company}', 'CompanyController@getCompanyFilter')->name('company-list-filter');
    
    Route::post('companyinfo', 'CompanyController@getcompany');
    
    Route::post('companies', 'CompanyController@store')->name('company.store');
    Route::get('companies/{company}/edit', 'CompanyController@edit')->name('company.edit');
    Route::match(['put', 'patch'],'company/{company}', 'CompanyController@update')->name('company.update'); 
    
    Route::post('companies/{company}/comment', 'CompanyController@addComment')->name('company.addComment');
    Route::get('/import_excel', 'ImportExcelController@index');
    Route::post('/import_excel/import', 'ImportExcelController@import');
    Route::get('companies/{company}', 'CompanyController@show')->name('company.show');
    
    Route::get('export_excel', 'ImportExcelController@exportCompaimes')->name('companies.export_excel');
    
    Route::post('export_excel', 'ImportExcelController@exportCompaimes')->name('companies.export_excel.post');
    
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
	 Route::resource("permissions", "PermissionController"); 
	 Route::resource("roles", "RoleController");
});



Route::get('/ajax-employee/{id}','EmployeeController@getemployee');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/products', 'ProductController');
Route::resource('/categories', 'CategoryController');

// Route::group(['middleware' => ['permission:settings']], function() {
	
// });
// Route::group(['middleware' => ['role:manager']], function() {
//     Route::resource("users","UserController");
//     Route::resource('department', 'DepartmentController');
//     Route::resource('designation', 'DesignationController');
// });

Route::group(['middleware' => ['role:admin|manager|employee|sub-admin']], function() {
     Route::resource("users","UserController");
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

    

	Route::get('enquiry', 'EnquiryController@index')->name('enquiry.index');
	Route::post('enquiry', 'EnquiryController@store')->name('enquiry.store');
	Route::get('enquiry/{enquiry}/edit', 'EnquiryController@edit')->name('enquiry.edit');
	Route::match(['put', 'patch'],'enquiry/{enquiry}', 'EnquiryController@update')->name('enquiry.update');	
    Route::get('enquiry/{enquiry}', 'enquiryController@show')->name('enquiry.show');

    Route::get('/banners/{id}','CompanyBannerController@index')->name('banners');

    Route::post('cmpbanner','CompanyBannerController@store')->name('cmpbanner.store');

    Route::get('/banneredit/{id}','CompanyBannerController@edit')->name('banner.edit');

    //Route::post('/bannerupdate','CompanyBannerController@update')->name('banners.update');
 
    Route::match(['put', 'patch'],'bannerupdate/{baner}', 'CompanyBannerController@update')->name('banners.update');

    Route::post('banneredit','CompanyBannerController@edit')->name('cmpbanner.edit');

    //Route::get('/profile/{id}','CompanyProfileController@index');

    //Routes for profile

    Route::get('/profile/{id}','CompanyProfileController@index')->name('profile');
    Route::post('companyprofile','CompanyProfileController@store')->name('profile.store');
   // Route::post('profileedit','CompanyProfileController@edit')->name('profile.edit');
    Route::get('/profileedit/{id}','CompanyProfileController@edit')->name('profile.edit');
    Route::match(['put', 'patch'],'profileupdate/{profile}', 'CompanyProfileController@update')->name('profile.update');



    //Route for Newsletter

    Route::get('/newsletter/{id}','CompanyNewsletterController@index')->name('newsletter');
    Route::post('companynewsletter','CompanyNewsletterController@store')->name('newsletter.store');
    Route::get('/newsletteredit/{id}','CompanyNewsletterController@edit')->name('newsletter.edit');
    Route::match(['put', 'patch'],'newsletterupdate/{newsletter}', 'CompanyNewsletterController@update')->name('newsletter.update');

//Routes for Article

    Route::get('/article/{id}','CompanyArticleController@index')->name('article');
    Route::post('companyarticle','CompanyArticleController@store')->name('article.store');
    Route::get('/articleedit/{id}','CompanyArticleController@edit')->name('article.edit');
    Route::match(['put', 'patch'],'articleupdate/{article}', 'CompanyArticleController@update')->name('article.update');

    //Routes for Interviews

    Route::get('/interview/{id}','CompanyInterviewController@index')->name('interview');
    Route::post('companyinterview','CompanyInterviewController@store')->name('interview.store');
    Route::get('/interviewedit/{id}','CompanyInterviewController@edit')->name('interview.edit');
    Route::match(['put', 'patch'],'interviewupdate/{interview}', 'CompanyInterviewController@update')->name('interview.update');


    //Routes for Content marketing

    Route::get('contentmarketing/{id}','CompanyContentMarketingController@index')->name('contentmarketing');
    Route::post('companycontentmarketing','CompanyContentMarketingController@store')->name('contentmarketing.store');
    Route::get('/contentmarketingedit/{id}','CompanyContentMarketingController@edit')->name('contentmarketing.edit');
    Route::match(['put', 'patch'],'contentmarketingupdate/{content}', 'CompanyContentMarketingController@update')->name('contentmarketing.update');


 //Routes for Webinars

    Route::get('webinars/{id}','CompanyWebinarController@index')->name('webinars');
    Route::post('webinars','CompanyWebinarController@store')->name('webinars.store');
    Route::get('/webinarsedit/{id}','CompanyWebinarController@edit')->name('webinars.edit');
    Route::match(['put', 'patch'],'webinarsupdate/{content}', 'CompanyWebinarController@update')->name('webinars.update');


//Routes for Email marketing

    Route::get('emailmarketing/{id}','CompanyEmailMarketingController@index')->name('emailmarketing');
    Route::post('emailmarketing','CompanyEmailMarketingController@store')->name('emailmarketing.store');
    Route::get('/emailmarketingedit/{id}','CompanyEmailMarketingController@edit')->name('emailmarketing.edit');
    Route::match(['put', 'patch'],'emailmarketingupdate/{content}', 'CompanyEmailMarketingController@update')->name('emailmarketing.update');


    //Routes for RFQ

    Route::get('guaranteedrfq/{id}','CompanyRFQController@index')->name('guaranteedrfq');
    Route::post('guaranteedrfq','CompanyRFQController@store')->name('guaranteedrfq.store');
    Route::get('guaranteedrfqedit/{id}','CompanyRFQController@edit')->name('guaranteedrfq.edit');
    Route::match(['put', 'patch'],'guaranteedrfqupdate/{content}', 'CompanyRFQController@update')->name('guaranteedrfq.update');

//Routes for social media

    Route::get('socialmediamarketing/{id}','CompanySocialMediaMarketingController@index')->name('socialmediamarketing');
    Route::post('socialmediamarketing','CompanySocialMediaMarketingController@store')->name('socialmediamarketing.store');
    Route::get('socialmediamarketingedit/{id}','CompanySocialMediaMarketingController@edit')->name('socialmediamarketing.edit');
    Route::match(['put', 'patch'],'socialmediamarketingupdate/{content}', 'CompanySocialMediaMarketingController@update')->name('socialmediamarketing.update');

//Routes for Product Lunch

    Route::get('productlaunch/{id}','ProductLunchController@index')->name('productlunch');
    Route::post('companyproductlunch','ProductLunchController@store')->name('productlunch.store');
    Route::get('productlaunchedit/{id}','ProductLunchController@edit')->name('productlunch.edit');
    Route::match(['put', 'patch'],'productlunchupdate/{content}', 'ProductLunchController@update')->name('productlunch.update');

    //Routes for notification

    Route::get('bannernotifi','NotificationController@bannernotify');
    
    Route::get('events', 'EventController@index')->name('events');

    Route::get('webportals','WebController@index')->name('webportals');

    Route::post('fisicalfilter', 'CompanyController@filterByTechnoCompanies')->name('filter-techno-companies');
   Route::post('techno-fiscal-year-filter', 'CompanyController@filterByTechnologieFiscalYear')->name('techno-fiscal-year-filter');
  Route::get('goback', 'HomeController@prev')->name('goback');
  
 Route::post('filter-companies','CompanyController@filterByCompaines')->name('filter-companies');
 
//  Route::get('filter-companies','CompanyController@filterByCompaines')->name('filter-pagination-companies');
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  

