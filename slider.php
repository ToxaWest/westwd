<div id="slider" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <?php
      $slider = $mysqli->query("SELECT id FROM `slider`");
      while ($row = $slider->fetch_array()){
    ?>
    <li data-target="#carousel-example-generic" data-slide-to="<?=$row['id'] ?>"></li>
    <?php }; ?>
  </ol>
  <div class="carousel-inner">
    <?php
      $slider = $mysqli->query("SELECT img,caption FROM `slider`");
      while ($row = $slider->fetch_array()){?>
            <div class="item">
              <img src="/slider/<?=$row['img'] ?>" alt="<?=$row['caption'] ?>" style="width:100%;">
              <div class="carousel-caption" style="background:rgba(128, 128, 128, 0.3);">
                <h2 style="text-shadow:-1px -1px 0 #3b3b3b,1px -1px 0 #3b3b3b,-1px 1px 0 #3b3b3b,1px 1px 0 #3b3b3b;"><?=$row['caption'] ?></h2>
              </div>
            </div>
    <?php }; $slider->close() ?>
  </div>
  <a class="left carousel-control" href="#slider" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#slider" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>
