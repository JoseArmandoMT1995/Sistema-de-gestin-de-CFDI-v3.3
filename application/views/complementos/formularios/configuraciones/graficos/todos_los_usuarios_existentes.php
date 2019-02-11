
<!DOCTYPE html>
<html>
<head>
  <title></title>

  


  <script type="text/javascript">
  $(document).ready(function(){
    var d1=1;
    var d2=3;
    var d3=5;
    var d4=20;
    var datos = {

      type: "pie",
      data : {
        datasets :[{
          data : [
            d1,
            d2,
            d3,
            d4,
          ],
          backgroundColor: [
            "#F7464A",
            "#46BFBD",
            "#FDB45C",
            "#949FB1",
          ],
        }],
        labels : [
          "("+d1+") Super Administrador",
          "("+d2+") Administradore/s",
          "("+d3+") Usuarios con Privilegios",
          "("+d4+") Usuario Estandar",
          
        ]
      },
      options : {
        responsive : true,
      }
    };

    var canvas = document.getElementById('chart').getContext('2d');
    window.pie = new Chart(canvas, datos);

    setInterval(function(){
      datos.data.datasets.splice(0);
      var newData = {
        backgroundColor : [
          "#F7464A",
          "#46BFBD",
          "#FDB45C",
          "#949FB1",
        ],
        data : [d1, d2, d3, d4]
      };

      datos.data.datasets.push(newData);

      window.pie.update();

    }, 5000);



    function getRandom(){
      return Math.round(Math.random() * 100);
    }


  });
  </script>
</head>
<body>
  <ul class="nav nav-tabs">
    <li class="active" class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">USUARIOS ACTIVOS <span class="caret"></span></a>
      <ul class="dropdown-menu">
          <li><a href="#">TODOS LOS REGISTROS</a></li>
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
      <center>
    <h1>Todos los Registros de [Usuarios Activos]</h1>
    <hr>

    <div id="canvas-container" style="width:50%;">
    <canvas id="chart" width="500" height="350"></canvas>
  </div>
  </center>
 <table border="1">
  <tr>
    <td>usuarios:</td><td colspan="2">fecha:</td>
  </tr>
  <tr>
    <td colspan="1">
      <center>
        <label>seleccionar usuarios por folio: </label>
        <select>
          <option>todos</option>
        </select>
      </center>
    </td>
    <td colspan="2">
      
      <label>si       <input type="radio" name=""></label>
      <label>no       <input type="radio" name=""></label>
    </td>
  </tr>
  <tr>
    <td colspan="3">seleccione la fecha exacta:</td>
  </tr>
  <tr>
    <td>DIA</td>
    <td>MES</td>
    <td>AÑO</td>
  </tr>
  <tr>
    <td>
      <select>
        <option>DIA:</option>
      </select>
    </td>
    <td>
      <select>
        <option>MES:</option>
      </select>
    </td>
    <td>
      <select>
        <option>AÑO:</option>
      </select>
    </td>
  </tr>
</table>
  </div>
 



</body>
</html>
<script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>