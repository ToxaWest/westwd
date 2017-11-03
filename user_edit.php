<?php
  session_start();
  $title=$_SESSION['login'];
  include "header.php";
  include "handler/mysql.php";
  if (empty($_SESSION['login']) or empty($_SESSION['id'])){
    header ("Location: reg_auth.php");
    exit;
  }
  else {
  $new = $mysqli->query("SELECT * FROM users WHERE login='$title'");
  $rows = $new->fetch_array()
?>
  <form name="reg" class="form-horizontal" style="max-width: 600px;margin: 0 auto;" action="handler/user_edit.php" method="post" enctype="multipart/form-data">
    <fieldset disabled>
      <div class="form-group has-feedback">
        <label class="col-sm-3 control-label">Логин</label>
        <div class="col-sm-9">
          <input name="login" class="form-control" value="<?=$rows['login']?>">
        </div>
      </div>
    </fieldset>
      <div class="form-group">
        <label class="col-sm-3 control-label">Имя</label>
        <div class="col-sm-9">
          <input name="name" type="name" class="form-control" value="<?=$rows['name']?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Фамилия</label>
        <div class="col-sm-9">
          <input name="surename" type="surename" class="form-control" value="<?=$rows['surename']?>">
        </div>
      </div>
      <div class="form-group has-feedback" id="emailcheck">
        <label class="col-sm-3 control-label">Email</label>
        <div class="col-sm-9">
          <input name="email" type="email" class="form-control" value="<?=$rows['email']?>" onchange="responseEmail()">
          <span id="icoCheckEmail" class="glyphicon form-control-feedback" ></span>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Страна</label>
        <div class="col-sm-9">
          <select name="country" class="form-control">
            <option disabled selected hidden ><?php if($rows['country']!=""){echo $rows['country'];} else{echo "Country";}?></option>
            <option>Украина</option>
            <option>Россия</option>
            <option>Беларусь</option>
            <option>Остальные</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Изменить аватар:<br></label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-md-5" >
              <img  id="blah" src="users/avatars/<?=$rows['avatar']?>" class="img-thumbnail" alt="your image" style="width:100%;margin-bottom:10px;"/>
            </div>
              <div class="col-sm-7">
                <label class="btn btn-warning btn-file">
                  Изменить<input type="file" id="imgInp" name="inputfile" style="position: absolute;z-index: -999999;    left: -500px;">
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
          <button type="submit" class="btn btn-warning">Обновить данные</button>
        </div>
      </div>
    </form>
<?php
  $new->close();};
  include "footer.php";
  if($_SESSION['change']) {
     unset($_SESSION['change']);
     echo '<script>swal("","Изменения сохранены", "success");</script>';
  }
  if($_SESSION['no_change']) {
     unset($_SESSION['no_change']);
     echo '<script>swal("","Изменения не сохранены", "error");</script>';
  }
?>
