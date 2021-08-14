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
                        <h3>Tipo Prova</h3> 
                    </div>  
                    <div class="widget-content">
                    @if(count($oTipoProvas) > 0) 
                        <table class="table table-ordered table-hover">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Km</th>
                                    <!-- <th>Ações</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($oTipoProvas as $oTipoProva)
                                <tr>
                                    <td>{{$oTipoProva->id}}</td>
                                    <td>{{$oTipoProva->quilometragem}} KM</td>
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
                        <a href="/tipoprova/create" class="btn btn-sm btn-primary" role="button">Novo Registro</a>
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