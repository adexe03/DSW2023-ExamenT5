<?php

if (isset($_COOKIE["name"])) {
  setcookie("name", $_COOKIE["name"], time() + 48 * 60 * 60, "/");
  header("Location: challenges.php");
  exit();
}
if (isset($_POST["name"]) && !empty($_POST["name"])) {
  setcookie("name", $_POST["name"], time() + 48 * 60 * 60, "/");
  header("Location: challenges.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>
</head>

<body>
  <h1>Bienvenido al juego de las preguntas diarias</h1>

  <p>¿Puedes indicarme tu nombre?</p>
  <form action="" method="post">
    <input type="text" name="name" id="name" placeholder="tu nombre...">
    <input type="submit" value="entrar">
  </form>
</body>

</html>