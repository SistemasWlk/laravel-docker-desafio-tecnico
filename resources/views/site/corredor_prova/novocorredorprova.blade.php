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
                      <h3>Cadastro de Participação na Corrida</h3>
                    </div>
                    <div class="widget-content">
                        @if($sMsgErro != "")
                        <div class="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{$sMsgErro}}
                        </div>
                        @endif
                        <form action="/corredorprova" method="POST">
                            {!! csrf_field() !!}
                            <div class="fields">
                                <div class="field">
                                    <label for="id_corredor">Corredor</label>
                                    @if(count($oListaCorredores) > 0) 
                                    <select name="id_corredor" id="id_corredor">
                                        @foreach($oListaCorredores as $oListaCorredor)
                                        <option value="{{$oListaCorredor->id}}">{{$oListaCorredor->nome}}</option>
                                        @endforeach 
                                    </select>
                                    @else
                                    <select name="id_corredor" id="id_corredor">
                                        <option value="">Nenhum</option>
                                    </select>
                                    @endif
                                </div>
                                <div class="field">
                                    <label for="id_prova">Prova</label>
                                    @if(count($oListaProvas) > 0) 
                                    <select name="id_prova" id="id_prova">
                                        @foreach($oListaProvas as $oListaProva)
                                        <option value="{{$oListaProva->id}}">{{$oListaProva->quilometragem}} Km - {{implode('/',array_reverse(explode("-",$oListaProva->data)))}}</option>
                                        @endforeach 
                                    </select>
                                    @else
                                    <select name="id_prova" id="id_prova">
                                        <option value="">Nenhum</option>
                                    </select>
                                    @endif
                                </div>                                               
                            </div>
                            <br /><br />
                            <div class="actions">                             
                                <button type="button" class="btn btn-primary btn-sm" name="salvacorredorprova" id="salvacorredorprova">Salvar</button>
                            </div>                            
                        </form>
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

@section('javascript')
<script>
    $("#salvacorredorprova").click(function(){
        if ( $('#id_corredor').val() == "" ) {
            alert("Campo corredor obrigatório!"); 
            return false;
        }else if ( $('#id_prova').val() == "" ) {
            alert("Campo prova obrigatório!"); 
            return false;
        }else{
            $('form').submit();
        }
    });    

</script>
@endsection
