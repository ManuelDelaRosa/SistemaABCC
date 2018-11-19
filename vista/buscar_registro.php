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
  <div>
    <form method="POST" action="buscar_registro.php">
      <div class="form- group">
        <div class="form- group">
          <label> <input type="radio" name="buscar" value="numControl"> Numero de control</label>
          <input type="text" class="form-control" placeholder="Ej.1507131" name="caja_num_control">
        </div>
        <div class="form- group">
          <label> <input type="radio" name="buscar" value="nombre"> Nombre</label>
          <input type="text" class="form-control" placeholder="Ej.Manuel" name="caja_nombre">
        </div>
        <div class="form- group">
          <label> <input type="radio" name="buscar" value="primerAp"> Apellido Paterno</label>
          <input type="text" class="form-control" placeholder="Ej.De la Rosa" name="caja_primerAp">
        </div>
      </div>
      <button type="submit" class="btn btn-primary"> Buscar</button>

    </form>
    
  
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
    if(isset($_REQUEST['buscar'])){
      $radio=$_REQUEST["buscar"];
      $numCon=$_POST["caja_num_control"];
      $nombre=$_POST["caja_nombre"];
      $primerAp=$_POST["caja_primerAp"];
      if($radio=='numControl'){
         $sql ="SELECT * FROM alumnos WHERE num_Control LIKE '$numCon%'";
        $resultado = mysqli_query($enlace,$sql);
      }else if($radio=='nombre'){
          $sql ="SELECT * FROM alumnos WHERE nombre_Alumno LIKE '$nombre%'";
          $resultado = mysqli_query($enlace,$sql);
      }else if($radio=='primerAp'){
          $sql ="SELECT * FROM alumnos WHERE primerAp_Alumno LIKE '$primerAp%'";
          $resultado = mysqli_query($enlace,$sql);
    }

    }
      
    

   

    //var_dump($resultado);
    $resultado = mysqli_query($enlace,$sql);
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
   </div> 
</body>
</html>