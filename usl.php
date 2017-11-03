<div class="row" style="margin:auto;">
  <div class="col-md-12">
    <h1 style="text-align: center;padding: 20px;">Услуги</h1>
  </div>
<?php
  include "handler/mysql.php";
  $uslugi = $mysqli->query("SELECT usl_ico,title,id FROM uslugi");
  while ($row =$uslugi->fetch_array()){
?>
  <div class="col-sm-4  col-md-3 usl text-center ">
    <a href="usl-full?id=<?=$row['id']?>">
      <div class="row">
        <div class="col-xs-offset-1 col-xs-3 col-md-offset-0  col-md-12">
          <p><?=$row['usl_ico'];?></p>
        </div>
        <div class="col-xs-8 col-md-12">
          <p class="name"><?=$row['title']?></p>
        </div>
      </div>
    </a>
  </div>
<?php };
  $uslugi->close();
?>
</div>
<hr>
