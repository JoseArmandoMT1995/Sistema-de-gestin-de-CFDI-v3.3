<?php
	//Agregamos la libreria para genera códigos QR
	session_start();
	$usuario=$_SESSION['usuario']="jose";

	//Declaramos una carpeta temporal para guardar la imagenes generadas.
	$dir 	= $usuario;	echo $dir.'<br>';
	/***************************************************************************************************************************************************/
	$qr 	=	$dir."/qr";		echo $qr.'<br>';
	/***************************************************************************************************************************************************/
	$logo	=	$dir."/logo";	echo $logo.'<br>';
	/***************************************************************************************************************************************************/
	$xml	=	$dir."/xml";	echo $xml.'<br>';
	/***************************************************************************************************************************************************/
	echo   $qr."/*.*".'<br>';
	echo $logo."/*.*".'<br>';
	echo  $xml."/*.*".'<br>';
	/***************************************************************************************************************************************************/
	if (file_exists($dir)){
		if (file_exists($qr) & file_exists($logo) & file_exists($xml)){
				foreach(glob($qr."/*.*") as $archivos_carpeta)  
				{
				 unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia  
				}
				foreach(glob($logo."/*.*") as $archivos_carpeta)  
				{
				 unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia  
				}
				foreach(glob($xml."/*.*") as $archivos_carpeta)  
				{
				 unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia  
				}
				rmdir($qr);
				rmdir($logo);
				rmdir($xml);

		}
		rmdir($dir);
	}

	

/*foreach(glob($qr."/*.*") as $archivos_carpeta)  
{
 unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia  
}*/
// Eliminamos todas las fotos contenidas en el directorio - mis_fotos - y seguidamente 
// eliminamos la carpeta o directorio 



?>