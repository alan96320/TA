<?php
	$id = $this->session->userdata('userid');
	$this->db->from('tb_users');
	$this->db->where('user_id',$id);
	$data = $this->db->get()->row();
	echo $this->session->tempdata('message');
?>

<div class="main-panel">
    <div class="content-wrapper">
      	<div class="row">
    		<div class="col-md-10 col-sm-10 offset-sm-1 offset-md-1  grid-margin stretch-card">
      			<div class="card">
        			<div class="card-body">
        				<div class="row">
	          				<h4 class="card-title col-sm-6" id="barTitle">profile</h4>
	          				<h4 class="card-title col-sm-6 text-right" id="namejadi">mau di edit ? <a href="#" id="jadi">klik disini...</a></h4>
	          				<h4 class="card-title col-sm-6 text-right" id="nametidakjadi" style="display: none;">Tidak jadi ? <a href="#" id="tidakjadi">klik disini...</a></h4>
        				</div>
          				<form action="editProfile" method="post" id="frmProfile" class="form-horizontal frmEditUsers">
		                    <fieldset disabled>
		                    <div class="row">
		                    	<div class="col-md-6 col-sm-6">
				                    <div class="form-grop row" style="margin-right: 0">
				                        <label class="col-md-4 col-sm-4 col-form-label  form-control-sm card-title" >Nama Lengkap</label>
				                        <div class="col-md-8 col-sm-8 inputGroupContainer">
				                            <input placeholder="Nama Lengkap" value="<?=$data->namaLengkap?>" class="form-control form-control-sm"  type="text" name="nama" id="nama">
				                        </div>
				                    </div>
		                    	</div>
		                    	<div class="col-md-6 col-sm-6">
		                    		<div class="form-group row" style="margin-right: 0">
				                        <label class="col-md-4 col-sm-4 col-form-label  form-control-sm card-title" >Status</label>
				                        <div class="col-md-8 col-sm-8 inputGroupContainer">
				                            <select class="form-control form-control-sm" name="status" id="status">
				                                <option value="">Pilih Status</option>
				                                <option value="Single" <?=$data->status == 'Single' ? 'selected' : '' ?> >Single</option>
				                                <option value="Menikah" <?=$data->status == 'Menikah' ? 'selected' : '' ?> >Menikah</option>
				                                <option value="Single parent" <?=$data->status == 'Single parent' ? 'selected' : '' ?> >Single parent</option>
				                            </select>
				                        </div>
				                    </div>
				                </div>
		                    </div>
		                    <div class="row">
		                    	<div class="col-md-6 col-sm-6">
		                    		<div class="form-group row" style="margin-right: 0">
				                        <label class="col-md-4 col-sm-4 col-form-label  form-control-sm card-title" >Pendidikan</label>
				                        <div class="col-md-8 col-sm-8 inputGroupContainer">
				                            <select class="form-control form-control-sm" name="pendidikan" id="pendidikan">
				                                <option value="">Pilih Pendidikan</option>
				                                <option value="Tidak Sekolah" <?=$data->pendTerakhir == 'Tidak Sekolah' ? 'selected' : '' ?> >Tidak Sekolah</option>
				                                <option value="SD" <?=$data->pendTerakhir == 'SD' ? 'selected' : '' ?> >SD</option>
				                                <option value="SMP" <?=$data->pendTerakhir == 'SMP' ? 'selected' : '' ?> >SMP</option>
				                                <option value="SMA" <?=$data->pendTerakhir == 'SMA' ? 'selected' : '' ?> >SMA</option>
				                                <option value="Diploma 3 (D3)" <?=$data->pendTerakhir == 'Diploma 3 (D3)' ? 'selected' : '' ?> >Diploma 3 (D3)</option>
				                                <option value="Diploma 4 (D4)" <?=$data->pendTerakhir == 'Diploma 4 (D4)' ? 'selected' : '' ?> >Diploma 4 (D4)</option>
				                                <option value="Strata 1 (S1)" <?=$data->pendTerakhir == 'Strata 1 (S1)' ? 'selected' : '' ?> >Strata 1 (S1)</option>
				                                <option value="Strata 2 (S2)" <?=$data->pendTerakhir == 'Strata 2 (S2)' ? 'selected' : '' ?> >Strata 2 (S2)</option>
				                                <option value="Strata 3 (S3)" <?=$data->pendTerakhir == 'Strata 3 (S3)' ? 'selected' : '' ?> >Strata 3 (S3)</option> 
				                            </select>
				                        </div>
				                    </div>
		                    	</div>
		                    	<div class="col-md-6 col-sm-6">
		                    		<div class="form-group row" style="margin-right: 0">
				                        <label class="col-md-4 col-sm-4 col-form-label  form-control-sm card-title" >Alamat</label>
				                        <div class="col-md-8 col-sm-8 inputGroupContainer">
				                            <textarea name="alamat" class="form-control form-control-sm"><?=$data->alamat?></textarea>
				                        </div>
				                    </div>
		                    	</div>
		                    </div>
		                    <div class="row">
		                    	<div class="col-md-6 col-sm-6">
		                    		<div class="form-group row" style="margin-right: 0">
				                        <label class="col-md-4 col-sm-4 col-form-label  form-control-sm card-title" >No. Telepon</label>
				                        <div class="col-md-8 col-sm-8 inputGroupContainer">
				                            <input placeholder="Nomor Telepon" value="<?=$data->noTelp?>" class="form-control form-control-sm"  type="text" name="nomor" id="nomor">
				                        </div>
				                    </div>
		                    	</div>
		                    	<div class="col-md-6 col-sm-6">
		                    		<div class="form-group row" style="margin-right: 0">
				                        <label class="col-md-4 col-sm-4 col-form-label  form-control-sm card-title" >Email</label>
				                        <div class="col-md-8 col-sm-8 inputGroupContainer">
				                            <input placeholder="Email@gmail.com" value="<?=$data->email?>" class="form-control form-control-sm"  type="text" name="email" id="email">
				                        </div>
				                    </div>
		                    	</div>
		                    </div>
		                    <div class="row">
		                    	<div class="col-md-6 col-sm-6">
		                    		<div class="form-group row" style="margin-right: 0">
				                        <label class="col-md-4 col-sm-4 col-form-label  form-control-sm card-title" >WhatsApp</label>
				                        <div class="col-md-8 col-sm-8 inputGroupContainer">
				                            <input placeholder="Nomor WhatsApp" value="<?=$data->wa?>" class="form-control form-control-sm"  type="text" name="wa" id="wa">
				                        </div>
				                    </div>
		                    	</div>
		                    	<div class="col-md-6 col-sm-6">
		                    		<div class="form-group row" style="margin-right: 0">
				                        <label class="col-md-4 col-sm-4 col-form-label  form-control-sm card-title" >Username</label>
				                        <div class="col-md-8 col-sm-8 inputGroupContainer">
				                            <input placeholder="username" value="<?=$data->username?>" class="form-control form-control-sm"  type="text" name="username" id="username">
				                        </div>
				                    </div>
		                    	</div>
		                    </div>
		                    <div class="row">
		                    	<div class="col-md-6 col-sm-6">
		                    		<div class="form-group row" style="margin-right: 0">
				                        <label class="col-md-4 col-sm-4 col-form-label  form-control-sm card-title" >tanda tangan</label>
				                        <div class="col-md-8 col-sm-8 inputGroupContainer">
				                            <img src="<?=base_url('_assets/images/'.$data->ttd)?>" height="60px">
				                        </div>
				                    </div>
		                    	</div>
		                    	<div class="col-md-6 col-sm-6">
		                    		<div class="form-group row" style="margin-right: 0">
				                        <label class="col-md-4 col-sm-4 col-form-label  form-control-sm card-title" >Password</label>
				                        <div class="col-md-8 col-sm-8 inputGroupContainer">
				                            <input placeholder="Jika tidak ingin merubah Password biarkan Kosong" class="form-control form-control-sm"  type="password" name="password">
				                        </div>
				                    </div>
		                    	</div>
		                    </div>
		                    <div id="getID"></div>
		                    </fieldset>
		                    <div style="margin-bottom: 20px;margin-right: 20px; font-family: times new roman" class="float-right"  >
		                        <button type="submit" class="btn btn-primary btn-sm text-white" id="btnSave" style="display: none;"><i class="fa fa-save fa-fw"></i> Save</button>
		                    </div>
		                </form>
                   
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
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#welcome').fadeOut(2000);
		$('#jadi').click(function(){
			$('form').find('fieldset').removeAttr('disabled');
			$('#namejadi').hide();
			$('#nametidakjadi').show();
			$('#btnSave').show();
		});
		$('#tidakjadi').click(function(){
			$('form').find('fieldset').attr('disabled','disabled');
			$('#namejadi').show();
			$('#nametidakjadi').hide();
			$('#btnSave').hide();
		});
	});
</script>