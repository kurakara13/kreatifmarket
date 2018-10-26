<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Projects;
use App\FreelancerBids;
use App\Category;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth:user');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     public function home()
     {
         $category = Category::where('active', 1)->get();
         $projects = Projects::where('projects.active', 1)
                                ->where('projects_status', 'Published')
                                ->select('location', 'projects_uniq', 'title', 'budget_min', 'budget_max', 'projects.created_at', 'budget_level')
                                ->get();

         return view('home',['category' => $category, 'projects' => $projects]);
     }

     public function task()
     {
       if(isset(Auth::user()->id)){
         $projects = Projects::where('user_id', '!=', Auth::user()->id)->where('active', 1)->get();
         $bids = FreelancerBids::where('user_id', Auth::user()->id)->get();
       }else {
         $projects = Projects::where('active', '=', 1)->where('projects_status', '=', 'Published')->get();
         $bids = null;
       }
       $category = Category::where('active', 1)->get();
       // dd($projects);
         return view('projects',['projects' => $projects, 'bids' => $bids, 'category' => $category]);
     }

     public function task_detail($projects_uniq, $title)
     {
         $projects = Projects::where('projects_uniq', '=', $projects_uniq)->first();


        //  dd($span);
         return view('task_detail',['projects' => $projects]);
     }

     public function task_search($id)
     {
       if(isset(Auth::user()->id)){
         if($id == "Complete"){
           $projects = Projects::join('users', 'projects.user_id', '=', 'users.id')
                                ->where('user_id', '!=', Auth::user()->id)->where('projects.active', 1)
                                ->where('projects_status', 'Published')
                                ->where('projects_status', $id)
                                ->select('title', 'projects_filtering', 'description', 'projects_budget', 'finish_day', 'projects.created_at', 'projects_uniq','image')
                                ->get();
         }else {
           $projects = Projects::join('users', 'projects.user_id', '=', 'users.id')
                                ->where('user_id', '!=', Auth::user()->id)->where('projects.active', 1)
                                ->where('projects_status', 'Published')
                                ->where('projects_filtering', 'like', '%'.$id.'%')
                                ->select('title', 'projects_filtering', 'description', 'projects_budget', 'finish_day', 'projects.created_at', 'projects_uniq','image')
                                ->get();
         }

         $bids = FreelancerBids::where('user_id', Auth::user()->id)->get();
       }else {
         if($id == "Complete"){
           $projects = Projects::join('users', 'projects.user_id', '=', 'users.id')
                                ->where('projects.active', 1)
                                ->where('projects_status', 'Published')
                                ->where('projects_status', $id)
                                ->select('title', 'projects_filtering', 'description', 'projects_budget', 'finish_day', 'projects.created_at', 'projects_uniq','image')
                                ->get();
         }else {
           $projects = Projects::join('users', 'projects.user_id', '=', 'users.id')
                                ->where('projects.active', 1)
                                ->where('projects_status', 'Published')
                                ->where('projects_filtering', 'like', '%'.$id.'%')
                                ->select('title', 'projects_filtering', 'description', 'projects_budget', 'finish_day', 'projects.created_at', 'projects_uniq','image')
                                ->get();
         }

         $bids = null;
       }
       $category = Category::where('active', 1)->get();
       // dd($projects);
         return view('projects',['projects' => $projects, 'bids' => $bids, 'category' => $category]);
     }


}
