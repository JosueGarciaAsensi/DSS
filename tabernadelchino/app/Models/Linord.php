<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linord extends Model
{
    use HasFactory;

    public function order() { return $this->hasOne(Order::class, 'foreign_key'); }

    public function user() { return $this->hasOne(User::class, 'foreign_key'); }
}
