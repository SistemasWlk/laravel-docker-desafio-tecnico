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
                      <h3>Cadastro dos Resutados das Corridas</h3>
                    </div>
                    <div class="widget-content">
                        @if($sMsgErro != "")
                        <div class="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{$sMsgErro}}
                        </div>
                        @endif
                        <form action="/resultadocorredor" method="POST">
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
                                <div class="field">
                                    <label for="horario_ini">Horário de início da prova</label>
                                    <input type="time" id="horario_ini" name="horario_ini">:
                                    <input type="number" id="seg_ini" name="seg_ini" min="0" max="60" maxlength="2" style="width: 50px">
                                </div>
                                <div class="field">
                                    <label for="horario_fim">Horário de conclusão da prova</label>
                                    <input type="time" id="horario_fim" name="horario_fim" maxlength="4">:
                                    <input type="number" id="seg_fim" name="seg_fim" min="0" max="60" maxlength="2" style="width: 50px">
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

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    });

    $("#salvacorredorprova").click(function(){
        if ( $('#id_corredor').val() == "" ) {
            alert("Campo corredor obrigatório!"); 
            return false;
        }else if ( $('#id_prova').val() == "" ) {
            alert("Campo prova obrigatório!"); 
            return false;
        }else if ( $('#horario_ini').val() == "" || $('#seg_ini').val() == "" ) {
            alert("Campo horario inicial obrigatório!"); 
            return false;
        }else if ( $('#horario_fim').val() == "" || $('#seg_fim').val() == "" ) {
            alert("Campo horario final obrigatório!"); 
            return false;
        }else if ( $('#horario_fim').val() < $('#horario_ini').val() ) {
            alert("Campo horario final tem que ser maior que hora inicial!"); 
            return false;
        }else if ( $('#seg_ini').val() > 60 || $('#seg_fim').val() > 60 || $('#seg_ini').val() < 0 || $('#seg_fim').val() < 0 ) {
            alert("Campo segundos tem que está entre o intervalo de 0 à 60!"); 
            return false;
        }else if ( $('#seg_ini').val() > $('#seg_fim').val() > 60 ) {
            alert("Campo horario final tem que ser maior que hora inicial!"); 
            return false;
        }else{
            $('form').submit();
        }
    });  

    $("#id_corredor").change(function(){
        var select = document.getElementById("id_prova");
        while (select.length) {
            select.remove(0);
        }
        $.getJSON("/api/resultadocorredor/" + this.value, function(data) { 
            for(i=0;i<data.length;i++) {
                var dt_data = data[i].data.split("-");
                var dt_prova_br = dt_data[2]+"/"+dt_data[1]+"/"+dt_data[0];
                select.options[select.options.length]= new Option(data[i].quilometragem+' Km - '+dt_prova_br, data[i].id );
            }
        });


    });  

</script>
@endsection
