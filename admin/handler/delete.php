<?php
  $delete=$_GET['delete'];
  $id = (int) $_GET['id'];
  include "../../handler/mysql.php";
  #delete images
  // $a = [
  //   {
  //     id: $id,
  //     section: $delete,
  //     path:
  //   }
  // ];
  // $a = ['avatar', 'images'];
  // foreach ($a as $key => $value) {
  //   if($delete == $value){
  //     $del = $mysqli->query("SELECT $value from $delete  WHERE id = $id");
  //     $myrow = $del->fetch_array();
  //     $img  = $myrow[$value];
  //     $del->close();
  //     unlink("../../slider/$img");
  //   }
  // }
  if($delete != 'comments'){
    switch ($delete) {
      case 'slider':
        $image_name = 'img';
        $img_path = "../../slider/";
        break;
      case 'users':
        $image_name = 'avatar';
        $img_path = "../../users/avatars/";
        break;
      case 'progect':
        $image_name = 'images';
        $img_path = "../../content/";
        break;
    }
    $del = $mysqli->query("SELECT $image_name from $delete  WHERE id = $id");
    $myrow = $del->fetch_array();
    $img  = $myrow[$image_name];
    $del->close();
    if($img!="user.png"){
      unlink($img_path.$img);
    };
  };


  #delete row
  $mysqli->query("DELETE FROM `$delete` WHERE id = $id");
  header("Location: ".$_SERVER["HTTP_REFERER"]);
?>
