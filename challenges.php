<?php
if (!isset($_COOKIE["name"])) {
  header("Location: index.php");
  exit();
}

require_once("show-questions.php");

if (isset($_POST['response'])) {
  echo $_POST["response"];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Retos diarios</title>
</head>

<body>

  <h1><?= $_COOKIE["name"] ?> <a href="delete.php">Eliminar usuario</a> <a href="scores.php">Ver puntuaciones</a></h1>

  <h1>Reto Diario</h1>

  <?php
  $questionsTodayinfo = getQuestionsToday();
  $actualQuestion = 1;
  $questionsLength = count($questionsTodayinfo["preguntas"]);
  $questions = $questionsTodayinfo["preguntas"];

  if ($actualQuestion == $questionsLength) {
    echo "COMPLETADO <h1>Ya has participado este dia con una puntuacion de x puntos</h1>";
    exit();
  }
  if (empty($questionsTodayinfo)) {
    echo "<h1 style='color:red'>No hay ninguna pregunta hoy</h1>";
  } else {
  ?>
    <h1>Fecha: <?= $questionsTodayinfo["fecha"] ?> | Tema: <?= $questionsTodayinfo["tema"] ?></h1>

    <p style="color: gray;">Pregunta: <?= $actualQuestion ?> de <?= $questionsLength ?></p>

    <?php
    $question = array_values($questions)[$actualQuestion - 1];

    ?>
    <h1><?= $question["enunciado"] ?></h1>
    <form action="" method="post">
      <?php
      foreach ($question["opciones"] as $key => $value) {
        echo "$key. <input type='radio' name='response' id='$key' value='$value'>$value</br>";
      }
      ?>
      <input type="submit" value="Enviar">
    </form>
  <?php
  }
  ?>
</body>

</html>