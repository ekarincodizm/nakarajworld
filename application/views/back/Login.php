<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php
  	//css
  	$this->debuger->load_back_plugins_css('bootstrap/css/bootstrap');
  	$this->debuger->load_back_plugins_css('node-waves/waves.min');
  	$this->debuger->load_back_plugins_css('animate-css/animate.min');
  	$this->debuger->load_back_plugins_css('jquery-datatable/skin/bootstrap/css/dataTables.bootstrap');
  	$this->debuger->load_back_css('style.min');
  	$this->debuger->load_back_plugins_css('jquery-datatable/skin/bootstrap/css/dataTables.bootstrap');
  	$this->debuger->load_back_css('themes/theme-cyan.min');

  	$this->debuger->load_back_css('iconfont/material-icons');
  	$this->debuger->load_back_css('materialize');
  	$this->debuger->front_load_css('thsarabunnew');


  	$this->debuger->front_load_js('angular.min');
  	$this->debuger->front_load_js('angular-locale_th');
  	$this->debuger->front_load_js('angular-animate');
  	$this->debuger->front_load_js('angular-sanitize');
  	?>
  </head>
  <body class="signup-page ls-closed">
    <div class="signup-box">
        <div class="logo">
            <h1 class="text-center">นว ดรากอน</h1>
            <!-- <small>Admin BootStrap Based - Material Design</small> -->
        </div>
        <div class="card">
            <div class="body">
          
                <?php echo form_open('/Admin/AuthenAdmin'); ?>
                    <!-- <div class="msg">Register a new membership</div> -->
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="admin_username"  required="" autofocus="" aria-required="true">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="admin_password"  required="" aria-required="true">
                        </div>
                    </div>
                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">เข้าสู่ระบบ</button>
                    <div class="m-t-25 m-b--5 align-center">
                        <!-- <a href="sign-in.html">You already have a membership?</a> -->
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>

    <?php
    // <!-- Jquery Core Js -->
    $this->debuger->load_back_plugins('jquery/jquery.min');

    // <!-- Bootstrap Core Js -->
    $this->debuger->load_back_plugins('bootstrap/js/bootstrap');

    // <!-- Select Plugin Js -->
    $this->debuger->load_back_plugins('bootstrap-select/js/bootstrap-select');

    // <!-- Slimscroll Plugin Js -->
    $this->debuger->load_back_plugins('jquery-slimscroll/jquery.slimscroll');

    // <!-- Waves Effect Plugin Js -->
    $this->debuger->load_back_plugins('node-waves/waves');

    // <!-- Jquery DataTable Plugin Js -->
    $this->debuger->load_back_plugins('jquery-datatable/jquery.dataTables');
    $this->debuger->load_back_plugins('jquery-datatable/skin/bootstrap/js/dataTables.bootstrap');
    $this->debuger->load_back_plugins('jquery-datatable/extensions/export/dataTables.buttons.min');
    $this->debuger->load_back_plugins('jquery-datatable/extensions/export/buttons.print.min');


    ?>


</body>
</html>
