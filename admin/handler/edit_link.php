<?php
  $id = $_POST['id'];
  $title=$_POST['title'];
  $href=$_POST['href'];
  $href_name=$_POST['href_name'];
  include "../../handler/mysql.php";
  if(empty($id)){
    $mysqli->query("INSERT INTO `menu` (`href_name`,`href`,`title`) VALUES('$href_name','$href','$title')");
  }
  else {
    $mysqli->query("UPDATE `menu` SET `title`='$title',`href_name`='$href_name' ,`href`='$href'  WHERE `menu`.`id`='$id' ");
  }
  header("Location: ../menu");
?>
