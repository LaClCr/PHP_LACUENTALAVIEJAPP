<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>GESTIÓN DE CATEGORÍAS</title>
  <link rel="stylesheet" type="text/css" href="estiloLogin.css">
</head>

<body>
<div class="contenedorlogo">
    <img src="MiLogo.png" alt="Logo" class="logo">
</div>
  <div class="contenedor">
    <form id="form1" name="form1" method="post" action="mod_borrar_cat3.php">

    <h1><?Php echo ($_REQUEST['radio']); ?> CATEGORÍA</h1>
    <p>
    <label for="oper">Tipo de operación:</label>
    <input type="text" name="opcion" id="opcion" class="operacion" readonly value="<?Php echo ($_REQUEST['radio']); ?>" />
    <label for="codigo">Código:</label>
    <input type="text" name="codigo" id="codigo" readonly value="<?Php echo ($_REQUEST['listacat']); ?>" />
    </p>
    <?php
    mysqli_report(MYSQLI_REPORT_ERROR);
    require("Uso_BD.php");

    $codigo = $_REQUEST['listacat'];
    $opcion = $_REQUEST['radio'];

    if($opcion == 'BORRAR'){
        $r = "readonly";
        $boton="Borrar";
        $botonRestablecer="";

    }else if ($opcion == 'EDITAR'){
        $r = "";
        $boton="Editar";
        $botonRestablecer="<button type='reset'>Restablecer</button>";

    }

    $consulta = "SELECT * FROM categorias_gastos WHERE id_categoria='$codigo';";

    if (!$resultado = $mysqli->query($consulta)) {
        header('Location: error.php');
        exit();
    }
    while ($fila = $resultado->fetch_assoc()) {

    echo "<p><label for='nombre_categoria'>Nombre de la categoría:</label>
    <input type='text' name='nombre_categoria' id='nombre_categoria' value='" . $fila['nombre_categoria'] . "' ".$r."/>  </p>";
    echo "<p><label for='descripcion'>Descripción:</label>
    <input type='text' name='descripcion' id='descripcion' value='" . $fila['descripcion'] . "'".$r." />  </p>";
    echo "<p><label for='limite_mensual'>Límite mensual:</label>
    <input type='text' name='limite_mensual' id='limite_mensual' value='" . $fila['limite_mensual'] . "'".$r."/>  </p>";

    }
    ?>
    <br>
    <p>
                <button type="submit"><?php echo $boton ?></button>
                <?php echo $botonRestablecer ?>
    </p>
    </form>
  </div>
  <div class="botones">
        <a href="paginaprincipal.php" class="boton" >Volver a la página principal</a>
  </div>
</body>

</html>