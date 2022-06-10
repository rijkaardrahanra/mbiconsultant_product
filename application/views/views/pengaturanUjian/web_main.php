 <link href="<?php echo base_url(); ?>admin/css/jquery/jquery-ui-1.10.3.custom.css" media="screen" rel="stylesheet" type="text/css" />
 <link rel="<?php echo base_url(); ?>admin/ckeditor/samples/stylesheet" href="sample.css"/>
 <link rel="stylesheet" media="all" type="text/css" href="<?php echo base_url(); ?>js/timepicker/jquery-ui.css" />
 <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-58877461-1']);
    _gaq.push(['_trackPageview']);
    (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' :
    'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(ga, s);
    })();
  </script>
  <script src="<?php echo base_url(); ?>admin/ckeditor/ckeditor.js"></script>
  <script>
  // Remove advanced tabs for all editors.
  CKEDITOR.config.removeDialogTabs = 'image:advanced;link:advanced;flash:advanced;creatediv:advanced;editdiv:advanced';
  </script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/timepicker/jquery-ui.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/timepicker/jquery-ui-timepicker-addon.js"></script>
	<!-- Start Main Content -->
	<div class="main-content">
		<div class="container-fluid" >
			<div class="row-fluid">
				<div class="area-top clearfix">
					<div class="pull-left header">
						<h3 class="title"><i class="icon-edit"></i>Pengaturan Ujian </h3>
					</div>
				</div>
			</div>
		</div>
		<!-- Start Container Box-->
		<div class="container-fluid padded">
			<!-- Start Box-->
			<div class="box">
				<div class="box-header">
					<ul class="nav nav-tabs nav-tabs-left">
						<li class="active">
							<a href="#list" data-toggle="tab">
							<i class="icon-align-justify"></i>Daftar Ujian
							</a>
						</li>
						<li>
							<a href="#add" data-toggle="tab">
							<i class="icon-plus"></i>Tambah Ujian
							</a>
						</li>
					</ul>
				</div>
				<div class="box-content padded">
					<div class="tab-content">
						<div class="tab-pane box active" id="list">
						<!-- <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
						<thead>
							<tr>
								<th><div>Nama Jenjang</div></th> 
								<th><div>Nama Mata Pelajaran</div></th> 
								<th><div>Nama Paket Soal</div></th>
								<th><div>Nama Ujian</div></th>
								<th><div>Tanggal Ujian</div></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>M.sc</td>
								<td>Bahasa Inggris </td>
								<td>hindi, hindi </td>
								<td>UAS bahasa inggris </td>
								<td>13-01-2018 </td>
							</tr>
						</tbody>
						</table> -->
						<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Soal</th>
									<th class="no-sort">Jawaban Benar</th>
									<th class="no-sort">Jawaban Salah 1</th>
									<th class="no-sort">Jawaban Salah 2</th>
									<th class="no-sort">Jawaban Salah 3</th>
									<th class="no-sort">Jawaban Salah 4</th>
									<th>Jenjang</th>
									<th>Mata Pelajaran</th>
									<th>Level Soal</th>
									<th class="no-sort">Aksi</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
						</div>

						<div class="tab-pane box" id="add" style="padding: 5px">
						<div class="box-content">
							<form action="" method="post" accept-charset="utf-8" class="form-horizontal validatable" target="_top">
								<div class="padded">
									<div class="control-group">
										<label class="control-label">Nama Jenjang</label>
										<div class="controls">
											<select name="category_id" class="chzn-select">
												<option>Pilih Jenjang</option>
												<option value="16">SD</option>
												<option value="17">SMP</option>
												<option value="18">SMA</option>
											</select>
										</div>
									</div>
								</div>
								<div class="padded">
									<div class="control-group">
										<label class="control-label">Nama Mata Pelajaran</label>
										<div class="controls" id="subcategorydiv">
											<select name="subcategory_id" class="chzn-select">
												<option>Pilih Nama Mata Pelajaran</option>
											</select>
										</div>
									</div>
								</div>
								<div class="padded">
									<div class="control-group">
										<label class="control-label">Nama Paket Soal</label>
										<div class="controls" id="subjectdiv">
											Pilih Paket Soal
										</div>
									</div>
								</div>
								<div class="padded">
									<div class="control-group">
										<label class="control-label">Nama Ujian</label>
										<div class="controls">
											<input type="text" class="validate[required]" name="exam_name"/>
										</div>
									</div>
								</div>
								<div class="padded">
									<div class="control-group">
										<label class="control-label">Tanggal Ujian</label>
										<div class="controls">
											<input type="text" name="exam_date"  class="validate[required] datepicker"/>
										</div>
									</div>
								</div>
								<div class="padded">
									<div class="control-group">
										<label class="control-label">Durasi Ujian(Dalam Menit)</label>
										<div class="controls">
											<input type="text"  name="exam_duration" class="validate[required,custom[integer]]" />
										</div>
									</div>
								</div>
								<div class="padded">
									<div class="control-group">
										<label class="control-label">Melewati Persentase(Dalam %)</label>
										<div class="controls">
											<input type="text"  name="passing_percentage" class="validate[required,custom[integer]]" />
										</div>
									</div>
								</div>
								<div class="padded">
									<div class="control-group">
										<label class="control-label">Syarat & Ketentuan</label>
										<div class="controls">
											<div class="box closable-chat-box">
												<div class="box-content">
													<div class="chat-message-box">
														<textarea name="terms_condition" id="terms_condition" rows="5" placeholder="Terms & Condition"></textarea>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="padded">
									<div class="control-group">
										<label class="control-label"> Hasil Email</label>
										<div class="controls">
											<input type="checkbox" name="result_show_on_mail"  value="1" />
										</div>
									</div>
								</div>
								<div class="padded">
									<div class="control-group">
										<label class="control-label">Nama Klien</label>
										<div class="controls">
											<select name="center_id" id="center_id" class="chzn-select" onChange="getSchool(this.value)">
												<option>Pilih Klien</option>
												<option value="16" data-type="1">Airlangga Education Center Lamongan - Jl. Basuki Rahmat No. 14 Lamongan</option>
												<option value="10" data-type="3">Dinas Pendidikan Kabupaten Gunungkidul - Gunungkidul</option>
												<option value="15" data-type="2">SMA Negeri 1 - Jayapura</option>
											</select>
										</div>
									</div>
								</div>
								<div class="padded" id="school" style="display:none">
									<div class="control-group" >
										<label class="control-label">Nama Sekolah</label>
										<div class="controls">
											<select name="school_id[]" id="school_id" class="school_id chzn-select" multiple></select>
										</div>
									</div>
								</div>
								<div class="form-actions">
									<button type="submit" class="btn btn-gray">Tambah Ujian</button>
									<input type="hidden" value="Add new exam" name="submit">
								</div>
							</form>
						</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Box-->
		</div>
		<!-- End Container Box-->
	</div>
	<!-- End Main Content -->
