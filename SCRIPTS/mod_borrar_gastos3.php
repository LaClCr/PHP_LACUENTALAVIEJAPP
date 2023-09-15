<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>GESTIÓN DE GASTOS</title>
  <link rel="stylesheet" type="text/css" href="estiloLogin.css">
</head>
<body>
<div class="contenedorlogo">
    <img src="MiLogo.png" alt="Logo" class="logo">
</div>
  <div class="contenedor">
    <form id="form1" name="form1" method="post" action="mod_borrar_gastos4.php">

    <h1><?Php echo ($_REQUEST['radio']); ?> GASTO</h1>
    <p>
    <label for="oper">Tipo de operación:</label>
    <input type="text" name="opcion" class="operacion" id="opcion" readonly value="<?Php echo ($_REQUEST['radio']); ?>" />
    <br>
    <label for="codigo">Código:</label>
    <input type="text" name="codigo" id="codigo" readonly value="<?Php echo ($_REQUEST['listagas']); ?>" />
    </p>
    <br>
    <?php
    mysqli_report(MYSQLI_REPORT_ERROR);
    require("Uso_BD.php");

    $codigo = $_REQUEST['listagas'];
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

    $consulta = "SELECT * FROM gastos WHERE id_gasto='$codigo';";

    if (!$resultado = $mysqli->query($consulta)) {
        header('Location: error.php');
        exit();
    }
    while ($fila = $resultado->fetch_assoc()) {

    echo "<p><label for='tipo_gasto'>Tipo de gasto:</label>
    <input type='text' name='tipo_gasto' id='tipo_gasto' value='" . $fila['tipo_gasto'] . "' ".$r."/>  <br>";
    echo "<label for='cantidad'>Cantidad:</label>
    <input type='text' name='cantidad' id='cantidad' value='" . $fila['cantidad'] . "'".$r." />  <br>";
    echo "<label for='fecha'>Fecha:</label>
    <input type='text' name='fecha' id='fecha' value='" . $fila['fecha'] . "'".$r."/>  </p><br>";
        $categoriaGasto = $fila['id_categoria'];
    }

    if($opcion == 'EDITAR'){
    ?>
    <p><label for='listacat'>Cambiar categoría:</label>
    <select name="listacat" id="listacat">

        <?php
        $consulta = "SELECT * FROM categorias_gastos;";
        
        $resultado = $mysqli->query($consulta);
        if (!$resultado) {
            header('Location: error.php');
            exit();
        }

        while ($fila = $resultado->fetch_assoc()) {

            if($fila['id_categoria'] == $categoriaGasto){
                $seleccionado = 'selected';
            }else{
                $seleccionado = '';
            }
            echo "<option value='" . $fila["id_categoria"] . "'$seleccionado>" . $fila["nombre_categoria"] . "</option>";
        }
    ?>
    </select>
    <br>
    <?php
    }else {
        $consulta = "SELECT nombre_categoria FROM categorias_gastos where id_categoria = $categoriaGasto;";
        
        $resultado = $mysqli->query($consulta);
        if (!$resultado) {
            header('Location: error.php');
            exit();
        }

        while ($fila = $resultado->fetch_assoc()) {
            $nombreCat = $fila['nombre_categoria'];
        }
    echo "<p><label for='id_categoria'>Categoría:</label>
    <input type='text' name='id_categoria' id='id_categoria' value='" . $nombreCat . "'".$r."/>  </p>";
    }
    ?>

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