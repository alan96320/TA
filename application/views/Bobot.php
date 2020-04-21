<style>
  .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
  .toggle.ios .toggle-handle { border-radius: 20px; }
  .glyphicon-asterisk:before{color: red; font-size: 12px}
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
                        <h4 class="font-weight-bold mb-0">DATA PEKERJAAN</h4>
                    </div>
                    <div>
                        <button type="button" class="btn btn-primary btn-icon-text btn-rounded tbhbobot" data-toggle="modal" data-target="#tambah" data-backdrop="static">
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
                        <button type="button" id="exporPekerjaan" class="btn btn-outline-primary btn-icon-text btn-sm" style="margin-bottom: -30px;">
                            <i class="ti-export  btn-icon-prepend"></i> <span class="menu-title">Export PDF</span>
                        </button>
                        <div class="table-responsive">
                            <table id="example" class="table table-hover table-sm" style="width:100%" >
                                <thead style="font-size: 12px" class="table-primary">
                                    <th class="text-center align-middle" height="40px">No</th>
						            <th class="text-center align-middle">Nama Pekerjaan</th>
						            <th class="text-center align-middle">Harga </th>
						            <th class="text-center align-middle">Bobot</th>
						            <th width="100px" class="text-center align-middle">Action</th>
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

<!-- Modal tambah -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document" style="width: 100%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLongTitle" style="font-family: times new roman">Tambah Data Pekerjaan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
      		<div class="modal-body" id="topTambah">
	        	<form id="frmbobot" class="form-sample" style="font-family: times new roman">
	            	<!--Nama Pekerjaan-->
	            	<div class="form-group row" style="margin-right: 0">
	                    <label class="col-md-4 col-sm-4 col-form-label form-control-sm" >Pekerjaan <small style="color:red">*</small></label>
	                    <div class="col-md-8 col-sm-8 inputGroupContainer">
	                        <select class="custom-select form-control form-control-sm" name="namaPekerjaan">
				                <option value="">--Pilih--</option>
	                    		<option value="Ruko Type 72">Ruko Type 72</option>
	                    		<option value="Rumah Type 30">Rumah Type 30</option>
	                    		<option value="Rumah Type 32">Rumah Type 32</option>
	                    		<option value="Rumah Type 36">Rumah Type 36</option>
	                    		<option value="Rumah Type 42">Rumah Type 42</option>
	                    		<option value="Rumah Type 52">Rumah Type 52</option>
				              </select>
	                    </div>
	                </div>
	                <div class="form-group row" style="margin-right: 0">
	                    <label class="col-md-4 col-sm-4 col-form-label form-control-sm" >Harga <small style="color:red">*</small></label>
	                    <div class="col-md-8 col-sm-8 inputGroupContainer">
	                        <input type="text" name="harga" class="form-control form-control-sm" placeholder="Rp. 0 ,-">
	                    </div>
	                </div>
	            	<!-- Untuk Persiapan -->
	            	<div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingOne" style="height: 30px">
	                        <label style="margin-top: 4px; margin-left: 10px; font-family: times new roman"><b>1. Persiapan</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" id="toggle_persiapan" checked>
	                        </div>
	                    </div>
	                    <div id="persiapan">
	                        <div class="card-body">
	                            <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Mobilisasi Alat <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="mobilisasi" >
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Gudang Kemp. Pekerja <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="gudang">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Air Pekerja <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="air">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Keamanan <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="keamanan">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-11 col-sm-11 col-form-label form-control-sm" >Jumlah <label class="jumlah1"></label> %</label>
				                </div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk Pondasi -->
	            	<div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingTwo" style="height: 30px">
	                        <label style="margin-top: 4px; margin-left: 10px; font-family: times new roman"><b>2. Pondasi</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" id="toggle_Pondasi">
	                        </div>
	                    </div>
	                    <div id="Pondasi" style="display: none;">
	                        <div class="card-body">
	                            <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Bouwplank <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="Bouwplank" >
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Galian Tanah <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="Galian">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Urugan Tanah <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="Urugan">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pembesian Pondasi <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="Pembesian_pondasi">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Begesting Pondasi <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="Begesting_pondasi">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pengecoran Pondasi <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="Pengecoran_pondasi">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pembongkaran Pondasi <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="Pembongkaran_pondasi">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-11 col-sm-11 col-form-label form-control-sm" >Jumlah <label class="jumlah2"></label> %</label>
				                </div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk Sloof -->
	            	<div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingThree" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>3. Sloof</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" id="toggle_sloof">
	                        </div>
	                    </div>
	                    <div id="sloof" style="display: none;">
	                        <div class="card-body">
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pembesian sloof <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="Pembesian_sloof">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Begesting sloof <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="Begesting_sloof">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pengecoran sloof <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="Pengecoran_sloof">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pembongkaran sloof <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="Pembongkaran_sloof">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-11 col-sm-11 col-form-label form-control-sm" >Jumlah <label class="jumlah3"></label> %</label>
				                </div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk Balok -->
	            	<div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFour" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>4. Balok</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" id="toggle_balok">
	                        </div>
	                    </div>
	                    <div id="balok" style="display: none;">
	                        <div class="card-body">
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pembesian balok <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="Pembesian_balok">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Begesting balok <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="Begesting_balok">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pengecoran balok <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="Pengecoran_balok">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pembongkaran balok <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="Pembongkaran_balok">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-11 col-sm-11 col-form-label form-control-sm" >Jumlah <label class="jumlah4"></label> %</label>
				                </div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk Kolom -->
	            	<div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFive" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>5. Kolom</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" id="toggle_kolom">
	                        </div>
	                    </div>
	                    <div id="kolom" style="display: none;">
	                        <div class="card-body">
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pembesian kolom <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="Pembesian_kolom">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Begesting kolom <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="Begesting_kolom">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pengecoran kolom <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="Pengecoran_kolom">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pembongkaran kolom <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="Pembongkaran_kolom">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-11 col-sm-11 col-form-label form-control-sm" >Jumlah <label class="jumlah5"></label> %</label>
				                </div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk Batu Bata -->
	                <div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFive" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>6. Batu Bata</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" id="toggle_batubata">
	                        </div>
	                    </div>
	                    <div id="batubata" style="display: none;">
	                        <div class="card-body">
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pemasangan Batu Bata Dinding <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="BatuBata_dinding">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pemasangan Batu Bata Sekat <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="BatuBata_sekat">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pemasangan Batu Bata Kamar Mandi <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="BatuBata_kMandi">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-11 col-sm-11 col-form-label form-control-sm" >Jumlah <label class="jumlah6"></label> %</label>
				                </div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk pleseter aci -->
	                <div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFive" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>7. Plester Aci</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" id="toggle_plesteraci">
	                        </div>
	                    </div>
	                    <div id="plesteraci" style="display: none;">
	                        <div class="card-body">
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Plester Aci Dinding <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="PlesterAci_dinding">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Plester Aci Sekat <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="PlesterAci_sekat">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Plester Aci Kamar Mandi <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="PlesterAci_kMandi">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Plester Lantai <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="PlesterAci_lantai">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Plester Aci Teras <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="PlesterAci_teras">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-11 col-sm-11 col-form-label form-control-sm" >Jumlah <label class="jumlah7"></label> %</label>
				                </div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk atap -->
	                <div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFive" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>8. Atap</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" id="toggle_atap">
	                        </div>
	                    </div>
	                    <div id="atap" style="display: none;">
	                        <div class="card-body">
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pemasangan Rangka Atap <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="Rangka_atap">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pemasangan Penutup Atap <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="Penutup_atap">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pemasangan Lisplank Atap <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="Lisplank">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-11 col-sm-11 col-form-label form-control-sm" >Jumlah <label class="jumlah8"></label> %</label>
				                </div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk Plafon -->
	                <div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFive" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>9. Plafon</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" id="toggle_Plafon">
	                        </div>
	                    </div>
	                    <div id="Plafon" style="display: none;">
	                        <div class="card-body">
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pemasangan Rangka Plafon Luar Dalam <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="Rangka_plafon">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pemasangan Penutup Papan Plafon Luar Dalam <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="Penutup_plafon">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pek. Dempul Plafon Luar Dalam <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="Dempul">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pek. Pengecetan Plafon Luar Dalam <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="cet_plafon">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-11 col-sm-11 col-form-label form-control-sm" >Jumlah <label class="jumlah9"></label> %</label>
				                </div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk Keramik -->
	                <div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFive" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>10. Keramik</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" id="toggle_Keramik">
	                        </div>
	                    </div>
	                    <div id="Keramik" style="display: none;">
	                        <div class="card-body">
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pemasangan Keramik Kamar Mandi <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="Keramik_kMandi">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pemasangan Keramik Lantai <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="Keramik_lantai">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pemasangan Keramik Dinding <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="Keramik_dinding">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pemasangan Keramik Closet <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="Keramik_closet">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pemasanganh Keramik Teras <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="Keramik_teras">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-11 col-sm-11 col-form-label form-control-sm" >Jumlah <label class="jumlah10"></label> %</label>
				                </div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk Plumbing -->
	                <div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFive" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>11. Plumbing</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" id="toggle_Plumbing">
	                        </div>
	                    </div>
	                    <div id="Plumbing" style="display: none;">
	                        <div class="card-body">
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pemasangan Pipa Air Besir dan Air Kotor <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="pipa_air">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pekerjaan Septik Tank Dan Penutupnya <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="Septik_tank">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-11 col-sm-11 col-form-label form-control-sm" >Jumlah <label class="jumlah11"></label> %</label>
				                </div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk Listrik -->
	                <div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFive" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>12. Listrik</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" id="toggle_Listrik">
	                        </div>
	                    </div>
	                    <div id="Listrik" style="display: none;">
	                        <div class="card-body">
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Listrik <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="instal_listrik">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-11 col-sm-11 col-form-label form-control-sm" >Jumlah <label class="jumlah12"></label> %</label>
				                </div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk Pengecetan -->
	                <div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFive" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>13. Pengecetan</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" id="toggle_Pengecetan">
	                        </div>
	                    </div>
	                    <div id="Pengecetan" style="display: none;">
	                        <div class="card-body">
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pengecetan <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="pek_pengecetan">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-11 col-sm-11 col-form-label form-control-sm" >Jumlah <label class="jumlah13"></label> %</label>
				                </div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk pintu -->
	                <div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFive" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>14. Pintu Dan Jendela</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" id="toggle_pintuAdd">
	                        </div>
	                    </div>
	                    <div id="pintuAdd" style="display: none;">
	                        <div class="card-body">
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pemasangan Pintu <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="pem_Pintu">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pemasangan Jendela <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control form-control-sm text-center" placeholder="0" name="pem_Jendela">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-11 col-sm-11 col-form-label form-control-sm" >Jumlah <label class="jumlah14">0</label> %</label>
				                </div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Info Total Bobot -->
	                <div class="card" style="height: 35px">
                		<label style="font-size: 16px; margin-top: 5px; margin-left: 10px">Total Bobot Pekerjaan <label class="total">0</label> %</label>
	                </div>
	                <input type="hidden" name="jumlah1"><input type="hidden" name="jumlah2"><input type="hidden" name="jumlah3">
	                <input type="hidden" name="jumlah4"><input type="hidden" name="jumlah5"><input type="hidden" name="jumlah6">
	                <input type="hidden" name="jumlah7"><input type="hidden" name="jumlah8"><input type="hidden" name="jumlah9">
	                <input type="hidden" name="jumlah10"><input type="hidden" name="jumlah11"><input type="hidden" name="jumlah12">
	                <input type="hidden" name="jumlah13"><input type="hidden" name="jumlah14">
	                
		            <!--Tombol Simpan Dan reset-->

		            <div style="margin-top: 20px; font-family: times new roman" class="float-right">

		                <button type="reset" class="btn btn-primary btn-sm resetAdd"><i class="fa fa-redo fa-fw"></i> Reset</button>
		                <button class="btn btn-primary btn-sm text-white save"><i class="fa fa-save fa-fw"></i> Save</button>
		            </div>
		        </form>
	        </div>
          <br>    
    </div>
  </div>
