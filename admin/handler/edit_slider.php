<?php
  $idss = $_POST['id'];
  $caption=$_POST['caption'];
  $text=$_POST['text'];
  include "../../handler/mysql.php";
  if(empty($idss) && $idss != 0){
    if(isset($_FILES) && $_FILES['slider']['error'] == 0){
      $uploadfile = "../../slider/".time().".png";
      move_uploaded_file($_FILES['slider']['tmp_name'], $uploadfile);
      $uploadfile = time().".png";
    }
    else {
      $uploadfile = 'slider.png';
    }
    $mysqli->query("INSERT INTO slider (caption,slider_text,img) VALUES('$caption','$text','$uploadfile')");
  }
  else {
    if(isset($_FILES) && $_FILES['slider']['error'] == 0){
      $uploadfile = "../../slider/".time().".png";
      move_uploaded_file($_FILES['slider']['tmp_name'], $uploadfile);
      $uploadfile = time().".png";
    }
    else {
      $new = $mysqli->query("SELECT `img` FROM `slider` WHERE `id`=$idss");
      $rows2 = $new->fetch_array();
      $uploadfile = $rows2['img'];
    }
    $mysqli->query("UPDATE `slider` SET `caption`='$caption' ,`slider_text`='$text' ,`img`='$uploadfile'  WHERE id = $idss");
  }
  header("Location: ../slider");
?>
