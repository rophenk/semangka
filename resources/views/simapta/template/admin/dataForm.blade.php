@extends('simapta.template.admin.master')
@section('title', 'Data' )
@section('pagestyle')
{!! Html::style('simapta/assets/global/css/components-md.csss') !!}
{!! Html::style('simapta/assets/global/css/plugins-md.css') !!}
@endsection

@section('breadcrumb')

						<li>
							<a href="/data">Data</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="">Form</a>
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
					
						<!-- BEGIN SAMPLE FORM PORTLET-->
						<div class="portlet light">
							<div class="portlet-title">
								<div class="caption font-green">
									<i class="icon-pin font-green"></i>
									<span class="caption-subject bold uppercase"> Data Manifest</span>
								</div>
							</div>
							<div class="portlet-body form">
								<form role="form" method="post" action="">
									<div class="form-body">
										<div class="form-group form-md-line-input form-md-floating-label">
											<input type="text" class="form-control" id="document_title" name="document_title">
											<label for="name">Judul Dokumen</label>
											<span class="help-block">Judul Dokumen, contoh : Budidaya Terung</span>
										</div>
										<div class="form-group form-md-line-input form-md-floating-label">
											<input type="text" class="form-control" id="writer" name="writer">
											<label for="name">Penulis</label>
											<span class="help-block">Penulis Dokumen, contoh : Ir. Fulan</span>
										</div>
										<div class="form-group form-md-line-input form-md-floating-label">
											<textarea class="form-control" rows="3" name="description"></textarea>
											<label for="form_control_1">Deskripsi File</label>
										</div>
										<div class="form-group form-md-line-input form-md-floating-label">
											<input type="text" class="form-control" id="publisher" name="publisher">
											<label for="name">Penerbit</label>
											<span class="help-block">Penerbit Dokumen, contoh : Direktorat Jenderal Perkebunan</span>
										</div>
										<div class="form-group form-md-line-input form-md-floating-label">
											<input type="text" class="form-control" id="year_published" name="year_published">
											<label for="year_published">Tahun Terbit</label>
											<span class="help-block">Tahun Terbit Dokumen, contoh : 2016</span>
										</div>
										<div class="form-group form-md-line-input form-md-floating-label">
											<input type="text" class="form-control" id="file_type" name="file_type">
											<label for="file_type">Tipe File</label>
											<span class="help-block">Tipe extensi file, contoh : pdf</span>
										</div>
										<div class="form-group form-md-line-input form-md-floating-label">
											<input type="text" class="form-control" id="pages" name="pages">
											<label for="pages">Jumlah Halaman</label>
											<span class="help-block">Jumlah Halaman, contoh: 56</span>
										</div>
										<div class="form-group form-md-line-input form-md-floating-label">
											<input type="text" class="form-control" id="isbn" name="isbn">
											<label for="isbn">ISBN</label>
											<span class="help-block">Nomor ISBN</span>
										</div>
										<div class="form-group form-md-line-input form-md-floating-label">
											<input type="text" class="form-control" id="document_size" name="document_size">
											<label for="document_size">Ukuran File</label>
											<span class="help-block">Ukuran File, contoh : 250 KB</span>
										</div>
										<div class="form-group form-md-line-input form-md-floating-label">
											<input type="text" class="form-control" id="cover_image" name="cover_image">
											<label for="cover_image">Gambar Sampul (cover)</label>
											<span class="help-block">Lokasi File Cover Dokumen, contoh : http://pia.pertanian.go.id/simapta/files/cover-budidaya-terung.jpg</span>
										</div>
										<div class="form-group form-md-line-input form-md-floating-label">
											<input type="text" class="form-control" id="address" name="address">
											<label for="address">Address</label>
											<span class="help-block">Lokasi File Dokumen, contoh : http://pia.pertanian.go.id/simapta/files/budidaya-terung.pdf</span>
										</div>
										<div class="form-group form-md-line-input form-md-floating-label">
											<label for="form_control_1">Availability</label><br />
											<div class="col-md-10">
												<div class="md-radio-inline">
													<div class="md-radio">
														<input type="radio" id="availability" name="availability" value="available" class="md-radiobtn">
														<label for="availability">
														<span></span>
														<span class="check"></span>
														<span class="box"></span>
														Available </label>
													</div>
													<div class="md-radio">
														<input type="radio" id="availability" name="availability" value="unavailable" class="md-radiobtn">
														<label for="availability">
														<span></span>
														<span class="check"></span>
														<span class="box"></span>
														Unavailable </label>
													</div>
												</div>
											</div>
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