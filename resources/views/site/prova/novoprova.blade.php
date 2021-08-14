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
                        <h3>Cadastro Prova</h3>
                    </div>
                    <div class="widget-content">
                        @if($sMsgErro != "")
                        <div class="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{$sMsgErro}}
                        </div>
                        @endif
                        <form action="/prova" method="POST">
                            {!! csrf_field() !!}
                            <div class="fields">
                                <div class="field">
                                    <label for="tipo_prova">Tipo da Prova</label>
                                    @if(count($oTipoProvas) > 0) 
                                    <select name="tipo_prova" id="tipo_prova">
                                    @foreach($oTipoProvas as $oTipoProva)
                                        <option value="{{$oTipoProva->id}}">{{$oTipoProva->quilometragem}}</option>
                                    @endforeach 
                                    </select>
                                    @else
                                    <select name="id_corredor" id="id_corredor">
                                        <option value="">Nenhum</option>
                                    </select>
                                    @endif
                                </div> 
                                <div class="field">
                                    <label for="dt_prova">Data</label>
                                    <input type="date" id="dt_prova" name="dt_prova" value=""/>
                                </div>                                                         
                            </div> 
                            <br /><br />
                            <div class="actions">                             
                                <button type="button" class="btn btn-primary btn-sm" name="salvaprova" id="salvaprova">Salvar</button>
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
    $("#salvaprova").click(function(){
        var dataAtual = new Date();
        if ( $('#tipo_prova').val() == "" ) {
            alert("Campo tipo prova obrigatório!"); 
            return false;
        }else if ( $('#dt_prova').val() == "" ) {
            alert("Campo data da prova obrigatório!"); 
            return false;
        }else if ( $('#dt_prova').val() <=  dataAtual) {
            alert("Campo data da prova não poder ser menor que a data atual!"); 
            return false;
        }else{
            $('form').submit();
        }
    });    

</script>
@endsection
