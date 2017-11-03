<?php
  include "header.php";
  include "../handler/mysql.php";
?>
<h1>Управление слайдером</h1>
<a href="edit_slider" class="btn btn-info pull-right">Добавить слайдер</a>
<table class="table table-hover" >
  <thead>
    <tr class="info">
      <th>id</th>
      <th>Картинка</th>
      <th>Заголовок</th>
      <th>Текст</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
<?php
  $delete="slider";
  $new = $mysqli->query("SELECT * FROM $delete");
  while ($rows = $new->fetch_array()) {
?>
  <tr>
    <td><?=$rows['id']?></td>
    <td><img src="../slider/<?=$rows['img']?>" style="height:60px"/></td>
    <td><?=$rows['caption']?></td>
    <td><?=$rows['slider_text']?></td>
    <td><a href="edit_slider?id=<?=$rows['id']?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
    <td><a href="handler/delete?id=<?=$rows['id']?>&delete=<?=$delete?>" onclick="return confirmDelete();" class="delete"><i class="fa fa-times" aria-hidden="true"></i></a></td>
  </tr>
<?php }; $new->close();?>
</table>
<?php include "footer.php";?>
<script>
function confirmDelete() {
  if (confirm("Вы подтверждаете удаление?")) {
      return true;
  } else {
      return false;
  }
}
</script>
