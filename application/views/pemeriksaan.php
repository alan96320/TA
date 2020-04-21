<div class="bodyLoading">
    <div class="loading_2">
        <h2 class="loading_header">mohon ditunggu ya...</h2>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <h2 class="loading_footer">lagi ngeload data nih...</h2>
    </div>
</div>
<div class="main-panel" style="display: none;" id="isiHalaman">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                    	<?php 
							$cekk = $this->session->userdata('level_user');
							if ($cekk == 3 || $cekk == 4) { ?>
		                        <h4 class="font-weight-bold mb-0">DATA PEMERIKSAAN</h4>
						    <?php }else{ ?>
						    	<h4 class="font-weight-bold mb-0">DATA PENGESAHAN</h4>
						    <?php }
						 ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <button type="button" id="ExportPDF" class="btn btn-outline-primary btn-icon-text btn-sm" style="margin-bottom: -30px;">
                            <i class="ti-export  btn-icon-prepend"></i> <span class="menu-title">Export PDF</span>
                        </button>
                        <div class="table-responsive">
                            <table id="tablepemeriksaan" class="table table-hover table-sm" style="width:100%" >
                                <thead style="font-size: 12px" class="table-primary">
									<tr >
										<th class="text-center align-middle" height="40px">Nama Proyek</th>
										<th class="text-center align-middle">Nomor SPK</th>
										<th class="text-center align-middle">Nilai Kontrak</th>
										<th class="text-center align-middle">Lokasi Proyek</th>
										<th class="text-center align-middle">Progres</th>
										<th class="text-center align-middle">Nilai Pengajuan</th>
										<th class="text-center align-middle">Status</th>
										<th class="text-center align-middle">Action</th>
									</tr>
								</thead>
								<tbody>
								<?php
									$luser= $this->session->userdata('level_user');
									foreach ($pemeriksaan->result() as $data) { 
										if ($data->statusPengajuan == 1 && $luser == 3) {//untuk officer projeck
											$status = '<div class="spinner-border text-success spinner-border-sm m-1" role="status"> <span class="sr-only">Loading...</span> </div> Pending';
										}elseif ($data->statusPengajuan != 1 && $luser == 3 && $data->statusPengajuan != 8 ) {
											$status = '<div class=" text-success" role="status"> <span class="fa fa-check"></span> Approve </div>';
										}elseif ($data->statusPengajuan == 8 && $luser == 3 ) {
											$status = '<div class=" text-danger" role="status"> <span class="fa fa-times"></span> Reject </div>';


										}elseif ($data->statusPengajuan == 2 && $luser == 4) {//untuk Engginering
											$status = '<div class="spinner-border text-success spinner-border-sm m-1" role="status"> <span class="sr-only">Loading...</span> </div> Pending';
										}elseif ($data->statusPengajuan != 2 && $luser == 4 && $data->statusPengajuan != 9) {
											$status = '<div class=" text-success" role="status"> <span class="fa fa-check"></span> Approve </div>';
										}elseif($data->statusPengajuan == 9 && $luser == 4){
											$status = '<div class=" text-danger" role="status"> <span class="fa fa-times"></span> Reject </div>';



										}elseif ($data->statusPengajuan == 3 && $luser == 5) {//untuk kepala Devisi
											$status = '<div class="spinner-border text-success spinner-border-sm m-1" role="status"> <span class="sr-only">Loading...</span> </div> Pending';
										}elseif ($data->statusPengajuan != 3 && $luser == 5 && $data->statusPengajuan != 10) {
											$status = '<div class=" text-success" role="status"> <span class="fa fa-check"></span> Approve </div>';
										}elseif($data->statusPengajuan == 10 && $luser == 5){
											$status = '<div class=" text-danger" role="status"> <span class="fa fa-times"></span> Reject </div>';


										}elseif ($data->statusPengajuan == 4 && $luser == 6) {//untuk Pimpinan Proyek
											$status = '<div class="spinner-border text-success spinner-border-sm m-1" role="status"> <span class="sr-only">Loading...</span> </div> Pending';
										}elseif ($data->statusPengajuan != 4 && $luser == 6 && $data->statusPengajuan != 11) {
											$status = '<div class=" text-success" role="status"> <span class="fa fa-check"></span> Approve </div>';
										}elseif($data->statusPengajuan == 11 && $luser == 6){
											$status = '<div class=" text-danger" role="status"> <span class="fa fa-times"></span> Reject </div>';


										}elseif ($data->statusPengajuan == 5 && $luser == 1) {//untuk Direktur
											$status = '<div class="spinner-border text-success spinner-border-sm m-1" role="status"> <span class="sr-only">Loading...</span> </div> Pending';
										}elseif ($data->statusPengajuan != 5 && $luser == 1 && $data->statusPengajuan !=12) {
											$status = '<div class=" text-success" role="status"> <span class="fa fa-check"></span> Approve </div>';
										}elseif($data->statusPengajuan == 12 && $luser == 1){
											$status = '<div class=" text-danger" role="status"> <span class="fa fa-times"></span> Reject </div>';

										}elseif ($data->statusPengajuan == 6 && $luser == 7) {
											$status = '<div class="spinner-border text-success spinner-border-sm m-1" role="status"> <span class="sr-only">Loading...</span> </div> Pending';
										}elseif ($data->statusPengajuan != 6 && $luser == 7 && $data->statusPengajuan > 6 && $data->statusPengajuan < 8) {
											$status = '<div class=" text-success" role="status"> <span class="fa fa-check"></span> Approve </div>';
										}else{
											$status='';
										}
										$A = 100/$data->jumlah;
										$B = $A * $data->jmlProgres/100;
										$C = $B * $data->total/100;
										?>
										<tr>
											<td class="align-middle "><label><?=$data->namaProyek?></label> </td>
											<td class="align-middle "><label><?=$data->nomorSPK?></label> </td>
											<td class="align-middle"><label>Rp. <?=number_format($data->total)?> ,-</label> </td>
											<td class="align-middle "><?=$data->lokasi_proyek?></td>
											<td class="align-middle text-center"><label><?=number_format((float)$B,4,'.',',') ?> %</label> </td>
											<td class="align-middle"><label>Rp. <?=number_format($C)?> ,-</label> </td>
											<td class="align-middle text-center"><?=$status?></td>
											<td class="align-middle text-center">
												<form action="lihatpemeriksaan" method="post" target="_blank">
													<input type="hidden" value="<?=$data->pengajuan_id?>" name="id">
													<button type="submit" class="btn btn-outline-info btn-rounded btn-icon btn-sm"> <i class="ti-eye"></i> </button>
													<?php
														if ($data->statusPengajuan == 1 && $luser == 3 || $data->statusPengajuan == 2 && $luser == 4 || $data->statusPengajuan == 3 && $luser == 5 || $data->statusPengajuan == 4 && $luser == 6 || $data->statusPengajuan == 5 && $luser == 1 || $data->statusPengajuan == 6 && $luser == 7) { ?>
															<button type="button" class="btn btn-outline-success btn-rounded btn-icon btn-sm approve" id="<?=$data->pengajuan_id?>">
			                                                    <i class="ti-check"></i>
			                                                </button>
															<button type="button" class="btn btn-outline-danger btn-rounded btn-icon btn-sm reject" id="<?=$data->pengajuan_id?>">
			                                                    <i class="ti-close"></i>
			                                                </button>
													<?php } ?>
												</form>									
											</td>
										</tr>
										<?php
									}
								?>
								</tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2019 <a href="http://cepalansuhendar.000webhostapp.com/" target="_blank">Cep Alan Suhendar</a>. All rights reserved.</span>
        </div>
    </footer>
