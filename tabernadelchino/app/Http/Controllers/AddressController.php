<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;

class AddressController extends Controller
{
    // FUncion para editar direccion
    public function edit($id, Request $request)
    {
        $address = Address::find($id);
        $address->type = $request->input('addresstype' . $id);
        $address->name = $request->input('addressname' . $id);
        $address->pc = $request->input('addresspc' . $id);
        $address->save();
        return redirect()->back();
    }
}
