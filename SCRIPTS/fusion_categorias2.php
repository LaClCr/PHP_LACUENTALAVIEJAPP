<?php
mysqli_report(MYSQLI_REPORT_ERROR);
require('Uso_BD.php');

$categoriaVieja=$_REQUEST['categoriavieja'];
$categoriaNueva=$_REQUEST['categorianueva'];

$consulta = "UPDATE gastos
SET id_categoria = $categoriaNueva
WHERE id_categoria = $categoriaVieja;";

if (!$resultado = $mysqli->query($consulta)) {
    header('Location: error.php');
    exit();
}

$consulta2 = "UPDATE historico_gastos
SET id_categoria = $categoriaNueva
WHERE id_categoria = $categoriaVieja;";

if (!$resultado2 = $mysqli->query($consulta2)) {
    header('Location: error.php');
    exit();
}else {
    header('Location: acierto.php');
    exit();
}

?>