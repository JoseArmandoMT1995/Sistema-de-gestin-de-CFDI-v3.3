		        <p class="centered"><a href="profile.html"><img src="<?=base_url()?>plantillas/img/iconos_cartoon/user.png" class="img-circle" width="60"></a></p>
		       <center><b><h4><p id="alerta"></p></h4></b></center>
		        <div class="login-wrap">
		        	
		            <input type="text" name="Usunombre" class="form-control" placeholder="nombre de usuario" id="nombre" autofocus>
		            <br>
		          
		            <input type="password" name="contraseña" class="form-control" placeholder="Contraseña" id="contraseña">
		            
		            <label class="checkbox">
		                <span class="pull-right">
		                    <a data-toggle="modal" href="login.html#myModal"> Olvidaste tu contraseña?</a>
		
		                </span>
		            </label>
		            
		            <button class="btn btn-success btn-block" id="ingreso" type="button" onclick="ingresar()"><i class="fa fa-lock" onclick="ingresar()"></i> INGRESAR</button>
		            
		            <hr>
		            <div class="login-social-link centered">
		            <p>Vcita nuestra pagina CiverWinE y ve mas cosas</p>
		                <a href="http://www.ciberwine.com.mx">
		                <i class="fa fa-thumbs-o-up"></i> CiverWin Evolution
		                </a>
		                
		            </div>
	
		        </div>
		    <script type="text/javascript">
		    document.getElementById("alerta").innerHTML = "bienvenido usuario";
			  function ingresar(){
			  	var nombre	  =	$('#nombre').val();
			  	var contraseña=	$('#contraseña').val();
			  	console.clear();
			  	console.log("1-ingresar datos:");
			  	console.log("nombre de usuario: "+nombre);
			  	console.log("contraseña de usuario: "+contraseña);
			  	var direccion="<?=base_url()?>login/ajax_ingresar";
				__ajax_corroborar_usuario(direccion,nombre,contraseña)
				.done(function(info){
					if (info == "undefined" || info == "null" || info == "") {
					//alert();
					//$("#alerta").val("por favor acuerdese de sus datos!");
					//document.getElementById("alerta").innerHTML = "ingrese sus datos correctamente!";
					alerta_error();
					}else{
						console.log("2-manda y regresa las variables al metodo ajax "+
						"regresa la informacion como un array en json:");
						console.log(info);
						console.log("3-hacemos manipulable el arreglo:");
						var usuario= JSON.parse(info);
						console.log(usuario);
						console.log("4-obtenemos las bariables que utilizaremos como variables de sesion:");
						
						var Usuclave=	usuario['Usuclave'];
						var Usulogin=	usuario['Usulogin'];
						var Usunombre=	usuario['Usunombre'];
						var Usufolio=	usuario['Usufolio'];
						var Usuacceso=	usuario['Usuacceso'];
						
						console.log("id del usuario: "+Usuclave);
						
						console.log("cargo del usuario: "+Usulogin);
						console.log("nombre del usuario: "+Usunombre);
						console.log("su folio es: "+Usufolio);
						console.log("su folio es: "+Usufolio);
						console.log("su nivel de acceso es: "+Usuacceso);
						console.log("5-las variables ya ingresadas en la sesion");
						//alert("bienvenido a nuestro sistema : "+Usunombre)	
						//alerta_exito(Usunombre);
						alert ("Bienvenido al Sistema \n *Usuario :"+ Usunombre+"\n *Puesto: "+Usulogin);
						location.href ='<?=base_url()?>login/guardar_variables_sesion/'+Usuclave+'/'+Usulogin+'/'+Usunombre+'/'+Usufolio+'/'+Usuacceso;
					}
				});
			  }
			  function alerta_exito(Usunombre){
			  	swal({
						    title: "Exito",
						    icon: "success",
						    text: "Bienvenido al sistema "+Usunombre  					
				});	
			  }
			  function alerta_error(){
			  	swal({
						    title: "Error!",
						    icon: "warning",
						    text: "Ingrese sus datos correctamente "					
				});	
			  }
			  function __ajax_corroborar_usuario(direccion,nombre,contraseña){
				  	var ajax=$.ajax({
					method: "POST",
	      			url: direccion,
	      			data: {
	      			'nombre': 		nombre,
	      			'contraseña': 	contraseña
	      		}
			})
			return ajax;
			}	
			function __ajax_variables_sesion(direccion,Usuclave,Id_emisor1,Usulogin,Usunombre){
				var ajax=$.ajax({
					method: "POST",
	      			url: direccion,
	      			data: {
	      			'Usuclave': 		Usuclave,
	      			'Id_emisor1': 		Id_emisor1,
	      			'Usulogin': 		Usulogin,
	      			'Usunombre': 		Usunombre
	      			}
				})
			}			        
			</script>