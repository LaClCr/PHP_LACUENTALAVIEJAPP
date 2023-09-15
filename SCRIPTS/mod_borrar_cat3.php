<?php

mysqli_report(MYSQLI_REPORT_ERROR);

require('Uso_BD.php');

$codigo=$_REQUEST['codigo'];
$nom = $_REQUEST['nombre_categoria'];
$des=$_REQUEST['descripcion'];
$lim=$_REQUEST['limite_mensual'];

$opcion = $_REQUEST['opcion'];

if ($opcion == 'BORRAR') {

    $consulta = "DELETE FROM categorias_gastos WHERE id_categoria = '$codigo';";

} else if ($opcion == 'EDITAR') {

    $consulta = "UPDATE categorias_gastos SET nombre_categoria='$nom', descripcion='$des', limite_mensual='$lim'
    WHERE id_categoria = '$codigo';";

}


if (!$resultado = $mysqli->query($consulta)) {
    header('Location: errorborrado.php');
    exit();
}else {
    header('Location: acierto.php');
    exit();
}

?>