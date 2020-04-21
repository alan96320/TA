<style type="text/css">
	.namaProyek select
	{
		border-radius: 10px;
		border:none;
		font-size: 16px;
		box-shadow: 0 2px 2px rgba(0,0,0,.5);
		-webkit-appearance: button;
		outline: none;
		background: #eaf1f7;
	}
	.namaProyek:hover select
	{
		background: #f7fcff;
	}
	.namaProyek:before
	{
		content: "\e71d";
		font-family: "themify";
		position: absolute;
		top: 0;
		right: 0;
		width: 35px;
		height: 34px;
		text-align: center;
		line-height: 35px;
		color: #797979;
		font-size:  20px;
		pointer-events: none;
		background: #dbe7f1;
		border-radius: 10px;
		margin-right: 15px;
	}
	.namaProyek select option
	{
		border:none;
		font-size: 16px;
		-webkit-appearance: button;
		outline: none;
		background: #eaf1f7;
	}
	.nomor
	{
		border-radius: 15px 0 0 15px;
		border:none;
		font-size: 16px;
		box-shadow: 0 2px 2px rgba(0,0,0,.5);
		-webkit-appearance: button;
		outline: none;
		background: #eaf1f7;
	}
	.nomor:hover
	{
		background: #f7fcff;
	}
	.fornomor
	{
		position: relative;
		border-radius: 0 15px 15px 0;
		font-size: 16px;
		box-shadow: 0 3px 3px rgba(0,0,0,.1);
		outline: none;
		border:none;
		background: #eaf1f7;
	}
	.fornomor:hover
	{
		background: #f7fcff;
	}
	.toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
	.toggle.ios .toggle-handle { border-radius: 20px; }
	#tabelDetailPembangunan_filter input{
		border-radius: 10px;
	}
</style>
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
                        <h4 class="font-weight-bold mb-0">DATA PENGAJUAN</h4>
                    </div>
                    <div>
                        <button type="button" class="btn btn-primary btn-icon-text btn-rounded btntambahpengajuan" data-toggle="modal" data-target="#tambahDataPengajuan" data-backdrop="static">
                            <i class="ti-plus btn-icon-prepend"></i>Tambah Data
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <button type="button" id="ExportPengajaun" class="btn btn-outline-primary btn-icon-text btn-sm" style="margin-bottom: -30px;">
                            <i class="ti-export  btn-icon-prepend"></i> <span class="menu-title">Export PDF</span>
                        </button>
                        <div class="table-responsive">
                            <table id="tabelViewPengajuan" class="table table-hover table-sm" style="width:100%" >
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
<!-- Modal Tambah Data Pengajuan -->
<div class="modal fade" id="tambahDataPengajuan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document" style="max-width: 600px">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" style="font-family: times new roman;"> Tambah Data Pengajuan</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmproyekedit" class="form-sample" style="font-family: times new roman">
                    <div class="form-group row" style="margin-right: 0" id="forNamaProyek">
                    	<div class="col-md-6 col-md-6">
	                    	<div class="group row">
		                        <label class="col-sm-5 col-md-5 col-form-label form-control-sm" >Nama Proyek</label>
		                        <div class="col-sm-7 col-md-7  inputGroupContainer namaProyek">
		                            <select class="form-control form-control-sm" name="namaProyek" id="namaProyek">
		                            	<option value="">--Pilih--</option>
		                            	<?php foreach ($proyek as $key => $data) { ?>
		                            		<option value="<?=$data->proyek_id?>"><?=$data->namaProyek?></option>
		                            	<?php } ?>
		                            </select>
		                        </div>
	                    	</div>
                    	</div>
                    	<div class="col-md-6 col-md-6">
	                    	<div class="group row fornamapembangunan hide">
	                    		<div class="col-md-12 col-sm-12 inputGroupContainer namaProyek">
		                            <select class="form-control form-control-sm" name="namapembangunan" id="namapembangunan">
		                            </select>
		                        </div>
	                    	</div>
                    	</div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <div class="col-sm-12 col-md-12 inputGroupContainer">
                            <table class="table table-sm table-bordered table-striped" id="tablePengajuan" style="border-radius: 10px">
                                <thead>
                                    <tr>
                                        <th class="text-center">Proyek</th>
                                        <th class="text-center">Pembangunan</th>
                                        <th class="text-center">Jumlah Unit</th>
                                        <th class="text-center">Progres</th>
                                        <th class="text-center">Bobot</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div style="margin-bottom: 20px;margin-right: 20px; font-family: times new roman" class="float-right">
                        <a class="btn btn-primary btn-sm text-white" id="saveTemporarypengajuan"><i class="fa fa-save fa-fw"></i> Ajukan</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Tambah Data Progress -->
<div class="modal fade" id="tambahDataProgres" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document" style="max-width: 600px">
        <div class="modal-content">
            <div class="modal-body">
            	<button type="button" id="btnPerUnit" class="btn btn-primary btn-icon-text btn-rounded float-right mb-2 mr-4 btn-sm" data-toggle="modal" data-target="#toggleBlok" data-backdrop="static">
                    <i class="ti-plus btn-icon-prepend"></i>Progres
                </button>
                <form style="font-family: times new roman; margin-top: 50px">
                    <div class="form-group row" style="margin-right: 0">
                        <div class="col-sm-12 col-md-12 inputGroupContainer">
                            <table class="table table-sm table-bordered table-striped" id="tableProgres" style="border-radius: 10px">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Blok</th>
                                        <th class="text-center">Nomor</th>
                                        <th class="text-center">Progres</th>
                                        <th class="text-center">Bobot</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div style="margin-bottom: 20px;margin-right: 20px; font-family: times new roman" class="float-right">
                        <button class="btn btn-info btn-sm text-white" data-dismiss="modal" id="backpembangunan"><i class="fa fa-backspace"></i></button>
                    	<button type="reset" class="btn btn-primary btn-sm" id="resetDatatemporary"><i class="fa fa-redo"></i></button>
                        <a class="btn btn-success btn-sm text-white" id="saveDataTemporary"><i class="fa fa-save"></i></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Tambah/Unit -->
