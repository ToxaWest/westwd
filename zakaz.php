<?php
  $page_name="zakaz";
  include "header.php";
  include "handler/mysql.php";
?>
<div class="col-md-offset-2 col-md-8" style="padding:5px;">
  <h1 class="text-center">Заказ сайта</h1>
  <form class="form-horizontal"  action="handler/registration.php" method="post" style="padding:5px;">
    <div class="form-group col-sm-12">
      <div class="col-sm-4">
        <input name="name" type="name" class="form-control" placeholder="Ваше имя" required>
      </div>
      <div class="col-sm-4">
        <input name="email2" type="email" class="form-control" placeholder="Email" required>
      </div>
      <div class="col-sm-4">
        <input name="tel" type="tel" class="form-control" placeholder="Номер телефона" >
      </div>
    </div>
    <div class="form-group col-sm-12">
      <div class="col-sm-6">
        <input name="link" type="text" class="form-control" placeholder="Желаемое имя сайта" required>
      </div>
      <div class="col-sm-6">
        <select name="type" class="form-control">
          <option disabled selected hidden >Выберите тип сайта</option>
          <option>Блог</option>
          <option>Landing page</option>
          <option>Сайт визитка</option>
          <option>Игровой портал</option>
          <option>Портфолио</option>
          <option>Интернет магазин</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-9">
        <button type="submit" class="btn btn-warning">Оформить заказ</button>
      </div>
    </div>
  </form>
</div>
<?php
  include "footer.php";
?>
