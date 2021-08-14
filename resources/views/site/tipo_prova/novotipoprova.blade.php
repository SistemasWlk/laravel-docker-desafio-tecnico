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
                      <h3>Cadastro Tipo Corrida</h3>
                    </div>
                    <div class="widget-content">
                        @if($sMsgErro != "")
                        <div class="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{$sMsgErro}}
                        </div>
                        @endif
                        <form action="/tipoprova" method="POST">
                            {!! csrf_field() !!}
                            <div class="fields">
                                <div class="field">
                                    <label for="tipo_corrida">Tipo Corrida</label>
                                    <input type="number" id="tipo_corrida" name="tipo_corrida" placeholder="KM"/>
                                </div>                                                      
                            </div> 
                            <br /><br />
                            <div class="actions">                             
                                <button type="button" class="btn btn-primary btn-sm" name="salvatipocorrida" id="salvatipocorrida">Salvar</button>
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
    $("#salvatipocorrida").click(function(){
        if ( $('#tipo_corrida').val() == "" ) {
            alert("Campo tipo corrida obrigatório!"); 
            return false;
        }else{
            $('form').submit();
        }
    });    

</script>
@endsection
