<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function beertype() {
        return $this->belongsToMany('App\Models\BeerType');
    }

    public function carts() {
        return $this->belongsToMany('App\Models\Cart');
    }
}
