<style type="text/css">
    #tableBlok_filter input {
      border-radius: 10px;
      width: 200px;
    }
    #tableBlok_length select {
        border-radius: 10px;
    }
    #example_filter input {
      border-radius: 10px;
      width: 200px;
    }
    #tableBlokEdit tbody tr{
        text-align: center;
    }
    #tableBlokEdit_filter input {
      border-radius: 10px;
      width: 150px;
    }
    #tableBlokEdit_length select {
        border-radius: 10px;
    }
    #tableBlokEdit{
        border-radius: 10px;
    }
    #tableBlokEdit_paginate ul li{
        font-size: 10px;
        font-style: bold;
    }
    .hide{
        display: none;
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
                        <h4 class="font-weight-bold mb-0">DATA PROYEK</h4>
                    </div>
                    <div>
                        <button type="button" class="btn btn-primary btn-icon-text btn-rounded btntambah" data-toggle="modal" data-target="#tambahProyek" data-backdrop="static">
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
                        <button type="button" id="exporProyek" class="btn btn-outline-primary btn-icon-text btn-sm" style="margin-bottom: -30px;">
                            <i class="ti-export  btn-icon-prepend"></i> <span class="menu-title">Export PDF</span>
                        </button>
                        <div class="table-responsive">
                            <table id="example" class="table table-hover table-sm" style="width:100%" >
                                <thead style="font-size: 12px" class="table-primary">
                                    <tr>
                                        <th class="text-center align-middle" height="40px">Nama Proyek</th>
                                        <th class="text-center align-middle">Nomor SPK</th>
                                        <th class="text-center align-middle">Type Pembangunan</th>
                                        <th class="text-center align-middle">Jumlah Unit</th>
                                        <th class="text-center align-middle">Nilai Kontrak</th>
                                        <th class="text-center align-middle">Lokasi Proyek</th>
                                        <th class="text-center align-middle">Dikerjakan Oleh</th>
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
<!-- Modal Form untuk Tambah Data Proyek -->
<div class="modal fade" id="tambahProyek" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document" style="max-width: 600px">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle" style="font-family: times new roman">Tambah Data Proyek</h4>
                <button type="button" class="close" data-dismiss="modal">
                  <i class="fa fa-backspace fa-xs"></i>
                </button>
            </div>
            <div class="modal-body">
            <label style="color: red; font-size: 12px; font-family: times new roman; margin-top: 10px; margin-left: 20px; margin-bottom: 20px">Wajib Di Isi *</label>
            <form id="frmproyek" class="form-sample" style="font-family: times new roman">
                <div class="form-group row" style="margin-right: 0; margin-left: 0">
                    <label for="namaproyek" class="col-md-4 col-sm-4 col-form-label form-control-sm" >Nama Proyek *</label>
                    <div class="col-md-8 col-sm-8 inputGroupContainer">
                        <input placeholder="Nama Proyek" class="form-control form-control-sm" type="text" name="namaproyek" id="namaproyek" >
                    </div>
                </div>
                <div class="form-group row" style="margin-right: 0; margin-left: 0">
                    <label for="spk" class="col-md-4 col-sm-4 col-form-label form-control-sm" >Nomor SPK *</label>
                    <div class="col-md-8 col-sm-8 inputGroupContainer">
                        <input placeholder="Nomor SPK" class="form-control form-control-sm" type="text" name="spk" id="spk">
                    </div>
                </div>
                <div class="form-group row" style="margin-right: 0; margin-left: 0">
                    <label class="col-md-4 col-sm-4 col-form-label form-control-sm" >Pembangunan *</label>
                    <div class="col-md-8 col-sm-8 inputGroupContainer">
                        <small><i class="fa fa-plus-circle fa-xs" style="color: blue"></i> Untuk menambahkan data pembangunan *</small>
                        <i class="fa fa-plus-circle fa-lg btnpembangunan" style="color: blue" data-target="#pembangunan" data-toggle="modal" data-backdrop="static"></i>
                    </div>
                </div>
                <div class="form-group row" style="margin-right: 0; margin-left: 0">
                    <label class="col-md-4 col-sm-4 col-form-label form-control-sm" ></label>
                    <div class="col-md-8 col-sm-8 inputGroupContainer">
                        <table class="table table-striped table-bordered table-sm" id="tablePembangunan">
                            <thead>
                                <tr>
                                    <th class="text-center">Type</th>
                                    <th class="text-center">Harga /Unit</th>
                                    <th class="text-center">Jumlah Unit</th>
                                    <th class="text-center">#</th>
                                </tr>
                            </thead>
                            <tbody id="tampilPembangunan">
                                <tr>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="form-group row" style="margin-right: 0; margin-left: 0">
                    <label class="col-md-4 col-sm-4 col-form-label form-control-sm" >Nilai Kontrak *</label>
                    <div class="col-md-8 col-sm-8 inputGroupContainer">
                        <input class="form-control form-control-sm"  type="text" name="nilaikontrak" value="0" readonly>
                    </div>
                </div>
                <div class="form-group row" style="margin-right: 0; margin-left: 0">
                    <label class="col-md-4 col-sm-4 col-form-label form-control-sm" >Lokasi Proyek *</label>
                    <div class="col-md-8 col-sm-8 inputGroupContainer">
                        <textarea class="form-control form-control-sm" name="lokasiproyek"></textarea>
                    </div>
                </div>
                <div class="form-group row" style="margin-right: 0; margin-left: 0">
                    <label class="col-md-4 col-sm-4 col-form-label form-control-sm" >Dikerjakan Oleh *</label>
                    <div class="col-md-8 col-sm-8 inputGroupContainer">
                        <select class="form-control form-control-sm" name="dikerjakan">
                            <option value="">--Pilih--</option>
                            <?php foreach ($perusahaan->result() as $key => $data) { ?>
                               <option value="<?=$data->company_id?>"><?=$data->namaCompany?></option> 
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row" style="margin-right: 0; margin-left: 0">
                    <label class="col-md-4 col-sm-4 col-form-label form-control-sm">Waktu Pelaksanaan *</label>
                    <label class="col-md-2 col-sm-4 col-form-label form-control-sm text-left" >Awal *</label>
                    <div class="col-md-6 col-sm-6 inputGroupContainer">
                        <input class="form-control form-control-sm" type="text" name="wpawal" placeholder="DD/MM/YYYY">
                    </div>
                </div>
                <div class="form-group row" style="margin-right: 0; margin-left: 0">
                    <label class="col-md-4 col-sm-4 col-form-label form-control-sm" ></label>
                    <label class="col-md-2 col-form-label text-left form-control-sm" >Akhir *</label>
                    <div class="col-md-6 col-sm-6 inputGroupContainer">
                        <input class="form-control form-control-sm" type="text" name="wpakhir" placeholder="DD/MM/YYYY">
                    </div>
                </div>
                <div class="form-group row" style="margin-right: 0; margin-left: 0">
                    <label class="col-md-4 col-sm-4 col-form-label form-control-sm" >Keterangan</label>
                    <div class="col-md-8 col-sm-8 inputGroupContainer">
                        <textarea class="form-control form-control-sm" name="ket"></textarea>
                    </div>
                </div>
                <div style="margin-bottom: 20px;margin-right: 20px; font-family: times new roman" class="float-right">
                    <button type="reset" class="btn btn-primary btn-sm btnresetAdd "><i class="fa fa-redo fa-fw"></i> Reset</button>
                    <button class="btn btn-primary btn-sm text-white" id="tambah"><i class="fa fa-save fa-fw"></i> Save</button>
                </div>
            </form>
                
            </div>
        </div>
    </div>
</div>
<!-- Modal untuk Lihat Detail Data Proyek -->
<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 100%">
        <div class="modal-content" style="width: 600px">
            <div class="modal-header">
                <h4 class="modal-title" id="namaView" style="font-family: times new roman; font-size: 20px"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive-lg">
                    <table class="table" style="font-size: 14px;" id="tableViewproyek">
                        <thead>
                            <tr>
                                <th class="text-right align-middle table-secondary" width="170px" style="border-bottom: 0px">Nama Proyek :</th>
                                <td id="np" class="table-secondary" style="border-bottom: 0px; border-top: 0px" ></td>
                            </tr>
                            <tr>
                                <th class="text-right align-middle" width="170px" style="border-bottom: 0px; border-top: 0px">Nomor SPK :</th>
                                <td class="spk" style="border-bottom: 0px; border-top: 0px"></td>
                            </tr>
                            <tr>
                                <th class="text-right align-middle table-secondary" width="170px" style="border-bottom: 0px; border-top: 0px">Type Pembangunan :</th>
                                <td id="type" class="table-secondary" style="border-bottom: 0px; border-top: 0px"></td>
                            </tr>
                            <tr>
                                <th class="text-right align-middle" width="170px" style="border-bottom: 0px; border-top: 0px">Blok :</th>
                                <td id="bk" style="border-bottom: 0px; border-top: 0px"></td>
                            </tr>
                            <tr>
                                <th class="text-right align-middle" width="170px" style="border-bottom: 0px; border-top: 0px">Jumlah Unit :</th>
                                <td id="jml" style="border-bottom: 0px; border-top: 0px"></td>
                            </tr>
                            <tr>
                                <th class="text-right align-middle table-secondary" width="170px" style="border-bottom: 0px; border-top: 0px">Nilai Kontrak :</th>
                                <td id="nk" class="table-secondary" style="border-bottom: 0px; border-top: 0px"></td>
                            </tr>
                            <tr>
                                <th class="text-right align-middle" width="170px" style="border-bottom: 0px; border-top: 0px">Lokasi proyek :</th>
                                <td id="lp"  style="border-bottom: 0px; border-top: 0px"></td>
                            </tr>
                            <tr>
                                <th class="text-right align-middle table-secondary" width="170px" style="border-bottom: 0px; border-top: 0px">Dikerjakan Oleh :</th>
                                <td id="dko" class="table-secondary" style="border-bottom: 0px; border-top: 0px"></td>
                            </tr>
                            <tr>
                                <th class="text-right align-middle" width="170px" style="border-bottom: 0px; border-top: 0px">Waktu Pelaksanaan :</th>
                                <td id="wp" style="border-bottom: 0px; border-top: 0px"></td>
                            </tr>
                            <tr>
                                <th class="text-right align-middle table-secondary" width="170px" style="border-bottom: 0px; border-top: 0px">Keterangan :</th>
                                <td id="ket" class="table-secondary" style="border-bottom: 0px; border-top: 0px"></td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Form untuk Edit Data Proyek -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document" style="max-width: 600px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="font-family: times new roman; font-size: 20px" id="namaViewedit"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label style="color: red; font-size: 12px; font-family: times new roman; margin-top: 10px; margin-left: 20px; margin-bottom: 20px">Wajib Di Isi *</label>
                <form method="post" id="frmproyekedit" class="form-sample" style="font-family: times new roman" enctype="multipart/form-data">
                    <input type="hidden" name="idProyek">
                    <input type="hidden" name="jmlIDBlok">
                    <div id="idBlok"></div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label form-control-sm" >Nama Proyek *</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <input placeholder="Nama Proyek" class="form-control form-control-sm"  type="text" name="namaproyekedit">
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label form-control-sm" >Nomor SPK *</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <input placeholder="Nomor SPK" class="form-control form-control-sm"  type="text" name="spkedit">
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label form-control-sm" >Type Pembangunan *</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <select class="form-control form-control-sm" name="typePembangunanedit" id="typePembangunanedit">
                                <option value="" harga="0">--Pilih--</option>
                                <?php foreach ($proyek as $key => $data) { ?>
                                <option value="<?=$data->bobot_id?>" harga="<?=$data->harga?>" nama="<?=$data->nama?>"><?=$data->nama?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label form-control-sm" >Blok & Nomor *</label>
                        <div class="col-lg-8 inputGroupContainer">
                            <button data-toggle="modal" data-target="#toggleBlok" type="button" class="btn btn-default btn-sm float-right"style="height: 35px; margin-left: 10px; border-radius: 10px" id="tbhblokedit">
                                <i class="fa fa-plus-circle fa-lg" style="color: blue"></i>
                            </button>
                            <table class="table table-sm table-bordered table-striped" id="tableBlokEdit">
                                <thead>
                                    <tr>
                                        <th class="text-center">Blok</th>
                                        <th class="text-center">Nomor</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label form-control-sm" >Jumlah Unit *</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <input placeholder="Jumlah Unit" class="form-control form-control-sm"  type="text" name="jmlunitedit" readonly>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label form-control-sm" >Nilai Kontrak *</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <input placeholder="Rp. 0 ,-" class="form-control form-control-sm"  type="text" name="nilaikontrakedit" readonly>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label form-control-sm" >Lokasi Proyek *</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer" id="lokasiproyekedit">
                            
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label form-control-sm" >Dikerjakan Oleh *</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <select class="form-control form-control-sm" name="dikerjakanedit" id="dikerjakanedit">
                                <option value="">--Pilih--</option>
                                <?php foreach ($perusahaan->result() as $key => $data) { ?>
                                    <option value="<?=$data->company_id?>"><?=$data->namaCompany?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label form-control-sm" >Waktu Pelaksanaan *</label>
                        <label class="col-md-2 control-label text-left" >Awal *</label>
                        <div class="col-md-6  inputGroupContainer" style="width: 245px">
                            <input class="form-control form-control-sm" type="text" name="wpawaledit" placeholder="DD/MM/YYYY">
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label form-control-sm" ></label>
                        <label class="col-md-2 control-label text-left" >Akhir *</label>
                        <div class="col-md-6  inputGroupContainer" style="width: 245px">
                            <input class="form-control form-control-sm" type="text" name="wpakhiredit" placeholder="DD/MM/YYYY" >
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label form-control-sm" >Keterangan</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer" id="ketedit">
                            
                        </div>
                    </div>
                    <div style="margin-bottom: 20px;margin-right: 20px; font-family: times new roman" class="float-right">
                        <button type="reset" class="btn btn-primary btn-sm btnresetAddEdit "><i class="fa fa-redo fa-fw"></i> Reset</button>
                        <button class="btn btn-primary btn-sm text-white" id="saveEditProyek"><i class="fa fa-save fa-fw"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Form untuk Tambah Pembangunan -->
<div class="modal fade" id="pembangunan" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document" >
        <div class="modal-content" >
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalScrollableTitle" style="font-family: times new roman">Tambah Pembangunan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label style="color: red; font-size: 12px; font-family: times new roman;">Wajib Di Isi *</label>
                <form class="form-sample" style="font-family: times new roman" id="frmPembangunan">
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-3 col-sm-3 col-control-label form-control-sm" >Type *</label>
                        <div class="col-md-9 col-sm-9 inputGroupContainer">
                            <select class="form-control form-control-sm" name="typePembangunan" id="typePembangunan">
                                <option value="" harga="0">--Pilih--</option>
                                <?php foreach ($type as $key => $data) { ?>
                                <option value="<?=$data->bobot_id?>" harga="<?=$data->harga?>"><?=$data->nama?></option>
                                <?php } ?>
                            </select>
                            <input type="hidden" name="namatype">
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-3 col-sm-3 col-control-label form-control-sm" >Blok & Nomor</label>
                        <div class="col-md-9 col-sm-9 inputGroupContainer">
                            <small>Klik Tambah Untuk menambahkan data pembangunan *</small>
                            <button data-target="#toggleBlok" data-toggle="modal" type="button" class="btn btn-primary btn-xs btnblokadd" data-backdrop="static">
                                <i class="fa fa-plus-circle fa-sm" style="color: white"></i>
                            </button>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-3 col-sm-3 col-control-label form-control-sm" ></label>
                        <div class="col-md-9 col-sm-9 inputGroupContainer">
                            <table class="table table-sm table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Nomor</th>
                                        <th class="text-center">#</th>
                                    </tr>
                                </thead>
                                <tbody id="tampilblok">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-3 col-sm-3 col-control-label form-control-sm" >Jumlah Unit *</label>
                        <div class="col-md-9 col-sm-9 inputGroupContainer">
                            <input value="0" class="form-control form-control-sm" id="jmlunit"  type="text" name="jmlunit" readonly>
                        </div>
                    </div>
                    <div style="margin-bottom: 20px;margin-right: 20px; font-family: times new roman" class="float-right">
                        <a class="btn btn-primary btn-sm text-white" id="tambahPembangunan"><i class="fa fa-save fa-fw"></i> Tambah</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Form untuk Tambah blok -->
<div class="modal fade" id="toggleBlok" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 100%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle" style="font-family: times new roman">Tambah Blok Dan Nomor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeBlok">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <label style="color: red; font-size: 12px; font-family: times new roman; margin-top: 10px; margin-left: 20px; margin-bottom: 20px">Wajib Di Isi *</label>
            <form class="form-sample" style="font-family: times new roman" id="frmblok">
                <div class="form-group row" style="margin-right: 0">
                    <label class="col-md-4 col-sm-4 col-form-label form-control-sm" >Nama Blok *</label>
                    <div class="col-md-8 col-sm-8 inputGroupContainer">
                        <input placeholder="Example : Blok Titanium" class="form-control form-control-sm"  type="text" name="blok" id="blok">
                    </div>
                </div>
                <div class="form-group row" style="margin-right: 0">
                    <label class="col-md-4 col-sm-4 col-form-label form-control-sm" >Nomor *</label>
                    <div class="col-md-5 col-sm-5 inputGroupContainer">
                        <input placeholder="Example : 1A" class="form-control form-control-sm"  type="text" name="nomor1">
                    </div>
                    <div class="col-md-3 col-sm-3 inputGroupContainer" id="btnTBHAN">
                        <button type="button" class="btn btn-default btn-sm" id="tambahBlok" style="height: 35px" data-template="nomor">
                        <i class="fa fa-plus-circle fa-lg" style="color: blue"></i>
                        </button>
                    </div>
                    <div class="col-md-3 col-sm-3 inputGroupContainer" id="btnClone">
                        <button type="button" class="btn btn-default btn-sm" id="tambahBlokClone" style="height: 35px" data-template="nomor">
                        <i class="fa fa-plus-circle fa-lg" style="color: blue"></i>
                        </button>
                        <button type="button" class="btn btn-default btn-sm" id="kurangBlokClone" style="height: 35px">
                            <i class="fa fa-minus-circle fa-lg" style="color: red"></i>
                        </button>
                    </div>
                </div>
                <input type="hidden" id="jmlClone" class="" name="jmlClone" value="0">
                <input type="hidden" name="statusTombol" placeholder="Edit Atau Lihat">
                <input type="hidden" name="idpembangunan" placeholder="id Pembangunan">
                <input type="hidden" name="harga" placeholder="harga Per pembangunan">
                <!-- Untuk Clone Blok dan Nomor -->
                <div class="row">
                    <div class="col-md-5 col-sm-5 offset-md-4">
                        <div class="form-group row hide" id="clonenomor">
                            <div class="col-md-12 col-sm-12 inputGroupContainer">
                                <input class="form-control form-control-sm" type="text" placeholder="Blok & Nomor" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- akhir skrip clone -->
                <div style="margin-bottom: 20px;margin-right: 20px; font-family: times new roman" class="float-right">
                    <a class="btn btn-primary btn-sm text-white" id="btnblok"><i class="fa fa-save fa-fw"></i> Tambah</a>
                    <a class="btn btn-primary btn-sm text-white" id="btnblokEdit"><i class="fa fa-save fa-fw"></i> Tambah</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal confirmasi hapus proyek -->
<div class="modal fade" id="hapusproyek" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle">Hapus Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning">
                    Apakah Anda yakin mau menghapus Data Proyek <b class="text-danger" id="jdlhps"></b> Dengan Type pembangunan <b class="text-danger" id="jdlhps1"></b> ?
                </div>            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                <button class="btn_hapus btn btn-danger" id="btn_hapus">Iya</button>
            </div>
        </div>
    </div>
</div>
<!-- modal untuk detail blok -->
<div class="modal fade" id="detailblok" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle">Detail Blok Dan Nomor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-backspace fa-xs"></i></button>
            </div>
            <div class="modal-body">
                <table class="table table-sm table-bordered table-striped" id="tableBlok">
                    <thead>
                        <tr>
                            <th class="text-center" width="10px">No.</th>
                            <th class="text-center">Blok</th>
                            <th class="text-center">Nomor</th>
                        </tr>
                    </thead>
                </table>     
            </div>
        </div>
    </div>
</div>
<!-- modal untuk Edit blok -->
<div class="modal fade" id="detailblokEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle">Detail Blok Dan Nomor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-backspace fa-xs"></i></button>
            </div>
            <div class="modal-body">
                <!-- btn btn-success mb-2 btn-sm   -->
                <button type="button" class="btn btn-default btn-sm" id="tambahBlokEdit" style="height: 35px" data-template="blok">
                    <i class="fa fa-plus-circle fa-lg" style="color: blue"></i>
                </button>
                <table class="table table-sm table-bordered table-striped" id="tableBlokEdit">
                    <thead>
                        <tr>
                            <th class="text-center">Blok</th>
                            <th class="text-center">Nomor</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                </table>     
            </div>
        </div>
    </div>
</div>
<!-- modal untuk konfirmasi perubahan type pembangunan -->
<div class="modal fade" id="changeType" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle">Kofirmasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning">
                    Apakah Data Blok & Nomor Sama dengan Pembangunan <b class="jdlConf"></b> ?
                </div>            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default hapusAllBlokEdit" >Tidak</button>
                <button class="btn btn-danger" data-dismiss="modal" id="iyaSama">Iya</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
//fungsi untuk scroll up modal
    function scrollTopModal(){
        $('.modal-body').animate({scrollTop:0});
    }
//fungsi untuk mengatur loading
    $('#welcome').fadeOut(2000);
    $('.bodyLoading').hide();
    $('#isiHalaman').show();
//fungsi untuk efek pesan

    $('#info').show('slow').fadeOut(2000);
//fungsi untuk menampilkan tanggl menggunakan plugin dataepicker
    $('input[name="wpawal"]').datepicker({
        format: 'dd/mm/yyyy',
        uiLibrary: 'bootstrap4',
        autoclose: true,
        selectOtherMonths: false,
        orientation: "top right",
        clearBtn: true,
        weekStartDay: 6,
        showOtherMonths: false,
        maxDate: function () {
            return $('input[name="wpakhir"]').val();
        }
    });
    $('input[name="wpakhir"]').datepicker({
        format: 'dd/mm/yyyy',
        uiLibrary: 'bootstrap4',
        autoclose: true,
        selectOtherMonths: false,
        weekStartDay: 6,
        orientation: "top right",
        minDate: function () {
            return $('input[name="wpawal"]').val();
        }
    });
    $('input[name="wpawaledit"]').datepicker({
        format: 'dd/mm/yyyy',
        uiLibrary: 'bootstrap4',
        autoclose: true,
        selectOtherMonths: false,
        orientation: "top right",
        clearBtn: true,
        weekStartDay: 6,
        showOtherMonths: false,
        maxDate: function () {
            return $('input[name="wpakhiredit"]').val();
        }
    });
    $('input[name="wpakhiredit"]').datepicker({
        format: 'dd/mm/yyyy',
        uiLibrary: 'bootstrap4',
        autoclose: true,
        selectOtherMonths: false,
        weekStartDay: 6,
        orientation: "top right",
        minDate: function () {
            return $('input[name="wpawaledit"]').val();
        }
    });
//fungsi untuk setting datatable
        var blok = $('#tableBlok').DataTable({
            "columnDefs": [
                {"className": "text-center", "targets": "_all"},
            ],
            "language": {
                "lengthMenu": "_MENU_ Data / Page",
                "zeroRecords": "Maaf Tidak Ada Data Yang Ditemukan",
                "info": "Menampilkan _START_ s/d _END_ Dari _TOTAL_ Data",
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
        var blokEdit = $('#tableBlokEdit').DataTable({
            "language": {
                "lengthMenu": "_MENU_ Data / Page",
                "zeroRecords": "Maaf Tidak Ada Data Yang Ditemukan",
                "info": "Page _PAGE_ Dari _PAGES_ Page",
                "infoEmpty": "Data Kosong",
                "infoFiltered": "",
                "search": "",
                "searchPlaceholder": "Cari...",
                "paginate": {
                    "first":      "First",
                    "last":       "Last",
                    "next":       ">>",
                    "previous":   "<<"
                },
            }
        });
        var proyek = $('#example').DataTable({
            "language":{
                "search": "",
                "searchPlaceholder": "Cari / Filter Di Sini",
            },
            "pageLength": 4,
            "lengthChange": false,
            "columnDefs": [
                {orderable: false, targets: '_all'},
                {"className": "text-center", "targets": [3,4,7]}
              ],
        });
//fungsi untuk titik koma nomor
    function formatNumber(num) {
      return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    }  
//fungsi Clone Nomor
    var no = 2;
    $('#tambahBlok').click(function(){
    	var index = $(this).data('index');
        if (!index) {
            index = 1;
            $(this).data('index', 1);
        }
        index++;
        $(this).data('index', index);

        var template     = $(this).attr('data-template'),
            $templateEle = $('#clone' + template),
        	$row         = $templateEle.clone().removeAttr('id').insertBefore($templateEle).removeClass('hide').addClass('clone'+template+index),
            $el          = $row.find('input').eq(0).attr('name', template + index).attr('placeholder','Example : '+index);
        $('#frmUsers').bootstrapValidator('addField', $el);
        $('#jmlClone').val(index);
        $('#btnClone').removeClass('hide');
        $('#btnTBHAN').addClass('hide');
    });
    $('#frmblok').on('click','#tambahBlokClone',function(){
    	var index = $(this).data('index');
        if (!index) {
            index = 2;
            $(this).data('index', 2);
        }
        index++;
        $(this).data('index', index);
        var template     = $(this).attr('data-template'),
            $templateEle = $('#clone' + template),
        	$row         = $templateEle.clone().removeAttr('id').insertBefore($templateEle).removeClass('hide').addClass('clone'+template+index),
            $el          = $row.find('input').eq(0).attr('name', template + index).attr('placeholder','Example : '+index);
        $('#frmUsers').bootstrapValidator('addField', $el);
        $('#jmlClone').val(index);
    });
    $('#frmblok').on('click','#kurangBlokClone',function(){
    	var jml = $('#jmlClone').val();
        var hrg = $('input[name="harga"]').val();
    	if (jml == 2) {
    		$('#btnClone').addClass('hide');
    		$('#btnTBHAN').removeClass('hide');
    		$('.clonenomor'+jml).remove();
    		$('#tambahBlok').data('index',0);
    		$('#jmlClone').val(0);
    	}else if(jml == 3) {
    		$('.clonenomor'+jml).remove();
    		$('#jmlClone').val(jml-1);
    		$('#tambahBlokClone').data('index',jml-1);
    		$('#btnClone').removeAttr('style');
    	}else{
    		$('.clonenomor'+jml).remove();
    		$('#jmlClone').val(jml-1);
    		$('#tambahBlokClone').data('index',jml-1);
    	}
    });
//fungsi untuk reset clone
    function resetClone(){
        $('#frmblok').bootstrapValidator('resetForm',true);
        var jml = $('#jmlClone').val();
        var i;
        for(i=0; i < jml; i++){
            var n = i+1;
            $('.clonenomor'+n).remove();
        }
        $('#tambahBlokClone').data('index',0);
        $('#tambahBlok').data('index',0);
        $('#btnClone').addClass('hide');
        $('#tambahBlok').removeClass('hide');
        $('#btnClone').removeAttr('style');
        $('#jmlClone').val('0');
    }
//fungsi untuk validasi form
    //memvalidasi form tambah
    $('#frmproyek')//untuk form tambah proyek
        .bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            excluded: [':disabled'],
            fields: {
                namaproyek: {
                    validators: {
                        notEmpty: {
                            message: 'Nama Proyek Tidak Boleh Kosong !!! Wajib Di isi'
                        },
                        callback: {
                            callback: function(value, validator, $field) {
                                if (value === '') {
                                    return true;
                                }
                                // Nama lengkap tidak boleh mengandung simbol
                                if (value.search(/^[a-z A-Z 0-9_\.]+$/) < 0) {
                                    return {
                                        valid: false,
                                        message: 'Nama Proyek tidak boleh mengandung simbol'
                                    }
                                }
                                return true;
                            }
                        }
                    }
                },
                spk: {
                    validators: {
                        notEmpty: {
                            message: 'Tidak Boleh Kosong !!! Wajib Di Isi' 
                        }
                    }
                },
                nilaikontrak: {
                    validators: {
                        notEmpty: {
                            message: 'Tidak Boleh Kosong !!! Wajib Di isi'
                        },
                        callback: {
                            callback: function(value, validator, $field) {
                                if (value === '0') {
                                    return {
                                        valid: false,
                                        message: 'Nilai Kontrak Tidak boleh 0, Silahkan tambahkan minimal 1 data pembangunan'
                                    }
                                }
                                return true;
                            }
                        }
                    }
                },
                lokasiproyek: {
                    validators: {
                        notEmpty: {
                            message: 'Lokasi Proyek Tidak Boleh Kosong !!! Wajib Di isi'
                        },
                        callback: {
                            callback: function(value, validator, $field) {
                                if (value === '') {
                                    return true;
                                }
                                //lokasi proyek kurang dari 10 karakter
                                if (value.length < 10) {
                                    return {
                                        valid: false,
                                        message: 'Minimal 10 karakter'
                                    }
                                }
                                // Lokasi Proyek Lebih Dari 200 karakter
                                if (value.length > 200) {
                                    return {
                                        valid: false,
                                        message: 'Jika Alamat Lebih Dari 200 Karakter Silahkan Di singkat'
                                    }
                                }
                                return true;
                            }
                        }
                    }
                },
                dikerjakan: {
                    validators: {
                        notEmpty: {
                            message: 'Tidak Boleh Kosong !!! Wajib Di Isi' 
                        }
                    }
                },                
                wpawal: {
                    validators: {
                        notEmpty: {
                            message: 'Tidak Boleh Kosong !!! Wajib Di Isi' 
                        },
                        date: {
                            message: 'Format tanggal Salah',
                            format: 'DD/MM/YYYY'
                        },
                        callback: {
                            callback: function(value, validator, $field) {
                                var tanggal = $('input[name="wpakhir"]').val().substr(0,2);
                                var bulan = $('input[name="wpakhir"]').val().substr(3,2);
                                var tahun = $('input[name="wpakhir"]').val().substr(6);
                                if (value === '') {
                                    return true;
                                }
                                if (value.search(/^[0-9/]+$/) < 0) {
                                    return {
                                        valid: false,
                                        message: 'Tidak boleh mengandung Huruf Atau Simbol kecuali simbol /'
                                    }
                                }
                                if (value.substr(0,2) > tanggal && value.substr(3,2) > bulan && value.substr(6) > tahun) {
                                    return {
                                        valid: false,
                                        message: 'Tanggal awal melebihi tanggal akhir'
                                    }
                                }
                                if (value.substr(0,2) <= tanggal && value.substr(3,2) <= bulan && value.substr(6) > tahun) {
                                    return {
                                        valid: false,
                                        message: 'Tanggal awal melebihi tanggal akhir'
                                    }
                                }
                                if (value.substr(0,2) <= tanggal && value.substr(3,2) > bulan && value.substr(6) >= tahun) {
                                    return {
                                        valid: false,
                                        message: 'Tanggal awal melebihi tanggal akhir'
                                    }
                                }
                                if (value.substr(0,2) > tanggal && value.substr(3,2) >= bulan && value.substr(6) >= tahun) {
                                    return {
                                        valid: false,
                                        message: 'Tanggal awal melebihi tanggal akhir'
                                    }
                                }
                                
                                return true;
                            }
                        },
                    }
                },                
                wpakhir: {
                    validators: {
                        notEmpty: {
                            message: 'Tidak Boleh Kosong !!! Wajib Di Isi' 
                        },
                        date: {
                            message: 'Format tanggal Salah',
                            format: 'DD/MM/YYYY'
                        },
                        callback: {
                            callback: function(value, validator, $field) {
                                var tanggal = $('input[name="wpawal"]').val().substr(0,2);
                                var bulan = $('input[name="wpawal"]').val().substr(3,2);
                                var tahun = $('input[name="wpawal"]').val().substr(6);
                                if (value === '') {
                                    return true;
                                }
                                if (value.search(/^[0-9/]+$/) < 0) {
                                    return {
                                        valid: false,
                                        message: 'Tidak boleh mengandung Huruf Atau Simbol kecuali simbol /'
                                    }
                                }
                                if (value.substr(0,2) < tanggal && value.substr(3,2) < bulan && value.substr(6) < tahun) {
                                    return {
                                        valid: false,
                                        message: 'Tanggal Akhir Tidak Boleh Kurang Dari Tanggal Awal'
                                    }
                                }
                                if (value.substr(0,2) >= tanggal && value.substr(3,2) >= bulan && value.substr(6) < tahun) {
                                    return {
                                        valid: false,
                                        message: 'Tanggal Akhir Tidak Boleh Kurang Dari Tanggal Awal'
                                    }
                                }
                                if (value.substr(0,2) >= tanggal && value.substr(3,2) < bulan && value.substr(6) <= tahun) {
                                    return {
                                        valid: false,
                                        message: 'Tanggal Akhir Tidak Boleh Kurang Dari Tanggal Awal'
                                    }
                                }
                                if (value.substr(0,2) < tanggal && value.substr(3,2) <= bulan && value.substr(6) <= tahun) {
                                    return {
                                        valid: false,
                                        message: 'Tanggal Akhir Tidak Boleh Kurang Dari Tanggal Awal'
                                    }
                                }
                                return true;
                            }
                        }
                    }
                },
            }
        })
        .on('success.field.bv', function(e, data) {
            var $parent = data.element.parents('.form-group');
            // Mengahpus class sukses
            $parent.removeClass('has-success');
            // menyembunyikan icon sukses
            $parent.find('.form-control-feedback[data-bv-icon-for="' + data.field + '"]').hide();
        });
    $('#frmPembangunan')//untuk form tambah pembangunan
        .bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            excluded: [':disabled'],
            fields: {
                typePembangunan: {
                    validators: {
                        notEmpty: {
                            message: 'Tidak Boleh Kosong !!! Wajib Di isi'
                        }
                    }
                },
                jmlunit: {
                    validators: {
                        callback: {
                            callback: function(value, validator, $field) {
                                if (value === '0') {
                                    return {
                                        valid: false,
                                        message: 'Jumlah unit tidak boleh 0, Silahkan tambahkan minimal 1 satu data blok dan nomor'
                                    }
                                }
                                return true;
                            }
                        }
                    }
                },
            }
        })
        .on('success.field.bv', function(e, data) {
            var $parent = data.element.parents('.form-group');
            // Mengahpus class sukses
            $parent.removeClass('has-success');
            // menyembunyikan icon sukses
            $parent.find('.form-control-feedback[data-bv-icon-for="' + data.field + '"]').hide();
        });
    $('#frmblok')//untuk form tambah blok
        .bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            excluded: [':disabled'],
            fields: {
                blok: {
                    validators: {
                        notEmpty: {
                            message: 'Tidak Boleh Kosong !!! Wajib Di isi'
                        },
                        callback: {
                            callback: function(value, validator, $field) {
                                if (value === '') {
                                    return true;
                                }
                                // Nama lengkap tidak boleh mengandung simbol
                                if (value.length > 20 ) {
                                    return {
                                        valid: false,
                                        message: 'Jika lebih Dari 20 karakter silahkan di singkat'
                                    }
                                }
                                return true;
                            }
                        }
                    }
                },
                nomor1: {
                    validators: {
                        notEmpty: {
                            message: 'Tidak Boleh Kosong !!! Wajib Di isi'
                        },
                        callback: {
                            callback: function(value, validator, $field) {
                                if (value === '') {
                                    return true;
                                }
                                // Nama lengkap tidak boleh mengandung simbol
                                if (value.search(/^[a-zA-Z0-9]+$/) < 0) {
                                    return {
                                        valid: false,
                                        message: 'Nomor Tidak Boleh Mengandung Simbol Atau Spasi'
                                    }
                                }
                                // Nama lengkap tidak boleh mengandung simbol
                                if (value.length > 3) {
                                    return {
                                        valid: false,
                                        message: 'Max 3 Karakter'
                                    }
                                }
                                return true;
                            }
                        }
                    }
                },
            }
        })
        .on('success.field.bv', function(e, data) {
            var $parent = data.element.parents('.form-group');
            // Mengahpus class sukses
            $parent.removeClass('has-success');
            // menyembunyikan icon sukses
            $parent.find('.form-control-feedback[data-bv-icon-for="' + data.field + '"]').hide();
        });
    $('input[name="wpawal"]').on('change show', function(e) {//revalidasi tambah datepiker waktu awal
        $('#frmproyek').bootstrapValidator('revalidateField', 'wpawal');
        $('#frmproyek').bootstrapValidator('revalidateField', 'wpakhir');
    });
    $('input[name="wpakhir"]').on('change show', function(e) {//revalidasi tambah datepiker waktu Akhir
        $('#frmproyek').bootstrapValidator('revalidateField', 'wpakhir');
        $('#frmproyek').bootstrapValidator('revalidateField', 'wpawal');
    });
    //memvalidasi form edit
    $('#frmproyekedit')//untuk form edit proyek
        .bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            excluded: [':disabled'],
            fields: {
                namaproyekedit: {
                    validators: {
                        notEmpty: {
                            message: 'Nama Proyek Tidak Boleh Kosong !!! Wajib Di isi'
                        },
                        callback: {
                            callback: function(value, validator, $field) {
                                if (value === '') {
                                    return true;
                                }
                                // Nama lengkap tidak boleh mengandung simbol
                                if (value.search(/^[a-z A-Z 0-9_\.]+$/) < 0) {
                                    return {
                                        valid: false,
                                        message: 'Nama Proyek tidak boleh mengandung simbol'
                                    }
                                }
                                return true;
                            }
                        }
                    }
                },
                spkedit: {
                    validators: {
                        notEmpty: {
                            message: 'Tidak Boleh Kosong !!! Wajib Di Isi' 
                        }
                    }
                },
                typePembangunanedit: {
                    validators: {
                        notEmpty: {
                            message: 'Tidak Boleh Kosong !!! Wajib Di Isi' 
                        }
                    }
                },
                blok1edit: {
                    validators: {
                        notEmpty: {
                            message: 'Tidak Boleh Kosong !!! Wajib Di Isi' 
                        }
                    }
                },
                jmlunitedit: {
                    validators: {
                        notEmpty: {
                            message: 'Jumlah Unit Tidak Boleh Kosong !!! Wajib Di isi'
                        },
                        callback: {
                            callback: function(value, validator, $field) {
                                if (value === '') {
                                    return true;
                                }
                                // Nama lengkap tidak boleh mengandung simbol
                                if (value.search(/^[0-9 Unit]+$/) < 0) {
                                    return {
                                        valid: false,
                                        message: 'Jumlah Proyek tidak boleh mengandung Huruf Atau Simbol'
                                    }
                                }
                                // Jika Nilai nya 0
                                if (value === '0 Unit') {
                                    return {
                                        valid: false,
                                        message: 'Jumlah Unit Tidak Boleh 0'
                                    }
                                }
                                return true;
                            }
                        }
                    }
                },
                lokasiproyekedit: {
                    validators: {
                        notEmpty: {
                            message: 'Lokasi Proyek Tidak Boleh Kosong !!! Wajib Di isi'
                        },
                        callback: {
                            callback: function(value, validator, $field) {
                                if (value === '') {
                                    return true;
                                }
                                //lokasi proyek kurang dari 10 karakter
                                if (value.length < 10) {
                                    return {
                                        valid: false,
                                        message: 'Minimal 10 karakter'
                                    }
                                }
                                // Lokasi Proyek Lebih Dari 200 karakter
                                if (value.length > 200) {
                                    return {
                                        valid: false,
                                        message: 'Jika Alamat Lebih Dari 200 Karakter Silahkan Di singkat'
                                    }
                                }
                                return true;
                            }
                        }
                    }
                },
                dikerjakanedit: {
                    validators: {
                        notEmpty: {
                            message: 'Tidak Boleh Kosong !!! Wajib Di Isi' 
                        }
                    }
                },                
                wpawaledit: {
                    validators: {
                        notEmpty: {
                            message: 'Tidak Boleh Kosong !!! Wajib Di Isi' 
                        },
                        date: {
                            message: 'Format tanggal Salah',
                            format: 'DD/MM/YYYY'
                        },
                        callback: {
                            callback: function(value, validator, $field) {
                                var tanggal = $('input[name="wpakhiredit"]').val().substr(0,2);
                                var bulan = $('input[name="wpakhiredit"]').val().substr(3,2);
                                var tahun = $('input[name="wpakhiredit"]').val().substr(6);
                                if (value === '') {
                                    return true;
                                }
                                if (value.search(/^[0-9/]+$/) < 0) {
                                    return {
                                        valid: false,
                                        message: 'Tidak boleh mengandung Huruf Atau Simbol kecuali simbol /'
                                    }
                                }
                                if (value.substr(0,2) > tanggal && value.substr(3,2) > bulan && value.substr(6) > tahun) {
                                    return {
                                        valid: false,
                                        message: 'Tanggal awal melebihi tanggal akhir'
                                    }
                                }
                                if (value.substr(0,2) <= tanggal && value.substr(3,2) <= bulan && value.substr(6) > tahun) {
                                    return {
                                        valid: false,
                                        message: 'Tanggal awal melebihi tanggal akhir'
                                    }
                                }
                                if (value.substr(0,2) <= tanggal && value.substr(3,2) > bulan && value.substr(6) >= tahun) {
                                    return {
                                        valid: false,
                                        message: 'Tanggal awal melebihi tanggal akhir'
                                    }
                                }
                                if (value.substr(0,2) > tanggal && value.substr(3,2) >= bulan && value.substr(6) >= tahun) {
                                    return {
                                        valid: false,
                                        message: 'Tanggal awal melebihi tanggal akhir'
                                    }
                                }
                                return true;
                            }
                        },
                    }
                },                
                wpakhiredit: {
                    validators: {
                        notEmpty: {
                            message: 'Tidak Boleh Kosong !!! Wajib Di Isi' 
                        },
                        date: {
                            message: 'Format tanggal Salah',
                            format: 'DD/MM/YYYY'
                        },
                        callback: {
                            callback: function(value, validator, $field) {
                                var tanggal = $('input[name="wpawaledit"]').val().substr(0,2);
                                var bulan = $('input[name="wpawaledit"]').val().substr(3,2);
                                var tahun = $('input[name="wpawaledit"]').val().substr(6);
                                if (value === '') {
                                    return true;
                                }
                                if (value.search(/^[0-9/]+$/) < 0) {
                                    return {
                                        valid: false,
                                        message: 'Tidak boleh mengandung Huruf Atau Simbol kecuali simbol /'
                                    }
                                }
                                if (value.substr(0,2) < tanggal && value.substr(3,2) < bulan && value.substr(6) < tahun) {
                                    return {
                                        valid: false,
                                        message: 'Tanggal Akhir Tidak Boleh Kurang Dari Tanggal Awal'
                                    }
                                }
                                if (value.substr(0,2) >= tanggal && value.substr(3,2) >= bulan && value.substr(6) < tahun) {
                                    return {
                                        valid: false,
                                        message: 'Tanggal Akhir Tidak Boleh Kurang Dari Tanggal Awal'
                                    }
                                }
                                if (value.substr(0,2) >= tanggal && value.substr(3,2) < bulan && value.substr(6) <= tahun) {
                                    return {
                                        valid: false,
                                        message: 'Tanggal Akhir Tidak Boleh Kurang Dari Tanggal Awal'
                                    }
                                }
                                if (value.substr(0,2) < tanggal && value.substr(3,2) <= bulan && value.substr(6) <= tahun) {
                                    return {
                                        valid: false,
                                        message: 'Tanggal Akhir Tidak Boleh Kurang Dari Tanggal Awal'
                                    }
                                }
                                return true;
                            }
                        }
                    }
                },
            }
        })
        .on('success.field.bv', function(e, data) {
            var $parent = data.element.parents('.form-group');
            // Mengahpus class sukses
            $parent.removeClass('has-success');
            // menyembunyikan icon sukses
            $parent.find('.form-control-feedback[data-bv-icon-for="' + data.field + '"]').hide();
        });
    $('input[name="wpawaledit"]').on('change show', function(e) {//revalidasi edit datepiker waktu awal
        $('#frmproyekedit').bootstrapValidator('revalidateField', 'wpawaledit');
        $('#frmproyekedit').bootstrapValidator('revalidateField', 'wpakhiredit');
    });
    $('input[name="wpakhiredit"]').on('change show', function(e) {//revalidasi edit datepiker waktu Akhir
        $('#frmproyekedit').bootstrapValidator('revalidateField', 'wpakhiredit');
        $('#frmproyekedit').bootstrapValidator('revalidateField', 'wpawaledit');
    });
