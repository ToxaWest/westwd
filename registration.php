  <form name="reg" class="form-horizontal"  action="handler/registration.php" method="post" enctype="multipart/form-data">
    <div class="form-group has-feedback" id="logincheck">
      <label class="col-sm-3 control-label">Логин</label>
      <div class="col-sm-9">
        <input name="login" class="form-control" placeholder="Login" onchange="responseLogin();" required>
        <span id="icoCheckLogin" class="glyphicon form-control-feedback" ></span>
      </div>
    </div>
    <div class="form-group has-feedback" id="emailcheck">
      <label class="col-sm-3 control-label">Email</label>
      <div class="col-sm-9">
        <input name="email" type="email" class="form-control" placeholder="Email"  onchange="responseEmail();" required>
        <span id="icoCheckEmail" class="glyphicon form-control-feedback" ></span>
      </div>
    </div>
    <div class="form-group ">
      <label class="col-sm-3 control-label">Пароль</label>
      <div class="col-sm-9">
        <input name="password" type="password" class="form-control" placeholder="Password" required>
      </div>
    </div>
    <div class="form-group has-feedback" id="passcheck">
      <label class="col-sm-3 control-label">Подтверждение пароля</label>
      <div class="col-sm-9">
        <input name="pass" type="password" class="form-control" onchange="checkpass();" placeholder="password" required>
        <span id="icoCheckPass" class="glyphicon form-control-feedback" ></span>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Имя</label>
      <div class="col-sm-9">
        <input name="name" class="form-control" placeholder="Name">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Фамилия</label>
      <div class="col-sm-9">
        <input name="surename" class="form-control" placeholder="Surename">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Страна</label>
      <div class="col-sm-9">
        <select name="country" class="form-control">
          <option disabled selected hidden >Country</option>
          <option>Украина</option>
          <option>Россия</option>
          <option>Беларусь</option>
          <option>Остальные</option>
        </select>
      </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Выберите аватар:<br></label>
      <div class="col-sm-9">
        <div class="row">
          <div class="col-md-5">
            <img id="blah" src="users/avatars/user.png" alt="your image" class="img-thumbnail" style="width:100%;margin-bottom:10px;"/>
          </div>
          <div class="col-sm-7">
            <label class="btn btn-warning btn-file">
              Выбрать<input type="file" id="imgInp" name="somename" style="position: absolute;z-index: -999999;    left: -500px;">
          </label>
          </div>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-9">
        <button type="submit" class="btn btn-default" id="butdis">Зарегистрироваться</button>
      </div>
    </div>
  </form>