</div>
<!-- Modal View -->
<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document" style="width: 90%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title judulView" id="exampleModalLongTitle" style="font-family: times new roman"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
      		<div class="modal-body form-sample" style="font-family: times new roman">
			<p style="font-size: 16px; font-family:times new roman;" class="hargaView"></p>
            	<!-- Untuk Persiapan -->
            	<div class="card" style="margin-bottom: 1px;">
                    <div class="header" id="headingOne" style="height: 30px">
                        <label style="margin-top: 4px; margin-left: 10px; font-family: times new roman"><b>1. Persiapan</b></label>
                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
                        	<input type="checkbox" id="toggle_persiapan_view" checked>
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
                        	<input type="checkbox" id="toggle_Pondasi_view">
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
                        	<input type="checkbox" id="toggle_sloof_view">
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
                        	<input type="checkbox" id="toggle_balok_view">
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
                        	<input type="checkbox" id="toggle_kolom_view">
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
                        	<input type="checkbox" id="toggle_batubata_view">
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
                        	<input type="checkbox" id="toggle_plesteraci_view">
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
                        	<input type="checkbox" id="toggle_atap_view">
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
                        	<input type="checkbox" id="toggle_Plafon_view">
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
                        	<input type="checkbox" id="toggle_Keramik_view">
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
                        	<input type="checkbox" id="toggle_Plumbing_view">
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
                        	<input type="checkbox" id="toggle_Listrik_view">
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
                        	<input type="checkbox" id="toggle_Pengecetan_view">
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
                        	<input type="checkbox" id="toggle_pintuAdd_view">
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
            		<label style="font-size: 16px; margin-top: 5px; margin-left: 10px">Total Bobot Pekerjaan <label id="totalBobot">0 %</label></label>
                </div>
	        </div>
          <br>    
    </div>
  </div>
