<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linord extends Model
{
    use HasFactory;

    public function order() { return $this->belongsTo(Order::class, 'foreign_key'); }

    public function user() { return $this->belongsTo(User::class, 'foreign_key'); }
}
