<script type="text/javascript">
$(document).ready(function()
{  
    
});
function calcular_descuento_del_producto(){
    var descuento   = $("#concepto_descuento").val();
    var precio      = $("#ValorUnitario").val();
    var cantidad    = $("#Cantidad").val();
   //return descuento=descuento_neto(descuento,precio,cantidad);
   return descuento;
}
function calculo_impuesto(){
    var descuento   = $("#concepto_descuento").val();
    var precio      = $("#ValorUnitario").val();
    var cantidad    = $("#Cantidad").val();

    iva_trns   = $("#Impuesto_Iva_Trans").val();
    iva_ret    = $("#Impuesto_Iva_Ret").val();
    ieps_trns  = $("#Impuesto_Ieps_Trans").val();
    ieps_ret   = $("#Impuesto_Ieps_Ret").val();
    isr_ret    = $("#Impuesto_Isr_Ret").val();
    
    console.log(iva_trns);
    console.log(iva_ret);
    console.log(ieps_trns);
    console.log(ieps_ret);
    console.log(isr_ret);
    //calculos
    var base=base_concepto(precio,cantidad); 
    var base_imp=(base-descuento);
    console.log("importe base imp: "+base_imp);
    $("#importe_base_concepto").val(base);

    var iva_trns_base=  iva_trns;
    var ieps_trns_base= ieps_trns;
    var iva_ret_base=   iva_ret;
    var ieps_ret_base=  ieps_ret;
    var isr_ret_base=   isr_ret;

    var iva_trns=  impuestos_base(base_imp,iva_trns);
    var ieps_trns= impuestos_base(base_imp,ieps_trns);
    var iva_ret=   impuestos_base(base_imp,iva_ret);
    var ieps_ret=  impuestos_base(base_imp,ieps_ret);
    var isr_ret=   impuestos_base(base_imp,isr_ret);
    
    console.log("iva_trns: "+iva_trns);
    console.log("ieps_trns: "+ieps_trns);
    console.log("iva_ret: "+iva_ret);
    console.log("ieps_ret: "+ieps_ret);
    console.log("isr_ret: "+isr_ret);

    if (iva_trns <= 0) {
        $("#trans_iva_base").val("0");
        $("#trans_iva_impuesto").val("0");
        $("#trans_iva_tipo_base").val("0");
        $("#trans_iva_tasa").val("0");
        $("#trans_iva_importe").val("0");
    }
    if(ieps_trns <= 0){
        $("#trans_ieps_base").val("0");
        $("#trans_ieps_impuesto").val("0");
        $("#trans_ieps_tipo_base").val("0");
        $("#trans_ieps_tasa").val("0");
        $("#trans_ieps_importe").val("0");
    }
    if(iva_ret <= 0){
        $("#ret_iva_base").val("0");
        $("#ret_iva_impuesto").val("0");
        $("#ret_iva_tipo_base").val("0");
        $("#ret_iva_tasa").val("0");
        $("#ret_iva_importe").val("0");
    }
    if(ieps_ret <= 0){
        $("#ret_ieps_base").val("0");
        $("#ret_ieps_impuesto").val("0");
        $("#ret_ieps_tipo_base").val("0");
        $("#ret_ieps_tasa").val("0");
        $("#ret_ieps_importe").val("0");
    }
    if (isr_ret <= 0) {
        $("#ret_isr_base").val("0");
        $("#ret_isr_impuesto").val("0");
        $("#ret_isr_tipo_base").val("0");
        $("#ret_isr_tasa").val("0");
        $("#ret_isr_importe").val("0");
    }
    if(iva_trns > 0){
        $("#trans_iva_base").val(base_imp);
        $("#trans_iva_impuesto").val("002");
        $("#trans_iva_tipo_base").val("Tasa");
        $("#trans_iva_tasa").val(iva_trns_base);
        $("#trans_iva_importe").val(iva_trns);
    }
    if(ieps_trns > 0){
        $("#trans_ieps_base").val(base_imp);
        $("#trans_ieps_impuesto").val("003");
        $("#trans_ieps_tipo_base").val("Tasa");
        $("#trans_ieps_tasa").val(ieps_trns_base);
        $("#trans_ieps_importe").val(ieps_trns);
    }
    if(iva_ret > 0){
        $("#ret_iva_base").val(base_imp);
        $("#ret_iva_impuesto").val("002");
        $("#ret_iva_tipo_base").val("Tasa");
        $("#ret_iva_tasa").val(ieps_trns_base);
        $("#ret_iva_importe").val(ieps_trns);
    }
    if(ieps_ret > 0){
        $("#ret_ieps_base").val(base_imp);
        $("#ret_ieps_impuesto").val("003");
        $("#ret_ieps_tipo_base").val("Tasa");
        $("#ret_ieps_tasa").val(ieps_trns_base);
        $("#ret_ieps_importe").val(ieps_trns);
    }
    if(isr_ret > 0){
        $("#ret_isr_base").val(base_imp);
        $("#ret_isr_impuesto").val("001");
        $("#ret_isr_tipo_base").val("Tasa");
        $("#ret_isr_tasa").val(ieps_trns_base);
        $("#ret_isr_importe").val(ieps_trns);
    }
}
function descuento_neto(descuento,precio,cantidad){
    var descuento_neto=(cantidad*precio)*descuento/100;
    console.clear();
    console.log("descuento neto: "+descuento_neto);
    return (descuento_neto);
}
function base_concepto(precio,cantidad){

    var base_neto=(cantidad*precio);
    //console.clear();
    console.log("base del producto: "+base_neto);
    return(base_neto);
}
function impuestos_base(base,impuesto){
    impuesto=(base*impuesto);
    return(impuesto);
}
function agregar_concepto(){
    console.clear();
    var producto= $('#Cantidad').val();
    var folio_producto_cuenta=$('#folio_prpducto').val();

    if (producto == 0) {
        alert("por favor ingrese l cntidad del concepto");
        console.log("por favor ingrese l cntidad del concepto");
    }
    else{
        console.log("imprecion de resultados de concepto");

        var ClaveProdServ=        $("#ClaveProdServ").val();
        var NoIdentificacion=     $("#NoIdentificacion").val();          
        var ClaveUnidad=          $("#ClaveUnidad").val();      
        var Descripcion=          $("#Descripcion").val();      
        var ValorUnitario=        $("#ValorUnitario").val();      
        var concepto_Moneda=      $("#concepto_Moneda").val();          
        var concepto_descuento=   $("#concepto_descuento").val();    
        var Cantidad=             $("#Cantidad").val();
        var importe_base_concepto=$("#importe_base_concepto").val();
        var decuento =            calcular_descuento_del_producto();

        var trans_iva_base=       $("#trans_iva_base").val();
        var trans_iva_impuesto=   $("#trans_iva_impuesto").val();
        var trans_iva_tipo_base=  $("#trans_iva_tipo_base").val();
        var trans_iva_tasa=       $("#trans_iva_tasa").val();
        var trans_iva_importe=    $("#trans_iva_importe").val();

        var trans_ieps_base=      $("#trans_ieps_base").val();
        var trans_ieps_impuesto=  $("#trans_ieps_impuesto").val();
        var trans_ieps_tipo_base= $("#trans_ieps_tipo_base").val();
        var trans_ieps_tasa=      $("#trans_ieps_tasa").val();
        var trans_ieps_importe=   $("#trans_ieps_importe").val();

        var ret_iva_base=         $("#ret_iva_base").val();
        var ret_iva_impuesto=     $("#ret_iva_impuesto").val();
        var ret_iva_tipo_base=    $("#ret_iva_tipo_base").val();
        var ret_iva_tasa=         $("#ret_iva_tasa").val();
        var ret_iva_importe=      $("#ret_iva_importe").val();

        var ret_ieps_base=        $("#ret_ieps_base").val();
        var ret_ieps_impuesto=    $("#ret_ieps_impuesto").val();
        var ret_ieps_tipo_base=   $("#ret_ieps_tipo_base").val();
        var ret_ieps_tasa=        $("#ret_ieps_tasa").val();
        var ret_ieps_importe=     $("#ret_ieps_importe").val(); 

        var ret_isr_base=         $("#ret_isr_base").val();
        var ret_isr_impuesto=     $("#ret_isr_impuesto").val();
        var ret_isr_tipo_base=    $("#ret_isr_tipo_base").val();
        var ret_isr_tasa=         $("#ret_isr_tasa").val();
        var ret_isr_importe=      $("#ret_isr_importe").val();        
    
    //concepto detalles
    console.log(ClaveProdServ);   
    console.log(NoIdentificacion);
    console.log(ClaveUnidad);   
    console.log(Descripcion);
    console.log(ValorUnitario);
    console.log(concepto_Moneda);
    console.log(concepto_descuento);
    console.log(Cantidad);
    console.log(importe_base_concepto);
    console.log("translados iva");   
    //iva
    console.log("iva base: "+trans_iva_base);   
    console.log("iva impuesto: "+trans_iva_impuesto);
    console.log("iva tasa o cuota: "+trans_iva_tipo_base);   
    console.log("iva TasaOCuota: "+trans_iva_tasa);
    console.log("iva importe: "+trans_iva_importe);
    //ieps
    console.log("ieps base: "+trans_ieps_base);   
    console.log("ieps impuesto: "+trans_ieps_impuesto);
    console.log("ieps importe: "+trans_ieps_tipo_base);   
    console.log("ieps TasaOCuota: "+trans_ieps_tipo_base);
    console.log("ieps importe: "+trans_ieps_importe);
    //retenido
    //iva
    console.log("iva base: "+ret_iva_base);   
    console.log("iva impuesto: "+ret_iva_impuesto);
    console.log("iva tasa o cuota: "+ret_iva_tipo_base);   
    console.log("iva TasaOCuota: "+ret_iva_tasa);
    console.log("iva importe: "+ret_iva_importe);
    //ieps
    console.log("ieps base: "+ret_ieps_base);   
    console.log("ieps impuesto: "+ret_ieps_impuesto);
    console.log("ieps tasa o cuota: "+ret_ieps_tipo_base);   
    console.log("ieps TasaOCuota: "+ret_ieps_tasa);
    console.log("ieps importe: "+ret_ieps_importe);
    //isr
    console.log("isr base: "+ret_isr_base);   
    console.log("isr impuesto: "+ret_isr_impuesto);
    console.log("isr tasa o cuota: "+ret_isr_tipo_base);   
    console.log("isr TasaOCuota: "+ret_isr_tasa);
    console.log("isr importe: "+ret_isr_importe);
        var cabeza='<tr class="fila-fija">';
        var pie='</tr>';
        var campo1='<td><input required name="folio_prpducto[]"  id="folio_prpducto" placeholder="folio" value="POR DEFINIR"/></td>';
        var campo2='<td><input required name="ClaveProdServ_concepto[]" placeholder="" value="'+ClaveProdServ+'"/></td>';
        var campo3='<td><input required name="NoIdentificacion_concepto[]"    placeholder="" value="'+NoIdentificacion+'"/ ></td>';
        var campo4='<td><input required name="ClaveUnidad_concepto[]"    placeholder="" value="'+ClaveUnidad+'"/></td>';
        var campo5='<td><input required name="Descripcion_concepto[]"  placeholder="" value="'+Descripcion+'"/></td>';
        var campo6='<td><input required name="ValorUnitario_concepto[]"       placeholder="MEX" value="'+ValorUnitario+'"/></td>';
        var campo7='<td><input required name="Moneda[]"       placeholder="MEX"  value="'+concepto_Moneda+'"/></td>';
        var campo8='<td><input required name="Descuento_concepto[]"       placeholder="MEX"  value="'+decuento+'"/></td>';
        var campo9='<td><input required name="Cantidad_concepto[]"       placeholder="MEX"  value="'+Cantidad+'"/></td>';

        //importe
        var campo10='<td><input required name="importe_base_concepto[]"       placeholder="MEX"  value="'+importe_base_concepto+'"/></td>';
        
        //transladado iva
        var campo11='<td><input required name="trans_iva_tasa[]"       placeholder="MEX"  value="'+trans_iva_tasa+'"/></td>';
        var campo12='<td><input required name="trans_iva_importe[]"       placeholder="MEX"  value="'+trans_iva_importe +'"/></td>';
        //transladado ieps

        var campo13='<td><input required name="trans_ieps_tasa[]"       placeholder="MEX"  value="'+trans_ieps_tasa +'"/></td>';        
        var campo14='<td><input required name="trans_ieps_importe[]"  placeholder="" value="'+trans_ieps_importe +'"/></td>';
        //retenidos iva

        var campo15='<td><input required name="ret_iva_tasa[]"    placeholder="" value="'+ret_iva_tasa+'"/></td>';
        var campo16='<td><input required name="ret_iva_importe[]"  placeholder="" value="'+ret_iva_importe+'"/></td>';
        //retenido ieps

        var campo17='<td><input required name="ret_ieps_tasa[]"       placeholder="MEX"  value="'+ret_ieps_tasa+'"/></td>';
        var campo18='<td><input required name="ret_ieps_importe[]"       placeholder="MEX"  value="'+ret_ieps_importe+'"/></td>';
        
        var campo19='<td><input required name="ret_isr_tasa[]"  placeholder="" value="'+ret_isr_tasa  +'"/></td>';
        var campo20='<td><input required name="ret_isr_importe[]" placeholder="" value="'+ret_isr_importe  +'"/></td>';
        
        var campo21='<td class="eliminar"><input type="button"  class="btn btn-danger" value="Menos -"/></td>';
        
        var arreglo =cabeza+campo1+campo2+campo3+campo4+campo5+campo6+campo7+campo8+campo9+campo10
                    +campo11+campo12+campo13+campo14+campo15+campo16+campo17+campo18+campo19+campo20
                    +campo21
                    +pie;
        //al precionar el boton con id adicional se inicia la funcion
        $(arreglo).clone().removeClass('fila-fija').appendTo("#tabla"); 
    //limpiar_concepto();
    }

}
 
function eliminar_concepto(){
    $(document).on("click",".eliminar",function(){
          var parent = $(this).parents().get(0);
          $(parent).remove();
    });
}

</script>

