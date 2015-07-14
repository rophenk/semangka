@extends('simapta.template.admin.master')
@section('title', 'Instansi' )
@section('pagestyle')
{!! Html::style('simapta/assets/global/css/components-md.css') !!}
{!! Html::style('simapta/assets/global/css/plugins-md.css') !!}
@endsection

@section('breadcrumb')

						<li>
							<a href="/instansi">Instansi</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="">Form</a>
						</li>
@endsection

@section('instansi-active')
active open
@endsection

@section('instansi-selected')
<span class="selected"></span>
@endsection


@section('content')



@forelse ($instansi as $instansi)
<br />
<div class="row">
					
						<!-- BEGIN SAMPLE FORM PORTLET-->
						<div class="portlet light">
							<div class="portlet-title">
								<div class="caption font-green">
									<i class="icon-pin font-green"></i>
									<span class="caption-subject bold uppercase"> Data Instansi</span>
								</div>
							</div>
							<div class="portlet-body form">
								<form role="form" method="post" action="/instansi/update">
									<div class="form-body">
										<div class="form-group form-md-line-input form-md-floating-label">
											<input type="text" class="form-control" id="name" name="name" value="{{ $instansi->name }}">
											<label for="name">Nama</label>
											<span class="help-block">Nama Instansi... contoh : Pusat Agribisnis Arsitektur</span>
										</div>
										<div class="form-group form-md-line-input form-md-floating-label">
											<input type="text" class="form-control" id="alias" name="alias"  value="{{ $instansi->alias }}">
											<label for="alias">Alias</label>
											<span class="help-block">Sebutan singkat dari Instansi, contoh : PIA</span>
										</div>
									<div class="form-actions noborder">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input type="hidden" name="uuid" value="{{ $instansi->uuid }}">
										<button type="submit" class="btn blue">Submit</button>
										<button type="button" class="btn default">Cancel</button>
									</div>
								</form>
							</div>
						</div>
						<!-- END SAMPLE FORM PORTLET-->
					
				</div>
@empty
@endforelse

@endsection

@section('pagescript')
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {       
   Metronic.init(); // init metronic core components
   Layout.init(); // init current layout
   Demo.init(); // init demo features
});
</script>
@endsection