<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function bill() { return $this->belongsTo(Bill::class); }

    //MIRAR COMO COÑO SE HACE (GRACIAS JORDI)
    //public function linord() { return $this->belongsTo(Linord::class); }

    public function product() { return $this->belongsToMany(Product::class); }

    public function user() { return $this->belongsTo(User::class); }

    public function cart() { return $this->hasOne(Cart::class); }
}
