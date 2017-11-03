<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <title><?=$title?> | WestWD</title>
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="../js/sweetalert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../style/sweetalert.css">
  <?php include "../handler/date.php";?>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2 admin-nav-menu" >
        <ul class="nav nav-pills nav-stacked" role="navigation">
          <li><a href="/" style="font-size:25px;"><i class="fa fa-google-wallet" aria-hidden="true"></i> West Web</a></li>
          <li><a href="index">Главная</a></li>
          <li><a href="user">Пользователи</a></li>
          <li><a href="slider">Слайдер</a></li>
          <li><a href="comments">Комментарии</a></li>
          <li><a href="portfolio">Портфолио</a></li>
          <li><a href="menu">Меню</a></li>
        </ul>
      </div>
      <div class="col-md-8 admin-content" >