</div>
<!-- Modal edit -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog  modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title namaedit" id="exampleModalLongTitle" style="font-family: times new roman"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
      		<div class="modal-body">
	        	<form id="frmbobotedit" class="form-sample" style="font-family: times new roman">
	            	<!--Nama Pekerjaan-->
	            	<div class="form-group row" style="margin-right: 0">
	                    <label class="col-md-4 col-sm-4 col-form-label form-control-sm" >Pekerjaan <small style="color:red">*</small></label>
	                    <div class="col-md-8 col-sm-8 inputGroupContainer">
	                        <select class="custom-select form-control form-control-sm" name="editnamaPekerjaan" id="editnamaPekerjaan">
				                <option value="">--Pilih--</option>
	                    		<option value="Ruko Type 72">Ruko Type 72</option>
	                    		<option value="Rumah Type 30">Rumah Type 30</option>
	                    		<option value="Rumah Type 32">Rumah Type 32</option>
	                    		<option value="Rumah Type 36">Rumah Type 36</option>
	                    		<option value="Rumah Type 42">Rumah Type 42</option>
	                    		<option value="Rumah Type 52">Rumah Type 52</option>
				              </select>
	                    </div>
	                </div>
	                <div class="form-group row" style="margin-right: 0">
	                    <label class="col-md-4 col-sm-4 col-form-label form-control-sm" >Harga <small style="color:red">*</small></label>
	                    <div class="col-md-8 col-sm-8 inputGroupContainer">
	                        <input type="text" name="editharga" class="form-control form-control-sm" placeholder="Rp. 0 ,-">
	                    </div>
	                </div>
	            	<!-- Untuk Persiapan -->
	            	<div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingOne" style="height: 30px">
	                        <label style="margin-top: 4px; margin-left: 10px; font-family: times new roman"><b>1. Persiapan</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" id="edittoggle_persiapan" checked>
	                        </div>
	                    </div>
	                    <div id="editpersiapan">
	                        <div class="card-body">
	                            <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Mobilisasi Alat <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center mobAlat" placeholder="0" name="editmobilisasi">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Gudang Kemp. Pekerja <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center kemPekerja" placeholder="0" name="editgudang">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Air Pekerja <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center airPekerja" placeholder="0" name="editair">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Keamanan <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center keamanan" placeholder="0" name="editkeamanan">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-11 col-sm-11 col-form-label form-control-sm" >Jumlah <label class=" jml_persiapan"></label> %</label>
				                </div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk Pondasi -->
	            	<div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingTwo" style="height: 30px">
	                        <label style="margin-top: 4px; margin-left: 10px; font-family: times new roman"><b>2. Pondasi</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" id="edittoggle_Pondasi">
	                        </div>
	                    </div>
	                    <div id="editPondasi" style="display: none;">
	                        <div class="card-body">
	                            <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Bouwplank <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center bouwplank" placeholder="0" name="editBouwplank" >
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Galian Tanah <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center galianTanah" placeholder="0" name="editGalian">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Urugan Tanah <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center UrugTanah" placeholder="0" name="editUrugan">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pembesian Pondasi <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center Pembesian_pondasi" placeholder="0" name="editPembesian_pondasi">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Begesting Pondasi <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center begesting_pondasi" placeholder="0" name="editBegesting_pondasi">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pengecoran Pondasi <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center pengecoran_pondasi" placeholder="0" name="editPengecoran_pondasi">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pembongkaran Pondasi <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center pembongkaran_pondasi" placeholder="0" name="editPembongkaran_pondasi">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-11 col-sm-11 col-form-label form-control-sm" >Jumlah <label class=" jml_pondasi"></label> %</label>
				                </div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk Sloof -->
	            	<div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingThree" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>3. Sloof</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" id="edittoggle_sloof">
	                        </div>
	                    </div>
	                    <div id="editsloof" style="display: none;">
	                        <div class="card-body">
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pembesian sloof <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center Pembesian_sloof" placeholder="0" name="editPembesian_sloof">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Begesting sloof <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center begesting_sloof" placeholder="0" name="editBegesting_sloof">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pengecoran sloof <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center pengecoran_sloof" placeholder="0" name="editPengecoran_sloof">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pembongkaran sloof <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center pembongkaran_sloof" placeholder="0" name="editPembongkaran_sloof">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-11 col-sm-11 col-form-label form-control-sm" >Jumlah <label class=" jml_sloof"></label> %</label>
				                </div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk Balok -->
	            	<div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFour" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>4. Balok</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" id="edittoggle_balok">
	                        </div>
	                    </div>
	                    <div id="editbalok" style="display: none;">
	                        <div class="card-body">
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pembesian balok <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center Pembesian_balok" placeholder="0" name="editPembesian_balok">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Begesting balok <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center begesting_balok" placeholder="0" name="editBegesting_balok">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pengecoran balok <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center pengecoran_balok" placeholder="0" name="editPengecoran_balok">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pembongkaran balok <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center pembongkaran_balok" placeholder="0" name="editPembongkaran_balok">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-11 col-sm-11 col-form-label form-control-sm" >Jumlah <label class=" jml_balok"></label> %</label>
				                </div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk Kolom -->
	            	<div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFive" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>5. Kolom</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" id="edittoggle_kolom">
	                        </div>
	                    </div>
	                    <div id="editkolom" style="display: none;">
	                        <div class="card-body">
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pembesian kolom <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center Pembesian_kolom" placeholder="0" name="editPembesian_kolom">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Begesting kolom <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center begesting_kolom" placeholder="0" name="editBegesting_kolom">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pengecoran kolom <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center pengecoran_kolom" placeholder="0" name="editPengecoran_kolom">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pembongkaran kolom <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center pembongkaran_kolom" placeholder="0" name="editPembongkaran_kolom">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-11 col-sm-11 col-form-label form-control-sm" >Jumlah <label class=" jml_kolom"></label> %</label>
				                </div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk Batu Bata -->
	                <div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFive" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>6. Batu Bata</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" id="edittoggle_batubata">
	                        </div>
	                    </div>
	                    <div id="editbatubata" style="display: none;">
	                        <div class="card-body">
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pemasangan Batu Bata Dinding <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center bataDinding" placeholder="0" name="editBatuBata_dinding">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pemasangan Batu Bata Sekat <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center bataSekat" placeholder="0" name="editBatuBata_sekat">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pemasangan Batu Bata Kamar Mandi <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center bataKamarMandi" placeholder="0" name="editBatuBata_kMandi">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-11 col-sm-11 col-form-label form-control-sm" >Jumlah <label class=" jmlBata"></label> %</label>
				                </div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk pleseter aci -->
	                <div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFive" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>7. Plester Aci</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" id="edittoggle_plesteraci">
	                        </div>
	                    </div>
	                    <div id="editplesteraci" style="display: none;">
	                        <div class="card-body">
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Plester Aci Dinding <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center aciDinding" placeholder="0" name="editPlesterAci_dinding">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Plester Aci Sekat <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center aciSekat" placeholder="0" name="editPlesterAci_sekat">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Plester Aci Kamar Mandi <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center aciKamarMandi" placeholder="0" name="editPlesterAci_kMandi">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Plester Lantai <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center aciLantai" placeholder="0" name="editPlesterAci_lantai">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Plester Aci Teras <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center aciTeras" placeholder="0" name="editPlesterAci_teras">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-11 col-sm-11 col-form-label form-control-sm" >Jumlah <label class=" jmlAci"></label> %</label>
				                </div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk atap -->
	                <div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFive" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>8. Atap</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" id="edittoggle_atap">
	                        </div>
	                    </div>
	                    <div id="editatap" style="display: none;">
	                        <div class="card-body">
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pemasangan Rangka Atap <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center rangkaAtap" placeholder="0" name="editRangka_atap">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pemasangan Penutup Atap <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center penutupAtap" placeholder="0" name="editPenutup_atap">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pemasangan Lisplank Atap <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center lisplankAtap" placeholder="0" name="editLisplank">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-11 col-sm-11 col-form-label form-control-sm" >Jumlah <label class=" jmlAtap"></label> %</label>
				                </div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk Plafon -->
	                <div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFive" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>9. Plafon</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" id="edittoggle_Plafon">
	                        </div>
	                    </div>
	                    <div id="editPlafon" style="display: none;">
	                        <div class="card-body">
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pemasangan Rangka Plafon Luar Dalam <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center rangkaPlafon" placeholder="0" name="editRangka_plafon">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pemasangan Penutup Papan Plafon Luar Dalam <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center penutupPalfon" placeholder="0" name="editPenutup_plafon">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pek. Dempul Plafon Luar Dalam <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center dempulPlafon" placeholder="0" name="editDempul">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pek. Pengecetan Plafon Luar Dalam <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center cetPlafon" placeholder="0" name="editcet_plafon">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-11 col-sm-11 col-form-label form-control-sm" >Jumlah <label class=" jmlPlafon"></label> %</label>
				                </div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk Keramik -->
	                <div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFive" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>10. Keramik</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" id="edittoggle_Keramik">
	                        </div>
	                    </div>
	                    <div id="editKeramik" style="display: none;">
	                        <div class="card-body">
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pemasangan Keramik Kamar Mandi <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center kerKamarMandi" placeholder="0" name="editKeramik_kMandi">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pemasangan Keramik Lantai <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center KerLantai" placeholder="0" name="editKeramik_lantai">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pemasangan Keramik Dinding <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center kerDinding" placeholder="0" name="editKeramik_dinding">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pemasangan Keramik Closet <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center kerCloset" placeholder="0" name="editKeramik_closet">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pemasanganh Keramik Teras <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center kerTeras" placeholder="0" name="editKeramik_teras">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-11 col-sm-11 col-form-label form-control-sm" >Jumlah <label class=" jmlKeramik"></label> %</label>
				                </div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk Plumbing -->
	                <div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFive" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>11. Plumbing</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" id="edittoggle_Plumbing">
	                        </div>
	                    </div>
	                    <div id="editPlumbing" style="display: none;">
	                        <div class="card-body">
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pemasangan Pipa Air Besir dan Air Kotor <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center airBersih" placeholder="0" name="editpipa_air">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pekerjaan Septik Tank Dan Penutupnya <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center septiiktank" placeholder="0" name="editSeptik_tank">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-11 col-sm-11 col-form-label form-control-sm" >Jumlah <label class=" jmlPlumbing"></label> %</label>
				                </div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk Listrik -->
	                <div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFive" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>12. Listrik</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" id="edittoggle_Listrik">
	                        </div>
	                    </div>
	                    <div id="editListrik" style="display: none;">
	                        <div class="card-body">
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Listrik <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center instalasiListrik" placeholder="0" name="editinstal_listrik">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-11 col-sm-11 col-form-label form-control-sm" >Jumlah <label class=" jmlListrik"></label> %</label>
				                </div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk Pengecetan -->
	                <div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFive" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>13. Pengecetan</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" id="edittoggle_Pengecetan">
	                        </div>
	                    </div>
	                    <div id="editPengecetan" style="display: none;">
	                        <div class="card-body">
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pengecetan <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center cet" placeholder="0" name="editpek_pengecetan">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-11 col-sm-11 col-form-label form-control-sm" >Jumlah <label class=" jmlCet"></label> %</label>
				                </div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Untuk pintu -->
	                <div class="card" style="margin-bottom: 1px">
	                    <div class="header" id="headingFive" style="height: 30px">
	                        <label style="margin-top: 3px; margin-left: 10px; font-family: times new roman"><b>14. Pintu Dan Jendela</b></label>
	                        <div class="float-right" style="margin-top: 4px; margin-right: 5px">
	                        	<input type="checkbox" id="edittoggle_pintuAdd">
	                        </div>
	                    </div>
	                    <div id="editpintuAdd" style="display: none;">
	                        <div class="card-body">
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pemasangan Pintu <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center pintu" placeholder="0" name="editpem_Pintu">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-7 col-sm-7 col-form-label form-control-sm" >Pemasangan Jendela <small style="color:red">*</small></label>
				                    <div class="col-md-4 col-sm-4 inputGroupContainer">
				                        <input type="text" class="form-control text-center jendela" placeholder="0" name="editpem_Jendela">
				                    </div>
				                    <label class="col-md-1 control-label" >%</label>
				                </div>
				                <div class="form-group row" style="margin-right: 0">
				                    <label class="col-md-11 col-sm-11 col-form-label form-control-sm" >Jumlah <label class=" jmlpintu">0</label> %</label>
				                </div>
	                        </div>
	                    </div>
	                </div>
	                <!-- Info Total Bobot -->
	                <div class="card" style="height: 35px">
                		<label style="font-size: 16px; margin-top: 5px; margin-left: 10px">Total Bobot Pekerjaan <label class="totalBobot">0</label> %</label>
	                </div>
	                <input type="hidden" name="editjumlah1">
					<input type="hidden" name="editjumlah2">
					<input type="hidden" name="editjumlah3">
					<input type="hidden" name="editjumlah4">
					<input type="hidden" name="editjumlah5">
					<input type="hidden" name="editjumlah6">
					<input type="hidden" name="editjumlah7">
					<input type="hidden" name="editjumlah8">
					<input type="hidden" name="editjumlah9">
					<input type="hidden" name="editjumlah10">
					<input type="hidden" name="editjumlah11">
					<input type="hidden" name="editjumlah12">
					<input type="hidden" name="editjumlah13">
					<input type="hidden" name="editjumlah14">
					<input type="hidden" name="IDPembangunan">
		            <!--Tombol Simpan Dan reset-->
		            <div style="margin-top: 20px; font-family: times new roman" class="float-right">
		                <button type="reset" class="btn btn-primary btn-sm resetEdit"><i class="fa fa-redo fa-fw"></i> Reset</button>
		                <a class="btn btn-primary btn-sm text-white saveEdit"><i class="fa fa-save fa-fw"></i> Save</a>
		            </div>
		        </form>
	        </div>
          <br>    
    </div>
  </div>
