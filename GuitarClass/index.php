<?php
  session_start();

  require 'Base_de_datos.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT ID_usuario, nombre, email, password FROM usuario WHERE ID_usuario = :ID_usuario');
    $records->bindParam(':ID_usuario', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>GuitarClass</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($user)): ?>
      <br> Bienvenido a GuitarClass <?= $user['nombre']; ?>
      <br>Te has loggueado exitosamente
			<br>Salir de tu cuenta
      <a href="Logout.php">
        Logout
      </a>
    <?php else: ?>
      <h1>Login o SignUp</h1>

      <a href="Login.php">Login</a> |
      <a href="signup.php">SignUp</a>
    <?php endif; ?>
  </body>
</html>
