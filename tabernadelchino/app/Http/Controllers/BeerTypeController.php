<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BeerType;

class BeerTypeController extends Controller
{
    public function index() {
        $beertypes = BeerType::all();
        return view('admin-beertypes', ['beertypes' => $beertypes]);
    }
}
