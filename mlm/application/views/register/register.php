<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

  <!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>MLM | Register</title>

  <!-- Tell the browser to be responsive to screen width -->

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Bootstrap 3.3.7 -->

  <link rel="stylesheet" href="<?=base_url('public')?>/components/bootstrap/dist/css/bootstrap.min.css">

  <!-- Font Awesome -->

  <link rel="stylesheet" href="<?=base_url('public')?>/components/font-awesome/css/font-awesome.min.css">

  <!-- Ionicons -->

  <link rel="stylesheet" href="<?=base_url('public')?>/components/Ionicons/css/ionicons.min.css">

  <!-- Theme style -->

  <link rel="stylesheet" href="<?=base_url('public')?>/dist/css/AdminLTE.min.css">

  <!-- iCheck -->

  <link rel="stylesheet" href="<?=base_url('public')?>/plugins/iCheck/square/blue.css">

  <!-- Google Font -->

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <style>
    #register-success-box {
      margin: 7% 0;
    }
  </style>

</head>

<body class="hold-transition login-page">

<div class="login-box">

  <div class="login-logo">

    <a href="<?=base_url();?>"><b>MLM</b></a>

  </div>

  <!-- /.login-logo -->

  <div class="login-box-body">

    <p class="login-box-msg">Register a new membership</p>



    <form id="register-form">
    <!-- <?php echo form_open('do-register');?> -->

      <div class="form-group has-feedback">
        <input type="text" name="username" required class="form-control" placeholder="Username" value="<?php echo set_value('username'); ?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <span id="error-username" class="help-block" style="color:red;"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="text" name="fullname" required class="form-control" placeholder="Full Name" value="<?php echo set_value('fullname'); ?>">
        <span class="glyphicon glyphicon-info-sign form-control-feedback"></span>
        <span id="error-fullname" class="help-block" style="color:red;"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email'); ?>">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <span id="error-email" class="help-block" style="color:red;"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" name="password" required class="form-control" placeholder="Password" >
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <span id="error-password" class="help-block" style="color:red;"></span>
      </div>

      <div class="row">

        <div class="col-xs-8">

          <div class="checkbox icheck">

           <!-- <label>

              <input type="checkbox"> Remember Me

            </label>-->

          </div>

        </div>

        

        <!-- /.col -->

        <div class="col-xs-4">

          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>

        </div>

        <!-- /.col -->

      </div>

    </form>

    <a href="<?=base_url();?>">I already have a membership</a><br>

  </div>

  <!-- /.login-box-body -->

</div>

<!-- /.login-box -->

<div id="register-success-box" class="row">
  <div class="col-md-3">
  </div>
  <div class="col-md-6">
  <div class="login-logo">
    <a href="<?=base_url();?>"><b>MLM</b></a>
  </div>
  <div class="box box-success">
      <div class="box-header">
        <h2 class="box-title">Confirm Your Email</h2>
      </div>
      <div class="box-body">
        Thank you for register success member. 
        <br> An email has sent to you, please check and confirm.
      </div>
      <div class="box-footer">
        <button type="submit" class="btn btn-success btn-block btn-flat">Resend Email</button>
      </div>
      <!-- /.box-body -->
    </div>
  </div>
  <div class="col-md-3">
  </div>
</div>

<!-- jQuery 3 -->
<script src="<?=base_url('public')?>/components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url('public')?>/components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?=base_url('public')?>/plugins/iCheck/icheck.min.js"></script>
<script src="<?=base_url('public');?>/loadingoverlap/loadingoverlay.min.js"></script>
<script src="<?=base_url('public');?>/loadingoverlap/loadingoverlay_progress.min.js"></script>

<script>

  $(function () {

    $('input').iCheck({

      checkboxClass: 'icheckbox_square-blue',

      radioClass: 'iradio_square-blue',

      increaseArea: '20%' // optional

    });

  });

</script>

<script>
  $('#register-success-box').hide();
  $("#register-form").submit(function (e) {
    $(".login-box-body").LoadingOverlay("show");
    e.preventDefault();
    $.ajax({
      dataType : "json",
      type : "post",
      data : $("#register-form").serialize(),
      headers: {  'Authorization': '<?=$this->security->get_csrf_hash();?>'},
      url: '<?=base_url('do-register');?>',
      success: function(res) {
        $(".login-box-body").LoadingOverlay("hide");
        if (res['status'] == 0) {
          $('#error-username').html(res.data['username']);
          $('#error-fullname').html(res.data['fullname']);
          $('#error-email').html(res.data['email']);
          $('#error-password').html(res.data['password']);
        } else {
          $('.login-box').hide();
          $('#register-success-box').show();
        }
      }
    })
  });
</script>

</body>

</html>