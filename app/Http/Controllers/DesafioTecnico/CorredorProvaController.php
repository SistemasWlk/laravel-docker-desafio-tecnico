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
        $oCorredorProvas = CorredorProva::select('corredor_provas.id', 'corredors.nome', 'tipo_provas.quilometragem', 'provas.data')
            ->join('corredors', 'corredor_provas.id_corredor',  '=', 'corredors.id')
            ->join('provas', 'corredor_provas.id_prova',        '=', 'provas.id')
            ->join('tipo_provas', 'provas.id_tp_prova',         '=', 'tipo_provas.id')
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
        $current      = 'corrida';
        $oListaProvas = Prova::select('provas.id', 'tipo_provas.quilometragem', 'data')
            ->join('tipo_provas', 'provas.id_tp_prova', '=', 'tipo_provas.id')
            ->get();
        $oListaCorredores = Corredor::all();

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
        $sMsgErro    = '';
        $id_corredor = $request->input('id_corredor');
        $id_prova    = $request->input('id_prova');

        $oCorredore     = Corredor::where('id', '=', $id_corredor)->get();
        $oProvaCorredor = Prova::select('provas.*', 'quilometragem')
            ->join('tipo_provas', 'provas.id_tp_prova', '=', 'tipo_provas.id')
            ->orderby('provas.id')
            ->where('provas.id', '=', $id_prova)
            ->get();
        $oListaProvasCorredors  = CorredorProva::select('corredor_provas.id', 'corredors.nome', 'tipo_provas.quilometragem', 'provas.data')
            ->join('corredors', 'corredor_provas.id_corredor',  '=', 'corredors.id')
            ->join('provas', 'corredor_provas.id_prova',        '=', 'provas.id')
            ->join('tipo_provas', 'provas.id_tp_prova',         '=', 'tipo_provas.id')
            ->where('corredors.id', '=', $id_corredor)
            ->get();

        foreach ($oListaProvasCorredors as $key => $oListaProvasCorredor) {
            if ($oProvaCorredor[0]->data == $oListaProvasCorredor->data) {
                $data = implode('/',array_reverse(explode("-",$oListaProvasCorredor->data)));
                $sMsgErro = "Participante já inscrito em uma prova na data $data!";
                break;
            }
        }

        if (count($oCorredore) == 0) {
            $this->sMsgErro = "Corredor não encontrado!";
            return $this->create(); 
        }elseif($oCorredore[0]->idade < 18){
            $this->sMsgErro = "Não é permitida a inscrição de menores de idade!";
            return $this->create(); 
        }elseif($sMsgErro != ''){
            $this->sMsgErro = $sMsgErro;
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
