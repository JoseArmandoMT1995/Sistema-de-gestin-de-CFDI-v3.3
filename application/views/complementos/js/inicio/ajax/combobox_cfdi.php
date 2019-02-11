<script type="text/javascript">
$(document).ready(function()
{  
    emisor();
    receptor();
    concepto();
});
function emisor(){

    $('#combobox_emisor').on("change",function()
    {
        console.clear();
        var id = $('#combobox_emisor').val();
        if(id== "0" ){
          alert("escoja un dato");
        }else
        {    

            //console.log(id);
            var direccion="<?=base_url()?>inicio/ajax_select";
            var tabla="emisor";
            var id_contenedor="Id_emisor";
            var campos_seleccionados= "*";
            __ajax(direccion,tabla,id_contenedor,id,campos_seleccionados)
            .done(function(info){
                //console.log(info);
                var emisor= JSON.parse(info);
                console.log(emisor);
                console.log("RFC: " + emisor['RFC_emisor']);
                console.log("Regimen_fiscal: " +emisor['Regimen_fiscal']);
                console.log("Tipo_perosna_receptor: " +emisor['Tipo_perosna_emisor']);

                $("#emisro_rfc").val(emisor['RFC_emisor']);
                $("#emisor_regimen_fiscal").val(emisor['Regimen_fiscal']);
                $("#emisor_razon_social").val(emisor['Rason_social_emisor']);
                $("#emisor_tipo_persona").val(emisor['Tipo_perosna_emisor']);
                //rfc,razon_social,uso_cfdi,tipo_persona
                //$("#rfc").val(receptor['RFC_receptor']);
                //$("#razon_social").val(receptor['Rason_social_receptor']);
                //$("#uso_cfdi").val(receptor['Regimen_fiscal']);
                //$("#tipo_persona").val(receptor['Tipo_perosna_receptor']);

            });
        }       
    }); 
}
function receptor(){
    $('#combobox_receptor').on("change",function()
    {
        console.clear();
        console.log("ha ingresadoa receptor");
        var id = $('#combobox_receptor').val();
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
                var emisor= JSON.parse(info);
                console.log(emisor);
                console.log("RFC: " + emisor['RFC_receptor']);
                console.log("Regimen_fiscal: " +emisor['Regimen_fiscal']);
                console.log("Tipo_perosna_receptor: " +emisor['Tipo_perosna_receptor']);

                $("#receptor_rfc").val(emisor['RFC_receptor']);
                $("#receptor_uso_cfdi").val(emisor['Regimen_fiscal']);
                $("#receptor_razon_social").val(emisor['Rason_social_receptor']);
                $("#receptor_tipo_persona").val(emisor['Tipo_perosna_receptor']);
                //rfc,razon_social,uso_cfdi,tipo_persona
                //$("#rfc").val(receptor['RFC_receptor']);
                //$("#razon_social").val(receptor['Rason_social_receptor']);
                //$("#uso_cfdi").val(receptor['Regimen_fiscal']);
                //$("#tipo_persona").val(receptor['Tipo_perosna_receptor']);

            });
        }       
    }); 
}
function concepto(){
     $('#combobox_concepto').on("change",function()
    {
        console.clear();
        console.log("ha ingresadoa concepto");
        var id = $('#combobox_concepto').val();
        if(id== "0" ){
          alert("escoja un dato");
        }else
        {     
            //console.log(id);
            var direccion="<?php echo base_url(); ?>inicio/ajax_select";
            var tabla="conceptos";
            var id_contenedor="ClaveProdServ";
            var campos_seleccionados= "*";
            __ajax(direccion,tabla,id_contenedor,id,campos_seleccionados)
            .done(function(info){
                //console.log(info);
                var concepto= JSON.parse(info);
                console.log(concepto);
                console.log("ClaveProdServ: " + concepto['ClaveProdServ']);
                console.log("NoIdentificacion: " +concepto['NoIdentificacion']);
                console.log("Descripcion: " +concepto['Descripcion']);

                $("#ClaveProdServ").val(concepto['ClaveProdServ']);
                $("#NoIdentificacion").val(concepto['NoIdentificacion']);
                $("#ClaveUnidad").val(concepto['ClaveUnidad']);
                $("#Descripcion").val(concepto['Descripcion']);
                $("#ValorUnitario").val(concepto['ValorUnitario']);
                $("#concepto_Moneda").val(concepto['Moneda']);

                $("#concepto_descuento").val(concepto['Descuento']);
                
                $("#Impuesto_Iva_Trans").val(concepto['Impuesto_trans_Iva']);
                $("#Impuesto_Ieps_Trans").val(concepto['Impuesto_trans_Ieps']);
                
                
                $("#Impuesto_Isr_Ret").val(concepto['Impuesto_ret_Isr']);
                $("#Impuesto_Iva_Ret").val(concepto['Impuesto_ret_iva']);
                $("#Impuesto_Ieps_Trans").val(concepto['Impuesto_ret_Ieps']);

                $("#Fecha_captura").val(concepto['fecha_captura']);
                

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
</script>