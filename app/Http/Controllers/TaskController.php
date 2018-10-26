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

class TaskController extends Controller
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

   public function manage()
   {
       $count = Conversation::join('freelancer_bid','conversation.bids_id', '=', 'freelancer_bid.id')->join('projects','freelancer_bid.projects_id', '=', 'projects.id')->where('projects.user_id', Auth::user()->id)->where('user_status', 'Freelancer')->where('read_message', 0)->count();

       $count_bids = Conversation::join('freelancer_bid','conversation.bids_id', '=', 'freelancer_bid.id')->join('projects','freelancer_bid.projects_id', '=', 'projects.id')->where('freelancer_bid.user_id', Auth::user()->id)->where('user_status', 'Host')->where('read_message', 0)->count();

       $task = Projects::get()->where('user_id', Auth::user()->id);
       return view('dashboard.task_manage',['count' => All::count(), 'count_bids' => All::count_bids(), 'task' => $task]);
   }

   public function manage_bidders($id, $title)
   {
       $projects = Projects::select('id')->where('projects_uniq', $id)->first();

       $freelancer_bids = FreelancerBids::join('users','freelancer_bid.user_id', '=', 'users.id')->join('projects','freelancer_bid.projects_id', '=', 'projects.id')->where('freelancer_bid.projects_id', $projects->id)->get();

       return view('dashboard.task_manage_bidders',['count' => All::count(), 'count_bids' => All::count_bids(), 'freelancer_bids' => $freelancer_bids]);
   }

   public function conversation($id, $title)
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

       $conversation = Conversation::join('freelancer_bid', 'conversation.bids_id', '=', 'freelancer_bid.id')->select('bid_ammount', 'projects_id', 'bids_id', 'user_status', 'conversation.file', 'conversation.description', 'system_message', 'conversation.created_at')->where('bids_id', $freelancer_bids->id)->get();

       $user = User::where('id', $freelancer_bids->user_id)->first();
      //  dd($conversation);
       return view('dashboard.conversation',['count' => All::count(), 'count_bids' => All::count_bids(), 'id' => $id, 'title' => $title, 'projects_uniq' => $projects->projects_uniq, 'user' => $user, 'conversation' => $conversation]);
   }

   public function active_bids()
   {
       $select = ['freelancer_bid.id','bids_uniq','projects_uniq','projects.id as projects','freelancer_bid.finish_time','time_type','title','projects_filtering','freelancer_bid.projects_id','projects_status','freelancer_bid.created_at','bids_uniq','bid_ammount','freelancer_bid.created_at','active'];
       $freelancer_bids = FreelancerBids::join('projects','freelancer_bid.projects_id', '=', 'projects.id')->where('freelancer_bid.user_id', Auth::user()->id)->select($select)->get();
       // dd($freelancer_bids);
       return view('dashboard.task_my_active_bids',['count' => All::count(), 'count_bids' => All::count_bids(), 'freelancer_bids' => $freelancer_bids]);
   }

   public function post()
   {
     $category = Category::select('id', 'name')->where('active', 1)->get();

     return view('dashboard.task_post',['count' => All::count(), 'count_bids' => All::count_bids(),'category' => $category]);
   }

   public function post_action(Request $request)
   {
     $uniq = uniqid();

     while(Projects::where('projects_uniq', $uniq)->count() != 0){
       $uniq = uniqid();
     }

     $skill = "";

     foreach ($request['skill'] as $key) {
       $skill .= $key.', ';
     }

     $projetcs_id = Projects::max('id');
     $id = $projetcs_id;


     $result = File::makeDirectory(public_path().'/files/projects/'.$id.'_'.$request['project_name'], 0775);
     $code = mt_rand(100000, 999999);
     $filename = $code.'_'.$request->file('file')->getClientOriginalName();
     $request->file->move(public_path('files/projects/'.$id.'_'.$request['project_name']), $filename);

     // dd($request);
     Projects::create([
         'projects_uniq' => $uniq,
         'user_id' => Auth::user()->id,
         'title' => $request['project_name'],
         'description' => $request['editordata'],
         'location' => $request['location'],
         'id_category' => $request['category'],
         'budget_min' => $request['budget_min'],
         'budget_max' => $request['budget_max'],
         'budget_level' => $request['radio'],
         'skill' => $skill,
         'projects_status' => 'Waiting For Check',
         'file' => $filename
     ]);
     // dd('jihad');
     return redirect('user/dashboard/task/post');
   }

   public function convesation_actiont($id, $title,Request $request)
   {
     // dd($request);
     $projects = Projects::select('id','user_id')->where('projects_uniq', ''.$id)->first();
     // dd($projects);
     if($projects->user_id == Auth::user()->id){
       $status = "Host";
       $bid_cek = FreelancerBids::join('projects','freelancer_bid.projects_id', '=', 'projects.id')->where('freelancer_bid.projects_id', $projects->id)->where('projects.user_id', Auth::user()->id)->count();
     }else {
       $status = "Freelancer";
       $bid_cek = FreelancerBids::join('projects','freelancer_bid.projects_id', '=', 'projects.id')->where('freelancer_bid.projects_id', $projects->id)->where('freelancer_bid.user_id', Auth::user()->id)->count();
     }

     if($request->ammount == null){
       $message = $request['editordata'];
       $ammount = null;
     }else {
       $message = "Mengajukan Penawaran Sebesar Rp. ";
       $ammount = $request->ammount;
     }

     // dd($bid_cek);
     if($bid_cek == 0){
       $uniq = uniqid();

       while(FreelancerBids::where('bids_uniq', $uniq)->count() != 0){
         $uniq = uniqid();
       }
       FreelancerBids::create([
           'bids_uniq' => $uniq,
           'user_id' => Auth::user()->id,
           'projects_id' => $projects->id,
           'bid_ammount' => $ammount,
           'finish_time' => $request->finish_time,
           'time_type' => $request->time_type
       ]);

       if($request->file('file') == null){
         $filename = null;
       }else {
         $code = mt_rand(100000, 999999);
         $filename = $code.'_'.$request->file('file')->getClientOriginalName();
         $request->file->move(public_path('files/projects/'.$projects->id.'_'.$title), $filename);
       }

       $freelancer_bids = FreelancerBids::max('id');
       $bid_id = FreelancerBids::select('bids_uniq')->where('id', $freelancer_bids)->first();
       $bids_uniq = $bid_id->bids_uniq;
       Conversation::create([
           'bids_id' => $freelancer_bids,
           'user_status' => $status,
           'description' => $request['editordata'],
           'file' => $filename,
           'system_message' => 0
       ]);

       if(isset($request->ammount)){
         Conversation::create([
             'bids_id' => $freelancer_bids,
             'user_status' => $status,
             'description' => $message,
             'file' => null,
             'system_message' => 1
         ]);
       }
     }else {

       $bid_id = FreelancerBids::select('id','bids_uniq')->where('projects_id', $projects->id)->first();

       // dd($projects->id);
       $bids_uniq = $bid_id->bids_uniq;
       if($request->file('file') == null){
         $filename = null;
       }else {
         $code = mt_rand(100000, 999999);
         $filename = $code.'_'.$request->file('file')->getClientOriginalName();
         $request->file->move(public_path('files/projects/'.$projects->id.'_'.$title), $filename);
       }

       Conversation::create([
           'bids_id' => $bid_id->id,
           'user_status' => $status,
           'description' => $request['editordata'],
           'file' => $filename,
           'system_message' => 0
       ]);

       if(isset($request->ammount)){
         FreelancerBids::where('id', $bid_id->id)->update([
           'bid_ammount' => $request->ammount
         ]);

         Conversation::create([
             'bids_id' => $bid_id->id,
             'user_status' => $status,
             'description' => $message,
             'file' => null,
             'system_message' => 1
         ]);
       }
     }
     // dd($projects->id);
     // dd($request);

       if($status == "Host"){
         return redirect('/user/dashboard/task/conversation/'.$bids_uniq.'/'.$title);
       }else {
         return redirect('/user/dashboard/task/conversation/'.$bids_uniq.'/'.$title);
       }
   }

}
