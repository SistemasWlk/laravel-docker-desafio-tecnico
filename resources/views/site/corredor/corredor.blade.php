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
                      <h3>Corredor</h3>
                    </div>
                    <div class="widget-content">
                    @if(count($oListaCorredores) > 0) 
                        <table class="table table-ordered table-hover">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nome da Categoria</th>
                                    <th>CPF</th>
                                    <th>Idade</th>
                                    <th>Data Nascimento</th>
                                    <!-- <th>Ações</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($oListaCorredores as $oListaCorredore)
                                <tr>
                                    <td>{{$oListaCorredore->id}}</td>
                                    <td>{{$oListaCorredore->nome}}</td>
                                    <td>{{$oListaCorredore->cpf}}</td>
                                    <td>{{$oListaCorredore->idade}}</td>
                                    <td>{{implode('/',array_reverse(explode("-",$oListaCorredore->data_nascimento)))}}</td>
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
                        <a href="/corredor/create" class="btn btn-sm btn-primary" role="button">Novo Registro</a>
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