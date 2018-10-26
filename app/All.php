<?php
namespace App;

use Auth;

class All {

 public static function count() {
  $count = Conversation::join('freelancer_bid','conversation.bids_id', '=', 'freelancer_bid.id')->join('projects','freelancer_bid.projects_id', '=', 'projects.id')->where('projects.user_id', Auth::user()->id)->where('user_status', 'Freelancer')->where('read_message', 0)->count();
  return $count;
 }

 public static function count_bids() {
  $count_bids = Conversation::join('freelancer_bid','conversation.bids_id', '=', 'freelancer_bid.id')->join('projects','freelancer_bid.projects_id', '=', 'projects.id')->where('freelancer_bid.user_id', Auth::user()->id)->where('user_status', 'Host')->where('read_message', 0)->count();
  return $count_bids;
 }

}








 ?>
