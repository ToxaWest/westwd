<?php
  session_start();
  include "handler/mysql.php";
  $ids=$_GET['id'];
  $titles=$mysqli->query("SELECT login FROM users WHERE id=$ids")->fetch_array();
  $title=$titles['login'];
  include "header.php";
  $user = $mysqli->query("SELECT * FROM users WHERE id=$ids");
  $rows = $user->fetch_array();
?>
    <div class="col-md-5">
      <img src="/users/avatars/<?=$rows['avatar'];?>" class="img-thumbnail" style="width:100%;"/>
    </div>
    <div class="col-md-7">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center">Личный кабинет <b><?=$rows['name'];?></b></h1>
        </div>
        <table class="table table-hover" >
          <tr>
            <td>Имя:</td>
            <td><?=$rows['name'];?></td>
          </tr>
          <tr>
            <td>Фамилия:</td>
            <td><?=$rows['surename'];?></td>
          </tr>
          <tr>
            <td>Логин:</td>
            <td><?=$rows['login'];?></td>
          </tr>
          <tr>
            <td>Email:</td>
            <td><?=$rows['email'];?></td>
          </tr>
          <tr>
            <td>Страна:</td>
            <td><?=$rows['country'];?></td>
          </tr>
          <tr>
            <td>Дата регистрации:</td>
            <td><?=date('d M Y',$rows['reg_date']);?></td>
          </tr>
        </table>
      </div>
    </div><?php if ($_SESSION['id']==$ids){ ?>
    <a href="user_edit" class="btn btn-warning" role="button"><span>Редактировать данные <i class="fa fa-pencil" aria-hidden="true"></i></span></a>
<?php
  }
  $user->close();
  include "footer.php";
?>
