    <script>
      var inicio='<tr class="fila-fija">';
      var fin='</tr>';
      var campo1='<td><input class="col-md-12" required name="ClaveProdServ[]"  placeholder=""/></td>';
      var campo2='<td><input class="col-md-12" required name="NoIdentificacion[]" placeholder=""/></td>';
      var campo3='<td><input class="col-md-12" required name="ClaveUnidad[]"    placeholder=""/></td>';
      var campo4='<td><input class="col-md-12" required name="Descripcion[]"    placeholder=""/></td>';
      var campo5='<td><input class="col-md-12" required name="ValorUnitario[]"  placeholder=""/></td>';
      var campo6='<td><input class="col-md-12" required name="Moneda[]"       placeholder="" value="MEX"/></td>';
      var campo7='<td><input class="col-md-12" required name="Descuento[]"  placeholder=""/></td>';
      //impuestos transladados
      var campo8_1='<td><label  class="col-md-4">iva</label><input  class="col-md-6" required name="Impuesto_Iva_Trans[ ]"   placeholder="Iva" value="0.0"/><br/>';
      var campo8_2='<label class="col-md-4">ieps</label><input class="col-md-6" required name="Impuesto_Ieps_Trans[]"  placeholder="" value="0.0"/></td>';
      //impuestos retenidos
      var campo9_1='<td><label class="col-md-4">isr</label><input  class="col-md-6"required name="Impuesto_Isr_Ret[]"   placeholder="" value="0.0"/><br/>';
      var campo9_2='<label class="col-md-4">iva</label><input  class="col-md-6"required name="Impuesto_Iva_Ret[]"   placeholder="" value="0.0"/><br/>';
      var campo9_3='<label class="col-md-4">ieps</label><input  class="col-md-6"required name="Impuesto_Ieps_Ret[]"   placeholder="" value="0.0"/></td>';
      //acciones
      var campo10='<td class="eliminar"><input type="button"   value="Menos -"/></td>';
      var arreglo =inicio+campo1+campo2+campo3+campo4+campo5+campo6+campo7+campo8_1+campo8_2+campo9_1+campo9_2+campo9_3+campo10+fin;
      
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