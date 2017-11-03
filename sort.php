<?php
  session_start();
  $sort=$_GET['sort'];
  switch ($sort) {
    case 'name':
      $_SESSION['sort'] = "title";
      header("Location: ".$_SERVER['HTTP_REFERER']);
      break;
    case 'namedown':
      $_SESSION['sort'] = "title desc";
      header("Location: ".$_SERVER['HTTP_REFERER']);
      break;
    default:
      $_SESSION['sort'] = "id desc";
      header("Location: ".$_SERVER['HTTP_REFERER']);
      break;
  }
?>
