<?php
session_start();
include "mysql.php";
  $id=$_SESSION['id'];
  $page_id = $_POST["page_id"];
  $text_comment = $_POST["text_comment"];
  $name = htmlspecialchars($name);// Преобразуем спецсимволы в HTML-сущности
  $text_comment = htmlspecialchars($text_comment);// Преобразуем спецсимволы в HTML-сущности
  $time = time();
  if (empty($_SESSION['login']) or empty($_SESSION['id'])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $mysqli->query("INSERT INTO `comments` (`name`, `email` ,`page_id`, `text_comment`, `date_comment`) VALUES ('$name','$email', '$page_id', '$text_comment' , '$time')");
    header("Location: ".$_SERVER["HTTP_REFERER"]);// Делаем реридект обратно
  }
  else {
    $new = $mysqli->query("SELECT login FROM users WHERE id=$id");
    $rows = $new->fetch_array();
    $name=$rows['login'];
    $mysqli->query("INSERT INTO `comments` (`name`, `page_id`, `text_comment`, `date_comment`) VALUES ('$name', '$page_id', '$text_comment','$time')");// Добавляем комментарий в таблицу
    header("Location: ".$_SERVER["HTTP_REFERER"]);// Делаем реридект обратно
  }
?>
