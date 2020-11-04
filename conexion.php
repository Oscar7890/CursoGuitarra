<?php
/*
$server = "localhost";
$user = "root";
$pass = "";
$db = "cursoguitarra";

$con = new mysqli($server,$user,$pass,$db);

if ($con->connect_errno) {
	die("La conexión ha fallado" . $con->connect_errno);
} 	else {
	echo "conectado";
	}

*/

/*
				**************REGISTRARSE***************
ESTE ejemplo es de como se recibirían los datos, el orden
$sql = "INSERT INTO usuario VALUES(null, "Edgar Daniel Reyes Valdivia", "contraseña", "edgardaniel_reyes@hotmail.com")"; */

/*Aqui es como vamos a recibir la información de los formularios*/
$con = mysqli_connect('localhost','root','','cursoguitarra') or die ('Error en la conexión con el servidor');
$sql = "INSERT INTO usuario VALUES(null,'".$_POST["nombre"]."','".$_POST["password"]."','".$_POST["correo"]."' ) "; 

$resultado=mysqli_query($con,$sql) or die ("Error en el query database");
mysqli_close($con);

echo 'El nombre de usuario ingresado es: '.$_POST["nombre"];
echo 'La contraseña del usuario ingresado es: '.$_POST["password"];
echo 'El correo de usuario ingresado es: '.$_POST["correo"];

?>