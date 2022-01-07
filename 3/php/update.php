<?php 
require("conexion.php");
$nombre = $_POST['nombre'];
$edad = (int)$_POST['edad'];
$apellido = $_POST['apellido'];
$id = $_POST['id'];
$conexion = conecta();
$insert=$conexion->query("UPDATE datos SET nombre='$nombre', apellido='$apellido', edad='$edad' WHERE id=$id");
if($insert){
    echo "se edito";
}else{
    echo $conexion->error;
}
?>