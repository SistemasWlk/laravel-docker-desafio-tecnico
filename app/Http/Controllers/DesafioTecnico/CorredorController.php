<?php

namespace App\Http\Controllers\DesafioTecnico;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Corredor;

class CorredorController extends Controller
{

    private $sMsgErro = "";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current            = 'corredor';
        $oListaCorredores   = Corredor::all();
        $sMsgErro           = "";
        return view('site.corredor.corredor', compact('oListaCorredores', 'current', 'sMsgErro' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sMsgErro = $this->sMsgErro;
        $current  = 'corredor';
        return view('site.corredor.novocorredor', compact('current', 'sMsgErro' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $sMsgErro        = "";
        $current         = 'corredor';
        $nome            = $request->input('nome_corredor');
        $cpf             = str_replace(['.', '-'], '', $request->input('cpf_corredor'));
        $data_nascimento = $request->input('dt_nascimento_corredor');
        $idade           = $request->input('idade_corredor');

        $oValidaCpfCorre = Corredor::where('cpf', '=', $cpf)->get();

        if (count($oValidaCpfCorre) > 0) {
            $this->sMsgErro = "CPF já cadastrado!";
            return $this->create();
        }else{
            Corredor::insert([
                [
                    'nome' => $nome, 
                    'cpf' => $cpf,
                    'data_nascimento' => $data_nascimento,
                    'idade' => $idade
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
