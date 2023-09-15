<!DOCTYPE html>
<html>
<head>
    <title>Vista general</title>
    <link rel="stylesheet" type="text/css" href="estiloPPal.css">
</head>
<body>
  <div class="barra_sup">
    <a href="cerrarsesion.php" class="cerrarsesion">Cerrar sesión</a>  
    <a href="paginaprincipal.php" class = "botonestadistica">Volver a la página principal</a>
  </div>
  <div class="contenedor">
    <img src="MiLogo.png" alt="Logo">
    <h1>VISTA DE TODOS LOS GASTOS</h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
    <div class="search-container">
      <input type="text" name="busqueda" placeholder="Buscar...">
      <button type="submit" class="boton">Buscar</button>
    </div>

    </form>

    <table class="categories-table">
      <thead>
        <tr>
          <th>Gasto</th>
          <th>Cantidad</th>
          <th>Fecha</th>
          <th>Categoría</th>
        </tr>
      </thead>
      <tbody>

      <?php
      mysqli_report(MYSQLI_REPORT_ERROR);
      require('Uso_BD.php');

      $clausula_where = '';
      $busqueda = '';
      
      if (isset($_GET['busqueda'])) {
        $busqueda = $_GET['busqueda'];
        $clausula_where = "WHERE g.tipo_gasto LIKE '%$busqueda%' OR c.nombre_categoria LIKE '%$busqueda%'";
      }

      $consulta="SELECT g.tipo_gasto as 'Gasto', g.cantidad as 'Cantidad', g.fecha as 'Fecha', c.nombre_categoria as 'Categoria'
      FROM categorias_gastos c
      INNER JOIN gastos g ON c.id_categoria = g.id_categoria
      $clausula_where
      ORDER BY g.fecha DESC;";

      $resultado = $mysqli->query($consulta);
      if(!$resultado){
          header('Location: error.php');
          exit();
      }else {
          while ($fila = mysqli_fetch_assoc($resultado)) {

              $gasto= $fila['Gasto'];
              $cantidad= $fila['Cantidad'];
              $fecha= $fila['Fecha'];
              $cat= $fila['Categoria'];

              echo "<tr class='category'>";
                echo "<td class='category-name'>$gasto</td>";
                echo "<td class='category-name'>$cantidad €</td>";
                echo "<td class='category-name'>$fecha</td>";
                echo "<td class='category-name'>$cat</td>";
              echo "</tr>";
          }
      }
      ?>

      </tbody>
    </table>
  </div>
</body>
</html>