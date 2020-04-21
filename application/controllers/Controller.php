<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Models');
		require_once APPPATH.'fpdf_v1.82/fpdf.php';
	}

	public function getDataBar()
	{
		$th = date('Y');
		$id = $this->session->userdata('perusahaan');
		$luser = $this->session->userdata('level_user');
		$lcompany = $this->session->userdata('level_company');
		if ($lcompany != 3 ) {
			$sum = $this->db->query("SELECT count(*) as total FROM tb_pengajuan WHERE company_id = '$id' AND YEAR(created)='$th' ")->result();
			$appr = $this->db->query("
				SELECT count(*) as total FROM tb_pengajuan 
				WHERE company_id = '$id' AND YEAR(created)='$th' AND statusPengajuan = 2 OR statusPengajuan = 3 OR statusPengajuan = 4 OR statusPengajuan = 5 OR statusPengajuan = 6 OR statusPengajuan = 7 OR statusPengajuan = 9 OR statusPengajuan = 10 OR statusPengajuan = 11 OR statusPengajuan = 12
			")->result();
			$pend = $this->db->query("
				SELECT count(*) as total FROM tb_pengajuan 
				WHERE company_id = '$id' AND YEAR(created)='$th' AND statusPengajuan = 1
			")->result();
			$rejec = $this->db->query("
				SELECT count(*) as total FROM tb_pengajuan 
				WHERE company_id = '$id' AND YEAR(created)='$th' AND statusPengajuan = 8
			")->result();
			$data = array(
				'luser' => $luser,
				'lcompany' => $lcompany,
				'semua' => $sum,
				'approve' => $appr,
				'pending' => $pend,
				'reject' => $rejec,	 
			);
			echo json_encode($data);
		}else{
			if ($luser == 1) {//untuk direktur
				$sum = $this->db->query("
					SELECT count(*) as total FROM tb_pengajuan 
					WHERE YEAR(created)='$th' AND statusPengajuan = 5 OR statusPengajuan = 6 OR statusPengajuan = 7 OR statusPengajuan = 12
					")->result();
				$appr = $this->db->query("
					SELECT count(*) as total FROM tb_pengajuan 
					WHERE YEAR(created)='$th' AND statusPengajuan = 6 OR statusPengajuan = 7
				")->result();
				$pend = $this->db->query("
					SELECT count(*) as total FROM tb_pengajuan 
					WHERE YEAR(created)='$th' AND statusPengajuan = 5
				")->result();
				$rejec = $this->db->query("
					SELECT count(*) as total FROM tb_pengajuan 
					WHERE YEAR(created)='$th' AND statusPengajuan = 12
				")->result();
				$data = array(
					'luser' => $luser,
					'lcompany' => $lcompany,
					'semua' => $sum,
					'approve' => $appr,
					'pending' => $pend,
					'reject' => $rejec,	 
				);
				echo json_encode($data);
			}elseif ($luser == 3) { //untuk officer project
				$sum = $this->db->query("
					SELECT count(*) as total FROM tb_pengajuan 
					WHERE YEAR(created)='$th'
					")->result();
				$appr = $this->db->query("
					SELECT count(*) as total FROM tb_pengajuan 
					WHERE YEAR(created)='$th' AND statusPengajuan = 2 OR statusPengajuan = 3 OR statusPengajuan = 4 OR statusPengajuan = 5 OR statusPengajuan = 6 OR statusPengajuan = 7
				")->result();
				$pend = $this->db->query("
					SELECT count(*) as total FROM tb_pengajuan 
					WHERE YEAR(created)='$th' AND statusPengajuan = 1
				")->result();
				$rejec = $this->db->query("
					SELECT count(*) as total FROM tb_pengajuan 
					WHERE YEAR(created)='$th' AND statusPengajuan = 8
				")->result();
				$data = array(
					'luser' => $luser,
					'lcompany' => $lcompany,
					'semua' => $sum,
					'approve' => $appr,
					'pending' => $pend,
					'reject' => $rejec,	 
				);
				echo json_encode($data);
			}elseif ($luser == 4) { //untuk engginering
				$sum = $this->db->query("
					SELECT count(*) as total FROM tb_pengajuan 
					WHERE YEAR(created)='$th' AND statusPengajuan = 2 OR statusPengajuan = 3 OR statusPengajuan = 4 OR statusPengajuan = 5 OR statusPengajuan = 6 OR statusPengajuan = 7 OR statusPengajuan = 9 OR statusPengajuan = 10 OR statusPengajuan = 11 OR statusPengajuan = 12
					")->result();
				$appr = $this->db->query("
					SELECT count(*) as total FROM tb_pengajuan 
					WHERE YEAR(created)='$th' AND statusPengajuan = 3 OR statusPengajuan = 4 OR statusPengajuan = 5 OR statusPengajuan = 6 OR statusPengajuan = 7
				")->result();
				$pend = $this->db->query("
					SELECT count(*) as total FROM tb_pengajuan 
					WHERE YEAR(created)='$th' AND statusPengajuan = 2
				")->result();
				$rejec = $this->db->query("
					SELECT count(*) as total FROM tb_pengajuan 
					WHERE YEAR(created)='$th' AND statusPengajuan = 9
				")->result();
				$data = array(
					'luser' => $luser,
					'lcompany' => $lcompany,
					'semua' => $sum,
					'approve' => $appr,
					'pending' => $pend,
					'reject' => $rejec,	 
				);
				echo json_encode($data);
			}elseif ($luser == 5) { //untuk Kepala Devisi
				$sum = $this->db->query("
					SELECT count(*) as total FROM tb_pengajuan 
					WHERE YEAR(created)='$th' AND statusPengajuan = 3 OR statusPengajuan = 4 OR statusPengajuan = 5 OR statusPengajuan = 6 OR statusPengajuan = 7 OR statusPengajuan = 10 OR statusPengajuan = 11 OR statusPengajuan = 12
					")->result();
				$appr = $this->db->query("
					SELECT count(*) as total FROM tb_pengajuan 
					WHERE YEAR(created)='$th' AND statusPengajuan = 4 OR statusPengajuan = 5 OR statusPengajuan = 6 OR statusPengajuan = 7
				")->result();
				$pend = $this->db->query("
					SELECT count(*) as total FROM tb_pengajuan 
					WHERE YEAR(created)='$th' AND statusPengajuan = 3
				")->result();
				$rejec = $this->db->query("
					SELECT count(*) as total FROM tb_pengajuan 
					WHERE YEAR(created)='$th' AND statusPengajuan = 10
				")->result();
				$data = array(
					'luser' => $luser,
					'lcompany' => $lcompany,
					'semua' => $sum,
					'approve' => $appr,
					'pending' => $pend,
					'reject' => $rejec,	 
				);
				echo json_encode($data);
			}elseif ($luser == 6) { //untuk Pimpinan Proyek
				$sum = $this->db->query("
					SELECT count(*) as total FROM tb_pengajuan 
					WHERE YEAR(created)='$th' AND statusPengajuan = 4 OR statusPengajuan = 5 OR statusPengajuan = 6 OR statusPengajuan = 7 OR statusPengajuan = 11 OR statusPengajuan = 12
					")->result();
				$appr = $this->db->query("
					SELECT count(*) as total FROM tb_pengajuan 
					WHERE YEAR(created)='$th' AND statusPengajuan = 5 OR statusPengajuan = 6 OR statusPengajuan = 7
				")->result();
				$pend = $this->db->query("
					SELECT count(*) as total FROM tb_pengajuan 
					WHERE YEAR(created)='$th' AND statusPengajuan = 4
				")->result();
				$rejec = $this->db->query("
					SELECT count(*) as total FROM tb_pengajuan 
					WHERE YEAR(created)='$th' AND statusPengajuan = 11
				")->result();
				$data = array(
					'luser' => $luser,
					'lcompany' => $lcompany,
					'semua' => $sum,
					'approve' => $appr,
					'pending' => $pend,
					'reject' => $rejec,	 
				);
				echo json_encode($data);
			}elseif ($luser == 7) { //untuk finance
				$sum = $this->db->query("
					SELECT count(*) as total FROM tb_pengajuan 
					WHERE YEAR(created)='$th' AND statusPengajuan = 6 OR statusPengajuan = 7
					")->result();
				$appr = $this->db->query("
					SELECT count(*) as total FROM tb_pengajuan 
					WHERE YEAR(created)='$th' AND statusPengajuan = 7
				")->result();
				$pend = $this->db->query("
					SELECT count(*) as total FROM tb_pengajuan 
					WHERE YEAR(created)='$th' AND statusPengajuan = 6
				")->result();
				$rejec = $this->db->query("
					SELECT count(*) as total FROM tb_pengajuan 
					WHERE YEAR(created)='$th' AND statusPengajuan = 0
				")->result();
				$data = array(
					'luser' => $luser,
					'lcompany' => $lcompany,
					'semua' => $sum,
					'approve' => $appr,
					'pending' => $pend,
					'reject' => $rejec,	 
				);
				echo json_encode($data);
			}
		}
	}

// function untuk dashboard / halaman utama
	public function Dashboard()
	{
		check_not_login();
		$this->template->load('Template','Dashboard');
	}

// function untuk login
	public function login()
	{
		check_already_login();
		$this->load->view('Login');
	}

	public function proses_login()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($post['login'])) {
			$query = $this->Models->login($post);
			if ($query->num_rows() > 0) {
				$row = $query->row();
				$params = array(
					'userid' => $row->user_id,
					'level_user' => $row->level_user,
					'level_company' => $row->level,
					'perusahaan' => $row->company_id,
					'username' => $row->username,
				);
				$this->session->set_userdata($params);
				echo "<script>
					window.location='".base_url('Home')."';
				</script>";
			}else{
				echo $this->session->set_flashdata('message','<script>swal("Opss !!","Username Atau Password Salah", "error")</script>');
				redirect('masuk');
			}
		}
	}

// function untuk logout
	public function logout()
	{
		$params = array('userid','level_user');
		$this->session->unset_userdata($params);
		redirect('masuk');
	}

// function untuk user
	public function users()
	{
		check_not_login();
		$user= $this->Models->getUsers();
		$company= $this->Models->getCompany();
		$data = array(
			'row' => $user ,
			'company' => $company,
			'pesan' => ''
		);
		$this->template->load('Template','users',$data);
	}
	public function getUser()
	{
		$data = $this->Models->getUsers()->result();
		echo json_encode($data);
	}
	public function addUsers()
	{
		$post = $this->input->post(null, TRUE);
		$this->Models->addUser($post);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_tempdata('message','<script>swal({
                                    title: "Good Job !!",
                                    text: "Data Berhasil Ditambahkan",
                                    icon: "success"
                                });</script>',60);
			redirect('Users');
		}
	}

	public function delUser()
	{
		$data = $this->Models->delUser();
		echo $data;
	}

	public function editUser()
	{
		$post = $this->input->post(null, TRUE);
		$this->Models->editUser($post);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_tempdata('message','<script>swal({
                                    title: "Good Job !!",
                                    text: "Data Berhasil Dirubah",
                                    icon: "success"
                                });</script>',60);
			redirect('Users');
		}
	}

// funtion untuk perusahaan
	public function Companies()
	{
		check_not_login();
		$company= $this->Models->getCompany();
		$data = array(
			'company' => $company,
			'pesan' => ''
		);
		$this->template->load('Template','Companies',$data);
	}
	public function getCompany()
	{
		$data = $this->Models->getCompany()->result();
		echo json_encode($data);
	}
	public function addcompany()
	{
		$post = $this->input->post(null, TRUE);
		$this->Models->addcompany($post);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_tempdata('message','<script>swal({
                                    title: "Good Job !!",
                                    text: "Data Berhasil Ditambahkan",
                                    icon: "success"
                                });</script>',60);
			redirect('Companies');
		}
	}
	public function delCompany()
	{
		$data = $this->Models->delCompany();
		if ($this->db->affected_rows($data) > 0) {
			echo "berhasil";
		}else{
			echo "gagal";
		}
	}
	public function editcompany()
	{
		$post = $this->input->post(null, TRUE);
		$this->Models->editcompany($post);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_tempdata('message','<script>swal({
                                    title: "Good Job !!",
                                    text: "Data Berhasil Diedit",
                                    icon: "success"
                                });</script>',60);
			redirect('Companies');
		}
	}

// function untuk bobot
	public function Bobot()
	{
		check_not_login();
		$this->template->load('Template','Bobot');
	}
	public function getBobot()
	{	
		$data = $this->Models->getBobot();
		echo json_encode($data);
	}
	public function addBobot()
	{
		$post = $this->input->post(null, TRUE);
		$data = $this->Models->addBobot($post);
		echo json_encode($data);
	}
	public function EditBobot()
	{
		$post = $this->input->post(null, TRUE);
		$data = $this->Models->EditBobot($post);
		echo "berhasil";
	}
	public function delBobot()
	{
		$data = $this->Models->delBobot();
		if ($this->db->affected_rows($data) > 0) {
			echo "berhasil";
		}else{
			echo "gagal";
		}
	}

// function untuk proyek
	public function Proyek()
	{
		check_not_login();
		$perusahaan = $this->Models->GetPerusahaan();
		$proyek = $this->Models->GetProyek();
		$type = $this->Models->getType();
		$data = array(
			'perusahaan' => $perusahaan, 
			'proyek' => $proyek, 
			'type' => $type,
		);
		$this->template->load('Template','Proyek',$data);
	}
	public function GetProyek()
	{
		$data = $this->Models->GetProyek();
		echo json_encode($data);
	}
	public function getpembangunan(){
		$data = $this->Models->getpembangunan();
		echo json_encode($data);
	}
	
	public function getBlok()
	{
		$data = $this->Models->getBlok();
		echo json_encode($data);
	}
	
	public function Reset(){
		$data = $this->Models->Reset();
		echo json_encode($data);
	}
	public function saveblok()
	{
		$post = $this->input->post(null, TRUE);
		$data = $this->Models->saveblok($post);
		$this->session->set_tempdata('id',$this->input->post('idpembangunan'),300);
		echo json_encode($data);
	}
	public function hapusblok()
	{
		$data = $this->Models->hapusblok();
		echo json_encode($data);
	}
	public function savePembangunan()
	{
		$data = $this->Models->savePembangunan();
		echo json_encode($data);		
	}
	public function hapuspembangunan()
	{
		$data = $this->Models->hapuspembangunan();
		echo json_encode($data);
	}
	public function saveproyek()
	{
		$data = $this->Models->saveproyek();
		echo json_encode($data);
	}
	public function hapusproyek()
	{
		$post = $this->input->post(null, TRUE);
		$data = $this->Models->hapusproyek($post);
	}
	public function getProyekByID()
	{
		$data = $this->Models->getProyekByID();
		echo json_encode($data);
	}
	public function blokPerIDPembangunan()
	{
		$data = $this->Models->blokPerIDPembangunan();
		echo json_encode($data);
	}
	public function hapusBlokPerID()
	{
		$data = $this->Models->hapusBlokPerID();
		echo json_encode($data);
	}
	public function hapusAllBlokEdit()
	{
		$data = $this->Models->hapusAllBlokEdit();
		echo json_encode($data);
	}
	public function editproyek()
	{
		$data = $this->Models->editproyek();
		echo json_encode($data);
	}

// function untuk Pengajuan
	public function Pengajuan()
	{
		check_not_login();
		$Proyek= $this->Models->getproyek2();
		$data = array(
			'proyek' => $Proyek,
		);
		$this->template->load('Template','Pengajuan',$data);
	}
	public function getpembangunanProgres()
	{
		$data = $this->Models->getpembangunanProgres();
		echo json_encode($data);
	}
	public function getblokProgres()
	{
		$data = $this->Models->getblokProgres();
		echo json_encode($data);
	}
	public function getnomorProgres()
	{
		$data = $this->Models->getnomorProgres();
		echo json_encode($data);
	}
	public function cancelpengajuan()
	{
		$data = $this->Models->cancelpengajuan();
		$cek = $this->db->affected_rows($data);
		if ($cek > 0) {
			echo "berhasil";
		}else{
			echo "gagal";
		}
	}
	public function temporaryProgres()
	{
		$data = $this->Models->temporaryProgres();
		echo json_encode($data);
	}
	public function hapusProgresTemorary()
	{
		$data = $this->Models->hapusProgresTemorary();
		$cek = $this->db->affected_rows($data);
		if ($cek > 0) {
			echo "berhasil";
		}else{
			echo "gagal";
		}
	}
	public function getProgresTemoraryperID()
	{
		$data = $this->Models->getProgresTemoraryperID();
		echo json_encode($data);
	}
	public function getnomorProgresPerID()
	{
		$data = array(
			'bobot' => $this->Models->getnomorProgresPerID(),
			'bobotbefore' => $this->Models->cekProgresSebelumnya(),
		);
		echo json_encode($data);
	}
	public function savePerUnit()
	{
		$post = $this->input->post(null, TRUE);
		$data = $this->Models->savePerUnit($post);
		echo $data;
	}
	public function saveDataTemporary()
	{
		$data = $this->Models->saveDataTemporary();
		echo $data;
	}
	public function viewpembangunan()
	{
		$data = $this->Models->viewpembangunan();
		echo json_encode($data);
	}
	public function temporaryPembangunanPerID()
	{
		$data = $this->Models->temporaryPembangunanPerID();
		echo json_encode($data);
	}
	public function hapusPengajuanTemoraryPerID()
	{
		$data = $this->Models->hapusPengajuanTemoraryPerID();
		echo $data;
	}
	public function saveTemporarypengajuan()
	{
		$data = $this->Models->saveTemporarypengajuan();
		echo $data;
	}
	public function viewPengajuan()
	{
	    
		$data = $this->Models->viewPengajuan();
		echo json_encode($data);
		
	}
	public function lihatpengajuan()
	{
		//fungsi untuk format tanggal
		function tgl_indo($tanggal){
			$bulan = array (
				1 =>'Januari',
					'Februari',
					'Maret',
					'April',
					'Mei',
					'Juni',
					'Juli',
					'Agustus',
					'September',
					'Oktober',
					'November',
					'Desember'
			);
			$pecahkan = explode('/', $tanggal);
			return $pecahkan[0] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[2];
		}
		//fungsi untuk terbilang
		function penyebut($nilai) {
			$nilai = abs($nilai);
			$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
			$temp = "";
			if ($nilai < 12) {
				$temp = " ". $huruf[$nilai];
			} else if ($nilai <20) {
				$temp = penyebut($nilai - 10). " belas";
			} else if ($nilai < 100) {
				$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
			} else if ($nilai < 200) {
				$temp = " seratus" . penyebut($nilai - 100);
			} else if ($nilai < 1000) {
				$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
			} else if ($nilai < 2000) {
				$temp = " seribu" . penyebut($nilai - 1000);
			} else if ($nilai < 1000000) {
				$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
			} else if ($nilai < 1000000000) {
				$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
			} else if ($nilai < 1000000000000) {
				$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
			} else if ($nilai < 1000000000000000) {
				$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
			}     
			return $temp;
		}
	 
		function terbilang($nilai) {
			if($nilai<0) {
				$hasil = "minus ". trim(penyebut($nilai));
			} else {
				$hasil = trim(penyebut($nilai)).' rupiah';
			}     		
			return $hasil;
		}
		$pdf = new FPDF('P','mm','legal');
        $pdf->AddFont('Cambria','','cambria.php');//untuk menambhakan Font baru
        $pdf->AddFont('Cambria-BoldItalic','','cambria-bold-italic.php');//untuk menambhakan Font baru
        $pdf->AddFont('Cambria-Bold','','cambria-bold.php');//untuk menambhakan Font baru
        $pdf->AddFont('Cambria-Italic','','cambria-italic.php');//untuk menambhakan Font baru
        $pdf->AddPage();// membuat halaman baru
        // nama dan logo perusahaan
        $pdf->SetFont('Cambria-Bold','',20);
        $id = $this->input->post('id');
        $idCompany = $this->session->userdata('perusahaan');
        $data = $this->db->query("
        	SELECT * FROM tb_progres a
			JOIN tb_pengajuan b ON b.pengajuan_id = a.pengajuan_id
			JOIN tb_pembangunan c ON c.pembangunan_id = b.pembangunan_id
			JOIN tb_proyek d ON d.proyek_id = c.proyek_id
			JOIN tb_company e ON e.company_id = d.company_id
			JOIN tb_bobot f ON f.bobot_id = c.bobot_id
			WHERE a.pengajuan_id = '$id' AND c.pembangunan_id = a.pembangunan_id 
		")->row();
		$tgl = $this->db->query("SELECT created FROM tb_pengajuan WHERE pengajuan_id = '$id'")->row();
        $date = date_create($tgl->created);

        $pdf->Cell('',8,$data->namaCompany,0,1,'C');

        $pdf->SetFont('Cambria-Bold','',12,'B');
		$pdf->Cell('',10,'PENGAJUAN OPNAME PEKERJAAN',0,1,'C');

        $pdf->SetFont('Cambria','',12);
        $pdf->Cell(40,15,'Invoice Ke-'.$data->pengajuan,0,0);//untuk nomor invoice
        $pdf->Cell(158,15,'Batam, '.tgl_indo(date_format($date,'d/m/Y')),0,1,'R');//untuk nomor invoice

        //untuk nama proyek
        $pdf->Cell(40,7,'Proyek',0,0);
        $pdf->Cell(3,7,':',0,0);
        $pdf->Cell('',7,$data->namaProyek,0,1);

        //untuk nomor spk
        $pdf->Cell(40,7,'Nomor SPK',0,0);
        $pdf->Cell(3,7,':',0,0);
        $pdf->Cell('',7,$data->nomorSPK,0,1);

        //untuk Nama Pekerjaan
        $pdf->Cell(40,7,'Pekerjaan',0,0);
        $pdf->Cell(3,7,':',0,0);
        $pdf->Cell('',7,'Pembangunan '.$data->jumlah.' Unit '.$data->nama,0,1);

        //untuk Waktu Pelaksanaan
        $pdf->Cell(40,7,'Waktu Pelaksanaan',0,0);
        $pdf->Cell(3,7,':',0,0);
        $pdf->Cell('',7,tgl_indo($data->wp_awal).'  s/d  '.tgl_indo($data->wp_akhir),0,1);

        //untuk Waktu Pelaksanaan
        $pdf->Cell(40,7,'Nilai Kontrak',0,0);
        $pdf->Cell(3,7,':',0,0);
        $pdf->Cell('',7,'Rp. '.number_format($data->total).' ,-',0,1);
        
        //untuk Waktu Progres s/d tanggal berapa
        $pdf->SetFont('Cambria-Italic','',12);
        $pdf->Cell(40,15,'Progres s/d Tanggal ',0,0);
        $pdf->Cell(3,15,'',0,0);
        $pdf->Cell('',15,tgl_indo(date_format($date,'d/m/Y')) ,0,1);

        $pdf->SetFillColor(210,221,242);
        $pdf->SetDrawColor(231,236,241);
        $pdf->SetFont('Cambria','',12);
        $pdf->Cell(10,10,'NO',1,0,'C',true);
        $pdf->Cell(70,10,'URAIAN PEKERJAAN',1,0,'C',true);
        $pdf->Cell(30,10,'PROGRES',1,0,'C',true);
        $pdf->Cell(30,10,'BOBOT',1,0,'C',true);
        $pdf->Cell(58,10,'KETERANGAN ',1,1,'C',true);

        //untuk isi
        $pdf->SetFont('Cambria','',10);
        $pdf->SetFillColor(255,255,255);
        $pdf->SetDrawColor(231,236,241);
        $get = $this->db->query("
        	SELECT *,(SELECT sum(progres) FROM tb_progres WHERE pembangunan_id= b.pembangunan_id) as progresAll
        	FROM tb_pengajuan a
        	JOIN tb_pembangunan b ON b.pembangunan_id = a.pembangunan_id
        	JOIN tb_proyek c ON c.proyek_id = b.proyek_id
        	JOIN tb_progres d ON d.pembangunan_id = b.pembangunan_id 
        	JOIN tb_blok e ON e.blok_id = d.blok_id
        	WHERE a.pengajuan_id = '$id'
        	GROUP BY d.blok_id
        	ORDER BY blok ASC
        	");
        $no=1;
        $x=0;
        foreach ($get->result() as $datax) {
        	$bobot = (100/$datax->jumlah)*$datax->progres/100;
	        $pdf->Cell(10,10,$no++,1,0,'C',true);
	        $pdf->Cell(70,10,'Blok '.$datax->blok.' No '.$datax->nomor,1,0,'L',true);
	        $pdf->Cell(30,10,$datax->progres.' %',1,0,'C',true);
	        $pdf->Cell(30,10,$bobot.' %',1,0,'C',true);
	        $pdf->Cell(58,10,'',1,1,'C',true);
	        $x=$x+10;
        }
        $bobotAll =(100/$datax->jumlah)*$datax->progresAll/100;
        $pdf->SetFont('Cambria','',12);
        $pdf->Cell(80,10,'JUMLAH',1,0,'C',true);
        $pdf->Cell(30,10,$datax->progresAll.' %',1,0,'C',true);
        $pdf->Cell(30,10,$bobotAll.' %',1,0,'C',true);
        $pdf->Cell(58,10,'',1,1,'C',true);

        $np = ($bobotAll*$datax->total)/100;
        $pajak = $np*2/100;
        $Retensi = $np*5/100;
        $tot = $np-$pajak-$Retensi;
        $pdf->SetFont('Courier','',11);
        $pdf->Cell(30,5,'',0,1);
        $pdf->Cell(70,7,'Nilai Progres',0,0);
        $pdf->Cell(5,7,':',0,0);
        $pdf->Cell(50,7,'Rp. '.number_format($np),0,1);
        $pdf->Cell(70,7,'Pajak 2%',0,0);
        $pdf->Cell(5,7,':',0,0);
        $pdf->Cell(50,7,'Rp. '.number_format($pajak),0,1);
        $pdf->Cell(70,7,'Retensi (5% x Nilai Progres)',0,0);
        $pdf->Cell(5,7,':',0,0);
        $pdf->Cell(50,7,'Rp. '.number_format($Retensi),0,1);

        $pdf->SetDrawColor(111,111,111);
        $pdf->SetLineWidth(0.5);
        $pdf->SetDash(2,2);
        $pdf->Cell(119,2,'','B',0);
        $pdf->Cell(5,2,'',0,0);
        $pdf->SetFont('Courier','',12);
        $pdf->Cell(10,4,'(-)',0,1);

        $pdf->SetFont('Courier','B',12);
        $pdf->Cell(70,7,'JUMLAH YANG DI BAYARKAN',0,0);
        $pdf->Cell(5,7,':',0,0);
        $pdf->Cell(50,7,'Rp. '.number_format($tot),0,1);

        $pdf->SetFont('Courier','I',10);
        $pdf->SetLineWidth(0.1);
        $pdf->SetDash();
        $pdf->SetFillColor(224,224,219);
        $pdf->SetDrawColor(224,224,219);
        $pdf->Cell(10,2,'',0,1);
        $pdf->Cell(25,9,'Terbilang :',1,0,'',true);
        $pdf->Cell(171,9,terbilang($tot),1,1,'',true);

		$developer = $this->db->query("SELECT * FROM tb_company WHERE level=3")->row();
	$status = $this->db->query("SELECT statusPengajuan FROM tb_pengajuan WHERE company_id = '$idCompany'")->row();
        $pdf->SetFont('Cambria','',10);
        $pdf->Cell(25,10,'',0,1);
        $pdf->Cell(98,5,'Dibuat Oleh',0,0,'C');
        $pdf->Cell(98,5,'Diperiksa Oleh',0,1,'C');
        $pdf->Cell(98,7,$data->namaCompany,0,0,'C');

        $pdf->Cell(98,7,$developer->namaCompany,0,1,'C');
        $pdf->Cell(49,25,'',0,0,'C');
        $pdf->Cell(49,25,'',0,0,'C');
        $pdf->Cell(49,25,'',0,0,'C');
        $pdf->Cell(49,25,'',0,1,'C');
        $KD = $this->db->query("SELECT * FROM tb_users WHERE company_id = '$idCompany' AND level_user = 1 ")->row();
        if ($this->db->affected_rows($KD) > 0) {
    		$pdf->Image(base_url('_assets/images/'.$KD->ttd),60,185+$x,48,20);
	        $pdf->Cell(49,5,$KD->namaLengkap,0,0,'C');
        }else{
        	$pdf->Cell(49,5,'.............',0,0,'C');
        }
        $KA = $this->db->query("SELECT * FROM tb_users WHERE company_id = '$idCompany' AND level_user = 2 ")->row();
        if ($this->db->affected_rows($KA) > 0) {
        	$pdf->Image(base_url('_assets/images/'.$KA->ttd),10,185+$x,49,20);
	        $pdf->Cell(49,5,$KA->namaLengkap,0,0,'C');
        }else{
        	$pdf->Cell(49,5,'.............',0,0,'C');
        }
        $OP = $this->db->query("SELECT * FROM tb_users WHERE level_user = 3 ")->row();
        if ($this->db->affected_rows($OP) > 0) {
        	if ($status->statusPengajuan == 2 || $status->statusPengajuan == 3 || $status->statusPengajuan == 4 || $status->statusPengajuan == 5 || $status->statusPengajuan == 6 || $status->statusPengajuan == 7) {
        		$pdf->Image(base_url('_assets/images/'.$OP->ttd),109,185+$x,48,20);
        	}
	        $pdf->Cell(49,5,$OP->namaLengkap,0,0,'C');
        }else{
        	$pdf->Cell(49,5,'.............',0,0,'C');
        }
        $EN = $this->db->query("SELECT * FROM tb_users WHERE level_user = 4 ")->row();
        if ($this->db->affected_rows($EN) > 0) {
        	if ($status->statusPengajuan == 3 || $status->statusPengajuan == 4 || $status->statusPengajuan == 5 || $status->statusPengajuan == 6 || $status->statusPengajuan == 7) {
        		$pdf->Image(base_url('_assets/images/'.$EN->ttd),158,185+$x,48,20);
        	}
	        $pdf->Cell(49,5,$EN->namaLengkap,0,1,'C');
        }else{
        	$pdf->Cell(49,5,'.............',0,1,'C');
        }
        $pdf->SetFont('Cambria','U',10);
        $pdf->Cell(49,10,'Project Admin',0,0,'C');
        $pdf->Cell(49,10,'Direktur',0,0,'C');
        $pdf->Cell(49,10,'Officer Project',0,0,'C');
        $pdf->Cell(49,10,'Engginering',0,1,'C');

        $pdf->SetFont('Cambria','',10);
        $pdf->Cell(25,10,'',0,1);
        $pdf->Cell(196,5,'Disetujui Oleh',0,1,'C');
        $pdf->Cell(196,7,$developer->namaCompany,0,1,'C');

        $pdf->Cell(49,25,'',0,0,'C');
        $pdf->Cell(49,25,'',0,0,'C');
        $pdf->Cell(49,25,'',0,0,'C');
        $pdf->Cell(49,25,'',0,1,'C');

        $KDV = $this->db->query("SELECT * FROM tb_users WHERE level_user = 5 ")->row();
        if ($this->db->affected_rows($KDV) > 0) {
        	if ($status->statusPengajuan == 4 || $status->statusPengajuan == 5 || $status->statusPengajuan == 6 || $status->statusPengajuan == 7) {
        		$pdf->Image(base_url('_assets/images/'.$KDV->ttd),10,245+$x,49,24);
        	}
	        $pdf->Cell(49,5,$KDV->namaLengkap,0,0,'C');
        }else{
        	$pdf->Cell(49,5,'.............',0,0,'C');
        }
        $Pimpro = $this->db->query("SELECT * FROM tb_users WHERE level_user = 6 ")->row();
        if ($this->db->affected_rows($Pimpro) > 0) {
        	if ($status->statusPengajuan == 5 || $status->statusPengajuan == 6 || $status->statusPengajuan == 7) {
        		$pdf->Image(base_url('_assets/images/'.$Pimpro->ttd),60,245+$x,49,24);
        	}
	        $pdf->Cell(49,5,$Pimpro->namaLengkap,0,0,'C');
        }else{
        	$pdf->Cell(49,5,'.............',0,0,'C');
        }
        $DD = $this->db->query("SELECT * FROM tb_users JOIN tb_company USING(company_id) WHERE level=3 AND level_user=1")->row();
        if ($this->db->affected_rows($DD) > 0) {
        	if ($status->statusPengajuan == 6 || $status->statusPengajuan == 7) {
        		$pdf->Image(base_url('_assets/images/'.$DD->ttd),109,245+$x,49,24);
        	}
	        $pdf->Cell(49,5,$DD->namaLengkap,0,0,'C');
        }else{
        	$pdf->Cell(49,5,'.............',0,0,'C');
        }
        $FN = $this->db->query("SELECT * FROM tb_users WHERE level_user = 7 ")->row();
        if ($this->db->affected_rows($FN) > 0) {
        	if ($status->statusPengajuan == 7) {
        		$pdf->Image(base_url('_assets/images/'.$FN->ttd),158,245+$x,49,24);
        	}
	        $pdf->Cell(49,5,$FN->namaLengkap,0,1,'C');
        }else{
        	$pdf->Cell(49,5,'.............',0,1,'C');
        }
        $pdf->SetFont('Cambria','U',10);
        $pdf->Cell(49,10,'Kepala Devisi',0,0,'C');
        $pdf->Cell(49,10,'Pimpinan Proyek',0,0,'C');
        $pdf->Cell(49,10,'Direktur',0,0,'C');
        $pdf->Cell(49,10,'Finance',0,1,'C');



        $pdf->Output();
	}

// function untuk pemeriksaan
	public function Pemeriksaan()
	{
		check_not_login();
		$data = array('pemeriksaan' => $this->Models->GetPemeriksaan() );
		$this->template->load('Template','pemeriksaan',$data);
	}
	public function lihatpemeriksaan()
	{
		//fungsi untuk format tanggal
		function tgl_indo($tanggal){
			$bulan = array (
				1 =>'Januari',
					'Februari',
					'Maret',
					'April',
					'Mei',
					'Juni',
					'Juli',
					'Agustus',
					'September',
					'Oktober',
					'November',
					'Desember'
			);
			$pecahkan = explode('/', $tanggal);
			return $pecahkan[0] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[2];
		}
		//fungsi untuk terbilang
		function penyebut($nilai) {
			$nilai = abs($nilai);
			$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
			$temp = "";
			if ($nilai < 12) {
				$temp = " ". $huruf[$nilai];
			} else if ($nilai <20) {
				$temp = penyebut($nilai - 10). " belas";
			} else if ($nilai < 100) {
				$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
			} else if ($nilai < 200) {
				$temp = " seratus" . penyebut($nilai - 100);
			} else if ($nilai < 1000) {
				$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
			} else if ($nilai < 2000) {
				$temp = " seribu" . penyebut($nilai - 1000);
			} else if ($nilai < 1000000) {
				$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
			} else if ($nilai < 1000000000) {
				$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
			} else if ($nilai < 1000000000000) {
				$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
			} else if ($nilai < 1000000000000000) {
				$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
			}     
			return $temp;
		}
	 
		function terbilang($nilai) {
			if($nilai<0) {
				$hasil = "minus ". trim(penyebut($nilai));
			} else {
				$hasil = trim(penyebut($nilai)).' rupiah';
			}     		
			return $hasil;
		}
		$pdf = new FPDF('P','mm','legal');
        $pdf->AddFont('Cambria','','cambria.php');//untuk menambhakan Font baru
        $pdf->AddFont('Cambria-BoldItalic','','cambria-bold-italic.php');//untuk menambhakan Font baru
        $pdf->AddFont('Cambria-Bold','','cambria-bold.php');//untuk menambhakan Font baru
        $pdf->AddFont('Cambria-Italic','','cambria-italic.php');//untuk menambhakan Font baru
        $pdf->AddPage();// membuat halaman baru
        // nama dan logo perusahaan
        $pdf->SetFont('Cambria-Bold','',20);
        $id = $this->input->post('id');
        $data = $this->db->query("
        	SELECT * FROM tb_progres a
			JOIN tb_pengajuan b ON b.pengajuan_id = a.pengajuan_id
			JOIN tb_pembangunan c ON c.pembangunan_id = b.pembangunan_id
			JOIN tb_proyek d ON d.proyek_id = c.proyek_id
			JOIN tb_company e ON e.company_id = d.company_id
			JOIN tb_bobot f ON f.bobot_id = c.bobot_id
			WHERE a.pengajuan_id = '$id' AND c.pembangunan_id = a.pembangunan_id 
		")->row();
		$tgl = $this->db->query("SELECT created FROM tb_pengajuan WHERE pengajuan_id = '$id'")->row();
        $date = date_create($tgl->created);

        $pdf->Cell('',8,$data->namaCompany,0,1,'C');

        $pdf->SetFont('Cambria-Bold','',12,'B');
		$pdf->Cell('',10,'PENGAJUAN OPNAME PEKERJAAN',0,1,'C');

        $pdf->SetFont('Cambria','',12);
        $pdf->Cell(40,15,'Invoice Ke-'.$data->pengajuan,0,0);//untuk nomor invoice
        $pdf->Cell(158,15,'Batam, '.tgl_indo(date_format($date,'d/m/Y')),0,1,'R');//untuk nomor invoice

        //untuk nama proyek
        $pdf->Cell(40,7,'Proyek',0,0);
        $pdf->Cell(3,7,':',0,0);
        $pdf->Cell('',7,$data->namaProyek,0,1);

        //untuk nomor spk
        $pdf->Cell(40,7,'Nomor SPK',0,0);
        $pdf->Cell(3,7,':',0,0);
        $pdf->Cell('',7,$data->nomorSPK,0,1);

        //untuk Nama Pekerjaan
        $pdf->Cell(40,7,'Pekerjaan',0,0);
        $pdf->Cell(3,7,':',0,0);
        $pdf->Cell('',7,'Pembangunan '.$data->jumlah.' Unit '.$data->nama,0,1);

        //untuk Waktu Pelaksanaan
        $pdf->Cell(40,7,'Waktu Pelaksanaan',0,0);
        $pdf->Cell(3,7,':',0,0);
        $pdf->Cell('',7,tgl_indo($data->wp_awal).'  s/d  '.tgl_indo($data->wp_akhir),0,1);

        //untuk Waktu Pelaksanaan
        $pdf->Cell(40,7,'Nilai Kontrak',0,0);
        $pdf->Cell(3,7,':',0,0);
        $pdf->Cell('',7,'Rp. '.number_format($data->total).' ,-',0,1);
        
        //untuk Waktu Progres s/d tanggal berapa
        $pdf->SetFont('Cambria-Italic','',12);
        $pdf->Cell(40,15,'Progres s/d Tanggal ',0,0);
        $pdf->Cell(3,15,'',0,0);
        $pdf->Cell('',15,tgl_indo(date_format($date,'d/m/Y')) ,0,1);

        $pdf->SetFillColor(210,221,242);
        $pdf->SetDrawColor(231,236,241);
        $pdf->SetFont('Cambria','',12);
        $pdf->Cell(10,10,'NO',1,0,'C',true);
        $pdf->Cell(70,10,'URAIAN PEKERJAAN',1,0,'C',true);
        $pdf->Cell(30,10,'PROGRES',1,0,'C',true);
        $pdf->Cell(30,10,'BOBOT',1,0,'C',true);
        $pdf->Cell(58,10,'KETERANGAN ',1,1,'C',true);

        //untuk isi
        $pdf->SetFont('Cambria','',10);
        $pdf->SetFillColor(255,255,255);
        $pdf->SetDrawColor(231,236,241);
        $get = $this->db->query("
        	SELECT *,(SELECT sum(progres) FROM tb_progres WHERE pembangunan_id= b.pembangunan_id) as progresAll
        	FROM tb_pengajuan a
        	JOIN tb_pembangunan b ON b.pembangunan_id = a.pembangunan_id
        	JOIN tb_proyek c ON c.proyek_id = b.proyek_id
        	JOIN tb_progres d ON d.pembangunan_id = b.pembangunan_id 
        	JOIN tb_blok e ON e.blok_id = d.blok_id
        	WHERE a.pengajuan_id = '$id'
        	GROUP BY d.blok_id
        	ORDER BY blok ASC
        	");
        $no=1;
        $x=0;
        foreach ($get->result() as $datax) {
        	$bobot = (100/$datax->jumlah)*$datax->progres/100;
	        $pdf->Cell(10,10,$no++,1,0,'C',true);
	        $pdf->Cell(70,10,'Blok '.$datax->blok.' No '.$datax->nomor,1,0,'L',true);
	        $pdf->Cell(30,10,$datax->progres.' %',1,0,'C',true);
	        $pdf->Cell(30,10,$bobot.' %',1,0,'C',true);
	        $pdf->Cell(58,10,'',1,1,'C',true);
	        $x=$x+10;
        }
        $bobotAll =(100/$datax->jumlah)*$datax->progresAll/100;
        $pdf->SetFont('Cambria','',12);
        $pdf->Cell(80,10,'JUMLAH',1,0,'C',true);
        $pdf->Cell(30,10,$datax->progresAll.' %',1,0,'C',true);
        $pdf->Cell(30,10,$bobotAll.' %',1,0,'C',true);
        $pdf->Cell(58,10,'',1,1,'C',true);

        $np = ($bobotAll*$datax->total)/100;
        $pajak = $np*2/100;
        $Retensi = $np*5/100;
        $tot = $np-$pajak-$Retensi;
        $pdf->SetFont('Courier','',11);
        $pdf->Cell(30,5,'',0,1);
        $pdf->Cell(70,7,'Nilai Progres',0,0);
        $pdf->Cell(5,7,':',0,0);
        $pdf->Cell(50,7,'Rp. '.number_format($np),0,1);
        $pdf->Cell(70,7,'Pajak 2%',0,0);
        $pdf->Cell(5,7,':',0,0);
        $pdf->Cell(50,7,'Rp. '.number_format($pajak),0,1);
        $pdf->Cell(70,7,'Retensi (5% x Nilai Progres)',0,0);
        $pdf->Cell(5,7,':',0,0);
        $pdf->Cell(50,7,'Rp. '.number_format($Retensi),0,1);

        $pdf->SetDrawColor(111,111,111);
        $pdf->SetLineWidth(0.5);
        $pdf->SetDash(2,2);
        $pdf->Cell(119,2,'','B',0);
        $pdf->Cell(5,2,'',0,0);
        $pdf->SetFont('Courier','',12);
        $pdf->Cell(10,4,'(-)',0,1);

        $pdf->SetFont('Courier','B',12);
        $pdf->Cell(70,7,'JUMLAH YANG DI BAYARKAN',0,0);
        $pdf->Cell(5,7,':',0,0);
        $pdf->Cell(50,7,'Rp. '.number_format($tot),0,1);

        $pdf->SetFont('Courier','I',10);
        $pdf->SetLineWidth(0.1);
        $pdf->SetDash();
        $pdf->SetFillColor(224,224,219);
        $pdf->SetDrawColor(224,224,219);
        $pdf->Cell(10,2,'',0,1);
        $pdf->Cell(25,9,'Terbilang :',1,0,'',true);
        $pdf->Cell(171,9,terbilang($tot),1,1,'',true);

		$developer = $this->db->query("SELECT * FROM tb_company WHERE level=3")->row();
		$status = $this->db->query("SELECT statusPengajuan FROM tb_pengajuan WHERE pengajuan_id = '$id'")->row();
        $pdf->SetFont('Cambria','',10);
        $pdf->Cell(25,10,'',0,1);
        $pdf->Cell(98,5,'Dibuat Oleh',0,0,'C');
        $pdf->Cell(98,5,'Diperiksa Oleh',0,1,'C');
        $pdf->Cell(98,7,$data->namaCompany,0,0,'C');

        $pdf->Cell(98,7,$developer->namaCompany,0,1,'C');
        $pdf->Cell(49,25,'',0,0,'C');
        $pdf->Cell(49,25,'',0,0,'C');
        $pdf->Cell(49,25,'',0,0,'C');
        $pdf->Cell(49,25,'',0,1,'C');
        $idCompany = $data->company_id;
        $KD = $this->db->query("SELECT * FROM tb_users WHERE company_id = '$idCompany' AND level_user = 1 ")->row();
        if ($this->db->affected_rows($KD) > 0) {
    		$pdf->Image(base_url('_assets/images/'.$KD->ttd),60,185+$x,48,20);
	        $pdf->Cell(49,5,$KD->namaLengkap,0,0,'C');
        }else{
        	$pdf->Cell(49,5,'.............',0,0,'C');
        }
        $KA = $this->db->query("SELECT * FROM tb_users WHERE company_id = '$idCompany' AND level_user = 2 ")->row();
        if ($this->db->affected_rows($KA) > 0) {
        	$pdf->Image(base_url('_assets/images/'.$KA->ttd),10,185+$x,49,20);
	        $pdf->Cell(49,5,$KA->namaLengkap,0,0,'C');
        }else{
        	$pdf->Cell(49,5,'.............',0,0,'C');
        }
        $OP = $this->db->query("SELECT * FROM tb_users WHERE level_user = 3 ")->row();
        if ($this->db->affected_rows($OP) > 0) {
        	if ($status->statusPengajuan == 2 || $status->statusPengajuan == 3 || $status->statusPengajuan == 4 || $status->statusPengajuan == 5 || $status->statusPengajuan == 6 || $status->statusPengajuan == 7) {
        		$pdf->Image(base_url('_assets/images/'.$OP->ttd),109,185+$x,48,20);
        	}
	        $pdf->Cell(49,5,$OP->namaLengkap,0,0,'C');
        }else{
        	$pdf->Cell(49,5,'.............',0,0,'C');
        }
        $EN = $this->db->query("SELECT * FROM tb_users WHERE level_user = 4 ")->row();
        if ($this->db->affected_rows($EN) > 0) {
        	if ($status->statusPengajuan == 3 || $status->statusPengajuan == 4 || $status->statusPengajuan == 5 || $status->statusPengajuan == 6 || $status->statusPengajuan == 7) {
        		$pdf->Image(base_url('_assets/images/'.$EN->ttd),158,185+$x,48,20);
        	}
	        $pdf->Cell(49,5,$EN->namaLengkap,0,1,'C');
        }else{
        	$pdf->Cell(49,5,'.............',0,1,'C');
        }
        $pdf->SetFont('Cambria','U',10);
        $pdf->Cell(49,10,'Project Admin',0,0,'C');
        $pdf->Cell(49,10,'Direktur',0,0,'C');
        $pdf->Cell(49,10,'Officer Project',0,0,'C');
        $pdf->Cell(49,10,'Engginering',0,1,'C');

        $pdf->SetFont('Cambria','',10);
        $pdf->Cell(25,10,'',0,1);
        $pdf->Cell(196,5,'Disetujui Oleh',0,1,'C');
        $pdf->Cell(196,7,$developer->namaCompany,0,1,'C');

        $pdf->Cell(49,25,'',0,0,'C');
        $pdf->Cell(49,25,'',0,0,'C');
        $pdf->Cell(49,25,'',0,0,'C');
        $pdf->Cell(49,25,'',0,1,'C');

        $KDV = $this->db->query("SELECT * FROM tb_users WHERE level_user = 5 ")->row();
        if ($this->db->affected_rows($KDV) > 0) {
        	if ($status->statusPengajuan == 4 || $status->statusPengajuan == 5 || $status->statusPengajuan == 6 || $status->statusPengajuan == 7) {
        		$pdf->Image(base_url('_assets/images/'.$KDV->ttd),10,245+$x,49,24);
        	}
	        $pdf->Cell(49,5,$KDV->namaLengkap,0,0,'C');
        }else{
        	$pdf->Cell(49,5,'.............',0,0,'C');
        }
        $Pimpro = $this->db->query("SELECT * FROM tb_users WHERE level_user = 6 ")->row();
        if ($this->db->affected_rows($Pimpro) > 0) {
        	if ($status->statusPengajuan == 5 || $status->statusPengajuan == 6 || $status->statusPengajuan == 7) {
        		$pdf->Image(base_url('_assets/images/'.$Pimpro->ttd),60,245+$x,49,24);
        	}
	        $pdf->Cell(49,5,$Pimpro->namaLengkap,0,0,'C');
        }else{
        	$pdf->Cell(49,5,'.............',0,0,'C');
        }
        $DD = $this->db->query("SELECT * FROM tb_users JOIN tb_company USING(company_id) WHERE level=3 AND level_user=1")->row();
        if ($this->db->affected_rows($DD) > 0) {
        	if ($status->statusPengajuan == 6 || $status->statusPengajuan == 7) {
        		$pdf->Image(base_url('_assets/images/'.$DD->ttd),109,245+$x,49,24);
        	}
	        $pdf->Cell(49,5,$DD->namaLengkap,0,0,'C');
        }else{
        	$pdf->Cell(49,5,'.............',0,0,'C');
        }
        $FN = $this->db->query("SELECT * FROM tb_users WHERE level_user = 7 ")->row();
        if ($this->db->affected_rows($FN) > 0) {
        	if ($status->statusPengajuan == 7) {
        		$pdf->Image(base_url('_assets/images/'.$FN->ttd),158,245+$x,49,24);
        	}
	        $pdf->Cell(49,5,$FN->namaLengkap,0,1,'C');
        }else{
        	$pdf->Cell(49,5,'.............',0,1,'C');
        }
        $pdf->SetFont('Cambria','U',10);
        $pdf->Cell(49,10,'Kepala Devisi',0,0,'C');
        $pdf->Cell(49,10,'Pimpinan Proyek',0,0,'C');
        $pdf->Cell(49,10,'Direktur',0,0,'C');
        $pdf->Cell(49,10,'Finance',0,1,'C');

        $pdf->Output('I','DETAIL PEMERIKSAAN'.$pdf->tgl_indo(date('d-m-Y')).'.pdf');
	}
	public function approvePemeriksaan()
	{
		$data = $this->Models->approvePemeriksaan();
		if ($this->db->affected_rows($data) > 0) {
			echo "berhasil";
		}else{
			echo "gagal";
		}
	}
	public function rejectPemeriksaan()
	{
		$data = $this->Models->rejectPemeriksaan();
		if ($this->db->affected_rows($data) > 0) {
			echo "berhasil";
		}else{
			echo "gagal";
		}
	}

// function export
	public function exportUser()
	{
		
		$pdf = new FPDF('L','mm',array(300,505));
        $pdf->AddFont('Cambria','','cambria.php');//untuk menambhakan Font baru
        $pdf->AddFont('Cambria-BoldItalic','','cambria-bold-italic.php');//untuk menambhakan Font baru
        $pdf->AddFont('Cambria-Bold','','cambria-bold.php');//untuk menambhakan Font baru
        $pdf->AddFont('Cambria-Italic','','cambria-italic.php');//untuk menambhakan Font baru
        $pdf->AddFont('Times-Roman','','times.php');//untuk menambhakan Font baru
        $pdf->AddPage();// membuat halaman baru
        
        $pdf->SetFont('Cambria-Bold','',20);
        $pdf->Cell('',8,'LAPORAN DATA USER',0,1,'C');

        $pdf->Cell(49,10,'',0,1,'C');//menambhakan spasi

        //isi
        $pdf->SetFillColor(210,221,242);
        $pdf->SetDrawColor(231,236,241);

        $pdf->SetFont('Cambria-Bold','',12);
        $pdf->Cell(60,10,'Nama Lengkap',1,0,'C',true);
        $pdf->Cell(30,10,'Jenis Kelamin',1,0,'C',true);
        $pdf->Cell(50,10,'Tempat, Tanggal Lahir',1,0,'C',true);
        $pdf->Cell(40,10,'Agama',1,0,'C',true);
        $pdf->Cell(30,10,'Status',1,0,'C',true);
        $pdf->Cell(30,10,'Pendidikan',1,0,'C',true);
        $pdf->Cell(70,10,'Alamat',1,0,'C',true);
        $pdf->Cell(30,10,'No. Telp',1,0,'C',true);
        $pdf->Cell(50,10,'Email',1,0,'C',true);
        $pdf->Cell(30,10,'Whatsapps',1,0,'C',true);
        $pdf->Cell(30,10,'Perusahaan',1,0,'C',true);
        $pdf->Cell(35,10,'Jabatan',1,1,'C',true);

        $no=0;
        $get = $this->db->query("SELECT * FROM tb_users JOIN tb_company USING(company_id) WHERE level != 1 GROUP BY user_id ORDER BY namaCompany");
        foreach ($get->result() as $data) {
	        $GetAlamat = $data->alamat;
	        $GetPerusahaan = $data->namaCompany;
	        $alamat = substr($GetAlamat, 0,34);
	        $perusahaan = substr($GetPerusahaan, 0,14);
	        if ($data->level_user == 1) {
	        	$jabatan = "Direktur";
	        }elseif ($data->level_user == 2) {
	        	$jabatan = "Admin";
	        }elseif ($data->level_user == 3) {
	        	$jabatan = "Officer";
	        }elseif ($data->level_user == 4) {
	        	$jabatan = "Engginering";
	        }elseif ($data->level_user == 5) {
	        	$jabatan = "Kepala Devisi";
	        }elseif ($data->level_user == 6) {
	        	$jabatan = "Pimpinan Proyek";
	        }elseif ($data->level_user == 7) {
	        	$jabatan = "Finance";
	        }
	        $no=$no+1;
	        if ($no%2 == 0) {
		        $pdf->SetFillColor(243,243,243);
	        	$pdf->SetFont('Cambria','',11);

		        $pdf->Cell(60,8,$data->namaLengkap,1,0,'L',true);
		        $pdf->Cell(30,8,$data->jk,1,0,'C',true);
		        $pdf->Cell(50,8,$data->tempatLahir.', '.$pdf->tgl_indo($data->tanggalLahir),1,0,'L',true);
		        $pdf->Cell(40,8,$data->agama,1,0,'C',true);
		        $pdf->Cell(30,8,$data->status,1,0,'C',true);
		        $pdf->Cell(30,8,$data->pendTerakhir,1,0,'C',true);
		        $pdf->Cell(70,8,$alamat.'...',1,0,'','L',base_url('Details.php?detail='.$GetAlamat),true);
		        $pdf->Cell(30,8,$data->noTelp,1,0,'C',true);
		        $pdf->Cell(50,8,$data->email,1,0,'C',true);
		        $pdf->Cell(30,8,$data->wa,1,0,'C',true);
		        $pdf->Cell(30,8,$perusahaan.'...',1,0,'','L',base_url('Details.php?detail='.$GetPerusahaan),true);
		        $pdf->Cell(35,8,$jabatan,1,1,'L',true);
	        }else{
		        $pdf->SetFont('Cambria','',11);
		        $pdf->Cell(60,8,$data->namaLengkap,1,0);
		        $pdf->Cell(30,8,$data->jk,1,0,'C');
		        $pdf->Cell(50,8,$data->tempatLahir.', '.$pdf->tgl_indo($data->tanggalLahir),1,0,'L');
		        $pdf->Cell(40,8,$data->agama,1,0,'C');
		        $pdf->Cell(30,8,$data->status,1,0,'C');
		        $pdf->Cell(30,8,$data->pendTerakhir,1,0,'C');
		        $pdf->Cell(70,8,$alamat.'...',1,0,'',false,base_url('Details.php?detail='.$GetAlamat));
		        $pdf->Cell(30,8,$data->noTelp,1,0,'C');
		        $pdf->Cell(50,8,$data->email,1,0,'C');
		        $pdf->Cell(30,8,$data->wa,1,0,'C');
		        $pdf->Cell(30,8,$perusahaan.'...',1,0,'L',false,base_url('Details.php?detail='.$GetPerusahaan));
		        $pdf->Cell(35,8,$jabatan,1,1,'L');
	        }
        }
        $pdf->SetFillColor(210,221,242);
        $pdf->SetFont('Cambria-Bold','',12);
        $pdf->Cell(485,10,'JUMLAH DATA USER ADALAH   '.$this->db->affected_rows($get),1,1,'C',true);

        $pdf->Output('I','LAPORAN DATA USER '.$pdf->tgl_indo(date('d-m-Y')).'.pdf');
	}
	public function exporCompany()
	{
		$pdf = new FPDF('L','mm','legal');
        $pdf->AddFont('Cambria','','cambria.php');//untuk menambhakan Font baru
        $pdf->AddFont('Cambria-BoldItalic','','cambria-bold-italic.php');//untuk menambhakan Font baru
        $pdf->AddFont('Cambria-Bold','','cambria-bold.php');//untuk menambhakan Font baru
        $pdf->AddFont('Cambria-Italic','','cambria-italic.php');//untuk menambhakan Font baru
        $pdf->AddFont('Times-Roman','','times.php');//untuk menambhakan Font baru
        $pdf->AddPage();// membuat halaman baru
        
        $pdf->SetFont('Cambria-Bold','',20);
        $pdf->Cell('',8,'LAPORAN DATA PERUSAHAAN',0,1,'C');

        $pdf->Cell(49,10,'',0,1,'C');//menambhakan spasi

        //isi
        $pdf->SetFillColor(210,221,242);
        $pdf->SetDrawColor(231,236,241);

        $pdf->SetFont('Cambria-Bold','',11);
        $pdf->Cell(60,10,'Nama Perusahaan',1,0,'C',true);
        $pdf->Cell(50,10,'Bidang Usaha',1,0,'C',true);
        $pdf->Cell(65,10,'Alamat',1,0,'C',true);
        $pdf->Cell(35,10,'Nomor Telp. / Fax',1,0,'C',true);
        $pdf->Cell(50,10,'Email',1,0,'C',true);
        $pdf->Cell(50,10,'Website',1,0,'C',true);
        $pdf->Cell(25,10,'Level',1,1,'C',true);
        
        $no=0;
        $get = $this->db->query("SELECT * FROM tb_company WHERE level != 1 ORDER BY namaCompany");
        foreach ($get->result() as $data) {
	        $GetNama = $data->namaCompany;
	        $GetBidang = $data->bidangUsaha;
	        $GetAlamat = $data->alamatCompany;
	        

	        $nama = substr($GetNama, 0,31);
	        $bidangUsaha = substr($GetBidang, 0,27);
	        $alamat = substr($GetAlamat, 0,35);
	        if ($data->level == 2) {
	        	$level = "Kontraktor";
	        }elseif ($data->level == 3) {
	        	$level = "Developer";
	        }
	        $pdf->SetFillColor(243,243,243);
        	$pdf->SetFont('Cambria','',11);
	        $no=$no+1;
	        if ($no%2 == 0) {

		        $pdf->Cell(60,8,$nama,1,0,'',true,base_url('Details.php?detail='.$GetNama));
		        $pdf->Cell(50,8,$bidangUsaha,1,0,'',true,base_url('Details.php?detail='.$GetBidang));
		        $pdf->Cell(65,8,$alamat,1,0,'',true,base_url('Details.php?detail='.$GetAlamat));
		        $pdf->Cell(35,8,$data->noTelp_company,1,0,'L',true);
		        $pdf->Cell(50,8,$data->email_company,1,0,'L',true);
		        $pdf->Cell(50,8,$data->web_company,1,0,'L',true);
		        $pdf->Cell(25,8,$level,1,1,'C',true);
	        }else{
		        $pdf->Cell(60,8,$nama,1,0,'',false,base_url('Details.php?detail='.$GetNama));
		        $pdf->Cell(50,8,$bidangUsaha,1,0,'',false,base_url('Details.php?detail='.$GetBidang));
		        $pdf->Cell(65,8,$alamat,1,0,'',false,base_url('Details.php?detail='.$GetAlamat));
		        $pdf->Cell(35,8,$data->noTelp_company,1,0,'L');
		        $pdf->Cell(50,8,$data->email_company,1,0,'L');
		        $pdf->Cell(50,8,$data->web_company,1,0,'L');
		        $pdf->Cell(25,8,$level,1,1,'C');
	        }
        }
        $pdf->SetFillColor(210,221,242);
        $pdf->SetFont('Cambria-Bold','',12);
        $pdf->Cell('',10,'JUMLAH  '.$this->db->affected_rows($get).' DATA',1,1,'C',true);

        $pdf->Output('I','LAPORAN DATA PERUSAHAN '.$pdf->tgl_indo(date('d-m-Y')).'.pdf');
	}
	public function exporPekerjaan()
	{
		$pdf = new FPDF('P','mm','A4');
        $pdf->AddFont('Cambria','','cambria.php');//untuk menambhakan Font baru
        $pdf->AddFont('Cambria-BoldItalic','','cambria-bold-italic.php');//untuk menambhakan Font baru
        $pdf->AddFont('Cambria-Bold','','cambria-bold.php');//untuk menambhakan Font baru
        $pdf->AddFont('Cambria-Italic','','cambria-italic.php');//untuk menambhakan Font baru
        $pdf->AddFont('Times-Roman','','times.php');//untuk menambhakan Font baru
        
        $pdf->SetAutoPageBreak('', 0);
        $get = $this->db->query("
        	SELECT * FROM tb_bobot
        	JOIN tb_persiapan USING(bobot_id)
			JOIN tb_pondasi USING(bobot_id)
			JOIN tb_sloof USING(bobot_id)
			JOIN tb_balok USING(bobot_id)
			JOIN tb_kolom USING(bobot_id)
			JOIN tb_batubata USING(bobot_id)
			JOIN tb_plesteraci USING(bobot_id)
			JOIN tb_atap USING(bobot_id)
			JOIN tb_plafon USING(bobot_id)
			JOIN tb_keramik USING(bobot_id)
			JOIN tb_plumbing USING(bobot_id)
			JOIN tb_listik USING(bobot_id)
			JOIN tb_pengecetan USING(bobot_id)
			JOIN tb_pintudanjendela USING(bobot_id)
        ");
        $no=0;
        foreach ($get->result() as $data) {
        $no=$no+1;
        $pdf->AddPage();// membuat halaman baru
        
        $pdf->SetFont('Cambria-Bold','',20);
        $pdf->Cell('',8,'LAPORAN DATA PEKERJAAN',0,1,'C');

        $pdf->Cell(49,10,'',0,1,'C');//menambhakan spasi

        //isi
        $pdf->SetFillColor(210,221,242);
        $pdf->SetDrawColor(231,236,241);

        $pdf->SetFont('Cambria-Bold','',12);

        $pdf->Cell(40,10,'Nama Pekerjaan',0,0,'L');
        $pdf->Cell(5,10,':',0,0,'L');
        $pdf->Cell('',10,$data->nama,0,1,'L');

        $pdf->Cell(40,10,'Harga',0,0,'L');
        $pdf->Cell(5,10,':',0,0,'L');
        $pdf->Cell('',10,'Rp. '.number_format($data->harga).' ,-',0,1,'L');

        $pdf->Cell(40,10,'Bobot',0,0,'L');
        $pdf->Cell(5,10,':',0,0,'L');
        $pdf->Cell('',10,$data->totalBobot.' %',0,1,'L');


        $pdf->Cell(5,5,'',0,1,'L');//spapsi

        $pdf->Cell(15,12,'NO',1,0,'C',true);
        $pdf->Cell(150,12,'URAIAN PEKERJAAN',1,0,'C',true);
        $pdf->Cell('',12,'BOBOT',1,1,'C',true);

        $pdf->SetFillColor(243,243,243);
        //untuk pekerjaan persiapan
        $pdf->SetFont('Cambria-Bold','',11);
        $pdf->Cell(15,8,'I',1,0,'C',true);
        $pdf->Cell(150,8,'PEKERJAAN PERSIAPAN','L,T,B',0,'L',true);
        $pdf->Cell('',8,'','B,T,R',1,'C',true);

        

        $pdf->SetFont('Cambria','',10);
        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'1.','R,B',0,'R');
        $pdf->Cell(150,8,'Mobilisasi Alat',1,0,'L');
        $pdf->Cell('',8,number_format($data->mobAlat,2,'.',',').'%',1,1,'C');

        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'2.','R,B',0,'R');
        $pdf->Cell(150,8,'Gudang Kemp. Pekerja',1,0,'L');
        $pdf->Cell('',8,number_format($data->kemPekerja,2,'.',',').'%',1,1,'C');
        
        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'3.','R,B',0,'R');
        $pdf->Cell(150,8,'Air Pekerja',1,0,'L');
        $pdf->Cell('',8,number_format($data->airPekerja,2,'.',',').'%',1,1,'C');

        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'4.','R,B',0,'R');
        $pdf->Cell(150,8,'Keamanan',1,0,'L');
        $pdf->Cell('',8,number_format($data->keamanan,2,'.',',').'%',1,1,'C');

        $pdf->SetFont('Cambria-Bold','',11);
        $pdf->Cell(165,7,'JUMLAH  ',1,0,'R');
        $pdf->Cell('',7,number_format($data->jml_persiapan,2,'.',',').'%',1,1,'C');

        //untuk pekerjaan Pondasi
        $pdf->SetFont('Cambria-Bold','',11);
        $pdf->Cell(15,8,'II',1,0,'C',true);
        $pdf->Cell(150,8,'PEKERJAAN STRUKTUR PONDASI','L,B,T',0,'L',true);
        $pdf->Cell('',8,'','B,T,R',1,'C',true);

        $pdf->SetFont('Cambria','',10);
        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'1.','R,B',0,'R');
        $pdf->Cell(150,8,'Bouwplank',1,0,'L');
        $pdf->Cell('',8,number_format($data->bouwplank,2,'.',',').'%',1,1,'C');

        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'2.','R,B',0,'R');
        $pdf->Cell(150,8,'Galian Tanah',1,0,'L');
        $pdf->Cell('',8,number_format($data->galianTanah,2,'.',',').'%',1,1,'C');
        
        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'3.','R,B',0,'R');
        $pdf->Cell(150,8,'Urugan Tanah Tapak Dan Lantai',1,0,'L');
        $pdf->Cell('',8,number_format($data->UrugTanah,2,'.',',').'%',1,1,'C');

        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'4.','R,B',0,'R');
        $pdf->Cell(150,8,'Pembesian Pondasi',1,0,'L');
        $pdf->Cell('',8,number_format($data->Pembesian_pondasi,2,'.',',').'%',1,1,'C');

        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'5.','R,B',0,'R');
        $pdf->Cell(150,8,'Begesting Pondasi',1,0,'L');
        $pdf->Cell('',8,number_format($data->begesting_pondasi,2,'.',',').'%',1,1,'C');

        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'6.','R,B',0,'R');
        $pdf->Cell(150,8,'Pengecoran Pondasi',1,0,'L');
        $pdf->Cell('',8,number_format($data->pengecoran_pondasi,2,'.',',').'%',1,1,'C');

        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'7.','R,B',0,'R');
        $pdf->Cell(150,8,'Pembongkaran Pondasi',1,0,'L');
        $pdf->Cell('',8,number_format($data->pembongkaran_pondasi,2,'.',',').'%',1,1,'C');

        $pdf->SetFont('Cambria-Bold','',11);
        $pdf->Cell(165,7,'JUMLAH  ',1,0,'R');
        $pdf->Cell('',7,number_format($data->jml_pondasi,2,'.',',').'%',1,1,'C');

        //untuk pekerjaan Sloof
        $pdf->SetFont('Cambria-Bold','',11);
        $pdf->Cell(15,8,'III',1,0,'C',true);
        $pdf->Cell(150,8,'PEKERJAAN STRUKTUR SLOOF','L,B,T',0,'L',true);
        $pdf->Cell('',8,'','B,T,R',1,'C',true);

        $pdf->SetFont('Cambria','',10);
        
        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'1.','R,B',0,'R');
        $pdf->Cell(150,8,'Pembesian Sloof',1,0,'L');
        $pdf->Cell('',8,number_format($data->Pembesian_sloof,2,'.',',').'%',1,1,'C');

        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'2.','R,B',0,'R');
        $pdf->Cell(150,8,'Begesting Sloof',1,0,'L');
        $pdf->Cell('',8,number_format($data->begesting_sloof,2,'.',',').'%',1,1,'C');

        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'3.','R,B',0,'R');
        $pdf->Cell(150,8,'Pengecoran Sloof',1,0,'L');
        $pdf->Cell('',8,number_format($data->pengecoran_sloof,2,'.',',').'%',1,1,'C');

        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'4.','R,B',0,'R');
        $pdf->Cell(150,8,'Pembongkaran Sloof',1,0,'L');
        $pdf->Cell('',8,number_format($data->pembongkaran_sloof,2,'.',',').'%',1,1,'C');

        $pdf->SetFont('Cambria-Bold','',11);
        $pdf->Cell(165,7,'JUMLAH  ',1,0,'R');
        $pdf->Cell('',7,number_format($data->jml_sloof,2,'.',',').'%',1,1,'C');

        //untuk pekerjaan Balok
        $pdf->SetFont('Cambria-Bold','',11);
        $pdf->Cell(15,8,'IV',1,0,'C',true);
        $pdf->Cell(150,8,'PEKERJAAN STRUKTUR BALOK','L,B,T',0,'L',true);
        $pdf->Cell('',8,'','B,T,R',1,'C',true);

        $pdf->SetFont('Cambria','',10);
        
        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'1.','R,B',0,'R');
        $pdf->Cell(150,8,'Pembesian Balok',1,0,'L');
        $pdf->Cell('',8,number_format($data->Pembesian_balok,2,'.',',').'%',1,1,'C');

        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'2.','R,B',0,'R');
        $pdf->Cell(150,8,'Begesting Balok',1,0,'L');
        $pdf->Cell('',8,number_format($data->begesting_balok,2,'.',',').'%',1,1,'C');

        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'3.','R,B',0,'R');
        $pdf->Cell(150,8,'Pengecoran Balok',1,0,'L');
        $pdf->Cell('',8,number_format($data->pengecoran_balok,2,'.',',').'%',1,1,'C');

        $pdf->SetY(-15);
        $pdf->SetFont('Arial','I',8);
        $pdf->Cell(30,10,$data->nama,0,0,'L');
        $pdf->Cell(135,10,'Halaman Ke 1',0,0,'C');
        $pdf->Cell('',10,'Pekerjaan Ke '.$no,0,0,'R');

        $pdf->AddPage();//ke halaman baru
        
        $pdf->SetFont('Cambria','',10);
        $pdf->Cell(7.5,8,'','L,B,T',0);
        $pdf->Cell(7.5,8,'4.','R,B,T',0,'R');
        $pdf->Cell(150,8,'Pembongkaran Balok',1,0,'L');
        $pdf->Cell('',8,number_format($data->pembongkaran_balok,2,'.',',').'%',1,1,'C');

        $pdf->SetFont('Cambria-Bold','',11);
        $pdf->Cell(165,7,'JUMLAH  ',1,0,'R');
        $pdf->Cell('',7,number_format($data->jml_balok,2,'.',',').'%',1,1,'C');


        //untuk pekerjaan Kolom
        $pdf->SetFont('Cambria-Bold','',11);
        $pdf->Cell(15,8,'V',1,0,'C',true);
        $pdf->Cell(150,8,'PEKERJAAN STRUKTUR KOLOM','L,B,T',0,'L',true);
        $pdf->Cell('',8,'','B,T,R',1,'C',true);

        $pdf->SetFont('Cambria','',10);
        
        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'1.','R,B',0,'R');
        $pdf->Cell(150,8,'Pembesian Kolom',1,0,'L');
        $pdf->Cell('',8,number_format($data->Pembesian_kolom,2,'.',',').'%',1,1,'C');

        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'2.','R,B',0,'R');
        $pdf->Cell(150,8,'Begesting Kolom',1,0,'L');
        $pdf->Cell('',8,number_format($data->begesting_kolom,2,'.',',').'%',1,1,'C');

        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'3.','R,B',0,'R');
        $pdf->Cell(150,8,'Pengecoran Kolom',1,0,'L');
        $pdf->Cell('',8,number_format($data->pengecoran_kolom,2,'.',',').'%',1,1,'C');

        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'4.','R,B',0,'R');
        $pdf->Cell(150,8,'Pembongkaran Kolom',1,0,'L');
        $pdf->Cell('',8,number_format($data->pembongkaran_kolom,2,'.',',').'%',1,1,'C');

        $pdf->SetFont('Cambria-Bold','',11);
        $pdf->Cell(165,7,'JUMLAH  ',1,0,'R');
        $pdf->Cell('',7,number_format($data->jml_kolom,2,'.',',').'%',1,1,'C');
        
        
        //untuk pekerjaan pemasangan batu bata
        $pdf->SetFont('Cambria-Bold','',11);
        $pdf->Cell(15,8,'VI',1,0,'C',true);
        $pdf->Cell(150,8,'PEKERJAAN PEMASANG BATU BATA','L,B,T',0,'L',true);
        $pdf->Cell('',8,'','B,T,R',1,'C',true);

        $pdf->SetFont('Cambria','',10);
        
        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'1.','R,B',0,'R');
        $pdf->Cell(150,8,'Pasang Batu Bata Dinding Depan Belakang',1,0,'L');
        $pdf->Cell('',8,number_format($data->bataDinding,2,'.',',').'%',1,1,'C');

        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'2.','R,B',0,'R');
        $pdf->Cell(150,8,'Pasang Batu Bata Bagian Sekat',1,0,'L');
        $pdf->Cell('',8,number_format($data->bataSekat,2,'.',',').'%',1,1,'C');

        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'3.','R,B',0,'R');
        $pdf->Cell(150,8,'Pasang Batu Bata Kamar Mandi',1,0,'L');
        $pdf->Cell('',8,number_format($data->bataKamarMandi,2,'.',',').'%',1,1,'C');

        $pdf->SetFont('Cambria-Bold','',11);
        $pdf->Cell(165,7,'JUMLAH  ',1,0,'R');
        $pdf->Cell('',7,number_format($data->jmlBata,2,'.',',').'%',1,1,'C');

        //untuk pekerjaan plester aci
        $pdf->SetFont('Cambria-Bold','',11);
        $pdf->Cell(15,8,'VII',1,0,'C',true);
        $pdf->Cell(150,8,'PEKERJAAN PLESTER ACI','L,B,T',0,'L',true);
        $pdf->Cell('',8,'','B,T,R',1,'C',true);

        $pdf->SetFont('Cambria','',10);
        
        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'1.','R,B',0,'R');
        $pdf->Cell(150,8,'Plester Aci Dinding Depan Dan Belakang',1,0,'L');
        $pdf->Cell('',8,number_format($data->aciDinding,2,'.',',').'%',1,1,'C');

        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'2.','R,B',0,'R');
        $pdf->Cell(150,8,'Plester Aci Bagian Sekat',1,0,'L');
        $pdf->Cell('',8,number_format($data->aciSekat,2,'.',',').'%',1,1,'C');

        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'3.','R,B',0,'R');
        $pdf->Cell(150,8,'Plester Aci Kamar Mandi',1,0,'L');
        $pdf->Cell('',8,number_format($data->aciKamarMandi,2,'.',',').'%',1,1,'C');

        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'4.','R,B',0,'R');
        $pdf->Cell(150,8,'Plester Aci Bagian Lantai',1,0,'L');
        $pdf->Cell('',8,number_format($data->aciLantai,2,'.',',').'%',1,1,'C');

        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'5.','R,B',0,'R');
        $pdf->Cell(150,8,'Plester Aci Bagian Teras Depan Dan Belakang',1,0,'L');
        $pdf->Cell('',8,number_format($data->aciTeras,2,'.',',').'%',1,1,'C');

        $pdf->SetFont('Cambria-Bold','',11);
        $pdf->Cell(165,7,'JUMLAH  ',1,0,'R');
        $pdf->Cell('',7,number_format($data->jmlAci,2,'.',',').'%',1,1,'C');

        //untuk pekerjaan Atap
        $pdf->SetFont('Cambria-Bold','',11);
        $pdf->Cell(15,8,'VIII',1,0,'C',true);
        $pdf->Cell(150,8,'PEKERJAAN PEMASANGAN ATAP','L,B,T',0,'L',true);
        $pdf->Cell('',8,'','B,T,R',1,'C',true);

        $pdf->SetFont('Cambria','',10);
        
        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'1.','R,B',0,'R');
        $pdf->Cell(150,8,'Pemasangan Ranga Atap',1,0,'L');
        $pdf->Cell('',8,number_format($data->rangkaAtap,2,'.',',').'%',1,1,'C');

        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'2.','R,B',0,'R');
        $pdf->Cell(150,8,'Pemasangan Penutup Atap',1,0,'L');
        $pdf->Cell('',8,number_format($data->penutupAtap,2,'.',',').'%',1,1,'C');

        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'3.','R,B',0,'R');
        $pdf->Cell(150,8,'Pemasangan Lisplank Atap',1,0,'L');
        $pdf->Cell('',8,number_format($data->lisplankAtap,2,'.',',').'%',1,1,'C');

        $pdf->SetFont('Cambria-Bold','',11);
        $pdf->Cell(165,7,'JUMLAH  ',1,0,'R');
        $pdf->Cell('',7,number_format($data->jmlAtap,2,'.',',').'%',1,1,'C');

        //untuk pekerjaan Plafon
        $pdf->SetFont('Cambria-Bold','',11);
        $pdf->Cell(15,8,'IX',1,0,'C',true);
        $pdf->Cell(150,8,'PEKERJAAN PEMASANGAN PLAFON','L,B,T',0,'L',true);
        $pdf->Cell('',8,'','B,T,R',1,'C',true);

        $pdf->SetFont('Cambria','',10);
        
        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'1.','R,B',0,'R');
        $pdf->Cell(150,8,'Pemasangan Ranga Plafon Luar Dalam',1,0,'L');
        $pdf->Cell('',8,number_format($data->rangkaPlafon,2,'.',',').'%',1,1,'C');

        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'2.','R,B',0,'R');
        $pdf->Cell(150,8,'Pemasangan Penutup Papan Plafon Luar Dalam',1,0,'L');
        $pdf->Cell('',8,number_format($data->penutupPalfon,2,'.',',').'%',1,1,'C');

        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'3.','R,B',0,'R');
        $pdf->Cell(150,8,'Pemasangan Dempul Plafon Luar Dalam',1,0,'L');
        $pdf->Cell('',8,number_format($data->dempulPlafon,2,'.',',').'%',1,1,'C');

        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'4.','R,B',0,'R');
        $pdf->Cell(150,8,'Pengecetan Plafon Luar Dalam',1,0,'L');
        $pdf->Cell('',8,number_format($data->cetPlafon,2,'.',',').'%',1,1,'C');

        $pdf->SetFont('Cambria-Bold','',11);
        $pdf->Cell(165,7,'JUMLAH  ',1,0,'R');
        $pdf->Cell('',7,number_format($data->jmlPlafon,2,'.',',').'%',1,1,'C');

        //untuk pekerjaan keramik
        $pdf->SetFont('Cambria-Bold','',11);
        $pdf->Cell(15,8,'X',1,0,'C',true);
        $pdf->Cell(150,8,'PEKERJAAN PEMASANGAN KERAMIK','L,B,T',0,'L',true);
        $pdf->Cell('',8,'','B,T,R',1,'C',true);

        $pdf->SetFont('Cambria','',10);
        
        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'1.','R,B',0,'R');
        $pdf->Cell(150,8,'Pemasangan Keramik Kamar Mandi',1,0,'L');
        $pdf->Cell('',8,number_format($data->kerKamarMandi,2,'.',',').'%',1,1,'C');

        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'2.','R,B',0,'R');
        $pdf->Cell(150,8,'Pemasangan Keramik Lantai',1,0,'L');
        $pdf->Cell('',8,number_format($data->KerLantai,2,'.',',').'%',1,1,'C');

        $pdf->SetY(-15);
        $pdf->SetFont('Arial','I',8);
        $pdf->Cell(30,10,$data->nama,0,0,'L');
        $pdf->Cell(135,10,'Halaman Ke 2',0,0,'C');
        $pdf->Cell('',10,'Pekerjaan Ke '.$no,0,0,'R');

        $pdf->AddPage();//ke halaman baru

        $pdf->SetFont('Cambria','',10);
        $pdf->Cell(7.5,8,'','L,B,T',0);
        $pdf->Cell(7.5,8,'3.','R,B,T',0,'R');
        $pdf->Cell(150,8,'Pemasangan Keramik Dinding',1,0,'L');
        $pdf->Cell('',8,number_format($data->kerDinding,2,'.',',').'%',1,1,'C');

        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'4.','R,B',0,'R');
        $pdf->Cell(150,8,'Pemasangan Keramik Closet',1,0,'L');
        $pdf->Cell('',8,number_format($data->kerCloset,2,'.',',').'%',1,1,'C');

        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'5.','R,B',0,'R');
        $pdf->Cell(150,8,'Pemasangan Keramik Teras',1,0,'L');
        $pdf->Cell('',8,number_format($data->kerTeras,2,'.',',').'%',1,1,'C');

        $pdf->SetFont('Cambria-Bold','',11);
        $pdf->Cell(165,7,'JUMLAH  ',1,0,'R');
        $pdf->Cell('',7,number_format($data->jmlKeramik,2,'.',',').'%',1,1,'C');

        //untuk pekerjaan Plumbing
        $pdf->SetFont('Cambria-Bold','',11);
        $pdf->Cell(15,8,'XI',1,0,'C',true);
        $pdf->Cell(150,8,'PEKERJAAN PLUMBING / PEMASANGAN PIPA','L,B,T',0,'L',true);
        $pdf->Cell('',8,'','B,T,R',1,'C',true);

        $pdf->SetFont('Cambria','',10);
        
        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'1.','R,B',0,'R');
        $pdf->Cell(150,8,'Pemasangan Pipa Air Bersih Dan Kotor',1,0,'L');
        $pdf->Cell('',8,number_format($data->airBersih,2,'.',',').'%',1,1,'C');

        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'2.','R,B',0,'R');
        $pdf->Cell(150,8,'Pekerjaan Septik Tank Dan Penutup nya',1,0,'L');
        $pdf->Cell('',8,number_format($data->septiiktank,2,'.',',').'%',1,1,'C');

        $pdf->SetFont('Cambria-Bold','',11);
        $pdf->Cell(165,7,'JUMLAH  ',1,0,'R');
        $pdf->Cell('',7,number_format($data->jmlPlumbing,2,'.',',').'%',1,1,'C');

        //untuk pekerjaan listrik
        $pdf->SetFont('Cambria-Bold','',11);
        $pdf->Cell(15,8,'XII',1,0,'C',true);
        $pdf->Cell(150,8,'PEKERJAAN INTALASI LISTRIK','L,B,T',0,'L',true);
        $pdf->Cell('',8,'','B,T,R',1,'C',true);

        $pdf->SetFont('Cambria','',10);
        
        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'1.','R,B',0,'R');
        $pdf->Cell(150,8,'Instalasi Listrik',1,0,'L');
        $pdf->Cell('',8,number_format($data->instalasiListrik,2,'.',',').'%',1,1,'C');

        $pdf->SetFont('Cambria-Bold','',11);
        $pdf->Cell(165,7,'JUMLAH  ',1,0,'R');
        $pdf->Cell('',7,number_format($data->jmlListrik,2,'.',',').'%',1,1,'C');

        //untuk pekerjaan pengecetan
        $pdf->SetFont('Cambria-Bold','',11);
        $pdf->Cell(15,8,'XIII',1,0,'C',true);
        $pdf->Cell(150,8,'PEKERJAAN PENGECETAN','L,B,T',0,'L',true);
        $pdf->Cell('',8,'','B,T,R',1,'C',true);

        $pdf->SetFont('Cambria','',10);
        
        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'1.','R,B',0,'R');
        $pdf->Cell(150,8,'Pengecetan',1,0,'L');
        $pdf->Cell('',8,number_format($data->cet,2,'.',',').'%',1,1,'C');

        $pdf->SetFont('Cambria-Bold','',11);
        $pdf->Cell(165,7,'JUMLAH  ',1,0,'R');
        $pdf->Cell('',7,number_format($data->jmlCet,2,'.',',').'%',1,1,'C');

        //untuk pekerjaan pintu dan jendela
        $pdf->SetFont('Cambria-Bold','',11);
        $pdf->Cell(15,8,'XIV',1,0,'C',true);
        $pdf->Cell(150,8,'PEKERJAAN PEMASANGAN PINTU DAN JENDELA','L,B,T',0,'L',true);
        $pdf->Cell('',8,'','B,T,R',1,'C',true);

        $pdf->SetFont('Cambria','',10);
        
        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'1.','R,B',0,'R');
        $pdf->Cell(150,8,'Pemasangan Pintu',1,0,'L');
        $pdf->Cell('',8,number_format($data->pintu,2,'.',',').'%',1,1,'C');

        $pdf->Cell(7.5,8,'','L,B',0);
        $pdf->Cell(7.5,8,'2.','R,B',0,'R');
        $pdf->Cell(150,8,'Pemasangan Jendela',1,0,'L');
        $pdf->Cell('',8,number_format($data->jendela,2,'.',',').'%',1,1,'C');

        $pdf->SetFont('Cambria-Bold','',11);
        $pdf->Cell(165,7,'JUMLAH  ',1,0,'R');
        $pdf->Cell('',7,number_format($data->jmlpintu,2,'.',',').'%',1,1,'C');

        $pdf->SetY(-15);
        $pdf->SetFont('Arial','I',8);
        $pdf->Cell(30,10,$data->nama,0,0,'L');
        $pdf->Cell(135,10,'Halaman Ke 3',0,0,'C');
        $pdf->Cell('',10,'Pekerjaan Ke '.$no,0,0,'R');


        }
        $pdf->Output('I','LAPORAN DATA PEKERJAAN '.$pdf->tgl_indo(date('d-m-Y')).'.pdf');
	}
	public function exporProyek()
	{
		$pdf = new FPDF('P','mm','A4');
        $pdf->AddFont('Cambria','','cambria.php');//untuk menambhakan Font baru
        $pdf->AddFont('Cambria-BoldItalic','','cambria-bold-italic.php');//untuk menambhakan Font baru
        $pdf->AddFont('Cambria-Bold','','cambria-bold.php');//untuk menambhakan Font baru
        $pdf->AddFont('Cambria-Italic','','cambria-italic.php');//untuk menambhakan Font baru
        $pdf->AddFont('Times-Roman','','times.php');//untuk menambhakan Font baru
        function tgl_indo($tanggal){
			$bulan = array (
				1 =>'Januari',
					'Februari',
					'Maret',
					'April',
					'Mei',
					'Juni',
					'Juli',
					'Agustus',
					'September',
					'Oktober',
					'November',
					'Desember'
			);
			$pecahkan = explode('/', $tanggal);
			return $pecahkan[0] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[2];
		}
        $get = $this->db->query("
        	SELECT * FROM tb_proyek
            JOIN tb_company USING(company_id)
            JOIN tb_pembangunan USING(proyek_id)
            JOIN tb_bobot USING(bobot_id)
        ");
        $no=0;
        foreach ($get->result() as $data) {
        $no=$no+1;
        $pdf->AddPage();// membuat halaman baru
        
        $pdf->SetFont('Cambria-Bold','',20);
        $pdf->Cell('',8,'LAPORAN DATA PROYEK',0,1,'C');

        $pdf->Cell(49,10,'',0,1,'C');//menambhakan spasi

        //isi
        $pdf->SetFillColor(210,221,242);
        $pdf->SetDrawColor(231,236,241);

        $pdf->SetFont('Cambria','',12);

        $pdf->Cell(40,8,'Nama Proyek',0,0,'L');
        $pdf->Cell(5,8,':',0,0,'L');
        $pdf->Cell('',8,$data->namaProyek,0,1,'L');

        $pdf->Cell(40,8,'Nomor SPK',0,0,'L');
        $pdf->Cell(5,8,':',0,0,'L');
        $pdf->Cell('',8,$data->nomorSPK,0,1,'L');

        $pdf->Cell(40,8,'Type Pembangunan',0,0,'L');
        $pdf->Cell(5,8,':',0,0,'L');
        $pdf->Cell('',8,$data->nama,0,1,'L');

		$pdf->Cell(40,8,'Jumlah',0,0,'L');
        $pdf->Cell(5,8,':',0,0,'L');
        $pdf->Cell('',8,$data->jumlah.' Unit',0,1,'L');

        $pdf->Cell(40,8,'Nilai Kontrak',0,0,'L');
        $pdf->Cell(5,8,':',0,0,'L');
        $pdf->Cell('',8,'Rp. '.number_format($data->total).' ,-',0,1,'L');

        $pdf->Cell(40,8,'Lokasi Proyek',0,0,'L');
        $pdf->Cell(5,8,':',0,0,'L');
        $pdf->MultiCell('',8,$data->lokasi_proyek,0,1,'',false);

        $pdf->Cell(40,8,'Dikerjakan Oleh',0,0,'L');
        $pdf->Cell(5,8,':',0,0,'L');
        $pdf->Cell('',8,$data->namaCompany,0,1,'L');

        $pdf->Cell(40,8,'Waktu Pelaksanaan',0,0,'L');
        $pdf->Cell(5,8,':',0,0,'L');
        $pdf->Cell('',8,tgl_indo($data->wp_awal).' s/d '.tgl_indo($data->wp_akhir),0,1,'L');

        $pdf->Cell(40,8,'Keterangan',0,0,'L');
        $pdf->Cell(5,8,':',0,0,'L');
        $pdf->MultiCell('',8,$data->ket,0,1,'',false);

        $pdf->Cell(5,5,'',0,1,'L');//SPASI

        $pdf->Cell(40,8,'Blok Dan Nomor Unit',0,0,'L');
        $pdf->Cell(5,8,':',0,0,'L');

        $get2 = $this->db->query("SELECT * FROM tb_blok WHERE pembangunan_id = '$data->pembangunan_id' ORDER BY blok ASC, nomor ASC");

        $pdf->SetFont('Cambria','',11);
        $pdf->Cell(10,8,'NO',1,0,'C',true);
        $pdf->Cell(30,8,'BLOK',1,0,'C',true);
        $pdf->Cell(30,8,'NOMOR',1,1,'C',true);

        $pdf->SetFillColor(243,243,243);
        $pdf->SetFont('Cambria','',9);
        $no=0;
        foreach ($get2->result() as $data) {
        	$no=$no+1;
        	if ($no%2 == 0) {
		        $pdf->Cell(40,7,'',0,0,'L');
		        $pdf->Cell(5,7,'',0,0,'L');
		        $pdf->Cell(10,7,$no,1,0,'C',true);
		        $pdf->Cell(30,7,$data->blok,1,0,'C',true);
		        $pdf->Cell(30,7,$data->nomor,1,1,'C',true);
        	}else{
        		$pdf->Cell(40,7,'',0,0,'L');
		        $pdf->Cell(5,7,'',0,0,'L');
		        $pdf->Cell(10,7,$no,1,0,'C');
		        $pdf->Cell(30,7,$data->blok,1,0,'C');
		        $pdf->Cell(30,7,$data->nomor,1,1,'C');
        	}
        }

        $pdf->SetAutoPageBreak('', 0);
        $pdf->SetY(-15);
        $pdf->SetFont('Arial','I',8);
        $pdf->Cell(0,10,'Halaman Ke '.$pdf->PageNo(),0,0,'C');
        $pdf->Cell(0,10,$pdf->tgl_indo(date('d-m-Y')),0,0,'R');
        }

        $pdf->Output('I','LAPORAN DATA PROYEK '.$pdf->tgl_indo(date('d-m-Y')).'.pdf');
	}
	public function ExportPengajaun()
	{
		$pdf = new FPDF('P','mm','legal');
        $pdf->AddFont('Cambria','','cambria.php');//untuk menambhakan Font baru
        $pdf->AddFont('Cambria-BoldItalic','','cambria-bold-italic.php');//untuk menambhakan Font baru
        $pdf->AddFont('Cambria-Bold','','cambria-bold.php');//untuk menambhakan Font baru
        $pdf->AddFont('Cambria-Italic','','cambria-italic.php');//untuk menambhakan Font baru

        $idCompany = $this->session->userdata('perusahaan');
        $get = $this->db->query("
        	SELECT * FROM tb_pengajuan
        	JOIN tb_proyek USING(company_id)
        	JOIN tb_pembangunan USING(pembangunan_id)
        	JOIN tb_company USING(company_id)
        	JOIN tb_bobot USING(bobot_id)
        	WHERE company_id = '$idCompany'
        	GROUP BY pengajuan_id
        ");

        foreach ($get->result() as $data) {
        	
			$status = $data->statusPengajuan;


	        $pdf->AddPage();// membuat halaman baru
	        $pdf->SetFont('Cambria-Bold','',20);
	        $pdf->Cell('',10,'LAPORAN DATA PENGAJUAN',0,1,'C');

	        $pdf->SetFont('Cambria','',12);
	        $pdf->Cell(40,10,'',0,1);//Spasi

	        $date = date_create($data->created);
	        //untuk Tanggal Pengajuan
	        $pdf->Cell(40,7,'Tanggal Pengajuan',0,0);
	        $pdf->Cell(3,7,':',0,0);
	        $pdf->Cell('',7,$pdf->tgl_indo(date_format($date,'d-m-Y')),0,1);

	        //untuk nama proyek
	        $pdf->Cell(40,7,'Proyek',0,0);
	        $pdf->Cell(3,7,':',0,0);
	        $pdf->Cell('',7,$data->namaProyek,0,1);

	        //untuk nomor spk
	        $pdf->Cell(40,7,'Nomor SPK',0,0);
	        $pdf->Cell(3,7,':',0,0);
	        $pdf->Cell('',7,$data->nomorSPK,0,1);

	        //untuk Nama Pekerjaan
	        $pdf->Cell(40,7,'Pekerjaan',0,0);
	        $pdf->Cell(3,7,':',0,0);
	        $pdf->Cell('',7,'Pembangunan '.$data->jumlah.' Unit '.$data->nama,0,1);

	        //untuk Waktu Pelaksanaan
	        $pdf->Cell(40,7,'Waktu Pelaksanaan',0,0);
	        $pdf->Cell(3,7,':',0,0);
	        $pdf->Cell('',7,$pdf->tgl_indo(str_replace('/', '-', $data->wp_awal)).'  s/d  '.$pdf->tgl_indo(str_replace('/', '-', $data->wp_akhir)),0,1);

	        //untuk Waktu Pelaksanaan
	        $pdf->Cell(40,7,'Nilai Kontrak',0,0);
	        $pdf->Cell(3,7,':',0,0);
	        $pdf->Cell('',7,'Rp. '.number_format($data->total).' ,-',0,1);

	        //untuk Waktu Pelaksanaan
	        $pdf->Cell(40,7,'Invoice Ke',0,0);
	        $pdf->Cell(3,7,':',0,0);
	        $pdf->Cell('',7,$data->pengajuan,0,1);

	        //untuk Status Pengajuan
	        if ($data->statusPengajuan == 1) {
		        $pdf->Cell(40,7,'Status Pengajuan',0,0);
		        $pdf->Cell(3,7,':',0,0);
		        $pdf->SetTextColor(251,198,43);
		        $pdf->Cell('',7,'Pending Officer Project',0,1);
	        }elseif ($data->statusPengajuan == 2) {
		        $pdf->Cell(40,7,'Status Pengajuan',0,0);
		        $pdf->Cell(3,7,':',0,0);
		        $pdf->SetTextColor(251,198,43);
		        $pdf->Cell('',7,'Pending Enginering',0,1);
	        }elseif ($data->statusPengajuan == 3) {
		        $pdf->Cell(40,7,'Status Pengajuan',0,0);
		        $pdf->Cell(3,7,':',0,0);
		        $pdf->SetTextColor(251,198,43);
		        $pdf->Cell('',7,'Pending Kepala Devisi',0,1);
	        }elseif ($data->statusPengajuan == 4) {
		        $pdf->Cell(40,7,'Status Pengajuan',0,0);
		        $pdf->Cell(3,7,':',0,0);
		        $pdf->SetTextColor(251,198,43);
		        $pdf->Cell('',7,'Pending Pimpinan Proyek',0,1);
	        }elseif ($data->statusPengajuan == 5) {
		        $pdf->Cell(40,7,'Status Pengajuan',0,0);
		        $pdf->Cell(3,7,':',0,0);
		        $pdf->SetTextColor(251,198,43);
		        $pdf->Cell('',7,'Pending Direktur',0,1);
	        }elseif ($data->statusPengajuan == 6) {
		        $pdf->Cell(40,7,'Status Pengajuan',0,0);
		        $pdf->Cell(3,7,':',0,0);
		        $pdf->SetTextColor(251,198,43);
		        $pdf->Cell('',7,'Pending Finance',0,1);
	        }elseif ($data->statusPengajuan == 7) {
		        $pdf->Cell(40,7,'Status Pengajuan',0,0);
		        $pdf->Cell(3,7,':',0,0);
		        $pdf->SetTextColor(68,183,32);
		        $pdf->Cell('',7,'Approve',0,1);
	        }elseif ($data->statusPengajuan == 8) {
		        $pdf->Cell(40,7,'Status Pengajuan',0,0);
		        $pdf->Cell(3,7,':',0,0);
		        $pdf->SetTextColor(255,0,0);
		        $pdf->Cell('',7,'Reject Officer Project',0,1);
	        }elseif ($data->statusPengajuan == 9) {
		        $pdf->Cell(40,7,'Status Pengajuan',0,0);
		        $pdf->Cell(3,7,':',0,0);
		        $pdf->SetTextColor(255,0,0);
		        $pdf->Cell('',7,'Reject Engginering',0,1);
	        }elseif ($data->statusPengajuan == 10) {
		        $pdf->Cell(40,7,'Status Pengajuan',0,0);
		        $pdf->Cell(3,7,':',0,0);
		        $pdf->SetTextColor(255,0,0);
		        $pdf->Cell('',7,'Reject Kepala Devisi',0,1);
	        }elseif ($data->statusPengajuan == 11) {
		        $pdf->Cell(40,7,'Status Pengajuan',0,0);
		        $pdf->Cell(3,7,':',0,0);
		        $pdf->SetTextColor(255,0,0);
		        $pdf->Cell('',7,'Reject Pimpinan Proyek',0,1);
	        }elseif ($data->statusPengajuan == 12) {
		        $pdf->Cell(40,7,'Status Pengajuan',0,0);
		        $pdf->Cell(3,7,':',0,0);
		        $pdf->SetTextColor(255,0,0);
		        $pdf->Cell('',7,'Reject Direktur',0,1);
	        }
	        
	        $pdf->Cell(3,7,'',0,1);//spasi
	        $pdf->SetTextColor(0,0,0);
	        //untuk isi
	        $pdf->SetFillColor(210,221,242);
	        $pdf->SetDrawColor(231,236,241);
	        $pdf->SetFont('Cambria','',12);
	        $pdf->Cell(10,10,'NO',1,0,'C',true);
	        $pdf->Cell(70,10,'URAIAN PEKERJAAN',1,0,'C',true);
	        $pdf->Cell(30,10,'PROGRES',1,0,'C',true);
	        $pdf->Cell(30,10,'BOBOT',1,0,'C',true);
	        $pdf->Cell(58,10,'KETERANGAN ',1,1,'C',true);

	        $pdf->SetFont('Cambria','',10);
	        $pdf->SetFillColor(255,255,255);
	        $pdf->SetDrawColor(231,236,241);
	        $get = $this->db->query("
	        	SELECT *,(SELECT sum(progres) FROM tb_progres WHERE pembangunan_id= b.pembangunan_id) as progresAll
	        	FROM tb_pengajuan a
	        	JOIN tb_pembangunan b ON b.pembangunan_id = a.pembangunan_id
	        	JOIN tb_proyek c ON c.proyek_id = b.proyek_id
	        	JOIN tb_progres d ON d.pembangunan_id = b.pembangunan_id 
	        	JOIN tb_blok e ON e.blok_id = d.blok_id
	        	WHERE a.pengajuan_id = '$data->pengajuan_id'
	        	GROUP BY d.blok_id
	        	ORDER BY blok ASC
	        	");
	        $no=1;
	        $x=0;
	        foreach ($get->result() as $datax) {
	        	$bobot = (100/$datax->jumlah)*$datax->progres/100;
		        $pdf->Cell(10,10,$no++,1,0,'C',true);
		        $pdf->Cell(70,10,'Blok '.$datax->blok.' No '.$datax->nomor,1,0,'L',true);
		        $pdf->Cell(30,10,$datax->progres.' %',1,0,'C',true);
		        $pdf->Cell(30,10,$bobot.' %',1,0,'C',true);
		        $pdf->Cell(58,10,'',1,1,'C',true);
		        $x=$x+10;
	        }
	        $bobotAll =(100/$datax->jumlah)*$datax->progresAll/100;
	        $pdf->SetFont('Cambria','',12);
	        $pdf->Cell(80,10,'JUMLAH',1,0,'C',true);
	        $pdf->Cell(30,10,$datax->progresAll.' %',1,0,'C',true);
	        $pdf->Cell(30,10,$bobotAll.' %',1,0,'C',true);
	        $pdf->Cell(58,10,'',1,1,'C',true);

	        $np = ($bobotAll*$datax->total)/100;
	        $pajak = $np*2/100;
	        $Retensi = $np*5/100;
	        $tot = $np-$pajak-$Retensi;
	        $pdf->SetFont('Courier','',11);
	        $pdf->Cell(30,5,'',0,1);
	        $pdf->Cell(70,7,'Nilai Progres',0,0);
	        $pdf->Cell(5,7,':',0,0);
	        $pdf->Cell(50,7,'Rp. '.number_format($np),0,1);
	        $pdf->Cell(70,7,'Pajak 2%',0,0);
	        $pdf->Cell(5,7,':',0,0);
	        $pdf->Cell(50,7,'Rp. '.number_format($pajak),0,1);
	        $pdf->Cell(70,7,'Retensi (5% x Nilai Progres)',0,0);
	        $pdf->Cell(5,7,':',0,0);
	        $pdf->Cell(50,7,'Rp. '.number_format($Retensi),0,1);

	        $pdf->SetDrawColor(111,111,111);
	        $pdf->SetLineWidth(0.5);
	        $pdf->SetDash(2,2);
	        $pdf->Cell(119,2,'','B',0);
	        $pdf->Cell(5,2,'',0,0);
	        $pdf->SetFont('Courier','',12);
	        $pdf->Cell(10,4,'(-)',0,1);

	        $pdf->SetFont('Courier','B',12);
	        $pdf->Cell(70,7,'JUMLAH YANG DI BAYARKAN',0,0);
	        $pdf->Cell(5,7,':',0,0);
	        $pdf->Cell(50,7,'Rp. '.number_format($tot),0,1);

	        $pdf->SetFont('Courier','I',10);
	        $pdf->SetLineWidth(0.1);
	        $pdf->SetDash();
	        $pdf->SetFillColor(224,224,219);
	        $pdf->SetDrawColor(224,224,219);
	        $pdf->Cell(10,2,'',0,1);
	        $pdf->Cell(25,9,'Terbilang :',1,0,'',true);
	        $pdf->Cell(171,9,$pdf->terbilang($tot),1,1,'',true);

	        $developer = $this->db->query("SELECT * FROM tb_company WHERE level=3")->row();
	        $pdf->SetFont('Cambria','',10);
	        $pdf->Cell(25,10,'',0,1);
	        $pdf->Cell(98,5,'Dibuat Oleh',0,0,'C');
	        $pdf->Cell(98,5,'Diperiksa Oleh',0,1,'C');
	        $pdf->Cell(98,7,$data->namaCompany,0,0,'C');
	        $pdf->Cell(98,7,$developer->namaCompany,0,1,'C');

	        $pdf->Cell(49,27,'',0,0,'C');
	        $pdf->Cell(49,27,'',0,0,'C');
	        $pdf->Cell(49,27,'',0,0,'C');
	        $pdf->Cell(49,27,'',0,1,'C');
	        $KD = $this->db->query("SELECT * FROM tb_users WHERE company_id = '$idCompany' AND level_user = 1 ")->row();
	        if ($this->db->affected_rows($KD) > 0) {
	    		$pdf->Image(base_url('_assets/images/'.$KD->ttd),60,185+$x,48,20);
		        $pdf->Cell(49,5,$KD->namaLengkap,0,0,'C');
	        }else{
	        	$pdf->Cell(49,5,'.............',0,0,'C');
	        }
	        $KA = $this->db->query("SELECT * FROM tb_users WHERE company_id = '$idCompany' AND level_user = 2 ")->row();
	        if ($this->db->affected_rows($KA) > 0) {
	        	$pdf->Image(base_url('_assets/images/'.$KA->ttd),10,185+$x,49,20);
		        $pdf->Cell(49,5,$KA->namaLengkap,0,0,'C');
	        }else{
	        	$pdf->Cell(49,5,'.............',0,0,'C');
	        }
	        $OP = $this->db->query("SELECT * FROM tb_users WHERE level_user = 3 ")->row();
	        if ($this->db->affected_rows($OP) > 0) {
	        	if ($status == 2 || $status == 3 || $status == 4 || $status == 5 || $status == 6 || $status == 7 || $status == 9 || $status == 10 || $status == 11 || $status == 12) {
	        		$pdf->Image(base_url('_assets/images/'.$OP->ttd),109,185+$x,48,20);
	        	}
		        $pdf->Cell(49,5,$OP->namaLengkap,0,0,'C');
	        }else{
	        	$pdf->Cell(49,5,'.............',0,0,'C');
	        }
	        $EN = $this->db->query("SELECT * FROM tb_users WHERE level_user = 4 ")->row();
	        if ($this->db->affected_rows($EN) > 0) {
	        	if ($status == 3 || $status == 4 || $status == 5 || $status == 6 || $status == 7 || $status == 10 || $status == 11 || $status == 12) {
	        		$pdf->Image(base_url('_assets/images/'.$EN->ttd),158,185+$x,48,20);
	        	}
		        $pdf->Cell(49,5,$EN->namaLengkap,0,1,'C');
	        }else{
	        	$pdf->Cell(49,5,'.............',0,1,'C');
	        }
	        $pdf->SetFont('Cambria','U',10);
	        $pdf->Cell(49,5,'Project Admin',0,0,'C');
	        $pdf->Cell(49,5,'Direktur',0,0,'C');
	        $pdf->Cell(49,5,'Officer Project',0,0,'C');
	        $pdf->Cell(49,5,'Engginering',0,1,'C');

	        $pdf->SetFont('Cambria','',10);
	        $pdf->Cell(25,10,'',0,1);
	        $pdf->Cell(196,5,'Disetujui Oleh',0,1,'C');
	        $pdf->Cell(196,7,$developer->namaCompany,0,1,'C');

	        $pdf->Cell(49,30,'',0,0,'C');
	        $pdf->Cell(49,30,'',0,0,'C');
	        $pdf->Cell(49,30,'',0,0,'C');
	        $pdf->Cell(49,30,'',0,1,'C');

	        $KDV = $this->db->query("SELECT * FROM tb_users WHERE level_user = 5 ")->row();
	        if ($this->db->affected_rows($KDV) > 0) {
	        	if ($status == 4 || $status == 5 || $status == 6 || $status == 7 || $status == 11 || $status == 12) {
	        		$pdf->Image(base_url('_assets/images/'.$KDV->ttd),10,245+$x,49,24);
	        	}
		        $pdf->Cell(49,5,$KDV->namaLengkap,0,0,'C');
	        }else{
	        	$pdf->Cell(49,5,'.............',0,0,'C');
	        }
	        $Pimpro = $this->db->query("SELECT * FROM tb_users WHERE level_user = 6 ")->row();
	        if ($this->db->affected_rows($Pimpro) > 0) {
	        	if ($status == 5 || $status == 6 || $status == 7 || $status == 12) {
	        		$pdf->Image(base_url('_assets/images/'.$Pimpro->ttd),60,245+$x,49,24);
	        	}
		        $pdf->Cell(49,5,$Pimpro->namaLengkap,0,0,'C');
	        }else{
	        	$pdf->Cell(49,5,'.............',0,0,'C');
	        }
	        $DD = $this->db->query("SELECT * FROM tb_users JOIN tb_company USING(company_id) WHERE level=3 AND level_user=1")->row();
	        if ($this->db->affected_rows($DD) > 0) {
	        	if ($status == 6 || $status == 7) {
	        		$pdf->Image(base_url('_assets/images/'.$DD->ttd),109,245+$x,49,24);
	        	}
		        $pdf->Cell(49,5,$DD->namaLengkap,0,0,'C');
	        }else{
	        	$pdf->Cell(49,5,'.............',0,0,'C');
	        }
	        $FN = $this->db->query("SELECT * FROM tb_users WHERE level_user = 7 ")->row();
	        if ($this->db->affected_rows($FN) > 0) {
	        	if ($status == 7) {
	        		$pdf->Image(base_url('_assets/images/'.$FN->ttd),158,245+$x,49,24);
	        	}
		        $pdf->Cell(49,5,$FN->namaLengkap,0,1,'C');
	        }else{
	        	$pdf->Cell(49,5,'.............',0,1,'C');
	        }
	        $pdf->SetFont('Cambria','U',10);
	        $pdf->Cell(49,5,'Kepala Devisi',0,0,'C');
	        $pdf->Cell(49,5,'Pimpinan Proyek',0,0,'C');
	        $pdf->Cell(49,5,'Direktur',0,0,'C');
	        $pdf->Cell(49,5,'Finance',0,1,'C');

        }
        $pdf->Output('I','LAPORAN DATA PENGAJUAN'.$pdf->tgl_indo(date('d-m-Y')).'.pdf');
	}
	public function ExportPDF()
	{
		$pdf = new FPDF('P','mm','legal');
        $pdf->AddFont('Cambria','','cambria.php');//untuk menambhakan Font baru
        $pdf->AddFont('Cambria-BoldItalic','','cambria-bold-italic.php');//untuk menambhakan Font baru
        $pdf->AddFont('Cambria-Bold','','cambria-bold.php');//untuk menambhakan Font baru
        $pdf->AddFont('Cambria-Italic','','cambria-italic.php');//untuk menambhakan Font baru

        $get = $this->db->query("
        	SELECT * FROM tb_pengajuan
        	JOIN tb_proyek USING(company_id)
        	JOIN tb_pembangunan USING(pembangunan_id)
        	JOIN tb_company USING(company_id)
        	JOIN tb_bobot USING(bobot_id)
        	GROUP BY pengajuan_id
        ");

		$cekk = $this->session->userdata('level_user');
        // foreach ($get->result() as $data) {
        	
		// 	$status = $data->statusPengajuan;
		// 	$re = $this->session->flashdata('message');

	    //     $pdf->AddPage();// membuat halaman baru
	    //     $pdf->SetFont('Cambria-Bold','',20);
	    //     if ($re == 'pemeriksaan') {
	    //     	$pdf->Cell('',10,'LAPORAN DATA PEMERIKSAAN',0,1,'C');
	    //     }elseif ($cekk != 3 || $cekk != 4) {
	    //     	$pdf->Cell('',10,'LAPORAN DATA PENGESAHAN',0,1,'C');
	    //     }else{
	    //     	$pdf->Cell('',10,'LAPORAN DATA PEMERIKSAAN',0,1,'C');
	    //     }

	    //     $pdf->SetFont('Cambria','',12);
	    //     $pdf->Cell(40,10,'',0,1);//Spasi

	    //     $date = date_create($data->created);
	    //     //untuk Tanggal Pengajuan
	    //     $pdf->Cell(40,7,'Tanggal Pengajuan',0,0);
	    //     $pdf->Cell(3,7,':',0,0);
	    //     $pdf->Cell('',7,$pdf->tgl_indo(date_format($date,'d-m-Y')),0,1);

	    //     //untuk nama proyek
	    //     $pdf->Cell(40,7,'Proyek',0,0);
	    //     $pdf->Cell(3,7,':',0,0);
	    //     $pdf->Cell('',7,$data->namaProyek,0,1);

	    //     //untuk nomor spk
	    //     $pdf->Cell(40,7,'Nomor SPK',0,0);
	    //     $pdf->Cell(3,7,':',0,0);
	    //     $pdf->Cell('',7,$data->nomorSPK,0,1);

	    //     //untuk Nama Pekerjaan
	    //     $pdf->Cell(40,7,'Pekerjaan',0,0);
	    //     $pdf->Cell(3,7,':',0,0);
	    //     $pdf->Cell('',7,'Pembangunan '.$data->jumlah.' Unit '.$data->nama,0,1);

	    //     //untuk Waktu Pelaksanaan
	    //     $pdf->Cell(40,7,'Waktu Pelaksanaan',0,0);
	    //     $pdf->Cell(3,7,':',0,0);
	    //     $pdf->Cell('',7,$pdf->tgl_indo(str_replace('/', '-', $data->wp_awal)).'  s/d  '.$pdf->tgl_indo(str_replace('/', '-', $data->wp_akhir)),0,1);

	    //     //untuk Waktu Pelaksanaan
	    //     $pdf->Cell(40,7,'Nilai Kontrak',0,0);
	    //     $pdf->Cell(3,7,':',0,0);
	    //     $pdf->Cell('',7,'Rp. '.number_format($data->total).' ,-',0,1);

	    //     //untuk Waktu Pelaksanaan
	    //     $pdf->Cell(40,7,'Invoice Ke',0,0);
	    //     $pdf->Cell(3,7,':',0,0);
	    //     $pdf->Cell('',7,$data->pengajuan,0,1);

	    //     //untuk Status Pengajuan
	    //     if ($data->statusPengajuan == 1) {
		//         $pdf->Cell(40,7,'Status Pengajuan',0,0);
		//         $pdf->Cell(3,7,':',0,0);
		//         $pdf->SetTextColor(251,198,43);
		//         $pdf->Cell('',7,'Pending Officer Project',0,1);
	    //     }elseif ($data->statusPengajuan == 2) {
		//         $pdf->Cell(40,7,'Status Pengajuan',0,0);
		//         $pdf->Cell(3,7,':',0,0);
		//         $pdf->SetTextColor(251,198,43);
		//         $pdf->Cell('',7,'Pending Enginering',0,1);
	    //     }elseif ($data->statusPengajuan == 3) {
		//         $pdf->Cell(40,7,'Status Pengajuan',0,0);
		//         $pdf->Cell(3,7,':',0,0);
		//         $pdf->SetTextColor(251,198,43);
		//         $pdf->Cell('',7,'Pending Kepala Devisi',0,1);
	    //     }elseif ($data->statusPengajuan == 4) {
		//         $pdf->Cell(40,7,'Status Pengajuan',0,0);
		//         $pdf->Cell(3,7,':',0,0);
		//         $pdf->SetTextColor(251,198,43);
		//         $pdf->Cell('',7,'Pending Pimpinan Proyek',0,1);
	    //     }elseif ($data->statusPengajuan == 5) {
		//         $pdf->Cell(40,7,'Status Pengajuan',0,0);
		//         $pdf->Cell(3,7,':',0,0);
		//         $pdf->SetTextColor(251,198,43);
		//         $pdf->Cell('',7,'Pending Direktur',0,1);
	    //     }elseif ($data->statusPengajuan == 6) {
		//         $pdf->Cell(40,7,'Status Pengajuan',0,0);
		//         $pdf->Cell(3,7,':',0,0);
		//         $pdf->SetTextColor(251,198,43);
		//         $pdf->Cell('',7,'Pending Finance',0,1);
	    //     }elseif ($data->statusPengajuan == 7) {
		//         $pdf->Cell(40,7,'Status Pengajuan',0,0);
		//         $pdf->Cell(3,7,':',0,0);
		//         $pdf->SetTextColor(68,183,32);
		//         $pdf->Cell('',7,'Approve',0,1);
	    //     }elseif ($data->statusPengajuan == 8) {
		//         $pdf->Cell(40,7,'Status Pengajuan',0,0);
		//         $pdf->Cell(3,7,':',0,0);
		//         $pdf->SetTextColor(255,0,0);
		//         $pdf->Cell('',7,'Reject Officer Project',0,1);
	    //     }elseif ($data->statusPengajuan == 9) {
		//         $pdf->Cell(40,7,'Status Pengajuan',0,0);
		//         $pdf->Cell(3,7,':',0,0);
		//         $pdf->SetTextColor(255,0,0);
		//         $pdf->Cell('',7,'Reject Engginering',0,1);
	    //     }elseif ($data->statusPengajuan == 10) {
		//         $pdf->Cell(40,7,'Status Pengajuan',0,0);
		//         $pdf->Cell(3,7,':',0,0);
		//         $pdf->SetTextColor(255,0,0);
		//         $pdf->Cell('',7,'Reject Kepala Devisi',0,1);
	    //     }elseif ($data->statusPengajuan == 11) {
		//         $pdf->Cell(40,7,'Status Pengajuan',0,0);
		//         $pdf->Cell(3,7,':',0,0);
		//         $pdf->SetTextColor(255,0,0);
		//         $pdf->Cell('',7,'Reject Pimpinan Proyek',0,1);
	    //     }elseif ($data->statusPengajuan == 12) {
		//         $pdf->Cell(40,7,'Status Pengajuan',0,0);
		//         $pdf->Cell(3,7,':',0,0);
		//         $pdf->SetTextColor(255,0,0);
		//         $pdf->Cell('',7,'Reject Direktur',0,1);
	    //     }
	        
	    //     $pdf->Cell(3,7,'',0,1);//spasi
	    //     $pdf->SetTextColor(0,0,0);
	    //     //untuk isi
	    //     $pdf->SetFillColor(210,221,242);
	    //     $pdf->SetDrawColor(231,236,241);
	    //     $pdf->SetFont('Cambria','',12);
	    //     $pdf->Cell(10,10,'NO',1,0,'C',true);
	    //     $pdf->Cell(70,10,'URAIAN PEKERJAAN',1,0,'C',true);
	    //     $pdf->Cell(30,10,'PROGRES',1,0,'C',true);
	    //     $pdf->Cell(30,10,'BOBOT',1,0,'C',true);
	    //     $pdf->Cell(58,10,'KETERANGAN ',1,1,'C',true);

	    //     $pdf->SetFont('Cambria','',10);
	    //     $pdf->SetFillColor(255,255,255);
	    //     $pdf->SetDrawColor(231,236,241);
	    //     $get = $this->db->query("
	    //     	SELECT *,(SELECT sum(progres) FROM tb_progres WHERE pembangunan_id= b.pembangunan_id) as progresAll
	    //     	FROM tb_pengajuan a
	    //     	JOIN tb_pembangunan b ON b.pembangunan_id = a.pembangunan_id
	    //     	JOIN tb_proyek c ON c.proyek_id = b.proyek_id
	    //     	JOIN tb_progres d ON d.pembangunan_id = b.pembangunan_id 
	    //     	JOIN tb_blok e ON e.blok_id = d.blok_id
	    //     	WHERE a.pengajuan_id = '$data->pengajuan_id'
	    //     	GROUP BY d.blok_id
	    //     	ORDER BY blok ASC
	    //     	");
	    //     $no=1;
	    //     $x=0;
	    //     foreach ($get->result() as $datax) {
	    //     	$bobot = (100/$datax->jumlah)*$datax->progres/100;
		//         $pdf->Cell(10,10,$no++,1,0,'C',true);
		//         $pdf->Cell(70,10,'Blok '.$datax->blok.' No '.$datax->nomor,1,0,'L',true);
		//         $pdf->Cell(30,10,$datax->progres.' %',1,0,'C',true);
		//         $pdf->Cell(30,10,$bobot.' %',1,0,'C',true);
		//         $pdf->Cell(58,10,'',1,1,'C',true);
		//         $x=$x+10;
	    //     }
	    //     $bobotAll =(100/$datax->jumlah)*$datax->progresAll/100;
	    //     $pdf->SetFont('Cambria','',12);
	    //     $pdf->Cell(80,10,'JUMLAH',1,0,'C',true);
	    //     $pdf->Cell(30,10,$datax->progresAll.' %',1,0,'C',true);
	    //     $pdf->Cell(30,10,$bobotAll.' %',1,0,'C',true);
	    //     $pdf->Cell(58,10,'',1,1,'C',true);

	    //     $np = ($bobotAll*$datax->total)/100;
	    //     $pajak = $np*2/100;
	    //     $Retensi = $np*5/100;
	    //     $tot = $np-$pajak-$Retensi;
	    //     $pdf->SetFont('Courier','',11);
	    //     $pdf->Cell(30,5,'',0,1);
	    //     $pdf->Cell(70,7,'Nilai Progres',0,0);
	    //     $pdf->Cell(5,7,':',0,0);
	    //     $pdf->Cell(50,7,'Rp. '.number_format($np),0,1);
	    //     $pdf->Cell(70,7,'Pajak 2%',0,0);
	    //     $pdf->Cell(5,7,':',0,0);
	    //     $pdf->Cell(50,7,'Rp. '.number_format($pajak),0,1);
	    //     $pdf->Cell(70,7,'Retensi (5% x Nilai Progres)',0,0);
	    //     $pdf->Cell(5,7,':',0,0);
	    //     $pdf->Cell(50,7,'Rp. '.number_format($Retensi),0,1);

	    //     $pdf->SetDrawColor(111,111,111);
	    //     $pdf->SetLineWidth(0.5);
	    //     $pdf->SetDash(2,2);
	    //     $pdf->Cell(119,2,'','B',0);
	    //     $pdf->Cell(5,2,'',0,0);
	    //     $pdf->SetFont('Courier','',12);
	    //     $pdf->Cell(10,4,'(-)',0,1);

	    //     $pdf->SetFont('Courier','B',12);
	    //     $pdf->Cell(70,7,'JUMLAH YANG DI BAYARKAN',0,0);
	    //     $pdf->Cell(5,7,':',0,0);
	    //     $pdf->Cell(50,7,'Rp. '.number_format($tot),0,1);

	    //     $pdf->SetFont('Courier','I',10);
	    //     $pdf->SetLineWidth(0.1);
	    //     $pdf->SetDash();
	    //     $pdf->SetFillColor(224,224,219);
	    //     $pdf->SetDrawColor(224,224,219);
	    //     $pdf->Cell(10,2,'',0,1);
	    //     $pdf->Cell(25,9,'Terbilang :',1,0,'',true);
	    //     $pdf->Cell(171,9,$pdf->terbilang($tot),1,1,'',true);

	    //     $developer = $this->db->query("SELECT * FROM tb_company WHERE level=3")->row();
	    //     $pdf->SetFont('Cambria','',10);
	    //     $pdf->Cell(25,10,'',0,1);
	    //     $pdf->Cell(98,5,'Dibuat Oleh',0,0,'C');
	    //     $pdf->Cell(98,5,'Diperiksa Oleh',0,1,'C');
	    //     $pdf->Cell(98,7,$data->namaCompany,0,0,'C');
	    //     $pdf->Cell(98,7,$developer->namaCompany,0,1,'C');

	    //     $pdf->Cell(49,27,'',0,0,'C');
	    //     $pdf->Cell(49,27,'',0,0,'C');
	    //     $pdf->Cell(49,27,'',0,0,'C');
	    //     $pdf->Cell(49,27,'',0,1,'C');
	    //     $KD = $this->db->query("SELECT * FROM tb_users WHERE company_id = '$data->company_id' AND level_user = 1 ")->row();
	    //     if ($this->db->affected_rows($KD) > 0) {
	    // 		$pdf->Image(base_url('_assets/images/'.$KD->ttd),60,185+$x,48,20);
		//         $pdf->Cell(49,5,$KD->namaLengkap,0,0,'C');
	    //     }else{
	    //     	$pdf->Cell(49,5,'.............',0,0,'C');
	    //     }
	    //     $KA = $this->db->query("SELECT * FROM tb_users WHERE company_id = '$data->company_id' AND level_user = 2 ")->row();
	    //     if ($this->db->affected_rows($KA) > 0) {
	    //     	$pdf->Image(base_url('_assets/images/'.$KA->ttd),10,185+$x,49,20);
		//         $pdf->Cell(49,5,$KA->namaLengkap,0,0,'C');
	    //     }else{
	    //     	$pdf->Cell(49,5,'.............',0,0,'C');
	    //     }
	    //     $OP = $this->db->query("SELECT * FROM tb_users WHERE level_user = 3 ")->row();
	    //     if ($this->db->affected_rows($OP) > 0) {
	    //     	if ($status == 2 || $status == 3 || $status == 4 || $status == 5 || $status == 6 || $status == 7 || $status == 9 || $status == 10 || $status == 11 || $status == 12) {
	    //     		$pdf->Image(base_url('_assets/images/'.$OP->ttd),109,185+$x,48,20);
	    //     	}
		//         $pdf->Cell(49,5,$OP->namaLengkap,0,0,'C');
	    //     }else{
	    //     	$pdf->Cell(49,5,'.............',0,0,'C');
	    //     }
	    //     $EN = $this->db->query("SELECT * FROM tb_users WHERE level_user = 4 ")->row();
	    //     if ($this->db->affected_rows($EN) > 0) {
	    //     	if ($status == 3 || $status == 4 || $status == 5 || $status == 6 || $status == 7 || $status == 10 || $status == 11 || $status == 12) {
	    //     		$pdf->Image(base_url('_assets/images/'.$EN->ttd),158,185+$x,48,20);
	    //     	}
		//         $pdf->Cell(49,5,$EN->namaLengkap,0,1,'C');
	    //     }else{
	    //     	$pdf->Cell(49,5,'.............',0,1,'C');
	    //     }
	    //     $pdf->SetFont('Cambria','U',10);
	    //     $pdf->Cell(49,5,'Project Admin',0,0,'C');
	    //     $pdf->Cell(49,5,'Direktur',0,0,'C');
	    //     $pdf->Cell(49,5,'Officer Project',0,0,'C');
	    //     $pdf->Cell(49,5,'Engginering',0,1,'C');

	    //     $pdf->SetFont('Cambria','',10);
	    //     $pdf->Cell(25,10,'',0,1);
	    //     $pdf->Cell(196,5,'Disetujui Oleh',0,1,'C');
	    //     $pdf->Cell(196,7,$developer->namaCompany,0,1,'C');

	    //     $pdf->Cell(49,30,'',0,0,'C');
	    //     $pdf->Cell(49,30,'',0,0,'C');
	    //     $pdf->Cell(49,30,'',0,0,'C');
	    //     $pdf->Cell(49,30,'',0,1,'C');

	    //     $KDV = $this->db->query("SELECT * FROM tb_users WHERE level_user = 5 ")->row();
	    //     if ($this->db->affected_rows($KDV) > 0) {
	    //     	if ($status == 4 || $status == 5 || $status == 6 || $status == 7 || $status == 11 || $status == 12) {
	    //     		$pdf->Image(base_url('_assets/images/'.$KDV->ttd),10,245+$x,49,24);
	    //     	}
		//         $pdf->Cell(49,5,$KDV->namaLengkap,0,0,'C');
	    //     }else{
	    //     	$pdf->Cell(49,5,'.............',0,0,'C');
	    //     }
	    //     $Pimpro = $this->db->query("SELECT * FROM tb_users WHERE level_user = 6 ")->row();
	    //     if ($this->db->affected_rows($Pimpro) > 0) {
	    //     	if ($status == 5 || $status == 6 || $status == 7 || $status == 12) {
	    //     		$pdf->Image(base_url('_assets/images/'.$Pimpro->ttd),60,245+$x,49,24);
	    //     	}
		//         $pdf->Cell(49,5,$Pimpro->namaLengkap,0,0,'C');
	    //     }else{
	    //     	$pdf->Cell(49,5,'.............',0,0,'C');
	    //     }
	    //     $DD = $this->db->query("SELECT * FROM tb_users JOIN tb_company USING(company_id) WHERE level=3 AND level_user=1")->row();
	    //     if ($this->db->affected_rows($DD) > 0) {
	    //     	if ($status == 6 || $status == 7) {
	    //     		$pdf->Image(base_url('_assets/images/'.$DD->ttd),109,245+$x,49,24);
	    //     	}
		//         $pdf->Cell(49,5,$DD->namaLengkap,0,0,'C');
	    //     }else{
	    //     	$pdf->Cell(49,5,'.............',0,0,'C');
	    //     }
	    //     $FN = $this->db->query("SELECT * FROM tb_users WHERE level_user = 7 ")->row();
	    //     if ($this->db->affected_rows($FN) > 0) {
	    //     	if ($status == 7) {
	    //     		$pdf->Image(base_url('_assets/images/'.$FN->ttd),158,245+$x,49,24);
	    //     	}
		//         $pdf->Cell(49,5,$FN->namaLengkap,0,1,'C');
	    //     }else{
	    //     	$pdf->Cell(49,5,'.............',0,1,'C');
	    //     }
	    //     $pdf->SetFont('Cambria','U',10);
	    //     $pdf->Cell(49,5,'Kepala Devisi',0,0,'C');
	    //     $pdf->Cell(49,5,'Pimpinan Proyek',0,0,'C');
	    //     $pdf->Cell(49,5,'Direktur',0,0,'C');
	    //     $pdf->Cell(49,5,'Finance',0,1,'C');

        // }
        $pdf->Output('I','LAPORAN DATA PENGAJUAN'.$pdf->tgl_indo(date('d-m-Y')).'.pdf');
	}

//funtion profile
	public function profile()
	{
		check_not_login();
		$this->template->load('Template','profile');
	}
	public function editProfile()
	{
		$post = $this->input->post(null, TRUE);
		$this->Models->editProfile($post);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_tempdata('message','<script>swal({
                                    title: "Good Job !!",
                                    text: "Data Berhasil Simpan",
                                    icon: "success"
                                });</script>',60);
			redirect('profile');
		}
	}
}



