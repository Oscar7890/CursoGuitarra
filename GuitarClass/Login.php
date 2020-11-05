<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /GuitarClass');
  }
  require 'Base_de_datos.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT ID_usuario, nombre, email, password FROM usuario WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['ID_usuario'];
      header("Location: /GuitarClass");
    } else {
      $message = 'Lo siento, esta cuenta no existe';
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Login</h1>
    <span>No tienes una cuenta? <a href="Signup.php">SignUp</a></span>

    <form action="Login.php" method="POST">
      <input name="nombre" type="text" placeholder="Nombre">
      <input name="email" type="text" placeholder="Correo Electronico">
      <input name="password" type="password" placeholder="Contraseña">
      <input type="submit" value="Submit">
    </form>
  </body>
</html>
