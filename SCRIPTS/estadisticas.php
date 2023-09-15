<?php
mysqli_report(MYSQLI_REPORT_ERROR);
require('Uso_BD.php');

$mesSeleccionado=$_REQUEST['mes'];

$consulta="SELECT c.nombre_categoria, SUM(g.cantidad) AS total_gastos
FROM categorias_gastos c
INNER JOIN gastos g ON c.id_categoria = g.id_categoria
WHERE MONTH(g.fecha) = '$mesSeleccionado' AND YEAR(g.fecha) = YEAR(CURRENT_DATE())
GROUP BY c.id_categoria
ORDER BY total_gastos DESC
LIMIT 1
";

$resultado = $mysqli->query($consulta);
if(!$resultado){
    header('Location: error.php');
    exit();
}else {
    while ($fila = mysqli_fetch_assoc($resultado)) {

        $cat_mayor = $fila['nombre_categoria'];
        $total_gastosMayor = $fila['total_gastos'];
    }
}


$consulta2="SELECT c.nombre_categoria, SUM(g.cantidad) AS total_gastos
FROM categorias_gastos c
INNER JOIN gastos g ON c.id_categoria = g.id_categoria
WHERE MONTH(g.fecha) = '$mesSeleccionado' AND YEAR(g.fecha) = YEAR(CURRENT_DATE())
GROUP BY c.id_categoria
ORDER BY total_gastos ASC
LIMIT 1
";

$resultado2 = $mysqli->query($consulta2);
if(!$resultado2){
    header('Location: error.php');
    exit();
}else {
    while ($fila2 = mysqli_fetch_assoc($resultado2)) {

        $cat_menor = $fila2['nombre_categoria'];
        $total_gastosMenor = $fila2['total_gastos'];
    }
}


$consulta3="SELECT tipo_gasto, cantidad
FROM gastos
WHERE MONTH(fecha) = '$mesSeleccionado' AND YEAR(fecha) = YEAR(CURRENT_DATE())
ORDER BY cantidad DESC
LIMIT 1
";

$resultado3 = $mysqli->query($consulta3);
if(!$resultado3){
    header('Location: error.php');
    exit();
}else {
    while ($fila3 = mysqli_fetch_assoc($resultado3)) {

        $gastoMayor = $fila3['tipo_gasto'];
        $cantGastoMayor = $fila3['cantidad'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticas</title>
    <link rel="stylesheet" type="text/css" href="estiloPPal.css">
</head>
<body>
    <div class="barra_sup">
    <a href="cerrarsesion.php" class="cerrarsesion">Cerrar sesión</a>  
    <a href="paginaprincipal.php" class="botonestadistica">Volver a la página principal</a>
    <a href="seleccionarmes.php" class="botonestadistica">Seleccionar otro mes</a>
  </div>
    <div class = "contenedor">
    <img src="MiLogo.png" alt="Logo">
    <h1>MIS ESTADÍSTICAS MENSUALES</h1>
    <?php
        $mes_actual = date('m');
        $anno_actual = date('Y');
        $nombre_mes_actual = date('m/Y');

        echo "<h2>$mesSeleccionado</h2>";
    ?>
    <br><br>
    <p>En esta tabla puedes ver en qué categorías has gastado más dinero este mes. También puedes ver el total de dinero que llevas gastado.</p>
    <table class="categories-table">
      <thead>
        <tr>
          <th>Categoría</th>
          <th>Porcentaje</th>
          <th>Barra de progreso</th>
          <th>Cantidad</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $con="SELECT cg.nombre_categoria, SUM(g.cantidad) as total
        FROM categorias_gastos cg
        inner JOIN gastos g ON cg.id_categoria = g.id_categoria
        WHERE MONTH(g.fecha) = '$mesSeleccionado'
        GROUP BY cg.id_categoria;";
        
        $cantidadTotalMes= 0;
        $categorias= array();
        $cantidades=array();
        $porcentaje=array();
        
        
        $resul = $mysqli->query($con);
        if(!$resul){
            header('Location: error.php');
            exit();
        }else {
            while ($fil = mysqli_fetch_assoc($resul)) {
        
                $cantidadTotalMes += $fil['total'];
                array_push($categorias,$fil['nombre_categoria']);
                array_push($cantidades,$fil['total']);
            }
        
            $count = count($categorias);
            for ($i = 0; $i < $count; $i++) {
                $porcentaje[$i] = round(($cantidades[$i] * 100) / $cantidadTotalMes);

                echo "<tr class='category'>";
                echo "<td class='category-name'>$categorias[$i]</td>";
                echo "<td class='category-percentage'> $porcentaje[$i]%</td>";
                echo "<td class='category-bar'>";
                echo "<div class='category-bar-fill' style='width:  $porcentaje[$i]%;'></div>";
                echo "</td>";
                echo "<td class='category-percentage'> $cantidades[$i] €</td>";
                echo "</tr>";
            }

            echo "<tr class='category'>";
            echo "<td class='category-name'>TOTAL</td>";
            echo "<td class='category-percentage'> 100%</td>";
            echo "<td class='category-bar'>";
            echo "<div class='category-bar-fill' style='width:  100%;'></div>";
            echo "</td>";
            echo "<td class='category-percentage'> $cantidadTotalMes €</td>";
            echo "</tr>";
        
        }
        
        ?>
      </tbody>
    </table>
    <br><br>
    <table class="tabla-estadisticas">
        <tr>
            <th class="category-name">Categoría en la que has gastado más dinero:</th>
            <td class="category"><?php echo "$cat_mayor" ?></td>
            <td class="category-percentage"><?php echo $total_gastosMayor." €" ?></td>
        </tr>
        <tr>
            <th class="category-name">Categoría en la que has gastado menos dinero:</th>
            <td class="category"><?php echo "$cat_menor" ?></td>
            <td class="category-percentage"><?php echo $total_gastosMenor." €" ?></td>
        </tr>
        <tr>
            <th class="category-name">Mayor gasto del mes:</th>
            <td class="category"><?php echo "$gastoMayor" ?></td>
            <td class="category-percentage"><?php echo $cantGastoMayor." €" ?></td>
        </tr>
    </table>
    <br><br>
        <?php
    $sql = "SELECT cg.nombre_categoria, cg.limite_mensual, SUM(g.cantidad) as gastos_totales
    FROM categorias_gastos cg
    INNER JOIN gastos g ON cg.id_categoria = g.id_categoria
    WHERE MONTH(g.fecha) = '$mesSeleccionado'
    GROUP BY cg.id_categoria
    HAVING SUM(g.cantidad) > cg.limite_mensual";

    $resultado4 = $mysqli->query($sql);

    if ($resultado4->num_rows > 0) {
        echo "Categorías en las que has superado el límite mensual:";
        echo "<table class='tabla-estadisticas'>";
        echo "<tr><th>Categoría</th><th>Límite mensual</th><th>Gastos totales</th></tr>";
        while($fila4 = $resultado4->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $fila4["nombre_categoria"] . "</td>";
            echo "<td>" . $fila4["limite_mensual"] . "</td>";
            echo "<td>" . $fila4["gastos_totales"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No se han encontrado categorías en las que se haya superado el límite mensual.";
    }
    ?>
    </div>
</body>
</html> 