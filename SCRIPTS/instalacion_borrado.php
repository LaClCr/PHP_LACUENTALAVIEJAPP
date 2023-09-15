<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="estiloLogin.css">
    <title>Instalación base de datos</title>
</head>
<body>
<div class="contenedorlogo">
    <img src="MiLogo.png" alt="Logo" class="logo">
</div>
    <?php
    mysqli_report(MYSQLI_REPORT_ERROR);


    $servidor="localhost";
    $usuario="root";
    $clave="";

    @$mysqli = new mysqli($servidor,$usuario,$clave);
    if ($mysqli->connect_errno){
        header('Location: error.php');
        exit();
    }

    $consulta="USE seguimiento_gastos;";
    //Si la base de datos con el nombre "seguimiento_gastos" no existe, damos la opción de crearla de nuevo.

    $resultado = $mysqli->query($consulta);
    if(!$resultado){
    echo "<div class='contenedor'>
    <h2>Instalar nueva base de datos</h2>
    </div>
    <div class='botones'>
    <a href='Creacion_BD.php' class='boton' >Instalar nueva base de datos</a>
    </div>";

    }else{
        header('Location: paginaprincipal.php');
    }
    ?>
</body>
</html>