//fungsi get data dari database
    getProyek();
    function getProyek(){//get proyek
        $.ajax({
            type     : 'ajax',
            url      : 'GetProyek',
            async    : true,
            dataType : 'json',
            success  : function(data){
                proyek.clear().draw();
                for(i=0; i < data.length; i++){
                    proyek.rows.add([
                            [
                                data[i].namaProyek,
                                data[i].nomorSPK,
                                data[i].nama,
                                data[i].jumlah+' Unit',
                                'Rp '+formatNumber(data[i].total)+' ,-',
                                data[i].lokasi_proyek,
                                data[i].namaCompany,
                                '<button type="button" class="btn btn-outline-info btn-rounded btn-icon btn-sm ViewProyek" id="'+data[i].pembangunan_id+'" data-toggle="modal" data-target="#view" >'+
                                    '<i class="ti-eye"></i>'+
                                '</button>'+
                                '<button type="button" class="btn btn-outline-success btn-rounded btn-icon btn-sm editProyek" id="'+data[i].pembangunan_id+'" data-toggle="modal" data-target="#edit">'+
                                    '<i class="ti-pencil"></i>'+
                                '</button>'+
                                '<button type="button" class="btn btn-outline-danger btn-rounded btn-icon btn-sm btnHapusProyek" data-target="#hapusproyek" data-toggle="modal" '+
                                    'nmProyek="'+data[i].namaProyek+'"'+
                                    'typeP="'+data[i].nama+'"'+
                                    'idProyek="'+data[i].proyek_id+'"'+
                                    'idpembangunan="'+data[i].pembangunan_id+'"'+
                                    'jml="'+data[i].blokB+'">'+
                                    '<i class="ti-trash"></i>'+
                                '</button>'
                            ]
                        ]).draw();
                }
            }
        });
    }
    function getpembangunan(){//get pembangunan
        $.ajax({
            type     : 'ajax',
            url      : 'getpembangunan',
            async    : true,
            dataType : 'json',
            success  : function(data){
                var html = '';
                var jml = 0;
                var i;
                for(i=0; i < data.length; i++){
                    html += '<tr>'+
                                '<td>'+data[i].nama+'</td>'+
                                '<td class="text-center">Rp. '+formatNumber(data[i].harga)+' ,-</td>'+
                                '<td class="text-center">'+data[i].jumlah+' Unit</td>'+
                                '<td class="text-center">'+
                                    '<a class="btn btn-xs btn-danger text-white hapuspembangunan" id="'+data[i].pembangunan_id+'">'+
                                        '<i class="fa fa-trash fa-xs"></i>'+
                                    '</a>'+
                                '</td>'+
                            '</tr>';
                    jml += parseInt(data[i].total);
                }
                $('#tampilPembangunan').html(html);
                $('input[name="nilaikontrak"]').val(formatNumber(parseInt(jml)));
                $('#frmproyek').bootstrapValidator('revalidateField', 'nilaikontrak');
            }
        });
    }
    function getBlok(){
        $.ajax({
            type     : 'ajax',
            url      : 'getBlok',
            async    : true,
            dataType : 'json',
            success  : function(data){
                var html = '';
                var i;
                for(i=0; i < data.length; i++){
                    html += '<tr>'+
                                '<td>'+data[i].blok+'</td>'+
                                '<td>'+data[i].nomor+'</td>'+
                                '<td class="text-center">'+
                                    '<a href="javascript:;" class="btn btn-xs btn-danger text-white hapusblok" blokID="'+data[i].blok_id+'">'+
                                        '<i class="fa fa-trash fa-xs"></i>'+
                                    '</a>'+
                                '</td>'+
                            '</tr>';
                }
                $('#tampilblok').html(html);
                $('#jmlunit').val(data.length);
                $('#frmPembangunan').bootstrapValidator('revalidateField', 'jmlunit');
            }
        });
    }
    function getBlok2()
    {
        var id = $('input[name="idpembangunan"]').val();
        var status = $('input[name="statusTombol"]').val();
        $.ajax({
            type     : 'post',
            url      : 'blokPerIDPembangunan',
            async    : true,
            dataType : 'json',
            data: {id:id},
            success:function(data){
                if (status == 'Lihat') {
                    blok.clear().draw();
                    for(i=0; i < data.length; i++){
                        blok.rows.add([
                                [
                                    i+1,
                                    data[i].blok,
                                    data[i].nomor
                                ]
                            ]).draw();
                    }
                }else if(status == 'Edit') {
                    var hrg = $('input[name="harga"]').val();
                    $('input[name="jmlunitedit"]').val(data.length+' Unit');
                    $('input[name="nilaikontrakedit"]').val('Rp. '+formatNumber(data.length*hrg)+' ,-');
                    blokEdit.clear().draw();
                    for(i=0; i < data.length; i++){
                        blokEdit.rows.add([
                                [
                                    data[i].blok,
                                    data[i].nomor,
                                    "<a class='btn btn-xs btn-danger text-white hapusBlokPadaEdit' id='"+data[i].blok_id+"'>"+
                                        "<i class='fa fa-trash fa-xs'></i>"+
                                    "</a>"
                                ]
                            ]).draw();
                    }
                }
                
            }
        });
    }
