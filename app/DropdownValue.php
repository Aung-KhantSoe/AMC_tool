<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DropdownValue extends Model
{
    //
    protected $fillable = ['name'];

    public function carditem(){
        return $this->belongsTo(CardItem::class);
      }
}
