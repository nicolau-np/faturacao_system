<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use App\Provincia;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fornecedores = Fornecedor::paginate(5);

        $data = [
            'title' => "Fornecedores",
            'menu' => "Fornecedores",
            'submenu' => "Listar",
            'type' => "view",
            'getFornecedores' => $fornecedores

        ];

        return view("fornecedor.list", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provincias = Provincia::pluck('provincia', 'id');

        $data = [
            'title' => "Fornecedores",
            'menu' => "Fornecedores",
            'submenu' => "Novo",
            'type' => "form",
            'getProvincias' => $provincias

        ];

        return view("fornecedor.new", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_municipio' => ['required', 'Integer'],
            'entidade' => ['required', 'string', 'min:3', 'max:255', 'unique:fornecedors,entidade,except,id'],
            'telefone' => ['required', 'Integer'],
            'endereco' => ['required', 'string', 'min:9', 'max:255'],
        ]);

        if (Fornecedor::create($request->except('_token'))) {
            return back()->with(['success' => "Feito com sucesso"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fornecedor = Fornecedor::find($id);
        if (!$fornecedor) {
            return back()->with(['error' => "Não encontrou o fornecedor"]);
        }


        $data = [
            'title' => "Fornecedores",
            'menu' => "Fornecedores",
            'submenu' => "Mostrar",
            'type' => "show",
            'getFornecedor' => $fornecedor

        ];

        return view("fornecedor.show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fornecedor = Fornecedor::find($id);
        if (!$fornecedor) {
            return back()->with(['error' => "Não encontrou o fornecedor"]);
        }

        $provincias = Provincia::pluck('provincia', 'id');

        $data = [
            'title' => "Fornecedores",
            'menu' => "Fornecedores",
            'submenu' => "Novo",
            'type' => "form",
            'getProvincias' => $provincias,
            'getFornecedor' => $fornecedor

        ];

        return view("fornecedor.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fornecedor = Fornecedor::find($id);
        if (!$fornecedor) {
            return back()->with(['error' => "Não encontrou o fornecedor"]);
        }
        
        $request->validate([
            'id_municipio' => ['required', 'Integer'],
            'entidade' => ['required', 'string', 'min:3', 'max:255'],
            'telefone' => ['required', 'Integer'],
            'endereco' => ['required', 'string', 'min:9', 'max:255'],
        ]);

        if (Fornecedor::find($id)->update($request->except('_token'))) {
            return back()->with(['success' => "Feito com sucesso"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}