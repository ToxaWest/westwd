<div class="row" style="margin:auto;">
  <div class="col-md-12">
    <h1 style="text-align: center;padding: 20px;">Последние Комментарии</h1>
  </div>
  <div id="comm" class="carousel slide" data-ride="carousel" style="display: inline-block;width: 100%;">
    <div class="carousel-inner">
      <?php
        $last=$mysqli->query("SELECT * FROM comments ORDER BY date_comment desc LIMIT 6");
        while($row=$last->fetch_array()){
        $email=$row['email'];
        $logins=$row['name'];
        $first=$row['date_comment'];
        if($email==""){
          $result2 = $mysqli->query("SELECT avatar , id FROM users WHERE login='$logins'");
          $row2 = $result2->fetch_array();
          $img=$row2['avatar'];
          $user_id=$row2['id'];
          $result2->close();
          $login = '<a href="user?id='.$user_id.'">'.$logins.'</a>';
        }
        else {
          $img='user.png';
          $login =$logins;
        };
        $id=$row['page_id'];
        $port = $mysqli->query("SELECT title FROM progect WHERE id=$id")->fetch_array();
        $article=$port['title'];
      ?>
      <div class="item">
        <div class="col-xs-12" style="padding:0 10%;">
          <div class="col-xs-12" style="border:2px solid #eee;margin-right: -15px;padding-right: 0;">
            <div class="col-xs-9">
              <h2 style="display: inline-block;"><?=$login;?></h2>
              <span> К проекту <a href="podr?id=<?=$id;?>"><?=$article;?></a></span>
              <hr style="margin:0;">
              <p><?=$row['text_comment'];?></p>
            </div>
            <div class="col-xs-3" style="padding-right:0;">
              <img src="/users/avatars/<?=$img ?>" alt="<?=$logins;?>" style="padding:3px;max-height: 160px; float: right;" class="img-rounded img-responsive" />
            </div>
          </div>
        </div>
      </div>
      <?php
        };
        $last->close();
      ?>
    </div>
    <a class="left carousel-control" style="background:none;color: #ef8335;" href="#comm" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" style="background:none;color: #ef8335;" href="#comm" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
  </div>
  <hr>
</div>