</div>
<!-- modal loading -->
<div class="modal fade" id="loading" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="loading mx-auto">
			<span>Tunggu ya...</span>
		</div>
  	</div>
</div>

<script type="text/javascript">
$(document).ready(function() {
//set loading
	$('#welcome').fadeOut(2000);
	$('#exporPekerjaan').click(function(){
        window.open('exporPekerjaan', '_blank');
    });
	$('.bodyLoading').hide();
    $('#isiHalaman').show();
//fungsi untuk scroll top modal
	function scrollTopModal(){
		$('.modal-body').animate({scrollTop:0});
	}
//semua nama / id dibuat array dulu
	var all = ['persiapan','Pondasi','sloof','balok','kolom','batubata','plesteraci','atap','Plafon','Keramik','Plumbing','Listrik','Pengecetan','pintuAdd'];
	var all2 = ['Pondasi','sloof','balok','kolom','batubata','plesteraci','atap','Plafon','Keramik','Plumbing','Listrik','Pengecetan','pintuAdd'];
	var jmlAll = ['total','jumlah1','jumlah2','jumlah3','jumlah4','jumlah5','jumlah6','jumlah7','jumlah8','jumlah9','jumlah10','jumlah11','jumlah12','jumlah13','jumlah14'];
	var jmlAllEdit = ["jml_persiapan", "jml_pondasi", "jml_sloof", "jml_balok", "jml_kolom", "jmlBata", "jmlAci", "jmlAtap", "jmlPlafon", "jmlKeramik", "jmlPlumbing", "jmlListrik", "jmlCet", "jmlpintu", "totalBobot"];
	var nama = ["mobAlat", "kemPekerja", "airPekerja", "keamanan", "jml_persiapan", "bouwplank", "galianTanah", "UrugTanah", "Pembesian_pondasi", "begesting_pondasi", "pengecoran_pondasi", "pembongkaran_pondasi", "jml_pondasi", "Pembesian_sloof", "begesting_sloof", "pengecoran_sloof", "pembongkaran_sloof", "jml_sloof", "Pembesian_balok", "begesting_balok", "pengecoran_balok", "pembongkaran_balok", "jml_balok", "Pembesian_kolom", "begesting_kolom", "pengecoran_kolom", "pembongkaran_kolom", "jml_kolom", "bataDinding", "bataSekat", "bataKamarMandi", "jmlBata", "aciDinding", "aciSekat", "aciKamarMandi", "aciLantai", "aciTeras", "jmlAci", "rangkaAtap", "penutupAtap", "lisplankAtap", "jmlAtap", "rangkaPlafon", "penutupPalfon", "dempulPlafon", "cetPlafon", "jmlPlafon", "kerKamarMandi", "KerLantai", "kerDinding", "kerCloset", "kerTeras", "jmlKeramik", "airBersih", "septiiktank", "jmlPlumbing", "instalasiListrik", "jmlListrik", "cet", "jmlCet", "pintu", "jendela", "jmlpintu","totalBobot" ];
	var namaAdd = ["mobilisasi", "gudang", "air", "keamanan", "Bouwplank", "Galian", "Urugan", "Pembesian_pondasi", "Begesting_pondasi", "Pengecoran_pondasi", "Pembongkaran_pondasi", "Pembesian_sloof", "Begesting_sloof", "Pengecoran_sloof", "Pembongkaran_sloof", "Pembesian_balok", "Begesting_balok", "Pengecoran_balok", "Pembongkaran_balok", "Pembesian_kolom", "Begesting_kolom", "Pengecoran_kolom", "Pembongkaran_kolom", "BatuBata_dinding", "BatuBata_sekat", "BatuBata_kMandi", "PlesterAci_dinding", "PlesterAci_sekat", "PlesterAci_kMandi", "PlesterAci_lantai", "PlesterAci_teras", "Rangka_atap", "Penutup_atap", "Lisplank", "Rangka_plafon", "Penutup_plafon", "Dempul", "cet_plafon", "Keramik_kMandi", "Keramik_lantai", "Keramik_dinding", "Keramik_closet", "Keramik_teras", "pipa_air", "Septik_tank", "instal_listrik", "pek_pengecetan", "pem_Pintu", "pem_Jendela"];
//fungsi untuk menambahkan , setelah 3 nomor
	function formatNumber(num) {
      return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    }  
//fungsi untuk bootstrap  Toogle, dengan id ngambil dari array
	all.forEach((data) =>{
		// untuk Tambah
		$('#toggle_'+data).bootstrapToggle({
			off: '<i class="ti-lock"></>',
			on: '<i class="ti-unlock"></>',
			size: 'mini',
			width: '50',
			height:'25',
			style: 'ios',
			onstyle:"info",
			offstyle:'success'
		});
		$('#toggle_'+data).change(function(){
			if ($(this).prop('checked') == true) {
				$('#'+data).show('fast').fadeIn(1000);
			}else if ($(this).prop('checked') == false){
				$('#'+data).hide('fast').fadeOut(1000);
			}
		});
		//untuk view / lihat
		$('#toggle_'+data+'_view').bootstrapToggle({
			off: '<i class="ti-lock"></>',
			on: '<i class="ti-unlock"></>',
			size: 'mini',
			width: '50',
			height:'25',
			style: 'ios',
			onstyle:"info",
			offstyle:'success'
		});
		$('#toggle_'+data+'_view').change(function(){
			if ($(this).prop('checked') == true) {
				$('#'+data+'_view').show('fast').fadeIn(1000);
			}else if ($(this).prop('checked') == false){
				$('#'+data+'_view').hide('fast').fadeOut(1000);
			}
		});
		//untuk edit
		$('#edittoggle_'+data).bootstrapToggle({
			off: '<i class="ti-lock"></>',
			on: '<i class="ti-unlock"></>',
			size: 'mini',
			width: '50',
			height:'25',
			style: 'ios',
			onstyle:"info",
			offstyle:'success'
		});
		$('#edittoggle_'+data).change(function(){
			if ($(this).prop('checked') == true) {
				$('#edit'+data).show('fast').fadeIn(1000);
			}else if ($(this).prop('checked') == false){
				$('#edit'+data).hide('fast').fadeOut(1000);
			}
		});
	});
//fungsi untuk setting datatable Pekerjaan
    $('#info').show('slow').fadeOut(2000);
    var pekerjaan = $('#example').DataTable({
    	"pageLength": 4,
        "lengthChange": false,
        "autoWidth": false,
		"columnDefs": [
			{ "width": "8%", "targets": [0] },
			{"orderable": false, "targets": '_all' },
            {"className": "text-center", "targets": [0,2,3,4]}
          ],
	});
//dungsi untuk menampilkan data pekerjaan
	tampilPekerjaan();
	function tampilPekerjaan()
	{
		var status = 'all';
		$.ajax({
			type     : 'post',
            url      : 'getBobot',
            async    : true,
            dataType : 'json',
            data:{status:status},
            success  : function(data){
        		pekerjaan.clear().draw();
            	for(i=0; i < data.length; i++){
            		pekerjaan.rows.add([
            				[
            					i+1,
            					data[i].nama,
            					'Rp. '+formatNumber(data[i].harga)+' ,-',
            					data[i].totalBobot+' %',
            					'<button type="button" class="btn btn-outline-info btn-rounded btn-icon btn-sm lihat mr-1" id="'+data[i].bobot_id+'" data-toggle="modal" data-target="#view"  data-backdrop="static">'+
                                    '<i class="ti-eye"></i>'+
                                '</button>'+
                                '<button type="button" class="btn btn-outline-success btn-rounded btn-icon btn-sm edit mr-1" id="'+data[i].bobot_id+'" data-toggle="modal" data-target="#edit" data-backdrop="static">'+
                                    '<i class="ti-pencil"></i>'+
                                '</button>'+
                                '<button type="button" class="btn btn-outline-danger btn-rounded btn-icon btn-sm hapus mr-1" id="'+data[i].bobot_id+'" nama="'+data[i].nama+'">'+
                                    '<i class="ti-trash"></i>'+
                                '</button>'
            				]
            			]).draw();
            	}
            }
		});
	}
//fungsi untuk view / melihat detail data bobot
	$('#example').on('click','.lihat',function(){
		scrollTopModal();
		var id = $(this).attr('id');
	//reset bootstrap toggle pada view
		all2.forEach((data) => {
			jmlAll.forEach((data) => {
				$('.'+data).html(0);
			});
			if ($('#toggle_persiapan_view').prop('checked') == true && $('#toggle_'+data+'_view').prop('checked') == true ){
				$('#toggle_'+data+'_view').bootstrapToggle('off');
				$('#toggle_persiapan_view').bootstrapToggle('on');
			}
		});
	//get data
		$.ajax({
			type     : 'post',
            url      : 'getBobot',
            async    : true,
            dataType : 'json',
            data: {id:id},
            success:function(data){
            	var t = 'nama';
            	for(i=0; i < data.length; i++){
            		$('.judulView').html('Detail Pekerjaan '+data[i].nama);
            		$('.hargaView').html('Harga Pekerjaan '+data[i].nama+' = <b>Rp. '+formatNumber(data[i].harga)+' ,-</b>');
            		nama.forEach((dt) => {
            			$('#'+dt).html(data[i][dt]+' %');
            		});
            	}
            	if ($('.judulView').html() != '') {
            		$('#view').modal('show');
            	}
            	
            }
		});
	});
//fungsi untuk tambah
	//fungsi ketika tombol tambah di klik maka form tambah data akan tereset
	$('.tbhbobot').click(function(){
		all2.forEach((data) => {
			jmlAll.forEach((data) => {
				$('.'+data).html(0);
			});
			if ($('#toggle_persiapan').prop('checked') == true && $('#toggle_'+data).prop('checked') == true ){
				$('#toggle_'+data).bootstrapToggle('off');
				$('#toggle_persiapan').bootstrapToggle('on');
			}
		});
		scrollTopModal();
		$('#frmbobot').bootstrapValidator('resetForm',true);
		namaAdd.forEach((data)=>{
			$('#frmbobot').bootstrapValidator('addField', data, {
	            validators:{
            		notEmpty: {
                        message: 'Tidak Boleh Kosong !!!'
                    },
                    regexp: {
                        regexp: /^[0-9.]+$/,
                        message: 'Tidak boleh mengandung huruf atau simbol'
                    },
                    stringLength: {
                        max: 5,
                        message: 'Maximal 5 Karakter !!!'
                    },
                    callback: {
                        callback: function(value, validator, $field) {
                            if (value === '') {
                                return true;
                            }
                            // Nama lengkap tidak boleh mengandung simbol
                            if (value === '0.') {
                                return {
                                    valid: false,
                                    message: 'Tidak Boleh 0 min 0.01'
                                }
                            }
                            if (value === '0') {
                                return {
                                    valid: false,
                                    message: 'Tidak Boleh 0 min 0.01'
                                }
                            }
                            return true;
                        }
                    }
            	}
	        });
		});
	});
	//untuk validasi form
	$('input[name="harga"]').keyup(function(even){
		if(event.which >= 37 && event.which <= 40) return;
		$(this).val(function(index, value) {
			return value
			.replace(/\D/g, "")
			.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		});
	});
	$('#frmbobot')
	    .bootstrapValidator({
	        feedbackIcons: {
	        	valid: 'ti-check',
                invalid: 'ti-close',
                validating: 'ti-reload'
	        },
	        excluded: [':disabled'],
	        fields: {
	        	harga: {
	                validators: {
	                    notEmpty: {
	                        message: 'Tidak Boleh Kosong !!! Wajib Di isi'
	                    },
	                    regexp: {
                            regexp: /^[0-9,]+$/,
                            message: 'Tidak boleh mengandung huruf atau simbol'
                        },
	                }
	            },
	            namaPekerjaan: {
	                validators: {
	                    notEmpty: {
	                        message: 'Tidak Boleh Kosong !!! Wajib Di isi'
	                    }
	                }
	            }
	        }
	    })
	    .on('success.field.bv', function(e, data) {
            var $parent = data.element.parents('.form-group');
            // menyembunyikan icon sukses
            $parent.find('.form-control-feedback[data-bv-icon-for="' + data.field + '"]').hide();
        });   
    //untuk tombol reset
    $('.resetAdd').click(function(){
		$('#frmbobot').bootstrapValidator('resetForm',true);
		jmlAll.forEach((data) => {
			$('.'+data).html(0);
		});
		all2.forEach((data) => {
			$('#toggle_'+data+'').bootstrapToggle('off');
			$('#toggle_persiapan').bootstrapToggle('on');
    	});
    	scrollTopModal();
	});
    //untuk simpan 
    $('.save').click(function(){
    	var nm = $('input[name="namaPekerjaan"]').val();
    	var total = $('.total').html();
    	var hrg = $('input[name="harga"]').val();
    	if (nm == '' || hrg == '' || total < 100) {
    		all2.forEach((data) => {
    			$('#toggle_'+data+'').bootstrapToggle('on');
    		});
    		scrollTopModal();
    	}else{
    		$('#tambah').modal('hide');
	    	$('#loading').modal('show');
	    	$.ajax({
	    		type     : 'post',
	            url      : 'addBobot',
	            data: $('#frmbobot').serialize(),
	            success:function(data){
	            	setTimeout(function(){ $('#loading').modal('hide'); $(".modal-backdrop").remove(); }, 3000);
	            	setTimeout(function(){ 
	            		swal('',"Good Job!! Data Berhasil Di Simpan", "success").then((value)=>{
                                tampilPekerjaan();
                            });
	            	}, 3000);
	            	
	            }
    		});
    	}
    });
//fungsi untuk hapus data
	$('#example').on('click','.hapus',function(){
		var id = $(this).attr('id');
		var nama = $(this).attr('nama');
		swal({
            title: "Apakah Anda Yakin?",
            text: "Mau Menghapus "+nama,
            icon: "warning",
            buttons: ['Tidak',"Iya"],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type:'post',
                    url:'delBobot',
                    data:{id:id},
                    success:function(data){
                        if (data ==  'berhasil') {
                            swal('',"Good Job!! Data Berhasil Di Hapus", "success").then((value)=>{
                                tampilPekerjaan();
                            });
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
//fungsi untuk edit data
	//validation form
	$('#frmbobotedit')
	    .bootstrapValidator({
	        feedbackIcons: {
	        	valid: 'ti-check',
                invalid: 'ti-close',
                validating: 'ti-reload'
	        },
	        excluded: [':disabled'],
	        fields: {
	            editnamaPekerjaan: {
	                validators: {
	                    notEmpty: {
	                        message: 'Tidak Boleh Kosong !!! Wajib Di isi'
	                    }
	                }
	            },
	            editharga: {
	                validators: {
	                    notEmpty: {
	                        message: 'Tidak Boleh Kosong !!! Wajib Di isi'
	                    },
	                    regexp: {
                            regexp: /^[0-9,]+$/,
                            message: 'Tidak boleh mengandung huruf atau simbol'
                        },
	                }
	            },
	        }
	    })
	    .on('success.field.bv', function(e, data) {
            var $parent = data.element.parents('.form-group');
            // menyembunyikan icon sukses
            $parent.find('.form-control-feedback[data-bv-icon-for="' + data.field + '"]').hide();
        });
    //fungsi untukk memberikan koma otomatis ketika harga dimasukan
    $('input[name="editharga"]').keyup(function(even){
		if(event.which >= 37 && event.which <= 40) return;
		$(this).val(function(index, value) {
			return value
			.replace(/\D/g, "")
			.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		});
	});
    // ketika tombol edit di klik form akan terseret dan menampilkan data tampilan data    
	$('#example').on('click','.edit',function(){
		var id = $(this).attr('id');
		all2.forEach((data) => {
			jmlAll.forEach((data) => {
				$('.'+data).html(0);
			});
			if ($('#edittoggle_persiapan').prop('checked') == true && $('#edittoggle_'+data).prop('checked') == true ){
				$('#edittoggle_'+data+'').bootstrapToggle('off');
				$('#edittoggle_persiapan').bootstrapToggle('on');
			}
		});
		$('#frmbobotedit').bootstrapValidator('resetForm',true);
		namaAdd.forEach((data)=>{
			$('#frmbobotedit').bootstrapValidator('addField', 'edit'+data, {
	            validators:{
            		notEmpty: {
                        message: 'Tidak Boleh Kosong !!!'
                    },
                    regexp: {
                        regexp: /^[0-9.]+$/,
                        message: 'Tidak boleh mengandung huruf atau simbol'
                    },
                    stringLength: {
                        max: 5,
                        message: 'Maximal 5 Karakter !!!'
                    },
                    callback: {
                        callback: function(value, validator, $field) {
                            if (value === '') {
                                return true;
                            }
                            // Nama lengkap tidak boleh mengandung simbol
                            if (value === '0.') {
                                return {
                                    valid: false,
                                    message: 'Tidak Boleh 0 min 0.01'
                                }
                            }
                            if (value === '0') {
                                return {
                                    valid: false,
                                    message: 'Tidak Boleh 0 min 0.01'
                                }
                            }
                            return true;
                        }
                    }
            	}
	        });
		});
		$.ajax({
			type     : 'post',
            url      : 'getBobot',
            async    : true,
            dataType : 'json',
            data: {id:id},
            success:function(data){
            	scrollTopModal();
            	var n = 1;
            	for(i=0; i < data.length; i++){
            		$('.namaedit').html('Edit Pekerjaan '+data[i].nama);
            		$('#editnamaPekerjaan').val(data[i].nama);
            		$('input[name="editharga"]').val(formatNumber(data[i].harga));
            		$('input[name="IDPembangunan"]').val(data[i].bobot_id);
            		nama.forEach((dt) => {
            			$('.'+dt).val(data[i][dt]);
            		});
            		jmlAllEdit.forEach((dt) => {
            			$('.'+dt).html(data[i][dt]);
            			$('input[name="editjumlah'+n+'"]').val(data[i][dt]);
            			n = n+1;
            		});
            	}
            	if ($('.namaedit').html() != '') {
            		$('#edit').modal('show');
            	}
            }
		});
		scrollTopModal();
	});
	//fungsi untuk tombol reset pada form edit
	$('.resetEdit').click(function(){
		$('#frmbobotedit').bootstrapValidator('resetForm',true);
		jmlAllEdit.forEach((data) => {
			$('.'+data).html(0);
		});
		all2.forEach((data) => {
			$('#edittoggle_'+data).bootstrapToggle('off');
			$('#edittoggle_persiapan').bootstrapToggle('on');
    	});
    	scrollTopModal();
	});
	//fungsi untuk menyimpan data edit
	$('.saveEdit').click(function(){
		var nm = $('#editnamaPekerjaan').val();
		var hrg = $('input[name="editharga"]').val();
		var tot = $('.totalBobot').html();
		if (nm == '' || hrg == '' || tot < 100) {
    		all2.forEach((data) => {
    			$('#edittoggle_'+data+'').bootstrapToggle('on');
    		});
    		scrollTopModal();
		}else{
			$('#edit').modal('hide');
	    	$('#loading').modal('show');
	    	$.ajax({
	    		type     : 'post',
	            url      : 'EditBobot',
	            data: $('#frmbobotedit').serialize(),
	            success:function(data){
	            	if (data == "berhasil") {
	            		setTimeout(function(){ $('#loading').modal('hide'); $(".modal-backdrop").remove(); }, 3000);
		            	setTimeout(function(){ 
		            		swal('',"Good Job!! Data Berhasil Di Edit", "success").then((value)=>{
	                                tampilPekerjaan();
	                            });
		            	}, 3000);
	            	}else{
	            		if (data == 'gagal') {
	            			$(".modal-backdrop").remove();
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


</script>





