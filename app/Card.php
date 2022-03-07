<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Card extends Model
{
    //
    use SoftDeletes;
    
    protected $fillable = ['title'];

    public function carditems()
    {
        return $this->hasMany(CardItem::class);
    }

    public function flow(){
        return $this->belongsTo(Flow::class);
      }
}
