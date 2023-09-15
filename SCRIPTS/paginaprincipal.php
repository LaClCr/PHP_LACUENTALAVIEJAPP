<!DOCTYPE html>
<html>
<head>
    <title>Vista general</title>
    <link rel="stylesheet" type="text/css" href="estiloPPal.css">
</head>
<body>
  <div class="barra_sup">
    <a href="cerrarsesion.php" class="cerrarsesion">Cerrar sesión</a>  
    <a href="seleccionarmes.php" class = "botonestadistica">Ver estadísticas</a>
    <a href="vistagastos.php" class = "botonestadistica">Ver todos los gastos</a>
    <a href="confirmar.php" class = "botonestadistica">Borrar datos</a>
  </div>
  <div class="contenedor">
    <img src="MiLogo.png" alt="Logo">
  <h1>VISTA GENERAL DE MIS GASTOS MENSUALES</h1>
  <?php

$mes_actual = date('m');
$anno_actual = date('Y');
$nombre_mes_actual = date('m/Y');

echo "<h1>$nombre_mes_actual</h1>";
echo "Aquí tienes una vista general de tus gastos de este mes ordenada por categorías. Teniendo en cuenta los límites mensuales que has asignado, aquí puedes ver el porcentaje gastado en cada categoría.";

?>

    <table class="categories-table">
      <thead>
        <tr>
          <th>Categoría</th>
          <th>Porcentaje</th>
          <th>Barra de progreso</th>
        </tr>
      </thead>
      <tbody>
        <?php
        require('Uso_BD.php');
        $consulta = "SELECT c.nombre_categoria, SUM(g.cantidad) as total_gastos 
        FROM categorias_gastos c 
        LEFT JOIN gastos g ON c.id_categoria = g.id_categoria 
        WHERE MONTH(g.fecha) = $mes_actual 
        GROUP BY c.id_categoria";

        $resultado = $mysqli->query($consulta);

        while ($fila = mysqli_fetch_assoc($resultado)) {

          $nombre_categoria = $fila['nombre_categoria'];
          $total_gastos = $fila['total_gastos'];

          $consulta2 = "SELECT limite_mensual FROM categorias_gastos WHERE nombre_categoria = '$nombre_categoria'";
          $resultado2 = $mysqli->query($consulta2);
          $fila2 = mysqli_fetch_assoc($resultado2);
          $limite_mensual = $fila2['limite_mensual'];

          // Calculamos el porcentaje correspondiente a la categoría actual
          $porcentaje = round(($total_gastos / $limite_mensual) * 100);

          // Generamos la fila correspondiente en la tabla
          echo "<tr class='category'>";
          echo "<td class='category-name'>$nombre_categoria</td>";
          echo "<td class='category-percentage'>$porcentaje%</td>";
          echo "<td class='category-bar'>";
          echo "<div class='category-bar-fill' style='width: $porcentaje%;'></div>";
          echo "</td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
  <div class="botones">
    <a href="nuevogasto.php" class="boton">Añadir gasto</a>
    <a href="mod_borrar_gastos.php" class="boton">Gestionar gastos</a>
    <a href="nuevacategoria.php" class="boton">Añadir categoría</a>
    <a href="mod_borrar_categorias.php" class="boton">Gestionar categorías</a>
  </div>  
</body>
</html>

