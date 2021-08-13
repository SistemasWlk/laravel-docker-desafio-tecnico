<?php

namespace App\Http\Controllers\DesafioTecnico;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Corredor;

class CorredorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current            = 'corredor';
        $oListaCorredores   = Corredor::all();
        return view('site.corredor.corredor', compact('oListaCorredores', 'current'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('site.corredor.novocorredor', ['current' => 'corredor']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $current         = 'corredor';
        $nome            = $request->input('nome_corredor');
        $cpf             = $request->input('cpf_corredor');
        $data_nascimento = $request->input('dt_nascimento_corredor');
        $idade           = $request->input('idade_corredor');

        Corredor::insert([
            [
                'nome' => $nome, 
                'cpf' => $cpf,
                'data_nascimento' => $data_nascimento,
                'idade' => $idade
            ],
        ]);

        $oListaCorredores = Corredor::all();
        return view('site.corredor.corredor', compact('oListaCorredores', 'current'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
