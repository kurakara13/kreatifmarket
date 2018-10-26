<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Conversation;
use App\Category;
use App\Projects;
use App\User;
use App\FreelancerBids;
use App\All;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth:user');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */

   public function dashboard()
   {

       return view('dashboard.dashboard',['count' => All::count(), 'count_bids' => All::count_bids()]);
   }

   //dashboard task

   public function task_bid($id, $title)
   {
       $projects = Projects::join('users', 'projects.user_id', '=', 'users.id')->where('projects_uniq', $id)->first();

       if($projects->user_id == Auth::user()->id){
         return redirect('/');
       }else {
         return view('task_bid',['projects' => $projects]);
       }
   }

   public function task_ask($id, $title)
   {
       $projects = Projects::join('users', 'projects.user_id', '=', 'users.id')->where('projects_uniq', $id)->first();

       if($projects->user_id == Auth::user()->id){
         return redirect('/');
       }else {
         return view('task_ask',['projects' => $projects]);
       }
   }

  public function index()
  {
      $category = Category::where('active', 1)->get();
      $projects = Projects::where('projects_status', 'Published')->get();
      // dd($projects);
      return view('home',['category' => $category, 'projects' => $projects]);
  }

  public function projects_create()
  {
      return view('projects_create');
  }

  //my-projects

  public function my_projects()
  {
      $projects = Projects::where('user_id', Auth::user()->id)->get();
      $count = Conversation::join('freelancer_bid','conversation.bids_id', '=', 'freelancer_bid.id')
                                    ->join('projects','freelancer_bid.projects_id', '=', 'projects.id')
                                    ->where('projects.user_id', Auth::user()->id)
                                    ->where('user_status', 'Freelancer')
                                    ->where('read_message', 0)
                                    ->count();
      $count_bids = Conversation::join('freelancer_bid','conversation.bids_id', '=', 'freelancer_bid.id')
                                    ->join('projects','freelancer_bid.projects_id', '=', 'projects.id')
                                    ->where('freelancer_bid.user_id', Auth::user()->id)
                                    ->where('user_status', 'Host')
                                    ->where('read_message', 0)
                                    ->count();
                                    // dd($count);

      return view('my-projects.my_projects',['projects' => $projects, 'count' => $count, 'count_bids' => $count_bids]);
  }

  public function my_projects_detail($id, $title)
  {
      $projects = Projects::where('user_id', Auth::user()->id)->where('projects_uniq', $id)->first();
      $count = Conversation::join('freelancer_bid','conversation.bids_id', '=', 'freelancer_bid.id')
                                    ->join('projects','freelancer_bid.projects_id', '=', 'projects.id')
                                    ->where('projects.user_id', Auth::user()->id)
                                    ->where('user_status', 'Freelancer')
                                    ->where('read_message', 0)
                                    ->count();
      $count_bids = Conversation::join('freelancer_bid','conversation.bids_id', '=', 'freelancer_bid.id')
                                    ->join('projects','freelancer_bid.projects_id', '=', 'projects.id')
                                    ->where('freelancer_bid.user_id', Auth::user()->id)
                                    ->where('user_status', 'Host')
                                    ->where('read_message', 0)
                                    ->count();

      return view('my-projects.my_projects_detail',['projects' => $projects, 'count' => $count, 'count_bids' => $count_bids]);
  }



  public function my_projects_bids_accepted($id, $title)
  {
      $freelancer_bids = FreelancerBids::select('id','user_id','projects_id','bid_ammount')->where('bids_uniq', $id)->first();
      $projects = Projects::select('projects_uniq')->where('id', $freelancer_bids->projects_id)->first();
      $count = Conversation::where('read_message', 0)->where('user_status', 'Freelancer')->where('bids_id', $freelancer_bids->id)->get();
      // dd($count);
      foreach ($count as $count_key) {
        Conversation::where('id', $count_key->id)->update([
          'read_message' => 1
        ]);
      }
      $count = Conversation::join('freelancer_bid','conversation.bids_id', '=', 'freelancer_bid.id')
                                    ->join('projects','freelancer_bid.projects_id', '=', 'projects.id')
                                    ->where('projects.user_id', Auth::user()->id)
                                    ->where('user_status', 'Freelancer')
                                    ->where('read_message', 0)
                                    ->count();
      $count_bids = Conversation::join('freelancer_bid','conversation.bids_id', '=', 'freelancer_bid.id')
                                    ->join('projects','freelancer_bid.projects_id', '=', 'projects.id')
                                    ->where('freelancer_bid.user_id', Auth::user()->id)
                                    ->where('user_status', 'Host')
                                    ->where('read_message', 0)
                                    ->count();

      $freelancer_bids = FreelancerBids::join('projects','freelancer_bid.projects_id', '=', 'projects.id')
                                        ->where('freelancer_bid.bids_uniq', $id)
                                        ->select(
                                          'freelancer_bid.id',
                                          'freelancer_bid.user_id',
                                          'projects_uniq',
                                          'title',
                                          'projects_filtering',
                                          'freelancer_bid.projects_id',
                                          'projects_status',
                                          'freelancer_bid.created_at',
                                          'bids_uniq',
                                          'bid_ammount',
                                          'active'
                                          )
                                        ->first();

      $user = User::where('id', $freelancer_bids->user_id)->first();
      // dd($user);
      return view('my-projects.my_projects_bids_accepted',['freelancer_bids' => $freelancer_bids, 'count_bids' => $count_bids, 'user' => $user, 'title' => $title, 'count' => $count]);
  }

  //my-bids

  public function my_projects_bids($id, $title)
  {
      $projects = Projects::where('user_id', Auth::user()->id)->where('projects_uniq', $id)->first();
      $count = Conversation::join('freelancer_bid','conversation.bids_id', '=', 'freelancer_bid.id')
                                    ->join('projects','freelancer_bid.projects_id', '=', 'projects.id')
                                    ->where('projects.user_id', Auth::user()->id)
                                    ->where('user_status', 'Freelancer')
                                    ->where('read_message', 0)
                                    ->count();

      $count_bids = Conversation::join('freelancer_bid','conversation.bids_id', '=', 'freelancer_bid.id')
                                    ->join('projects','freelancer_bid.projects_id', '=', 'projects.id')
                                    ->where('freelancer_bid.user_id', Auth::user()->id)
                                    ->where('user_status', 'Host')
                                    ->where('read_message', 0)
                                    ->count();

      $freelancer_bids = FreelancerBids::where('projects_id', $projects->id)->get();
      return view('my-projects.my_projects_bids',['count_bids' => $count_bids, 'projects' => $projects, 'count' => $count, 'freelancer_bids' => $freelancer_bids]);
  }

  public function my_bids()
  {
      // $projects = Projects::where('user_id', Auth::user())->first();
      $count = Conversation::join('freelancer_bid','conversation.bids_id', '=', 'freelancer_bid.id')
                                    ->join('projects','freelancer_bid.projects_id', '=', 'projects.id')
                                    ->where('projects.user_id', Auth::user()->id)
                                    ->where('user_status', 'Freelancer')
                                    ->where('read_message', 0)
                                    ->count();

      $count_bids = Conversation::join('freelancer_bid','conversation.bids_id', '=', 'freelancer_bid.id')
                                    ->join('projects','freelancer_bid.projects_id', '=', 'projects.id')
                                    ->where('freelancer_bid.user_id', Auth::user()->id)
                                    ->where('user_status', 'Host')
                                    ->where('read_message', 0)
                                    ->count();

      $freelancer_bids = FreelancerBids::join('projects','freelancer_bid.projects_id', '=', 'projects.id')
                                        ->where('freelancer_bid.user_id', Auth::user()->id)
                                        ->select(
                                          'freelancer_bid.id',
                                          'projects_uniq',
                                          'title',
                                          'projects_filtering',
                                          'freelancer_bid.projects_id',
                                          'projects_status',
                                          'freelancer_bid.created_at',
                                          'bids_uniq',
                                          'bid_ammount',
                                          'active'
                                          )
                                        ->get();
                                        // dd($freelancer_bids);
      return view('my-bids.my_bids',['count' => $count, 'count_bids' => $count_bids, 'freelancer_bids' => $freelancer_bids]);
  }

  public function my_bids_conversation($id, $title)
  {
      $freelancer_bids = FreelancerBids::select('id','user_id','projects_id','bid_ammount')->where('bids_uniq', $id)->first();
      $projects = Projects::select('projects_uniq')->where('id', $freelancer_bids->projects_id)->first();
      $count = Conversation::where('read_message', 0)->where('user_status', 'Host')->where('bids_id', $freelancer_bids->id)->get();
      // dd($count);
      foreach ($count as $count_key) {
        Conversation::where('id', $count_key->id)->update([
          'read_message' => 1
        ]);
      }
      $count = Conversation::join('freelancer_bid','conversation.bids_id', '=', 'freelancer_bid.id')
                                    ->join('projects','freelancer_bid.projects_id', '=', 'projects.id')
                                    ->where('projects.user_id', Auth::user()->id)
                                    ->where('user_status', 'Freelancer')
                                    ->where('read_message', 0)
                                    ->count();
      $count_bids = Conversation::join('freelancer_bid','conversation.bids_id', '=', 'freelancer_bid.id')
                                    ->join('projects','freelancer_bid.projects_id', '=', 'projects.id')
                                    ->where('freelancer_bid.user_id', Auth::user()->id)
                                    ->where('user_status', 'Host')
                                    ->where('read_message', 0)
                                    ->count();

      $conversation = Conversation::where('bids_id', $freelancer_bids->id)->get();
      $user = User::where('id', $freelancer_bids->user_id)->first();
      // dd($user);
      return view('my-bids.my_bids_conversation',['count_bids' => $count_bids, 'bids_uniq' => $id, 'id' => $projects->projects_uniq, 'user' => $user, 'title' => $title, 'count' => $count, 'freelancer_bids' => $freelancer_bids, 'conversation' => $conversation]);
  }

  //dashboard
  //
  // public function dashboard()
  // {
  //   $count = Conversation::join('freelancer_bid','conversation.bids_id', '=', 'freelancer_bid.id')
  //                                 ->join('projects','freelancer_bid.projects_id', '=', 'projects.id')
  //                                 ->where('projects.user_id', Auth::user()->id)
  //                                 ->where('user_status', 'Freelancer')
  //                                 ->where('read_message', 0)
  //                                 ->count();
  //   $count_bids = Conversation::join('freelancer_bid','conversation.bids_id', '=', 'freelancer_bid.id')
  //                                 ->join('projects','freelancer_bid.projects_id', '=', 'projects.id')
  //                                 ->where('freelancer_bid.user_id', Auth::user()->id)
  //                                 ->where('user_status', 'Host')
  //                                 ->where('read_message', 0)
  //                                 ->count();
  //                                 // dd($count_bids);
  //
  //     return view('dashboard.dashboard',['count' => $count, 'count_bids' => $count_bids]);
  // }

  public function projects_ask($id, $title)
  {
      $projects = Projects::select('user_id')->where('projects_uniq', $id)->first();

      if($projects->user_id == Auth::user()->id){
        return redirect('/');
      }else {
        return view('projects_ask',['title' => $title, 'id' => $id]);
      }
  }




  public function projects_create_post(Request $request)
  {


  }
}
