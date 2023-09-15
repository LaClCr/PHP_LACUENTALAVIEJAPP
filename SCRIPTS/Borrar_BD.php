<?php
mysqli_report(MYSQLI_REPORT_ERROR);

$servidor="localhost";
$usuario="root";
$clave="";
    
@$mysqli = new mysqli($servidor,$usuario,$clave);
if ($mysqli->connect_errno){
    header('Location: error.php');
    exit();
}

$consulta= "DROP DATABASE IF EXISTS seguimiento_gastos;";

$resultado = $mysqli->query($consulta);
if(!$resultado){
    header('Location: error.php');
    exit();
}else {
    header('Location: index.php');
    exit();
}


?>