<?php
  include "header.php";
  include "../handler/mysql.php";
?>
<h1>Портфолио</h1>
<a href="edit_portfolio" class="btn btn-info pull-right">Добавить проект</a>
<table class="table table-hover" >
  <thead>
    <tr class="info">
      <th>Картинка</th>
      <th>id</th>
      <th>Заголовок</th>
      <th>Краткое описание</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
<?php
  $delete="progect";
  $new = $mysqli->query("SELECT * FROM $delete");
  while ($rows = $new->fetch_array()) {
?>
  <tr>
    <td><div class="imgPicture"><img src="../content/<?=$rows['images']?>" /></div></td>
    <td><?=$rows['id']?></td>
    <td><?=$rows['title']?></td>
    <td><?=$rows['description']?></td>
    <td><a href="edit_portfolio?id=<?=$rows['id']?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
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
