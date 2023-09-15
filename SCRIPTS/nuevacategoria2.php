<?php
session_start();
mysqli_report(MYSQLI_REPORT_ERROR);
require('Uso_BD.php');

$nombre = $_REQUEST["nombre_categoria"];
$descripcion = $_REQUEST["descripcion"];
$limite = $_REQUEST["limite_mensual"];

$consulta="INSERT INTO categorias_gastos (nombre_categoria, descripcion, limite_mensual) VALUES ('$nombre', '$descripcion', '$limite');";

$resultado = $mysqli->query($consulta);
if(!$resultado){
    header('Location: error.php');
    exit();
}else {
    header('Location: acierto.php');
    exit();
}

?>