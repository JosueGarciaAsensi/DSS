<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    //public function order() { return $this->hasOne('App\Models\Order'); }
    public function order() { return $this->belongsTo('App\Models\Order'); }

    public function product(){ return $this->belongsToMany(Product::class); }
}
