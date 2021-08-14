@extends('layouts.principal')

@section('conteudo')
@include('layouts.header')
<!-- /section -->
<div class="section">
    <!-- container --> 
    <div class="container">
        <!-- row --> 
        <div class="row">
            <div class="span12">          
                <div class="widget ">
                    <div class="widget-header">
                      <h3>Resultado Prova</h3>
                    </div>
                    <div class="widget-content"> 
                        <div class="fields">
                            <div class="field" align="right">
                                <strong>Ordernar:&nbsp;&nbsp;</strong>
                                <li style="display: inline-block">
                                    @if($sOrderBy == 'geral')
                                    Geral
                                    @else
                                    <a href="/resultadocorredor" style="text-decoration: none">Geral</a>
                                    @endif
                                </li>
                                &nbsp;&nbsp;
                                <li style="display: inline-block">
                                    @if($sOrderBy == 'idade')
                                    Idade
                                    @else
                                    <a href="/resultadocorredororderbyid" style="text-decoration: none">Idade</a>
                                    @endif
                                </li>
                            </div> <!-- /field -->
                        </div> 
                        @if(count($oResultadoCorredors) > 0) 
                        <table class="table table-ordered table-hover">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Prova</th>
                                    <th>Corredor</th>
                                    <th>Tipo da Prova</th>
                                    <th>Idade</th>
                                    <th>Data</th>
                                    <th>Hora Incial</th>
                                    <th>Hora Final</th>
                                    <th>Tempo</th>
                                    <th>Pocisão</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($oResultadoCorredors as $oResultadoCorredor)
                                <tr>
                                    <td>{{$oResultadoCorredor->id}}</td>
                                    <td>{{$oResultadoCorredor->id_prova}}</td>
                                    <td>{{$oResultadoCorredor->nome}}</td>
                                    <td>{{$oResultadoCorredor->quilometragem}} KM</td>
                                    <td>{{$oResultadoCorredor->idade}}</td>
                                    <td>{{implode('/',array_reverse(explode("-",$oResultadoCorredor->data)))}}</td>
                                    <td>{{$oResultadoCorredor->hora_inicial}}</td>
                                    <td>{{$oResultadoCorredor->hora_final}}</td>
                                    <td>{{$oResultadoCorredor->tempo}}</td>
                                    <td>{{$oResultadoCorredor->posicao}}º</td>
        <!--                             <td>
                                        <a href="" class="btn btn-sm btn-primary">Editar</a>
                                        <a href="" class="btn btn-sm btn-danger">Apagar</a>
                                    </td> -->
                                </tr>
                                @endforeach           
                            </tbody>
                        </table>
                        @endif  
                    </div>
                    <div class="card-footer">
                        <br />
                        <a href="/resultadocorredor/create" class="btn btn-sm btn-primary" role="button">Novo Registro</a>
                    </div>
                </div>
            </div>    
        </div>
        <!-- /row --> 
    </div>
    <!-- /container --> 
</div>
<!-- /section -->
@endsection