<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="estiloLogin.css">
	<title>Error</title>
</head>
<body>
<div class="contenedorlogo">
    <img src="MiLogo.png" alt="Logo" class="logo">
</div>
	<div class="contenedor">
		<h2>Algo ha ido mal.</h2>
        <p>Si ha tratado de eliminar una categoría: No se pueden eliminar categorías que tengan gastos asociados.</p>
        <p>Puede cambiar de categoría los gastos antes de tratar de eliminarla.</p>
		<form id="form1" name="form1" method="post" action="cerrarsesion.php">
			<button type="submit">Volver al inicio de sesión</button>
		</form>
	</div>
</body>
</html>