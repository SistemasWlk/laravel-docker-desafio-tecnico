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
            <div class="widget-content">
                <h1>Resultado Prova</h1>     
                <table class="table table-ordered table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome da Categoria</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2</td>
                            <td>1</td>
                            <td>
                                <a href="" class="btn btn-sm btn-primary">Editar</a>
                                <a href="" class="btn btn-sm btn-danger">Apagar</a>
                            </td>
                        </tr>          
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <br />
                <a href="/categorias/novo" class="btn btn-sm btn-primary" role="button">Novo Registro</a>
            </div>
        </div>
    </div>    
    <!-- /row --> 
  </div>
  <!-- /container --> 
</div>
<!-- /section -->
@endsection