<?php

session_start();
$_SESSION['usuario']=$_REQUEST['user'];
$_SESSION['clave']=$_REQUEST['clave'];

if(isset($_REQUEST["recordar"]))
{
    setcookie("recordar",$_REQUEST['user'],time()+60*60*24*365,"/");
}else
{
    setcookie("recordar"," ",time()-1000,"/");
}

header('Location: instalacion_borrado.php');

?>