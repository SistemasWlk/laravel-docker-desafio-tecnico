<?php

namespace App\Http\Controllers\DesafioTecnico;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Prova;
use App\TipoProva;

class ProvaController extends Controller
{

    private $sMsgErro = "";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sMsgErro = $this->sMsgErro;
        $current  = 'prova';
        $oProvas  = Prova::select('provas.*', 'quilometragem')
            ->join('tipo_provas', 'provas.id_tp_prova', '=', 'tipo_provas.id')
            ->orderby('provas.id')
            ->get();
        return view('site.prova.prova', compact('oProvas', 'current', 'sMsgErro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sMsgErro    = $this->sMsgErro;
        $current     = 'prova';
        $oTipoProvas = TipoProva::all();
        return view('site.prova.novoprova', compact('oTipoProvas', 'current', 'sMsgErro'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $current     = 'prova';
        $tipo_prova  = $request->input('tipo_prova');
        $dt_prova    = $request->input('dt_prova');

        $oValidaProva = Prova::where('id_tp_prova', '=', $tipo_prova)
            ->where('data', '=', $dt_prova)
            ->get();

        if (count($oValidaProva) > 0) {
            $this->sMsgErro = "Prova já cadastrada para essa data!";
            return $this->create();
        }elseif($dt_prova < date('Y-m-d')){
            $this->sMsgErro = "Data invalida. Data da prova tem que ser maior que a data atual!";
            return $this->create();
        }else{
            Prova::insert([
                [
                    'id_tp_prova' => $tipo_prova,
                    'data' => $dt_prova
                ],
            ]);
            return $this->index();
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
