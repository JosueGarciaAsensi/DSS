<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\BeerType;

class BeerTypeController extends Controller
{
    public function index() {
        $beertypes = BeerType::all();
        return view('admin-beertypes', ['beertypes' => $beertypes]);
    }

    public function destroy($id) {
        $beertype = BeerType::find($id);
        $beertype->delete();
        
        return redirect('/admin-beertypes')->with('success', '¡Tipo eliminado con éxito!');
    }

    public function edit(Request $request, $id){
        $beertypes = BeerType::all();
        
        $sbeertypes = [];
        
        foreach($beertypes as $beertype){
            array_push($sbeertypes, $beertype->names);
        }

        $this->validate($request,
            [
                'name' . $id => ['regex:/^[A-Za-zÑñÁáÉéÍíÓóÚúÜü ]{1,50}$/',
                                Rule::notIn($sbeertypes)],
            ],
            [
                'regex' => 'El formato del campo tipo debe ser alfabético.',
                'not_in' => 'Este tipo ya existe en la lista.',
            ]
        );

        $beertype = BeerType::findOrFail($id);
        if ($request->has('name' . $id)) {
            $beertype->names = $request->input('name' . $id);
            $beertype->save();
        }

        return redirect('/admin-beertypes')->with('success', '¡Tipo editado con éxito!');
    }

    public function create(Request $request) {
        $beertypes = BeerType::all();
        
        $sbeertypes = [];
        
        foreach($beertypes as $beertype){
            array_push($sbeertypes, $beertype->names);
        }
        
        $this->validate($request, 
            [
                'type' => ['regex:/^[A-Za-zÑñÁáÉéÍíÓóÚúÜü ]{1,50}$/',
                            Rule::notIn($sbeertypes)]
            ],
            [
                'regex' => 'El formato del campo tipo debe ser alfabético.',
                'not_in' => 'Este tipo ya existe en la lista.'
            ]
        );
        $tipoCerveza = new BeerType();
        $tipoCerveza->names = $request->input('type');
        
        $tipoCerveza->save();
        
        return redirect('/admin-beertypes')->with('success', '¡Nuevo tipo añadido con éxito!');
    }
}
