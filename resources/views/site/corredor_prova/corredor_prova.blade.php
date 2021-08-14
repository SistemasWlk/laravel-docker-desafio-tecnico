@extends('layouts.principal', ["current" => "corredor_prova"])

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
                        <h3>Corrida</h3> 
                    </div>  
                    <div class="widget-content">  
                    @if(count($oCorredorProvas) > 0) 
                        <table class="table table-ordered table-hover">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Corredor</th>
                                    <th>Prova</th>
                                    <th>Data</th>
                                    <!-- <th>Ações</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($oCorredorProvas as $oCorredorProva)
                                <tr>
                                    <td>{{$oCorredorProva->id}}</td>
                                    <td>{{$oCorredorProva->nome}}</td>
                                    <td>{{$oCorredorProva->quilometragem}} KM</td>
                                    <td>{{implode('/',array_reverse(explode("-",$oCorredorProva->data)))}}</td>
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
                        <a href="/corredorprova/create" class="btn btn-sm btn-primary" role="button">Novo Registro</a>
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