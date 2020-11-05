<?php

  require 'Base_de_datos.php';

  $message = '';

  if (!empty($_POST['nombre']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO usuario (nombre, email, password) VALUES (:nombre, :email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre', $_POST['nombre']);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      $message = 'Usuario creado exitosamente';
    } else {
      $message = 'Ha ocurrido un error, porfavor intentalo de nuevo';
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SignUp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>

    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>SignUp</h1>
    <span>Posees una cuenta? <a href="Login.php">Login</a></span>

    <form action="Signup.php" method="POST">
      <input name="nombre" type="text" placeholder="Nombre">
      <input name="email" type="text" placeholder="Correo Electronico">
      <input name="password" type="password" placeholder="Contraseña">
      <input name="confirm_password" type="password" placeholder="Confirma Contraseña">
      <input type="submit" value="Submit">
    </form>

  </body>
</html>
