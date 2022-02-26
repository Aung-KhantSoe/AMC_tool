<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardItem extends Model
{
    //
    protected $fillable = ['name','type'];

    public function card(){
     return $this->belongsTo(Card::class);
   }

   public function dropdownvalues()
    {
        return $this->hasMany(DropdownValue::class);
    }
}
