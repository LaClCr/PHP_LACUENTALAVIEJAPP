<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="estiloLogin.css">
    <title>SELECCIÓN GASTOS</title>

</head>
<body>
<div class="contenedorlogo">
    <img src="MiLogo.png" alt="Logo" class="logo">
</div>
<div class="contenedor">
    <h2>Selecciona la categoría del gasto:</h2>
    <form id="form1" name="form1" method="post" action="mod_borrar_gastos2.php">
            <select name="listacat" id="listacat">

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
        <p>
            <button type="submit">Continuar</button>
        </p>
    </form>
</div> 
<div class="botones">
        <a href="fusion_categorias.php" class="boton" >Fusionar gastos a otra categoría</a>
    </div>
<div class="botones">
        <a href="paginaprincipal.php" class="boton" >Volver a la página principal</a>
    </div>
</body>
</html>

