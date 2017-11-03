<?php
  session_start();
  $login = $_POST['login'];$password=$_POST['password'];$email=$_POST['email'];$name=$_POST['name'];$surename=$_POST['surename'];$country=$_POST['country'];
  $login = stripslashes($login);$login = htmlspecialchars($login);
  $password = stripslashes($password);$password = htmlspecialchars($password);
  $email = stripslashes($email);$email = htmlspecialchars($email);
  $name = stripslashes($name);$name = htmlspecialchars($name);
  $surename = stripslashes($surename);$surename = htmlspecialchars($surename);
  $login = trim($login);$password = trim($password);$email = trim($email);$name = trim($name);$surename = trim($surename);
  $pass=base64_encode($password);
  $time=time();
  include ("mysql.php");
  if(isset($_FILES) && $_FILES['somename']['error'] == 0){
    $uploadfile = "../users/avatars/".time().".png";
    move_uploaded_file($_FILES['somename']['tmp_name'], $uploadfile);
    $uploadfile = time().".png";
  }
  else {
    $uploadfile = 'user.png';
  }
  $result = $mysqli->query("SELECT id FROM users WHERE login='$login'");
  $myrow = $result->fetch_array();
    $result2 = $mysqli->query("INSERT INTO users (login,password,email,name,surename,country,avatar,reg_date) VALUES('$login','$pass','$email','$name','$surename','$country','$uploadfile','$time')");
    if ($result2=='TRUE'){
      $_SESSION['reg_ok'] = true;
      header("Location: ".$_SERVER['HTTP_REFERER']);
      exit;
    }
  if (!empty($myrow['id'])) {
    $_SESSION['bad_login'] = true;
    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit;
  }
  else {
    $_SESSION['no_reg'] = true;
    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit;
  }
?>
