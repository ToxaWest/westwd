<!DOCTYPE html>
<html lang="ru" hreflang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php
  include "handler/mysql.php";
  include "handler/date.php";
  if(isset($page_name)){
    $head = $mysqli->query("SELECT * FROM seo WHERE name = '$page_name'");
    $row = $head->fetch_array();
  }
  ?>
  <title><?php if(isset($page_name)){echo $row['title'];}else{echo $title;}?> | WestWD</title>
  <meta name="Description" content="<?=$row['description'];?>">
  <meta name="Keywords" content="<?=$row['keywords'];?>">
  <?php
  if(isset($page_name))
  $head->close()
  ?>
  <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="style/bootstrap.min.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" type="text/css" href="style/sweetalert.css">
</head>
<body>
  <div class="container" style="flex: 1 0 auto;">
    <nav class="navbar navbar-default navbar-fixed-top container" >
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <i class="fa fa-bars" aria-hidden="true"></i>
          </button>
          <a class="navbar-brand logo" href="/"><i class="fa fa-google-wallet" aria-hidden="true"></i> West Web</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <?php
              $menu=$mysqli->query("SELECT * FROM menu");
              while ($row=$menu->fetch_array()) {
            ?>
                <li><a href="<?=$row['href']?>" title="<?=$row['title']?>"><?=$row['href_name']?></a></li>
            <?php };
              $menu->close();
            ?>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php
              session_start();
              if (empty($_SESSION['id'])){
            ?>
            <li><a href="#login"  data-toggle="modal">Войти</a></li>
            <li><a href="/reg_auth">Регистрация</a></li>
            <?php }
              else {
              $id=$_SESSION['id'];
              $enter= $mysqli->query("SELECT login,avatar FROM users WHERE id='$id'");
              $roww = $enter->fetch_array();
            ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding: 0 15px;">
                <span>Привет, <?=$roww['login']?></span>
                <img src="/users/avatars/<?=$roww['avatar']?>" class="img-circle" style="height:44px; margin:3px;"/><b class="caret"></b>
              </a>
              <ul class="dropdown-menu" style="width:100%;">
                <li><a href="user?id=<?=$id?>">Личный кабинет</a></li>
                <?php if($id=="1"){?><li><a href="admin/">Управление сайтом</a></li><?php } ?>
                <li><a href="user_edit">Изменить профиль</a></li>
                <li class="divider"></li>
                <li><a href="handler/exit">Выход</a></li>
              </ul>
            </li>
            <?php
                $enter->close();
              }
            ?>
          </ul>
          <div class="modal fade bs-example-modal-sm" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">Вход на сайт</h4>
                </div>
                <div class="modal-body ">
                  <?php include "login.php";?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
      <div class="row" style="background:white;">
