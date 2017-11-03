<?php
  include "header.php";
  include "../handler/mysql.php";
?>
<h1>Меню</h1>
<a href="edit_href" class="btn btn-info pull-right">Добавить пункт меню</a>
<table class="table table-hover" >
  <thead>
    <tr class="info">
      <th>id</th>
      <th>Название</th>
      <th>Ссылка</th>
      <th>Описание</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
<?php
  $delete="menu";
  $new = $mysqli->query("SELECT * FROM $delete");
  while ($rows = $new->fetch_array()) {
?>
  <tr>
    <td><?=$rows['id']?></td>
    <td><?=$rows['href_name']?></td>
    <td><?=$rows['href']?></td>
    <td><?=$rows['title']?></td>
    <td><a href="edit_href?id=<?=$rows['id']?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
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
