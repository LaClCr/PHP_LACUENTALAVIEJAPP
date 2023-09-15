<?php
mysqli_report(MYSQLI_REPORT_ERROR);

$servidor="localhost";
$usuario="root";
$clave="";

@$mysqli = new mysqli($servidor,$usuario,$clave);
if ($mysqli->connect_errno){
    echo "Fallo en conexión a Mysql: ".$mysqli->connect_errno." ".$mysqli->connect_error;
    die("Salida del programa. Error acceso BBDD");
}else {
    echo "Se ha conectado al servidor";
}

$consulta="CREATE DATABASE IF NOT EXISTS seguimiento_gastos";

$resultado = $mysqli->query($consulta);
if(!$resultado){
    echo "Lo sentimos. App falla.<br>";
    echo "Error en $consulta <br>";
    echo "Num.error: ".$mysqli->errno."<br>";
    exit;
}


?>