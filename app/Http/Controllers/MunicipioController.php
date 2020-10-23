<?php

namespace App\Http\Controllers;

use App\Municipio;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{


    public function getMunicipio(Request $request)
    {
        $municipios = Municipio::where('id_provincia', $request->id)->pluck('municipio', 'id');
        $data = [
            'getMunicipio' => $municipios
        ];
        return view("ajax.getMunicipio", $data);

        //return $municipios;
    }
}