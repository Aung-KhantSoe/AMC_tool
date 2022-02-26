<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    //
    protected $fillable = ['title'];

    public function carditems()
    {
        return $this->hasMany(CardItem::class);
    }
}