<div class="modal fade" id="modalTambahPerunit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog  modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLongTitle" style="font-family: times new roman">Tambah Progres Per Unit</h4>
				<button type="button" class="close backprogres" data-dismiss="modal" aria-label="Close">
					<i class="fa fa-backspace fa-fw"></i>
				</button>
			</div>
      		<div class="modal-body">
      			
	        	<form id="frmTambahPerUnit" class="form-sample" style="font-family: times new roman;">
	            	<div class="form-group row" style="margin-right: 0;">
	                    <label class="col-md-4 control-label">Nama Blok</label>
	                    <div class="col-md-8  inputGroupContainer namaProyek">
	                        <select class="form-control form-control-sm" id="PilihBlokperunit" name="PilihBlokperunit">
	                        </select>
	                    </div>
	                </div>
	                <div class="form-group row" id="nomorPerunit" style="margin-right: 0;">
	                    <label class="col-md-4 control-label">Nomor Unit</label>
	                    <div class="col-md-8  inputGroupContainer namaProyek">
	                        <select class="form-control form-control-sm" id="pilihNomorperunit" name="pilihNomorperunit">
	                        </select>
	                    </div>
	                </div>
	            	<!-- Untuk Persiapan -->
	            	<div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingOne" style="height: 30px">
	                        <label style="margin-top: 4px; margin-left: 10px; font-family: times new roman"><b>1. Persiapan</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" class="togglePerUnit_persiapan">
	                        </div>
	                    </div>
	                    <div id="body_persiapan" style="display: none;">
	                        <div class="card-body">
	                        	<div class="table-responsive-sm">
		                    		<table class="table table-bordered table-sm">
		                    			<thead>
		                    				<tr>
		                    					<th scope="col" rowspan="2" class="text-center align-middle" width="150px">Nama Pekerjaan</th>
		                    					<th scope="col" colspan="3" class="text-center align-middle">Progres</th>
		                    					<th scope="col" rowspan="2" class="text-center align-middle">Bobot</th>
		                    				</tr>
		                    				<tr>
		                    					<th scope="col" class="text-center align-middle">Input</th>
		                    					<th scope="col" class="text-center align-middle">Before</th>
		                    					<th scope="col" class="text-center align-middle">Bobot</th>
		                    				</tr>
		                    			</thead>
		                    			<tbody>
		                    				<tr>
		                    					<td class="align-middle" id="nama_mobAlat">Mobilisasi Alat</td>
		                    					<td id="input_mobAlat"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="1"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_mobAlat">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_mobAlat">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_mobAlat">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle" id="nama_kemPekerja">Gudang Kemp. Pekerja</td>
		                    					<td id="input_kemPekerja"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="2"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_kemPekerja">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_kemPekerja">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_kemPekerja">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle" id="nama_airPekerja">Air Pekerja</td>
		                    					<td id="input_airPekerja"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="3"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_airPekerja">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_airPekerja">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_airPekerja">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle" id="nama_keamanan">Keamanan</td>
		                    					<td id="input_keamanan"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="4"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_keamanan">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_keamanan">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_keamanan">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle"><b>JUMLAH</b></td>
		                    					<td class="text-center"><b><label class="jml_persiapan">0</label> %</b></td>
		                    					<td class="align-middle text-center"><b id="progresSebelumnya_jml_persiapan">0</b> %</td>
		                    					<td class="align-middle text-center"><b id="Bobot_jml_persiapan">0</b> %</td>
		                    					<td class="align-middle text-center"><b id="AllBobot_jml_persiapan">0</b> %</td>
		                    				</tr>
		                    			</tbody>
		                    		</table>
	                        	</div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk Pondasi -->
	            	<div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingTwo" style="height: 30px">
	                        <label style="margin-top: 4px; margin-left: 10px; font-family: times new roman"><b>2. Pondasi</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" class="togglePerUnit_Pondasi">
	                        </div>
	                    </div>
	                    <div id="body_Pondasi" style="display: none;">
	                        <div class="card-body">
	                        	<div class="table-responsive-sm">
		                        	<table class="table table-bordered table-sm">
		                    			<thead>
		                    				<tr>
		                    					<th scope="col" rowspan="2" class="text-center align-middle" width="150px">Nama Pekerjaan</th>
		                    					<th scope="col" colspan="3" class="text-center align-middle">Progres</th>
		                    					<th scope="col" rowspan="2" class="text-center align-middle">Bobot</th>
		                    				</tr>
		                    				<tr>
		                    					<th scope="col" class="text-center align-middle">Input</th>
		                    					<th scope="col" class="text-center align-middle">Before</th>
		                    					<th scope="col" class="text-center align-middle">Bobot</th>
		                    				</tr>
		                    			</thead>
		                    			<tbody>
		                    				<tr>
		                    					<td class="align-middle" id="nama_bouwplank">Bouwplank</td>
		                    					<td id="input_bouwplank"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="5"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_bouwplank">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_bouwplank">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_bouwplank">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle" id="nama_galianTanah">Galian Tanah</td>
		                    					<td id="input_galianTanah"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="6"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_galianTanah">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_galianTanah">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_galianTanah">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle" id="nama_UrugTanah">Urugan Tanah</td>
		                    					<td id="input_UrugTanah"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="7"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_UrugTanah">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_UrugTanah">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_UrugTanah">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle" id="nama_Pembesian_pondasi">Pembesian Pondasi</td>
		                    					<td id="input_Pembesian_pondasi"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="8"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_Pembesian_pondasi">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_Pembesian_pondasi">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_Pembesian_pondasi">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle" id="nama_begesting_pondasi">Begesting Pondasi</td>
		                    					<td id="input_begesting_pondasi"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="9"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_begesting_pondasi">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_begesting_pondasi">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_begesting_pondasi">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle" id="nama_pengecoran_pondasi">Pengecoran Pondasi</td>
		                    					<td id="input_pengecoran_pondasi"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="10"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_pengecoran_pondasi">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_pengecoran_pondasi">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_pengecoran_pondasi">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle" id="nama_pembongkaran_pondasi">Pembongkaran Pondasi</td>
		                    					<td id="input_pembongkaran_pondasi"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="11"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_pembongkaran_pondasi">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_pembongkaran_pondasi">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_pembongkaran_pondasi">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle"><b>JUMLAH</b></td>
		                    					<td class="text-center"><b><label class="jml_pondasi">0</label> %</b></td>
		                    					<td class="align-middle text-center"><b id="progresSebelumnya_jml_pondasi">0</b> %</td>
		                    					<td class="align-middle text-center"><b id="Bobot_jml_pondasi">0</b> %</td>
		                    					<td class="align-middle text-center"><b id="AllBobot_jml_pondasi">0</b> %</td>
		                    				</tr>
		                    			</tbody>
		                    		</table>
		                    	</div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk Sloof -->
	            	<div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingThree" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>3. Sloof</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" class="togglePerUnit_sloof">
	                        </div>
	                    </div>
	                    <div id="body_sloof" style="display: none;">
	                        <div class="card-body">
	                        	<div class="table-responsive-sm">
		                    		<table class="table table-bordered table-sm">
		                    			<thead>
		                    				<tr>
		                    					<th scope="col" rowspan="2" class="text-center align-middle" width="150px">Nama Pekerjaan</th>
		                    					<th scope="col" colspan="3" class="text-center align-middle">Progres</th>
		                    					<th scope="col" rowspan="2" class="text-center align-middle">Bobot</th>
		                    				</tr>
		                    				<tr>
		                    					<th scope="col" class="text-center align-middle" width="100px">Input</th>
		                    					<th scope="col" class="text-center align-middle">Before</th>
		                    					<th scope="col" class="text-center align-middle" width="20px">Bobot</th>
		                    				</tr>
		                    			</thead>
		                    			<tbody>
		                    				<tr>
		                    					<td class="align-middle" id="nama_Pembesian_sloof">Pembesian Sloof</td>
		                    					<td id="input_Pembesian_sloof"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="12"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_Pembesian_sloof">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_Pembesian_sloof">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_Pembesian_sloof">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle" id="nama_begesting_sloof">Begesting Sloof</td>
		                    					<td id="input_begesting_sloof"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="13"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_begesting_sloof">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_begesting_sloof">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_begesting_sloof">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle" id="nama_pengecoran_sloof">Pengecoran Sloof</td>
		                    					<td id="input_pengecoran_sloof"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="14"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_pengecoran_sloof">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_pengecoran_sloof">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_pengecoran_sloof">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle" id="nama_pembongkaran_sloof">Pembongkaran Sloof</td>
		                    					<td id="input_pembongkaran_sloof"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="15"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_pembongkaran_sloof">0</label> %</td>
		                    					<td class="align-middle text-center" width="20px"><label id="Bobot_pembongkaran_sloof">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_pembongkaran_sloof">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle"><b>JUMLAH</b></td>
		                    					<td class="text-center"><b><label class="jml_sloof">0</label> %</b></td>
		                    					<td class="align-middle text-center"><b id="progresSebelumnya_jml_sloof">0</b> %</td>
		                    					<td class="align-middle text-center"><b id="Bobot_jml_sloof">0</b> %</td>
		                    					<td class="align-middle text-center"><b id="AllBobot_jml_sloof">0</b> %</td>
		                    				</tr>
		                    			</tbody>
		                    		</table>
	                        	</div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk Balok -->
	            	<div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFour" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>4. Balok</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" class="togglePerUnit_balok">
	                        </div>
	                    </div>
	                    <div id="body_balok" style="display: none;">
	                        <div class="card-body">
	                        	<div class="table-responsive-sm">
		                    		<table class="table table-bordered table-sm">
		                    			<thead>
		                    				<tr>
		                    					<th scope="col" rowspan="2" class="text-center align-middle" width="150px">Nama Pekerjaan</th>
		                    					<th scope="col" colspan="3" class="text-center align-middle">Progres</th>
		                    					<th scope="col" rowspan="2" class="text-center align-middle">Bobot</th>
		                    				</tr>
		                    				<tr>
		                    					<th scope="col" class="text-center align-middle" width="100px">Input</th>
		                    					<th scope="col" class="text-center align-middle">Before</th>
		                    					<th scope="col" class="text-center align-middle" width="20px">Bobot</th>
		                    				</tr>
		                    			</thead>
		                    			<tbody>
		                    				<tr>
		                    					<td class="align-middle" id="nama_Pembesian_balok">Pembesian Balok</td>
		                    					<td id="input_Pembesian_balok"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="16"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_Pembesian_balok">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_Pembesian_balok">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_Pembesian_balok">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle" id="nama_begesting_balok">Begesting Balok</td>
		                    					<td id="input_begesting_balok"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="17"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_begesting_balok">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_begesting_balok">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_begesting_balok">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle" id="nama_pengecoran_balok">Pengecoran Balok</td>
		                    					<td id="input_pengecoran_balok"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="18"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_pengecoran_balok">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_pengecoran_balok">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_pengecoran_balok">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle" id="nama_pembongkaran_balok">Pembongkaran Balok</td>
		                    					<td id="input_pembongkaran_balok"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="19"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_pembongkaran_balok">0</label> %</td>
		                    					<td class="align-middle text-center" width="20px"><label id="Bobot_pembongkaran_balok">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_pembongkaran_balok">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle"><b>JUMLAH</b></td>
		                    					<td class="text-center"><b><label class="jml_balok">0</label> %</b></td>
		                    					<td class="align-middle text-center"><b id="progresSebelumnya_jml_balok">0</b> %</td>
		                    					<td class="align-middle text-center"><b id="Bobot_jml_balok">0</b> %</td>
		                    					<td class="align-middle text-center"><b id="AllBobot_jml_balok">0</b> %</td>
		                    				</tr>
		                    			</tbody>
		                    		</table>
	                        	</div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk Kolom -->
	            	<div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFive" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>5. Kolom</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" class="togglePerUnit_kolom">
	                        </div>
	                    </div>
	                    <div id="body_kolom" style="display: none;">
	                        <div class="card-body">
	                        	<div class="table-responsive-sm">
		                    		<table class="table table-bordered table-sm">
		                    			<thead>
		                    				<tr>
		                    					<th scope="col" rowspan="2" class="text-center align-middle" width="150px">Nama Pekerjaan</th>
		                    					<th scope="col" colspan="3" class="text-center align-middle">Progres</th>
		                    					<th scope="col" rowspan="2" class="text-center align-middle">Bobot</th>
		                    				</tr>
		                    				<tr>
		                    					<th scope="col" class="text-center align-middle" width="100px">Input</th>
		                    					<th scope="col" class="text-center align-middle">Before</th>
		                    					<th scope="col" class="text-center align-middle" width="20px">Bobot</th>
		                    				</tr>
		                    			</thead>
		                    			<tbody>
		                    				<tr>
		                    					<td class="align-middle" id="nama_Pembesian_kolom">Pembesian kolom</td>
		                    					<td id="input_Pembesian_kolom"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="20"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_Pembesian_kolom">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_Pembesian_kolom">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_Pembesian_kolom">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle" id="nama_begesting_kolom">Begesting kolom</td>
		                    					<td id="input_begesting_kolom"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="21"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_begesting_kolom">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_begesting_kolom">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_begesting_kolom">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle" id="nama_pengecoran_kolom">Pengecoran kolom</td>
		                    					<td id="input_pengecoran_kolom"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="22"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_pengecoran_kolom">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_pengecoran_kolom">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_pengecoran_kolom">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle" id="nama_pembongkaran_kolom">Pembongkaran kolom</td>
		                    					<td id="input_pembongkaran_kolom"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="23"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_pembongkaran_kolom">0</label> %</td>
		                    					<td class="align-middle text-center" width="20px"><label id="Bobot_pembongkaran_kolom">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_pembongkaran_kolom">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle"><b>JUMLAH</b></td>
		                    					<td class="text-center"><b><label class="jml_kolom">0</label> %</b></td>
		                    					<td class="align-middle text-center"><b id="progresSebelumnya_jml_kolom">0</b> %</td>
		                    					<td class="align-middle text-center"><b id="Bobot_jml_kolom">0</b> %</td>
		                    					<td class="align-middle text-center"><b id="AllBobot_jml_kolom">0</b> %</td>
		                    				</tr>
		                    			</tbody>
		                    		</table>
	                        	</div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk Batu Bata -->
	                <div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFive" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>6. Batu Bata</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" class="togglePerUnit_batubata">
	                        </div>
	                    </div>
	                    <div id="body_batubata" style="display: none;">
	                        <div class="card-body">
	                        	<div class="table-responsive-sm">
		                    		<table class="table table-bordered table-sm">
		                    			<thead>
		                    				<tr>
		                    					<th scope="col" rowspan="2" class="text-center align-middle" width="150px">Nama Pekerjaan</th>
		                    					<th scope="col" colspan="3" class="text-center align-middle">Progres</th>
		                    					<th scope="col" rowspan="2" class="text-center align-middle">Bobot</th>
		                    				</tr>
		                    				<tr>
		                    					<th scope="col" class="text-center align-middle" width="100px">Input</th>
		                    					<th scope="col" class="text-center align-middle">Before</th>
		                    					<th scope="col" class="text-center align-middle" width="20px">Bobot</th>
		                    				</tr>
		                    			</thead>
		                    			<tbody>
		                    				<tr>
		                    					<td class="align-middle" id="nama_bataDinding">Batu Bata Dinding</td>
		                    					<td id="input_bataDinding"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="24"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_bataDinding">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_bataDinding">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_bataDinding">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle" id="nama_bataSekat">Batu Bata Sekat</td>
		                    					<td id="input_bataSekat"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="25"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_bataSekat">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_bataSekat">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_bataSekat">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle" id="nama_bataKamarMandi">Batu Bata Kamar Mandi</td>
		                    					<td id="input_bataKamarMandi"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="26"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_bataKamarMandi">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_bataKamarMandi">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_bataKamarMandi">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle"><b>JUMLAH</b></td>
		                    					<td class="text-center"><b><label class="jmlBata">0</label> %</b></td>
		                    					<td class="align-middle text-center"><b id="progresSebelumnya_jmlBata">0</b> %</td>
		                    					<td class="align-middle text-center"><b id="Bobot_jmlBata">0</b> %</td>
		                    					<td class="align-middle text-center"><b id="AllBobot_jmlBata">0</b> %</td>
		                    				</tr>
		                    			</tbody>
		                    		</table>
	                        	</div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk pleseter aci -->
	                <div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFive" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>7. Plester Aci</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" class="togglePerUnit_plesteraci">
	                        </div>
	                    </div>
	                    <div id="body_plesteraci" style="display: none;">
	                        <div class="card-body">
	                        	<div class="table-responsive-sm">
		                    		<table class="table table-bordered table-sm">
		                    			<thead>
		                    				<tr>
		                    					<th scope="col" rowspan="2" class="text-center align-middle" width="150px">Nama Pekerjaan</th>
		                    					<th scope="col" colspan="3" class="text-center align-middle">Progres</th>
		                    					<th scope="col" rowspan="2" class="text-center align-middle">Bobot</th>
		                    				</tr>
		                    				<tr>
		                    					<th scope="col" class="text-center align-middle" width="100px">Input</th>
		                    					<th scope="col" class="text-center align-middle">Before</th>
		                    					<th scope="col" class="text-center align-middle" width="20px">Bobot</th>
		                    				</tr>
		                    			</thead>
		                    			<tbody>
		                    				<tr>
		                    					<td class="align-middle" id="nama_aciDinding">Plester Aci Dinding</td>
		                    					<td id="input_aciDinding"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="27"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_aciDinding">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_aciDinding">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_aciDinding">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle" id="nama_aciSekat">Plester Aci Sekat</td>
		                    					<td id="input_aciSekat"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="28"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_aciSekat">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_aciSekat">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_aciSekat">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle" id="nama_aciKamarMandi">Plester Aci Kamar Mandi</td>
		                    					<td id="input_aciKamarMandi"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="29"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_aciKamarMandi">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_aciKamarMandi">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_aciKamarMandi">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle" id="nama_aciLantai">Plester Lantai</td>
		                    					<td id="input_aciLantai"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="30"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_aciLantai">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_aciLantai">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_aciLantai">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle" id="nama_aciTeras">Plester Aci Teras</td>
		                    					<td id="input_aciTeras"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="31"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_aciTeras">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_aciTeras">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_aciTeras">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle"><b>JUMLAH</b></td>
		                    					<td class="text-center"><b><label class="jmlAci">0</label> %</b></td>
		                    					<td class="align-middle text-center"><b id="progresSebelumnya_jmlAci">0</b> %</td>
		                    					<td class="align-middle text-center"><b id="Bobot_jmlAci">0</b> %</td>
		                    					<td class="align-middle text-center"><b id="AllBobot_jmlAci">0</b> %</td>
		                    				</tr>
		                    			</tbody>
		                    		</table>
	                        	</div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk atap -->
	                <div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFive" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>8. Atap</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" class="togglePerUnit_atap">
	                        </div>
	                    </div>
	                    <div id="body_atap" style="display: none;">
	                        <div class="card-body">
	                        	<div class="table-responsive-sm">
		                    		<table class="table table-bordered table-sm">
		                    			<thead>
		                    				<tr>
		                    					<th scope="col" rowspan="2" class="text-center align-middle" width="150px">Nama Pekerjaan</th>
		                    					<th scope="col" colspan="3" class="text-center align-middle">Progres</th>
		                    					<th scope="col" rowspan="2" class="text-center align-middle">Bobot</th>
		                    				</tr>
		                    				<tr>
		                    					<th scope="col" class="text-center align-middle" width="100px">Input</th>
		                    					<th scope="col" class="text-center align-middle">Before</th>
		                    					<th scope="col" class="text-center align-middle" width="20px">Bobot</th>
		                    				</tr>
		                    			</thead>
		                    			<tbody>
		                    				<tr>
		                    					<td class="align-middle" id="nama_rangkaAtap">Pemasangan Rangka Atap</td>
		                    					<td id="input_rangkaAtap"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="32"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_rangkaAtap">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_rangkaAtap">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_rangkaAtap">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle" id="nama_penutupAtap">Pemasangan Penutup Atap</td>
		                    					<td id="input_penutupAtap"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="33"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_penutupAtap">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_penutupAtap">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_penutupAtap">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle" id="nama_lisplankAtap">Pemasangan Lisplank Atap</td>
		                    					<td id="input_lisplankAtap"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="34"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_lisplankAtap">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_lisplankAtap">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_lisplankAtap">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle"><b>JUMLAH</b></td>
		                    					<td class="text-center"><b><label class="jmlAtap">0</label> %</b></td>
		                    					<td class="align-middle text-center"><b id="progresSebelumnya_jmlAtap">0</b> %</td>
		                    					<td class="align-middle text-center"><b id="Bobot_jmlAtap">0</b> %</td>
		                    					<td class="align-middle text-center"><b id="AllBobot_jmlAtap">0</b> %</td>
		                    				</tr>
		                    			</tbody>
		                    		</table>
	                        	</div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk Plafon -->
	                <div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFive" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>9. Plafon</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" class="togglePerUnit_Plafon">
	                        </div>
	                    </div>
	                    <div id="body_Plafon" style="display: none;">
	                        <div class="card-body">
	                        	<div class="table-responsive-sm">
		                    		<table class="table table-bordered table-sm">
		                    			<thead>
		                    				<tr>
		                    					<th scope="col" rowspan="2" class="text-center align-middle" width="150px">Nama Pekerjaan</th>
		                    					<th scope="col" colspan="3" class="text-center align-middle">Progres</th>
		                    					<th scope="col" rowspan="2" class="text-center align-middle">Bobot</th>
		                    				</tr>
		                    				<tr>
		                    					<th scope="col" class="text-center align-middle" width="100px">Input</th>
		                    					<th scope="col" class="text-center align-middle">Before</th>
		                    					<th scope="col" class="text-center align-middle" width="20px">Bobot</th>
		                    				</tr>
		                    			</thead>
		                    			<tbody>
		                    				<tr>
		                    					<td class="align-middle" id="nama_rangkaPlafon">Rangka Plafon</td>
		                    					<td id="input_rangkaPlafon"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="35"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_rangkaPlafon">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_rangkaPlafon">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_rangkaPlafon">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle" id="nama_penutupPalfon">Penutup Papan Plafon</td>
		                    					<td id="input_penutupPalfon"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="36"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_penutupPalfon">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_penutupPalfon">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_penutupPalfon">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle" id="nama_dempulPlafon">Dempul Plafon</td>
		                    					<td id="input_dempulPlafon"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="37"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_dempulPlafon">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_dempulPlafon">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_dempulPlafon">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle" id="nama_cetPlafon">Pengecetan Plafon</td>
		                    					<td id="input_cetPlafon"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="38"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_cetPlafon">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_cetPlafon">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_cetPlafon">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle"><b>JUMLAH</b></td>
		                    					<td class="text-center"><b><label class="jmlPlafon">0</label> %</b></td>
		                    					<td class="align-middle text-center"><b id="progresSebelumnya_jmlPlafon">0</b> %</td>
		                    					<td class="align-middle text-center"><b id="Bobot_jmlPlafon">0</b> %</td>
		                    					<td class="align-middle text-center"><b id="AllBobot_jmlPlafon">0</b> %</td>
		                    				</tr>
		                    			</tbody>
		                    		</table>
	                        	</div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk Keramik -->
	                <div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFive" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>10. Keramik</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" class="togglePerUnit_Keramik">
	                        </div>
	                    </div>
	                    <div id="body_Keramik" style="display: none;">
	                        <div class="card-body">
	                        	<div class="table-responsive-sm">
		                    		<table class="table table-bordered table-sm">
		                    			<thead>
		                    				<tr>
		                    					<th scope="col" rowspan="2" class="text-center align-middle" width="150px">Nama Pekerjaan</th>
		                    					<th scope="col" colspan="3" class="text-center align-middle">Progres</th>
		                    					<th scope="col" rowspan="2" class="text-center align-middle">Bobot</th>
		                    				</tr>
		                    				<tr>
		                    					<th scope="col" class="text-center align-middle" width="100px">Input</th>
		                    					<th scope="col" class="text-center align-middle">Before</th>
		                    					<th scope="col" class="text-center align-middle" width="20px">Bobot</th>
		                    				</tr>
		                    			</thead>
		                    			<tbody>
		                    				<tr>
		                    					<td class="align-middle" id="nama_kerKamarMandi">Keramik Kamar Mandi</td>
		                    					<td id="input_kerKamarMandi"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="39"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_kerKamarMandi">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_kerKamarMandi">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_kerKamarMandi">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle" id="nama_KerLantai">Keramik Lantai</td>
		                    					<td id="input_KerLantai"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="40"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_KerLantai">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_KerLantai">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_KerLantai">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle" id="nama_kerDinding">Keramik Dinding</td>
		                    					<td id="input_kerDinding"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="41"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_kerDinding">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_kerDinding">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_kerDinding">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle" id="nama_kerCloset">Keramik Closet</td>
		                    					<td id="input_kerCloset"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="42"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_kerCloset">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_kerCloset">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_kerCloset">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle" id="nama_kerTeras">Keramik Teras</td>
		                    					<td id="input_kerTeras"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="43"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_kerTeras">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_kerTeras">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_kerTeras">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle"><b>JUMLAH</b></td>
		                    					<td class="text-center"><b><label class="jmlKeramik">0</label> %</b></td>
		                    					<td class="align-middle text-center"><b id="progresSebelumnya_jmlKeramik">0</b> %</td>
		                    					<td class="align-middle text-center"><b id="Bobot_jmlKeramik">0</b> %</td>
		                    					<td class="align-middle text-center"><b id="AllBobot_jmlKeramik">0</b> %</td>
		                    				</tr>
		                    			</tbody>
		                    		</table>
	                        	</div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk Plumbing -->
	                <div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFive" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>11. Plumbing</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" class="togglePerUnit_Plumbing">
	                        </div>
	                    </div>
	                    <div id="body_Plumbing" style="display: none;">
	                        <div class="card-body">
	                        	<div class="table-responsive-sm">
		                    		<table class="table table-bordered table-sm">
		                    			<thead>
		                    				<tr>
		                    					<th scope="col" rowspan="2" class="text-center align-middle" width="150px">Nama Pekerjaan</th>
		                    					<th scope="col" colspan="3" class="text-center align-middle">Progres</th>
		                    					<th scope="col" rowspan="2" class="text-center align-middle">Bobot</th>
		                    				</tr>
		                    				<tr>
		                    					<th scope="col" class="text-center align-middle" width="100px">Input</th>
		                    					<th scope="col" class="text-center align-middle">Before</th>
		                    					<th scope="col" class="text-center align-middle" width="20px">Bobot</th>
		                    				</tr>
		                    			</thead>
		                    			<tbody>
		                    				<tr>
		                    					<td class="align-middle" id="nama_airBersih">Pipa Air Besir dan Air Kotor</td>
		                    					<td id="input_airBersih"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="44"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_airBersih">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_airBersih">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_airBersih">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle" id="nama_septiiktank">Septik Tank Dan Penutupnya</td>
		                    					<td id="input_septiiktank"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="45"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_septiiktank">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_septiiktank">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_septiiktank">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle"><b>JUMLAH</b></td>
		                    					<td class="text-center"><b><label class="jmlPlumbing">0</label> %</b></td>
		                    					<td class="align-middle text-center"><b id="progresSebelumnya_jmlPlumbing">0</b> %</td>
		                    					<td class="align-middle text-center"><b id="Bobot_jmlPlumbing">0</b> %</td>
		                    					<td class="align-middle text-center"><b id="AllBobot_jmlPlumbing">0</b> %</td>
		                    				</tr>
		                    			</tbody>
		                    		</table>
	                        	</div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk Listrik -->
	                <div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFive" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>12. Listrik</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" class="togglePerUnit_Listrik">
	                        </div>
	                    </div>
	                    <div id="body_Listrik" style="display: none;">
	                        <div class="card-body">
	                        	<div class="table-responsive-sm">
		                    		<table class="table table-bordered table-sm">
		                    			<thead>
		                    				<tr>
		                    					<th scope="col" rowspan="2" class="text-center align-middle" width="150px">Nama Pekerjaan</th>
		                    					<th scope="col" colspan="3" class="text-center align-middle">Progres</th>
		                    					<th scope="col" rowspan="2" class="text-center align-middle">Bobot</th>
		                    				</tr>
		                    				<tr>
		                    					<th scope="col" class="text-center align-middle" width="100px">Input</th>
		                    					<th scope="col" class="text-center align-middle">Before</th>
		                    					<th scope="col" class="text-center align-middle" width="20px">Bobot</th>
		                    				</tr>
		                    			</thead>
		                    			<tbody>
		                    				<tr>
		                    					<td class="align-middle" id="nama_instalasiListrik">Listrik</td>
		                    					<td id="input_instalasiListrik"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="46"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_instalasiListrik">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_instalasiListrik">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_instalasiListrik">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle"><b>JUMLAH</b></td>
		                    					<td class="text-center"><b><label class="jmlListrik">0</label> %</b></td>
		                    					<td class="align-middle text-center"><b id="progresSebelumnya_jmlListrik">0</b> %</td>
		                    					<td class="align-middle text-center"><b id="Bobot_jmlListrik">0</b> %</td>
		                    					<td class="align-middle text-center"><b id="AllBobot_jmlListrik">0</b> %</td>
		                    				</tr>
		                    			</tbody>
		                    		</table>
	                        	</div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk Pengecetan -->
	                <div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFive" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>13. Pengecetan</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" class="togglePerUnit_Pengecetan">
	                        </div>
	                    </div>
	                    <div id="body_Pengecetan" style="display: none;">
	                        <div class="card-body">
	                        	<div class="table-responsive-sm">
		                    		<table class="table table-bordered table-sm">
		                    			<thead>
		                    				<tr>
		                    					<th scope="col" rowspan="2" class="text-center align-middle" width="150px">Nama Pekerjaan</th>
		                    					<th scope="col" colspan="3" class="text-center align-middle">Progres</th>
		                    					<th scope="col" rowspan="2" class="text-center align-middle">Bobot</th>
		                    				</tr>
		                    				<tr>
		                    					<th scope="col" class="text-center align-middle" width="100px">Input</th>
		                    					<th scope="col" class="text-center align-middle">Before</th>
		                    					<th scope="col" class="text-center align-middle" width="20px">Bobot</th>
		                    				</tr>
		                    			</thead>
		                    			<tbody>
		                    				<tr>
		                    					<td class="align-middle" id="nama_cet">Pengecetan</td>
		                    					<td id="input_cet"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="47"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_cet">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_cet">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_cet">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle"><b>JUMLAH</b></td>
		                    					<td class="text-center"><b><label class="jmlCet">0</label> %</b></td>
		                    					<td class="align-middle text-center"><b id="progresSebelumnya_jmlCet">0</b> %</td>
		                    					<td class="align-middle text-center"><b id="Bobot_jmlCet">0</b> %</td>
		                    					<td class="align-middle text-center"><b id="AllBobot_jmlCet">0</b> %</td>
		                    				</tr>
		                    			</tbody>
		                    		</table>
	                        	</div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk pintu -->
	                <div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFive" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>14. Pintu Dan Jendela</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" class="togglePerUnit_pintuAdd">
	                        </div>
	                    </div>
	                    <div id="body_pintuAdd" style="display: none;">
	                        <div class="card-body">
	                        	<div class="table-responsive-sm">
		                    		<table class="table table-bordered table-sm">
		                    			<thead>
		                    				<tr>
		                    					<th scope="col" rowspan="2" class="text-center align-middle" width="150px">Nama Pekerjaan</th>
		                    					<th scope="col" colspan="3" class="text-center align-middle">Progres</th>
		                    					<th scope="col" rowspan="2" class="text-center align-middle">Bobot</th>
		                    				</tr>
		                    				<tr>
		                    					<th scope="col" class="text-center align-middle" width="100px">Input</th>
		                    					<th scope="col" class="text-center align-middle">Before</th>
		                    					<th scope="col" class="text-center align-middle" width="20px">Bobot</th>
		                    				</tr>
		                    			</thead>
		                    			<tbody>
		                    				<tr>
		                    					<td class="align-middle" id="nama_pintu">Pemasangan Pintu</td>
		                    					<td id="input_pintu"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="48"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_pintu">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_pintu">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_pintu">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle" id="nama_jendela">Pemasangan Jendela</td>
		                    					<td id="input_jendela"><input type="text" class="form-control form-control-sm text-center" placeholder="0" name="49"></td>
		                    					<td class="align-middle text-center"><label id="progresSebelumnya_jendela">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="Bobot_jendela">0</label> %</td>
		                    					<td class="align-middle text-center"><label id="AllBobot_jendela">0</label> %</td>
		                    				</tr>
		                    				<tr>
		                    					<td class="align-middle"><b>JUMLAH</b></td>
		                    					<td class="text-center"><b><label class="jmlpintu">0</label> %</b></td>
		                    					<td class="align-middle text-center"><b id="progresSebelumnya_jmlpintu">0</b> %</td>
		                    					<td class="align-middle text-center"><b id="Bobot_jmlpintu">0</b> %</td>
		                    					<td class="align-middle text-center"><b id="AllBobot_jmlpintu">0</b> %</td>
		                    				</tr>
		                    			</tbody>
		                    		</table>
	                        	</div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Info Total Bobot -->
	                <div class="card">
	                	<div class="table-responsive-sm">
	                		<table class="table table-bordered table-sm">
	                			<thead>
	                				<tr>
	                					<th scope="col" rowspan="2" class="text-center align-middle">Total Input</th>
	                					<th scope="col" colspan="2" class="text-center align-middle">Progres</th>
	                					<th scope="col" rowspan="2" class="text-center align-middle">Bobot</th>
	                				</tr>
	                				<tr>
	                					<th scope="col" class="text-center align-middle">Before</th>
	                					<th scope="col" class="text-center align-middle" width="20px">Bobot</th>
	                				</tr>
	                			</thead>
	                			<tbody>
	                				<tr>
	                					<td class="align-middle text-center"><b class="totalProgres">0</b> %</td>
	                					<td class="align-middle text-center"><b id="progresSebelumnya_totalProgres">0</b> %</td>
	                					<td class="align-middle text-center"><b id="Bobot_totalProgres">0</b> %</td>
	                					<td class="align-middle text-center"><b id="AllBobot_totalProgres">0</b> %</td>
	                				</tr>
	                			</tbody>
	                		</table>
	                	</div>
	                </div>
	                <input type="hidden" name="idpembangunan" id="pembangunan_id">
	                <input type="hidden" name="jml1">
	                <input type="hidden" name="jml2">
	                <input type="hidden" name="jml3">
	                <input type="hidden" name="jml4">
	                <input type="hidden" name="jml5">
	                <input type="hidden" name="jml6">
	                <input type="hidden" name="jml7">
	                <input type="hidden" name="jml8">
	                <input type="hidden" name="jml9">
	                <input type="hidden" name="jml10">
	                <input type="hidden" name="jml11">
	                <input type="hidden" name="jml12">
	                <input type="hidden" name="jml13">
	                <input type="hidden" name="jml14">
	                <input type="hidden" name="jmlall">
		            <!--Tombol Simpan Dan reset-->
		            <div style="margin-top: 20px; font-family: times new roman" class="float-right" id="btnaction">
		                <button type="reset" class="btn btn-primary btn-sm btnResetPerUnit"><i class="fa fa-redo fa-fw"></i> Reset</button>
		                <a class="btn btn-primary btn-sm text-white btnSavePerUnit"><i class="fa fa-save fa-fw"></i> Save</a>
		            </div>
		        </form>
	        </div>
          <br>    
    </div>
  </div>
