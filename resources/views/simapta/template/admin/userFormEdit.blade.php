@extends('simapta.template.admin.master')
@section('title', 'User' )
@section('pagestyle')
{!! Html::style('simapta/assets/global/css/components-md.css') !!}
{!! Html::style('simapta/assets/global/css/plugins-md.css') !!}
@endsection

@section('breadcrumb')

						<li>
							<a href="/users">User</a>
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
@forelse ($userdb as $userdb)
<br />
<div class="row">
					
						<!-- BEGIN SAMPLE FORM PORTLET-->
						<div class="portlet light">
							<div class="portlet-title">
								<div class="caption font-green">
									<i class="icon-pin font-green"></i>
									<span class="caption-subject bold uppercase"> Data User</span>
								</div>
							</div>
							<div class="portlet-body form">
								<form role="form" method="post" action="/user/update">
									{!! csrf_field() !!}
									<div class="form-body">
										<div class="form-group form-md-line-input form-md-floating-label">
											<input type="text" class="form-control" id="name" name="name" value="{{ $userdb->name }}">
											<label for="name">Nama</label>
											<span class="help-block">Nama User</span>
										</div>
										<div class="form-group form-md-line-input form-md-floating-label">
											<input type="text" class="form-control" id="email" name="email" value="{{ $userdb->email }}">
											<label for="alias">Email</label>
											<span class="help-block">Alamat Email, contoh : nama@email.com</span>
										</div>
										<div class="form-group">
											<label>Role</label>
											<select class="form-control" name="role_id">
												@forelse ($role_options as $role)

												<?php
													if($role->id === $userdb->role_id) {

														$selected = ' selected="yes"';

													} else {

														$selected = '';

													}
												?>
													<option value="{{ $role->id }}"<?php echo $selected; ?>>{{ $role->name }}</option>
												@empty
													<option>Belum ada data Role</option>
												@endforelse
											</select>
										</div>
										<div class="form-group">
											<label>Instansi</label>
											<select class="form-control" name="instansi_id">
												@forelse ($instansi_options as $instansi)
												<?php
													if($instansi->id === $userdb->instansi_id) {

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
										<div class="form-group form-md-line-input form-md-floating-label">
											<input type="password" class="form-control" id="password" name="newpassword">
											<label for="password">Password</label>
											<span class="help-block">Di isi hanya jika ingin mengubah password</span>
										</div>
									<div class="form-actions noborder">
										<input type="hidden" name="id" value="{{ $userdb->id }}">
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