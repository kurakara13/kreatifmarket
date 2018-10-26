<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $table = 'projects';

    protected $fillable = [
        'projects_uniq', 'user_id', 'title', 'description', 'location', 'id_category', 'budget_min', 'budget_max', 'budget_level', 'projects_status', 'skill', 'file'
    ];

    protected $dates = ['created_at', 'update_at'];
}
