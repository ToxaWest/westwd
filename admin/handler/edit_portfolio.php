<?php
  $id = $_POST['id'];
  $link = $_POST['link'];
  $title=$_POST['title'];
  $comments=$_POST['comments'];
  $keywords=$_POST['keywords'];
  $description=$_POST['description'];
  $fulldescription=$_POST['fulldescription'];
  include "../../handler/mysql.php";
  if(empty($id)){
    if(isset($_FILES) && $_FILES['progect']['error'] == 0){
      $img = "../../content/".time().".png";
      move_uploaded_file($_FILES['progect']['tmp_name'], $img);
      $img = time().".png";
    }
    else {
      $img = 'portfolio.jpg';
    }
    if(isset($_FILES) && $_FILES['progect2']['error'] == 0){
      $img2 = "../../content/".time()."2.png";
      move_uploaded_file($_FILES['progect2']['tmp_name'], $img2);
      $img2 = time()."2.png";
    }
    $mysqli->query("INSERT INTO `progect` (`title`,`description`,`fulldescription`,`keywords`,`comments`,`images`,`img2`,`link`) VALUES('$title','$description','$fulldescription','$keywords','$comments', '$img', '$img2', '$link' ) ");
  }
  else {
    $img_b = $mysqli->query("SELECT images,img2 FROM progect WHERE id=$id")->fetch_array();
    if(isset($_FILES) && $_FILES['progect']['error'] == 0){
      $img = "../../content/".time().".png";
      move_uploaded_file($_FILES['progect']['tmp_name'], $img);
      $img = time().".png";
    }
    else {
      $img = $img_b['images'];
    }
    if(isset($_FILES) && $_FILES['progect2']['error'] == 0){
      $img2 = "../../content/".time()."2.png";
      move_uploaded_file($_FILES['progect2']['tmp_name'], $img2);
      $img2 = time()."2.png";
    }
    else {
      $img2 = $img_b['img2'];
    }
    $mysqli->query("UPDATE `progect` SET `title`='$title',`description`='$description' ,`fulldescription`='$fulldescription', `keywords`='$keywords' , `comments`='$comments' ,`images`='$img',`img2`='$img2',`link`='$link'  WHERE `progect`.`id`='$id' ");
  }
  header("Location: ../portfolio");
?>
