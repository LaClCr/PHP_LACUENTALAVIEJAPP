<?php
session_start();
mysqli_report(MYSQLI_REPORT_ERROR);
require('Uso_BD.php');

$tipo = $_REQUEST["tipo_gasto"];
$cant = $_REQUEST["cantidad"];
$fecha = date("Y-m-d");
$categoria = $_REQUEST["listado"];

$consulta="INSERT INTO gastos (tipo_gasto, cantidad, fecha, id_categoria) VALUES ('$tipo', '$cant', '$fecha', $categoria);";

$resultado = $mysqli->query($consulta);
if(!$resultado){
    header('Location: error.php');
    exit();
}else {
    header('Location: acierto.php');
    exit();
}

?>