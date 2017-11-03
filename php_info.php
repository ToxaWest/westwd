<?php
include "handler/mysql.php";
$new=$mysqli->query("SELECT login FROM users");
while ($row = $new->fetch_array()) {
  echo $row['login'];
  echo '<br>';
};

$new->close();
if (function_exists('date_default_timezone_set'))
date_default_timezone_set('Europe/Kiev');
echo date('Y-m-d H:i:s'),'<br>';
?>
