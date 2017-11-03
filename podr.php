<?php
  $ida=$_GET['id'];
  include "handler/mysql.php";
  $row = $mysqli->query("SELECT title, keywords, description,images FROM progect WHERE id=$ida")->fetch_array();
  $title = $row['title'];
  include "header.php";
  $podr = $mysqli->query("SELECT * FROM progect WHERE id=$ida");
  $row = $podr->fetch_array();
?>
  <div itemscope itemtype="http://schema.org/Article" class="col-xs-12" style="background:url('/content/<?=$row['images'];?>') top center no-repeat; background-size: cover;">
      <div class="col-md-10 col-md-offset-1" style="z-index:1000;background:#fff; margin-top:200px;border: 4px solid #f5f5f5;border-bottom: none;border-radius: 10px 10px 0 0;box-shadow: 0px 0px 50px 0px #3b3b3b;">
        <div class="col-md-12">
          <h1 itemprop="name"><?=$row['title']?></h1>
        </div>
        <div class="col-md-12">
          <p itemprop="articleBody"><?=$row['fulldescription']?></p>
          <p class="text-right" style="padding: 10px 0;"><a itemprop="url" href="<?=$row['link']?>" title="<?=$row['title']?>" class="btn btn-warning" target="_blank"><i class="fa fa-eye" aria-hidden="true" ></i> Live Demo</a></p>
        </div>
      </div>
  </div>
  <div class="col-md-12 text-center" style="padding:10px; margin:40px 0;">
    <div class="col-md-<?php if(!empty($row['img2']))echo"7";else echo"12";?>">
      <h2>ПК версия сайта</h2>
      <div class="imgPicture"  href="#images"  data-toggle="modal" style="border: 2px solid #f5f5f5;box-shadow: 0px 0px 10px 0px #3b3b3b;">
        <img src="/content/<?=$row['images']?>" class="podr_img" alt="<?=$row['title']?>"/>
      </div>
    </div>
    <div class="modal bs-example-modal-lg" id="images" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content" >
          <img src="/content/<?=$row['images']?>" data-dismiss="modal" class="modal_img" alt="<?=$row['title']?>"/>
        </div>
      </div>
    </div>
    <?php if(!empty($row['img2'])){?>
    <div class="col-md-5">
      <h2>Мобильная версия</h2>
      <div class="imgPicture" href="#images2"  data-toggle="modal" style="border: 2px solid #f5f5f5;box-shadow: 0px 0px 10px 0px #3b3b3b;">
        <img src="/content/<?=$row['img2']?>" class="podr_img" alt="<?=$row['title']?>"/>
      </div>
    </div>
    <div class="modal bs-example-modal-sm" id="images2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content" >
          <img src="/content/<?=$row['img2']?>" data-dismiss="modal" class="modal_img" alt="<?=$row['title']?>"/>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
  <div class="col-xs-12" style="background:#fff; border-top: 4px solid #f5f5f5;box-shadow: 0px 0px 50px 0px #3b3b3b;">
    <?php if($row['comments']=="on"){ ?>
      <div class="col-md-10 col-md-offset-1">
        <h2 class="text-center">Комментарии</h2>
        <button type="button" style="margin-bottom:20px;" class="btn btn-warning" id="comment" onclick="change()"  data-toggle="collapse" data-target="#comments"><i class="fa fa-chevron-up" aria-hidden="true"></i> Скрыть комментарии</button>
        <div id="comments" class="collapse in" >
          <?php include "comments.php";?>
        </div>
      </div>
    <?php } ?>
  </div>
<?php
  $podr->close();
  include "footer.php";
?>
<script>
  function change() {
    var but = document.getElementById('comment');
    if(but.innerHTML === '<i class="fa fa-chevron-up" aria-hidden="true"></i> Скрыть комментарии'){
      but.innerHTML = '<i class="fa fa-chevron-down" aria-hidden="true"></i> Показать комментарии';
    }
    else {
      but.innerHTML = '<i class="fa fa-chevron-up" aria-hidden="true"></i> Скрыть комментарии';
    }
  }
</script>
