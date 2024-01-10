<?php

include_once("preguntas.php");

function getQuestionsToday()
{
  global $preguntasDiarias;
  $currentDate = date('d-m-Y');
  if (!array_key_exists($currentDate, $preguntasDiarias)) {
    return [];
  }

  $data = $preguntasDiarias[$currentDate];
  $preguntas = $data["preguntas"];

  foreach ($preguntas as &$pregunta) {
    unset($pregunta["respuesta_correcta"]);
  }

  unset($pregunta);
  return [
    "fecha" => $currentDate,
    "tema" => $data["tema"],
    "preguntas" => $preguntas
  ];
}

function checkAnswer($preguntaIndex)
{
}