</div>
<!-- Modal view -->
<div class="modal fade" id="modaledittemporaryProgres" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog  modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title judultemporaryprogres" id="exampleModalLongTitle" style="font-family: times new roman"></h4>
				<button type="button" class="close backprogres" data-dismiss="modal" aria-label="Close">
					<i class="fa fa-backspace fa-fw"></i>
				</button>
			</div>
      		<div class="modal-body">

	        	<form id="frmtemporaryProgres" class="form-sample" style="font-family: times new roman">
	            	
	            	<!-- Untuk Persiapan -->
	            	<div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingOne" style="height: 30px">
	                        <label style="margin-top: 4px; margin-left: 10px; font-family: times new roman"><b>1. Persiapan</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" class="edittoggle_persiapan" checked>
	                        </div>
	                    </div>
	                    <div id="persiapan_view">
	                        <div class="card-body">
	                        	<table class="table" style="font-size: 14px;">
			                        <thead >
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px">
			                                	<label class="control-label">Mobilisasi Alat</label>
			                                </th>
			                                <td id="mobAlat" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Gudang Kemp. Pekerja</label>
			                                </th>
			                                <td id="kemPekerja" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Air Pekerja</label>
			                                </th>
			                                <td id="airPekerja" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Keamanan</label>
			                                </th>
			                                <td id="keamanan" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Jumlah</label>
			                                </th>
			                                <td id="jml_persiapan" width="100px" class="text-center" ></td>
			                            </tr>
			                        </thead>
			                    </table>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk Pondasi -->
	            	<div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingTwo" style="height: 30px">
	                        <label style="margin-top: 4px; margin-left: 10px; font-family: times new roman"><b>2. Pondasi</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" class="edittoggle_Pondasi">
	                        </div>
	                    </div>
	                    <div id="Pondasi_view" style="display: none;">
	                        <div class="card-body">
	                        	<table class="table" style="font-size: 14px;">
			                        <thead >
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px">
			                                	<label class="control-label">Bouwplank :</label>
			                                </th>
			                                <td id="bouwplank" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Galian Tanah :</label>
			                                </th>
			                                <td id="galianTanah" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Urugan Tanah :</label>
			                                </th>
			                                <td id="UrugTanah" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Pembesian Pondasi :</label>
			                                </th>
			                                <td id="Pembesian_pondasi" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Begesting Pondasi :</label>
			                                </th>
			                                <td id="begesting_pondasi" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">engecoran Pondasi :</label>
			                                </th>
			                                <td id="pengecoran_pondasi" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Pembongkaran Pondasi :</label>
			                                </th>
			                                <td id="pembongkaran_pondasi" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Jumlah</label>
			                                </th>
			                                <td id="jml_pondasi" width="100px" class="text-center" ></td>
			                            </tr>
			                        </thead>
			                    </table>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk Sloof -->
	            	<div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingThree" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>3. Sloof</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" class="edittoggle_sloof">
	                        </div>
	                    </div>
	                    <div id="sloof_view" style="display: none;">
	                        <div class="card-body">
	                        	<table class="table" style="font-size: 14px;">
			                        <thead >
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px">
			                                	<label class="control-label">Pembesian sloof</label>
			                                </th>
			                                <td id="Pembesian_sloof" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Begesting sloof</label>
			                                </th>
			                                <td id="begesting_sloof" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Pengecoran sloof</label>
			                                </th>
			                                <td id="pengecoran_sloof" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Pembongkaran sloof</label>
			                                </th>
			                                <td id="pembongkaran_sloof" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Jumlah</label>
			                                </th>
			                                <td id="jml_sloof" width="100px" class="text-center" ></td>
			                            </tr>
			                        </thead>
			                    </table>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk Balok -->
	            	<div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFour" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>4. Balok</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" class="edittoggle_balok">
	                        </div>
	                    </div>
	                    <div id="balok_view" style="display: none;">
	                        <div class="card-body">
				                <table class="table" style="font-size: 14px;">
			                        <thead >
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px">
			                                	<label class="control-label">Pembesian Balok</label>
			                                </th>
			                                <td id="Pembesian_balok" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Begesting Balok</label>
			                                </th>
			                                <td id="begesting_balok" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Pengecoran Balok</label>
			                                </th>
			                                <td id="pengecoran_balok" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Pembongkaran Balok</label>
			                                </th>
			                                <td id="pembongkaran_balok" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Jumlah</label>
			                                </th>
			                                <td id="jml_balok" width="100px" class="text-center" ></td>
			                            </tr>
			                        </thead>
			                    </table>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk Kolom -->
	            	<div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFive" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>5. Kolom</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" class="edittoggle_kolom">
	                        </div>
	                    </div>
	                    <div id="kolom_view" style="display: none;">
	                        <div class="card-body">
				                <table class="table" style="font-size: 14px;">
			                        <thead >
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px">
			                                	<label class="control-label">Pembesian Kolom</label>
			                                </th>
			                                <td id="Pembesian_kolom" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Begesting Kolom</label>
			                                </th>
			                                <td id="begesting_kolom" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Pengecoran Kolom</label>
			                                </th>
			                                <td id="pengecoran_kolom" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Pembongkaran Kolom</label>
			                                </th>
			                                <td id="pembongkaran_kolom" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Jumlah</label>
			                                </th>
			                                <td id="jml_kolom" width="100px" class="text-center" ></td>
			                            </tr>
			                        </thead>
			                    </table>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk Batu Bata -->
	                <div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFive" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>6. Batu Bata</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" class="edittoggle_batubata">
	                        </div>
	                    </div>
	                    <div id="batubata_view" style="display: none;">
	                        <div class="card-body">
	                        	<table class="table" style="font-size: 14px;">
			                        <thead >
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px">
			                                	<label class="control-label">Pemasangan Batu Bata Dinding</label>
			                                </th>
			                                <td id="bataDinding" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Pemasangan Batu Bata Sekat</label>
			                                </th>
			                                <td id="bataSekat" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Pemasangan Batu Bata Kamar Mandi</label>
			                                </th>
			                                <td id="bataKamarMandi" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Jumlah</label>
			                                </th>
			                                <td id="jmlBata" width="100px" class="text-center" ></td>
			                            </tr>
			                        </thead>
			                    </table>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk pleseter aci -->
	                <div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFive" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>7. Plester Aci</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" class="edittoggle_plesteraci">
	                        </div>
	                    </div>
	                    <div id="plesteraci_view" style="display: none;">
	                        <div class="card-body">
	                        	<table class="table" style="font-size: 14px;">
			                        <thead >
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px">
			                                	<label class="control-label">Plester Aci Dinding</label>
			                                </th>
			                                <td id="aciDinding" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Plester Aci Sekat</label>
			                                </th>
			                                <td id="aciSekat" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Plester Aci Kamar Mandi</label>
			                                </th>
			                                <td id="aciKamarMandi" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Plester Lantai</label>
			                                </th>
			                                <td id="aciLantai" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Plester Aci Teras</label>
			                                </th>
			                                <td id="aciTeras" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Jumlah</label>
			                                </th>
			                                <td id="jmlAci" width="100px" class="text-center" ></td>
			                            </tr>
			                        </thead>
			                    </table>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk atap -->
	                <div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFive" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>8. Atap</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" class="edittoggle_atap">
	                        </div>
	                    </div>
	                    <div id="atap_view" style="display: none;">
	                        <div class="card-body">
	                        	<table class="table" style="font-size: 14px;">
			                        <thead >
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px">
			                                	<label class="control-label">Pemasangan Rangka Atap</label>
			                                </th>
			                                <td id="rangkaAtap" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Pemasangan Penutup Atap</label>
			                                </th>
			                                <td id="penutupAtap" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Pemasangan Lisplank Atap</label>
			                                </th>
			                                <td id="lisplankAtap" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Jumlah</label>
			                                </th>
			                                <td id="jmlAtap" width="100px" class="text-center" ></td>
			                            </tr>
			                        </thead>
			                    </table>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk Plafon -->
	                <div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFive" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>9. Plafon</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" class="edittoggle_Plafon">
	                        </div>
	                    </div>
	                    <div id="Plafon_view" style="display: none;">
	                        <div class="card-body">
	                        	<table class="table" style="font-size: 14px;">
			                        <thead >
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px">
			                                	<label class="control-label">Pemasangan Rangka Plafon Luar Dalam</label>
			                                </th>
			                                <td id="rangkaPlafon" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Pemasangan Penutup Papan Plafon Luar Dalam</label>
			                                </th>
			                                <td id="penutupPalfon" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Pek. Dempul Plafon Luar Dalam</label>
			                                </th>
			                                <td id="dempulPlafon" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Pek. Pengecetan Plafon Luar Dalam</label>
			                                </th>
			                                <td id="cetPlafon" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Jumlah</label>
			                                </th>
			                                <td id="jmlPlafon" width="100px" class="text-center" ></td>
			                            </tr>
			                        </thead>
			                    </table>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk Keramik -->
	                <div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFive" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>10. Keramik</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" class="edittoggle_Keramik">
	                        </div>
	                    </div>
	                    <div id="Keramik_view" style="display: none;">
	                        <div class="card-body">
	                        	<table class="table" style="font-size: 14px;">
			                        <thead >
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px">
			                                	<label class="control-label">Pemasangan Keramik Kamar Mandi</label>
			                                </th>
			                                <td id="kerKamarMandi" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Pemasangan Keramik Lantai</label>
			                                </th>
			                                <td id="KerLantai" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Pemasangan Keramik Dinding</label>
			                                </th>
			                                <td id="kerDinding" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Pemasangan Keramik Closet</label>
			                                </th>
			                                <td id="kerCloset" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Pemasanganh Keramik Teras</label>
			                                </th>
			                                <td id="kerTeras" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Jumlah</label>
			                                </th>
			                                <td id="jmlKeramik" width="100px" class="text-center" ></td>
			                            </tr>
			                        </thead>
			                    </table>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk Plumbing -->
	                <div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFive" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>11. Plumbing</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" class="edittoggle_Plumbing">
	                        </div>
	                    </div>
	                    <div id="Plumbing_view" style="display: none;">
	                        <div class="card-body">
	                        	<table class="table" style="font-size: 14px;">
			                        <thead >
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px">
			                                	<label class="control-label">Pemasangan Pipa Air Besir dan Air Kotor</label>
			                                </th>
			                                <td id="airBersih" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Pekerjaan Septik Tank Dan Penutupnya</label>
			                                </th>
			                                <td id="septiiktank" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Jumlah</label>
			                                </th>
			                                <td id="jmlPlumbing" width="100px" class="text-center" ></td>
			                            </tr>
			                        </thead>
			                    </table>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk Listrik -->
	                <div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFive" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>12. Listrik</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" class="edittoggle_Listrik">
	                        </div>
	                    </div>
	                    <div id="Listrik_view" style="display: none;">
	                        <div class="card-body">
	                        	<table class="table" style="font-size: 14px;">
			                        <thead >
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px">
			                                	<label class="control-label">Listrik</label>
			                                </th>
			                                <td id="instalasiListrik" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Jumlah</label>
			                                </th>
			                                <td id="jmlListrik" width="100px" class="text-center" ></td>
			                            </tr>
			                        </thead>
			                    </table>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk Pengecetan -->
	                <div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFive" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>13. Pengecetan</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" class="edittoggle_Pengecetan">
	                        </div>
	                    </div>
	                    <div id="Pengecetan_view" style="display: none;">
	                        <div class="card-body">
	                        	<table class="table" style="font-size: 14px;">
			                        <thead >
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px">
			                                	<label class="control-label">Pengecetan</label>
			                                </th>
			                                <td id="cet" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Jumlah</label>
			                                </th>
			                                <td id="jmlCet" width="100px" class="text-center" ></td>
			                            </tr>
			                        </thead>
			                    </table>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk pintu -->
	                <div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFive" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>14. Pintu Dan Jendela</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" class="edittoggle_pintuAdd">
	                        </div>
	                    </div>
	                    <div id="pintuAdd_view" style="display: none;">
	                        <div class="card-body">
	                        	<table class="table" style="font-size: 14px;">
			                        <thead >
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px">
			                                	<label class="control-label">Pemasangan Pintu</label>
			                                </th>
			                                <td id="pintu" width="100px" class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Pemasangan Jendela</label>
			                                </th>
			                                <td id="jendela" width="100px"  class="text-center" style="border-bottom: 0px; border-top: 0px"></td>
			                            </tr>
			                            <tr>
			                                <th class="text-right align-middle" style="border-bottom: 0px; border-top: 0px">
			                                	<label class="control-label">Jumlah</label>
			                                </th>
			                                <td id="jmlpintu" width="100px" class="text-center" ></td>
			                            </tr>
			                        </thead>
			                    </table>
	                        </div>
	                    </div>
	                </div>
	                <!-- Info Total Bobot -->
	                <div class="card" style="height: 35px">
                		<label style="font-size: 16px; margin-top: 5px; margin-left: 10px">Total Progres Pekerjaan <label class="totalProgres">0</label> %</label>
	                </div>
		        </form>
	        </div>
          <br>    
    </div>
  </div>
