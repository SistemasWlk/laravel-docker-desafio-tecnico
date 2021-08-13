<?php

namespace App\Http\Controllers\DesafioTecnico;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\CorredorProva;
use App\Prova;
use App\Corredor;

class CorredorProvaController extends Controller
{

    private $sMsgErro = null;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current         = 'corrida';
        $oCorredorProvas = CorredorProva::join('corredors', 'corredor_provas.id_corredor', '=', 'corredors.id')
            ->join('provas', 'corredor_provas.id_prova', '=', 'provas.id')
            ->join('tipo_provas', 'provas.id_tp_prova', '=', 'tipo_provas.id')
            ->get();

        $sMsgErro = $this->sMsgErro;

        return view('site.corredor_prova.corredor_prova', compact('oCorredorProvas', 'current', 'sMsgErro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $current            = 'corrida';
        $oListaProvas       = Prova::join('tipo_provas', 'provas.id_tp_prova', '=', 'tipo_provas.id')->get();
        $oListaCorredores   = Corredor::all();

        $sMsgErro = $this->sMsgErro;

        return view('site.corredor_prova.novocorredorprova', compact('oListaProvas', 'oListaCorredores', 'current', 'sMsgErro'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $current     = 'corrida';
        $id_corredor = $request->input('id_corredor');
        $id_prova    = $request->input('id_prova');

        $oListaCorredores   = Corredor::where('idade', '<', 18)->get();

        if (count($oListaCorredores) > 0) {
            $this->sMsgErro = "Não é permitida a inscrição de menores de idade!";
            return $this->create(); 
        }else{
            CorredorProva::insert([
                [
                    'id_corredor' => $id_corredor, 
                    'id_prova' => $id_prova
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