//fungsi untuk reset data dari database
    function Reset(){
        $.ajax({
            type     : 'ajax',
            url      : 'Reset',
            async    : true,
            dataType : 'json',
            success  : function(data){
                getpembangunan();
                getBlok();  
            }
        });
    }
//fungsi Tambah
    $('.btntambah').click(function(){//tombol tambah data proyek
        $('#frmproyek').bootstrapValidator("resetForm",true);//reset form tambah proyek
        scrollTopModal();//dan posisi scroll di atas
        Reset();//reset data pembangunan dan data blok dari database
    });
    $('.btnpembangunan').click(function(){//tombol tambah pembangunan di klik
        $('#frmPembangunan').bootstrapValidator('resetForm',true);//reset form tambah pembangunan
        getBlok();
        $('#tambahProyek').modal('hide');
    });
    $('.btnblokadd').click(function(){//tombol tambah data blok
        $('input[name="statusTombol"]').val('');//untuk reset status tombol apakh statusnya edit atau tambah
        $('#btnblokEdit').addClass('hide');//menyembunyikan tombol simpan edit blok
        $('#btnblok').removeClass('hide');//dan memunculkan tombl simpan tambah blok
        resetClone();//reset clone input nomor
        $('#pembangunan').modal('hide');
        $('#btnTBHAN').removeClass('hide');
    });
    //fungsi simpan blok
    $('#btnblok').click(function(){//tombol simpan tambah pada form blok 
        if ($('input[name="blok"]').val() == "" || $('input[name="nomor1"]').val() == "") {//cek apakah ada yang kosong
            $('#frmblok').bootstrapValidator('revalidateField', 'blok');//jika ada revalidasi blok
            $('#frmblok').bootstrapValidator('revalidateField', 'nomor1');//jika ada revalidasi blok hyang pertama
        }else{
            $.ajax({
                url: 'saveblok',
                type: 'post',
                data: $('#frmblok').serialize(),//merealisasi form
                success:function(data){
                    $('#toggleBlok').modal('toggle');//close form
                    getBlok();//tampilkan data
                    $('#pembangunan').modal('show');
                }
            });
        }
    });
    //fungsi hapus blok
    $('#tampilblok').on('click','.hapusblok',function(){ //fungsi hapus blok
        var id = $(this).attr('blokID');
        $('input[name="statusTombol"]').val('');
        $.ajax({
            url: 'hapusblok',
            type: 'POST',
            datatype: 'JSON',
            data: {id:id},
            success:function(data){
                getBlok();
            }
        });
    });
    //fungsi simpan pembangunan
    $('#tambahPembangunan').click(function(){//tombol simpan tambah pembangunan
        if ($('#typePembangunan').val() == "" || $('#jmlunit').val() == "0") {
            $('#frmPembangunan').bootstrapValidator('revalidateField', 'typePembangunan');
            $('#frmPembangunan').bootstrapValidator('revalidateField', 'jmlunit');
        }else{
            var type = $('#typePembangunan').val();
            var jumlah = $('#jmlunit').val();
            var harga = $('#typePembangunan option:selected').attr('harga');
            $.ajax({
                url: 'savePembangunan',
                type: 'post',
                data: {type:type,jumlah:jumlah,harga:harga},
                success:function(data){
                    $('#pembangunan').modal('toggle');
                    getpembangunan();
                    $('#tambahProyek').modal('show');
                }
            });
        }
    });
    //fungsi hapus pembangunan
    $('#tampilPembangunan').on('click','.hapuspembangunan',function(){
        var id = $(this).attr('id');
        $.ajax({
            url: 'hapuspembangunan',
            type: 'POST',
            datatype: 'JSON',
            data: {id:id},
            success:function(data){
                getpembangunan();  
            }
        });
    });
    // fungsi simpan proyek
    $('#tambah').click(function(){//tombol simpan pada form proyek
        var namaproyek = $('[name="namaproyek"]').val();
        var spk = $('[name="spk"]').val();
        var nilaikontrak = $('[name="nilaikontrak"]').val();
        var lokasiproyek = $('[name="lokasiproyek"]').val();
        var dikerjakan = $('[name="dikerjakan"]').val();
        var wpawal = $('[name="wpawal"]').val();
        var wpakhir = $('[name="wpakhir"]').val();
        var ket = $('[name="ket"]').val();
        if (namaproyek == '' || spk == '' || nilaikontrak == '' || lokasiproyek == '' || dikerjakan == '' || wpawal == '' || wpakhir == '') {
            $('#frmproyek').bootstrapValidator('revalidateField', 'namaproyek');
            $('#frmproyek').bootstrapValidator('revalidateField', 'spk');
            $('#frmproyek').bootstrapValidator('revalidateField', 'nilaikontrak');
            $('#frmproyek').bootstrapValidator('revalidateField', 'lokasiproyek');
            $('#frmproyek').bootstrapValidator('revalidateField', 'dikerjakan');
            $('#frmproyek').bootstrapValidator('revalidateField', 'wpawal');
            $('#frmproyek').bootstrapValidator('revalidateField', 'wpakhir');
        }else{
            $.ajax({
                type     : 'post',
                url      : 'saveproyek',
                async    : true,
                dataType : 'json',
                data:$('#frmproyek').serialize(),
                success:function(data){
                    $('#tambahProyek').modal('toggle');
                    getProyek();
                    swal({
                        title: "Good Job !",
                        text: "Data Berhasil Di Tambahkan",
                        icon: "success"
                    });  
                }
            });
        }
    });
    //fungsi reset form tambah
    $('.btnresetAdd').click(function(){//tombol reset pada form tambah proyek
        $('#frmproyek').bootstrapValidator('resetForm',true);
        scrollTopModal();
    });
