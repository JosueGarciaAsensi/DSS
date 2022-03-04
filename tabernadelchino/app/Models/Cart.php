<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function product() {
        return $this->belongsToMany('App\Models\Product');
    }

    public function user() {
        return $this->hasOne('App\Models\User');
    }

    public function order(){
        return $this->belongsTo('App\Models\Cart');
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'status'
    ];
}