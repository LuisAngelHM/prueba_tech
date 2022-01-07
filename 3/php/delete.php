<?php
require("conexion.php");
$id = $_POST['id'];
$conexion = conecta();
$insert=$conexion->query("DELETE FROM datos where id=$id");
?>