<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CardItem extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['name','type'];

    public function card(){
     return $this->belongsTo(Card::class);
   }

   public function dropdownvalues()
    {
        return $this->hasMany(DropdownValue::class);
    }

    public function inputvalues()
    {
        return $this->hasMany(InputValue::class);
    }
}
