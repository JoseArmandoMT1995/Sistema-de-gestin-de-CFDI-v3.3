<?php
	//Agregamos la libreria para genera códigos QR
	 include "qrlib.php";    
	
	//Declaramos una carpeta temporal para guardar la imagenes generadas
	$dir = 'temp/';
	
	//Si no existe la carpeta la creamos
	if (!file_exists($dir))
        mkdir($dir);
	
        //Declaramos la ruta y nombre del archivo a generar
	$filename = $dir.'test.png';

        //Parametros de Condiguración
	
	$tamaño = 5; //Tamaño de Pixel ancho y largo
	$level = 'H'; //Precisión Baja
	$framSize = 3; //Tamaño en blanco
	//aqui resive la variable nombre 
		$re="valor1";
		$rr="valor2";
		$total="valor3";
		$uuid="valor4";

	echo $cadenaQR= "?re=".$re."+&rr=".$rr."+&tt=".$total."+&id=".$uuid;

	$contenido = $cadenaQR; //Texto
	
        //Enviamos los parametros a la Función para generar código QR 
	QRcode::png($contenido, $filename, $level, $tamaño, $framSize); 
	
        //Mostramos la imagen generada
	echo '<img src="'.$dir.basename($filename).'" /><hr/>';  
?>