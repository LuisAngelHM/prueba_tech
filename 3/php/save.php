<?php 
require("conexion.php");
$nombre = $_POST['nombre'];
$edad = (int)$_POST['edad'];
$apellido = $_POST['apellido'];

$conexion = conecta();
$insert=$conexion->query("INSERT INTO datos(nombre, apellido, edad) VALUES('$nombre','$apellido', '$edad')");

?>