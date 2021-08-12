<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> 
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> 
      </a>
      <a class="brand" href="/">Desafio Técnico</a>
      <div class="nav-collapse">
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li @if($current=="home") class="active" @else class="" @endif><a href="/"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
        <li @if($current=="tipoprova") class="active" @else class="" @endif><a href="/tipoprova"><i class="icon-dashboard"></i><span>Tipo Prova</span> </a> </li>
        <li @if($current=="prova") class="active" @else class="" @endif><a href="/prova"><i class="icon-dashboard"></i><span>Prova&nbsp;&nbsp;&nbsp;&nbsp;</span> </a> </li>
        <li @if($current=="corredor") class="active" @else class="" @endif><a href="corredor"><i class="icon-dashboard"></i><span>Corredor&nbsp;&nbsp;&nbsp;&nbsp;</span> </a> </li>
        <li @if($current=="corrida") class="active" @else class="" @endif><a href="corredorprova"><i class="icon-dashboard"></i><span>Corrida&nbsp;&nbsp;&nbsp;</span> </a> </li>
        <li @if($current == "resultadocorrida") class="active" @else class="" @endif>
            <a href="resultadocorredor"><i class="icon-dashboard"></i><span>Resultada Corrida</span> </a> 
        </li>    
        <li><a href=""><i></i><span></span> </a> </li>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>