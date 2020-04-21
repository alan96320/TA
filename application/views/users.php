<?=$this->session->tempdata('message');?>

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
                        <h4 class="font-weight-bold mb-0">DATA USERS</h4>
                    </div>
                    <div>
                        <button type="button" id="tambah" class="btn btn-primary btn-icon-text btn-rounded" data-toggle="modal" data-target="#TambahUsers">
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
                        <button type="button" id="exportUser" class="btn btn-outline-primary btn-icon-text btn-sm" style="margin-bottom: -30px;">
                            <i class="ti-export  btn-icon-prepend"></i> <span class="menu-title">Export PDF</span>
                        </button>
                        <div class="table-responsive">
                            <table id="example" class="table table-hover table-sm" style="width:100%" >
                                <thead style="font-size: 12px" class="table-primary">
                                    <tr>
                                        <th class="text-center align-middle" height="40px">Nama Lengkap</th>
                                        <th class="text-center align-middle">Username</th>
                                        <th class="text-center align-middle">Alamat</th>
                                        <th class="text-center align-middle">Nomor Telepon</th>
                                        <th class="text-center align-middle">Perusahaan</th>
                                        <th class="text-center align-middle">Jabatan</th>
                                        <th class="text-center align-middle">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($row->result() as $key => $data) { ?>
                                        <tr>
                                            <td><?=strlen($data->namaLengkap) > 17 ? substr($data->namaLengkap, 0,14).'...' : $data->namaLengkap ?></td>
                                            <td><?=strlen($data->username) > 12 ? substr($data->username, 0,9).'...' : $data->username ?></td>
                                            <td><?=strlen($data->alamat) > 34 ? substr($data->alamat, 0,31).'...' : $data->alamat ?></td>
                                            <td class="text-center"><?=strlen($data->noTelp) > 12 ? substr($data->noTelp, 0,9).'...' : $data->noTelp ?></td>
                                            <td><?=strlen($data->namaCompany) > 25 ? substr($data->namaCompany, 0,22).'...' : $data->namaCompany ?></td>
                                            <td>
                                                <?php
                                                    if ($data->level_user == 1) {
                                                        echo "Direktur";
                                                    }elseif ($data->level_user == 2) {
                                                        echo "Admin";
                                                    }elseif ($data->level_user == 3) {
                                                        echo "Officer";
                                                    }elseif ($data->level_user == 4) {
                                                        echo "Engineering";
                                                    }elseif ($data->level_user == 5) {
                                                        echo "Kadiv";
                                                    }elseif ($data->level_user == 6) {
                                                        echo "Pimpro";
                                                    }elseif ($data->level_user == 7) {
                                                        echo "Finance";
                                                    }
                                                ?> 
                                             </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-outline-info btn-rounded btn-icon btn-sm lihat" id="<?=$data->user_id?>" data-toggle="modal" data-target="#viewUser" >
                                                    <i class="ti-eye"></i>                          
                                                </button>
                                                <button type="button" class="btn btn-outline-success btn-rounded btn-icon btn-sm edit" id="<?=$data->user_id?>" data-toggle="modal" data-target="#edituser">
                                                    <i class="ti-pencil"></i>                          
                                                </button>
                                                <button type="button" class="btn btn-outline-danger btn-rounded btn-icon btn-sm hapus" id="<?=$data->user_id?>" namaTTD="<?=$data->ttd?>" nama="<?=$data->username?>">
                                                    <i class="ti-trash"></i>                          
                                                </button>
                                            </td>
                                        </tr>
                                    <?php } ?>
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

