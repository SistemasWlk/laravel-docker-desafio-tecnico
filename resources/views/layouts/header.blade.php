<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container"> 
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> 
            </a>
            <a class="brand" href="/">Desafio Técnico</a>
            <div class="nav-collapse"></div>
            <!--/.nav-collapse --> 
        </div>
    <!-- /container --> 
    </div>
    <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<div class="subnavbar">
    <div class="subnavbar-inner" style="height: 40px;">
        <div class="container">
            <ul class="mainnav">
                <li @if($current=="home") class="active" @else class="" @endif style="height: 40px;">
                    <a href="/">
                        <span style="padding-top: 10px">Dashboard</span>
                    </a> 
                </li>
                <li @if($current=="tipoprova") class="active" @else class="" @endif style="height: 40px;">
                    <a href="/tipoprova">
                        <span style="padding-top: 10px">Tipo Prova</span>
                    </a> 
                </li>
                <li @if($current=="corredor") class="active" @else class="" @endif style="height: 40px;">
                    <a href="/corredor">
                        <span style="padding-top: 10px">Corredor&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </a> 
                </li>
                <li @if($current=="prova") class="active" @else class="" @endif style="height: 40px;">
                    <a href="/prova">
                        <span style="padding-top: 10px">Prova&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </a> 
                </li>
                <li @if($current=="corrida") class="active" @else class="" @endif style="height: 40px;">
                    <a href="/corredorprova">
                        <span style="padding-top: 10px">Corrida&nbsp;&nbsp;&nbsp;</span>
                    </a> 
                </li>
                <li @if($current == "resultadocorrida") class="active" @else class="" @endif style="height: 40px;">
                    <a href="/resultadocorredor">
                        <span style="padding-top: 10px">Resultada Corrida</span>
                    </a> 
                </li>    
                <li style="height: 40px;">
                    <a href="" ><span style="padding-top: 10px"></span> 
                    </a> 
                </li>
            </ul>
        </div>
        <!-- /container --> 
    </div>
    <!-- /subnavbar-inner --> 
</div>