<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linord extends Model
{
    use HasFactory;

    public function order() { return $this->belongsToMany(Order::class, 'foreign_key'); }

    public function user() { return $this->belongsToMany(User::class, 'foreign_key'); }
}
