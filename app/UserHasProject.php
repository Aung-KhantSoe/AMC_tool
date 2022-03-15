<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class UserHasProject extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'user_id', 'project_id',
    ];
}
