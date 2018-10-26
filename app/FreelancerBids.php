<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FreelancerBids extends Model
{
    protected $table = 'freelancer_bid';

    protected $fillable = [
        'bids_uniq', 'user_id', 'projects_id','bid_ammount', 'finish_time', 'time_type'
    ];
}
