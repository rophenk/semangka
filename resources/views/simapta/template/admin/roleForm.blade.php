@extends('simapta.template.admin.master')
@section('title', 'Role' )
@section('pagestyle')
{!! Html::style('simapta/assets/global/css/components-md.css') !!}
{!! Html::style('simapta/assets/global/css/plugins-md.css') !!}
@endsection

@section('breadcrumb')

						<li>
							<a href="/roles">Role</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="">Form</a>
						</li>
@endsection

@section('user-active')
active open
@endsection

@section('user-selected')
<span class="selected"></span>
@endsection


@section('content')

<br />
<div class="row">
					
						<!-- BEGIN SAMPLE FORM PORTLET-->
						<div class="portlet light">
							<div class="portlet-title">
								<div class="caption font-green">
									<i class="icon-pin font-green"></i>
									<span class="caption-subject bold uppercase"> Data Role</span>
								</div>
							</div>
							<div class="portlet-body form">
								<form role="form" method="post" action="/role/store">
									{!! csrf_field() !!}
									<div class="form-body">
										<div class="form-group form-md-line-input form-md-floating-label">
											<input type="text" class="form-control" id="name" name="name" />
											<label for="name">Nama</label>
											<span class="help-block">Nama Role... contoh : Administrator, Staff, Petugas</span>
										</div>
										<div class="form-group form-md-line-input form-md-floating-label">
											<input type="text" class="form-control" id="description" name="description" />
											<label for="description">Deskripsi</label>
											<span class="help-block">Penjelasan Role, contoh :  Petugas dapat menambah dan mengubah data, namun tidak dapat mempublikasi</span>
										</div>
									<div class="form-actions noborder">
										<button type="submit" class="btn blue">Submit</button>
										<button type="button" class="btn default">Cancel</button>
									</div>
								</form>
							</div>
						</div>
						<!-- END SAMPLE FORM PORTLET-->
					
				</div>
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