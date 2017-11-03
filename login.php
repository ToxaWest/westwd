<form class="form-horizontal" action="handler/login" method="post">
  <div class="form-group">
    <label class="col-sm-2 control-label">Логин</label>
    <div class="col-sm-10">
      <input name="login" class="form-control" placeholder="Login" required>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Пароль</label>
    <div class="col-sm-10">
      <input name="password" type="password" class="form-control" placeholder="Password" required>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Войти</button>
    </div>
  </div>
</form>
