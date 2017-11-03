<?php
  include "header.php";
  $id=$_GET['id'];
  if($id==""){
    $capt="Добавить проект";
    $btn="Добавить";
    $img = "portfolio.jpg";
    $comments="";
  }
  else {
    $capt="Изменить проект";
    $btn="Изменить";
    include "../handler/mysql.php";
    $new = $mysqli->query("SELECT * FROM progect WHERE id=$id");
    $rows = $new->fetch_array();
    $img = $rows['images'];
    $img2 = $rows['img2'];
    switch ($rows['comments']) {
      case 'on':
        $comments="checked";
        break;
      default:
        $comments="";
        break;
    }
  }
?>
  <h1><?=$capt;?></h1>
  <form style="padding:15px" class="form-horizontal" style="" role="form" action="handler/edit_portfolio" method="post" enctype="multipart/form-data">
    <div class="form-group has-feedback">
      <label class="control-label">Заголовок</label>
      <input name="title" class="form-control" value="<?=$rows['title'];?>">
    </div>
    <div class="form-group has-feedback">
      <label class="control-label">Описание</label>
      <textarea name="description" style="width:100%;min-height:200px;" ><?=$rows['description'];?></textarea>
    </div>
    <div class="form-group has-feedback">
      <label class="control-label">Полное описание</label>
      <textarea name="fulldescription" style="width:100%;min-height:300px;" ><?=$rows['fulldescription'];?></textarea>
    </div>
    <div class="form-group has-feedback">
      <label class="control-label">Ссылка на сайт</label>
      <input name="link" class="form-control" value="<?=$rows['link'];?>">
    </div>
    <div class="form-group has-feedback">
      <label class="control-label">Ключевые слова (через запятую)</label>
      <textarea name="keywords" style="width:100%;min-height:200px;" ><?=$rows['keywords'];?></textarea>
    </div>
    <div class="checkbox">
      <label>
            <input type="checkbox" name="comments" <?=$comments?>> Разрешить комментарии
      </label>
    </div>
    <label class="control-label">Обложка:<br></label>
    <div class="form-group">
      <div class="col-md-6" >
        <label class="btn btn-warning btn-file">
          <input type="file" name="progect" style="">
        </label>
      </div>
      <div class="col-md-6" >
        <label class="btn btn-warning btn-file">
          <input type="file" name="progect2">
        </label>
      </div>
    </div>
    <input type="hidden" name="id" value="<?=$id;?>" />
    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-9">
        <button type="submit" class="btn btn-warning"><?=$btn;?></button>
      </div>
    </div>
  </form>
<?php
  include "footer.php";
?>
