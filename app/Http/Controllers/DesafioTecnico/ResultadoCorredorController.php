<?php

namespace App\Http\Controllers\DesafioTecnico;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\ResultadoCorredor;
use App\Prova;
use App\Corredor;
use App\CorredorProva;

class ResultadoCorredorController extends Controller
{

    private $sMsgErro = "";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current                 = 'resultadocorrida';
        $sMsgErro                = $this->sMsgErro;
        $oResultadoCorredorsList = ResultadoCorredor::select('resultado_corredors.id', 'id_prova', 'nome', 'idade', 'hora_inicial', 'hora_final',  'provas.data', 'quilometragem', 'tempo')
            ->join('corredors', 'resultado_corredors.id_corredor', '=', 'corredors.id')
            ->join('provas', 'resultado_corredors.id_prova', '=', 'provas.id')
            ->join('tipo_provas', 'provas.id_tp_prova', '=', 'tipo_provas.id')
            ->orderby('provas.data', 'quilometragem', 'tempo')
            ->get();

        $oResultadoCorredors = array();
        $iPosicao   = 1;
        $dData      = null;
        $iProva     = null;

        foreach ($oResultadoCorredorsList as $key => $oResultadoCorredor) {
            if ($dData != $oResultadoCorredor->data) {
                $dData    = $oResultadoCorredor->data;
                $iPosicao = 1;
            }elseif($iProva != $oResultadoCorredor->quilometragem){
                $dData  = $oResultadoCorredor->quilometragem;
                $iProva = 1;                
            }
            $oResultadoCorredorsLista = new \stdClass;
            $oResultadoCorredorsLista->id = $oResultadoCorredor->id;
            $oResultadoCorredorsLista->id_prova = $oResultadoCorredor->id_prova;
            $oResultadoCorredorsLista->quilometragem = $oResultadoCorredor->quilometragem;
            $oResultadoCorredorsLista->nome = $oResultadoCorredor->nome;
            $oResultadoCorredorsLista->idade = $oResultadoCorredor->idade;
            $oResultadoCorredorsLista->data = $oResultadoCorredor->data;
            $oResultadoCorredorsLista->hora_inicial = $oResultadoCorredor->hora_inicial;
            $oResultadoCorredorsLista->hora_final = $oResultadoCorredor->hora_final;
            $oResultadoCorredorsLista->tempo = $this->diffTime($oResultadoCorredor->hora_inicial, $oResultadoCorredor->hora_final);
            $oResultadoCorredorsLista->posicao = $iPosicao;
            $oResultadoCorredors[] = $oResultadoCorredorsLista;
            $iPosicao++;
        }

        $sOrderBy = 'geral';
        $sMsgErro = $this->sMsgErro;
            
