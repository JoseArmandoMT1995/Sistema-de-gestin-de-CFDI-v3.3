    <script>
      var cabeza='<tr class="fila-fija">';
      var pie='</tr>';
      
      var campo1='<td><input class="col-md-12" required name="RFC_receptor[]" placeholder=""/></td>';
      var campo2='<td><input class="col-md-12" required name="Regimen_fiscal[]"    placeholder=""></td>';
      var campo3='<td><input class="col-md-12" required name="Tipo_perosna_receptor[]"    placeholder=""/></td>';
      var campo4='<td><input class="col-md-12" required name="Rason_social_receptor[]"  placeholder=""/></td>';
      var campo5='<td><input  class="col-md-12" required name="Nombre[]"   placeholder="Nombre" value=""/><br/>';
      var campo6='<input class="col-md-12" required name="Ap_paterno[]"  placeholder="Ap_paterno" value=""/><br/>';
      var campo7='<input  class="col-md-12"required name="Ap_materno[]"   placeholder="Ap_materno" value=""/></td>';
      var campo8='<td><input  class="col-md-12" required name="Calle[]"   placeholder="Calle" value=""/><br/>';
      var campo9='<input class="col-md-12" required name="NoExterior[]"  placeholder="NoExterior" value=""/><br/>';
      var campo10='<input class="col-md-12" required name="NoInterior[]"  placeholder="NoInterior" value=""/><br/>';
      var campo11='<input class="col-md-12" required name="Colonia[]"  placeholder="Colonia" value=""/><br/>';
      var campo12='<input class="col-md-12" required name="Localidad[]"  placeholder="Localidad" value=""/><br/>';
      var campo13='<input class="col-md-12" required name="Municipio[]"  placeholder="Municipio" value=""/><br/>';
      var campo14='<input class="col-md-12" required name="Estado[]"  placeholder="Estado" value=""/><br/>';
      var campo15='<input class="col-md-12" required name="Pais[]"  placeholder="Pais" value=""/><br/>';
      var campo16='<input class="col-md-12" required name="CodigoPostal[]"  placeholder="CodigoPostal" value=""/></td>';
      var campo17='<td><input  class="col-md-12"required name="Email_receptor[]"   placeholder="Email" value=""/><br/>';
      var campo18='<input  class="col-md-12"required name="Telefono_receptor[]"   placeholder="Telefono" value=""/></td>';
      var campo19='<td class="eliminar"><input type="button"   value="Menos -"/></td>';
      var arreglo =cabeza+campo1+campo2+campo3+campo4+campo5+campo6+campo7+campo8+campo9+campo10+campo11+campo12+campo13+campo14+campo15+campo16+campo17+campo18+campo19+pie;
      
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