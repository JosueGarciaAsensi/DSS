<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function beertype() { return $this->hasOne('App\Models\BeerType'); }




    
    public function user() { return $this->hasOne('App\Models\User'); }

    public function cart() { return $this->belongsToMany('App\Models\Cart'); }

    public function order() { return $this->belongsToMany('App\Models\Order'); }

    public function bill() { return $this->belongsToMany('App\Models\Bill'); }
}
