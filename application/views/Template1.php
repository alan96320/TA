<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Home |</title>
  <link rel="icon" type="image/ico" href="<?=base_url('_assets/images/icon.ico');?>">
  <link rel="stylesheet" href="<?=base_url('_assets/new/vendors/ti-icons/css/themify-icons.css')?>">
  <link rel="stylesheet" href="<?=base_url('_assets/new/css/style.css')?>">

  <link href="<?=base_url('_assets/_icon/css/all.css');?>" rel="stylesheet">
  <link href="<?=base_url('_assets/_bootstrap/css/bootstrap.css');?>" rel="stylesheet">
  <link href="<?=base_url('_assets/_bootstrap/bootstrap.min.css');?>" rel="stylesheet">

  
  <link href="<?=base_url('_assets/css/style.css');?>" rel="stylesheet">
  <link href="<?=base_url('_assets/date/css/gijgo.min.css');?>" rel="stylesheet">
  <script src="<?=base_url('_assets/js/jquery-3.3.1.min.js');?>"></script>
  <script src="<?=base_url('_assets/_currency/jquery.mask.min.js');?>"></script>
  <link href="<?=base_url('_assets/css/dataTables.bootstrap4.min.css');?>" rel="stylesheet">
  <link href="<?=base_url('_assets/css/bootstrapValidator.css');?>" rel="stylesheet">
  <link href="<?=base_url('_assets/_bootstrap/toogle/css/bootstrap-toggle.min.css');?>" rel="stylesheet">
  <script src="<?=base_url('_assets/sweetalert/sweetalert.min.js');?>"></script>

</head>
<body>

<div class="d-flex navbar navbar-dark bg-dark navbar-fixed-top" id="slide" style="position: fixed; margin-left: 200px">
  <!-- toggle menu -->
  <div class="mr-auto p-2 geser" style="color: white" >
    <button class="navbar-toggler hide" type="button" id="toogle-open">
      <span class="navbar-toggler-icon"></span>
      <span class="text-white">Open</span>
    </button>
    <button class="navbar-toggler" type="button" id="toogle-close">
      <span class="navbar-toggler-icon"></span>
      <span class="text-white">Close</span>
    </button>
  </div>
  <!-- Notifikasi -->
  <div class="p-2" >
    <a href="#" class="nav-link" data-toggle="dropdown" style="color: white"><i class="fa fa-bell fa-fw"></i></a>
    <div class="dropdown-menu dropdown-menu-right" style="width:300px;">
      <a href="#" class="dropdown-item">
          <div style="font-size: 14px; font-family: Times;">
              <i class="fa fa-comment fa-fw" ></i> Pesan Baru
              <span class="float-right text-muted small">Contoh 4 menit yg lalu</span>
          </div>
      </a>
        <div class="dropdown-divider"></div>
        <a href="#"class="dropdown-item text-center" style="font-size: 14px; font-family: Times;">
          <b>Lihat Semua Pesan</b><i class="fa fa-angle-right fa-fw"></i>
        </a>
    </div>
  </div>
  <!-- profile dan logout -->
  <div class="p-2" style="color: white">
    <a href="#" class="nav-link" data-toggle="dropdown" style="color: white"><i class="fa fa-user fa-fw"></i></a>
    <div class="dropdown-menu dropdown-menu-right">
          <a href="#" class="dropdown-item" style="font-size: 14px; font-family: Times;">
            <i class="fa fa-user fa-fw"></i> Lihat Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?=base_url('keluar')?>"class="dropdown-item" style="font-size: 14px; font-family: Times;">
            <i class="fa fa-sign-out-alt fa-fw"></i><span class="text-danger"><b>Logout</b> </span>
          </a>
      </div>
  </div>
