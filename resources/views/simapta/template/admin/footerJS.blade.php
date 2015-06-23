<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
{!! Html::script('simapta/assets/global/plugins/jquery.min.js') !!}
{!! Html::script('simapta/assets/global/plugins/jquery-migrate.min.js') !!}
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
{!! Html::script('simapta/assets/global/plugins/jquery-ui/jquery-ui.min.js') !!}
{!! Html::script('simapta/assets/global/plugins/bootstrap/js/bootstrap.min.js') !!}
{!! Html::script('simapta/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') !!}
{!! Html::script('simapta/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') !!}
{!! Html::script('simapta/assets/global/plugins/jquery.blockui.min.js') !!}
{!! Html::script('simapta/assets/global/plugins/jquery.cokie.min.js') !!}
{!! Html::script('simapta/assets/global/plugins/uniform/jquery.uniform.min.js') !!}
{!! Html::script('simapta/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') !!}
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
@yield('pluginscript')
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
{!! Html::script('simapta/assets/global/scripts/metronic.js') !!}
{!! Html::script('simapta/assets/admin/layout2/scripts/layout.js') !!}
{!! Html::script('simapta/assets/admin/layout2/scripts/demo.js') !!}
@yield('pagescript')

<!-- END JAVASCRIPTS -->