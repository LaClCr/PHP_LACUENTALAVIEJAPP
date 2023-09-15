<?php

mysqli_report(MYSQLI_REPORT_ERROR);

require('Uso_BD.php');

$codigo=$_REQUEST['codigo'];
$tipogasto = $_REQUEST['tipo_gasto'];
$cant=$_REQUEST['cantidad'];
$fecha=$_REQUEST['fecha'];
$categoria=$_REQUEST['listacat'];

$opcion = $_REQUEST['opcion'];

if ($opcion == 'BORRAR') {

    $consulta = "DELETE FROM gastos WHERE id_gasto = '$codigo';";

} else if ($opcion == 'EDITAR') {

    $consulta = "UPDATE gastos SET tipo_gasto='$tipogasto', cantidad='$cant', fecha='$fecha', id_categoria = $categoria
    WHERE id_gasto = '$codigo';";

}

if (!$resultado = $mysqli->query($consulta)) {
    header('Location: error.php');
    exit();
}else {
    header('Location: acierto.php');
    exit();
}

?>