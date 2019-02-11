<script type="text/javascript">
	$(document).ready(function()
			{    
				bloquear_input();

			});
	function bloquear_input(){
		bloquear_input_emisor();
		bloquear_input_receptor();
		bloquear_input_concepto();
	}
	function bloquear_input_emisor(){
		$( "#emisro_rfc"			).prop( "disabled", true );
		$( "#emisor_razon_social"	).prop( "disabled", true );
		$( "#emisor_regimen_fiscal"	).prop( "disabled", true );
		$( "#emisor_tipo_persona"	).prop( "disabled", true );
	}
	function bloquear_input_receptor(){
		$( "#receptor_rfc"				).prop( "disabled", true );
		$( "#receptor_razon_social"		).prop( "disabled", true );
		$( "#receptor_uso_cfdi"	).prop( "disabled", true );
		$( "#receptor_tipo_persona"		).prop( "disabled", true );
	}
	function  bloquear_input_concepto(){
		
		$( "#Cantidad"					).prop( "disabled", true );
		$( "#boton_agregar_conceptos"	).prop( "disabled", true );
	}
	function desbloqueo_cantidad_concepto(){
		$( "#Cantidad"					).prop( "disabled", false );
	}
	function desbloqueo_agregar_concepto(){
		$( "#boton_agregar_conceptos"	).prop( "disabled", false );
	}
</script>