<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Flow extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'name', 'step', 'document_format',
    ];
}