//fungsi untuk hapus
    $('#example').on('click','.btnHapusProyek',function(){//ketika tombol hapus di klik maka lempar data ke modal confirmasi
        $('#jdlhps').html($(this).attr('nmProyek'));
        $('#jdlhps1').html($(this).attr('typeP'));
        $('#btn_hapus').attr('idProyek',$(this).attr('idProyek'));
        $('#btn_hapus').attr('idpembangunan',$(this).attr('idpembangunan'));
    });
    $('.btn_hapus').click(function(){//tombol yes pada modal confirmasi hapus
        var id1 = $(this).attr('idpembangunan');
        var id2 = $(this).attr('idproyek');
        $.ajax({
            url: 'hapusproyek',
            type: 'POST',
            datatype: 'JSON',
            data: {id1:id1,id2:id2},
            success:function(data){
                $('#hapusproyek').modal('hide');
                getProyek(); 
                swal({
                    title: "Good Job !",
                    text: "Satu Data Berhasil Di hapus",
                    icon: "success"
                });   
            }
        });
    });
//fungsi untuk lihat detail
    $('#example').on('click','.ViewProyek',function(){//tombol view proyek
        var id = $(this).attr('id');
        $.ajax({
            type     : 'post',
            url      : 'getProyekByID',
            async    : true,
            dataType : 'json',
            data: {id:id},
            success:function(data){
                $('#namaView').html('Data Proyek '+data[0].namaProyek+' Type '+data[0].nama+'');
                $('#np').html(data[0].namaProyek);
                $('.spk').html(data[0].nomorSPK);
                $('#type').html(data[0].nama);
                $('#jml').html(data[0].jumlah+' Unit');
                $('#nk').html('Rp. '+formatNumber(data[0].total)+' ,-');
                $('#lp').html(data[0].lokasi_proyek);
                $('#dko').html(data[0].namaCompany);
                $('#wp').html(data[0].wp_awal+' s/d '+data[0].wp_akhir);
                $('#ket').html(data[0].ket);
                $('#bk').html('<a id="'+data[0].pembangunan_id+'" data-target="#detailblok" data-toggle="modal" class="btn btn-xs btn-info text-white detailViewBlok">Lihat Detail Blok >>> </a>');
            }
        });
    });
    $('#tableViewproyek').on('click','.detailViewBlok',function(){//tombol detail view blok
        var id = $(this).attr('id');
        $('input[name="statusTombol"]').val('Lihat');
        $('input[name="idpembangunan"]').val(id);
        getBlok2();
    });
