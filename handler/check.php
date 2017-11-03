<?php
  session_start();
  require "mysql.php";
  $id=$_SESSION['id'];
  switch ($_POST['action']){
    case "login":
      $login=$_POST['login'];
      $login = stripslashes($login);$login = htmlspecialchars($login);$login = trim($login);
      $ver=$mysqli->query("SELECT login FROM users WHERE id='$id'");
      $rows= mysqli_fetch_array($ver);
      $logver=$rows['login'];
      $ver->close();
      if($logver==$login){echo "off";}
      else{
      $result = $mysqli->query("SELECT id FROM users WHERE login='$login'");
      $myrow = mysqli_fetch_array($result);
      if (empty($myrow['id'])) {echo "off"; $result->close();}
      else {echo "on";}
    };
    break;
    case "email":
      $email=$_POST['email'];
      $email = stripslashes($email);$email = htmlspecialchars($email);$email = trim($email);
      $ver=$mysqli->query("SELECT email FROM users WHERE id='$id'");
      $rows= mysqli_fetch_array($ver);
      $emver=$rows['email'];
      $ver->close();
      if($emver==$email){echo "off";}
      else{
      $result = $mysqli->query("SELECT id FROM users WHERE email='$email'");
      $myrow = mysqli_fetch_array($result);
      if (!empty($myrow['id'])) {echo "on"; $result->close();}
      else {echo "off";}
    };
    break;
    case "password":
      $password=$_POST['password'];
      $pass=$_POST['pass'];
      $password = stripslashes($password);$password = htmlspecialchars($password);$password = trim($password);
      $pass = stripslashes($pass);$pass = htmlspecialchars($pass);$login = trim($pass);
      if ($password==$pass) {echo "on";}
      else {echo "off";}
    break;
  };
?>
