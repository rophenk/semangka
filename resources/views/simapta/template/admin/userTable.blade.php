@extends('simapta.template.admin.master')
@section('title', 'User' )
@section('pagestyle')
{!! Html::style('simapta/assets/global/plugins/select2/select2.css') !!}
{!! Html::style('simapta/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') !!}
@endsection

@section('breadcrumb')

						<li>
							<a href="/user">User</a>
							<i class="fa fa-angle-right"></i>
						</li>

						<li>
							<a href="">User Terdaftar</a>
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
					<div class="col-md-12">
						<!-- BEGInsiN EXAMPLE TABLE PORTLET-->
						<div class="portlet box grey-cascade">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-user"></i>User Terdaftar
								</div>
								<div class="tools">
									<a href="javascript:;" class="collapse">
									</a>
									<a href="#portlet-config" data-toggle="modal" class="config">
									</a>
									<a href="javascript:;" class="reload">
									</a>
									<a href="javascript:;" class="remove">
									</a>
								</div>
							</div>
							<div class="portlet-body">
								<div class="table-toolbar">
									<div class="row">
										<div class="col-md-6">
											<div class="btn-group">
												<a href="/user/create">
													<button id="sample_editable_1_new" class="btn green">
													Add New <i class="fa fa-plus"></i>
													</button>
												</a>
											</div>
										</div>
									</div>
								</div>
								<table class="table table-striped table-bordered table-hover" id="sample_1">
								<thead>
								<tr>
									<th class="table-checkbox">
										<input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes"/>
									</th>
									<th>
										 Nama User
									</th>
									<th>
										 Email
									</th>
									<th align="right">
										 Option
									</th>
								</tr>
								</thead>
								<tbody>
								@forelse ($user_info as $user_info)
									<tr class="odd gradeX">
									<td>
										<input type="checkbox" class="checkboxes" value="1"/>
									</td>
									<td>
										 {{ $user_info->name }} <span class="label label-sm label-warning">
										 {{ $user_info->role }} 
										</span>
									</td>
									<td>
										{{ $user_info->email }}
									</td>
									<td align="right">
										<a href="/user/edit/{{ $user_info->id }}">
											<button id="editbuton" class="btn green">
											Edit <i class="fa fa-edit"></i>
											</button>
										</a>
										<a href="/user/destroy/{{ $user_info->id }}" onclick="if(!confirm('Anda yakin akan menghapus data ini ?')){return false;};">
											<button id="editbuton" class="btn green">
											Delete <i class="fa fa-close"></i>
											</button>
										</a>
									</td>
								</tr>
								@empty
								<tr class="odd gradeX">
									<td colspan="6">
										<center><strong>Belum ada Data</strong></center>
									</td>
								</tr>
								@endforelse
								
								</tbody>
								</table>
							</div>
						</div>
						<!-- END EXAMPLE TABLE PORTLET-->
					</div>
				</div>
@endsection

@section('pluginscript')
{!! Html::script('simapta/assets/global/plugins/select2/select2.min.js') !!}
{!! Html::script('simapta/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js') !!}
{!! Html::script('simapta/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') !!}
@endsection

@section('pagescript')
{!! Html::script('simapta/assets/admin/pages/scripts/table-managed.js') !!}
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {       
   Metronic.init(); // init metronic core components
   Layout.init(); // init current layout
   Demo.init(); // init demo features
   TableManaged.init();
});
</script>
@endsection