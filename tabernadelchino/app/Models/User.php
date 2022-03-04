<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function address() { return $this->belongsTo(Address::class); }

    public function linord() { return $this->hasMany(Linord::class, 'foreign_key'); }

    public function order() { return $this->hasMany(Order::class); }

    public function cart() { return $this->hasOne(Cart::class, 'foreign_key'); }

    public function product() { 
        if ($this->admin){
            return $this->belongsTo(Product::class);
        }
        else{
            echo "No es un administrador";
        }
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'dni',
        'admin',
        'address_id',
        'surname'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
