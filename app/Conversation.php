<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $table = 'conversation';

    protected $fillable = [
        'bids_id', 'user_status', 'file', 'description', 'system_message'
    ];

}
