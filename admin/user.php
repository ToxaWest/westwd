<?php
  include "header.php";
  include "../handler/mysql.php";
?>
<h1>Пользователи</h1>
<table class="table table-hover table-bordered" >
  <thead>
    <tr class="info">
      <th>Аватар</th>
      <th>Логин</th>
      <th>Email</th>
      <th>Имя</th>
      <th>Фамилия</th>
      <th>Страна</th>
      <th></th>
    </tr>
  </thead>
<?php
  $delete ="users";
  $new = $mysqli->query("SELECT * FROM $delete");
  while ($rows = $new->fetch_array()) {
?>
  <tr>
    <td><img src="../users/avatars/<?=$rows['avatar']?>" style="height:30px"/></td>
    <td><a href="../user?id=<?=$rows['id']?>" target="_blank"><?=$rows['login']?></td>
    <td><?=$rows['email']?></td>
    <td><?=$rows['name']?></td>
    <td><?=$rows['surename']?></td>
    <td><?=$rows['country']?></td>
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
