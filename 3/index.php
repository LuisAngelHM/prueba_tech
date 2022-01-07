<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>CRUD</title>
</head>
<body>
  <div class="container mt-3">
    <h3>Agenda</h3>
    <form onsubmit="save(event);" method="POST">
        <div class="from-group">
            <label for="name">Nombre:</label>
            <input type="text" id="nombre" name="nombre" class="form-control">
        </div>
        <div class="from-group">
            <label for="name">Apellido:</label>
            <input type="text" id="apellido" name="apellido"class="form-control">
        </div>
        <div class="from-group">
            <label for="name">Edad:</label>
            <input type="text" id="edad" name="edad" class="form-control">
        </div>

        <input type="submit" class="btn btn-primary mt-2 col-12" value="Guardar">
    </form>
    <p>Recargar la página para actualizar la tabla</p>
    <table class="table mt-5">
    <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Edad</th>
      <th scope="col">Apellido</th>
      <th scope="col">Fecha de registro</th>
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>
    </tr>
  </thead>
  <tbody>
      
  <?php
    require("php/conexion.php");
    $conexion = conecta();
    $data=$conexion->query("SELECT * FROM datos");
    while ($fila = mysqli_fetch_assoc($data)) {
  ?>
    <tr>
      <th scope="row"><?php echo $fila['id']?></th>
      <td><?php echo $fila['nombre']?></td>
      <td><?php echo $fila['edad']?></td>
      <td><?php echo $fila['apellido']?></td>
      <td><?php echo $fila['fecha']?></td>
      <td><input type="button" onclick="editar(<?php echo $fila['id']?>)" class="btn btn-warning" value="Editar"></td>
      <td><input type="button" onclick="eliminar(<?php echo $fila['id']?>)"class="btn btn-danger" value="Eliminar"></td>
    </tr>
    <?php
    }
    ?>
  </tbody>
  </table>
  
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> 
<script>
    var id_general = "";
    function editar(id){
        $.ajax({
            url:"php/getdata.php",
            method:"POST",
            dataType: "json",
            data:{"id":id}
        }).done(function(data){
            console.log(data.nombre)
            document.getElementById("nombre").value=data.nombre;
            document.getElementById("apellido").value=data.apellido;
            document.getElementById("edad").value=data.edad;
            id_general = id;

        });
    }

    function eliminar(id){
        $.ajax({
            url:"php/delete.php",
            method:"POST",
            data:{"id":id}
             }).done(function(){
            alert("Se eliminaron los datos");
            window.location.href="index.php"
        });
    }

    function save(){
        var nombre = document.getElementById("nombre").value;
        var apellido = document.getElementById("apellido").value;
        var edad = document.getElementById("edad").value;
        if(id_general!=""){
            //editar
    
            $.ajax({
            url:"php/update.php",
            method:"POST",
            data:{"id":id_general, "nombre":nombre, "apellido":apellido, "edad": edad}
             }).done(function(){
                alert("Se editaron los datos");
        });
        }else{
            $.ajax({
            url:"php/save.php",
            method:"POST",
            data:{"nombre":nombre, "apellido":apellido, "edad": edad}
             }).done(function(){
                alert("Se guardaron los datos");
            });
           
        }
        window.location.href="index.php";
    }
</script>

</body>
</html>