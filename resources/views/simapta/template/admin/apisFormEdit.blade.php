@extends('simapta.template.admin.master')
@section('title', 'API' )
@section('pagestyle')
{!! Html::style('simapta/assets/global/css/components-md.csss') !!}
{!! Html::style('simapta/assets/global/css/plugins-md.css') !!}
@endsection

@section('breadcrumb')

						<li>
							<a href="/apis">API</a>
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
@forelse ($apis as $api)
<br />
<div class="row">
					
						<!-- BEGIN SAMPLE FORM PORTLET-->
						<div class="portlet light">
							<div class="portlet-title">
								<div class="caption font-green">
									<i class="icon-pin font-green"></i>
									<span class="caption-subject bold uppercase"> Data API</span>
								</div>
							</div>
							<div class="portlet-body form">
								<form role="form" method="post" action="/apis/update">
									{!! csrf_field() !!}
									<div class="form-body">
										<div class="form-group form-md-line-input form-md-floating-label">
											<input type="text" class="form-control" id="name" name="name" value="{{ $api->name }}">
											<label for="name">Nama</label>
											<span class="help-block">Nama API, contoh : Budidaya Holtikultura</span>
										</div>
										<div class="form-group form-md-line-input form-md-floating-label">
											<input type="text" class="form-control" id="address" name="address" value="{{ $api->address }}">
											<label for="alias">Address</label>
											<span class="help-block">Alamat server, contoh : http://pia.pertanian.go.id/simapta/api/holtikultura.csv</span>
										</div>
										<div class="form-group">
											<label>Type</label>
											<select class="form-control" name="type">
												<?php
												if($api->type === "CSV"){
													$csv = ' selected="yes"';
													$json = '';
													$xml = '';
												} elseif($api->type === "JSON") {
													$json = ' selected="yes"';
													$csv = '';
													$xml = '';
												} elseif($api->type === "XML") {
													$xml = ' selected="yes"';
													$json = '';
													$csv = '';
												}
												?>
												<option value="CSV"<?php echo $csv; ?>>CSV</option>
												<option value="JSON"<?php echo $json; ?>>JSON</option>
												<option value="XML"<?php echo $xml; ?>>XML</option>
											</select>
										</div>
										<div class="form-group">
											<label>Server</label>
											<select class="form-control" name="server_id">
												@forelse ($server_options as $server)
												<?php
													if($server->id === $api->server_id) {

														$selected = ' selected="yes"';

													} else {

														$selected = '';

													}
													?>
													<option value="{{ $server->id }}"<?php echo $selected; ?>>{{ $server->name }}</option>
												@empty
													<option>Belum ada data Server</option>
												@endforelse
											</select>
										</div>
									<div class="form-actions noborder">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input type="hidden" name="uuid" value="{{ $api->uuid }}">
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