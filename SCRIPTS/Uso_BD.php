<?php

session_start();
mysqli_report(MYSQLI_REPORT_ERROR);

$servidor="localhost";
$usuario=$_SESSION['usuario'];
$clave=$_SESSION['clave'];
$bd = "seguimiento_gastos";


if(strlen($usuario)>0 && strlen($bd)>0)
{
    @$mysqli = new mysqli($servidor,$usuario,$clave);
    if ($mysqli->connect_errno){
        header('Location: error.php');
        exit();
    }

    if(!$mysqli->select_db($bd)) 
    {
        header('Location: error.php');
        exit();
    }

}else{
    header('Location: error.php');
    exit();
}

?>