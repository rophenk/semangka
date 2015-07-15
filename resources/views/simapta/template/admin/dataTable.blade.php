@extends('simapta.template.admin.master')
@section('title', 'Data' )
@section('pagestyle')
{!! Html::style('simapta/assets/global/plugins/select2/select2.css') !!}
{!! Html::style('simapta/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') !!}
@endsection

@section('breadcrumb')

						<li>
							<a href="/data">Data</a>
							<i class="fa fa-angle-right"></i>
						</li>

						<li>
							<a href="">Data Terdaftar</a>
						</li>
@endsection

@section('data-active')
active open
@endsection

@section('data-selected')
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
									<i class="fa fa-globe"></i>Data Terdaftar
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
								<!--<div class="table-toolbar">
									<div class="row">
										<div class="col-md-6">
											<div class="btn-group">
												<a href="/data/create">
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
								</div>-->
								<table class="table table-striped table-bordered table-hover" id="sample_1" style="width: 100%;">
								<thead>
								<tr>
									<th class="table-checkbox">
										<input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes"/>
									</th>
									<th>
										 Judul Dokumen
									</th>
									<th>
										 Nama API
									</th>
									<th width="200px">
										 Lokasi Dokumen
									</th>
									<th>
										 Penulis
									</th>
									<th>
										 Status
									</th>
								</tr>
								</thead>
								<tbody>
								@forelse ($data as $data)
									<tr class="odd gradeX">
									<td>
										<input type="checkbox" class="checkboxes" value="1"/>
									</td>
									<td>
										{{ $data->document_title }}
									</td>
									<td>
										{{ $data->api->name }}
									</td>
									<td>
										<div style="word-break:break-all;">
										 {{ $data->address }}
										</div>
									</td>
									<th>
										 {{ $data->writer }}
									</th>
									<td>
										<span class="label label-sm label-success">
										available </span>
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