<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="estiloLogin.css">
    <title>Insertar nueva categoría</title>
</head>

<body>
<div class="contenedorlogo">
    <img src="MiLogo.png" alt="Logo" class="logo">
</div>
    <div class="contenedor">
        <h2>Insertar nueva categoría</h2>
        <form id="form1" name="form1" method="post" action="nuevacategoria2.php">
            <p>
                <label for="nombre_categoria">Nombre de categoría:</label>
                <input type="text" name="nombre_categoria" id="nombre_categoria" />
            </p>
            <p>
                <label for="descripcion">Descripción:</label>
                <input type="text" name="descripcion" id="descripcion" />
            </p>
            <p>
                <label for="limite_mensual">Límite mensual:</label>
                <input type="text" name="limite_mensual" id="limite_mensual" />
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