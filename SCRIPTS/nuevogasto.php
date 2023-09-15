<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="estiloLogin.css">
    <title>Insertar nuevo gasto</title>
</head>

<body>
<div class="contenedorlogo">
    <img src="MiLogo.png" alt="Logo" class="logo">
</div>
    <div class="contenedor">
        <h2>Insertar nuevo gasto</h2>
        <form id="form1" name="form1" method="post" action="nuevogasto2.php">
            <p>
                <label for="tipo_gasto">Tipo de gasto:</label>
                <input type="text" name="tipo_gasto" id="tipo_gasto" />
            </p>
            <p>
                <label for="cantidad">Cantidad:</label>
                <input type="text" name="cantidad" id="cantidad" />
            </p>
            <p>
                <label for="categoria">Categoría:</label>
                
                <select name="listado" id="listado">

                <?php
                session_start();

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
            </p>
            <p>
                <button type="submit">Añadir</button>
                <button type="reset">Restablecer</button>
            </p>
        </form>
    </div>
    <div class="botones">
        <a href="paginaprincipal.php" class="boton" >Volver a la página principal</a>
    </div>

</body>

</html>