</div>
<!-- End Div Main Body -->
<script>
$( "#center_id" ).click(function() {
	var isthis = this;
	var idcenter = $(this).find('option:selected').filter(function () { return $(this).val() == $(isthis).val(); }).data('type');
	if(idcenter == '3'){
		$('#school').show();
		$('.school_id').find('option').attr('selected', false); // clears all
		$(".school_id").trigger("chosen:updated"); // updates chosen

	}else{
		$('#school').hide();
		$('.school_id').find('option').attr('selected', false); // clears all
		$(".school_id").trigger("chosen:updated"); // updates chosen
	}
});
function getSchool(center_group) {
	$('#school_id').html('<option value="1" selected>SMA 1</option><option value="2">SMA 2</option>');
}
</script>

<script type='text/javascript' src='<?php echo base_url(); ?>js/timepicker/jquery-ui-timepicker-addon.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>js/jquery/jquery-ui-1.10.3.custom.min.js'></script>
<?php
// if($_POST['school_id']!="")
// 	{
// 		$schoolid="";
// 		$school_id= $_POST['school_id'];
// 		if(is_array($school_id))
// 		{
// 			while (list ($key, $val) = each ($school_id)) 
// 			{
// 				$schoolid .= "$val,";
// 			}
// 		}
// 		$exam_school_id= substr($schoolid,0,-1);
// 	}
// 	else
// 	{
// 		$exam_school_id=0;
// 	}
?>