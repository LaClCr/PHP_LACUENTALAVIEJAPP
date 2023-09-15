<?php

mysqli_report(MYSQLI_REPORT_ERROR);

require('Uso_BD.php');

$consulta="";


$consulta="CREATE TABLE IF NOT EXISTS categorias_gastos ";
$consulta.="(id_categoria INTEGER PRIMARY KEY AUTO_INCREMENT,";
$consulta.="nombre_categoria VARCHAR(50) NOT NULL, ";
$consulta.="descripcion VARCHAR(200), ";
$consulta.="limite_mensual DECIMAL(10,2) NOT NULL); ";


$resultado = $mysqli->query($consulta);
if(!$resultado){
    echo "Lo sentimos. App falla.<br>";
    echo "Error en $consulta <br>";
    echo "Num.error: ".$mysqli->errno."<br>";
    exit;
}

$consulta="";

$consulta="CREATE TABLE IF NOT EXISTS gastos  ";
$consulta.="(id_gasto INTEGER PRIMARY KEY AUTO_INCREMENT,";
$consulta.="tipo_gasto VARCHAR(50) NOT NULL, ";
$consulta.="cantidad DECIMAL(10,2) NOT NULL, ";
$consulta.="fecha DATE NOT NULL, ";
$consulta.="id_categoria INTEGER NOT NULL, ";
$consulta.="FOREIGN KEY (id_categoria) REFERENCES categorias_gastos (id_categoria));";

$resultado = $mysqli->query($consulta);
if(!$resultado){
    echo "Lo sentimos. App falla.<br>";
    echo "Error en $consulta <br>";
    echo "Num.error: ".$mysqli->errno."<br>";
    exit;
}

$consulta="";

$consulta="CREATE TABLE IF NOT EXISTS historico_gastos  ";
$consulta.="(id_historico INTEGER PRIMARY KEY AUTO_INCREMENT,";
$consulta.="tipo_gasto VARCHAR(50) NOT NULL, ";
$consulta.="cantidad DECIMAL(10,2) NOT NULL, ";
$consulta.="fecha DATE NOT NULL, ";
$consulta.="id_categoria INTEGER NOT NULL, ";
$consulta.="FOREIGN KEY (id_categoria) REFERENCES categorias_gastos (id_categoria));";

$resultado = $mysqli->query($consulta);
if(!$resultado){
    echo "Lo sentimos. App falla.<br>";
    echo "Error en $consulta <br>";
    echo "Num.error: ".$mysqli->errno."<br>";
    exit;
}

$consulta="";

$consulta="CREATE TRIGGER `gastos_after_insert` AFTER INSERT ON `gastos` FOR EACH ROW BEGIN
    DECLARE fecha_actual DATE;
    DECLARE anio_anterior INT;
    SET fecha_actual = NOW();
    SET anio_anterior = YEAR(fecha_actual) - 1;
    
    IF MONTH(fecha_actual) = 1 AND DAY(fecha_actual) >= 1 THEN
        INSERT INTO historico_gastos
        SELECT tipo_gasto, cantidad, fecha, id_categoria
        FROM gastos
        WHERE YEAR(fecha) = anio_anterior;
    END IF;
END";

$resultado = $mysqli->query($consulta);
if(!$resultado){
    echo "Lo sentimos. App falla.<br>";
    echo "Error en $consulta <br>";
    echo "Num.error: ".$mysqli->errno."<br>";
    exit;
}

?>