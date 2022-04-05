<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function beer_types() { return $this->belongsTo('App\Models\BeerType'); }
    
    public function users() { return $this->belongsTo('App\Models\User'); }

    public function carts() { return $this->belongsToMany('App\Models\Cart'); }

    public function orders() { return $this->belongsToMany('App\Models\Order'); }
}
