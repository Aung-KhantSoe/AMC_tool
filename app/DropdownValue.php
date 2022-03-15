<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DropdownValue extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['name'];

    public function carditem(){
        return $this->belongsTo(CardItem::class);
      }
}
