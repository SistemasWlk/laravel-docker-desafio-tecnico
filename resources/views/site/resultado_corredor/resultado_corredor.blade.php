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
                        <strong>Ordernar:</strong>
                        <li style="display: inline-block; border-bottom: 1px solid black;"><a href="/resultadocorredor" style="text-decoration: none">Geral</a></li>
                        <li style="display: inline-block; border-bottom: 1px solid black;"><a href="/resultadocorredororderbyid" style="text-decoration: none">Idade</a></li>
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
    <!-- /row --> 
  </div>
  <!-- /container --> 
</div>
<!-- /section -->
@endsection