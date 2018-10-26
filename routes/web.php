<?php

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

//home
Route::get('/','HomeController@home')->name('home');
Route::get('/task','HomeController@task')->name('projects');
Route::get('/task/search/{id}','HomeController@task_search')->name('task_search');
Route::get('/task/detail/{id}/{title}','HomeController@task_detail')->name('task_detail');
Route::get('/task/bid/{id}/{title}','UserController@task_bid')->name('bid_task');
Route::get('/task/ask/{id}/{title}','UserController@task_ask')->name('bid_ask');

Auth::routes();

//dashboard user
Route::get('/user', 'UserController@index')->name('user.home');
Route::get('/user/dashboard/message', 'UserController@usr_task_post')->name('usr.message');

//dashboard user task
Route::get('/user/dashboard/task/manage', 'TaskController@manage')->name('usr.task.manage');
Route::get('/user/dashboard/task/manage/{id}/{title}/bidders', 'TaskController@manage_bidders')->name('usr.task.manage.bidders');
Route::get('/user/dashboard/task/post', 'TaskController@post')->name('usr.task.post');
Route::get('/user/dashboard/task/my-active-bids', 'TaskController@active_bids')->name('usr.task.my_active_bids');
Route::get('/user/dashboard/task/conversation/{id}/{title}', 'TaskController@conversation')->name('usr.task.conversation');
Route::post('/user/dashboard/task/post', 'TaskController@post_action')->name('usr.task.post_action');
Route::post('/user/dashboard/task/conversation/post/{id}/{title}','TaskController@convesation_action')->name('task_conversation_post');

//
Route::get('/projects/bid/{id}/{title}','UserController@projects_bid')->name('bid_projects');
Route::get('/projects/ask/{id}/{title}','UserController@projects_ask')->name('ask_projects');
Route::get('/user/dashboard','UserController@dashboard')->name('usr.dashboard');
Route::get('/dashboard/my-projects','UserController@my_projects')->name('my_projects');
Route::get('/dashboard/my-projects/detail/{id}/{title}','UserController@my_projects_detail')->name('my_projects_detail');
Route::get('/dashboard/my-projects/bids/{id}/{title}','UserController@my_projects_bids')->name('my_projects_bids');
Route::get('/dashboard/my-projects/bids/conversation/{id}/{title}','UserController@my_projects_bids_conversation')->name('my_projects_bids_conversation');
Route::get('/dashboard/my-projects/bids/accepted/{id}/{title}','UserController@my_projects_bids_accepted')->name('my_projects_bids_accepted');
Route::post('/dashboard/my-projects/bids/conversation/{id}/{title}','UserController@projects_ask_post')->name('my_projects_bids_conversation_reply');
Route::get('/dashboard/my-bids','UserController@my_bids')->name('my_bids');
Route::get('/dashboard/my-bids/bids/conversation/{id}/{title}','UserController@my_bids_conversation')->name('my_bids_conversation');
Route::post('/dashboard/my-bids/bids/conversation/{id}/{title}','UserController@projects_ask_post')->name('my_bids_conversation_post');
Route::get('/dashboard/my-profile','UserController@dashboard')->name('my-profile');
Route::get('/dashboard/my-pockets','UserController@dashboard')->name('my-pockets');
Route::get('/dashboard/message','UserController@dashboard')->name('message');

//Admin
Route::get('/admin/dashboard','AdminController@dashboard')->name('admin.dashboard');
Route::get('/admin/dashboard/message','AdminController@adm_message')->name('adm.message');
Route::get('/admin/dashboard/task/manage','AdminController@adm_task_manage')->name('adm.task.manage');
Route::post('/admin/dashboard/task/manage/active','AdminController@adm_task_manage_active')->name('adm.task.manage.active');
Route::get('/admin/dashboard/taks/bidders','AdminController@adm_task_manage')->name('adm.task.bidders');


Route::get('/verifyemail/{token}', 'Auth\RegisterController@verify');
Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/login', 'Auth\UserLoginController@showLoginForm')->name('user.login');
Route::post('/login', 'Auth\UserLoginController@login')->name('user.login.submit');

Route::group(['middleware' => ['web']], function () {
    Route::get('/under-construction', 'UnderConstruction\UnderConstructionController@index');
    Route::get('/under-construction/login', 'UnderConstruction\UnderConstructionController@login');
    Route::post('/under-construction/login', 'UnderConstruction\UnderConstructionController@authenticate');
    Route::get('/under-construction/logout', 'UnderConstruction\UnderConstructionController@logout');
});