//fungsi untuk edit data proyek
    $('#example').on('click','.editProyek',function(){//tombol edit 
        $('#frmproyekedit').bootstrapValidator('resetForm',true);
        var id = $(this).attr('id');
        $.ajax({
            type     : 'post',
            url      : 'getProyekByID',
            async    : true,
            dataType : 'json',
            data: {id:id},
            success:function(data){
                $('input[name="statusTombol"]').val('Edit');
                $('input[name="idpembangunan"]').val(data[0].pembangunan_id);
                $('input[name="harga"]').val(data[0].harga);
                $('#frmproyekedit').bootstrapValidator('resetForm',true);
                $('#namaViewedit').html('Edit Data Proyek '+data[0].namaProyek+' Type '+data[0].nama);
                $('input[name="namaproyekedit"]').val(data[0].namaProyek);
                $('input[name="spkedit"]').val(data[0].nomorSPK);
                $('#typePembangunanedit').val(data[0].bobot_id);
                getBlok2();
                $('input[name="jmlunitedit"]').val(data[0].jumlah+' Unit');
                $('input[name="nilaikontrakedit"]').val('Rp. '+formatNumber(data[0].total)+' ,-');
                $('#lokasiproyekedit').html('<textarea class="form-control form-control-sm" id="lokEdit" name="lokasiproyekedit">'+data[0].lokasi_proyek+'</textarea>');
                $('#frmproyekedit').bootstrapValidator('addField', "lokasiproyekedit");
                $('#dikerjakanedit').val(data[0].company_id);
                $('input[name="wpawaledit"]').val(data[0].wp_awal);
                $('input[name="wpakhiredit"]').val(data[0].wp_akhir);
                $('#ketedit').html('<textarea class="form-control form-control-sm" id="kEdit" name="ketedit">'+data[0].ket+'</textarea>');
                $('#saveEditProyek').attr('idP',data[0].proyek_id);
                $('.jdlConf').html(data[0].namaPekerjaan);
            }
        });
    });
    $('#tbhblokedit').click(function(){//tombol untuk tambah data blok pada form edit
        $('input[name="statusTombol"]').val('Edit');
        $('#btnblokEdit').removeClass('hide');
        $('#btnblok').addClass('hide');
        resetClone();
    });
    $('#btnblokEdit').click(function(){//tombol simpan data blok pada form edit
        if ($('input[name="blok"]').val() == "" || $('input[name="nomor1"]').val() == "") {
            $('#frmblok').bootstrapValidator('revalidateField', 'blok');
            $('#frmblok').bootstrapValidator('revalidateField', 'nomor1');
        }else{
            $.ajax({
                url: 'saveblok',
                type: 'post',
                data: $('#frmblok').serialize(),
                success:function(data){
                    $('#toggleBlok').modal('toggle');
                    getBlok2();
                    getProyek();
                }
            });
        }
    });
    $('#tableBlokEdit').on('click','.hapusBlokPadaEdit',function(){//tombol untuk hapus data blok pada form edit
        var id = $(this).attr('id');
        var idP = $('input[name="idpembangunan"]').val();
        var hrg = $('input[name="harga"]').val();
        var jml = $('input[name="statusJumlah"]').val();
        $.ajax({
            type     : 'post',
            url      : 'hapusBlokPerID',
            async    : true,
            dataType : 'json',
            data: {id:id,idP:idP,hrg:hrg},
            success:function(data){
                getBlok2();
                getProyek();
            }
        });
    });
    $('#typePembangunanedit').change(function(){//ketika user memilih pembangunan pada form edit, maka akan keluar Konfirmasi
        var value = $('option:selected', this).val();
        if (value != '') {
            $('#changeType').modal('show');
            $('#iyaSama').attr('nama',$('option:selected', this).attr('nama'));
            $('#iyaSama').attr('harga',$('option:selected', this).attr('harga'));
        }
    });
    $('#iyaSama').click(function(){//tombol konfirmasi yang menyatakan data blok sama dengan yang sebelumnya
        $('.jdlConf').html($(this).attr('nama'));
        var hrg = $(this).attr('harga');
        var jml = $('input[name="jmlunitedit"]').val();
        var convert = jml.replace(' Unit','');
        $('input[name="nilaikontrakedit"]').val('Rp. '+formatNumber(hrg*convert)+' ,-');
    });
    //tombol konfirmasi yang menyatakan data blok Tidak sama dengan yang sebelumnya, 
    //dan akan menghapus semua data yang berhubungan dengan yang sebelumnya
    $('.hapusAllBlokEdit').click(function(){
        var id = $('input[name="idpembangunan"]').val();
        $('#changeType').modal('hide');
        $.ajax({
            type     : 'post',
            url      : 'hapusAllBlokEdit',
            async    : true,
            dataType : 'json',
            data: {id:id},
            success:function(data){
                getBlok2();
                getProyek();
            }
        });
    });
    $('.btnresetAddEdit').click(function(){//tombol reset pada form edit
        $('#frmproyekedit').bootstrapValidator("resetForm",true);
        $('#lokasiproyekedit').html('<textarea class="form-control form-control-sm" name="lokasiproyekedit"></textarea>');
        $('#ketedit').html('<textarea class="form-control form-control-sm" name="ketedit"></textarea>');
        $('#frmproyekedit').bootstrapValidator('addField', 'lokasiproyekedit');
        scrollTopModal();
    }); 
    $('#saveEditProyek').click(function(){//tombol simpan edit data proyek
        var idP = $(this).attr('idP');
        var id = $('input[name="idpembangunan"]').val();
        var nm = $('input[name="namaproyekedit"]').val();
        var spk = $('input[name="spkedit"]').val();
        var type = $('#typePembangunanedit').val();
        var jml = $('input[name="jmlunitedit"]').val();
        var nK = $('input[name="nilaikontrakedit"]').val();
        var lok = $('#lokEdit').val();
        var DKO = $('#dikerjakanedit').val();
        var awl = $('input[name="wpawaledit"]').val();
        var akh = $('input[name="wpakhiredit"]').val();
        var ket = $('#kEdit').val();
        var jml1 = jml.replace(' Unit','');
        var nk1 = nK.replace(/[Rp. ,-]/g,'');
        if (nm != '' || spk != '' || type != '' || jml != '0 Unit' || nk != '' || lok != '' || DKO != '' || awl != '' || akh != '') {
            $.ajax({
                type     : 'post',
                url      : 'editproyek',
                async    : true,
                dataType : 'json',
                data: {idP:idP, id:id, nm:nm, spk:spk, type:type, lok:lok, DKO:DKO, awl:awl, akh:akh, ket:ket, jml:jml1, nk:nk1},
                success:function(data){
                    $('#edit').modal('hide');
                    $('#info').show('slow').html('<div class="alert alert-success text-center">Berhasil Merubah Data !!!!</div>').fadeOut(2000); 
                    getProyek();
                    swal({
                        title: "Good Job !",
                        text: "Data Berhasil Di Edit",
                        icon: "success"
                    }); 
                }
            });
        }
    });

    $('#exporProyek').click(function(){
        window.open('exporProyek', '_blank');
    });
    $('#closeBlok').click(function(){
        $('#pembangunan').modal('show');
    });
});
</script>
