<?php

namespace App\Http\Controllers\DesafioTecnico;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\TipoProva;

class TipoProvaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current        = 'tipoprova';
        $oTipoProvas    = TipoProva::all();
        return view('site.tipo_prova.tipo_prova', compact('oTipoProvas', 'current'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('site.tipo_prova.novotipoprova', ['current' => 'tipoprova']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $current         = 'tipoprova';
        $tipo_corrida    = $request->input('tipo_corrida');

        TipoProva::insert([
            [
                'quilometragem' => $tipo_corrida
            ],
        ]);

        $oTipoProvas = TipoProva::all();
        return view('site.tipo_prova.tipo_prova', compact('oTipoProvas', 'current'));  
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