        return view('site.resultado_corredor.resultado_corredor', compact('oResultadoCorredors', 'current', 'sOrderBy', 'sMsgErro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $current    = 'resultadocorrida';
        $sMsgErro   = $this->sMsgErro;
        $oListaCorredores = CorredorProva::select('corredors.id', 'corredors.nome')
            ->join('corredors', 'corredor_provas.id_corredor',  '=', 'corredors.id')
            ->join('provas', 'corredor_provas.id_prova',        '=', 'provas.id')
            ->join('tipo_provas', 'provas.id_tp_prova',         '=', 'tipo_provas.id')
            ->distinct()
            ->get();

        $oListaProvas = CorredorProva::select('provas.id', 'tipo_provas.quilometragem', 'provas.data')
            ->join('corredors', 'corredor_provas.id_corredor',  '=', 'corredors.id')
            ->join('provas', 'corredor_provas.id_prova',        '=', 'provas.id')
            ->join('tipo_provas', 'provas.id_tp_prova',         '=', 'tipo_provas.id')
            ->distinct()
            ->where('corredors.id', '=', $oListaCorredores[0]->id)
            ->get();

        return view('site.resultado_corredor.novoresultadocorredor', compact('oListaProvas', 'oListaCorredores', 'current', 'sMsgErro'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $current     = 'resultadocorrida';
        $id_corredor = $request->input('id_corredor');
        $id_prova    = $request->input('id_prova');
        $horario_ini = $request->input('horario_ini').":".$request->input('seg_ini');
        $horario_fim = $request->input('horario_fim').":".$request->input('seg_fim');
        $tempo       = $this->diffTime($horario_ini, $horario_fim);

        $oValidarResultadoProvas = ResultadoCorredor::select('*')
            ->where('id_prova',     '=', $id_prova)
            ->where('id_corredor',  '=', $id_corredor)
            ->get();

        if (count($oValidarResultadoProvas) > 0) {
            $this->sMsgErro = "Resultado já lançado!";
            return $this->create();
        }else{
            ResultadoCorredor::insert([
                [
                    'id_corredor' => $id_corredor, 
                    'id_prova' => $id_prova,
                    'hora_inicial' => $horario_ini, 
                    'hora_final' => $horario_fim,
                    'tempo' => $tempo 
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showJson($id)
    {
        $oListaProvas = CorredorProva::select('provas.id', 'tipo_provas.quilometragem', 'provas.data')
            ->join('corredors', 'corredor_provas.id_corredor',  '=', 'corredors.id')
            ->join('provas', 'corredor_provas.id_prova',        '=', 'provas.id')
            ->join('tipo_provas', 'provas.id_tp_prova',         '=', 'tipo_provas.id')
            ->distinct()
            ->where('corredors.id', '=', $id)
            ->get();

        return json_encode($oListaProvas);
    }

    /**
     * Order by idade.
     *
     * @param  int  $order
     * @return \Illuminate\Http\Response
     */
    public function orderByIdade()
    {
        $current  = 'resultadocorrida';
        $between  = array(array(18 ,25), array(26, 35), array(36, 45), array(46, 55), array(56, 100));
        $i        = 0;
        $dData    = null;
        $iProva   = null;
        $iPosicao = 1;
        $sMsgErro = $this->sMsgErro;

        $oResultadoCorredors = array();

        foreach ($between as $key => $values) {
            foreach ($values as $key => $value) {
                if ($key == 0) {
                    $num1 = $value;
                }
                if ($key == 1) {
                    $num2 = $value;

                    $oResultadoCorredorsList = ResultadoCorredor::select('resultado_corredors.id', 'id_prova', 'nome', 'idade', 'hora_inicial', 'hora_final',  'provas.data', 'quilometragem', 'tempo')
                        ->join('corredors', 'resultado_corredors.id_corredor', '=', 'corredors.id')
                        ->join('provas', 'resultado_corredors.id_prova', '=', 'provas.id')
                        ->join('tipo_provas', 'provas.id_tp_prova', '=', 'tipo_provas.id')
                        ->orderby('provas.data', 'quilometragem', 'tempo', 'idade')
                        ->whereBetween('idade', [$num1, $num2])
                        ->get();

                    foreach ($oResultadoCorredorsList as $key => $oResultadoCorredor) {

                        if ($dData != $oResultadoCorredor->data) {
                            $dData    = $oResultadoCorredor->data;
                            $iPosicao = 1;
                        }elseif($iProva != $oResultadoCorredor->quilometragem){
                            $dData  = $oResultadoCorredor->quilometragem;
                            $iProva = 1;                
                        }

                        $oResultadoCorredorsLista = new \stdClass;
                        $oResultadoCorredorsLista->id = $oResultadoCorredor->id;
                        $oResultadoCorredorsLista->id_prova = $oResultadoCorredor->id_prova;
                        $oResultadoCorredorsLista->quilometragem = $oResultadoCorredor->quilometragem;
                        $oResultadoCorredorsLista->nome = $oResultadoCorredor->nome;
                        $oResultadoCorredorsLista->idade = $oResultadoCorredor->idade;
                        $oResultadoCorredorsLista->data = $oResultadoCorredor->data;
                        $oResultadoCorredorsLista->hora_inicial = $oResultadoCorredor->hora_inicial;
                        $oResultadoCorredorsLista->hora_final = $oResultadoCorredor->hora_final;
                        $oResultadoCorredorsLista->tempo = $this->diffTime($oResultadoCorredor->hora_inicial, $oResultadoCorredor->hora_final);
                        $oResultadoCorredorsLista->posicao = $iPosicao;
                        $oResultadoCorredors[] = $oResultadoCorredorsLista;
                        $iPosicao++;
                    }

                }
            }
        }

        $sOrderBy = 'idade';
            
        return view('site.resultado_corredor.resultado_corredor', compact('oResultadoCorredors', 'current', 'sOrderBy', 'sMsgErro'));
    }


    /**
     * Calcula a diferença entre dois time.
     *
     * @param  time  $horario1
     * @param  time  $horario2
     *
     * @return $tempo
     */
    private function diffTime($horario1, $horario2)
    {
        $entrada = $horario1;
        $saida = $horario2;
        $hora1 = explode(":",$entrada);
        $hora2 = explode(":",$saida);
        $acumulador1 = ($hora1[0] * 3600) + ($hora1[1] * 60) + $hora1[2];
        $acumulador2 = ($hora2[0] * 3600) + ($hora2[1] * 60) + $hora2[2];
        $resultado = $acumulador2 - $acumulador1;
        $hora_ponto = floor($resultado / 3600);
        $resultado = $resultado - ($hora_ponto * 3600);
        $min_ponto = floor($resultado / 60);
        $resultado = $resultado - ($min_ponto * 60);
        $secs_ponto = $resultado;
        //Grava na variável resultado final
        return str_pad($hora_ponto, 2, "0", STR_PAD_LEFT).":".str_pad($min_ponto, 2, "0", STR_PAD_LEFT).":".str_pad($secs_ponto, 2, "0", STR_PAD_LEFT);

    }

}
