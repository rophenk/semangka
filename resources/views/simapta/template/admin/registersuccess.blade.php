<?php
$path = app_path();
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Login SIMAPTA</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
{!! Html::style('simapta/assets/global/plugins/font-awesome/css/font-awesome.min.css') !!}
{!! Html::style('simapta/assets/global/plugins/simple-line-icons/simple-line-icons.min.css') !!}
{!! Html::style('simapta/assets/global/plugins/bootstrap/css/bootstrap.min.css') !!}
{!! Html::style('simapta/assets/global/plugins/uniform/css/uniform.default.css') !!}
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
{!! Html::style('simapta/assets/admin/pages/css/login.css') !!}
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
{!! Html::style('simapta/assets/global/css/components-md.css') !!}
{!! Html::style('simapta/assets/global/css/components-md.css') !!}
{!! Html::style('simapta/assets/global/css/plugins-md.css') !!}
{!! Html::style('simapta/assets/admin/layout/css/layout.css') !!}
{!! Html::style('simapta/assets/admin/layout/css/themes/default.css') !!}
{!! Html::style('simapta/assets/admin/layout/css/custom.css') !!}
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-md login">
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGO -->
<div class="logo">
	<a href="index.html">
	<img src="{{ URL::asset('simapta/assets/admin/layout2/img/logo-big.png') }}" alt=""/>
	</a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
	<h1>Registrasi Sukses</h1>
	Mohon tunggu 1 x 24 Jam hari kerja untuk diverifikasi dan diaktifkan oleh administrator
</div>
<div class="copyright">
	 2015 © Kementerian Pertanian Indonesia.
</div>
<!-- END LOGIN -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
{!! Html::script('simapta/assets/global/plugins/jquery.min.js') !!}
{!! Html::script('simapta/assets/global/plugins/jquery-migrate.min.js') !!}
{!! Html::script('simapta/assets/global/plugins/bootstrap/js/bootstrap.min.js') !!}
{!! Html::script('simapta/assets/global/plugins/jquery.blockui.min.js') !!}
{!! Html::script('simapta/assets/global/plugins/uniform/jquery.uniform.min.js') !!}
{!! Html::script('simapta/assets/global/plugins/jquery.cokie.min.js') !!}
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
{!! Html::script('simapta/assets/global/plugins/jquery-validation/js/jquery.validate.min.js') !!}
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
{!! Html::script('simapta/assets/global/scripts/metronic.js') !!}
{!! Html::script('simapta/assets/admin/layout/scripts/layout.js') !!}
{!! Html::script('simapta/assets/admin/layout/scripts/demo.js') !!}
{!! Html::script('simapta/assets/admin/pages/scripts/login.js') !!}
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {     
Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Login.init();
Demo.init();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>