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

    public function delete($id) {
        $beertype = BeerType::find($id);
        $beertype->delete();
        return redirect('/admin-beertypes')->with('success', 'deleted succesfully!');
    }

    public function create(Request $request) {
        $tipoCerveza = new BeerType();
        $tipoCerveza->names = $request->input('type');
        $tipoCerveza->save();
        return back();
    }
}