<!-- Modal Form untuk Tambah Data user -->
<div class="modal fade" id="TambahUsers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document" style="width: 100%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle" style="font-family: times new roman">Tambah Data Users</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label style="color: red; font-size: 12px; font-family: times new roman;" >Wajib Di Isi *</label>
                <form action="addUsers" method="post" id="frmUsers" class="form-sample" style="font-family: times new roman" enctype="multipart/form-data">
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label form-control-sm" >Nama Lengkap *</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <input placeholder="Nama Lengkap" class="form-control form-control-sm"  type="text" name="namaLengkap">
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label  form-control-sm" >Jenis Kelamin *</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <select class="form-control form-control-sm " name="jenisKelamin">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Perempuan">Perempuan</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label  form-control-sm">Tempat Lahir *</label>
                        <div class="col-sm-8 col-md-8">
                            <input type="text" placeholder="Tempat Lahir" class="form-control form-control-sm" name="tempat" />
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label  form-control-sm">Tanggal Lahir *</label>
                        <div class="col-sm-8 col-md-8">
                            <input type="text" class="form-control tgl form-control-sm input-group" name="tanggal" style="width: 100px; " readonly/>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label  form-control-sm" >Agama *</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <select class="form-control form-control-sm" name="agama">
                                <option value="">Pilih Agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen Protestan">Kristen Protestan</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Kong Hu Cu">Kong Hu Cu</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label  form-control-sm" >Status</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <select class="form-control form-control-sm" name="status">
                                <option value="">Pilih Status</option>
                                <option value="Single">Single</option>
                                <option value="Menikah">Menikah</option>
                                <option value="Single parent">Single parent</option> 
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label  form-control-sm" >Pendidikan Terakhir *</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <select class="form-control form-control-sm" name="Pendidikan">
                                <option value="">Pilih Pendidikan</option>
                                <option value="Tidak Sekolah">Tidak Sekolah</option>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA">SMA</option>
                                <option value="Diploma 3 (D3)">Diploma 3 (D3)</option>
                                <option value="Diploma 4 (D4)">Diploma 4 (D4)</option>
                                <option value="Strata 1 (S1)">Strata 1 (S1)</option>
                                <option value="Strata 2 (S2)">Strata 2 (S2)</option>
                                <option value="Strata 3 (S3)">Strata 3 (S3)</option> 
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label  form-control-sm" >Alamat *</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <textarea class="form-control form-control-sm" name="alamat"></textarea>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label  form-control-sm" >Nomor Telepon *</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <input placeholder="Nomor Telepon" class="form-control form-control-sm"  type="text" name="nomor">
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label  form-control-sm" >Email *</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <input placeholder="Email@gmail.com" class="form-control form-control-sm"  type="text" name="email">
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label  form-control-sm" >WhatsApp</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <input placeholder="Nomor WhatsApp" class="form-control form-control-sm"  type="text" name="WhatsApp">
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label  form-control-sm" >Nama Perusahaan *</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <select class="form-control PerusahaanAdd form-control-sm" name="Perusahaan">
                                <option value="">Pilih Perusahaan</option>
                                <?php foreach ($company->result() as $key => $data) { ?>
                                        <option value="<?=$data->company_id?>" levelCompany="<?=$data->level?>" ><?=$data->namaCompany?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label  form-control-sm" >Jabatan *</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <select class="form-control jabatan form-control-sm" name="Jabatan">
                                <option value="">Pilih Jabatan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label  form-control-sm" >Tanda Tangan</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <input name="ttd" type="file" id="image-source" >
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label  form-control-sm" ></label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer" id="priview" style="display: none;">
                            <img src="" id="image-preview" width="200px" height="100px" />
                        </div>
                    </div>
                    <div style="margin-bottom: 20px;margin-right: 20px; font-family: times new roman" class="float-right">
                        <button type="reset" class="btn btn-primary btn-sm "><i class="fa fa-redo fa-fw"></i> Reset</button>
                        <button type="submit" class="btn btn-primary btn-sm text-white" id="tambah"><i class="fa fa-save fa-fw"></i> Save</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>

<!-- Modal Form untuk edit Data user  -->
<div class="modal fade" id="edituser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document" style="width: 100%">
        <div class="modal-content" style="width: 600px">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle" style="font-family: times new roman">Edit Data Users</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label style="color: red; font-size: 12px; font-family: times new roman;">Wajib Di Isi *</label>
                <form action="editUsers" method="post" id="frmEditUsers" class="form-horizontal frmEditUsers" style="font-family: times new roman" enctype="multipart/form-data">
                   
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label  form-control-sm" >Nama Lengkap *</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <input placeholder="Nama Lengkap" class="form-control form-control-sm"  type="text" name="namaLengkapEdit" id="namaLengkapEdit">
                        </div>
                    </div>
                    <div class="form-group row row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label  form-control-sm" >Jenis Kelamin *</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <select class="form-control form-control-sm" name="jenisKelaminEdit" id="jenisKelaminEdit">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value='Perempuan'>Perempuan</option>
                                <option value='Laki-Laki'>Laki-Laki</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label  form-control-sm">Tempat Lahir*</label>
                        <div class="col-sm-8 col-md-8">
                            <input type="text" placeholder="Tempat Lahir" class="form-control form-control-sm" name="tempatEdit" id="tempatEdit" />
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label  form-control-sm">Tanggal Lahir *</label>
                        <div class="col-md-8 col-sm-8">
                            <input type="text" class="form-control form-control-sm input-group" name="tanggalEdit" id="tanggalEdit" style="width: 100px; " readonly />
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label  form-control-sm" >Agama *</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <select class="form-control form-control-sm" name="agamaEdit" id="agamaEdit">
                                <option value="">Pilih Agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen Protestan">Kristen Protestan</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Kong Hu Cu">Kong Hu Cu</option>                            
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label  form-control-sm" >Status</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <select class="form-control form-control-sm" name="statusEdit" id="statusEdit">
                                <option value="">Pilih Status</option>
                                <option value="Single">Single</option>
                                <option value="Menikah">Menikah</option>
                                <option value="Single parent">Single parent</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label  form-control-sm" >Pendidikan Terakhir *</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <select class="form-control form-control-sm" name="PendidikanEdit" id="PendidikanEdit">
                                <option value="">Pilih Pendidikan</option>
                                <option value="Tidak Sekolah">Tidak Sekolah</option>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA">SMA</option>
                                <option value="Diploma 3 (D3)">Diploma 3 (D3)</option>
                                <option value="Diploma 4 (D4)">Diploma 4 (D4)</option>
                                <option value="Strata 1 (S1)">Strata 1 (S1)</option>
                                <option value="Strata 2 (S2)">Strata 2 (S2)</option>
                                <option value="Strata 3 (S3)">Strata 3 (S3)</option> 
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label  form-control-sm" >Alamat *</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <div id="alamatEdit"></div>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label  form-control-sm" >Nomor Telepon *</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <input placeholder="Nomor Telepon" class="form-control form-control-sm"  type="text" name="nomorEdit" id="nomorEdit">
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label  form-control-sm" >Email *</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <input placeholder="Email@gmail.com" class="form-control form-control-sm"  type="text" name="emailEdit" id="emailEdit">
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label  form-control-sm" >WhatsApp</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <input placeholder="Nomor WhatsApp" class="form-control form-control-sm"  type="text" name="WhatsAppEdit" id="WhatsAppEdit">
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label  form-control-sm" >Nama Perusahaan *</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <select class="form-control form-control-sm Perusahaan" name="PerusahaanEdit" id="perusahaan">
                                <option value="">Pilih Perusahaan</option>
                                <?php foreach ($company->result() as $key => $dataC) { ?>
                                    <option value="<?=$dataC->company_id?>" levelCompany="<?=$dataC->level?>"><?=$dataC->namaCompany?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label  form-control-sm" >Jabatan *</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <select class="form-control form-control-sm jabatan" name="JabatanEdit" id="JabatanEdit">
                                <option value="">Pilih Jabatan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label  form-control-sm" >Username *</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <input placeholder="username" class="form-control form-control-sm"  type="text" name="username" id="username">
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label  form-control-sm" >Password</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <input placeholder="Jika tidak ingin merubah Password biarkan Kosong" class="form-control form-control-sm"  type="password" name="password">
                        </div>
                    </div>
                    <div id="getID"></div>
                    <div style="margin-bottom: 20px;margin-right: 20px; font-family: times new roman" class="float-right">
                        <button type="submit" class="btn btn-primary btn-sm text-white"><i class="fa fa-save fa-fw"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk view Data user  -->
<div class="modal fade" id="viewUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable" role="document" style="width: 100%">
        <div class="modal-content" style="width: 600px">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle" style="font-family: times new roman"> <h4 id="namaView"></h4> </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive-lg">
                    <table class="table" style="font-size: 14px;">
                        <thead>
                            <tr>
                                <th class="text-right align-middle" width="170px" style="border-bottom: 0px">Nama Lengkap :</th>
                                <td id="nl"></td>
                            </tr>
                            <tr>
                                <th class="text-right align-middle" width="170px" style="border-bottom: 0px; border-top: 0px">Jenis Kelamin :</th>
                                <td id="jk"></td>
                            </tr>
                            <tr>
                                <th class="text-right align-middle" width="170px" style="border-bottom: 0px; border-top: 0px">Tempat, Tanggal Lahir :</th>
                                <td id="ttl"></td>
                            </tr>
                            <tr>
                                <th class="text-right align-middle" width="170px" style="border-bottom: 0px; border-top: 0px">Agama :</th>
                                <td id="ag"></td>
                            </tr>
                            <tr>
                                <th class="text-right align-middle" width="170px" style="border-bottom: 0px; border-top: 0px">Status :</th>
                                <td id="st"></td>
                            </tr>
                            <tr>
                                <th class="text-right align-middle" width="170px" style="border-bottom: 0px; border-top: 0px">Pendidikan Terakhir :</th>
                                <td id="pt"></td>
                            </tr>
                            <tr>
                                <th class="text-right align-middle" width="170px" style="border-bottom: 0px; border-top: 0px">Alamat :</th>
                                <td id="al"></td>
                            </tr>
                            <tr>
                                <th class="text-right align-middle" width="170px" style="border-bottom: 0px; border-top: 0px">Nomor Telepon :</th>
                                <td id="nt"></td>
                            </tr>
                            <tr>
                                <th class="text-right align-middle" width="170px" style="border-bottom: 0px; border-top: 0px">Email :</th>
                                <td id="em"></td>
                            </tr>
                            <tr>
                                <th class="text-right align-middle" width="170px" style="border-bottom: 0px; border-top: 0px">WhatsApp :</th>
                                <td id="wa"></td>
                            </tr>
                            <tr>
                                <th class="text-right align-middle" width="170px" style="border-bottom: 0px; border-top: 0px">Nama Perusahaan :</th>
                                <td id="np"></td>
                            </tr>
                            <tr>
                                <th class="text-right align-middle" width="170px" style="border-bottom: 0px; border-top: 0px">Jabatan :</th>
                                <td id="jb"></td>
                            </tr>
                            <tr>
                                <th class="text-right align-middle" width="170px" style="border-bottom: 0px; border-top: 0px">Username :</th>
                                <td id="un"></td>
                            </tr>
                            <tr>
                                <th class="text-right align-middle" width="170px" style="border-bottom: 0px; border-top: 0px">Tanda Tangan :</th>
                                <td id="tt"></td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




<script type="text/javascript">
$(document).ready(function() {
    $('#welcome').fadeOut(2000);
    $('.bodyLoading').hide();
    $('#isiHalaman').show();

    const capitalize = (s) => {
      if (typeof s !== 'string') return ''
      return s.charAt(0).toUpperCase() + s.slice(1)
    }
    //fungsi untuk setting datatable
    $('#example').DataTable({
        "pageLength": 4,
        "lengthChange": false,
        columnDefs: [{ 
            orderable: false, 
            targets: '_all'
              
        }],
    });

    //fungsi untuk menampilkan tanggl menggunakan plugin dataepicker
    $('.tgl').datepicker({
        value: '31-12-1997',
        format: 'dd-mm-yyyy',
        uiLibrary: 'bootstrap4',
        autoclose: true,
        minDate: "01-01-1960",
        maxDate: "31-12-1998",
        selectOtherMonths: false,
    });
    $('#tanggalEdit').datepicker({
        uiLibrary: 'bootstrap4',
        format: "dd-mm-yyyy",
        autoclose: true,
        minDate: "01-01-1960",
        maxDate: "31-12-1998", 
        selectOtherMonths: false,       
    });

    //fungsi untuk menampilkan Jabatan sesuai dengan perusahaan yang di pilih
    $('.PerusahaanAdd').change(function(){
        var level=$('option:selected', this).attr('levelCompany');
        if (level == 2) {
            $('.jabatan').html(
                '<option value="">Pilih Jabatan</option>'+
                '<option value="1">Direktur</option>'+
                '<option value="2">Admin</option>'
                );
        }else if (level == 3) {
            $('.jabatan').html(
                '<option value="">Pilih Jabatan</option>'+
                '<option value="1">Direktur</option>'+
                '<option value="3">Officer</option>'+
                '<option value="4">Engineering</option>'+
                '<option value="5">Kadiv</option>'+
                '<option value="6">Pimpro</option>'+
                '<option value="7">Finance</option>'
            );
        }else{
            $('.jabatan').html('<option value="">Pilih Jabatan</option>');
        }
    });
    $('#perusahaan').change(function(){
        var level=$('option:selected', this).attr('levelCompany');
        if (level == 2) {
            $('.jabatan').html(
                '<option value="">Pilih Jabatan</option>'+
                '<option value="1">Direktur</option>'+
                '<option value="2">Admin</option>'
                );
        }else if (level == 3) {
            $('.jabatan').html(
                '<option value="">Pilih Jabatan</option>'+
                '<option value="1">Direktur</option>'+
                '<option value="3">Officer</option>'+
                '<option value="4">Engineering</option>'+
                '<option value="5">Kadiv</option>'+
                '<option value="6">Pimpro</option>'+
                '<option value="7">Finance</option>'
            );
        }else{
            $('.jabatan').html('<option value="">Pilih Jabatan</option>');
        }
    });

    //fungsi untuk mem validasi form tambah user
    $('#frmUsers')
        .bootstrapValidator({
            feedbackIcons: {
                valid: 'ti-check',
                invalid: 'ti-close',
                validating: 'ti-reload'
            },
            excluded: [':disabled'],
            fields: {
                namaLengkap: {
                    validators: {
                        notEmpty: {
                            message: 'Nama Lengkap Tidak Boleh Kosong !!! Wajib Di isi'
                        },
                        callback: {
                            message: 'Format Nama lengkap yang anda masukan tidak benar',
                            callback: function(value, validator, $field) {
                                if (value === '') {
                                    return true;
                                }

                                // Max panjang nama lengkap 30 karakter
                                if (value.length > 30) {
                                    return {
                                        valid: false,
                                        message: 'Jika Nama Lengkap lebih dari 30 karakter silahkan di singkat'
                                    };
                                }
                                // Nama lengkap tidak boleh mengandung huruf atau simbol
                                if (value.search(/^[a-z A-Z_\.]+$/) < 0) {
                                    return {
                                        valid: false,
                                        message: 'Nama lengkap tidak boleh mengandung huruf atau simbol'
                                    }
                                }
                                return true;
                            }
                        }
                    }
                },
                jenisKelamin: {
                    validators: {
                        notEmpty: {
                            message: 'Silahkan Pilih Salah Satu !!! Wajib Di Pilih' 
                        }
                    }
                },
                tempat: {
                    validators: {
                        notEmpty: {
                            message: 'Tempat Lahir Tidak Boleh Kosong !!! Wajib Di isi'
                        },
                        callback: {
                            message: 'Format tempat lahir yang anda masukan tidak benar',
                            callback: function(value, validator, $field) {
                                if (value === '') {
                                    return true;
                                }

                                // min panjang nama lengkap 4 karakter
                                if (value.length < 4) {
                                    return {
                                        valid: false,
                                        message: 'Tempat Lahir minimal 4 Karakter'
                                    };
                                }

                                // Max panjang nama lengkap 30 karakter
                                if (value.length > 30) {
                                    return {
                                        valid: false,
                                        message: 'Jika Nama Tempat Lahir dari 30 karakter silahkan di singkat'
                                    };
                                }
                                // Nama lengkap tidak boleh mengandung huruf atau simbol
                                if (value.search(/^[a-z A-Z_\.]+$/) < 0) {
                                    return {
                                        valid: false,
                                        message: 'Nama Tempat Lahir boleh mengandung huruf atau simbol'
                                    }
                                }
                                return true;
                            }
                        }

                    }
                },
                agama: {
                    validators:{
                        notEmpty: {
                            message: 'Silahkan Pilih Salah Satu !!! Wajib Di Pilih'
                        }
                    }
                },
                Pendidikan: {
                    validators:{
                        notEmpty: {
                            message: 'Silahkan Pilih Salah Satu !!! Wajib Di Pilih'
                        }
                    }
                },
                alamat: {
                    validators: {
                        notEmpty: {
                            message: 'Alamat Tidak Boleh Kosong'
                        },
                        stringLength: {
                            min: 5,
                            max:200,
                            message: 'Minimal 5 Karakter Maximal 200 Karakter !!!'
                        }
                    }  
                },
                nomor:{
                    validators:{
                        notEmpty: {
                            message: 'Nomor Telepon Tidak Boleh Kosong !!!'
                        },
                        callback: {
                            message: 'Format Nomor Telepon yang anda masukan tidak benar',
                            callback: function(value, validator, $field) {
                                if (value === '') {
                                    return true;
                                }

                                // format nomor telepon sesuai dengan provaider GSM dan CDMA
                                if (value.search(/^(\+62|\+0|0|62)(8(1[123456789]|2[123]|3[128]|5[2356789]|7[78]|8[1278]|9[678])|2(1|2|4|3[1234]|5[12347]|6[01234567]|7[123456]|8[012345679]|9[12345678])|3(1|2[1234578]|3[1234568]|4[123]|5[12345678]|6[1234568]|7[012346]|8[0123456789])|4(0[123458]|1[0134789]|2[0123678]|3[012458]|43|5[0123578]|6[12345]|7[12345]|8[1245])|5(1[123789]|2[25678]|3[1246789]|4[123589]|5[12346]|6[1234578])|6(1|2[0123456789]|3[01345689]|4[123456]|5[0123456789])|7(1[123456789]|2[123456789]|3[0123456789]|4[012345678]|5[12345679]|6[0123456789]|7[1236789])|9(0[12]|1[01345678]|2[123479]|31|5[12567]|6[679]|7[15]|8[013456]))[0-9\-]{1,10}$/) < 0) {
                                    return {
                                        valid: false,
                                        message: 'Masukan Nomor Yang Benar !!!!'
                                    }
                                }

                                // min panjang nama lengkap 10 karakter
                                if (value.length < 10) {
                                    return {
                                        valid: false,
                                        message: 'Nomor Telepon Maximal 10 karakter'
                                    };
                                }

                                // Max panjang nama lengkap 14 karakter
                                if (value.length > 14) {
                                    return {
                                        valid: false,
                                        message: 'Nomor Telepon Maximal 14 karakter'
                                    };
                                }
                                
                                return true;
                            }
                        }
                    }
                },
                email:{
                    validators:{
                        notEmpty:{
                            message: 'Alamat Email Tidak Boleh Kosong'
                        },
                        regexp: {
                            regexp: /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/,
                            message: 'Silahkan Masukan Email Yang benar!! example (NamaEmail@NamaDomain.Domain)'
                        }
                    }
                },
                WhatsApp:{
                    feedbackIcons: false,
                    validators: {
                        regexp: {
                            regexp : /^[0-9+()-]+$/,
                            message: 'Masukan Nomor WhatsApp Yang Benar !!!!'
                        },
                        stringLength: {
                            min: 7,
                            max: 14,
                            message: 'Manimal 7 Digit Dan Nomor Maximal 14 Digit Nomor !!!!'
                        },
                    }
                },
                Perusahaan:{
                    validators:{
                        notEmpty:{
                            message: 'Silahkan Pilih Salah Satu !!! Wajib Di Pilih'
                        }
                    }
                },
                Jabatan:{
                    validators:{
                        notEmpty:{
                            message: 'Silahkan Pilih Salah Satu !!! Wajib Di Pilih'
                        }
                    }
                }
            }
        })
        .on('success.field.bv', function(e, data) {
            var $parent = data.element.parents('.form-group');
            // Mengahpus class sukses
            $parent.removeClass('has-success');
            // menyembunyikan icon sukses
            $parent.find('.form-control-feedback[data-bv-icon-for="' + data.field + '"]').hide();
        });
    
    $('.frmEditUsers')
        .bootstrapValidator({
            feedbackIcons: {
                valid: 'ti-check',
                invalid: 'ti-close',
                validating: 'ti-reload'
            },
            excluded: [':disabled'],
            fields: {
                namaLengkapEdit: {
                    validators: {
                        notEmpty: {
                            message: 'Nama Lengkap Tidak Boleh Kosong !!! Wajib Di isi'
                        },
                        callback: {
                            message: 'Format Nama lengkap yang anda masukan tidak benar',
                            callback: function(value, validator, $field) {
                                if (value === '') {
                                    return true;
                                }

                                // Max panjang nama lengkap 30 karakter
                                if (value.length > 30) {
                                    return {
                                        valid: false,
                                        message: 'Jika Nama Lengkap lebih dari 30 karakter silahkan di singkat'
                                    };
                                }
                                // Nama lengkap tidak boleh mengandung huruf atau simbol
                                if (value.search(/^[a-z A-Z_\.]+$/) < 0) {
                                    return {
                                        valid: false,
                                        message: 'Nama lengkap tidak boleh mengandung huruf atau simbol'
                                    }
                                }
                                return true;
                            }
                        }
                    }
                },
                jenisKelaminEdit: {
                    validators: {
                        notEmpty: {
                            message: 'Silahkan Pilih Salah Satu !!! Wajib Di Pilih' 
                        }
                    }
                },
                tempatEdit: {
                    validators: {
                        notEmpty: {
                            message: 'Tempat Lahir Tidak Boleh Kosong !!! Wajib Di isi'
                        },
                        callback: {
                            message: 'Format tempat lahir yang anda masukan tidak benar',
                            callback: function(value, validator, $field) {
                                if (value === '') {
                                    return true;
                                }

                                // min panjang nama lengkap 4 karakter
                                if (value.length < 4) {
                                    return {
                                        valid: false,
                                        message: 'Tempat Lahir minimal 4 Karakter'
                                    };
                                }

                                // Max panjang nama lengkap 30 karakter
                                if (value.length > 30) {
                                    return {
                                        valid: false,
                                        message: 'Jika Nama Tempat Lahir dari 30 karakter silahkan di singkat'
                                    };
                                }
                                // Nama lengkap tidak boleh mengandung huruf atau simbol
                                if (value.search(/^[a-z A-Z_\.]+$/) < 0) {
                                    return {
                                        valid: false,
                                        message: 'Nama Tempat Lahir boleh mengandung huruf atau simbol'
                                    }
                                }
                                return true;
                            }
                        }

                    }
                },
                agamaEdit: {
                    validators:{
                        notEmpty: {
                            message: 'Silahkan Pilih Salah Satu !!! Wajib Di Pilih'
                        }
                    }
                },
                PendidikanEdit: {
                    validators:{
                        notEmpty: {
                            message: 'Silahkan Pilih Salah Satu !!! Wajib Di Pilih'
                        }
                    }
                },
                alamatEdit: {
                    validators: {
                        notEmpty: {
                            message: 'Alamat Tidak Boleh Kosong'
                        },
                        stringLength: {
                            min: 5,
                            max:200,
                            message: 'Minimal 5 Karakter Maximal 200 Karakter !!!'
                        }
                    }  
                },
                nomorEdit:{
                    validators:{
                        notEmpty: {
                            message: 'Nomor Telepon Tidak Boleh Kosong !!!'
                        },
                        callback: {
                            message: 'Format Nomor Telepon yang anda masukan tidak benar',
                            callback: function(value, validator, $field) {
                                if (value === '') {
                                    return true;
                                }

                                // format nomor telepon sesuai dengan provaider GSM dan CDMA
                                if (value.search(/^(\+62|\+0|0|62)(8(1[123456789]|2[123]|3[128]|5[2356789]|7[78]|8[1278]|9[678])|2(1|2|4|3[1234]|5[12347]|6[01234567]|7[123456]|8[012345679]|9[12345678])|3(1|2[1234578]|3[1234568]|4[123]|5[12345678]|6[1234568]|7[012346]|8[0123456789])|4(0[123458]|1[0134789]|2[0123678]|3[012458]|43|5[0123578]|6[12345]|7[12345]|8[1245])|5(1[123789]|2[25678]|3[1246789]|4[123589]|5[12346]|6[1234578])|6(1|2[0123456789]|3[01345689]|4[123456]|5[0123456789])|7(1[123456789]|2[123456789]|3[0123456789]|4[012345678]|5[12345679]|6[0123456789]|7[1236789])|9(0[12]|1[01345678]|2[123479]|31|5[12567]|6[679]|7[15]|8[013456]))[0-9\-]{1,10}$/) < 0) {
                                    return {
                                        valid: false,
                                        message: 'Masukan Nomor Yang Benar !!!!'
                                    }
                                }

                                // min panjang nama lengkap 10 karakter
                                if (value.length < 10) {
                                    return {
                                        valid: false,
                                        message: 'Nomor Telepon Maximal 10 karakter'
                                    };
                                }

                                // Max panjang nama lengkap 14 karakter
                                if (value.length > 14) {
                                    return {
                                        valid: false,
                                        message: 'Nomor Telepon Maximal 14 karakter'
                                    };
                                }
                                
                                return true;
                            }
                        }
                    }
                },
                emailEdit:{
                    validators:{
                        notEmpty:{
                            message: 'Alamat Email Tidak Boleh Kosong'
                        },
                        regexp: {
                            regexp: /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/,
                            message: 'Silahkan Masukan Email Yang benar!! example (NamaEmail@NamaDomain.Domain)'
                        }
                    }
                },
                WhatsAppEdit:{
                    feedbackIcons: false,
                    validators: {
                        regexp: {
                            regexp : /^[0-9+()-]+$/,
                            message: 'Masukan Nomor WhatsApp Yang Benar !!!!'
                        },
                        stringLength: {
                            min: 7,
                            max: 14,
                            message: 'Manimal 7 Digit Dan Nomor Maximal 14 Digit Nomor !!!!'
                        },
                    }
                },
                PerusahaanEdit:{
                    validators:{
                        notEmpty:{
                            message: 'Silahkan Pilih Salah Satu !!! Wajib Di Pilih'
                        }
                    }
                },
                JabatanEdit:{
                    validators:{
                        notEmpty:{
                            message: 'Silahkan Pilih Salah Satu !!! Wajib Di Pilih'
                        }
                    }
                },
                username:{
                    validators:{
                        notEmpty:{
                            message: 'Username Tidak Boleh Kosong'
                        }
                    }
                }
                
            }
        })
        .on('success.field.bv', function(e, data) {
            var $parent = data.element.parents('.form-group');
            // Mengahpus class sukses
            $parent.removeClass('has-success');
            // menyembunyikan icon sukses
            $parent.find('.form-control-feedback[data-bv-icon-for="' + data.field + '"]').hide();
        });

    $('#tambah').click(function(){
        $('#frmUsers').bootstrapValidator("resetForm",true);
    });

    $('#example').on('click','.lihat',function(){
        var id = $(this).attr('id');
        $.ajax({
            type     : 'post',
            url      : 'getUser',
            async    : true,
            dataType : 'json',
            data: {id:id},
            success:function(data){
                $('#namaView').html('Details '+capitalize(data[0].username));
                $('#nl').html(capitalize(data[0].namaLengkap));
                $('#jk').html(capitalize(data[0].jk));
                $('#ttl').html(capitalize(data[0].tempatLahir)+', '+data[0].tanggalLahir);
                $('#ag').html(capitalize(data[0].agama));
                $('#st').html(capitalize(data[0].status));
                $('#pt').html(capitalize(data[0].pendTerakhir));
                if (data[0].alamat.length > 39) {
                    $('#al').html('<textarea class="form-control form-control-sm">'+data[0].alamat+'</textarea>');                    
                }else{
                    $('#al').html(data[0].alamat);  
                }
                $('#nt').html(capitalize(data[0].noTelp));
                $('#em').html(capitalize(data[0].email));
                $('#wa').html(capitalize(data[0].wa));
                $('#np').html(capitalize(data[0].namaCompany));
                var level = data[0].level_user;
                var jabatan = "";
                if (level == 1){
                    jabatan = "Direktur"
                }else if (level == 2){
                    jabatan = "Admin"
                }else if (level == 3){
                    jabatan = "Officer"
                }else if (level == 4){
                    jabatan = "Engineering"
                }else if (level == 5){
                    jabatan = "Kadiv"
                }else if (level == 6){
                    jabatan = "Pimpro"
                }else if (level == 7){
                    jabatan = "Finance"
                };
                $('#jb').html(jabatan);
                $('#un').html(capitalize(data[0].username));
                $('#tt').html('<img src="./_assets/images/'+data[0].ttd+'" id="image-preview" width="200px" height="100px" />');
            }
        });
    });
    $('#example').on('click','.edit',function(){
        var id = $(this).attr('id');
        $.ajax({
            type     : 'post',
            url      : 'getUser',
            async    : true,
            dataType : 'json',
            data: {id:id},
            success:function(data){
                $('.frmEditUsers').bootstrapValidator("resetForm", true);
                $('#namaLengkapEdit').val(capitalize(data[0].namaLengkap));
                $('#jenisKelaminEdit').val(capitalize(data[0].jk));
                $('#tempatEdit').val(capitalize(data[0].tempatLahir));
                $('#tanggalEdit').val(data[0].tanggalLahir);
                $('#agamaEdit').val(capitalize(data[0].agama));
                $('#statusEdit').val(capitalize(data[0].status));
                $('#PendidikanEdit').val(capitalize(data[0].pendTerakhir));
                $('#alamatEdit').html('<textarea class="form-control form-control-sm" name="alamatEdit">'+data[0].alamat+'</textarea>');
                $('#nomorEdit').val(capitalize(data[0].noTelp));
                $('#emailEdit').val(capitalize(data[0].email));
                $('#WhatsAppEdit').val(capitalize(data[0].wa));
                $('#perusahaan').val(data[0].company_id);
                $('.frmEditUsers').bootstrapValidator('addField', 'alamatEdit');

                var level = data[0].level_user;
                if (level == 1 || level == 2 ) {
                    $('#JabatanEdit').html(
                        '<option value="">Pilih Jabatan</option>'+
                        '<option value="1">Direktur</option>'+
                        '<option value="2">Admin</option>'
                    );
                } else if (level == 3 || level == 4 || level == 5 || level == 6 || level == 7) {
                    $('#JabatanEdit').html(
                        '<option value="">Pilih Jabatan</option>'+
                        '<option value="1">Direktur</option>'+
                        '<option value="3">Officer</option>'+
                        '<option value="4">Engineering</option>'+
                        '<option value="5">Kadiv</option>'+
                        '<option value="6">Pimpro</option>'+
                        '<option value="7">Finance</option>'
                    );
                }
                $('#JabatanEdit').val(data[0].level_user);
                $('#username').val(capitalize(data[0].username));
                $('#getID').html(
                    '<input type="hidden" name="id" value="'+data[0].user_id+'">'+
                    '<input type="hidden" name="namaTTDEdit" value="'+data[0].ttd+'">'
                );
            }
        });
    });
    $('#example').on('click','.hapus',function(){
        var id = $(this).attr('id');
        var nama = $(this).attr('namaTTD');
        var username = $(this).attr('nama');
        swal({
            title: "Apakah Anda Yakin?",
            text: "Mau Menghapus User "+username,
            icon: "warning",
            buttons: ['Tidak',"Iya"],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url:'delUser',
                    type:'post',
                    data:{id:id,nama:nama},
                    success:function(data){
                        if (data ==  'berhasil') {
                            swal('',"Good Job!! Data Berhasil Di Hapus", "success").then((value)=>{
                                location.reload();
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

    $('#exportUser').click(function(){
        window.open('exportUser', '_blank');
    });
    
   

});

// fungsi javascript untuk menampilkan tanda tangan sebelum di simpan ke database
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function (e) {
            $('#image-preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }   
}
$("#image-source").change(function(){
    document.getElementById("priview").style.display = "block";
    readURL(this);
});
//Akhir skrip fungsi menampilkan tanda tangan
</script>

