<?php 
	$luser= $this->session->userdata('level_user'); 
	$lcompany= $this->session->userdata('level_company');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Home |</title>
  <link rel="icon" type="image/ico" href="<?=base_url('_assets/images/icon.ico');?>">
  <link rel="stylesheet" href="<?=base_url('_assets/new/vendors/ti-icons/css/themify-icons.css')?>">
  <link rel="stylesheet" href="<?=base_url('_assets/new/css/style.css')?>">
  <link rel="stylesheet" href="<?=base_url('_assets/css/loading.css')?>">
  
  <link href="<?=base_url('_assets/date/css/gijgo.min.css');?>" rel="stylesheet">
  <script src="<?=base_url('_assets/js/jquery-3.3.1.min.js');?>"></script>
  <script src="<?=base_url('_assets/_currency/jquery.mask.min.js');?>"></script>
  <link href="<?=base_url('_assets/css/dataTables.bootstrap4.min.css');?>" rel="stylesheet">
  <link href="<?=base_url('_assets/css/bootstrapValidator.css');?>" rel="stylesheet">
  <link href="<?=base_url('_assets/_bootstrap/toogle/css/bootstrap-toggle.min.css');?>" rel="stylesheet">
  <script src="<?=base_url('_assets/sweetalert/sweetalert.min.js');?>"></script>

  <script src="<?=base_url('_assets/new/');?>vendors/chart.js/Chart.min.js"></script>
