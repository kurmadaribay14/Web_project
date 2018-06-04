<?php
  /* Принимаем данные из формы */
  $name = $_POST["name"];
  $page_id = $_POST["page_id"];
  $text_comment = $_POST["text_comment"];
  $name = htmlspecialchars($name);// Преобразуем спецсимволы в HTML-сущности
  $text_comment = htmlspecialchars($text_comment);// Преобразуем спецсимволы в HTML-сущности
  include("connection.php");// Подключается к базе данных
  $request = "INSERT INTO comments ( page_id, name, text_comment) VALUES ( '".$page_id."', '".$name."','".$text_comment."')";// Добавляем комментарий в таблицу
mysql_query($request);
mysql_close($con);
header("Location: aboutpage.php");
?>