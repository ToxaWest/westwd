<?php
  include "header.php";
  include "../handler/mysql.php";
?>
<h1>Комментарии</h1>
<table class="table table-hover" >
  <thead>
    <tr class="info">
      <th>Имя</th>
      <th>email</th>
      <th>К статье</th>
      <th>Комментарий</th>
      <th>Дата комментария</th>
      <th></th>
    </tr>
  </thead>
<?php
  $delete ="comments";
  $new = $mysqli->query("SELECT * FROM $delete");
  while ($rows = $new->fetch_array()) {
?>
  <tr>
    <td><?=$rows['name']?></td>
    <td><?=$rows['email']?></td>
    <td>
<?php
    $id=$rows['page_id'];
    $port = $mysqli->query("SELECT title FROM progect WHERE id=$id");
    $row = $port->fetch_array();
?>
    <a href="../podr?id=<?=$id;?>"><?=$row['title']?></a>
    </td>
    <td><?=$rows['text_comment']?></td>
    <td><?=date('H:i:s / d-m-Y', $rows['date_comment'])?></td>
    <td><a href="handler/delete?id=<?=$rows['id']?>&delete=<?=$delete?>" onclick="return confirmDelete();" class="delete"><i class="fa fa-times" aria-hidden="true"></i></a></td>
  </tr>
<?php }; $port->close;$new->close;?>
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
