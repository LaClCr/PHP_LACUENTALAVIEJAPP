<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="estiloLogin.css">
	<title>Iniciar sesión</title>
</head>
<body>
<div class="contenedorlogo">
    <img src="MiLogo.png" alt="Logo" class="logo">
</div>
	<div class="contenedor">
		<h2>Iniciar sesión</h2>
		<form id="form1" name="form1" method="post" action="crearsesion.php">
			<label for="usuario">Usuario:</label>
			<input type="text" id="user" name="user" value="<?php 
    		if(isset($_COOKIE['recordar']))
        	echo $_COOKIE['recordar']; ?>"/>
			<label for="contrasena">Contraseña:</label>
			<input type="password" id="clave" name="clave">
			<label for="recordar">Recordar usuario</label>
			<input type="checkbox" id="recordar" name="recordar">
			<button type="submit">Ingresar</button>
			<button type="reset">Restablecer</button>
		</form>
	</div>
</body>
</html>
