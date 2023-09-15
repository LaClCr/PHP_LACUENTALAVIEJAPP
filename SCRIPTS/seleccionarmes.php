<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="estiloLogin.css">
	<title>Seleccionar mes</title>
</head>
<body>
<div class="contenedorlogo">
    <img src="MiLogo.png" alt="Logo" class="logo">
</div>
	<div class="contenedor">
		<h2>Selecciona un mes para ver las estadísticas</h2>
		<form id="form1" name="form1" method="post" action="estadisticas.php">
        <select name="mes" id="mes">
			<?php
				for($i=0; $i<4; $i++){
					$fecha = strtotime("-$i month");
					$fecha_format = date("m/Y", $fecha);
					echo "<option value='$fecha_format'>$fecha_format</option>";
				}
			?>
		</select>
        <button class="boton" type="submit">Ver estadísticas</button>
		</form>
	</div>
</body>
</html>