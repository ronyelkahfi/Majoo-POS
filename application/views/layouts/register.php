<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>InAct | User Registration</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="shortcut icon" href="<?= base_url('asset/images/logo-no-desc-miniview.png') ?>">
  <link rel="stylesheet" href="<?= base_url('asset/template/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('asset/template/bower_components/font-awesome/css/font-awesome.min.css') ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url('asset/template/bower_components/Ionicons/css/ionicons.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('asset/template/dist/css/AdminLTE.css') ?>">
  <link rel="stylesheet" href="<?= base_url('asset/css/custom_style.css?v=0.2') ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url('asset/template/plugins/iCheck/square/blue.css') ?>">
  <!-- validation engine -->
  <link rel="stylesheet" href="<?= base_url('asset/plugins/validation-engine/validationEngine.jquery.css') ?>">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- jQuery 3 -->
  <script src="<?= base_url('asset/template/bower_components/jquery/dist/jquery.min.js') ?>"></script>
  <style>
    .show-password-container{
      text-align: right;
    }
    .show-password{
      cursor: pointer;
    }
    .has-feedback {
      position:relative;
    }

    .has-feedback .form-control {
      padding-right:42.5px;
    }

    .form-control-feedback {
      position:absolute;
      top:0px;
      right:2px;
      z-index:2;
      display:block;
      width:34px;
      height:34px;
      line-height:34px;
      text-align:center;
      cursor:pointer;
      pointer-events:initial;
    }
    .has-bg{
      background-image: url('<?= base_url("asset/images/register-bg.jpg") ?>');
      background-size: cover;
    }
  </style>
</head>
<body class="hold-transition register-page has-bg">
<div class="register-box">

  <div class="register-box-body">
    <div class="row">
      <div class="col-md-12" style="text-align:center">
        <a href="<?= base_url() ?>"><img src="<?= base_url("asset/images/logo.png") ?>" width="75px"></a>
      </div>
      <div class="col-md-12">
        <p class="login-box-msg">Member Registration</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="registration-msg">
        </div>
        <div class="callout callout-info" id="divMayus" style="display:none">
          <h4><i class="fa fa-lock"></i> Capslock Is On</h4>
        </div>
        <?= form_open("register-auth",["id"=>"form-validation"]); ?>
        <div class="form-group has-feedback">
          <input data-validation-engine="validate[required,custom[onlyLetterNumberSemiSpesial]]" name="company-name" type="text" class="form-control" placeholder="Company Name">
          <span class="glyphicon glyphicon-briefcase form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <select name="company-size" data-validation-engine="validate[required]" class="form-control">
            <option selected disabled value="" >Company Size</option>
            <option>1 - 100</option>
            <option>101 - 500</option>
            <option>501 - 1000</option>
            <option>1000+</option>
          </select>
        </div>
        <div class="form-group has-feedback">
          <input data-validation-engine="validate[required,custom[onlyLetterNumberSemiSpesial]]" name="full-name" type="text" class="form-control" placeholder="Full name">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input id="email" onchange="checkEmailExist()" data-validation-engine="validate[required,custom[email]]" name="email" type="email" class="form-control" placeholder="Email">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          <div id="email-exist-msg"></div>
        </div>
        <div class="form-group has-feedback">
          <input data-validation-engine="validate[required,custom[phone],maxSize[15]]" name="phone" autocomplete="off" type="text" class="form-control" placeholder="Phone">
          <span class="glyphicon glyphicon-phone form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback field-loginform-password required">
          <input onkeypress="capLock(event)" id="password" data-validation-engine="validate[required,minSize[8]]" name="password" autocomplete="off" type="password" class="form-control" placeholder="Password">
          <span class="fa fa-eye form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback field-loginform-password required">
          <input onkeypress="capLock(event)" id="repassword" data-validation-engine="validate[required,minSize[8]]" name="repassword" type="password" class="form-control" placeholder="Retype password">
          <span class="fa fa-eye form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8" onclick="">
            <a href="<?= base_url("login") ?>" class="text-center"><i class="fa fa-long-arrow-left"></i> Back To Login</a>
          </div>
          <div class="col-xs-4">
            <button type="submit" name="submit" value="submit" id="btnSubmit" class="btn btn-primary btn-block btn-flat">Register</button>
          </div>
        </div>

      </form>
      </div>
    </div>
  </div>
  <div class="footer-logo">
    <div class="footer-developed-by" style="color:#000;font-weight:bold">Developed By</div>
    <a class="footer-logo" href="https://interactive.co.id" title="interactive.co.id" target="_blank"><img src="<?= base_url('asset/images/interactive.png') ?>"></a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('asset/template/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- iCheck -->
<script src="<?= base_url('asset/template/plugins/iCheck/icheck.min.js') ?>"></script>
<!-- validation engine -->
<script src="<?= base_url('asset/plugins/validation-engine/jquery.validationEngine.js') ?>"></script>
<script src="<?= base_url('asset/plugins/validation-engine/jquery.validationEngine-id.js') ?>"></script>
<script type="text/javascript">
function capLock(e){
  var kc = e.keyCode ? e.keyCode : e.which;
  var sk = e.shiftKey ? e.shiftKey : kc === 16;
  var display = ((kc >= 65 && kc <= 90) && !sk) ||
      ((kc >= 97 && kc <= 122) && sk) ? 'block' : 'none';
      document.getElementById('divMayus').style.display = display
  }
  var url = "<?= base_url() ?>";
  function checkEmailExist(){
    var email = $("#email").val();
    $.ajax({
      method : "POST",
      url    : url + "checkEmailExist",
      data   : {email:email},
      success: function(res){
        if(res=="Exist"){
          $("#email").val("");
          $("#email-exist-msg").html('<p style="color:red">Email is used By Another User!</p>');
        }else{
          $("#email-exist-msg").html('<p style="color:green">Email Available!</p>');
        }
      }
    });
  }
  $("#form-validation").validationEngine();
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });

  function togglePassword(passwordID,labelToggleID,temp){

    if($("#"+temp).val()=="hide"){
      $("#"+temp).val("show");
      $("#"+passwordID).attr("type","text");
      $("#"+labelToggleID).html("HIDE");
    }else{
      $("#"+temp).val("hide");
      $("#"+passwordID).attr("type","password");
      $("#"+labelToggleID).html("SHOW");
    }
  }
  togglePassword('password','label-toggle-password','tempToggle1')
  togglePassword('repassword','re-label-toggle-password','tempToggle2')
  $(document).ready(function(){
    $('.form-control-feedback').click(function() {
      var attr = $(this).siblings('input').attr('type');
      if (attr == 'password') {
        $(this).siblings('input').attr('type', 'text');
        $(this).removeClass('far fa-eye');
        $(this).addClass('far fa-eye-slash');
      } else {
        $(this).siblings('input').attr('type', 'password');
        $(this).removeClass('far fa-eye-slash');
        $(this).addClass('far fa-eye');
      }
    });
  });
  /*
  function validatePassword(){
    var password = $("#password").val();
    var repassword = $("#repassword").val();
    if(password==repassword){
      return true;
    }else{
      $(".registration-msg").html('<div class="col-md-12"><div class="callout callout-danger">'+
                                    '<p>Password Not Match</p>'+
                                  '</div></div>');
      return false;
    }
  }
  stat = 0;
      jQuery("#form-validation").validationEngine('attach', {
        onValidationComplete: function(form, status){

          if(status==true){
            stat = stat + 1;
            if(stat%2==0){
              validatePassword();

            }
          }
        }
      });
      */
</script>

</body>
</html>