</head>
<body>
  <div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
		<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
			<a class="navbar-brand brand-logo mr-5" href=""><b>Aplikasi Termin</b></a>
			<a class="navbar-brand brand-logo-mini" href=""><b>AT</b></a>
		</div>
		<div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        	<span class="ti-view-list"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
        	<li class="nav-item dropdown mr-1" >
            	<a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#">
            		<small id="welcome">Welcome, <?=$this->session->userdata('username');?></small>
            	</a>
          	</li>
			<!-- <li class="nav-item dropdown">
	            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
					<i class="ti-bell mx-0"></i>
					<span class="count spinner-grow text-success"></span>
	            </a>
	            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
	            	<p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
	              	<a class="dropdown-item">
		                <div class="item-thumbnail">
							<div class="item-icon bg-success">
								<i class="ti-info-alt mx-0"></i>
							</div>
		                </div>
		                <div class="item-content">
		            		<h6 class="font-weight-normal">10 New Approve</h6>
		          			<p class="font-weight-light small-text mb-0 text-muted"> Just now </p>
		                </div>
		            </a>
		            <a class="dropdown-item">
		                <div class="item-thumbnail">
							<div class="item-icon bg-warning">
								<i class="ti-info-alt mx-0"></i>
							</div>
		                </div>
		                <div class="item-content">
		            		<h6 class="font-weight-normal">10 New Reject</h6>
		          			<p class="font-weight-light small-text mb-0 text-muted"> Just now </p>
		                </div>
		            </a>
	            </div>
          	</li> -->
          	<li class="nav-item nav-profile dropdown">
				<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
				<img src="<?=base_url('_assets/new/')?>images/faces/face28.png" alt="profile"/>
				</a>
	            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
	              	<a class="dropdown-item" href="profile">
		                <i class="ti-settings text-primary"></i>Settings
	              	</a>
	              	<a class="dropdown-item" href="keluar">
		                <i class="ti-power-off text-primary"></i> Logout
	              	</a>
	            </div>
          	</li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        	<span class="ti-view-list"></span>
        </button>
      </div>
    </nav>
    <div class="container-fluid page-body-wrapper">
    	<nav class="sidebar sidebar-offcanvas" id="sidebar">
	        <ul class="nav">
	          	<li class="nav-item">
	            	<a class="nav-link" href="Home">
	              		<i class="ti-shield menu-icon"></i>
	              		<span class="menu-title">Dashboard</span>
	            	</a>
	          	</li>
	          	<?php if ($luser== 1 && $lcompany == 3 || $luser== 2 && $lcompany == 3 || $lcompany == 1 ) { ?>
		        <li class="nav-item">
		            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
		              	<i class="ti-view-list-alt menu-icon"></i>
		              		<span class="menu-title">Data</span>
		              	<i class="menu-arrow"></i>
		            </a>
		            <div class="collapse" id="ui-basic">
		            	<ul class="nav flex-column sub-menu">
		                	<li class="nav-item">
		                		<a class="nav-link" href="Users">
		                			<i class="ti-user menu-icon"></i>
		                			<span class="menu-title">User</span>
		                		</a>
		                	</li>
		                	<li class="nav-item"> 
		                		<a class="nav-link" href="Companies">
		                			<i class="ti-bookmark menu-icon"></i>
		                			<span class="menu-title">Perusahaan</span>
		                		</a>
		                	</li>
		                	<li class="nav-item"> 
		                		<a class="nav-link" href="Bobot">
		                			<i class="ti-ruler-alt menu-icon"></i>
		                			<span class="menu-title">Pekerjaan</span>
		                		</a>
		                	</li>
		                	<li class="nav-item"> 
		                		<a class="nav-link" href="Proyek">
		                			<i class="ti-bar-chart-alt menu-icon"></i>
		                			<span class="menu-title">Proyek</span>
		                		</a>
		                	</li>
		              	</ul>
		            </div>
		        </li>
		        <?php } ?>
		        <?php if ($lcompany == 2 || $lcompany == 1) { ?>
	          	<li class="nav-item">
	            	<a class="nav-link" href="Pengajuan">
	              		<i class="ti-new-window menu-icon"></i>
	              		<span class="menu-title">Pengajuan</span>
	           		 </a>
	         	</li>
	         	<?php } ?>
	         	<?php if ($luser!= 1 && $lcompany == 3 || $lcompany == 1) { ?>
	          	<li class="nav-item">
	            	<a class="nav-link" href="Pemeriksaan">
	              		<i class="ti-check-box menu-icon"></i>
	              		<span class="menu-title">Pemeriksaan</span>
            		</a>
	          	</li>
	          	<?php } ?>
	          	<?php if ($luser == 1 && $lcompany == 3 || $lcompany == 1) { ?>
	          	<li class="nav-item">
	            	<a class="nav-link" href="Pemeriksaan">
		              	<i class="ti-pencil-alt menu-icon"></i>
		              	<span class="menu-title">Pengesahan</span>
	            	</a>
	          	</li>
	          	<?php } ?>
	          	<li class="nav-item">
	            	<a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
	              		<i class="ti-write menu-icon"></i>
	              			<span class="menu-title">Laporan</span>
	              		<i class="menu-arrow"></i>
	            	</a>
		            <div class="collapse" id="auth">
		              	<ul class="nav flex-column sub-menu">
		              		<?php if ($luser == 1 && $lcompany == 3 || $lcompany == 1) { ?>
			                <li class="nav-item">
			                	<a class="nav-link" href="javascript:void(0)" id="lapUser">
			                		<i class="ti-user menu-icon"></i>
				              		<span class="menu-title">Users</span> 
			                	</a>
			                </li>
			                <li class="nav-item">
			                	<a class="nav-link" href="javascript:void(0)" id="lapPerusahaan"> 
			                		<i class="ti-bookmark menu-icon"></i>
				              		<span class="menu-title">Perusahaan</span>
			                	</a>
			                </li>
			                <li class="nav-item">
			                	<a class="nav-link" href="javascript:void(0)" id="lapPekerjaan"> 
			                		<i class="ti-ruler-alt menu-icon"></i>
				              		<span class="menu-title">Pekerjaan</span> 
			                	</a>
			                </li>
			                <li class="nav-item">
			                	<a class="nav-link" href="javascript:void(0)" id="lapProyek"> 
			                		<i class="ti-new-window menu-icon"></i>
				              		<span class="menu-title">Proyek</span>  
			                	</a>
			                </li>
			                <?php } ?>
			                <?php if ($lcompany == 2) { ?>
			                <li class="nav-item">
			                	<a class="nav-link" href="javascript:void(0)" id="lapPengajuan"> 
			                		<i class="ti-check-box menu-icon"></i>
				              		<span class="menu-title">Pengajuan</span>  
			                	</a>
			                </li>
			                <?php } ?>
			                <?php if ($lcompany == 3 && $luser !=1 ) { ?>
			                <li class="nav-item">
			                	<a class="nav-link" href="javascript:void(0)" id="lapPemeriksaan"> 
			                		<i class="ti-bar-chart-alt menu-icon"></i>
				              		<span class="menu-title">Pemeriksaan</span>  
			                	</a>
			                </li>
			                <?php } ?>
			                <?php if ($lcompany == 3 && $luser ==1 ) { ?>
			                <li class="nav-item">
			                	<a class="nav-link" href="javascript:void(0)" id="lapPengesahan"> 
			                		<i class="ti-pencil-alt menu-icon"></i>
				              		<span class="menu-title">Pengesahan</span>  
			                	</a>
			                </li>
			                <?php } ?>
		              	</ul>
		            </div>
	          	</li>
	        </ul>
      	</nav>
      	<?=$contents?>
      	
  	</div>

  	<script type="text/javascript">
  		$('#lapUser').click(function(){
	        window.open('exportUser', '_blank');
	    });
  		$('#lapPerusahaan').click(function(){
	        window.open('exporCompany', '_blank');
	    });
	    $('#lapPekerjaan').click(function(){
	        window.open('exporPekerjaan', '_blank');
	    });

  		$('#lapProyek').click(function(){
	        window.open('exporProyek', '_blank');
	    });
	    $('#lapPengajuan').click(function(){
	        window.open('ExportPengajaun', '_blank');
	    });
	    $('#lapPemeriksaan').click(function(){
	        <?=$this->session->set_flashdata('message','pemeriksaan');?>
	        window.open('ExportPDF', '_blank');
	    });
	    $('#lapPengesahan').click(function(){
	        window.open('ExportPDF', '_blank');
	    });
  	</script>

	
	
	<script src="<?=base_url('_assets/new/');?>js/off-canvas.js"></script>
	<script src="<?=base_url('_assets/new/');?>js/hoverable-collapse.js"></script>
	<script src="<?=base_url('_assets/new/');?>js/template.js"></script>
	<script src="<?=base_url('_assets/new/');?>js/todolist.js"></script>
	<script src="<?=base_url('_assets/new/');?>js/dashboard.js"></script>

	<script src="<?=base_url('_assets/js/jquery-1.10.2.js');?>"></script>
	<script src="<?=base_url('_assets/_bootstrap/js/bootstrap.js');?>"></script>
	<script src="<?=base_url('_assets/_icon/js/all.js');?>"></script>

	

	<script src="<?=base_url('_assets/js/jquery.dataTables.min.js');?>"></script>
	<script src="<?=base_url('_assets/js/dataTables.bootstrap4.min.js');?>"></script>
	<script src="<?=base_url('_assets/js/all.js');?>"></script>
	<script src="<?=base_url('_assets/js/bootstrapValidator.js');?>"></script>
	<script src="<?=base_url('_assets/date/js/gijgo.min.js');?>"></script>
	<script src="<?=base_url('_assets/_bootstrap/toogle/js/bootstrap-toggle.min.js');?>"></script>
	<script src="<?=base_url('_assets/js/biginteger.js');?>"></script>
	<script src="//oss.maxcdn.com/momentjs/2.8.2/moment.min.js"></script>
</body>

</html>

