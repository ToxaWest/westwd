<?php
  $page_name="portfolio";
  include "header.php";
  $num = 8;
  if(isset($_GET['page'])){
  $page = $_GET['page'];}
  else {
    $page = 1;
  }
  $result00 = $mysqli->query("SELECT COUNT(*) FROM progect");
  $temp = $result00->fetch_array();
  $posts = $temp[0];
  $total = (($posts - 1) / $num) + 1;
  $total =  intval($total);
  $page = intval($page);
  if(empty($page) or $page < 0) $page = 1;
  if($page > $total) $page = $total;
  $start = $page * $num - $num;

  if(empty($_SESSION['sort'])){
    $sort="id desc";
    $btn_name='По умолчанию';
    $default='display:none';
  }
  else {
    $sort=$_SESSION['sort'];
    switch ($sort) {
      case 'title':
        $name='display:none';
        $btn_name="Имя по возрастанию";
        break;
      case 'title desc':
        $namedown='display:none';
        $btn_name="Имя по уменьшению";
        break;
      default:
        $default='display:none';
        $btn_name="По умолчанию";
        break;
    };
  };
?>
<div class="col-md-12">
  <div class="btn-group" style="margin: 15px 0;">
    <button type="button" class="btn-sm btn btn-warning dropdown-toggle" data-toggle="dropdown">
    Сортировка:  <?=$btn_name?>  <span class="caret"></span>
   </button>
    <ul class="dropdown-menu" role="menu">
      <li><a href="sort?sort=namedown" style="<?=$namedown?>">Имя по уменьшению</a></li>
      <li><a href="sort?sort=name" style="<?=$name?>">Имя по возрастанию</a></li>
      <li><a href="sort" style="<?=$default?>">По умолчанию</a></li>
    </ul>
  </div>
</div>
<?php
  $new = $mysqli->query("SELECT * FROM `progect` ORDER BY $sort LIMIT $start, $num");
  while ($row = $new->fetch_array()){
?>
    <div class="col-md-6" style="padding:5px;">
      <div class="col-md-12 portfolio">
        <div class="col-md-5" style="padding:5px">
          <div class="imgPicture ">
            <img src="/content/<?=$row['images']?>" href="#images<?=$row['id']?>" data-toggle="modal" class="img-thumbnail podr_img" alt=""/>
          </div>
        </div>
        <div class="col-md-7">
          <div class="col-md-12">
            <a href="podr?id=<?=$row['id']?>"><h2><?php echo $row['title']?></h2></a>
          </div>
          <div class="col-md-12" style="padding-bottom:5px;">
            <p><?=$row['description']?></p>
          </div>
        </div>
        <div class="col-md-12 text-right" style="border-top: 1px solid #e7e7e7;">
          <a href="<?=$row['link']?>" title="<?=$row['title']?>" class="btn btn-warning" target="_blank" style="margin:5px auto;">
            <i class="fa fa-eye" aria-hidden="true" ></i> Live Demo
          </a>
          <a href="podr?id=<?=$row['id']?>"  class="btn btn-warning">Подробнее</a>
        </div>
      </div>
    </div>
    <div class="modal bs-example-modal-lg" id="images<?=$row['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content" >
          <img src="/content/<?=$row['images']?>" data-dismiss="modal" class="modal_img" alt="<?=$row['title']?>"/>
        </div>
      </div>
    </div>
<?php
  }; ?>
  <div class="col-md-12 pagination">
    <div class="btn-toolbar center-block" role="toolbar" style="display: table;">
      <div class="btn-group" >
        <?php
          if ($page != 1) $pervpage = '<a class="btn btn-warning" href=portfolio?page=1><i class="fa fa-angle-double-left" aria-hidden="true"></i></a><a class="btn btn-warning"  href=portfolio?page='. ($page - 1) .'><i class="fa fa-angle-left" aria-hidden="true"></i></a>';
          else {$pervpage = '<a class="btn btn-warning disabled" href=portfolio?page=1><i class="fa fa-angle-double-left" aria-hidden="true"></i></a><a class="btn btn-warning disabled"  href=portfolio?page='. ($page - 1) .'><i class="fa fa-angle-left" aria-hidden="true"></i></a>';}
          if ($page != $total) $nextpage = '<a class="btn btn-warning"  href=portfolio?page='. ($page + 1) .'><i class="fa fa-angle-right" aria-hidden="true"></i></a><a class="btn btn-warning"  href=portfolio?page=' .$total. '><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>';
          else {$nextpage = '<a class="btn btn-warning disabled"  href=portfolio?page='. ($page + 1) .'><i class="fa fa-angle-right" aria-hidden="true"></i></a><a class="btn btn-warning disabled"  href=portfolio?page=' .$total. '><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>';}
          if($page - 5 > 0) $page5left = ' <a class="btn btn-warning"  href=portfolio?page='. ($page - 5) .'>'. ($page - 5) .'</a>';
          if($page - 4 > 0) $page4left = ' <a class="btn btn-warning"  href=portfolio?page='. ($page - 4) .'>'. ($page - 4) .'</a>';
          if($page - 3 > 0) $page3left = ' <a class="btn btn-warning"  href=portfolio?page='. ($page - 3) .'>'. ($page - 3) .'</a>';
          if($page - 2 > 0) $page2left = ' <a class="btn btn-warning"  href=portfolio?page='. ($page - 2) .'>'. ($page - 2) .'</a>';
          if($page - 1 > 0) $page1left = '<a class="btn btn-warning"  href=portfolio?page='. ($page - 1) .'>'. ($page - 1) .'</a>';
          if($page + 5 <= $total) $page5right = '<a class="btn btn-warning"  href=portfolio?page='. ($page + 5) .'>'. ($page + 5) .'</a>';
          if($page + 4 <= $total) $page4right = '<a class="btn btn-warning"  href=portfolio?page='. ($page + 4) .'>'. ($page + 4) .'</a>';
          if($page + 3 <= $total) $page3right = '<a class="btn btn-warning"  href=portfolio?page='. ($page + 3) .'>'. ($page + 3) .'</a>';
          if($page + 2 <= $total) $page2right = '<a class="btn btn-warning"  href=portfolio?page='. ($page + 2) .'>'. ($page + 2) .'</a>';
          if($page + 1 <= $total) $page1right = '<a class="btn btn-warning"  href=portfolio?page='. ($page + 1) .'>'. ($page + 1) .'</a>';
          if ($total > 1){
          Error_Reporting(E_ALL & ~E_NOTICE);
          echo $pervpage.'</div><div class="btn-group" >'.$page5left.$page4left.$page3left.$page2left.$page1left.'<div class="btn btn-warning active">'.$page.'</div>'.$page1right.$page2right.$page3right.$page4right.$page5right.'</div><div class="btn-group" >'.$nextpage;
          }
        ?>
      </div>
    </div>
  </div>
<?php
  include "footer.php";
?>
