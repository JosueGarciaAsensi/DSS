<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    /**
     * The explicit primary key.
     * 
     */
    protected $primaryKey = ['users_id', 'product_id'];

    public function products() {
        return $this->belongsToMany('App\Models\Product');
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}