<?php

function conecta(){
    $host="localhost";
    $user="root";
    $pass="toor1";
    $db = "agenda";

    $conex = mysqli_connect($host,$user,$pass,$db);
    if($conex){
        return $conex;
    }else{
        echo mysqli_connect_errno();
    }
}
?>