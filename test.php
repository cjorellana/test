<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

date_default_timezone_set('America/Guatemala');


//fuciones
require_once('funciones.php');
$cfun = new funciones();

//variables
$host="125.1.203.134";
$hoy = date("F j, Y, g:i:s a"); 

//exec("ping -n 4 " . $host, $output, $result);
exec("ping -c 4 $host", $output, $result);


//solo para pruebas
//$result=1;
if ($result == 0)
{
    array_push($output, "Ping successful! " . ' ' . $hoy);  
    $name= '/home/cjorellana/test/log/log_' . date('m-d-Y') . '.txt';     
}
else
{
    array_push($output, "Ping unsuccessful! " . ' ' . $hoy);    
    $name= '/home/cjorellana/test/log2/log_' . date('m-d-Y') . '.txt';
    $cfun->verificar();    
}


file_put_contents($name, print_r($output, true),FILE_APPEND | LOCK_EX);

