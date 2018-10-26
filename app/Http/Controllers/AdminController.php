<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Conversation;
use App\Category;
use App\Projects;
use App\User;
use App\FreelancerBids;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */

   public function dashboard()
   {

       return view('admin.dashboard');
   }

   public function adm_task_manage()
   {
      $projects = Projects::join('users','projects.user_id', '=', 'users.id')
                              ->join('category', 'projects.id_category', '=', 'category.id')
                              ->select(
                                'projects.id as projects_id',
                                'title',
                                'category.name as category',
                                'users.name as users',
                                'users.id as users_id',
                                'projects_status',
                                'projects.created_at',
                                'projects.active'
                                )
                                ->get();
       return view('admin.task_manage',['projects' => $projects]);
   }

   public function adm_task_manage_active(Request $request)
   {
       Projects::where('id', $request['id'])->update([
         'active' => $request['active'],
         'projects_status' => 'Published'
       ]);

       return redirect('admin/dashboard/task/manage');
   }
}
