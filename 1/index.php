<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Lectura</title>
</head>
<body>
  <div class="container-fluid mt-3 mr-3">
  Leer el archivo XML y Obtener los atributos:
  <br>
  <ol>
      <li>del nodo Emisor: Nombre, RFC</li>
      <li>del nodo TimbreFiscalDigital: UUID, fecha de timbrado</li>
  </ol>     
  <?php
    $xml_file = new XMLReader();
    $xml_file->open("TSL171218FP7_P6902_20190920.xml");
    while($xml_file->read()){
        if ($xml_file->name=="cfdi:Emisor"){
            echo "Nombre del emisor: ".$xml_file->getAttribute("Nombre")."<br>";
            echo "RFC del emisor: ".$xml_file->getAttribute("Rfc")."<br>";
        }
        if ($xml_file->name=="cfdi:Receptor"){
            echo "Nombre del receptor: ".$xml_file->getAttribute("Nombre")."<br>";
            echo "RFC del receptor: ".$xml_file->getAttribute("Rfc")."<br>";
        }
    }
  ?>
  </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> 
</body>
</html>