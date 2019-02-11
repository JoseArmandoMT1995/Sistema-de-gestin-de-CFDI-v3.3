<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Login</title>
<link rel="stylesheet" href="<?=base_url()?>plantillas/css/login/login.css"> 
<style type="text/css">
  .main-wrap {
  width: 100%;
  height: 100%;
  }
  .login-main {
  width: 300px;
  height: 190px;
  }
  .box1 {
  height: 40px;
}
</style>
</head>
<body>
  <div class="main-wrap">
<form action="<?=base_url()?>Login/login_user" method="POST">
        <div class="login-main">
          <img src="<?=base_url()?>plantillas/img/iconos/factuwin_Logotipo.png" width="100" height="30">
            <input type="text"      name="Usunombre"    placeholder="nombre de usuario"  class="box1 border1" >
            <input type="password"  name="Usuacceso" placeholder="Contraseña" class="box1 border2" >
            <input type="text"      name="Usulogin" placeholder="tipo de usuario" class="box1 border2" >
            <input type="submit"    class="send"    value="iniciar">                                        
    <p>Registrarse <a href="<?=base_url()?>Login/registrar"><b>click aqui!</b></a></p><!--olvide mi password-->
    <p>¿Olvidaste tu <i>Contraseña</i>? <a href="<?=base_url()?>login"><b>click aqui!</b></a></p><!--olvide mi password-->
        </div>
</form>      
    </div>
</body>
</html>