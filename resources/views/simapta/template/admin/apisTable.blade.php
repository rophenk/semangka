@extends('simapta.template.admin.master')
@section('title', 'API/XML/CSV' )
@section('pagestyle')
{!! Html::style('simapta/assets/global/plugins/select2/select2.css') !!}
{!! Html::style('simapta/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') !!}
@endsection

@section('breadcrumb')

						<li>
							<a href="/apis">API</a>
							<i class="fa fa-angle-right"></i>
						</li>

						<li>
							<a href="">API Terdaftar</a>
						</li>
@endsection

@section('instansi-active')
active open
@endsection

@section('instansi-selected')
<span class="selected"></span>
@endsection

@section('content')
				<div class="row">
					<div class="col-md-12">
						<!-- BEGInsiN EXAMPLE TABLE PORTLET-->
						<div class="portlet box grey-cascade">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-globe"></i>API Terdaftar
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
												<a href="/apis/create">
													<button id="sample_editable_1_new" class="btn green">
													Add New <i class="fa fa-plus"></i>
													</button>
												</a>
											</div>
										</div>
										<div class="col-md-6">
											<div class="btn-group pull-right">
												<button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
												</button>
												<ul class="dropdown-menu pull-right">
													<li>
														<a href="javascript:;">
														Print </a>
													</li>
													<li>
														<a href="javascript:;">
														Save as PDF </a>
													</li>
													<li>
														<a href="javascript:;">
														Export to Excel </a>
													</li>
												</ul>
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
										 Nama API
									</th>
									<th>
										 Nama Server
									</th>
									<th>
										 Alamat API
									</th>
									<th>
										 Tipe API
									</th>
									<th>
										 Option
									</th>
								</tr>
								</thead>
								<tbody>
								@forelse ($api as $api)
									<tr class="odd gradeX">
									<td>
										<input type="checkbox" class="checkboxes" value="1"/>
									</td>
									<td>
										{{ $api->name }}
									</td>
									<td>
										{{ $api->server->name }}
									</td>
									<td class="center">
										 {{ $api->address }}
									</td>
									<th>
										 {{ $api->type }}
									</th>
									<td>
										<a href="/apis/edit/{{ $api->uuid }}">
											<button id="editbuton" class="btn green">
											Edit <i class="fa fa-edit"></i>
											</button>
										</a>
										<a href="/apis/destroy/{{ $api->uuid }}" onclick="if(!confirm('Anda yakin akan menghapus data ini ?')){return false;};">
											<button id="deletebuton" class="btn green">
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