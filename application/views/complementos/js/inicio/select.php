<script type="text/javascript">
$(document).ready(function()
{  //alert("hola");	
	bloquear_elementos();
	receptor();
	mostrar_conceptos();
	agregar_conceptos();
	quitar_concepto();

    /*
bloquear_elementos();
    receptor();
    mostrar_conceptos();
    agregar_conceptos();
    quitar_concepto();
    */
});
function bloquear_elementos(){
 //receptor
    document.getElementById("rfc").disabled = true;
    document.getElementById("razon_social").disabled = true;
    document.getElementById("uso_cfdi").disabled = true;
    document.getElementById("tipo_persona").disabled = true;
 //conceptos
    document.getElementById("descripcion").disabled = true;
    document.getElementById("cantidad1").disabled = true;
    document.getElementById("unidad").disabled = true;
    document.getElementById("cps").disabled = true;
    document.getElementById("ni").disabled = true;
    document.getElementById("cu").disabled = true;
    document.getElementById("vu").disabled = true;
    document.getElementById("iva").disabled = true;
    document.getElementById("ivar").disabled = true;
    document.getElementById("isr").disabled = true;
    document.getElementById("rfc").disabled = true;
    document.getElementById("ieps").disabled = true;
    document.getElementById("descuento").disabled = true;
    document.getElementById("importe_c").disabled = true;
    document.getElementById("base").disabled = true;
    document.getElementById("importe_t").disabled = true;
    document.getElementById("adicional").disabled = true;
}
function mostrar_conceptos(){
	$('#conseptos').on("change",function()
    {
    	console.clear();
    	var id = $('#conseptos').val();
    	if (id=="0") {
    		alert("escoja un dato");
    	}else{
    		desbloquear_concepto();
    		var direccion="<?php echo base_url(); ?>inicio/ajax_select";
	        var tabla="conceptos";
	        var id_contenedor="ClaveProdServ";
	        var campos_seleccionados= "*";
			__ajax(direccion,tabla,id_contenedor,id,campos_seleccionados)
			.done(function(info){
				console.log(info);
				var concepto= JSON.parse(info);
				console.log(concepto);
				
				$("#descripcion").val(concepto['Descripcion']);
				//
				$("#unidad").val("por definir");
				$("#cps").val(concepto['ClaveProdServ']);
				$("#ni").val(concepto['NoIdentificacion']);
				$("#cu").val(concepto['ClaveUnidad']);
				$("#vu").val(concepto['ValorUnitario']);
				$("#iva").val(concepto['Impuesto_Iva']);
				$("#ivar").val(concepto['Impuesto_IvaRet']);
				$("#isr").val(concepto['Impuesto_Isr']);
				$("#ieps").val(concepto['Impuesto_Ieps']);
				$("#descuento").val("por definir");
				$("#importe_c").val("por definir");
				$("#base").val("por definir");
				$("#importe_t").val("por definir");
			});
    	}

    });
}
function agregar_conceptos(){
	//adicional
	 $("#adicional").on('click', function(){
	 	var descripcion=($("#descripcion").val());    //1
        var cantidad=($("#cantidad1").val());          //2
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
        console.log(descripcion);
        console.log(cantidad);
        console.log(unidad);
        console.log(cps);
        console.log(ni);
        console.log(cu);
        console.log(vu);
        console.log(iva);
        console.log(ivar);
        console.log(isr);
        console.log(ieps);
        console.log(descuento);
        console.log(importe_c);
        console.log(base);
        console.log(importe_t);
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
        limpiar_concepto();
        var id=$('#conseptos').val();
	});
}
function limpiar_concepto(){
				$("#descripcion").val("");
				//
				$("#unidad").val("por definir");
				$("#cps").val("");
				$("#ni").val("");
				$("#cu").val("");
				$("#vu").val("");
				$("#iva").val("");
				$("#ivar").val("");
				$("#isr").val("");
				$("#ieps").val("");
				$("#descuento").val("");
				$("#importe_c").val("");
				$("#base").val("");
				$("#importe_t").val("");	
				document.getElementById("adicional").disabled = true;
				limpiarSelect();
}
function limpiarSelect() {
    $('#conseptos').prop('selectedIndex',1);
}
function quitar_concepto(){
	$(document).on("click",".eliminar",function(){
          var parent = $(this).parents().get(0);
          $(parent).remove();
    });
}
function receptor(){
	$('#Receptor').on("change",function()
    {
    	console.clear();
    	var id = $('#Receptor').val();
    	if(id== "0" ){
		  alert("escoja un dato");
		}else
		{     
	        //console.log(id);
	        var direccion="<?php echo base_url(); ?>inicio/ajax_select";
	        var tabla="receptor";
	        var id_contenedor="Id_receptor";
	        var campos_seleccionados= "*";
			__ajax(direccion,tabla,id_contenedor,id,campos_seleccionados)
			.done(function(info){
				//console.log(info);
				var receptor= JSON.parse(info);
				//console.log(receptor);
				//console.log("RFC: " + receptor['RFC_receptor']);
				//console.log("Regimen_fiscal: " +receptor['Regimen_fiscal']);
				//console.log("Tipo_perosna_receptor: " +receptor['Tipo_perosna_receptor']);
				//rfc,razon_social,uso_cfdi,tipo_persona
				$("#rfc").val(receptor['RFC_receptor']);
				$("#razon_social").val(receptor['Rason_social_receptor']);
				$("#uso_cfdi").val(receptor['Regimen_fiscal']);
				$("#tipo_persona").val(receptor['Tipo_perosna_receptor']);
			});
		}    	
    }); 
}
function __ajax(direccion,tabla,nombre_id,valor_id,campos_seleccionados){
	var ajax=$.ajax({
				method: "POST",
      			url: direccion,
      			data: {
      			'tabla': tabla,
      			'nombre_id': nombre_id,
      			'id': valor_id,
      			'campos_seleccionados':campos_seleccionados
      		}
			})
	return ajax;
}
function desbloquear_concepto(){
	document.getElementById("cantidad1").disabled = false;
	document.getElementById("adicional").disabled = false;
}

</script>
