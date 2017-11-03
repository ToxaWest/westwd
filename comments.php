<?php
  $page_id = $_GET['id'];
  include "handler/mysql.php";
  session_start();
  $new = $mysqli->query("SELECT * FROM comments WHERE page_id=$page_id ORDER BY date_comment desc");
  while ($row = $new->fetch_array()){
    $email=$row['email'];
    $login=$row['name'];
    if($email==""){
      $result2 = $mysqli->query("SELECT avatar , id FROM users WHERE login='$login'");
      while ($row2 = $result2->fetch_array()){
        $img=$row2['avatar'];
        $user_id=$row2['id'];
      };
      $result2->close();
    }
    else {
      $img='user.png';
      $user_id = '';
  };
  $times = $row['date_comment'];
  $time= date('Y-m-d H:i', $times);
?>
  <div class="row" style="margin:5px;">
    <div class="col-md-12 col-xs-12 comment-header">
      <?php
      if($user_id!=""){
        echo '<a href="user?id=',$user_id,'">',$login,'</a>';
      }
      else{
        echo $login;
      }
      ?>
    </div>
    <div class="col-md-12 col-xs-12 comment-content">
      <div class="col-md-2 col-xs-2 comment-img">
        <img src="/users/avatars/<?=$img ?>" style="width:100%;" class="img-rounded"/>
      </div>
      <div class="col-md-10 col-xs-10">
          <?=$row['text_comment'];?>
      </div>
    </div>
    <div class="col-md-12 col-xs-12 comment-footer text-right">
      <small>Комментарий добавлен: <?=$time;?></small>
    </div>
  </div>
<?
  }
  if (empty($_SESSION['login']) or empty($_SESSION['id'])){
?>
  <form name="comment" class="form-horizontal comment-form" action="handler/comments" method="post">
    <div class="form-group has-feedback">
      <label class="col-sm-3 control-label">Имя</label>
      <div class="col-sm-9">
        <input name="name" class="form-control" required>
      </div>
    </div>
    <div class="form-group has-feedback">
      <label class="col-sm-3 control-label">Email</label>
      <div class="col-sm-9">
        <input name="email" type="email" class="form-control" required>
      </div>
    </div>
    <div class="form-group has-feedback">
      <label class="col-sm-3 control-label">Комментарий</label>
      <div class="col-sm-9">
      <textarea name="text_comment" class="form-control" rows="6" required></textarea>
      </div>
    </div>
    <p>
      <input type="hidden" name="page_id" value="<?=$page_id ?>" />
    </p>
    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-9">
        <button type="submit" class="btn btn-warning">Отправить</button>
      </div>
    </div>
  </form>
<?php }else{?>
<form name="comment"  class="form-horizontal comment-form" action="handler/comments" method="post">
  <div class="form-group has-feedback">
    <label class="col-sm-3 control-label">Комментарий</label>
    <div class="col-sm-9">
    <textarea name="text_comment" class="form-control" rows="6" required></textarea>
    </div>
  </div>
  <p>
    <input type="hidden" name="page_id" value="<?=$page_id ?>" />
    <input type="hidden" name="user_id" value="<?=$_SESSION['id'] ?>" />
  </p>
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <button type="submit" class="btn btn-warning">Отправить</button>
    </div>
  </div>
</form>
<?php }; $new->close();?>
