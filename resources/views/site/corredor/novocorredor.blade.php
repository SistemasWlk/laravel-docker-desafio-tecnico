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
                        <h3>Cadastro de Corredor</h3>
                    </div>
                    <div class="widget-content">
                        @if($sMsgErro != "")
                        <div class="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{$sMsgErro}}
                        </div>
                        @endif
                        <form action="/corredor" method="POST">
                            {!! csrf_field() !!}
                            <div class="fields">
                                <div class="field">
                                    <label for="nome_corredor">Nome</label>
                                    <input type="text" id="nome_corredor" name="nome_corredor" placeholder="Nome"/>
                                </div>
                                <div class="field">
                                    <label for="cpf_corredor">CPF</label>
                                    <input type="text" id="cpf_corredor" name="cpf_corredor" placeholder="000.000.000-00"/>
                                </div>
                                <div class="field">
                                    <label for="dt_nascimento_corredor">Data Nascimento</label>
                                    <input type="date" id="dt_nascimento_corredor" name="dt_nascimento_corredor" placeholder="Data do Nascimento"/>
                                </div>    
                                <div class="field">
                                    <label for="idade_corredor">Idade</label>
                                    <input type="text" id="idade_corredor" name="idade_corredor" placeholder="Idade" readonly />
                                </div>                                                        
                            </div> 
                            <br /><br />
                            <div class="actions">                             
                                <button type="button" class="btn btn-primary btn-sm" name="salvacorredor" id="salvacorredor">Salvar</button>
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

    $(document).ready(function(){
        $("#cpf_corredor").mask("999.999.999-99");
    });

    $( "#dt_nascimento_corredor" ).blur(function() {
        var dataAtual    = new Date();
        var anoAtual     = dataAtual.getFullYear();
        var anoNascParts = this.value.split('-');
        var diaNasc      = anoNascParts[2];
        var mesNasc      = anoNascParts[1];
        var anoNasc      = anoNascParts[0];
        var idade        = anoAtual - anoNasc;
        var mesAtual     = dataAtual.getMonth() + 1; 
        //Se mes atual for menor que o nascimento, nao fez aniversario ainda;  
        if(mesAtual < mesNasc){
            idade--; 
        } else {
            //Se estiver no mes do nascimento, verificar o dia
            if(mesAtual == mesNasc){ 
                if(new Date().getDate() < diaNasc ){ 
                    //Se a data atual for menor que o dia de nascimento ele ainda nao fez aniversario
                    idade--; 
                }
            }
        } 
        if (this.value != "" ) {$( "#idade_corredor" ).val(idade);}
        //return idade; 
    });

    $("#salvacorredor").click(function(){
        if ( $('#nome_corredor').val() == "" ) {
            alert("Campo nome obrigatório!"); 
            return false;
        }else if ( $('#cpf_corredor').val() == "" ) {
            alert("Campo CPF obrigatório!"); 
            return false;
        }else if ( $('#dt_nascimento_corredor').val() == "" ) {
            alert("Campo data nascimento obrigatório!"); 
            return false;
        }else if ( $('#idade_corredor').val() == "" ) {
            alert("Campo idade obrigatório!"); 
            return false;
        }else if ( $('#idade_corredor').val() < 18 ) {
            alert("Não é permitida a inscrição de menores de idade!"); 
            return false;
        }else{
            $('form').submit();
        }
    });    

</script>
@endsection
