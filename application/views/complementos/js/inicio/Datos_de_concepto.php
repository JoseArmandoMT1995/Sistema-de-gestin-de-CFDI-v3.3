    <script>
      
        $(function(){
        // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
        $("#adicional").on('click', function(){
        var descripcion=($("#descripcion").val());    //1
        var cantidad=($("#cantidad").val());          //2
        var unidad=($("#unidad").val());              //3
        var cps=($("#cps").val());                    //4
        var ni=($("#ni").val());                      //5
        var cu=($("#cu").val());                      //6
        var vu=($("#vu").val());                      //7
        var iva=($("#iva").val());                    //8
        var ivar=($("#ivar").val());                  //9
        var isr=($("#isr").val());                    //10
        var ieps=($("#ieps").val());                  //11
        var descuento=($("#descuento").val());        //12
        var importe_c=($("#importe_c").val());        //13
        var base=($("#base").val());                  //14
        var importe_t=($("#importe_t").val());        //15
        var cabeza='<tr class="fila-fija">';
        var pie='</tr>';

        var campo1='<td><input class="form-control" required name="ClaveProdServ[]"  placeholder="" value="'+descripcion+'"/></td>';
        var campo2='<td><input class="form-control" required name="NoIdentificacion[]" placeholder="" value="'+cantidad+'"/></td>';
        var campo3='<td><input class="form-control" required name="ClaveUnidad[]"    placeholder="" value="'+unidad+'"/ ></td>';
        var campo4='<td><input class="form-control" required name="Descripcion[]"    placeholder="" value="'+cps+'"/></td>';
        var campo5='<td><input class="form-control" required name="ValorUnitario[]"  placeholder="" value="'+ni+'"/></td>';
        var campo6='<td><input class="form-control" required name="Moneda[]"       placeholder="MEX" value="'+cu+'"/></td>';
        var campo7='<td><input class="form-control" required name="Moneda[]"       placeholder="MEX"  value="'+vu+'"/></td>';
        var campo8='<td><input class="form-control" required name="Moneda[]"       placeholder="MEX"  value="'+iva+'"/></td>';
        var campo9='<td><input class="form-control" required name="Moneda[]"       placeholder="MEX"  value="'+ivar+'"/></td>';
        var campo10='<td><input class="form-control" required name="Moneda[]"       placeholder="MEX"  value="'+isr+'"/></td>';
        var campo11='<td><input class="form-control" required name="Moneda[]"       placeholder="MEX"  value="'+ieps+'"/></td>';
        var campo12='<td><input class="form-control" required name="Moneda[]"       placeholder="MEX"  value="'+descuento+'"/></td>';
        var campo13='<td><input class="form-control" required name="Moneda[]"       placeholder="MEX" " value="'+importe_c+'"/></td>';
        var campo14='<td><input class="form-control" required name="Moneda[]"       placeholder="MEX"  value="'+base+'"/></td>';
        var campo15='<td><input class="form-control" required name="Moneda[]"       placeholder="MEX"  value="'+importe_t+'"/></td>';
        var campo16='<td class="eliminar"><input type="button"  class="btn btn-danger" value="Menos -"/></td>';
        var arreglo =cabeza+campo1+campo2+campo3+campo4+campo5+campo6+campo7+campo8+campo9+campo10+campo11+campo12+campo13+campo14+campo15+campo16+pie;
          //al precionar el boton con id adicional se inicia la funcion
          $(arreglo).clone().removeClass('fila-fija').appendTo("#tabla"); 
        });
        // Evento que selecciona la fila y la elimina 
        $(document).on("click",".eliminar",function(){
          var parent = $(this).parents().get(0);
          $(parent).remove();
        });
      });
    </script>