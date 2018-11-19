<?php 
	include('conexion.php');

	$h = 'localhost';
    $u = 'root';
    $p = 'manuel';
	$bd = 'bd_escuela';

	$enlace = conexion($h, $u, $p ,$bd);

	//var_dump($enlace);

	$num_control = $_GET["id"];
	


	$sql = "DELETE FROM alumnos WHERE num_Control = '$num_control'";

	$res = mysqli_query($enlace, $sql);

	if ($res) {
		// cerrarConexion($enlace);
		header('Location:../../vista/menu_principal.php');
	} else {
		 //cerrarConexion($enlace);
		echo "Error de acceso";
		
	}
 ?>