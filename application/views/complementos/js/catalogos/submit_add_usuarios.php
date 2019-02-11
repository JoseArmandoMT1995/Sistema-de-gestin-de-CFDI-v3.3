<script>
      var cabeza='<tr class="fila-fija">';
      var pie='</tr>';
      
      var campo1='<td><input class="col-md-12" required name="Usufolio[]"         placeholder="ingrese su folio"/></td>';
      var campo2='<td><input class="col-md-12" required name="Usulogin[]"         placeholder="Ingrese el puesto"/></td>';
      var campo3='<td><input class="col-md-12" required name="Usunombre[]"        placeholder="Nombre de usuario"/></td>';
      //var campo4='<td><input class="col-md-12" required name="Usuacceso[]"        placeholder="Nivel de Acceso"/></td>';
      var campo4='<td><select name="Usuacceso[]"><option value="Administrador">Administrador</option><option value="Estandar">Usuario Estandar</option></select></td>'
      var campo5='<td><input class="col-md-12" required name="contraseña[]"       placeholder="Conraseña" value="1234"/></td>';
      var campo6='<td class="eliminar"><input type="button"   value="Menos -"/></td>';
      var arreglo =cabeza+campo1+campo2+campo3+campo4+campo5+campo6+pie;
      
        $(function(){
        // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
        
        $("#adicional").on('click', function(){
          var x = document.getElementById("myNumber").value;
          //alert("usted ha agregado '"+x+"' concepto/s");
          for (var i = 0; i < x; i++) {
          $(arreglo).clone().removeClass('fila-fija').appendTo("#tabla"); 
          }
        });
       
        // Evento que selecciona la fila y la elimina 
        $(document).on("click",".eliminar",function(){
          var parent = $(this).parents().get(0);
          $(parent).remove();
        });
      });
</script>