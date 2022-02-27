<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>InAct <?= !empty($title) ? "| ".$title : "" ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="shortcut icon" href="<?= base_url('asset/images/logo-no-desc-miniview.png') ?>">
  <link rel="stylesheet" href="<?= base_url("asset/template/bower_components/bootstrap/dist/css/bootstrap.min.css") ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url("asset/template/bower_components/font-awesome/css/font-awesome.min.css") ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url("asset/template/bower_components/Ionicons/css/ionicons.min.css") ?>">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?= base_url("asset/template/bower_components/jvectormap/jquery-jvectormap.css") ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url("asset/template/dist/css/AdminLTE.css?v=1.0") ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url("asset/template/dist/css/skins/_all-skins.css") ?>">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?= base_url("asset/template/plugins/iCheck/all.css") ?>">
  <!-- validation engine -->
  <link rel="stylesheet" href="<?= base_url('asset/plugins/validation-engine/validationEngine.jquery.css') ?>">
  <!-- custom css -->
  <link rel="stylesheet" href="<?= base_url('asset/css/custom_style.css?v=0.2') ?>">
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <?php
    if(!empty($externalCSS)){
      foreach ($externalCSS as $linkcss) {
        echo '<link rel="stylesheet" href="'.$linkcss.'">';
      }
    }
  ?>
  <script src="<?= base_url("asset/template/bower_components/jquery/dist/jquery.min.js") ?>"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?= base_url("asset/template/bower_components/bootstrap/dist/js/bootstrap.min.js") ?>"></script>
  <!-- FastClick -->
  <script src="<?= base_url("asset/template/bower_components/fastclick/lib/fastclick.js") ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url("asset/template/dist/js/adminlte.min.js") ?>"></script>
  <!-- Sparkline -->
  <script src="<?= base_url("asset/template/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js") ?>"></script>
  <!-- jvectormap  -->
  <script src="<?= base_url("asset/template/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js") ?>"></script>
  <script src="<?= base_url("asset/template/plugins/jvectormap/jquery-jvectormap-world-mill-en.js") ?>"></script>
  <!-- SlimScroll -->
  <script src="<?= base_url("asset/template/bower_components/jquery-slimscroll/jquery.slimscroll.min.js") ?>"></script>
  <!-- iCheck 1.0.1 -->
  <script src="<?= base_url("asset/template/plugins/iCheck/icheck.min.js") ?>"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes)
  <script src="<?= base_url("asset/template/dist/js/pages/dashboard2.js") ?>"></script>
  -->
  <!-- validation engine -->
  <script src="<?= base_url('asset/plugins/validation-engine/jquery.validationEngine.js') ?>"></script>
  <script src="<?= base_url('asset/plugins/validation-engine/jquery.validationEngine-id.js') ?>"></script>
  <script src="<?= base_url('asset/js/common.js') ?>"></script>
  <?php
  if(!empty($varJS)){
    echo '<script type="text/javascript">';
    foreach ($varJS as $varJSName => $varJSVal) {
      echo 'var '.$varJSName.' = "'.$varJSVal.'";';
    }
    echo '</script>';
  }
  if(!empty($externalJS)){
    foreach ($externalJS as $linkjs) {
      echo '<script src="'.$linkjs.'"></script>';
    }
  }
  ?>
  <style>
  .spin-this {
    animation-name: spin;
    animation-duration: 200ms;
    animation-iteration-count: infinite;
    animation-timing-function: linear;
    /* transform: rotate(3deg); */
     /* transform: rotate(0.3rad);/ */
     /* transform: rotate(3grad); */
     /* transform: rotate(.03turn);  */
  }
  @keyframes spin {
    from {
      transform:rotate(0deg);
    }
    to {
      transform:rotate(360deg);
    }
  }
  .lds-dual-ring {
  display: inline-block;
  width: 80px;
  height: 80px;
}
.lds-dual-ring:after {
  content: " ";
  display: block;
  position:relative;
  width: 64px;
  height: 64px;
  margin: 8px;
  border-radius: 50%;
  border: 6px solid #616161;
  border-color: #616161 transparent #616161 transparent;
  animation: lds-dual-ring 1.2s linear infinite;
}
@keyframes lds-dual-ring {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

  </style>
</head>


<body class="hold-transition skin-inact fixed sidebar-mini <?= get_cookie('classCollapse') ?>">


<div class="loading">Loading&#8230;</div>
<div class="wrapper">
<div id="loader" style="display:none;position  : fixed;top: 0;left: 0;width: 100%;height: 100%;z-index: 9998;background-color:rgba(255, 255, 255, 0.5)">
    <div style="padding-top:20%;padding-left:50%;" class="lds-dual-ring">
      <div></div>
      <div></div>
      <div></div>
    </div>

  </div>
  <header class="main-header">

    <!-- Logo -->
    <a href="<?= base_url() ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="<?= base_url("asset/images/interactive-miniview.png") ?>" width="30px"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="<?= base_url("asset/images/interactive.png") ?>" width="150px"></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" onclick="toggleMenu()" class="sidebar-toggle" data-toggle="push-menu" role="button" style="font-weight:bold;">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
		      &nbsp;<?= strtoupper($this->session->userdata("ses_companyname")) ?>
      </a>
      <?php
      $dataNotif = getNotif($this->session->userdata('ses_appid'));

      ?>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <?= ($dataNotif->num_rows()>0) ? '<span class="label label-warning">'.$dataNotif->num_rows().'</span>' : '' ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header"><?= ($dataNotif->num_rows()==0) ? $this->gtrans->line("You have no notifications") : $this->gtrans->line("You have")." ".$dataNotif->num_rows()." ".$this->gtrans->line("Notifications") ?></li>
              <li>

                <ul class="menu">
                  <?php
                    foreach ($dataNotif->result() as $row) {
                      echo '<li>
                              <a href="#" onclick="showDetailNotification(\''.$this->encryption_org->encode($row->notif_id).'\')">
                                <i class="fa fa-info text-aqua"></i> '.$row->notif_header.'
                              </a>
                            </li>';
                    }
                  ?>

                </ul>
              </li>
              <li class="footer"><a href="<?= base_url("notifications") ?>"><?= $this->gtrans->line("View all") ?></a></li>
            </ul>
          </li>
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-language"></i> <?= !empty($this->session->userdata('lang')) ? strtoupper($this->session->userdata('lang')) :"EN" ?>
            </a>
            <ul class="dropdown-menu">
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#" onclick="changeLanguage('id')">
                      INDONESIAN
                    </a>
                  </li>
                  <li>
                    <a href="#" onclick="changeLanguage('en')">
                      ENGLISH
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?= (!empty($this->session->userdata("ses_userImage"))) ? base_url("sys_upload/userpic/".$this->session->userdata("ses_userImage")) : base_url("asset/images/admin-icon.png") ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= ucwords($this->session->userdata("ses_username")) ?></span>
            </a>
            <ul class="dropdown-menu" style="background-color:#039be5">
              <!-- User image -->
              <li class="user-header">
                <img src="<?= (!empty($this->session->userdata("ses_userImage"))) ? base_url("sys_upload/userpic/".$this->session->userdata("ses_userImage")) : base_url("asset/images/admin-icon.png") ?>" class="img-circle" alt="User Image">

                <p>
                  <?= ucwords($this->session->userdata("ses_username")) ?>
                  <small><?= ucwords($this->session->userdata("ses_companyname")) ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-6 text-center">
                    <a href="<?= base_url("user-profile"); ?>" style=""><i class="fa  fa-gears"></i> Profile</a>
                  </div>
                  <div class="col-xs-6 text-center">
                    <a href="<?= base_url('logout'); ?>" style="color:#fff !important;"><i class="fa fa-sign-out"></i> <?= $this->gtrans->line("Sign out"); ?></a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
            </ul>
          </li>
          <!--
          Control Sidebar Toggle Button
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
          -->
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <ul class="sidebar-menu" data-widget="tree">
        <?= !empty($listMenu) ? $listMenu : "" ?>
        <li><a href="<?= base_url("help?im=sax") ?>"  ><i class="fa fa-comments"></i><span> <?= $this->gtrans->line('Help') ?></span></a></li>
        <li><a href="<?= base_url("about-us?im=sa") ?>"  ><i class="fa fa-info"></i><span> <?= $this->gtrans->line('About Us') ?></span></a></li>
        <li><a href="<?= base_url("logout") ?>"  ><i class="fa fa-sign-out"></i><span> <?= $this->gtrans->line('Sign Out') ?></span></a></li>
        <li class="header">
          INACT Version <?= APP_VERSION ?>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php
    if(!empty($content)){
      $this->load->view($content,$viewData);
    }
    ?>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> <?= APP_VERSION ?>
    </div>
    <strong>Copyright &copy; <?= createProductionDate(2019) ?> <a href="https://interactive.co.id" target="_blank">InterActive Technologies Corp</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->

      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<div class="modal fade" id="modal-notif">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            <h4 class="modal-title"><span id="notif-title"></span></h4>
      </div>
      <div class="modal-body">
          <span id="notif-content">
      </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
    </div>
  </div>
  </div>
</div>

<!-- ./wrapper -->

<!-- jQuery 3 -->

<script type="text/javascript">

//$(function () {
  $('[data-toggle="tooltip"]').tooltip()
//})
$("#form-validation").validationEngine();
//Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })
function showDetailNotification(notifId){
  $.ajax({
    method : "POST",
    url    : "<?= base_url('notification-open'); ?>",
    data   : {id:notifId},
    success : function (res){
      var obj = $.parseJSON(res);
      $("#notif-title").html(obj.title);
      $("#notif-content").html(obj.content);
      $("#modal-notif").modal('show');
    }
  });
}
function renewSession(){
  $("#btn-refresh-session").addClass("spin-this");
  $.ajax({
    method : "POST",
    url : "<?= base_url('renew-session'); ?>",
    success : function(res){
      if(res=="OK"){
        $("#btn-refresh-session").removeClass("spin-this");
      }
    }
  });
}
function changeLanguage(lang){
  $.ajax({
    method : "POST",
    url : "<?= base_url('change-language'); ?>",
    data : {lang:lang},
    success : function(res) {
      
      if(res=="OK"){
        location.reload();
      }
    }
  });
}

function toggleMenu(){
  var menuIsOpen = $("body").hasClass("sidebar-collapse");

  if(menuIsOpen==true){
    setCookie("classCollapse","",7);
  }else{
    setCookie("classCollapse","sidebar-collapse",7);
  }
}
</script>
</body>
</html>
