<?php
mysqli_report(MYSQLI_REPORT_ERROR);

require('Uso_BD.php');

$consulta="INSERT INTO categorias_gastos (nombre_categoria, descripcion, limite_mensual) VALUES
('Comida', 'Gastos relacionados con la alimentación', 500.00),
('Ocio', 'Gastos relacionados con el entretenimiento', 100.00),
('Hogar', 'Gastos relacionados con el hogar', 200.00),
('Viajes', 'Gastos relacionados con  viajes', 500.00),
('Otros', 'Gastos no clasificados', 100.00);";

$resultado = $mysqli->query($consulta);
if(!$resultado){
    echo "Lo sentimos. App falla.<br>";
    echo "Error en $consulta <br>";
    echo "Num.error: ".$mysqli->errno."<br>";
    exit;
}else {
    echo "Se ha grabado el registro.";
}

$consulta="INSERT INTO gastos (tipo_gasto, cantidad, fecha, id_categoria) VALUES
('Supermercado', 80.00, '2023-04-20', 1),
('Supermercado', 80.00, '2023-05-01', 1),
('Cine', 15.00, '2023-04-20', 2),
('Electrodomésticos', 150.00, '2023-04-20', 3),
('Billete de avión', 300.00, '2023-04-20', 4),
('Regalo para amigo', 25.00, '2023-04-20', 5),
('Comida rápida', 15.50, '2023-03-01', 1),
('Comida rápida', 15.50, '2023-05-01', 1),
('Cena en restaurante', 80.00, '2023-03-10', 2),
('Billetes de tren', 60.00, '2023-03-20', 4),
('Compra en supermercado', 35.80, '2023-02-05', 1),
('Entrada al cine', 10.50, '2023-02-15', 2),
('Gasolina', 45.00, '2023-02-25', 5),
('Gasolina', 45.00, '2023-05-01', 5),
('Comida en restaurante', 60.00, '2023-01-05', 1),
('Libro', 20.00, '2023-01-15', 5),
('Alquiler de bicicletas', 25.00, '2023-01-25', 2),
('Restaurante', 35.00, '2023-05-01', 1),
('Cine', 10.50, '2023-05-01', 2),
('Luz', 60.00, '2023-05-01', 3),
('Gasolina', 40.00, '2023-05-01', 4),
('Ropa', 200.00, '2023-05-01', 5),
('Comida', 28.00, '2023-05-01', 1),
('Cerveza', 15.00, '2023-05-01', 2),
('Mantenimiento', 100.00, '2023-05-01', 3),
('Hoteles', 200.00, '2023-05-01', 4),
('Regalos', 50.00, '2023-05-01', 5);";

$resultado = $mysqli->query($consulta);
if(!$resultado){
    echo "Lo sentimos. App falla.<br>";
    echo "Error en $consulta <br>";
    echo "Num.error: ".$mysqli->errno."<br>";
    exit;
}else {
    echo "Se ha grabado el registro.";
}



$consulta="INSERT INTO historico_gastos (tipo_gasto, cantidad, fecha, id_categoria) VALUES
('Restaurante', 80.00, '2022-03-20', 1),
('Cócteles', 15.00, '2022-03-20', 2),
('Luz', 150.00, '2022-03-20', 3),
('Alquiler bnb', 300.00, '2022-03-20', 4),
('Capricho', 25.00, '2022-03-20', 5);";


$resultado = $mysqli->query($consulta);
if(!$resultado){
    echo "Lo sentimos. App falla.<br>";
    echo "Error en $consulta <br>";
    echo "Num.error: ".$mysqli->errno."<br>";
    exit;
}else {
    echo "Se ha grabado el registro.";
}



?>