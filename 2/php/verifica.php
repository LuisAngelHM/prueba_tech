<?php 

$cadena = $_POST['palabra'];
$cadena = str_replace(" ", "", $cadena);
$cadena = strtolower($cadena);
$reverse_cadena =strrev($cadena);
if(strcmp($cadena, $reverse_cadena)==0){
    echo "Es un palindromo";
}
else{
    echo "No es un palindromo";
}
?>