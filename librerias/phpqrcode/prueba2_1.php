<?php
	//Agregamos la libreria para genera códigos QR
	session_start();
	$usuario=$_SESSION['usuario']="jose";
	
	//Declaramos una carpeta temporal para guardar la imagenes generadas
	$inicio	='usuario/';
	$dir 	= $inicio.$usuario;	echo $dir.'<br>';
	/***************************************************************************************************************************************************/
	$qr 	=	$dir."/qr";		echo $qr.'<br>';
	/***************************************************************************************************************************************************/
	$logo	=	$dir."/logo";	echo $logo.'<br>';
	/***************************************************************************************************************************************************/
	$xml	=	$dir."/xml";	echo $xml.'<br>';
	/***************************************************************************************************************************************************/
	echo $qr."/*.*".'<br>';
	echo $logo."/*.*".'<br>';
	echo $xml."/*.*".'<br>';
	if (!file_exists($dir)){
		echo "existe:".$dir;

		//Eliminamos los archivos internos: 

		/**************************************************************************************************/
		foreach(glob($qr."/*.*") as $archivos_carpeta)  
		{
		 unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia  
		}
		/**************************************************************************************************  
		foreach(glob($eliminarLogo."/*.*") as $archivos_carpeta)  
		{
		 unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia  
		}
		**************************************************************************************************  
		foreach(glob($eliminarXml."/*.*") as $archivos_carpeta)  
		{
		 unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia  
		}
		**************************************************************************************************
		foreach(glob($eliminar."/*.*") as $archivos_carpeta)  
		{
		 unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia  
		}
		/**************************************************************************************************/
		//rmdir($eliminar);         // Eliminamos la carpeta vacia  
	}
	else
	{
		echo "<h4>no hay elementos</h4>";

	}
  
// Eliminamos todas las fotos contenidas en el directorio - mis_fotos - y seguidamente 
// eliminamos la carpeta o directorio 



?>