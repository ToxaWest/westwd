<?php
  session_start();
  $name=$_POST['name'];$email=$_POST['email'];$surename=$_POST['surename'];$login=$_POST['login'];$country=$_POST['country'];
  $login = stripslashes($login);$login = htmlspecialchars($login);
  $email = stripslashes($email);$email = htmlspecialchars($email);
  $name = stripslashes($name);$name = htmlspecialchars($name);
  $surename = stripslashes($surename);$surename = htmlspecialchars($surename);
  $login = trim($login);$email = trim($email);$name = trim($name);$surename = trim($surename);
  $id=$_SESSION['id'];
  include ("mysql.php");
  if(isset($_FILES) && $_FILES['inputfile']['error'] == 0){
    $uploadfile = "../users/avatars/".time().".png";
    move_uploaded_file($_FILES['inputfile']['tmp_name'], $uploadfile);
    $uploadfile = time().".png";
    $query = $mysqli->query("UPDATE `users` SET `avatar` = '$uploadfile' WHERE `users`.`id` = '$id'");
  }
  if($country!=""){
    $query = $mysqli->query("UPDATE `users` SET `country` = '$country' WHERE `users`.`id` = '$id'");
  }
  $query1 = $mysqli->query("UPDATE `users` SET `name` = '$name',`surename` = '$surename',  `email` = '$email' WHERE `users`.`id` = '$id'");

    if ($query1=='TRUE')
    {
      $_SESSION['change'] = true;
      header("Location: ".$_SERVER['HTTP_REFERER']);
      exit;
    }
    else {
      $_SESSION['no_change']=true;
      header("Location: ".$_SERVER['HTTP_REFERER']);
      exit;
    }
    $query->close();
?>
