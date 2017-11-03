    </div>
  </div>
<footer style="flex-shrink: 0;">
  <div class="container">
    <div class="row">
      <div class="col-xs-6 col-md-2  text-center" style="padding:20px;">
        <h3>Ссылки</h3>
        <?php
          $menu=$mysqli->query("SELECT * FROM menu");
          while ($row=$menu->fetch_array()) { ?>
            <p  class="botlinks text-left"><a href="<?=$row['href']?>" title="<?=$row['title']?>"><?=$row['href_name']?></a></p>
        <?php  };
          $menu->close();
        ?>
      </div>
      <div class="col-xs-6 col-md-2 text-center" style="padding:20px;">
        <h3>Услуги</h3>
        <?php
          $usl=$mysqli->query("SELECT * FROM uslugi");
          while ($row=$usl->fetch_array()){
        ?>
        <p  class="botlinks text-left"><a href="/usl-full?id=<?=$row['id']?>"><?=$row['usl_ico'],' ',$row['title']?></a></p>
        <?php
          }
          $usl->close();
        ?>
      </div>
      <div class="col-xs-12 col-md-4" style="background:#efa875;padding:20px;">
        <h3 class="text-center">Обратная связь</h3>
        <form class="form-horizontal" method="post" action="/handler/send_mail">
          <div class="form-group">
            <label class="col-sm-4 control-label">Имя</label>
            <div class="col-sm-8">
              <input class="form-control" name="name" placeholder="Имя" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label">E-mail</label>
            <div class="col-sm-8">
              <input type="email" class="form-control" name="email" placeholder="E-mail" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label">Сообщение</label>
            <div class="col-sm-8">
              <textarea class="form-control" rows="3" name="message" placeholder="Введите текст" required></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">
              <button type="submit" class="btn btn-default">Отправить</button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-xs-12 col-md-4" style="padding:20px;">
        <div class="row text-center">
          <div class="col-md-12 botlogo">
            <h2>
              <a href="/"><i class="fa fa-google-wallet" aria-hidden="true"></i> West Web</a>
            </h2>
          </div>
          <div class="col-md-12 soc">
            <p>
              <a href="https://vk.com/west07/"><i class="fa fa-vk" aria-hidden="true"></i></a>
              <a href="https://www.facebook.com/west.toxa/" ><i class="fa fa-facebook" aria-hidden="true"></i></a>
              <a href="https://plus.google.com/105923947116705112928" ><i class="fa fa-google-plus" aria-hidden="true"></i></a>
              <a href="https://www.instagram.com/west.toxa" ><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </p>
          </div>
          <div class="col-md-12">
            <p>
              <small><i class="fa fa-copyright" aria-hidden="true"></i> Все права защищены <?=date("Y")?></small>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<script src="js/jquery.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
<script>
  $("#comm .item:first").add(".item:first").addClass("active");
  $("#slider li:first").addClass("active");
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-101592738-1', 'auto');
  ga('send', 'pageview');

</script>
<?php
  session_start();
  if($_SESSION['nolog']) {
     unset($_SESSION['nolog']);
     echo '<script>swal("","Пользователя не существует", "error");</script>';
  }
  if($_SESSION['badpass']) {
     unset($_SESSION['badpass']);
     echo '<script>swal("","Логин или пароль введены неверно", "error");</script>';
  }
  if($_SESSION['no_reg']) {
     unset($_SESSION['no_reg']);
     echo '<script>swal("","Пользователь с таким email уже зарегистрирован", "error");</script>';
  }
  if($_SESSION['bad_login']) {
     unset($_SESSION['bad_login']);
     echo '<script>swal("","Пользователь с таким логином уже зарегистрирован", "error");</script>';
  }
  if($_SESSION['reg_ok']) {
     unset($_SESSION['reg_ok']);
     echo '<script>swal("","Регистрация пройдена, теперь вы можете войти на сайт", "success");</script>';
  }
?>
</body>
</html>
