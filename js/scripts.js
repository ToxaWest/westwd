$(document).ready(function() {
  var pathname = window.location.pathname;
  $('.nav > li > a[href="'+pathname+'"]').parent().addClass('active');
});
function readURL(input) {
   if (input.files && input.files[0]) {
       var reader = new FileReader();
       reader.onload = function (e) {
           $('#blah').attr('src', e.target.result);
       }
       reader.readAsDataURL(input.files[0]);
   }
};
$("#imgInp").change(function(){
   readURL(this);
});
window.onload = function () {
  $('.cbalink').css("display", "none");
};
function responseLogin(){
    $.ajax({
        type: "POST",
        url: "handler/check.php",
        data: { action: 'login', login: document.reg.login.value },
        cache: false,
        success: function(response){
            if(response == 'on'){
              $("#icoCheckLogin").removeClass( "glyphicon-ok" );
              $("#logincheck").removeClass( "has-success" );
                $("#icoCheckLogin").addClass( "glyphicon-remove" );
                $("#logincheck").addClass( "has-error" );
                $("#butdis").attr("disabled","disabled");
                swal("","Логин занят", "error");
                document.reg.releLogin.value = 'off';
            }
            else{
              $("#icoCheckLogin").removeClass( "glyphicon-remove" );
              $("#logincheck").removeClass( "has-error" );
              $("#icoCheckLogin").addClass( "glyphicon-ok" );
              $("#logincheck").addClass( "has-success" );
              $("#butdis").prop('disabled', false);
              document.reg.releLogin.value = 'on';
            };
        }
    });
};
function responseEmail(){
      $.ajax({
          type: "POST",
          url: "handler/check.php",
          data: { action: 'email', email: document.reg.email.value },
          cache: false,
          success: function(response){
              if(response == 'on'){
                $("#icoCheckEmail").removeClass( "glyphicon-ok" );
                $("#emailcheck").removeClass( "has-success" );
                  $("#icoCheckEmail").addClass( "glyphicon-remove" );
                  $("#emailcheck").addClass( "has-error" );
                  swal("","Email занят", "error");
                  $("#butdis").attr("disabled","disabled");

                  document.reg.releEmail.value = 'off';
                }
              else{
                $("#icoCheckEmail").removeClass( "glyphicon-remove" );
                $("#emailcheck").removeClass( "has-error" );
                $("#icoCheckEmail").addClass( "glyphicon-ok" );
                $("#emailcheck").addClass( "has-success" );
                $("#butdis").prop('disabled', false);
                document.reg.releEmail.value = 'on';
              };
          }
      });
  };
function checkpass(){
    $.ajax({
        type: "POST",
        url: "handler/check.php",
        data: { action: 'password',
         password: document.reg.password.value,
         pass: document.reg.pass.value  },
        cache: false,
        success: function(response){
            if(response == 'off'){
              $("#textCheckPass").text("Пароли не совпадают").css("color","red");
              $("#icoCheckPass").removeClass( "glyphicon-ok" );
              $("#passcheck").removeClass( "has-success" );
              $("#icoCheckPass").addClass( "glyphicon-remove" );
              $("#passcheck").addClass( "has-error" );
              $("#butdis").attr("disabled","disabled");
              swal("","Пароли не совпадают", "error");

            }
            else{
              $("#textCheckPass").text("");
              $("#icoCheckPass").removeClass( "glyphicon-remove" );
              $("#passcheck").removeClass( "has-error" );
              $("#icoCheckPass").addClass( "glyphicon-ok" );
              $("#passcheck").addClass( "has-success" );
              $("#butdis").prop('disabled', false);
            };
        }
    });
};
