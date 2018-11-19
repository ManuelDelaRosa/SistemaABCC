<!DOCTYPE html>
<html>
<head>
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
    <table class='table'>
    <thead>
      <tr>
        <th>num control</th>
        <th>Nombre</th>
        <th>Apellido paterno</th>
        <th>Apellido materno</th>
        <th>edad</th>
        <th>semeste</th>
        <th>carrera</th>
        <th></th>
      </tr>
    </thead>


	<?php 
    include("../script/servidor/conexion.php");
    $h = 'localhost';
    $u = 'root';
    $p = 'manuel';
    $bd = 'bd_escuela';

    $enlace = conexion($h, $u, $p ,$bd);

    $sql = "SELECT * FROM alumnos";

    $resultado = mysqli_query($enlace,$sql);

    //var_dump($resultado);

    if (mysqli_num_rows($resultado) > 0) {
        
        while ($fila = mysqli_fetch_array($resultado)) {
                  

            ?>
    <tbody>
      <tr>
        <td><?php echo $fila[0]?></td>
        <td><?php echo $fila[1]?></td>
        <td><?php echo $fila[2]?></td>
        <td><?php echo $fila[3]?></td>
        <td><?php echo $fila[4]?></td>
        <td><?php echo $fila[5]?></td>
        <td><?php echo $fila[6]?></td>
        <td><?php echo "<a href='prosesar_baja.php?id=$fila[0]'>ELIMINAR</a>"?></td>

      </tr>
      
    </tbody>
  <?php
                  
        }
    }else{
      echo "No hay registros";
    }
   ?>
    </table>

    <a href="javascript:history.back()"> Volver Atrás</a>
</body>
</html>