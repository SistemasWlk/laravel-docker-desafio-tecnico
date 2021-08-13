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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current                  = 'resultadocorrida';
        $oResultadoCorredorsList = ResultadoCorredor::select('resultado_corredors.id', 'id_prova', 'nome', 'idade', 'hora_inicial', 'hora_final',  'provas.data', 'quilometragem', 'tempo')
            ->join('corredors', 'resultado_corredors.id_corredor', '=', 'corredors.id')
            ->join('provas', 'resultado_corredors.id_prova', '=', 'provas.id')
            ->join('tipo_provas', 'provas.id_tp_prova', '=', 'tipo_provas.id')
            ->orderby('provas.data', 'quilometragem', 'tempo')
            ->get();
        // echo "<pre>";
        // var_dump($oResultadoCorredorsLista);
        // echo "</pre>";

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
            
        return view('site.resultado_corredor.resultado_corredor', compact('oResultadoCorredors', 'current', 'sOrderBy'));
        // return view('site.resultado_corredor.resultado_corredor', ['current' => 'resultadocorrida']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $current = 'resultadocorrida';
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

        // $oListaProvas       = Prova::join('tipo_provas', 'provas.id_tp_prova', '=', 'tipo_provas.id')->get();
        return view('site.resultado_corredor.novoresultadocorredor', compact('oListaProvas', 'oListaCorredores', 'current'));
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

        ResultadoCorredor::insert([
            [
                'id_corredor' => $id_corredor, 
                'id_prova' => $id_prova,
                'hora_inicial' => $horario_ini, 
                'hora_final' => $horario_fim,
                'tempo' => $tempo 
            ],
        ]);

        $oResultadoCorredors    = ResultadoCorredor::join('corredors', 'resultado_corredors.id_corredor', '=', 'corredors.id')
            ->join('provas', 'resultado_corredors.id_prova', '=', 'provas.id')
            ->join('tipo_provas', 'provas.id_tp_prova', '=', 'tipo_provas.id')
            ->get();
            
        return view('site.resultado_corredor.resultado_corredor', compact('oResultadoCorredors', 'current'));
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
        $oListaProvas = CorredorProva::select('provas.id', 'tipo_provas.quilometragem')
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
        $current                  = 'resultadocorrida';
        $oResultadoCorredorsList = ResultadoCorredor::select('resultado_corredors.id', 'id_prova', 'nome', 'idade', 'hora_inicial', 'hora_final',  'provas.data', 'quilometragem', 'tempo')
            ->join('corredors', 'resultado_corredors.id_corredor', '=', 'corredors.id')
            ->join('provas', 'resultado_corredors.id_prova', '=', 'provas.id')
            ->join('tipo_provas', 'provas.id_tp_prova', '=', 'tipo_provas.id')
            ->orderby('idade')
            ->get();
        // echo "<pre>";
        // var_dump($oResultadoCorredorsLista);
        // echo "</pre>";

        $oResultadoCorredors = array();
        $iPosicao = 1;

        foreach ($oResultadoCorredorsList as $key => $oResultadoCorredor) {
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

        $sOrderBy = 'idade';
            
        return view('site.resultado_corredor.resultado_corredor', compact('oResultadoCorredors', 'current', 'sOrderBy'));
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

    /**
     * Realizar a comparação dos valores de um array.
     *
     * @param  time  $horario1
     * @param  time  $horario2
     *
     * @return $tempo
     */
    private function cmpArray($a, $b, $key) {
        return $a[$key] < $b[$key];
    }

}
