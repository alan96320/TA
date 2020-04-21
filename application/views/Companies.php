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
                        <h4 class="font-weight-bold mb-0">DATA PERUSAHAAN</h4>
                    </div>
                    <div>
                        <button type="button" class="btn btn-primary btn-icon-text btn-rounded tbhcompany" data-toggle="modal" data-target="#tambah">
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
                        <button type="button" id="exporCompany" class="btn btn-outline-primary btn-icon-text btn-sm" style="margin-bottom: -30px;">
                            <i class="ti-export  btn-icon-prepend"></i> <span class="menu-title">Export PDF</span>
                        </button>
                        <div class="table-responsive">
                            <table id="example" class="table table-hover table-sm" style="width:100%" >
                                <thead style="font-size: 12px" class="table-primary">
                                    <tr>
                                        <th class="text-center align-middle" height="40px">Nama Peusahaan</th>
                                        <th class="text-center align-middle">Alamat Perusahaan</th>
                                        <th class="text-center align-middle">Nomor Telp. / Fax</th>
                                        <th class="text-center align-middle">Email</th>
                                        <th class="text-center align-middle">Level</th>
                                        <th class="text-center align-middle">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($company->result() as $key => $data) { ?>
                                        <tr>
                                            <td><?=strlen($data->namaCompany) > 25 ? substr($data->namaCompany, 0,22).'...' : $data->namaCompany ?></td>
                                            <td><?=strlen($data->alamatCompany) > 40 ? substr($data->alamatCompany, 0,37).'...' : $data->alamatCompany ?></td>
                                            <td><?=strlen($data->noTelp_company) > 12 ? substr($data->noTelp_company, 0,9).'...' : $data->noTelp_company ?></td>
                                            <td><?=strlen($data->email_company) > 22 ? substr($data->email_company, 0,19).'...' : $data->email_company ?></td>
                                            <td><?=$data->level == "2" ? "Kontraktor" : "Developer" ?></td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-outline-info btn-rounded btn-icon btn-sm lihat" id="<?=$data->company_id?>" data-toggle="modal" data-target="#view" >
                                                    <i class="ti-eye"></i>                          
                                                </button>
                                                <button type="button" class="btn btn-outline-success btn-rounded btn-icon btn-sm edit" id="<?=$data->company_id?>" data-toggle="modal" data-target="#edit">
                                                    <i class="ti-pencil"></i>                          
                                                </button>
                                                <button type="button" class="btn btn-outline-danger btn-rounded btn-icon btn-sm hapus" id="<?=$data->company_id?>" nama="<?=$data->namaCompany?>">
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
<!-- Modal Form untuk Tambah Data Perusahaan -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 100%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle" style="font-family: times new roman">Tambah Data Perusahaan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label style="color: red; font-size: 12px; font-family: times new roman;">Wajib Di Isi *</label>
                <form action="addcompany" method="post" id="frmcompany" class="form-sample" style="font-family: times new roman">
                   
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label form-control-sm" >Nama Perusahaan *</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <input placeholder="Nama Perusahaan" class="form-control form-control-sm"  type="text" name="namaperusahaan">
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label form-control-sm" >Bidang Usaha *</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <input placeholder="Bidang Usaha" class="form-control form-control-sm"  type="text" name="bidangusaha">
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label form-control-sm" >Alamat Perusahaan *</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <textarea class="form-control form-control-sm" name="alamat"></textarea>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label form-control-sm" >Nomor Telp. / Fax *</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <input placeholder="Nomor Telepon / Fax" class="form-control form-control-sm"  type="text" name="nomor">
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label form-control-sm" >Email Perusahaan *</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <input placeholder="Email Perusahaan" class="form-control form-control-sm"  type="text" name="email">
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label form-control-sm" >Website</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <input placeholder="http://" class="form-control form-control-sm"  type="text" name="Web">
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label form-control-sm" >Level *</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <select class="form-control form-control-sm jabatan" name="level">
                                <option value="">--Pilih--</option>
                                <option value="3">Developer</option>
                                <option value="2">Kontraktor</option>
                            </select>
                        </div>
                    </div>
                    <div style="margin-bottom: 20px;margin-right: 20px; font-family: times new roman" class="float-right">
                        <button type="reset" class="btn btn-primary btn-sm " id="resetAdd"><i class="fa fa-redo fa-fw"></i> Reset</button>
                        <button type="submit" class="btn btn-primary btn-sm text-white"><i class="fa fa-save fa-fw"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Form untuk edit Data Perusahaan -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 100%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle" style="font-family: times new roman">Edit Data Perusahaan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label style="color: red; font-size: 12px; font-family: times new roman;">Wajib Di Isi *</label>
                <form action="editcompany" method="post" id="frmcompanyedit" class="form-horizontal" style="font-family: times new roman">
                    <div id="idcompany"></div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label form-control-sm" >Nama Perusahaan *</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <input placeholder="Nama Perusahaan" class="form-control form-control-sm"  type="text" name="namaperusahaan" id="namaperusahaan">
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label form-control-sm" >Bidang Usaha *</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <input placeholder="Bidang Usaha" class="form-control form-control-sm"  type="text" name="bidangusaha" id="bidangusaha">
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label form-control-sm" >Alamat Perusahaan *</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                        	<div id="alamatEdit"></div>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label form-control-sm" >Nomor Telp. / Fax *</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <input placeholder="Nomor Telepon / Fax" class="form-control form-control-sm"  type="text" name="nomor" id="nomor">
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label form-control-sm" >Email Perusahaan *</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <input placeholder="Email Perusahaan" class="form-control form-control-sm"  type="text" name="email" id="email">
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label form-control-sm" >Website</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <input placeholder="http://" class="form-control form-control-sm"  type="text" name="Web" id="WebPerusahaan">
                        </div>
                    </div>
                    <div class="form-group row" style="margin-right: 0">
                        <label class="col-md-4 col-sm-4 col-form-label form-control-sm" >Level *</label>
                        <div class="col-md-8 col-sm-8 inputGroupContainer">
                            <select class="form-control form-control-sm jabatan" name="level" id="level">
                                <option value="">--Pilih--</option>
                                <option value="3">Developer</option>
                                <option value="2">Kontraktor</option>
                            </select>
                        </div>
                    </div>
                    <div style="margin-bottom: 20px;margin-right: 20px; font-family: times new roman" class="float-right">
                        <button type="reset" class="btn btn-primary btn-sm " id="resetEdit"><i class="fa fa-redo fa-fw"></i> Reset</button>
                        <button type="submit" class="btn btn-primary btn-sm text-white"><i class="fa fa-save fa-fw"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk Lihat Detail Data Perusahaan -->
<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 100%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle" style="font-family: times new roman"> <h4 id="namaView"></h4> </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table" style="font-size: 14px;">
                        <thead>
                            <tr>
                                <th class="text-right align-middle" width="170px" style="border-bottom: 0px">Nama Perusahan :</th>
                                <td  id="np"></td>
                            </tr>
                            <tr>
                                <th class="text-right align-middle" width="170px" style="border-bottom: 0px; border-top: 0px">Bidang Usaha :</th>
                                <td id="bu"></td>
                            </tr>
                            <tr>
                                <th class="text-right align-middle" width="170px" style="border-bottom: 0px; border-top: 0px">Alamat Perusahaan :</th>
                                <td id="ap"></td>
                            </tr>
                            <tr>
                                <th class="text-right align-middle" width="170px" style="border-bottom: 0px; border-top: 0px">Nomor Telp. / Fax :</th>
                                <td id="nt"></td>
                            </tr>
                            <tr>
                                <th class="text-right align-middle" width="170px" style="border-bottom: 0px; border-top: 0px">Email :</th>
                                <td id="em"></td>
                            </tr>
                            <tr>
                                <th class="text-right align-middle" width="170px" style="border-bottom: 0px; border-top: 0px">Website :</th>
                                <td id="we"></td>
                            </tr>
                            <tr>
                                <th class="text-right align-middle" width="170px" style="border-bottom: 0px; border-top: 0px">Level Perusahan :</th>
                                <td id="lp"></td>
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
    $('#exporCompany').click(function(){
        window.open('exporCompany', '_blank');
    });
    //fungsi untuk setting datatable
    $('#info').show('slow').fadeOut(2000);
    $('#example').DataTable({
        "pageLength": 4,
        "lengthChange": false,
        columnDefs: [{ 
            orderable: false, 
            targets: '_all'
              
        }]
    });

    //fungsi untuk reset form
    $('.tbhcompany').click(function(){
        $('#frmcompany').bootstrapValidator("resetForm",true);
    });
    $('#resetAdd').click(function(){
    	$('#frmcompany').bootstrapValidator('resetForm', true);
    });
    $('.edit').click(function(){
    	$('#frmcompanyedit').bootstrapValidator('resetForm', true);
    });
    $('#resetEdit').click(function(){
    	$('#frmcompanyedit').bootstrapValidator('resetForm', true);
    	$('#alamatEdit').html('<textarea class="form-control form-control-sm" name="alamat" id="alamat"><?=$data->alamatCompany?></textarea>');
    });

    //fungsi untuk mem validasi form tambah user
    $('#frmcompany')
        .bootstrapValidator({
            feedbackIcons: {
                valid: 'ti-check',
                invalid: 'ti-close',
                validating: 'ti-reload'
            },
            excluded: [':disabled'],
            fields: {
                namaperusahaan: {
                    validators: {
                        notEmpty: {
                            message: 'Nama Perusahaan Tidak Boleh Kosong !!! Wajib Di isi'
                        },
                        callback: {
                            message: 'Format Nama Perusahaan yang anda masukan tidak benar',
                            callback: function(value, validator, $field) {
                                if (value === '') {
                                    return true;
                                }

                                // Max panjang nama lengkap 30 karakter
                                if (value.length > 30) {
                                    return {
                                        valid: false,
                                        message: 'Jika Nama Perusahaan lebih dari 30 karakter silahkan di singkat'
                                    };
                                }
                                // Nama lengkap tidak boleh mengandung huruf atau simbol
                                if (value.search(/^[a-z A-Z_\.]+$/) < 0) {
                                    return {
                                        valid: false,
                                        message: 'Nama Perusahaan tidak boleh mengandung huruf atau simbol'
                                    }
                                }
                                return true;
                            }
                        }
                    }
                },
                bidangusaha: {
                    validators: {
                        notEmpty: {
                            message: 'Bidang Usaha Tidak Boleh Kosong !!! Wajib Di isi'
                        },
                        callback: {
                            message: 'Format Bidang Usaha yang anda masukan tidak benar',
                            callback: function(value, validator, $field) {
                                if (value === '') {
                                    return true;
                                }

                                // Max panjang nama lengkap 30 karakter
                                if (value.length > 30) {
                                    return {
                                        valid: false,
                                        message: 'Jika Bidang Usaha lebih dari 30 karakter silahkan di singkat'
                                    };
                                }
                                // Nama lengkap tidak boleh mengandung huruf atau simbol
                                if (value.search(/^[a-z A-Z_\.]+$/) < 0) {
                                    return {
                                        valid: false,
                                        message: 'Bidang Usaha tidak boleh mengandung huruf atau simbol'
                                    }
                                }
                                return true;
                            }
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
                Web: {
	                validators: {
	                    uri: {
	                        message: 'Format webset Anda Masukan Tidak sesuai Contoh : http://nama.com'
	                    }
	                }
	            },
                level:{
                    validators:{
                        notEmpty:{
                            message: 'Silahkan Pilih Salah Satu !!! Wajib Di Pilih'
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
    $('#frmcompanyedit')
        .bootstrapValidator({
            feedbackIcons: {
                valid: 'ti-check',
                invalid: 'ti-close',
                validating: 'ti-reload'
            },
            excluded: [':disabled'],
            fields: {
                namaperusahaan: {
                    validators: {
                        notEmpty: {
                            message: 'Nama Perusahaan Tidak Boleh Kosong !!! Wajib Di isi'
                        },
                        callback: {
                            message: 'Format Nama Perusahaan yang anda masukan tidak benar',
                            callback: function(value, validator, $field) {
                                if (value === '') {
                                    return true;
                                }

                                // Max panjang nama lengkap 30 karakter
                                if (value.length > 30) {
                                    return {
                                        valid: false,
                                        message: 'Jika Nama Perusahaan lebih dari 30 karakter silahkan di singkat'
                                    };
                                }
                                // Nama lengkap tidak boleh mengandung huruf atau simbol
                                if (value.search(/^[a-z A-Z_\.]+$/) < 0) {
                                    return {
                                        valid: false,
                                        message: 'Nama Perusahaan tidak boleh mengandung huruf atau simbol'
                                    }
                                }
                                return true;
                            }
                        }
                    }
                },
                bidangusaha: {
                    validators: {
                        notEmpty: {
                            message: 'Bidang Usaha Tidak Boleh Kosong !!! Wajib Di isi'
                        },
                        callback: {
                            message: 'Format Bidang Usaha yang anda masukan tidak benar',
                            callback: function(value, validator, $field) {
                                if (value === '') {
                                    return true;
                                }

                                // Max panjang nama lengkap 30 karakter
                                if (value.length > 30) {
                                    return {
                                        valid: false,
                                        message: 'Jika Bidang Usaha lebih dari 30 karakter silahkan di singkat'
                                    };
                                }
                                // Nama lengkap tidak boleh mengandung huruf atau simbol
                                if (value.search(/^[a-z A-Z_\.]+$/) < 0) {
                                    return {
                                        valid: false,
                                        message: 'Bidang Usaha tidak boleh mengandung huruf atau simbol'
                                    }
                                }
                                return true;
                            }
                        }
                    }
                },
                // alamat: {
                //     validators: {
                //         notEmpty: {
                //             message: 'Alamat Tidak Boleh Kosong'
                //         },
                //         stringLength: {
                //             min: 5,
                //             max:200,
                //             message: 'Minimal 5 Karakter Maximal 200 Karakter !!!'
                //         }
                //     }  
                // },
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
                Web: {
	                validators: {
	                    uri: {
	                        message: 'Format webset Anda Masukan Tidak sesuai Contoh : http://nama.com'
	                    }
	                }
	            },
                level:{
                    validators:{
                        notEmpty:{
                            message: 'Silahkan Pilih Salah Satu !!! Wajib Di Pilih'
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

    

    $('#example').on('click','.lihat',function(){
        var id = $(this).attr('id');
        $.ajax({
            type     : 'post',
            url      : 'getCompany',
            async    : true,
            dataType : 'json',
            data: {id:id},
            success:function(data){
                $('#namaView').html('Details Perusahaan '+data[0].namaCompany);
                $('#np').html(data[0].namaCompany);
                $('#bu').html(data[0].bidangUsaha);
                if (data[0].alamatCompany.length > 39) {
                    $('#ap').html('<textarea class="form-control form-control-sm" style="height:100px">'+data[0].alamatCompany+'</textarea>');                    
                }else{
                    $('#ap').html(data[0].alamatCompany);  
                }
                $('#nt').html(data[0].noTelp_company);
                $('#em').html(data[0].email_company);
                $('#we').html(data[0].web_company);
                var level = '';
                if (data[0].level == 2) {
                    level = 'Kontraktor';
                }else{
                    level = 'Developer';
                }
                $('#lp').html(level);
            }
        });
    });
    $('#example').on('click','.edit',function(){
        var id = $(this).attr('id');
        $.ajax({
            type     : 'post',
            url      : 'getCompany',
            async    : true,
            dataType : 'json',
            data: {id:id},
            success:function(data){
                $('#frmcompanyedit').bootstrapValidator("resetForm",true);
                $('#idcompany').html('<input type="hidden" name="id" value="'+data[0].company_id+'">');
                $('#namaperusahaan').val(data[0].namaCompany);
                $('#bidangusaha').val(data[0].bidangUsaha);
                $('#alamatEdit').html('<textarea class="form-control form-control-sm" name="alamat" id="alamat">'+data[0].alamatCompany+'</textarea>');
                $('#nomor').val(data[0].noTelp_company);
                $('#email').val(data[0].email_company);
                $('#WebPerusahaan').val(data[0].web_company);
                $('#level').val(data[0].level);
            }
        });
    });
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
                    url:'delCompany',
                    type:'post',
                    data:{id:id},
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
});


</script>