<?php
  include "header.php";
  $id=$_GET['id'];
  if($id==""){
    $capt="Добавить пункт";
    $btn="Добавить";
  }
  else {
    $capt="Изменить пункт";
    $btn="Изменить";
    include "../handler/mysql.php";
    $new = $mysqli->query("SELECT * FROM menu WHERE id=$id");
    $rows = $new->fetch_array();
  }
?>
  <h1><?=$capt;?></h1>
  <form style="padding:15px" class="form-horizontal" style="" role="form" action="handler/edit_link" method="post">
    <div class="form-group has-feedback">
      <label class="control-label">Название</label>
      <input name="href_name" class="form-control" value="<?=$rows['href_name'];?>">
    </div>
    <div class="form-group has-feedback">
      <label class="control-label">Ссылка</label>
      <input name="href" class="form-control" value="<?=$rows['href'];?>">
    </div>
    <div class="form-group has-feedback">
      <label class="control-label">Описание</label>
      <input name="title" class="form-control" value="<?=$rows['title'];?>">
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
