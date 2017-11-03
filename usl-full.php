<?php
  $ida=$_GET['id'];
  include "handler/mysql.php";
  $row = $mysqli->query("SELECT * FROM uslugi WHERE id=$ida")->fetch_array();
  $title = $row['title'];
  include "header.php";
  $podr = $mysqli->query("SELECT * FROM uslugi WHERE id=$ida");
  $row = $podr->fetch_array();
?>
  <div class="col-md-12">
    <div class="col-md-12">
      <h1><?=$row['title']?> <?=$row['usl_ico']?></h1>
    </div>
    <div class="col-md-12">
      <p><?=$row['fulldescription']?></p>
    </div>
    <div class="col-md-12 jobs">
      <h2>Примеры работ</h2>
      <?php
        $last=$mysqli->query("SELECT images,description,id,title FROM progect WHERE type='$row[title]' ORDER by id");
        while($row=$last->fetch_array()){
      ?>
        <div class="col-sm-4">
          <div class="thumbnail">
            <div class="imgPicture">
              <img src="/content/<?=$row['images']?>" alt="<?=$row['title']?>"/>
            </div>
            <div class="caption">
              <h3><?=$row['title']?></h3>
              <p class="hidden-xs"><?=$row['description']?></p>
              <p><a href="podr?id=<?=$row['id']?>" class="btn btn-warning" role="button">Подробнее</a></p>
            </div>
          </div>
        </div>
      <?php
        };
        $last->close();
      ?>
    </div>
  </div>
<?php
  $podr->close();
  include "footer.php";
?>
