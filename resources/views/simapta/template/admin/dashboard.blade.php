@extends('simapta.template.admin.master')
@section('title', 'Dashboard' )
@section('breadcrumb')

						<li>
							<a href="/dashboard">Dashboard</a>
						</li>
@endsection

@section('dashboard-active')
active
@endsection

@section('dashboard-selected')
<span class="selected"></span>
@endsection

@section('content')
<!-- BEGIN DASHBOARD STATS -->
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<a class="dashboard-stat dashboard-stat-light blue-soft" href="javascript:;">
						<div class="visual">
							<i class="fa fa-file"></i>
						</div>
						<div class="details">
							<div class="number">
								 10
							</div>
							<div class="desc">
								 Dokumen terindex
							</div>
						</div>
						</a>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<a class="dashboard-stat dashboard-stat-light red-soft" href="javascript:;">
						<div class="visual">
							<i class="fa fa-code"></i>
						</div>
						<div class="details">
							<div class="number">
								 1
							</div>
							<div class="desc">
								 API
							</div>
						</div>
						</a>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<a class="dashboard-stat dashboard-stat-light green-soft" href="javascript:;">
						<div class="visual">
							<i class="fa fa-desktop"></i>
						</div>
						<div class="details">
							<div class="number">
								 1
							</div>
							<div class="desc">
								 Server
							</div>
						</div>
						</a>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<a class="dashboard-stat dashboard-stat-light purple-soft" href="javascript:;">
						<div class="visual">
							<i class="fa fa-globe"></i>
						</div>
						<div class="details">
							<div class="number">
								 1
							</div>
							<div class="desc">
								 Instansi Kontributor
							</div>
						</div>
						</a>
					</div>
				</div>
				<!-- END DASHBOARD STATS -->
				<div class="clearfix">
				</div>
				
@endsection

@section('plugiscript')
{!! Html::script('simapta/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js') !!}
{!! Html::script('simapta/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js') !!}
{!! Html::script('simapta/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js') !!}
{!! Html::script('simapta/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js') !!}
{!! Html::script('simapta/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js') !!}
{!! Html::script('simapta/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js') !!}
{!! Html::script('simapta/assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js') !!}
{!! Html::script('simapta/assets/global/plugins/flot/jquery.flot.min.js') !!}
{!! Html::script('simapta/assets/global/plugins/flot/jquery.flot.resize.min.js') !!}
{!! Html::script('simapta/assets/global/plugins/flot/jquery.flot.categories.min.js') !!}
{!! Html::script('simapta/assets/global/plugins/jquery.pulsate.min.js') !!}
{!! Html::script('simapta/assets/global/plugins/bootstrap-daterangepicker/moment.min.js') !!}
{!! Html::script('simapta/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js') !!}
<!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
{!! Html::script('simapta/assets/global/plugins/fullcalendar/fullcalendar.min.js') !!}
{!! Html::script('simapta/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js') !!}
{!! Html::script('simapta/assets/global/plugins/jquery.sparkline.min.js') !!}
@endsection

@section('pagescript')
{!! Html::script('simapta/assets/admin/pages/scripts/index.js') !!}
{!! Html::script('simapta/assets/admin/pages/scripts/tasks.js') !!}
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   Demo.init(); // init demo features 
   Index.init();   
   Index.initDashboardDaterange();
   Index.initJQVMAP(); // init index page's custom scripts
   Index.initCalendar(); // init index page's custom scripts
   Index.initCharts(); // init index page's custom scripts
   Index.initChat();
   Index.initMiniCharts();
   Tasks.initDashboardWidget();
});
</script>
@endsection