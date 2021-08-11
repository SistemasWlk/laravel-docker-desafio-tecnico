<?php

namespace App\Http\Controllers\DesafioTecnico;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CorredorController extends Controller
{

    /**
     * @var integer
     */
    private $iCodigo;

    /**
     * @var string
     */
    private $sNome;

    /**
     * @var string
     */
    private $sCpf;

    /**
     * @var date
     */
    private $dDataNascimento;

    /**
     * @return int
     */
    public function getCodigo() 
    {
        return $this->iCodigo;
    }

    /**
     * @param int $iCodigo
     */
    public function setCodigo($iCodigo) 
    {
        $this->iCodigo = $iCodigo;
    }

    /**
     * @return string
     */
    public function getNome() 
    {
        return $this->sNome;
    }

    /**
     * @param string $sNome
     */
    public function setNome($sNome) 
    {
        $this->sNome = $sNome;
    }

    /**
     * @return string
     */
    public function getCpf() 
    {
        return $this->sCpf;
    }

    /**
     * @param string $sCpf
     */
    public function setCpf($sCpf) 
    {
        $this->sCpf = $sCpf;
    }

    /**
     * @return date
     */
    public function getDataNascimento() 
    {
        return $this->dDataNascimento;
    }

    /**
     * @param date $dDataNascimento
     */
    public function setDataNascimento($dDataNascimento) 
    {
        $this->dDataNascimento = $dDataNascimento;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
