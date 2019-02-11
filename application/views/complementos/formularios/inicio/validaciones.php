<script type="text/javascript">
	
	$(document).ready(function()
			{    
				bloquear_input();
			});
	function bloquear_input(){
		bloquear_input_emisor();
	}
	function bloquear_input_emisor(){
		$( "#emisro_rfc").prop( "disabled", true );
		$( "#emisor_razon_social").prop( "disabled", true );
		$( "#emisor_regimen_fiscal").prop( "disabled", true );
		$( "#emisor_tipo_persona").prop( "disabled", true );
	}
</script>