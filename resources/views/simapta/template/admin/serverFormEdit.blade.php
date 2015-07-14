@extends('simapta.template.admin.master')
@section('title', 'Server' )
@section('pagestyle')
{!! Html::style('simapta/assets/global/css/components-md.css') !!}
{!! Html::style('simapta/assets/global/css/plugins-md.css') !!}
@endsection

@section('breadcrumb')

						<li>
							<a href="/server">Server</a>
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
@forelse ($server as $server)
<br />
<div class="row">
					
						<!-- BEGIN SAMPLE FORM PORTLET-->
						<div class="portlet light">
							<div class="portlet-title">
								<div class="caption font-green">
									<i class="icon-pin font-green"></i>
									<span class="caption-subject bold uppercase"> Data Server</span>
								</div>
							</div>
							<div class="portlet-body form">
								<form role="form" method="post" action="/server/update">
									<div class="form-body">
										<div class="form-group form-md-line-input form-md-floating-label">
											<input type="text" class="form-control" id="name" name="name" value="{{ $server->name }}">
											<label for="name">Nama</label>
											<span class="help-block">Nama Server, contoh : Server #1</span>
										</div>
										<div class="form-group form-md-line-input form-md-floating-label">
											<input type="text" class="form-control" id="address" name="address" value="{{ $server->address }}">
											<label for="alias">Address</label>
											<span class="help-block">Alamat server, contoh : http://pia.pertanian.go.id</span>
										</div>
										<div class="form-group">
											<label>Instansi</label>
											<select class="form-control" name="instansi_id">
												@forelse ($instansi_options as $instansi)

													<?php
													if($instansi->id === $server->instansi_id) {

														$selected = ' selected="yes"';

													} else {

														$selected = '';

													}
													?>

														<option value="{{ $instansi->id }}"<?php echo $selected; ?>>{{ $instansi->name }}</option>
												@empty
														<option>Belum ada data Instansi</option>
												@endforelse
											</select>
										</div>
									<div class="form-actions noborder">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input type="hidden" name="uuid" value="{{ $server->uuid }}">
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