</div>
<!-- Modal Detail Pengajuan -->
<div class="modal fade" id="modaldetailpengajuan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLongTitle" style="font-family: Courier New"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i class="fa fa-backspace fa-fw"></i>
				</button>
			</div>
      		<div class="modal-body" style="font-family: times new roman">
				<div class="row mb-4">
					<label class="col-md-4 col-sm-4">Nama Proyek</label>
					<label class="col-md-1 col-sm-1">:</label>
					<label class="col-md-7 col-sm-7" id="judulnamaproyek"></label>
				</div>
				<div class="row mb-4">
					<label class="col-md-4 col-sm-4">Nama Pembangunan</label>
					<label class="col-md-1 col-sm-1">:</label>
					<label class="col-md-7 col-sm-7" id="judulnamaPembangunan"></label>
				</div>
				<hr style="border: 1px; border-top: 1px solid #000">	
				<div class="table-responsive-sm">
					<table class="table" id="tabelDetailPembangunan" width="100%">
						<thead>
							<tr>
								<th scope="col">No.</th>
								<th scope="col">Blok</th>
								<th scope="col">Nomor</th>
								<th scope="col">Progres</th>
								<th scope="col">Bobot</th>
							</tr>
						</thead>
						<tfoot>
							<tr style="font-size: 16px">
								<th scope="col" colspan="2" >Jumlah : <label id="jumlahUnit"></label></th>
								<th scope="col" colspan="2" >Progres : <label id="progrestotal"></label></th>
								<th scope="col" >Bobot : <label id="bobotProgres"></label></th>
							</tr>
						</tfoot>
					</table>
				</div>
	        </div>
          <br>    
    </div>
  </div>
