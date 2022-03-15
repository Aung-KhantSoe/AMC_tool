<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProjectHasFlow extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'project_id', 'flow_id',
    ];
}
