<?php
 $id = $_POST['id'];
 require("conexion.php");
 $conexion = conecta();
 $data=$conexion->query("SELECT * FROM datos WHERE id = $id");
 while ($fila = mysqli_fetch_assoc($data)) {
    echo json_encode($fila);
 }
?>