</div>
<!-- modal loading -->
<div class="modal fade" id="loading" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="loading mx-auto">
			<span>Loading...</span>			
		</div>
  	</div>
</div>
<input type="hidden" id="statusReset">
<input type="hidden" id="jumlahBlok">
<script type="text/javascript">
$(document).ready(function() {
//fungsi untuk format number
	function formatNumber(num) {
      return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    }  
//fungsi untuk membuat array nama
	var all = ['persiapan','Pondasi','sloof','balok','kolom','batubata','plesteraci','atap','Plafon','Keramik','Plumbing','Listrik','Pengecetan','pintuAdd'];
	var nama = ["mobAlat", "kemPekerja", "airPekerja", "keamanan", "bouwplank", "galianTanah", "UrugTanah", "Pembesian_pondasi", "begesting_pondasi", "pengecoran_pondasi", "pembongkaran_pondasi", "Pembesian_sloof", "begesting_sloof", "pengecoran_sloof", "pembongkaran_sloof", "Pembesian_balok", "begesting_balok", "pengecoran_balok", "pembongkaran_balok", "Pembesian_kolom", "begesting_kolom", "pengecoran_kolom", "pembongkaran_kolom", "bataDinding", "bataSekat", "bataKamarMandi", "aciDinding", "aciSekat", "aciKamarMandi", "aciLantai", "aciTeras", "rangkaAtap", "penutupAtap", "lisplankAtap", "rangkaPlafon", "penutupPalfon", "dempulPlafon", "cetPlafon", "kerKamarMandi", "KerLantai", "kerDinding", "kerCloset", "kerTeras", "airBersih", "septiiktank", "instalasiListrik", "cet", "pintu", "jendela" ];
	var namaJml = ["jml_persiapan", "jml_pondasi", "jml_sloof", "jml_balok", "jml_kolom","jmlBata", "jmlAci", "jmlAtap", "jmlPlafon", "jmlKeramik", "jmlPlumbing","jmlListrik", "jmlCet", "jmlpintu"];
	var namapembagian = ["persiapan", "Pondasi", "sloof", "balok", "kolom", "batubata", "plesteraci", "atap", "Plafon", "Keramik", "Plumbing", "Listrik", "Pengecetan", "pintuAdd"];
//fungsi untuk setting toogle ON/OFF
	all.forEach((data) =>{
		//untuk edit
		$('.edittoggle_'+data).bootstrapToggle({
			off: '<i class="ti-lock"></>',
			on: '<i class="ti-unlock"></>',
			size: 'mini',
			width: '50',
			height:'25',
			style: 'ios',
			onstyle:"info",
			offstyle:'success'
		});
		$('.togglePerUnit_'+data).bootstrapToggle({
			off: '<i class="ti-lock"></>',
			on: '<i class="ti-unlock"></>',
			size: 'mini',
			width: '50',
			height:'25',
			style: 'ios',
			onstyle:"info",
			offstyle:'success'
		});
		$('.edittoggle_'+data).change(function(){
			if ($(this).prop('checked') == true) {
				$('#edit'+data).show('fast').fadeIn(1000);
				$('#'+data+"_view").show('fast').fadeIn(1000);
			}else if ($(this).prop('checked') == false){
				$('#edit'+data).hide('fast').fadeOut(1000);
				$('#'+data+"_view").hide('fast').fadeOut(1000);
			}
		});
		$('.togglePerUnit_'+data).change(function(){
			if ($(this).prop('checked') == true) {
				$('#body_'+data).show('fast').fadeIn(1000);
			}else if ($(this).prop('checked') == false){
				$('#body_'+data).hide('fast').fadeOut(1000);
			}
		});
	});
//fungsi untuk scroll top modal
	function scrollTopModal(){
		$('.modal-body').animate({scrollTop:0});
		all.forEach((dt)=>{
			$('.edittoggle_'+dt).bootstrapToggle('off');
			$('#edit'+dt).hide();
			$('.togglePerUnit_'+dt).bootstrapToggle('off');
			$('#body_'+dt).hide();
		});
		$('.edittoggle_persiapan').bootstrapToggle('on');
	}
//fungsi untuk mengatur loading
    $('#welcome').fadeOut(2000);
	$('#ExportPengajaun').click(function(){
        window.open('ExportPengajaun', '_blank');
    });
	$('.bodyLoading').hide();
    $('#isiHalaman').show();
//fungsi untuk set datatable
    $('#info').show('slow').fadeOut(2000);
    var pengajuan = $('#tablePengajuan').DataTable({
    	"columnDefs": [
			{"orderable": false, "targets": '_all' },
            {"className": "text-center align-middle", "targets": [2,3,4,5]},
          ],
    });
    var progres = $('#tableProgres').DataTable({
    	"columnDefs": [
			{"orderable": false, "targets": '_all' },
            {"className": "text-center", "targets": '_all'}
          ],
    });
    var perBlok = $('#tablePerBlok').DataTable({
    	"lengthChange": false,
    	"autoWidth": false,
    	"columnDefs": [
	    	{ "width": "15%", "targets": [0,1,3,4] },
			{"orderable": false, "targets": '_all' },
            {"className": "text-center align-middle", "targets": '_all'},
          ],
        "language": {
            "lengthMenu": "_MENU_ Data / Page",
            "zeroRecords": "Maaf Tidak Ada Data Yang Ditemukan",
            "info": "Total _TOTAL_ Data",
            "infoEmpty": "Tidak Ada Data Yang Tersedia",
            "infoFiltered": "(Memfilter Dari _MAX_ Data)",
            "search": "",
            "searchPlaceholder": "Cari...",
            "paginate": {
                "first":      "First",
                "last":       "Last",
                "next":       "Next",
                "previous":   "Previous"
            }
        }
    });
    var detailpembangunan = $('#tabelDetailPembangunan').DataTable({
    	"lengthChange": false,
    	"columnDefs": [
	    	{ "width": "10%", "targets": [0] },
            {"className": "text-center align-middle", "targets": '_all'},
          ],
    	"language": {
            "lengthMenu": "_MENU_ Data / Page",
            "zeroRecords": "Maaf Tidak Ada Data Yang Ditemukan",
            "info": "Total _TOTAL_ Data",
            "infoEmpty": "",
            "infoFiltered": "(Memfilter Dari _MAX_ Data)",
            "search": "",
            "searchPlaceholder": "Filter here...",
            "paginate": {
                "first":      "First",
                "last":       "Last",
                "next":       "Next",
                "previous":   "Previous"
            }
        }
    });
    var tblviewpengajuan = $('#tabelViewPengajuan').DataTable({
    	"pageLength": 4,
        "lengthChange": false,
    	"columnDefs": [
	    	{ "width": "13%", "targets": [0,1] },
	    	{ "width": "12%", "targets": [2,5,6] },
	    	{ "width": "5%", "targets": [4,7] },
	    	{"orderable": false, "targets": '_all' },
            {"className": "align-middle", "targets": [0,2,5]},
            {"className": "text-center align-middle", "targets": [1,4,6,7]},
          ],
    });
//fungsi untuk validasi form
	$('#frmTambahPerUnit')
		.bootstrapValidator({
	        feedbackIcons: {
	        	required: 'glyphicon glyphicon-asterisk',
	            valid: 'glyphicon glyphicon-ok',
	            invalid: 'glyphicon glyphicon-remove',
	            validating: 'glyphicon glyphicon-refresh'
	        },
	        excluded: [':disabled'],
	        fields: {
	        	PilihBlokperunit: {
	                validators: {
	                    notEmpty: {
	                        message: 'Tidak Boleh Kosong !!! Wajib Di isi'
	                    },
	                }
	            },
	            pilihNomorperunit: {
	                validators: {
	                    notEmpty: {
	                        message: 'Tidak Boleh Kosong !!! Wajib Di isi'
	                    },
	                }
	            }
	        }
	    })
	    .on('success.field.bv', function(e, data) {
            var $parent = data.element.parents('.form-group');
            // menyembunyikan icon sukses
            $parent.find('.form-control-feedback[data-bv-icon-for="' + data.field + '"]').hide();
        }); 
//untuk menghapus secara otomatis jika ada karakter selain nomor keculi titik
	$('#frmTambahPerUnit').each(function(){
		var html=0;
		var total=0;
		$(this).find('input').each(function(){
			$(this).keyup(function(){
				if ($(this).val().substr(0,1) == ".") {$(this).val('0.')};
			  	$(this).val(function(index, value) {
					return value
					.replace(/[a-zA-z\!@#$%^&*()_+=;:'",~`/\><]/g, "")
				});
				$('#body_persiapan').each(function(){
					html=0;
					$(this).find('input').each(function(){
						var sum = $(this).val()/4;
		    			if (sum != 0 ) {
		    				html += parseFloat(sum);
		    			}
					});
					$('.jml_persiapan').html(html.toFixed(2));
					$('input[name="jml1"]').val(html);
				});
				$('#body_Pondasi').each(function(){
					html=0;
					$(this).find('input').each(function(){
						var sum = $(this).val()/7;
		    			if (sum != 0 ) {
		    				html += parseFloat(sum);
		    			}
					});
					$('.jml_pondasi').html(html.toFixed(2));
					$('input[name="jml2"]').val(html);
				});
				$('#body_sloof').each(function(){
					html=0;
					$(this).find('input').each(function(){
						var sum = $(this).val()/4;
		    			if (sum != 0 ) {
		    				html += parseFloat(sum);
		    			}
					});
					$('.jml_sloof').html(html.toFixed(2));
					$('input[name="jml3"]').val(html);
				});
				$('#body_balok').each(function(){
					html=0;
					$(this).find('input').each(function(){
						var sum = $(this).val()/4;
		    			if (sum != 0 ) {
		    				html += parseFloat(sum);
		    			}
					});
					$('.jml_balok').html(html.toFixed(2));
					$('input[name="jml4"]').val(html);
				});
				$('#body_kolom').each(function(){
					html=0;
					$(this).find('input').each(function(){
						var sum = $(this).val()/4;
		    			if (sum != 0 ) {
		    				html += parseFloat(sum);
		    			}
					});
					$('.jml_kolom').html(html.toFixed(2));
					$('input[name="jml5"]').val(html);
				});
				$('#body_batubata').each(function(){
					html=0;
					$(this).find('input').each(function(){
						var sum = $(this).val()/3;
		    			if (sum != 0 ) {
		    				html += parseFloat(sum);
		    			}
					});
					$('.jmlBata').html(html.toFixed(2));
					$('input[name="jml6"]').val(html);
				});
				$('#body_plesteraci').each(function(){
					html=0;
					$(this).find('input').each(function(){
						var sum = $(this).val()/5;
		    			if (sum != 0 ) {
		    				html += parseFloat(sum);
		    			}
					});
					$('.jmlAci').html(html.toFixed(2));
					$('input[name="jml7"]').val(html);
				});
				$('#body_atap').each(function(){
					html=0;
					$(this).find('input').each(function(){
						var sum = $(this).val()/3;
		    			if (sum != 0 ) {
		    				html += parseFloat(sum);
		    			}
					});
					$('.jmlAtap').html(html.toFixed(2));
					$('input[name="jml8"]').val(html);
				});
				$('#body_Plafon').each(function(){
					html=0;
					$(this).find('input').each(function(){
						var sum = $(this).val()/4;
		    			if (sum != 0 ) {
		    				html += parseFloat(sum);
		    			}
					});
					$('.jmlPlafon').html(html.toFixed(2));
					$('input[name="jml9"]').val(html);
				});
				$('#body_Keramik').each(function(){
					html=0;
					$(this).find('input').each(function(){
						var sum = $(this).val()/5;
		    			if (sum != 0 ) {
		    				html += parseFloat(sum);
		    			}
					});
					$('.jmlKeramik').html(html.toFixed(2));
					$('input[name="jml10"]').val(html);
				});
				$('#body_Plumbing').each(function(){
					html=0;
					$(this).find('input').each(function(){
						var sum = $(this).val()/2;
		    			if (sum != 0 ) {
		    				html += parseFloat(sum);
		    			}
					});
					$('.jmlPlumbing').html(html.toFixed(2));
					$('input[name="jml11"]').val(html);
				});
				$('#body_Listrik').each(function(){
					html=0;
					$(this).find('input').each(function(){
						var sum = $(this).val()/1;
		    			if (sum != 0 ) {
		    				html += parseFloat(sum);
		    			}
					});
					$('.jmlListrik').html(html.toFixed(2));
					$('input[name="jml12"]').val(html);
				});
				$('#body_Pengecetan').each(function(){
					html=0;
					$(this).find('input').each(function(){
						var sum = $(this).val()/1;
		    			if (sum != 0 ) {
		    				html += parseFloat(sum);
		    			}
					});
					$('.jmlCet').html(html.toFixed(2));
					$('input[name="jml13"]').val(html);
				});
				$('#body_pintuAdd').each(function(){
					html=0;
					$(this).find('input').each(function(){
						var sum = $(this).val()/2;
		    			if (sum != 0 ) {
		    				html += parseFloat(sum);
		    			}
					});
					$('.jmlpintu').html(html.toFixed(2));
					$('input[name="jml14"]').val(html);
				});
				total=0;
				namaJml.forEach((dt)=>{
					var progres = $('.'+dt).text();
					var bobot = $('#AllBobot_'+dt).text();
					var tot = (progres*bobot)/100;
					if (tot != 0) {
						total += parseFloat(tot);
					}
				});
				$('.totalProgres').html(total.toFixed(2));
				$('input[name="jmlall"]').val(total);
			});
		});
		nama.forEach((dt)=>{
			$('#input_'+dt).find('input').keyup(function(){
				var get = $('#progresSebelumnya_'+dt).text();
				var cek = parseFloat($(this).val())+parseFloat(get);
				if (cek > 100) {
					swal({
			         	title: "Opss !!!",
			         	text: "Progres Pekerjaan "+$('#nama_'+dt).text()+" Sudah Lebih Dari 100%",
			          	icon: "error",
			        });
				}
			})
		});
	});
//fungsi tambah
	$('.btntambahpengajuan').click(function(){
		viewpembangunan();
		resettemporary();
		viewBobot();
	});
	$('#namaProyek').change(function(){//tombol untuk memlilih nama proyek
		var id = $(this).val();
		var html='';
		if (id != '') {
			$.ajax({
				url:'getpembangunanProgres',
				type:'post',
				async: true,
	            dataType:'json',
				data:{id:id},
				success:function(data){
					html += '<option value="">Nama Pembangunan</option>';
					for(i=0; i < data.length; i++){
						html += '<option value="'+data[i].pembangunan_id+'" proyekId="'+data[i].proyek_id+'">'+data[i].nama+'</option>';
					}
					$('#namapembangunan').html(html);
					$('.fornamapembangunan').fadeIn(1000).removeClass('hide');
				}
			});
		}else{
			$('.fornamapembangunan').fadeOut(1000);
		}
	});
	$('#namapembangunan').change(function(){//tombol untuk memilih mama pembangunan
		resettemporary();
		viewBobot();
		var id = $(this).val();
		var idproyek = $('option:selected',this).attr('proyekId');
		var html ='';
		$('#tambahDataPengajuan').modal('hide');
		$('#tambahDataProgres').modal('show');
		$('#idproyek').val(idproyek);
		$.ajax({
			url:'getblokProgres',
			type:'post',
			async: true,
            dataType:'json',
			data:{id:id,idproyek:idproyek},
			success:function(data){
				html += '<option value="">--Pilih--</option>';
				for(i=0; i < data.length; i++){
					html += '<option value="'+data[i].blok+'" pembangunan_id="'+id+'">'+data[i].blok+'</option>';
				}
				$('#PilihBlokperunit').html(html);
				$('#jumlahBlok').val(data.length);
				$('#saveDataTemporary').attr('IDpembangunan',id);
			}
		});
	});
	$('#backpembangunan').click(function(){//tombol kembali ke form pengajuan
		$('#tambahDataPengajuan').modal('show');
		$('#namaProyek').val('');
		$('.fornamapembangunan').fadeOut(1000);
	});
	$('#btnPerUnit').click(function(){
		resetperUnit();
		scrollTopModal();
		$('#nomorPerunit').addClass('hide');
		$('#tambahDataProgres').modal('hide');
		$('#modalTambahPerunit').modal('show');
	});
	$('#PilihBlokperunit').change(function(){
		var blok = $('option:selected',this).val();
		var pembangunan_id = $('option:selected',this).attr('pembangunan_id');
		var html="";
		$.ajax({
			type     : 'post',
            url      : 'getnomorProgres',
            async    : true,
            dataType : 'json',
            data: {blok:blok},
            success:function(data){
            	html += '<option value="">--Pilih--</option>';
            	for(i=0; i < data.length; i++){
            		html += '<option value="'+data[i].blok_id+'">'+data[i].nomor+'</option>';
            	}
            	$('#pilihNomorperunit').html(html);
            	if (blok != "") {
            		$('#nomorPerunit').removeClass('hide');
            	}else{
            		$('#nomorPerunit').addClass('hide');
            	}
            	$('#pembangunan_id').val(pembangunan_id);
            }
		});
	});
	$('#pilihNomorperunit').change(function(){
		var id = $('option:selected',this).val();
		if (id != "") {
			$.ajax({
				type     : 'post',
	            url      : 'getnomorProgresPerID',
	            async    : true,
	            dataType : 'json',
	            data: {id:id},
	            success:function(data){
	            	if (data['bobotbefore'].length != 0) {
		            	nama.forEach((dt)=>{
		            		var Sebelumnya = data['bobotbefore'][0][dt];
		            		var bobot = (data['bobot'][0][dt]*Sebelumnya)/100;
		            		$('#AllBobot_'+dt).html(data['bobot'][0][dt]);
		            		$('#Bobot_'+dt).html(bobot.toFixed(2));
		            		$('#progresSebelumnya_'+dt).html(parseFloat(Sebelumnya).toFixed(2));
		            	});
		            	namaJml.forEach((dt)=>{
		            		var Sebelumnya = data['bobotbefore'][0][dt];
		            		var bobot = (data['bobot'][0][dt]*Sebelumnya)/100;
		            		$('#AllBobot_'+dt).html(data['bobot'][0][dt]);
		            		$('#Bobot_'+dt).html(bobot.toFixed(2));
		            		$('#progresSebelumnya_'+dt).html(Sebelumnya);
		            	});
		            	var bobot = data['bobot'][0].totalBobot;
		            	var Sebelumnya = data['bobotbefore'][0].progres;
		            	var Progresbobot = (bobot*Sebelumnya)/100;
		            	$('#progresSebelumnya_totalProgres').html(parseFloat(Sebelumnya).toFixed(2));
						$('#Bobot_totalProgres').html(parseFloat(Progresbobot).toFixed(2));
						$('#AllBobot_totalProgres').html(bobot);
					}else{
						nama.forEach((dt)=>{
							$('#progresSebelumnya_'+dt).html(0);
		            		$('#Bobot_'+dt).html(0);
		            		$('#AllBobot_'+dt).html(data['bobot'][0][dt]);
		            	});
		            	namaJml.forEach((dt)=>{
		            		$('#progresSebelumnya_'+dt).html(0);
		            		$('#Bobot_'+dt).html(0);
		            		$('#AllBobot_'+dt).html(data['bobot'][0][dt]);
		            	});
		            	var bobot = data['bobot'][0].totalBobot;
						$('#AllBobot_totalProgres').html(bobot);
					}
	            }
			});
			if ($('.togglePerUnit_persiapan').prop('checked') == false) {
				$('.togglePerUnit_persiapan').bootstrapToggle('on');
			}
		}else{
			resetperUnit();
			scrollTopModal();
		}
	});
	$('.backprogres').click(function(){//tombol kembali ke form progres
		
		$('#tambahDataProgres').modal('show');
	});
	$('.btnResetPerUnit').click(function(){
		resetperUnit();
		scrollTopModal();
	});
	$('.btnSavePerUnit').click(function(){
		var blok = $('#PilihBlokperunit').val();
		var nomor = $('#pilihNomorperunit').val();
		var total = $('.totalProgres').text();
		$('#frmTambahPerUnit').each(function(){
			$(this).find('input').each(function(){
				if ($(this).val()=="") {
					$(this).val(0);
				}
			});
		});
		if (blok != "" && nomor != "" && total != 0) {
			$('#loading').modal('show');
			$.ajax({
				url:'savePerUnit',
				type:'post',
				data:$('#frmTambahPerUnit').serialize(),
				success: function(data){
					if (data == "gagal") {
						$('#loading').modal('hide');
						nama.forEach((dt)=>{
							var progres = $('#input_'+dt).find('input').val();
							var get = $('#progresSebelumnya_'+dt).text();
							var cek = parseFloat(progres)+parseFloat(get);
							if (cek > 100) {
								swal({
						         	title: "Opss !!!",
						         	text: "Progres Pekerjaan "+$('#nama_'+dt).text()+" Sudah Lebih Dari 100%",
						          	icon: "error",
						        });
							}
						});
					}else{
						$('#loading').modal('hide');
						$('#modalTambahPerunit').modal('hide');
						swal({
				         	title: "Good job !!!",
				         	text: "Berhasil Menambahkan 1 Data",
				          	icon: "success",
				        });
				        $('#tambahDataProgres').modal('show');
				        viewBobot();
					}
				}
			});
		}else if (blok == ""){
			swal({
	         	title: "Opss !!!",
	         	text: "Nama Blok Tidak Boleh Kosong..",
	          	icon: "error",
	        });
	        $('.modal-body').animate({scrollTop:0});
	        $('#frmTambahPerUnit').bootstrapValidator('revalidateField', 'PilihBlokperunit');
		}else if (nomor == ""){
			swal({
	         	title: "Opss !!!",
	         	text: "Nomor Unit Tidak Boleh Kosong..",
	          	icon: "error",
	        });
	        $('.modal-body').animate({scrollTop:0});
	        $('#frmTambahPerUnit').bootstrapValidator('revalidateField', 'pilihNomorperunit');
		}else if (total == 0){
			swal({
	         	title: "Opss !!!",
	         	text: "Tidak Ada Progres Pekerjaan yang terisi, silahkan cek kembali....",
	          	icon: "error",
	        });
	        $('.modal-body').animate({scrollTop:0});
		}
	});
    $('#resetDatatemporary').click(function(){
		var info = progres.page.info().recordsDisplay;
		if (info != 0) {
			$('#statusReset').val('tombol');
			resettemporary();
		}else{
			swal({
	         	title: "Opss !",
              	text: "Data Kosong.... Tidak ada data yang bisa hapus",
              	icon: "error"
	        });
		}
	});
	$('#tableProgres').on('click','.hapusProgresTemorary',function(){//untuk hapus
		var id = $(this).attr('id');
		$.ajax({
			url:'hapusProgresTemorary',
			type:'post',
			data:{id:id},
			success:function(data){
				if (data == "berhasil") {
					$('#loading').modal('hide');
					swal({
			         	title: "Good job!",
			         	text: "1 Data Berhasil Di Hapus !!!",
			          	icon: "success",
			        });
			        viewBobot();
				}else{
					$('#loading').modal('hide');
					swal({
			         	title: "Opss !",
		              	text: "Ada yang salah !!! Coba Beberapa saat lagi, jika masalah masih berlanjut silahkan hubungi admin ",
		              	icon: "error"
			        });
				}
			}
		});
	});
	$('#tableProgres').on('click','.lihatProgresTemorary',function(){//untuk lihat
		var id = $(this).attr('id');
		scrollTopModal();
		$.ajax({
			url:'getProgresTemoraryperID',
			type:'post',
			async: true,
            dataType:'json',
			data:{id:id},
			success:function(data){
				$('.judultemporaryprogres').html('Detail Blok '+data[0].blok+' Nomor '+data[0].nomor);
				$('.totalProgres').html(data[0].progres);
				namapembagian.forEach((dt)=>{
					$('#'+dt+'_view').removeClass('hide');
					$('#edit'+dt).addClass('hide');
				});
				nama.forEach((dt)=>{
					$('#'+dt).html(data[0][dt]+' %');
				});
				namaJml.forEach((dt)=>{
					$('#'+dt).html(data[0][dt]+' %');
				});
				$('#tambahDataProgres').modal('hide');
				$('#modaledittemporaryProgres').modal('show');
				
			}
		});
	});
	$('#saveDataTemporary').click(function(){
		var info = progres.page.info().recordsDisplay;
		var jumlahBlok = $('#jumlahBlok').val();
		var id = $(this).attr('IDpembangunan');
		if (info != 0) {
			$.ajax({
				url:'saveDataTemporary',
				type:'post',
				data:{jumlahBlok:jumlahBlok,id:id},
				success:function(data){
					if (data == 'sukses') {
						$('#tambahDataProgres').modal('hide');
						viewBobot();
						swal({
				         	title: "Good job !",
			              	text: "Data Berhasil Disimpan ke data pengajuan.",
			              	icon: "success"
				        });
				        viewpembangunan();
						$('#tambahDataPengajuan').modal('show');
						$('#loading').modal('hide');
					}else{
						$('#loading').modal('hide');
						if (data == 'gagal') {
							$('#loading').modal('hide');
							viewBobot();
							swal({
					         	title: "Opss !",
				              	text: "Sistem Sibuk silahkan coba beberapa saat lagi, Jika masalah masih berlanjut silahkan hubungi operator.",
				              	icon: "error"
					        });
						}
					}
				}

			});
		}else{
			swal({
	         	title: "Opss !",
              	text: "Data Kosong, Silahkan Klik +Progres",
              	icon: "error"
	        });
		}
	});
	$('#tablePengajuan').on('click','.hapusPengajuanTemorary',function(){//fungsi untuk hapus data
		var id = $(this).attr('id');
		var nama = $(this).attr('nama');
		swal({
			title: "Apakah Anda Yakin?",
			text: "Mau Menghapus Data Pengajuan Pembangunan "+nama,
			icon: "warning",
			buttons: ['Tidak',"Iya"],
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {
				$.ajax({
					url:'hapusPengajuanTemoraryPerID',
					type:'post',
					data:{id:id},
					success:function(data){
						if (data ==  'berhasil') {
							swal("Good Job!! Data Berhasil Di Hapus", {
								icon: "success",
							});
							viewpembangunan();
						}else{
							if (data == 'gagal') {
								swal({
						         	title: "Opss !",
					              	text: "Sistem Sibuk silahkan coba beberapa saat lagi, Jika masalah masih berlanjut silahkan hubungi operator.",
					              	icon: "error"
						        });
							}
						}
					}
				});
			}
		});
	});
	$('#tablePengajuan').on('click','.lihatPengajuanTemorary',function(){//fungsi untuk Lihat data
		var id = $(this).attr('id');
		$.ajax({
			url:'temporaryPembangunanPerID',
			type:'post',
			data:{id:id},
			async: true,
            dataType:'json',
			success:function(data){
				if (data.length != 0) {
					detailpembangunan.clear().draw();
					for (var i = 0; i < data.length; i++){
						$('#judulnamaproyek').html(data[i].namaProyek);
						$('#judulnamaPembangunan').html(data[i].nama);
						$('#jumlahUnit').html(data[i].jumlah+' Unit');
						var A=100/data[i].jumlah;
						var B= A*data[i].jmlprogres/100;
						var C= A*data[i].jmlprogresAll/100;
						$('#progrestotal').html(parseFloat(data[i].jmlprogresAll).toFixed(2)+' %');
						$('#bobotProgres').html(parseFloat(C).toFixed(2)+' %');
						detailpembangunan.rows.add([
								[
									i+1,
									data[i].blok,
									data[i].nomor,
									parseFloat(data[i].jmlprogres).toFixed(2)+' %',
									parseFloat(B).toFixed(2)+' %'
								]
							])
						.draw();
					}

				}
			}
		});
		$('#modaldetailpengajuan').modal('show');
	});
	$('#saveTemporarypengajuan').click(function(){
		var info = pengajuan.page.info().recordsDisplay;
		if (info != 0) {
			$.ajax({
				url:'saveTemporarypengajuan',
				type:'ajax',
				success:function(data){
					if (data == 'sukses') {
						$('#tambahDataPengajuan').modal('hide');
						swal("Data Berhasil Di Ajukan, Silahkan tunggu.. Data Sedang Di tinjau oleh Tim Terkait.", {
							icon: "success",
						});
						viewPengajuan();
					}else{
						if (data == 'gagal') {
							swal({
					         	title: "Opss !",
				              	text: "Sistem Sibuk silahkan coba beberapa saat lagi, Jika masalah masih berlanjut silahkan hubungi operator.",
				              	icon: "error"
					        });
						}
					}
				}
			});
		}else{
			swal({
              	text: "Data Kosong, Silahkan Pilih Nama proyek dan isikan progres nya",
              	icon: "error"
	        });
		}
	});

viewPengajuan();
//fungsi para function = function get or reset
	function resetperUnit() {
		$('#frmTambahPerUnit').bootstrapValidator('resetForm',true);
		$('#frmTambahPerUnit').trigger("reset");
		namaJml.forEach((dt)=>{
			$('.'+dt).html(0);
			$('#nomorPerunit').addClass('hide');
			$('.totalProgres').html(0);
		});
		nama.forEach((dt)=>{
    		$('#AllBobot_'+dt).html(0);
    		$('#Bobot_'+dt).html(0);
    		$('#progresSebelumnya_'+dt).html(0);
    	});
    	namaJml.forEach((dt)=>{
    		$('#AllBobot_'+dt).html(0);
    		$('#Bobot_'+dt).html(0);
    		$('#progresSebelumnya_'+dt).html(0);
    	});
    	$('#progresSebelumnya_totalProgres').html(0);
		$('#Bobot_totalProgres').html(0);
		$('#AllBobot_totalProgres').html(0);
	}
	function resettemporary() {
		$.ajax({
			type     : 'ajax',
            url      : 'cancelpengajuan',
            success  : function(data){
            	if ($('#statusReset').val()=='tombol') {
					if (data == "berhasil") {
						$('#loading').modal('hide');
						swal({
				         	title: "Good job!",
				         	text: "Data Berhasil Di Reset !!!",
				          	icon: "success",
				        });
				        viewBobot();
				        $('#statusReset').val('');
					}else{
						$('#loading').modal('hide');
						swal({
				         	title: "Opss !",
			              	text: "Ada yang salah !!! Coba Beberapa saat lagi, jika masalah masih berlanjut silahkan hubungi admin ",
			              	icon: "error"
				        });
					}
				}
            }
		});
	}
	function viewBobot() {
		var jumlahBlok = $('#jumlahBlok').val();
		progres.clear().draw();
		$.ajax({
			url:'temporaryProgres',
			type:'ajax',
			async: true,
            dataType:'json',
			success:function(data){
				if (data.length > 0) {
					for (var i = 0; i < data.length; i++){
						var A = data[i].jumlah;
						var B = 100/A;
						var C = B*data[i].jmlProgres/100;
						progres.rows.add([
								[
									i+1,
									data[i].blok,
									data[i].nomor,
									data[i].jmlProgres+' %',
									parseFloat(C).toFixed(4)+' %',
									'<a class="btn btn-xs btn-info text-white lihatProgresTemorary" id="'+data[i].progres_id+'"><i class="fa fa-eye fa-xs"></i></a>'+
	            					'<a class="btn btn-xs btn-danger text-white hapusProgresTemorary" style="margin-left:3px;" id="'+data[i].progres_id+'">'+
	            						'<i class="fa fa-trash fa-xs"></i>'+
	            					'</a>'
										
								]
							])
						.draw();
					}
				}
			}
		});
	}
	function viewpembangunan() {
		$('#namaProyek').val('');
		$('#namapembangunan').val('');
		$('.fornamapembangunan ').hide();
		$.ajax({
			url:'viewpembangunan',
			type:'ajax',
			async: true,
            dataType:'json',
			success:function(data){
				pengajuan.clear().draw();
				if (data.length > 0) {
					for (var i = 0; i < data.length; i++) {
						var A = 100/data[i].jmlpembangunan;
						var B = A*data[i].jmlProgres/100;
						pengajuan.rows.add([
							[
								data[i].namaProyek,
								data[i].nama,
								data[i].jumlah+' Unit',
								parseFloat(data[i].jmlProgres).toFixed(2)+' %',
								parseFloat(B).toFixed(2)+' %',
								'<a class="btn btn-xs btn-info text-white lihatPengajuanTemorary" id="'+data[i].pembangunan_id+'"> <i class="fa fa-eye fa-xs"></i>'+
								'</a>'+
	        					'<a class="btn btn-xs btn-danger text-white hapusPengajuanTemorary" style="margin-left:3px;" id="'+data[i].pembangunan_id+'" nama="'+data[i].nama+'">'+
	        						'<i class="fa fa-trash fa-xs"></i>'+
	        					'</a>'	
							]
						])
						.draw();
					}
				}
				
			}
		});
	}
	function viewPengajuan(){
		tblviewpengajuan.clear().draw();
		$.ajax({
			url:'viewPengajuan',
			type:'ajax',
			async: true,
            dataType:'json',
			success:function(data){
				if (data.length > 0) {
					var status = '';
					for (var i = 0; i < data.length; i++){
						if (data[i].statusPengajuan == 1) {
							status = '<div class="spinner-border text-success spinner-border-sm m-1" role="status"> <span class="sr-only">Loading...</span> </div> Ofiicer Project'
						}else if (data[i].statusPengajuan == 2) {
							status = '<div class="spinner-border text-success spinner-border-sm m-1" role="status"> <span class="sr-only">Loading...</span> </div> Engginering'
						}else if (data[i].statusPengajuan == 3) {
							status = '<div class="spinner-border text-success spinner-border-sm m-1" role="status"> <span class="sr-only">Loading...</span> </div> Kepala Devisi'
						}else if (data[i].statusPengajuan == 4) {
							status = '<div class="spinner-border text-success spinner-border-sm m-1" role="status"> <span class="sr-only">Loading...</span> </div> Pimpinan Proyek'
						}else if (data[i].statusPengajuan == 5) {
							status = '<div class="spinner-border text-success spinner-border-sm m-1" role="status"> <span class="sr-only">Loading...</span> </div> Direktur'
						}else if (data[i].statusPengajuan == 6) {
							status = '<div class="spinner-border text-success spinner-border-sm m-1" role="status"> <span class="sr-only">Loading...</span> </div> Bagian Finance'
						}else if (data[i].statusPengajuan == 7) {
							status = '<div class=" text-success" role="status"> <span class="fa fa-check"></span> Approve </div>'
						}else if (data[i].statusPengajuan == 8) {
							status = '<div class=" text-danger" role="status"> <span class="fa fa-times"></span> Ofiicer Project </div>'
						}else if (data[i].statusPengajuan == 9) {
							status = '<div class=" text-danger" role="status"> <span class="fa fa-times"></span> Engginering </div>'
						}else if (data[i].statusPengajuan == 10) {
							status = '<div class=" text-danger" role="status"> <span class="fa fa-times"></span> Kepala Devisi </div>'
						}else if (data[i].statusPengajuan == 11) {
							status = '<div class=" text-danger" role="status"> <span class="fa fa-times"></span> Pimpinan Proyek </div>'
						}else if (data[i].statusPengajuan == 12) {
							status = '<div class=" text-danger" role="status"> <span class="fa fa-times"></span> Direktur </div>'
						}else{
							status = '<div class=" text-danger" role="status"> <span class="fa fa-times"></span> Reject </div>'
						}
						var A = 100/data[i].jumlah;
						var B = A * data[i].jmlProgres/100;
						var C = B * data[i].total/100;
						tblviewpengajuan.rows.add([
							[
								'<label>'+data[i].namaProyek+'</label>',
								'<label>'+data[i].nomorSPK+'</label>',
								'<label>Rp. '+formatNumber(data[i].total)+' ,-</label>',
								data[i].lokasi_proyek,
								'<label> '+parseFloat(B).toFixed(4)+' %</label>',
								'<label>Rp. '+formatNumber(C)+' ,-</label>',
								'<label>'+status+'</label>',
								'<form action="lihatpengajuan" method="post" target="_blank">'+
									'<input type="hidden" value="'+data[i].pengajuan_id+'" name="id">'+
									'<button type="submit" class="btn btn-outline-info btn-rounded btn-icon btn-sm lihat mr-1">'+
	                                    '<i class="ti-eye"></i>'+
	                                '</button>'+	
								'</form>'
							]
						])
						.draw();
					}
				}
			}
		});
	}

//untuk export pdf
	$('#ExportPengajaun').click(function(){
		var info = tblviewpengajuan.page.info().recordsDisplay;
		if (info != 0) {
			window.open('ExportPengajaun', '_blank');			
		}else{
			swal({
	         	title: "Opss ! Data Kosong !!!!",
              	icon: "error"
	        });
		}
	});

});
</script>


