<?php
  session_start();
  $login = $_POST['login'];
  $password=$_POST['password'];
  $login = stripslashes($login);$login = htmlspecialchars($login);
  $password = stripslashes($password);$password = htmlspecialchars($password);
  $login = trim($login);$password = trim($password);
  $pass=base64_encode($password);
  include ("mysql.php");
  $result = $mysqli->query("SELECT * FROM users WHERE login='$login'");
  $myrow = $result->fetch_array();
  if (empty($myrow['password'])){
    $_SESSION['nolog'] = true;
    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit;
  }
  else {
    if ($myrow['password']==$pass){
      $_SESSION['login']=$myrow['login'];
      $_SESSION['id']=$myrow['id'];
      header("Location: ".$_SERVER['HTTP_REFERER']);
      exit;
    }
    else {
        $_SESSION['badpass'] = true;
        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit;
    }
  }
  $result->close();
?>
