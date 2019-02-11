<?php
	//Agregamos la libreria para genera códigos QR
	 include "../qrlib.php";    
	
	session_start();
	$usuario=$_SESSION['usuario']="jose";
	//Declaramos una carpeta temporal para guardar la imagenes generadas
	$dir 	= $usuario;
	$qr 	=	$dir."/qr/";
	$logo	=	$dir."/logo/";
	$xml	=	$dir."/xml/";
	//Si no existe la carpeta la creamos
	if (!file_exists($dir)){
		mkdir($dir);
		echo $dir.'<br>';
		if (!file_exists($qr) & !file_exists($logo) & !file_exists($xml)){
			mkdir($qr);
    		mkdir($logo);
    		mkdir($xml);
    			echo $qr.'<br>';
    			echo $logo.'<br>';
    			echo $xml.'<br>';
		}

	}
       
                //Declaramos la ruta y nombre del archivo a generar
	$filename = $qr.'test.png';

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
	echo '<img src="'.$qr.basename($filename).'" 	 /><hr/>';  
	echo $dir.basename($filename);

?>