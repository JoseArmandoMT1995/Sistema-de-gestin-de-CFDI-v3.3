<style type="text/css">
  body{
  font:15px arial,Helvetica;
}
#main-content {
margin-left: 195px;/*espacio derecho*/
margin-right: -15px;/*espacio izquierda*/
}
.contenedor{
  width:90%;/*que tan centrado lo quieeres*/
  margin:auto;/*el tamaño del margen inbisible*/
  overflow:hidden;
}

.boton1{
  height:30px;/*alto de boton*/
  background-color: #0B0B3B;/*color de boton*/
  border: 0;/*borde de boton*/
  padding-left: 20px;/*mover a la derecha dentro del boton*/
  padding-right: 20px;/*mover a la izquierda dentro del boton*/
  /*letras centradas*/
  color: #fff;/*color de las letras del boton*/
}
#cabecera{
min-height: 400px;
min-width: 100%;
background: url('<?=base_url()?>plantillas/img/factura3.jpg') no-repeat 0 -50px ;
background-position:0% 0%,50% 50%;
background-size:100% 400px,250px 250px,700px 450px;
text-align: center;
color:#000;
}
#cabecera h1{
  margin-top:100px;
  font-size: 55px;
  margin-bottom: 10px;
}
#cabecera p{
  font-size: 20px;
  color:#000;
}
#boletin{
  padding: 10px;
  color: #fff;
  background:#21282b;
}
#boletin form{
  float:right;
  margin-top: 10px;

}
#boletin input[type="email"]{
  padding: 4px;
  height: :25px;
  width: 250px;
}
#cajas{
  margin-top: 20px;
}
#cajas .caja {
  float: left;
  text-align: center;
  width:250px;
  /*width: 100%; me gusta mas asi*/
  padding: 20px;
  border: 2px;
  color: #000000;
}
#cajas .caja img{
  width: 90px;
}
</style>
<section id="main-content">
  <section class="wrapper site-min-height">
    <?php
          //$this->load->view('complementos/inicio/cabecera');
    ?>
    <?php
          //$this->load->view('complementos/inicio/boletin');
    ?>
    <?php
          $this->load->view('complementos/inicio/veneficios');
    ?>
  </section>
</section>