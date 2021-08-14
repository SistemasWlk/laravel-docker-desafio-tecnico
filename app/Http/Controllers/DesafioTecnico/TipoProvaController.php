<?php

namespace App\Http\Controllers\DesafioTecnico;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\TipoProva;

class TipoProvaController extends Controller
{

    private $sMsgErro = "";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current        = 'tipoprova';
        $oTipoProvas    = TipoProva::all();
        $sMsgErro       = $this->sMsgErro;
        return view('site.tipo_prova.tipo_prova', compact('oTipoProvas', 'current', 'sMsgErro'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $current  = 'tipoprova';
        $sMsgErro = $this->sMsgErro;
        return view('site.tipo_prova.novotipoprova', compact('current', 'sMsgErro')); 
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

        $oValidaTipoProva = TipoProva::where('quilometragem', '=', $tipo_corrida)->get();

        if (count($oValidaTipoProva) > 0) {
            $this->sMsgErro = "Tipo de prova já cadastrada!";
            return $this->create();
        }else{
            TipoProva::insert([
                [
                    'quilometragem' => $tipo_corrida
                ],
            ]);
            return $this->index();
        }

        $this->index();
  
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
