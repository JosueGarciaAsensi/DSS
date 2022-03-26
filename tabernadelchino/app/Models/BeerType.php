<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeerType extends Model
{
    use HasFactory;

    public function product() { return $this->hasMany('App\Models\Product'); }

    /** 
    *   Problema: ¿La clase es como una factoría 
    *    o trabajo sobre mis objetos? 
    */
    public function create($name, $visible) {
        $beer_type = new BeerType([$name, $visible]);
        $beer_type->save();
    }

    public function read($name) {
        return BeerType::findOrFail($name);
    }

    public function edit($new_name, $visible) {
        $this->name = $new_name;
        $this->visible = $visible;

        $this->save();
    }

    public function remove() {
        $this->delete();
    }

    public function toggleVisible() {
        if ($this->visible == true) {
            $this->visible = false;
        } else {
            $this->visble = true;
        }

        $this->save();
    }
}
