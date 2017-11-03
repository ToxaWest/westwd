<?php
  session_start();
  if($_SESSION['reg_ok'])
    $title="Вход";
  else
    $title="Регистрация";
  include "header.php";
?>
  <div class=col-md-4 style="border: 2px dotted;border-radius: 30px;background: #efa875;">
    <h1 style="margin-bottom:30px;">Вход на сайт</h1>
    <?php include "login.php";?>
  </div>
  <div class=col-md-8>
    <h1 style="margin-bottom:30px;">Регистрация</h1>
    <?php include "registration.php";?>
  </div>
<?php
  include "footer.php";
  if($_SESSION['id']!=""){
    header("Location: index");
  }
?>
