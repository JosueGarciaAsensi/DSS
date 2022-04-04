<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\BeerType;

class BeerTypeController extends Controller
{
    private $status = null;
    public function index() {
        $beertypes = BeerType::all();
        return view('admin-beertypes', ['beertypes' => $beertypes, 'status' => $this->status]);
    }

    public function delete($id) {
        $beertype = BeerType::find($id);
        $beertype->delete();
        
        $beertypes = BeerType::all();
        $this->status = "¡Tipo eliminado con éxito!";
        return view('admin-beertypes', ['beertypes' => $beertypes, 'status' => $this->status]);
    }

    public function edit(Request $request, $id){
        $beertypes = BeerType::all();
        $sbeertypes = [];
        foreach($beertypes as $beertype){
            $sbeertypes += [$beertype->names];
        }

        $this->validate($request,
            [
                'name' . $id => ['regex:/^[A-Za-zÑñÁáÉéÍíÓóÚúÜü ]{1,50}$/',
                            Rule::notIn($sbeertypes)]
            ],
            [
                'regex' => 'El campo formato del campo tipo debe ser alfabético.',
                'not_in' => 'Este tipo ya existe en la lista.'
            ]
        );

        $beertype = BeerType::findOrFail($id);
        if ($request->has('name' . $id)) {
            $beertype->names = $request->input('name' . $id);
            $beertype->save();
        }
       

        $beertypes = BeerType::all();
        $this->status = "¡Tipo editado con éxito!";
        return view('admin-beertypes', ['beertypes' => $beertypes, 'status' => $this->status]);
    }

    public function create(Request $request) {
        $beertypes = BeerType::all();
        
        $sbeertypes = [];
        foreach($beertypes as $beertype){
            $sbeertypes += [$beertype->names];
        }
        
        $this->validate($request, 
            [
                'type' => ['regex:/^[A-Za-zÑñÁáÉéÍíÓóÚúÜü ]{1,50}$/',
                            Rule::notIn($sbeertypes)]
            ],
            [
                'regex' => 'El campo formato del campo tipo debe ser alfabético.',
                'not_in' => 'Este tipo ya existe en la lista.'
            ]
        );
        $tipoCerveza = new BeerType();
        $tipoCerveza->names = $request->input('type');
        
        $tipoCerveza->save();
        $beertypes = BeerType::all();
        $this->status = "¡Nuevo tipo añadido con éxito!";
        return view('admin-beertypes', ['beertypes' => $beertypes, 'status' => $this->status]);
    }
}
