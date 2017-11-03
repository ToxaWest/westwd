<?php
  $mysqli = new mysqli("mysql.zzz.com.ua", "toxawest_gmail", "777toxawest777", "west");
  if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
  }
?>
