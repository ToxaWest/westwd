<?php
  include "header.php";
  $id=$_GET['id'];
  if($id==""){
    $capt="Добавить слайдер";
    $btn="Добавить";
    $img = "slider.png";
  }
  else {
    $capt="Изменить слайдер";
    $btn="Изменить";
    include "../handler/mysql.php";
    $new = $mysqli->query("SELECT * FROM slider WHERE id=$id");
    $rows = $new->fetch_array();
    $img = $rows['img'];
  }
?>
  <h1><?=$capt;?></h1>
  <form style="padding:15px" class="form-horizontal" style="" role="form" action="handler/edit_slider" method="post" enctype="multipart/form-data">
    <div class="form-group has-feedback">
      <label class="control-label">Заголовок</label>
      <input name="caption" class="form-control" value="<?=$rows['caption'];?>">
    </div>
    <div class="form-group has-feedback">
      <label class="control-label">Описание</label>
      <textarea name="text" style="width:100%;height:200px;" ><?=$rows['slider_text'];?></textarea>
    </div>
    <div class="form-group">
      <label class="control-label">Обложка:<br></label>
        <div class="row">
          <div class="col-md-5" >
            <img  id="blah" src="../slider/<?=$img;?>" class="img-thumbnail" alt="your image" style="width:100%;margin-bottom:10px;"/>
          </div>
            <div class="col-sm-7">
              <label class="btn btn-warning btn-file">
                Выбрать<input type="file" id="inputfile" name="slider" style=" display: none;  ">
            </label>
          </div>
        </div>
    </div>
    <input type="hidden" name="id" value="<?=$id ?>" />
    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-9">
        <button type="submit" class="btn btn-warning"><?=$btn;?></button>
      </div>
    </div>
  </form>
<?php
  include "footer.php";
?>
<script>
  function readURL(input) {
     if (input.files && input.files[0]) {
         var reader = new FileReader();
         reader.onload = function (e) {
             $('#blah').attr('src', e.target.result);
         }
         reader.readAsDataURL(input.files[0]);
     }
  }
  $("#inputfile").change(function(){
     readURL(this);
  });
</script>
