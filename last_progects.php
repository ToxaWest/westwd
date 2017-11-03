<div class="row" id="prog"  style="margin:-20px auto;">
  <div class="col-md-12">
    <h1 style="text-align: center;padding: 20px;">Последние проекты</h1>
  </div>
<?php
  $last=$mysqli->query("SELECT images,title,description,id FROM progect ORDER by id desc LIMIT 3");
  while($row=$last->fetch_array()){
?>
  <div class="col-sm-4" >
    <div class="thumbnail">
      <div class="imgPicture">
        <img src="/content/<?=$row['images']?>" alt="<?=$row['title']?>"/>
      </div>
      <div class="caption">
        <h3><?=$row['title']?></h3>
        <p class="visible-md visible-lg"><?=$row['description']?></p>
        <p><a href="podr?id=<?=$row['id']?>" class="btn btn-warning" role="button">Подробнее</a></p>
      </div>
    </div>
  </div>
<?php
  };
  $last->close();
?>
</div>
<hr>
