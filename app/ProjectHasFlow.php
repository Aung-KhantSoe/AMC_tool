<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectHasFlow extends Model
{
    //
    protected $fillable = [
        'project_id', 'flow_id',
    ];
}
