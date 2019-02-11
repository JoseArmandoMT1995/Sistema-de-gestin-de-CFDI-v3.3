<?php  
ini_set('date.timezone', 'America/Mexico_City');
$time1=date('H:i:s',time());
//datos importantes
$año=date('Y',time());
$mes=date('M',time());
$dia=date('d',time());
$hora=date("g:i a",strtotime($time1));

?>