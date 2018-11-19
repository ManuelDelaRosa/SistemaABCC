
<?php 
	include('conexion.php');

	$h = 'localhost';
    $u = 'root';
    $p = 'manuel';
	$bd = 'bd_escuela';

	$enlace = conexion($h, $u, $p ,$bd);


	$usuario = $_POST["txt_usuario"];
	$contraseña = $_POST["txt_contraseña"];

	//Validaciones
	//cifado/desifrado
	//Procedimeito par validar usario
	//SELECT * FROM txt_contraseña WHERE usuario = x AND contraseña =x;

	$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contraseña = '$contraseña'";

	$res = mysqli_query($enlace, $sql);


	if ($res) {
		header('Location:../vista/menu_principal.php');
	} else {
		echo "Error de acceso";
	}
 ?>