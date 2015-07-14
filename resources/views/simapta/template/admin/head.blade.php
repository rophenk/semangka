<meta charset="utf-8"/>
<title>SIMAPTA - @yield('title')</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="Sekreariat Jenderal Kementerian Pertanian"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
{!! Html::style('simapta/assets/global/plugins/font-awesome/css/font-awesome.min.css') !!}
{!! Html::style('simapta/assets/global/plugins/simple-line-icons/simple-line-icons.min.css') !!}
{!! Html::style('simapta/assets/global/plugins/bootstrap/css/bootstrap.min.css') !!}
{!! Html::style('simapta/assets/global/plugins/uniform/css/uniform.default.css') !!}
{!! Html::style('simapta/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') !!}
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
{!! Html::style('simapta/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') !!}
{!! Html::style('simapta/assets/global/plugins/fullcalendar/fullcalendar.min.css') !!}
{!! Html::style('simapta/assets/global/plugins/jqvmap/jqvmap/jqvmap.css') !!}
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
@yield('pagestyle')
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN PAGE STYLES -->
{!! Html::style('simapta/assets/admin/pages/css/tasks.css') !!}
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
{!! Html::style('simapta/assets/global/css/components-md.css') !!}
{!! Html::style('simapta/assets/global/css/components-md.css') !!}
{!! Html::style('simapta/assets/global/css/plugins-md.css') !!}
{!! Html::style('simapta/assets/admin/layout/css/layout.css') !!}
{!! Html::style('simapta/assets/admin/layout/css/themes/grey.css') !!}
{!! Html::style('simapta/assets/admin/layout/css/custom.css') !!}
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="{{ URL::asset('favicon.ico') }}"/>