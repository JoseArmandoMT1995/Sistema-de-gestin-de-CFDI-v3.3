
<ul class="nav nav-tabs">
    <li class="active" class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">USUARIOS ACTIVOS <span class="caret"></span></a>
    	<ul class="dropdown-menu">
        	<li ><a href="#">TODOS LOS REGISTROS</a></li>
        	<li><a href="#">SELECCIONAR FECHA MANUALMENTE</a></li>                         
      	</ul>
    </li>
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">ACTIVIDAD EN MODULOS <span class="caret"></span></a>
      <ul class="dropdown-menu">
      
      <li class="dropdown-submenu">
          	<a class="test" href="#">GENERAR CFDI <span class="caret"></span></a>
            <ul class="dropdown-menu">
	            <li><a href="#">(GENERAR CFDI) TODOS LOS REGISTROS</a></li>
        		<li><a href="#">(GENERAR CFDI) SELECCIONAR FECHA MANUALMENTE</a></li>
            </ul>
          </li>
      <li class="dropdown-submenu">
        <a class="test" tabindex="-1" href="#">INFORMACION GENERAL <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li class="dropdown-submenu">
          	<a class="test" href="#">MI PERFIL <span class="caret"></span></a>
            <ul class="dropdown-menu">
	            <li><a href="#">(MI PERFIL) TODOS LOS REGISTROS</a></li>
        		<li><a href="#">(MI PERFIL) SELECCIONAR FECHA MANUALMENTE</a></li>
            </ul>
          </li>
          <li class="dropdown-submenu">
          	<a class="test" href="#">EDITAR PERFIL <span class="caret"></span></a>
            <ul class="dropdown-menu">
	            <li><a href="#">(EDITAR PERFIL) TODOS LOS REGISTROS</a></li>
        		<li><a href="#">(EDITAR PERFIL) SELECCIONAR FECHA MANUALMENTE</a></li>
            </ul>
          </li>
          <li class="dropdown-submenu">
          	<a class="test" href="#">PERFILES EDITADOS <span class="caret"></span></a>
            <ul class="dropdown-menu">
	            <li><a href="#">(PERFILES EDITADOS) TODOS LOS REGISTROS</a></li>
        		<li><a href="#">(PERFILES EDITADOS) SELECCIONAR FECHA MANUALMENTE</a></li>
            </ul>
          </li>

        </ul>
      </li>
      <li class="dropdown-submenu">
        <a class="test" tabindex="-1" href="#">CATALOGOS <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li class="dropdown-submenu">
          	<a class="test" href="#">USUARIOS <span class="caret"></span></a>
            <ul class="dropdown-menu">
	            <li><a href="#">(USUARIOS) TODOS LOS REGISTROS</a></li>
        		<li><a href="#">(USUARIOS) SELECCIONAR FECHA MANUALMENTE</a></li>
            </ul>
          </li>
          <li class="dropdown-submenu">
          	<a class="test" href="#">EMISORES <span class="caret"></span></a>
            <ul class="dropdown-menu">
	            <li><a href="#">(EMISORES) TODOS LOS REGISTROS</a></li>
        		<li><a href="#">(EMISORES) SELECCIONAR FECHA MANUALMENTE</a></li>
            </ul>
          </li>
          <li class="dropdown-submenu">
          	<a class="test" href="#">RECEPTORES <span class="caret"></span></a>
            <ul class="dropdown-menu">
	            <li><a href="#">(RECEPTORES) TODOS LOS REGISTROS</a></li>
        		<li><a href="#">(RECEPTORES) SELECCIONAR FECHA MANUALMENTE</a></li>
            </ul>
          </li>
          <li class="dropdown-submenu">
          	<a class="test" href="#">CONCEPTOS <span class="caret"></span></a>
            <ul class="dropdown-menu">
	            <li><a href="#">(CONCEPTOS) TODOS LOS REGISTROS</a></li>
        		<li><a href="#">(CONCEPTOS) SELECCIONAR FECHA MANUALMENTE</a></li>
            </ul>
          </li>
        </ul>
      </li>
      <li class="dropdown-submenu">
          	<a class="test" href="#">CONCEPTOS <span class="caret"></span></a>
            <ul class="dropdown-menu">
	            <li><a href="#">(CONCEPTOS) TODOS LOS REGISTROS</a></li>
        		<li><a href="#">(CONCEPTOS) SELECCIONAR FECHA MANUALMENTE</a></li>
            </ul>
          </li>
      <li class="dropdown-submenu">
          	<a class="test" href="#">COMPROBANTES <span class="caret"></span></a>
            <ul class="dropdown-menu">
	            <li><a href="#">(COMPROBANTES) ENTRAR AL MODULO</a></li>
        		<li><a href="#">(COMPROBANTES) GENERAR TIMBRADO</a></li>

            </ul>
          </li>
    </ul>
    </li>
    <li class="dropdown-submenu">
          	<a class="test" href="#">CFDI CREADOS<span class="caret"></span></a>
            <ul class="dropdown-menu">
	            <li><a href="#">TODOS LOS REGISTROS</a></li>
        		<li><a href="#">REGISTROS POR DIA</a></li>
        		<li><a href="#">REGISTROS POR MES</a></li>     
        		<li><a href="#">REGISTROS POR SEMANA</a></li> 
        		<li><a href="#">SELECCIONAR FECHA MANUALMENTE</a></li>
            </ul>
          </li>
    <li><a href="#">AYUDA</a></li>
  </ul>
  <div class="showback">
  <h3><i class="fa fa-user"></i> Todos los Registros de [Usuarios Activos]</h3><hr>
  <center>
    <div id="canvas-container" style="width:50%;">
      <canvas id="chart" width="500" height="350"></canvas>
    </div>
  </center>
</div>
<script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>