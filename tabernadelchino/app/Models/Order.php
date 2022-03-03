<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function bill() {
        return $this->belongsTo('App\Models\Bill');
    }

    public function user(){
        return $this->belongsTo(Address::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
