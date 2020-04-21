<div class="d-flex justify-content-around">
    <div class="order-0 p-2"></div>
    <div class="order-1 p-2">
        <h4 class="modal-title" style="text-align: center; ">Data Harga Per Unit</h4>
    </div>
    <div class="order-2 p-2">
        <button class="btn btn-success mb-2 btn-sm float-right tbhharga" style="margin-right: 50px; font-family: times new roman" data-toggle="modal" data-target="#tambah">
        <i class="fa fa-plus-circle fa-sm"></i><b> Tambah Data</b>
        </button>
    </div>
</div>
<div class="modal-dialog modal-lg">
	<div class="modal-content" style="font-family: times new roman">
		<div class="modal-body" >
			<table id="example" class="table table-striped table-bordered " style="width:100%" >
				<div style="width:50%; margin-left: 25%" id="info"><?=$this->session->flashdata('message');?></div>
				<thead style="font-size: 12px">
					<tr >
                        <th class="text-center align-middle">No</th>
						<th class="text-center align-middle">Nama Pekerjaan Pembangunan</th>
						<th class="text-center align-middle">Harga Per Unit</th>
                        <th style="display: none;"></th>
						<th class="text-center align-middle" width="100px">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1; foreach ($harga->result() as $key => $data) { ?>
						<tr>
                            <td class="text-center align-middle" width="10px"><?=$i++?></td>
							<td class="align-middle"><?=$data->namaPekerjaan?></td>
							<td class="align-middle"><?='Rp. '.number_format($data->harga).' ,-' ?></td>
                            <td style="display: none;"><?=$data->created?></td>
							<td class="text-center align-middle">
                                <form action="delHarga" method="post"> 
									<a data-target="#view" data-toggle="modal" class="btn btn-xs btn-info text-white lihat" id="b<?=$data->harga_unit_id?>"><i class="fa fa-eye fa-xs"></i></a>
									<a data-target="#edit" data-toggle="modal" class="btn btn-xs btn-primary text-white edit" id="a<?=$data->harga_unit_id?>" ><i class="fa fa-pen fa-xs"></i></a>
                                    <input type="hidden" name="hargaID" value="<?=$data->harga_unit_id?>">
									<button onclick ="return confirm('Apakah Anda Yakin Ingin Mengahpus Data <?=ucfirst($data->namaPekerjaan)?> ?')" class="btn btn-xs btn-danger text-white"><i class="fa fa-trash fa-xs"></i></button>
                                </form>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>


<!-- Modal Form untuk Tambah Data Harga -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 100%">
        <div class="modal-content" style="width: 600px">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle" style="font-family: times new roman">Tambah Data Harga</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <label style="color: red; font-size: 12px; font-family: times new roman; margin-top: 10px; margin-left: 20px; margin-bottom: 20px">Wajib Di Isi *</label>
            <form action="addHarga" method="post" id="frmharga" class="form-horizontal" style="font-family: times new roman">
               
                <div class="form-group" style="margin-right: 0">
                    <label class="col-md-4 control-label" >Nama Pembangunan *</label>
                    <div class="col-md-8  inputGroupContainer">
                    	<select class="form-control" name="nama">
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
                <div class="form-group" style="margin-right: 0">
                    <label class="col-md-4 control-label" >Harga Pembangunan *</label>
                    <div class="col-md-8  inputGroupContainer">
                        <input placeholder="Harga" class="form-control harga"  type="text" name="harga" >
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
<!-- Modal Form untuk edit Data Harga -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 100%">
        <div class="modal-content" style="width: 600px">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle" style="font-family: times new roman">Edit Data Harga</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <label style="color: red; font-size: 12px; font-family: times new roman; margin-top: 10px; margin-left: 20px; margin-bottom: 20px">Wajib Di Isi *</label>
            <form action="EditHarga" method="post" id="frmhargaEdit" class="form-horizontal" style="font-family: times new roman">
                <div id="id"></div>
                <div class="form-group" style="margin-right: 0">
                    <label class="col-md-4 control-label" >Nama Pembangunan *</label>
                    <div class="col-md-8  inputGroupContainer">
                    	<select class="form-control" name="nama" id="nama">
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
                <div class="form-group" style="margin-right: 0">
                    <label class="col-md-4 control-label" >Harga Pembangunan *</label>
                    <div class="col-md-8  inputGroupContainer">
                        <input placeholder="Harga" class="form-control harga"  type="text" name="harga" id="harga">
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

<!-- Modal untuk Lihat Detail Data Perusahaan -->
<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 100%">
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
                                <th class="text-right align-middle table-secondary" width="170px" style="border-bottom: 0px">Nama Pembangunan :</th>
                                <td class="table-secondary" id="np"></td>
                            </tr>
                            <tr>
                                <th class="text-right align-middle" width="170px" style="border-bottom: 0px; border-top: 0px">Harga Pembangunan :</th>
                                <td id="hp"></td>
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
    //fungsi untuk setting datatable
    $('#info').show('slow').fadeOut(2000);
    $('#example').DataTable({
        aaSorting: [[3, 'asc']],
        columnDefs: [{ 
            orderable: false, 
            targets: '_all'
              
        }]
    });

    //fungsi auto koma
    $('input.harga').keyup(function(event) {
		// skip for arrow keys
		if(event.which >= 37 && event.which <= 40) return;
		// format number
		$(this).val(function(index, value) {
			return value
			.replace(/\D/g, "")
			.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		});
	});

    // fungsi reset form
	$('#resetAdd').click(function(){
		$('#frmharga').bootstrapValidator('resetForm', true);	
	});
	$('.tbhharga').click(function(){
		$('#frmharga').bootstrapValidator('resetForm', true);	
	});
	$('#resetEdit').click(function(){
		$('#frmhargaEdit').bootstrapValidator('resetForm', true);	
	});
	$('.edit').click(function(){
		$('#frmhargaEdit').bootstrapValidator('resetForm', true);	
	});

    $('#frmharga')
        .bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            excluded: [':disabled'],
            fields: {
                harga: {
                    validators: {
                        notEmpty: {
                            message: 'Harga Tidak Boleh Kosong !!! Wajib Di isi'
                        },
                        regexp: {
                            regexp: /^[0-9,]+$/,
                            message: 'Tidak boleh mengandung huruf atau simbol'
                        }
                    }
                },
                nama: {
                    validators: {
                        notEmpty: {
                            message: 'Nama Pembangunan Tidak boleh Kosong !!! Wajib Di isi'
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
    $('#frmhargaEdit')
        .bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            excluded: [':disabled'],
            fields: {
                harga: {
                    validators: {
                        notEmpty: {
                            message: 'Harga Tidak Boleh Kosong !!! Wajib Di isi'
                        },
                        regexp: {
                            regexp: /^[0-9,]+$/,
                            message: 'Tidak boleh mengandung huruf atau simbol'
                        }
                    }
                },
                nama: {
                    validators: {
                        notEmpty: {
                            message: 'Nama Pembangunan Tidak boleh Kosong !!! Wajib Di isi'
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

    //fungsi untuk edit data harga
    <?php foreach ($harga->result() as $data) { ?>
    	$('#a<?=$data->harga_unit_id?>').click(function(){
    		$('#id').html('<input type="hidden" name="id" value="<?=$data->harga_unit_id?>">');
    		$('#nama').val('<?=$data->namaPekerjaan?>');
    		$('#harga').val('<?=number_format($data->harga)?>');
    	});
    <?php } ?>
	//fungsi untuk view data harga
    <?php foreach ($harga->result() as $data) { ?>
    	$('#b<?=$data->harga_unit_id?>').click(function(){
    		$('#namaView').html('Details Harga <?=$data->namaPekerjaan?>');
    		$('#np').html('<?=$data->namaPekerjaan?>');
    		$('#hp').html('<?='Rp. '.number_format($data->harga).' ,-' ?>');
    	});
    <?php } ?>

});


</script>