</div>
  <?php 
    $luser= $this->session->userdata('level_user'); 
    $lcompany= $this->session->userdata('level_company');
    ?>
  <!--Pengaturan Menu-->
  <div id="side-menu" class="side-nav">
    <nav id="sidebar">
      <div class="sidebar-header">
          <h5>Aplikasi Termin</h5>
      </div>
      <ul class="list-unstyled components">
        <p>Dummy Heading</p>
        <li class="active" id="dashboard">
            <a href="Home"><i class="fa fa-tachometer-alt fa-fw"></i> Dashboard</a>
        </li>
      <?php if ($luser== 1 && $lcompany == 3 || $luser== 2 && $lcompany == 3 || $lcompany == 1 ) { ?>
        <li>
          <a href="#data" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <i class="fa fa-folder fa-fw"></i> Data
          </a>
          <ul class="collapse list-unstyled" id="data">
            <li>
                <a href="Users"><i class="fa fa-user fa-fw"></i> Users</a>
            </li>
            <li>
                <a href="Companies"><i class="fa fa-building fa-fw"></i> All Companies</a>
            </li>
            <li>
                <a href="Bobot"><i class="fa fa-comment-dots fa-fw"></i> Pekerjaan</a>
            </li> 
            <li>
                <a href="Proyek"><i class="fa fa-hard-hat fa-fw"></i> Proyek</a>
            </li>        
          </ul>
        </li>
      <?php } ?>
        <?php if ($luser== 1 && $lcompany == 2 || $luser== 2 && $lcompany == 2 || $lcompany == 1) { ?>
        <li id="Pengajuan">
            <a href="Pengajuan" ><i class="fa fa-file-signature fa-fw"></i> Pengajuan</a>
        </li>
        <?php } ?>
        <?php if ($lcompany == 3 || $lcompany == 1 ) { ?>
        <li id="Pemeriksaan">
            <a href="Pemeriksaan"><i class="fa fa-file-signature fa-fw"></i> 
              <?php if ($luser == 3 || $luser == 4 ) { ?>
                Pemeriksaan
              <?php }else{ ?>
                Pengesahan
              <?php } ?>
            </a>
        </li>
        <?php } ?>
        <li>
          <a href="#laporan" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <i class="fa fa-file-archive fa-fw"></i> laporan
          </a>
          <ul class="collapse list-unstyled" id="laporan">
            <?php if ($this->session->userdata('level_user') == 1 && $this->session->userdata('level_company') == 3) { ?>
            <li>
              <a href="#" id="Lap_Proyek"><i class="fa fa-hard-hat fa-fw"></i> Proyek</a>
            </li>
            <?php }elseif ($this->session->userdata('level_user') == 1 || $this->session->userdata('level_user') == 2 && $this->session->userdata('level_company') == 2) { ?>
            <li>
              <a href="#" id="Lap_Pengajuan"><i class="fa fa-file-signature fa-fw"></i> Pengajuan</a>
            </li>
          <?php } ?>
          <?php if ($this->session->userdata('level_user') != 1 && $this->session->userdata('level_company') == 3) { ?>
            <li>
              <a href="#" id="Lap_Pemeriksaan"><i class="fa fa-file-signature fa-fw"></i> Pemeriksaan</a>
            </li>
            <?php } ?>
            <?php if ($this->session->userdata('level_user') == 1 && $this->session->userdata('level_company') == 3) { ?>
            <li>
              <a href="#" id="Lap_Pengesahan"><i class="fa fa-file-signature fa-fw"></i> Pengesahan</a>
            </li>
            <?php } ?>
          </ul>
        </li>
      </ul>
      <ul class="list-unstyled CTAs">
      </ul>
    </nav>
  </div>

 <!--Pengaturan ISI-->
  <div class="position-relative" id="tengah" style="margin-left: 200px">
    <div style="margin-top: 70px">

      <?=$contents?>

    </div>
  </div>
  <!--Pengaturan Footer/Bawah-->
  <div class="fixed-bottom" id="bawah" style="margin-left: 200px">
    <div class="card-footer text-muted" style="height: 40px">
      <p class="align-middle" style="color: bold">@Copyright 2019</p>
    </div>
  </div>
  <script> 
    $(document).ready(function(){

      $('#Lap_Proyek').click(function(){
        window.open('exporProyek', '_blank');
      });
      $('#Lap_Pengajuan').click(function(){
        window.open('ExportPengajaun', '_blank');
      });
      $('#Lap_Pemeriksaan').click(function(){
        window.open('ExportPDF', '_blank');
        <?=$this->session->set_flashdata('message','pemeriksaan');?>
      });
      $('#Lap_Pengesahan').click(function(){
        window.open('ExportPDF', '_blank');
      });
      $("#toogle-open").click(function(){
        $("#slide").animate({marginLeft: '200px'});
        $("#bawah").animate({marginLeft: '200px'});
        $("#tengah").animate({marginLeft: '200px'});
        $("#side-menu").animate({marginLeft: '+=200px'});
        $('.tbhharga').animate({marginRight: '-=80'});
        $('.tbhbobot').animate({marginRight: '-=80'});
        $("#toogle-open").addClass('hide');
        $("#toogle-close").removeClass('hide');
      });
      $("#toogle-close").click(function(){
        $("#slide").animate({marginLeft: '-=200px'});
        $("#bawah").animate({marginLeft: '-=200px'});
        $("#tengah").animate({marginLeft: '-=200px'});
        $("#side-menu").animate({marginLeft: '-=200px'});
        $('.tbhharga').animate({marginRight: '+=80'});
        $('.tbhbobot').animate({marginRight: '+=80'});
        $("#toogle-open").removeClass('hide');
        $("#toogle-close").addClass('hide');
      });
    });
  </script> 
  <!-- plugins:js -->
  <script src="<?=base_url('_assets/new/');?>vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="<?=base_url('_assets/new/');?>vendors/chart.js/Chart.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?=base_url('_assets/new/');?>js/off-canvas.js"></script>
  <script src="<?=base_url('_assets/new/');?>js/hoverable-collapse.js"></script>
  <script src="<?=base_url('_assets/new/');?>js/template.js"></script>
  <script src="<?=base_url('_assets/new/');?>js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?=base_url('_assets/new/');?>js/dashboard.js"></script>
  <!-- End custom js for this page-->
  
  <script src="<?=base_url('_assets/js/jquery-1.10.2.js');?>"></script>
  <script src="<?=base_url('_assets/_icon/js/all.js');?>"></script>
  <script src="<?=base_url('_assets/_bootstrap/bootstrap.min.js');?>"></script>
  <script src="<?=base_url('_assets/js/jquery.dataTables.min.js');?>"></script>
  <script src="<?=base_url('_assets/js/dataTables.bootstrap4.min.js');?>"></script>
  <script src="<?=base_url('_assets/js/all.js');?>"></script>
  <script src="<?=base_url('_assets/js/bootstrapValidator.js');?>"></script>
  <script src="<?=base_url('_assets/date/js/gijgo.min.js');?>"></script>
  <script src="<?=base_url('_assets/_bootstrap/toogle/js/bootstrap-toggle.min.js');?>"></script>
  <script src="<?=base_url('_assets/js/biginteger.js');?>"></script>
  <script src="//oss.maxcdn.com/momentjs/2.8.2/moment.min.js"></script>

  <!-- <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script> -->







</body>

</html>