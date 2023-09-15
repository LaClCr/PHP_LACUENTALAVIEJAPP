<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="estiloLogin.css">
    <title>FUSIÓN DE GASTOS</title>

</head>
<body>
<div class="contenedorlogo">
    <img src="MiLogo.png" alt="Logo" class="logo">
</div>
<div class="contenedor">
    <form id="form1" name="form1" method="post" action="fusion_categorias2.php">
    <h3>Selecciona la categoría de los gastos que quieres mover:</h2>
            <select name="categoriavieja" id="categoriavieja">

                <?php

                mysqli_report(MYSQLI_REPORT_ERROR);
                require ("Uso_BD.php");
                $consulta = "SELECT * FROM categorias_gastos;";

                $resultado = $mysqli->query($consulta);
                if (!$resultado) {
                    header('Location: error.php');
                    exit();
                }

                while ($fila = $resultado->fetch_assoc()) {
                    echo "<option value='" . $fila["id_categoria"] . "'>" . $fila["nombre_categoria"] . "</option>";
                }
                ?>

            </select>
        <br>
        <h3>Selecciona la categoría a la que los quieres quieres mover:</h2>
            <select name="categorianueva" id="categorianueva">

                <?php
                $consulta2 = "SELECT * FROM categorias_gastos;";

                $resultado2 = $mysqli->query($consulta2);
                if (!$resultado2) {
                    header('Location: error.php');
                    exit();
                }

                while ($fila2 = $resultado2->fetch_assoc()) {
                    echo "<option value='" . $fila2["id_categoria"] . "'>" . $fila2["nombre_categoria"] . "</option>";
                }
                ?>

            </select>
        <br>
        <p>
            Si hace click en "Aceptar", todos los registros de gastos asociados a la primera categoría, se asociarán a la segunda categoría.
        </p>
        <p>
            <button type="submit">Aceptar</button>
        </p>
    </form>
</div> 
<div class="botones">
        <a href="paginaprincipal.php" class="boton" >Volver a la página principal</a>
    </div>
</body>
</html>