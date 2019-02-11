<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          
		                          <h4 class="modal-title">Olvidaste tu contraseña ?</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>Ingrese su dirección de correo electrónico y rfc a continuación para restablecer su contraseña.</p>
		                          <br>
		                          <center><b><h3><p id="alerta_ov"></p></h3></b></center>
		                          <input type="text" name="nombre_usu" placeholder="nombre usurio" autocomplete="off" class="form-control placeholder-no-fix" id="oc_nombre_usuario">

		                          <br>

		                          <input type="text" name="folio_usu" placeholder="folio" autocomplete="off" class="form-control placeholder-no-fix" id="oc_folio">
		                          <br>
				                <div class="showback">
			      					<h4><i class="fa fa-angle-right"></i> ingrese un correo de destinatario</h4>
									<input type="text" name="email_usu" placeholder="email de destinatario" autocomplete="off" class="form-control placeholder-no-fix" id="oc_email">
		      					</div> 
		
		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
		                          <button class="btn btn-theme" type="button" onclick="regresa_pasword()">siguiente</button>
		                      </div>
		                  </div>
		              </div>
</div>
<script type="text/javascript">
function regresa_pasword(){
	var nombre=$("#oc_nombre_usuario").val();
	var oc_folio=$("#oc_folio").val();
	var email=$("#oc_email").val();
	
	console.clear();
	console.log("1-ingresa las variables:");
	console.log("->nombre: "+nombre);
	console.log("->folio: "+oc_folio);
	console.log("->email: "+email);
	
	var direccion=
	"<?=base_url()?>login/ajax_olvide_mi_paasword";
	
	__ajax_olvide_mi_password(direccion,nombre,oc_folio,email)
	.done(function(info){
		if (info == "undefined" || info == "null" || info == "") {
			//alert("por favor acuerdese de sus datos!");
			alerta_error();		
			document.getElementById("alerta_ov").innerHTML = "ingrese sus datos correctamente!";
		}else{
			console.log("2-manda y regresa las variables al metodo ajax "+
						"regresa la informacion como un array en json:");
			console.log(info);
			var usuario= JSON.parse(info);
			console.log("3-hacemos manipulable el arreglo:");
			console.log(usuario);
			console.log("4-:su contraseña es:");
			console.log(usuario['contraseña']);
			$("#nombre").val(usuario['Usunombre']);
			$("#contraseña").val(usuario['contraseña']);
			
			$("#myModal").modal("hide")
			var direccion=
			"<?=base_url()?>login/ajax_envio_contraseña_email";
			var nombre_usu= 	usuario['Usunombre'];
			var contraseña_usu= usuario['contraseña'];
			var email_usu=		email;	
			//alert(nombre_usu);
			//alert(contraseña_usu);
			//alert(email_usu);
			//__ajax_envio_email_contraseña(direccion,nombre_usu,contraseña_usu,email_usu);
		}
	});
}
function __ajax_olvide_mi_password(direccion,nombre,oc_folio,email){
	var ajax=$.ajax({
				method: "POST",
      			url: direccion,
	      			data: {
	      			'nombre_usu': nombre,
	      			'folio_usu': oc_folio,
	      			'email':email
	      			}
			})
	return ajax;
}
function __ajax_envio_email_contraseña(direccion,nombre_usu,contraseña_usu,email_usu){
	var ajax=$.ajax({
		method: "POST",
      	url: direccion,
	    data: {
	    	'nombre_usu'	: nombre_usu,
	    	'contraseña_usu': contraseña_usu,
	    	'email_usu'		:email_usu
	    }
	})
	return ajax;
}
</script>