</div>
<script type="text/javascript">
$(document).ready(function() {
//fungsi untuk mengatur loading
    $('#welcome').fadeOut(2000);
	$('#ExportPDF').click(function(){
        window.open('ExportPDF', '_blank');
    });
	$('.bodyLoading').hide();
    $('#isiHalaman').show();
//set datatable
	pengajuan = $('#tablepemeriksaan').DataTable({
		"pageLength": 4,
        "lengthChange": false,
	});
//untuk approve
	$('.approve').click(function(){
		id = $(this).attr('id');
		$.ajax({
			url:'approvePemeriksaan',
			type:'post',
			data:{id:id},
			success:function(data){
				if (data == 'berhasil') {
					swal('',"Data Berhasil Di Approve", "success").then((value)=>{
			        	location.reload();
			        });
				}else{
					if (data == 'gagal') {
						swal('Errorr',"Sistem Sedang Sibuk, Silahkan Coba beberapa saat lagi, jika masalah berlanjut silahkan hubungi admin", "error");
					}
				}
			}
		});
	});
	$('.reject').click(function(){
		id = $(this).attr('id');
		swal({
			title: "Apakah Anda yakin?",
			icon: "warning",
			buttons: ["Tidak", "Iya"],
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				$.ajax({
					url:'rejectPemeriksaan',
					type:'post',
					data:{id:id},
					success:function(data){
						if (data == 'berhasil') {
							swal('',"Data Berhasil Di Approve", "success").then((value)=>{
					        	location.reload();
					        });
						}else{
							if (data == 'gagal') {
								swal('Errorr',"Sistem Sedang Sibuk, Silahkan Coba beberapa saat lagi, jika masalah berlanjut silahkan hubungi admin", "error");
							}
						}
						
					}
				});
			}
		});
		
	});
	



});
</script>


