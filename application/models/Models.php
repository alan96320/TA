<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'libs/vendor/autoload.php';
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

class Models extends CI_Model {

	function __construct()
	{
		parent::__construct();	
	}
// Query untuk Login
	public function login($post)
	{
		$this->db->select('*');
		$this->db->from('tb_users');
		$this->db->join('tb_company','tb_company.company_id = tb_users.company_id','INNER');
		$this->db->where('username', $post['username']);
		$this->db->where('password', sha1($post['password']));
		$query = $this->db->get();
		return $query;
		
	}

// Query untuk User
	public function getUsers()
	{
		$id = $this->input->post('id');
		$this->db->from('tb_users');
		if (!empty($id)) {
			$this->db->where('user_id',$id);
		}
		$this->db->join('tb_company','tb_company.company_id = tb_users.company_id','INNER');
		$query = $this->db->get();
		return $query;
	}
	public function addUser($post)
	{
		$ID1 = Uuid::uuid4()->toString();
		$path_dir = './_assets/images';
		if (!is_dir($path_dir)) {
			mkdir($path_dir, 0775);
			chmod($path_dir, 0777);
		}
		$set = array(
			'upload_path' => $path_dir ,
			'allowed_types' => 'gif|jpg|jpeg|png',
			'file_name' => 'ATMKE'.date('His'),
			'overwrite' => TRUE
		);
		$this->load->library('upload', $set);
		if (! $this->upload->do_upload('ttd')) {
			$pesan = array('error' => $this->upload->display_errors());
			alert('error upload tanda tangan '.$pesan);
		}else{
			$file = $this->upload->data();
			$params['user_id'] = $ID1;
			$params['namaLengkap'] = $post['namaLengkap'];
			$params['jk'] = $post['jenisKelamin'];
			$params['tempatLahir'] = $post['tempat'];
			$params['tanggalLahir'] = $post['tanggal'];
			$params['agama'] = $post['agama'];
			$params['status'] = $post['status'];
			$params['pendTerakhir'] = $post['Pendidikan'];
			$params['alamat'] = $post['alamat'];
			$params['noTelp'] = $post['nomor'];
			$params['email'] = $post['email'];
			$params['wa'] = $post['WhatsApp'];
			$params['company_id'] = $post['Perusahaan'];
			$params['username'] = 'ATMKE'.date('His');
			$params['password'] = sha1('ATMKE'.date('His'));
			$params['level_user'] = $post['Jabatan'];
			$params['ttd'] = $file['file_name'];
			$params['created'] = date("Y-m-d H:i:s");
			$this->db->insert('tb_users', $params);
		}
	}

	public function delUser()
	{
		$this->db->where('user_id', $this->input->post('id'));
		unlink('./_assets/images/'.$this->input->post('nama'));
		$this->db->delete('tb_users');
		$cek = $this->db->affected_rows();
		if ($cek > 0) {
			return "berhasil";
		}else{
			return "gagal";
		}
	}

	public function editUser($post)
	{
		$id = $post['id'];
		$params['namaLengkap'] = $post['namaLengkapEdit'];
		$params['jk'] = $post['jenisKelaminEdit'];
		$params['tempatLahir'] = $post['tempatEdit'];
		$params['tanggalLahir'] = $post['tanggalEdit'];
		$params['agama'] = $post['agamaEdit'];
		$params['status'] = $post['statusEdit'];
		$params['pendTerakhir'] = $post['PendidikanEdit'];
		$params['alamat'] = $post['alamatEdit'];
		$params['noTelp'] = $post['nomorEdit'];
		$params['email'] = $post['emailEdit'];
		$params['wa'] = $post['WhatsAppEdit'];
		$params['company_id'] = $post['PerusahaanEdit'];
		$params['username'] = $post['username'];
		if (!empty($post['password'])) {
			$params['password'] = sha1($post['password']);
		}
		$params['level_user'] = $post['JabatanEdit'];
		$params['updated'] = date("Y-m-d H:i:s");
		$this->db->where('user_id', $id);				
		$this->db->update('tb_users', $params);
	}

// Query untuk perusahaan
	public function getCompany()   
	{
		$id = $this->input->post('id');
		if (!empty($id)) {
			$this->db->where('company_id',$id);
		}
		$this->db->from('tb_company');
		$query = $this->db->get();
		return $query;
	}
	public function getKontraktor()   
	{
		$this->db->from('tb_company');
		$this->db->where('level',2);
		$query = $this->db->get();
		return $query;
	}
	public function addcompany($post)
	{
		$ID1 = Uuid::uuid4()->toString();
		$params['company_id'] = $ID1;
		$params['namaCompany'] = $post['namaperusahaan'];
		$params['bidangUsaha'] = $post['bidangusaha'];
		$params['alamatCompany'] = $post['alamat'];
		$params['noTelp_company'] = $post['nomor'];
		$params['email_company'] = $post['email'];
		$params['web_company'] = $post['Web'] = '' ? null : $post['Web'] ;
		$params['level'] = $post['level'];
		$params['created'] = date("Y-m-d H:i:s");
		$this->db->insert('tb_company', $params);

	}
	public function delCompany()
	{
		$this->db->where('company_id', $this->input->post('id'));
		$this->db->delete('tb_company');
	}
	public function editcompany($post)
	{
		$params['namaCompany'] = $post['namaperusahaan'];
		$params['bidangUsaha'] = $post['bidangusaha'];
		if (!empty($post['alamat'])) {
			$params['alamatCompany'] = $post['alamat'];
		}
		$params['noTelp_company'] = $post['nomor'];
		$params['email_company'] = $post['email'];
		$params['web_company'] = $post['Web'] = '' ? null : $post['Web'] ;
		$params['level'] = $post['level'];
		$params['updated'] = date("Y-m-d H:i:s");
		$this->db->where('company_id', $post['id']);
		$this->db->update('tb_company', $params);
	}

// Query untuk Bobot
	public function getBobot()
	{
		$status = $this->input->post('status');
		if ($status != 'all') {
			$id = $this->input->post('id');
			$query = $this->db->query("
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
					WHERE bobot_id = '$id'
					ORDER by created DESC
				");
			return $query->result();
		}else {
			$query = $this->db->query('SELECT * FROM tb_bobot');
			return $query->result();
		}
	}
	public function addBobot($post)
	{	
		$ID= Uuid::uuid4()->toString();
		$total = $post['jumlah1'] + $post['jumlah2'] + $post['jumlah3'] + $post['jumlah4'] + $post['jumlah5'] + $post['jumlah6'] + $post['jumlah7'] + $post['jumlah8'] + $post['jumlah9'] + $post['jumlah10'] + $post['jumlah11'] + $post['jumlah12'] + $post['jumlah13'] + $post['jumlah14'];
		$bobot = array(
			'bobot_id' => $ID,
			'nama' => $post['namaPekerjaan'],
			'harga' => str_replace(',', '', $post['harga']),
			'totalBobot' => $total,
			'created' => date("Y-m-d H:i:s")
		);
		$persiapan = array(
			'bobot_id' => $ID,
			'mobAlat' => $post['mobilisasi'],
			'kemPekerja' => $post['gudang'],
			'airPekerja' => $post['air'],
			'keamanan' => $post['keamanan'],
			'jml_persiapan' => $post['jumlah1']
		);
		$pondasi = array(
			'bobot_id' => $ID,
			'bouwplank' => $post['Bouwplank'],
			'galianTanah' => $post['Galian'],
			'UrugTanah' => $post['Urugan'],
			'Pembesian_pondasi' => $post['Pembesian_pondasi'],
			'begesting_pondasi' => $post['Begesting_pondasi'],
			'pengecoran_pondasi' => $post['Pengecoran_pondasi'],
			'pembongkaran_pondasi' => $post['Pembongkaran_pondasi'],
			'jml_pondasi' => $post['jumlah2']
		);
		$sloof = array(
			'bobot_id' => $ID,
			'Pembesian_sloof' => $post['Pembesian_sloof'],
			'begesting_sloof' => $post['Begesting_sloof'],
			'pengecoran_sloof' => $post['Pengecoran_sloof'],
			'pembongkaran_sloof' => $post['Pembongkaran_sloof'],
			'jml_sloof' => $post['jumlah3']
		);
		$balok = array(
			'bobot_id' => $ID,
			'Pembesian_balok' => $post['Pembesian_balok'], 
			'begesting_balok' => $post['Begesting_balok'], 
			'pengecoran_balok' => $post['Pengecoran_balok'], 
			'pembongkaran_balok' => $post['Pembongkaran_balok'],
			'jml_balok' => $post['jumlah4']
		);
		$kolom = array(
			'bobot_id' => $ID,
			'Pembesian_kolom' => $post['Pembesian_kolom'], 
			'begesting_kolom' => $post['Begesting_kolom'], 
			'pengecoran_kolom' => $post['Pengecoran_kolom'], 
			'pembongkaran_kolom' => $post['Pembongkaran_kolom'],
			'jml_kolom' => $post['jumlah5']
		);
		$batubata = array(
			'bobot_id' => $ID,
			'bataDinding' => $post['BatuBata_dinding'], 
			'bataSekat' => $post['BatuBata_sekat'], 
			'bataKamarMandi' => $post['BatuBata_kMandi'],
			'jmlBata' => $post['jumlah6']
		);
		$plesteraci = array(
			'bobot_id' => $ID,
			'aciDinding' => $post['PlesterAci_dinding'], 
			'aciSekat' => $post['PlesterAci_sekat'], 
			'aciKamarMandi' => $post['PlesterAci_kMandi'], 
			'aciLantai' => $post['PlesterAci_lantai'], 
			'aciTeras' => $post['PlesterAci_teras'],
			'jmlAci' => $post['jumlah7']
		);
		$atap = array(
			'bobot_id' => $ID,
			'rangkaAtap' => $post['Rangka_atap'], 
			'penutupAtap' => $post['Penutup_atap'], 
			'lisplankAtap' => $post['Lisplank'],
			'jmlAtap' => $post['jumlah8']
		);
		$plafon = array(
			'bobot_id' => $ID,
			'rangkaPlafon' => $post['Rangka_plafon'], 
			'penutupPalfon' => $post['Penutup_plafon'], 
			'dempulPlafon' => $post['Dempul'], 
			'cetPlafon' => $post['cet_plafon'],
			'jmlPlafon' => $post['jumlah9']
		);
		$keramik = array(
			'bobot_id' => $ID,
			'kerKamarMandi' => $post['Keramik_kMandi'], 
			'KerLantai' => $post['Keramik_lantai'], 
			'kerDinding' => $post['Keramik_dinding'], 
			'kerCloset' => $post['Keramik_closet'], 
			'kerTeras' => $post['Keramik_teras'],
			'jmlKeramik' => $post['jumlah10']
		);
		$plumbing = array(
			'bobot_id' => $ID,
			'airBersih' => $post['pipa_air'], 
			'septiiktank' => $post['Septik_tank'],
			'jmlPlumbing' => $post['jumlah11']
		);
		$listrik = array(
			'bobot_id' => $ID,
			'instalasiListrik' => $post['instal_listrik'],
			'jmlListrik' => $post['jumlah12']
		);
		$pengecetan = array(
			'bobot_id' => $ID,
			'cet' => $post['pek_pengecetan'],
			'jmlCet' => $post['jumlah13']
		);
		$pintu = array(
			'bobot_id' => $ID,
			'pintu' => $post['pem_Pintu'], 
			'jendela' => $post['pem_Jendela'],
			'jmlpintu' => $post['jumlah14']
		);
		$this->db->insert('tb_bobot', $bobot);
		$this->db->insert('tb_persiapan', $persiapan);
		$this->db->insert('tb_pondasi', $pondasi);
		$this->db->insert('tb_sloof', $sloof);
		$this->db->insert('tb_balok', $balok);
		$this->db->insert('tb_kolom', $kolom);
		$this->db->insert('tb_batubata', $batubata);
		$this->db->insert('tb_plesteraci', $plesteraci);
		$this->db->insert('tb_atap', $atap);
		$this->db->insert('tb_plafon', $plafon);
		$this->db->insert('tb_keramik', $keramik);
		$this->db->insert('tb_plumbing', $plumbing);
		$this->db->insert('tb_listik', $listrik);
		$this->db->insert('tb_pengecetan', $pengecetan);
		$this->db->insert('tb_pintudanjendela', $pintu);
	}
	public function editBobot($post)
	{
		$id = $post['IDPembangunan'];
		$total = $post['editjumlah1'] + $post['editjumlah2'] + $post['editjumlah3'] + $post['editjumlah4'] + $post['editjumlah5'] + $post['editjumlah6'] + $post['editjumlah7'] + $post['editjumlah8'] + $post['editjumlah9'] + $post['editjumlah10'] + $post['editjumlah11'] + $post['editjumlah12'] + $post['editjumlah13'] + $post['editjumlah14'];
		$bobot = array(
			'nama' => $post['editnamaPekerjaan'],
			'harga' => str_replace(',', '', $post['editharga']),
			'totalBobot' => $total,
			'updated' => date("Y-m-d H:i:s")
		);
		$persiapan = array(
			'mobAlat' => $post['editmobilisasi'],
			'kemPekerja' => $post['editgudang'],
			'airPekerja' => $post['editair'],
			'keamanan' => $post['editkeamanan'],
			'jml_persiapan' => $post['editjumlah1']
		);
		$pondasi = array(
			'bouwplank' => $post['editBouwplank'],
			'galianTanah' => $post['editGalian'],
			'UrugTanah' => $post['editUrugan'],
			'Pembesian_pondasi' => $post['editPembesian_pondasi'],
			'begesting_pondasi' => $post['editBegesting_pondasi'],
			'pengecoran_pondasi' => $post['editPengecoran_pondasi'],
			'pembongkaran_pondasi' => $post['editPembongkaran_pondasi'],
			'jml_pondasi' => $post['editjumlah2']
		);
		$sloof = array(
			'Pembesian_sloof' => $post['editPembesian_sloof'],
			'begesting_sloof' => $post['editBegesting_sloof'],
			'pengecoran_sloof' => $post['editPengecoran_sloof'],
			'pembongkaran_sloof' => $post['editPembongkaran_sloof'],
			'jml_sloof' => $post['editjumlah3']
		);
		$balok = array(
			'Pembesian_balok' => $post['editPembesian_balok'], 
			'begesting_balok' => $post['editBegesting_balok'], 
			'pengecoran_balok' => $post['editPengecoran_balok'], 
			'pembongkaran_balok' => $post['editPembongkaran_balok'],
			'jml_balok' => $post['editjumlah4']
		);
		$kolom = array(
			'Pembesian_kolom' => $post['editPembesian_kolom'], 
			'begesting_kolom' => $post['editBegesting_kolom'], 
			'pengecoran_kolom' => $post['editPengecoran_kolom'], 
			'pembongkaran_kolom' => $post['editPembongkaran_kolom'],
			'jml_kolom' => $post['editjumlah5']
		);
		$batubata = array(
			'bataDinding' => $post['editBatuBata_dinding'], 
			'bataSekat' => $post['editBatuBata_sekat'], 
			'bataKamarMandi' => $post['editBatuBata_kMandi'],
			'jmlBata' => $post['editjumlah6']
		);
		$plesteraci = array(
			'aciDinding' => $post['editPlesterAci_dinding'], 
			'aciSekat' => $post['editPlesterAci_sekat'], 
			'aciKamarMandi' => $post['editPlesterAci_kMandi'], 
			'aciLantai' => $post['editPlesterAci_lantai'], 
			'aciTeras' => $post['editPlesterAci_teras'],
			'jmlAci' => $post['editjumlah7']
		);
		$atap = array(
			'rangkaAtap' => $post['editRangka_atap'], 
			'penutupAtap' => $post['editPenutup_atap'], 
			'lisplankAtap' => $post['editLisplank'],
			'jmlAtap' => $post['editjumlah8']
		);
		$plafon = array(
			'rangkaPlafon' => $post['editRangka_plafon'], 
			'penutupPalfon' => $post['editPenutup_plafon'], 
			'dempulPlafon' => $post['editDempul'], 
			'cetPlafon' => $post['editcet_plafon'],
			'jmlPlafon' => $post['editjumlah9']
		);
		$keramik = array(
			'kerKamarMandi' => $post['editKeramik_kMandi'], 
			'KerLantai' => $post['editKeramik_lantai'], 
			'kerDinding' => $post['editKeramik_dinding'], 
			'kerCloset' => $post['editKeramik_closet'], 
			'kerTeras' => $post['editKeramik_teras'],
			'jmlKeramik' => $post['editjumlah10']
		);
		$plumbing = array(
			'airBersih' => $post['editpipa_air'], 
			'septiiktank' => $post['editSeptik_tank'],
			'jmlPlumbing' => $post['editjumlah11']
		);
		$listrik = array(
			'instalasiListrik' => $post['editinstal_listrik'],
			'jmlListrik' => $post['editjumlah12']
		);
		$pengecetan = array(
			'cet' => $post['editpek_pengecetan'],
			'jmlCet' => $post['editjumlah13']
		);
		$pintu = array(
			'pintu' => $post['editpem_Pintu'], 
			'jendela' => $post['editpem_Jendela'],
			'jmlpintu' => $post['editjumlah14']
		);
		$this->db->where('bobot_id', $id);
		$this->db->update('tb_bobot', $bobot);
		$this->db->where('bobot_id', $id);
		$this->db->update('tb_persiapan', $persiapan);
		$this->db->where('bobot_id', $id);
		$this->db->update('tb_pondasi', $pondasi);
		$this->db->where('bobot_id', $id);
		$this->db->update('tb_sloof', $sloof);
		$this->db->where('bobot_id', $id);
		$this->db->update('tb_balok', $balok);
		$this->db->where('bobot_id', $id);
		$this->db->update('tb_kolom', $kolom);
		$this->db->where('bobot_id', $id);
		$this->db->update('tb_batubata', $batubata);
		$this->db->where('bobot_id', $id);
		$this->db->update('tb_plesteraci', $plesteraci);
		$this->db->where('bobot_id', $id);
		$this->db->update('tb_atap', $atap);
		$this->db->where('bobot_id', $id);
		$this->db->update('tb_plafon', $plafon);
		$this->db->where('bobot_id', $id);
		$this->db->update('tb_keramik', $keramik);
		$this->db->where('bobot_id', $id);
		$this->db->update('tb_plumbing', $plumbing);
		$this->db->where('bobot_id', $id);
		$this->db->update('tb_listik', $listrik);
		$this->db->where('bobot_id', $id);
		$this->db->update('tb_pengecetan', $pengecetan);
		$this->db->where('bobot_id', $id);
		$this->db->update('tb_pintudanjendela', $pintu);
	}
	public function delBobot()
	{
		$id = $this->input->post('id');
		$this->db->where('bobot_id', $id);
		$this->db->delete('tb_bobot');
	}

// Query untuk proyek
	public function GetProyek()
	{
		$query = $this->db->query('
            SELECT * FROM tb_proyek
            JOIN tb_company USING(company_id)
            JOIN tb_pembangunan USING(proyek_id)
            JOIN tb_bobot USING(bobot_id)
        ');
		return $query->result();
	}
	public function GetPerusahaan()//mengambil data berdasarkan statusnya kontraktor
	{
		$query = $this->db->query('SELECT * FROM tb_company WHERE level = 2 ');
		return $query;
	}
	public function getType()
	{
		$query = $this->db->query('SELECT * FROM tb_bobot');
		return $query->result();
	}
	public function getpembangunan()
	{
		$query = $this->db->query('SELECT * FROM tb_pembangunan JOIN tb_bobot USING(bobot_id) WHERE status = 0 ');
		return $query->result();
	}
	public function getBlok()
	{
		$query = $this->db->query('SELECT * FROM tb_blok WHERE status = 0 ');
		return $query->result();
	}
	public function Reset()
	{
		$this->db->query('DELETE FROM tb_pembangunan WHERE status = 0');
        $this->db->query('DELETE FROM tb_blok WHERE status = 1 or status = 0');
	}
	public function saveblok($post)
	{

		$jml = isset($post['jmlClone']) ? $post['jmlClone'] : '';
		$status = isset($post['statusTombol']) ? $post['statusTombol'] : '';
		$idpembangunan = isset($post['idpembangunan']) ? $post['idpembangunan'] : '';
		$harga = isset($post['harga']) ? $post['harga'] : '';
		if ($status == "Edit") {
			if ($jml == 0) {
				$data = array(
					'blok_id' => Uuid::uuid4()->toString(),
					'pembangunan_id' => $idpembangunan,
					'blok' => isset($post['blok']) ? $post['blok'] : '',
					'nomor' => isset($post['nomor1']) ? $post['nomor1'] : '',
					'status' => '2'
				);
				$this->db->insert('tb_blok', $data);
				$query = $this->db->query("SELECT COUNT(pembangunan_id) as jmlBlok FROM tb_blok WHERE pembangunan_id = '$idpembangunan'");
				$get = $query->row();
				$update = array(
								'jumlah' => $get->jmlBlok, 
								'total' =>	$get->jmlBlok*$harga,
							);
				$this->db->where('pembangunan_id',$idpembangunan);
				$this->db->update('tb_pembangunan',$update);
			}elseif ($jml > 0){
				for ($i=0; $i < $jml ; $i++){
					$n = $i+1;
					$bg2 = 0;
					if ($post['nomor'.$n] != '') {
						$data = array(
							'blok_id' => Uuid::uuid4()->toString(),
							'pembangunan_id' => $idpembangunan,
							'blok' => isset($post['blok']) ? $post['blok'] : '',
							'nomor' => isset($post['nomor'.$n]) ? $post['nomor'.$n] : '',
							'status' => '2'
						);
						$this->db->insert('tb_blok', $data);
						$bg2 = $bg2+1;
					}
				}
				$query = $this->db->query("SELECT COUNT(pembangunan_id) as jmlBlok FROM tb_blok WHERE pembangunan_id = '$idpembangunan'");
				$get = $query->row();
				$update = array(
								'jumlah' => $get->jmlBlok, 
								'total' =>	$get->jmlBlok*$harga,
							);
				$this->db->where('pembangunan_id',$idpembangunan);
				$this->db->update('tb_pembangunan',$update);
			}
		}else{
			if ($jml == 0) {
				$data = array(
					'blok_id' => Uuid::uuid4()->toString(),
					'pembangunan_id' => null,
					'blok' => isset($post['blok']) ? $post['blok'] : '',
					'nomor' => isset($post['nomor1']) ? $post['nomor1'] : '',
					'status' => '0'
				);
				$this->db->insert('tb_blok', $data);
			}elseif ($jml > 0){
				for ($i=0; $i < $jml ; $i++){
					$n = $i+1;
					if ($post['nomor'.$n] != '') {
						$data = array(
							'blok_id' => Uuid::uuid4()->toString(),
							'pembangunan_id' => null,
							'blok' => isset($post['blok']) ? $post['blok'] : '',
							'nomor' => isset($post['nomor'.$n]) ? $post['nomor'.$n] : '',
							'status' => '0'
						);
						$this->db->insert('tb_blok', $data);
					}
				}
			}	
		}
	}
	public function hapusblok()
	{
		$id = $this->input->post('id');
		$this->db->where('blok_id', $id);
		$this->db->delete('tb_blok');
	}
	public function savePembangunan()
	{
		$ID = Uuid::uuid4()->toString();
		$type = $this->input->post('type');
		$jumlah = $this->input->post('jumlah');
		$harga = $this->input->post('harga');
		$pembangunan = array(
			'pembangunan_id' => $ID,
			'proyek_id' => null, 
			'bobot_id' => $type, 
			'jumlah' => $jumlah,
			'total' => $jumlah*$harga, 
			'status' => 0 
		);
		$blok = array('pembangunan_id' => $ID, 'status' => 1 );
		$this->db->insert('tb_pembangunan', $pembangunan);
		$this->db->where('status',0);
		$this->db->update('tb_blok', $blok);
	}
	public function hapuspembangunan()
	{
		$id = $this->input->post('id');
		$this->db->query("DELETE FROM tb_pembangunan WHERE pembangunan_id = '$id'");
        $this->db->query("DELETE FROM tb_blok WHERE pembangunan_id = '$id'");
	}
	public function saveproyek()
	{
		$ID = Uuid::uuid4()->toString();
		$data = array(
			'proyek_id' => $ID,
			'namaProyek' => $this->input->post('namaproyek'), 
			'nomorSPK' => $this->input->post('spk'),  
			'lokasi_proyek' => $this->input->post('lokasiproyek'),
			'company_id' => $this->input->post('dikerjakan'),
			'wp_awal' => $this->input->post('wpawal'), 
			'wp_akhir' => $this->input->post('wpakhir'), 
			'ket' => $this->input->post('ket'), 
			'created' => date("Y-m-d H:i:s"), 
		);
		$this->db->insert('tb_proyek', $data);
		$this->db->query("UPDATE tb_pembangunan SET status=1, proyek_id='$ID' WHERE status=0");
		$this->db->query("UPDATE tb_blok SET status=2 WHERE status=1");
	}
	public function hapusproyek($post)
	{
		$idpembangunan = $post['id1'];
		$idproyek = $post['id2'];
		$jml = $this->db->query("SELECT COUNT(pembangunan_id) AS jumlah FROM tb_pembangunan WHERE proyek_id='$idproyek'")->row();
		if ($jml->jumlah > 1) {
			$this->db->query("DELETE FROM tb_pembangunan WHERE pembangunan_id='$idpembangunan'");
			$this->db->query("DELETE FROM tb_blok WHERE pembangunan_id='$idpembangunan'");
		}else{
			$this->db->query("DELETE FROM tb_proyek WHERE proyek_id='$idproyek'");
			$this->db->query("DELETE FROM tb_pembangunan WHERE pembangunan_id='$idpembangunan'");
			$this->db->query("DELETE FROM tb_blok WHERE pembangunan_id='$idpembangunan'");
		}
	}
	public function getProyekByID()
	{
		$id = $this->input->post('id');
		$query = $this->db->query("
            SELECT * FROM tb_proyek
            JOIN tb_company USING(company_id)
            JOIN tb_pembangunan USING(proyek_id)
            JOIN tb_bobot USING(bobot_id)
            WHERE pembangunan_id = '$id'
        ");
		return $query->result();
	}
	public function blokPerIDPembangunan()
	{
		$id = $this->input->post('id');
		$query = $this->db->query("
				SELECT *,(SELECT count(blok) FROM tb_blok WHERE pembangunan_id = '$id') as jml FROM tb_blok
				WHERE pembangunan_id = '$id'
			");
		return $query->result();
	}
	public function hapusBlokPerID()
	{
		$id = $this->input->post('id');
		$idP = $this->input->post('idP');
		$hrg = $this->input->post('hrg');
		$this->db->where('blok_id', $id);
		$this->db->delete('tb_blok');
		//ambil jumlah data blok dan total dari table pembangunan
		$data = $this->db->query("SELECT jumlah,total FROM tb_pembangunan WHERE pembangunan_id = '$idP' ")->row();
		$update = array(
						'jumlah' => $data->jumlah-1, 
						'total' =>	$data->total-$hrg,
					);
		$this->db->where('pembangunan_id',$idP);
		$this->db->update('tb_pembangunan',$update);
	}
	public function hapusAllBlokEdit()
	{
		$id = $this->input->post('id');
		$this->db->where('pembangunan_id',$id);
		$this->db->delete('tb_blok');
		$get = $this->db->query("SELECT total,proyek_id FROM tb_pembangunan where pembangunan_id='$id'")->row();
		$update_pembangunan = array(
			'jumlah' => 0,
			'total' => 0, 
		);
		$this->db->where('pembangunan_id',$id);
		$this->db->update('tb_pembangunan',$update_pembangunan);
	}
	public function editproyek()
	{
		$id_pembangunan = $this->input->post('id');
		$proyek = array(
			'namaProyek' => $this->input->post('nm'),
			'nomorSPK' => $this->input->post('spk'),
			'lokasi_proyek' => $this->input->post('lok'), 
			'company_id' => $this->input->post('DKO'),
			'wp_awal' => $this->input->post('awl'), 
			'wp_akhir' => $this->input->post('akh'),
			'ket' => $this->input->post('ket'),
			'updated' => date("Y-m-d H:i:s")
		);
		$pembangunan = array(
			'bobot_id' => $this->input->post('type'), 
			'jumlah' =>  $this->input->post('jml'),
			'total' =>  $this->input->post('nk'),				
		);
		$this->db->where('proyek_id',$this->input->post('idP'));
		$this->db->update('tb_proyek',$proyek);
		$this->db->where('pembangunan_id',$id_pembangunan);
		$this->db->update('tb_pembangunan',$pembangunan);
	}

// Query untuk Pengajuan
	public function getproyek2()
	{
		$id_Company = $this->session->userdata('perusahaan');
		$query = $this->db->query("SELECT * FROM tb_proyek WHERE company_id = '$id_Company'");
		return $query->result();
	}
	public function getpembangunanProgres()
	{
		$id = $this->input->post('id');
		$query = $this->db->query("SELECT * FROM tb_pembangunan JOIN tb_bobot USING(bobot_id) WHERE proyek_id = '$id'");
		return $query->result();
	}
	public function getblokProgres()
	{
		$id = $this->input->post('id');
		$query = $this->db->query(" SELECT * FROM tb_blok WHERE pembangunan_id = '$id' GROUP BY blok");
		return $query->result();
	}
	public function getnomorProgres()
	{
		$blok = $this->input->post('blok');
		$query = $this->db->query(" SELECT * FROM tb_blok WHERE blok = '$blok' ORDER BY nomor ASC");
		return $query->result();
	}
	public function cancelpengajuan()
	{
		$idCompany = $this->session->userdata('perusahaan');
		$get = $this->db->query("SELECT * FROM tb_progres a 
								JOIN tb_pembangunan b ON b.pembangunan_id = a.pembangunan_id 
								JOIN tb_proyek c ON c.proyek_id=b.proyek_id 
								WHERE a.status=0 AND c.company_id='$idCompany'");
		foreach ($get->result() as $data) {
			$this->db->query("DELETE FROM tb_progres WHERE status = 0 AND pembangunan_id ='$data->pembangunan_id' ");
		}
	}
	public function temporaryProgres()
	{
		$idCompany = $this->session->userdata('perusahaan');
		$query = $this->db->query(" SELECT *,
									(SELECT sum(progres) FROM tb_progres d WHERE d.blok_id=a.blok_id AND status =0) as jmlProgres
									FROM tb_progres a
									JOIN tb_blok c ON c.blok_id = a.blok_id
									JOIN tb_pembangunan ON tb_pembangunan.pembangunan_id = a.pembangunan_id
									JOIN tb_proyek b ON b.proyek_id = tb_pembangunan.proyek_id
									WHERE a.status = 0 AND b.company_id='$idCompany' 
									GROUP BY a.blok_id
									ORDER BY blok ASC
									");
		return $query->result();
	}
	public function hapusProgresTemorary()
	{
		$id = $this->input->post('id');
		$query = $this->db->query("DELETE FROM tb_progres WHERE progres_id = '$id'");
		return $query;
	}
	public function getProgresTemoraryperID()
	{
		$id = $this->input->post('id');
		$query = $this->db->query("SELECT * FROM tb_progres a
								   JOIN tb_blok ON tb_blok.blok_id = a.blok_id
								   JOIN tb_persiapan ON tb_persiapan.bobot_id = a.progres_id
								   JOIN tb_pondasi ON tb_pondasi.bobot_id = a.progres_id
								   JOIN tb_sloof ON tb_sloof.bobot_id = a.progres_id
								   JOIN tb_balok ON tb_balok.bobot_id = a.progres_id
								   JOIN tb_kolom ON tb_kolom.bobot_id = a.progres_id
								   JOIN tb_batubata ON tb_batubata.bobot_id = a.progres_id
								   JOIN tb_plesteraci ON tb_plesteraci.bobot_id = a.progres_id
								   JOIN tb_atap ON tb_atap.bobot_id = a.progres_id
								   JOIN tb_plafon ON tb_plafon.bobot_id = a.progres_id
								   JOIN tb_keramik ON tb_keramik.bobot_id = a.progres_id
								   JOIN tb_plumbing ON tb_plumbing.bobot_id = a.progres_id
								   JOIN tb_listik ON tb_listik.bobot_id = a.progres_id
								   JOIN tb_pengecetan ON tb_pengecetan.bobot_id = a.progres_id
								   JOIN tb_pintudanjendela ON tb_pintudanjendela.bobot_id = a.progres_id
								   WHERE progres_id = '$id' 
								  ");
		return $query->result();
	}
	public function getnomorProgresPerID()
	{
		$id = $this->input->post('id');
		$query = $this->db->query("SELECT * FROM tb_blok
								   JOIN tb_pembangunan USING(pembangunan_id)
								   JOIN tb_bobot a USING(bobot_id)
								   JOIN tb_persiapan ON tb_persiapan.bobot_id = a.bobot_id
								   JOIN tb_pondasi ON tb_pondasi.bobot_id = a.bobot_id
								   JOIN tb_sloof ON tb_sloof.bobot_id = a.bobot_id
								   JOIN tb_balok ON tb_balok.bobot_id = a.bobot_id
								   JOIN tb_kolom ON tb_kolom.bobot_id = a.bobot_id
								   JOIN tb_batubata ON tb_batubata.bobot_id = a.bobot_id
								   JOIN tb_plesteraci ON tb_plesteraci.bobot_id = a.bobot_id
								   JOIN tb_atap ON tb_atap.bobot_id = a.bobot_id
								   JOIN tb_plafon ON tb_plafon.bobot_id = a.bobot_id
								   JOIN tb_keramik ON tb_keramik.bobot_id = a.bobot_id
								   JOIN tb_plumbing ON tb_plumbing.bobot_id = a.bobot_id
								   JOIN tb_listik ON tb_listik.bobot_id = a.bobot_id
								   JOIN tb_pengecetan ON tb_pengecetan.bobot_id = a.bobot_id
								   JOIN tb_pintudanjendela ON tb_pintudanjendela.bobot_id = a.bobot_id
								   WHERE blok_id = '$id'
								  ");
		return $query->result();
	}
	public function cekProgresSebelumnya()
	{
		$id = $this->input->post('id');
		$cek = $this->db->query("SELECT sum(mobAlat) as mobAlat, sum(kemPekerja) as kemPekerja, sum(airPekerja) as airPekerja, sum(keamanan) as keamanan, sum(bouwplank) as bouwplank, sum(galianTanah) as galianTanah, sum(UrugTanah) as UrugTanah, sum(Pembesian_pondasi) as Pembesian_pondasi, sum(begesting_pondasi) as begesting_pondasi, sum(pengecoran_pondasi) as pengecoran_pondasi, sum(pembongkaran_pondasi) as pembongkaran_pondasi, sum(Pembesian_sloof) as Pembesian_sloof, sum(begesting_sloof) as begesting_sloof, sum(pengecoran_sloof) as pengecoran_sloof, sum(pembongkaran_sloof) as pembongkaran_sloof, sum(Pembesian_balok) as Pembesian_balok, sum(begesting_balok) as begesting_balok, sum(pengecoran_balok) as pengecoran_balok, sum(pembongkaran_balok) as pembongkaran_balok, sum(Pembesian_kolom) as Pembesian_kolom, sum(begesting_kolom) as begesting_kolom, sum(pengecoran_kolom) as pengecoran_kolom, sum(pembongkaran_kolom) as pembongkaran_kolom, sum(bataDinding) as bataDinding, sum(bataSekat) as bataSekat, sum(bataKamarMandi) as bataKamarMandi, sum(aciDinding) as aciDinding, sum(aciSekat) as aciSekat, sum(aciKamarMandi) as aciKamarMandi, sum(aciLantai) as aciLantai, sum(aciTeras) as aciTeras, sum(rangkaAtap) as rangkaAtap, sum(penutupAtap) as penutupAtap, sum(lisplankAtap) as lisplankAtap, sum(rangkaPlafon) as rangkaPlafon, sum(penutupPalfon) as penutupPalfon, sum(dempulPlafon) as dempulPlafon, sum(cetPlafon) as cetPlafon, sum(kerKamarMandi) as kerKamarMandi, sum(KerLantai) as KerLantai, sum(kerDinding) as kerDinding, sum(kerCloset) as kerCloset, sum(kerTeras) as kerTeras, sum(airBersih) as airBersih, sum(septiiktank) as septiiktank, sum(instalasiListrik) as instalasiListrik, sum(cet) as cet, sum(pintu) as pintu, sum(jendela) as jendela, sum(progres) as progres, sum(jml_persiapan) as jml_persiapan, sum(jml_pondasi) as jml_pondasi, sum(jml_sloof) as jml_sloof, sum(jml_balok) as jml_balok, sum(jml_kolom) as jml_kolom, sum(jmlBata) as jmlBata, sum(jmlAci) as jmlAci, sum(jmlAtap) as jmlAtap, sum(jmlPlafon) as jmlPlafon, sum(jmlKeramik) as jmlKeramik, sum(jmlPlumbing) as jmlPlumbing, sum(jmlListrik) as jmlListrik, sum(jmlCet) as jmlCet, sum(jmlpintu) as jmlpintu FROM tb_progres a
								 JOIN tb_persiapan ON tb_persiapan.bobot_id = a.progres_id
								 JOIN tb_pondasi ON tb_pondasi.bobot_id = a.progres_id
								 JOIN tb_sloof ON tb_sloof.bobot_id = a.progres_id
								 JOIN tb_balok ON tb_balok.bobot_id = a.progres_id
								 JOIN tb_kolom ON tb_kolom.bobot_id = a.progres_id
								 JOIN tb_batubata ON tb_batubata.bobot_id = a.progres_id
								 JOIN tb_plesteraci ON tb_plesteraci.bobot_id = a.progres_id
								 JOIN tb_atap ON tb_atap.bobot_id = a.progres_id
								 JOIN tb_plafon ON tb_plafon.bobot_id = a.progres_id
								 JOIN tb_keramik ON tb_keramik.bobot_id = a.progres_id
								 JOIN tb_plumbing ON tb_plumbing.bobot_id = a.progres_id
								 JOIN tb_listik ON tb_listik.bobot_id = a.progres_id
								 JOIN tb_pengecetan ON tb_pengecetan.bobot_id = a.progres_id
								 JOIN tb_pintudanjendela ON tb_pintudanjendela.bobot_id = a.progres_id
								 WHERE blok_id='$id' GROUP BY blok_id
								");
		return $cek->result();
	}
	public function savePerUnit($post)
	{
		$gagal="gagal";
		$idd = $post['pilihNomorperunit'];
		$ID = Uuid::uuid4()->toString();
		$get = $this->db->query("SELECT * FROM tb_blok JOIN tb_pembangunan USING(pembangunan_id) JOIN tb_bobot a USING(bobot_id) JOIN tb_persiapan ON tb_persiapan.bobot_id = a.bobot_id JOIN tb_pondasi ON tb_pondasi.bobot_id = a.bobot_id JOIN tb_sloof ON tb_sloof.bobot_id = a.bobot_id JOIN tb_balok ON tb_balok.bobot_id = a.bobot_id JOIN tb_kolom ON tb_kolom.bobot_id = a.bobot_id JOIN tb_batubata ON tb_batubata.bobot_id = a.bobot_id JOIN tb_plesteraci ON tb_plesteraci.bobot_id = a.bobot_id JOIN tb_atap ON tb_atap.bobot_id = a.bobot_id JOIN tb_plafon ON tb_plafon.bobot_id = a.bobot_id JOIN tb_keramik ON tb_keramik.bobot_id = a.bobot_id JOIN tb_plumbing ON tb_plumbing.bobot_id = a.bobot_id JOIN tb_listik ON tb_listik.bobot_id = a.bobot_id JOIN tb_pengecetan ON tb_pengecetan.bobot_id = a.bobot_id JOIN tb_pintudanjendela ON tb_pintudanjendela.bobot_id = a.bobot_id WHERE blok_id = '$idd'");
		$get1 = $this->db->query("SELECT sum(mobAlat) as mobAlat, sum(kemPekerja) as kemPekerja, sum(airPekerja) as airPekerja, sum(keamanan) as keamanan, sum(bouwplank) as bouwplank, sum(galianTanah) as galianTanah, sum(UrugTanah) as UrugTanah, sum(Pembesian_pondasi) as Pembesian_pondasi, sum(begesting_pondasi) as begesting_pondasi, sum(pengecoran_pondasi) as pengecoran_pondasi, sum(pembongkaran_pondasi) as pembongkaran_pondasi, sum(Pembesian_sloof) as Pembesian_sloof, sum(begesting_sloof) as begesting_sloof, sum(pengecoran_sloof) as pengecoran_sloof, sum(pembongkaran_sloof) as pembongkaran_sloof, sum(Pembesian_balok) as Pembesian_balok, sum(begesting_balok) as begesting_balok, sum(pengecoran_balok) as pengecoran_balok, sum(pembongkaran_balok) as pembongkaran_balok, sum(Pembesian_kolom) as Pembesian_kolom, sum(begesting_kolom) as begesting_kolom, sum(pengecoran_kolom) as pengecoran_kolom, sum(pembongkaran_kolom) as pembongkaran_kolom, sum(bataDinding) as bataDinding, sum(bataSekat) as bataSekat, sum(bataKamarMandi) as bataKamarMandi, sum(aciDinding) as aciDinding, sum(aciSekat) as aciSekat, sum(aciKamarMandi) as aciKamarMandi, sum(aciLantai) as aciLantai, sum(aciTeras) as aciTeras, sum(rangkaAtap) as rangkaAtap, sum(penutupAtap) as penutupAtap, sum(lisplankAtap) as lisplankAtap, sum(rangkaPlafon) as rangkaPlafon, sum(penutupPalfon) as penutupPalfon, sum(dempulPlafon) as dempulPlafon, sum(cetPlafon) as cetPlafon, sum(kerKamarMandi) as kerKamarMandi, sum(KerLantai) as KerLantai, sum(kerDinding) as kerDinding, sum(kerCloset) as kerCloset, sum(kerTeras) as kerTeras, sum(airBersih) as airBersih, sum(septiiktank) as septiiktank, sum(instalasiListrik) as instalasiListrik, sum(cet) as cet, sum(pintu) as pintu, sum(jendela) as jendela FROM tb_progres a JOIN tb_persiapan ON tb_persiapan.bobot_id = a.progres_id JOIN tb_pondasi ON tb_pondasi.bobot_id = a.progres_id JOIN tb_sloof ON tb_sloof.bobot_id = a.progres_id JOIN tb_balok ON tb_balok.bobot_id = a.progres_id JOIN tb_kolom ON tb_kolom.bobot_id = a.progres_id JOIN tb_batubata ON tb_batubata.bobot_id = a.progres_id JOIN tb_plesteraci ON tb_plesteraci.bobot_id = a.progres_id JOIN tb_atap ON tb_atap.bobot_id = a.progres_id JOIN tb_plafon ON tb_plafon.bobot_id = a.progres_id JOIN tb_keramik ON tb_keramik.bobot_id = a.progres_id JOIN tb_plumbing ON tb_plumbing.bobot_id = a.progres_id JOIN tb_listik ON tb_listik.bobot_id = a.progres_id JOIN tb_pengecetan ON tb_pengecetan.bobot_id = a.progres_id JOIN tb_pintudanjendela ON tb_pintudanjendela.bobot_id = a.progres_id WHERE blok_id='$idd' GROUP BY blok_id");
		$bobot = $get->row();
		$progres = $get1->row();

		if ($post['1'] > 100 or $post['2'] > 100 or $post['3'] > 100 or $post['4'] > 100 or $post['5'] > 100 or $post['6'] > 100 or $post['7'] > 100 or $post['8'] > 100 or $post['9'] > 100 or $post['10'] > 100 or $post['11'] > 100 or $post['12'] > 100 or $post['13'] > 100 or $post['14'] > 100 or $post['15'] > 100 or $post['16'] > 100 or $post['17'] > 100 or $post['18'] > 100 or $post['19'] > 100 or $post['20'] > 100 or $post['21'] > 100 or $post['22'] > 100 or $post['23'] > 100 or $post['24'] > 100 or $post['25'] > 100 or $post['26'] > 100 or $post['27'] > 100 or $post['28'] > 100 or $post['29'] > 100 or $post['30'] > 100 or $post['31'] > 100 or $post['32'] > 100 or $post['33'] > 100 or $post['34'] > 100 or $post['35'] > 100 or $post['36'] > 100 or $post['37'] > 100 or $post['38'] > 100 or $post['39'] > 100 or $post['40'] > 100 or $post['41'] > 100 or $post['42'] > 100 or $post['43'] > 100 or $post['44'] > 100 or $post['45'] > 100 or $post['46'] > 100 or $post['47'] > 100 or $post['48'] > 100 or $post['49'] > 100) {
			return $gagal;
		}else{
			if ($post['1']+$progres->mobAlat>100 or $post['2']+$progres->kemPekerja>100 or $post['3']+$progres->airPekerja>100 or $post['4']+$progres->keamanan>100 or $post['5']+$progres->bouwplank>100 or $post['6']+$progres->galianTanah>100 or $post['7']+$progres->UrugTanah>100 or $post['8']+$progres->Pembesian_pondasi>100 or $post['9']+$progres->begesting_pondasi>100 or $post['10']+$progres->pengecoran_pondasi>100 or $post['11']+$progres->pembongkaran_pondasi>100 or $post['12']+$progres->Pembesian_sloof>100 or $post['13']+$progres->begesting_sloof>100 or $post['14']+$progres->pengecoran_sloof>100 or $post['15']+$progres->pembongkaran_sloof>100 or $post['16']+$progres->Pembesian_balok>100 or $post['17']+$progres->begesting_balok>100 or $post['18']+$progres->pengecoran_balok>100 or $post['19']+$progres->pembongkaran_balok>100 or $post['20']+$progres->Pembesian_kolom>100 or $post['21']+$progres->begesting_kolom>100 or $post['22']+$progres->pengecoran_kolom>100 or $post['23']+$progres->pembongkaran_kolom>100 or $post['24']+$progres->bataDinding>100 or $post['25']+$progres->bataSekat>100 or $post['26']+$progres->bataKamarMandi>100 or $post['27']+$progres->aciDinding>100 or $post['28']+$progres->aciSekat>100 or $post['29']+$progres->aciKamarMandi>100 or $post['30']+$progres->aciLantai>100 or $post['31']+$progres->aciTeras>100 or $post['32']+$progres->rangkaAtap>100 or $post['33']+$progres->penutupAtap>100 or $post['34']+$progres->lisplankAtap>100 or $post['35']+$progres->rangkaPlafon>100 or $post['36']+$progres->penutupPalfon>100 or $post['37']+$progres->dempulPlafon>100 or $post['38']+$progres->cetPlafon>100 or $post['39']+$progres->kerKamarMandi>100 or $post['40']+$progres->KerLantai>100 or $post['41']+$progres->kerDinding>100 or $post['42']+$progres->kerCloset>100 or $post['43']+$progres->kerTeras>100 or $post['44']+$progres->airBersih>100 or $post['45']+$progres->septiiktank>100 or $post['46']+$progres->instalasiListrik>100 or $post['47']+$progres->cet>100 or $post['48']+$progres->pintu>100 or $post['49']+$progres->jendela>100) {
				return $gagal;
			}else{
				$sum = $post['jml1']+ $post['jml2']+ $post['jml3']+ $post['jml4']+ $post['jml5']+ $post['jml6']+ $post['jml7']+ $post['jml8']+ $post['jml9']+ $post['jml10']+ $post['jml11']+ $post['jml12']+ $post['jml13']+ $post['jml14'];
				$progres = array(
					'progres_id' => $ID,
					'pembangunan_id' => $post['idpembangunan'],
					'progres' => $post['jmlall'],
					'blok_id' => $idd,
					'status' => 0,
					'created' => date("Y-m-d H:i:s")
				);
				$persiapan= array(
					'bobot_id' =>$ID,
					'mobAlat'=> $post['1'],
					'kemPekerja'=>$post['2'],
					'airPekerja'=>$post['3'],
					'keamanan'=>$post['4'],
					'jml_persiapan'=>($post['1']/4)+($post['2']/4)+($post['3']/4)+($post['4']/4)
					);
				$pondasi= array(
					'bobot_id'=>$ID,
					'bouwplank'=>$post['5'],
					'galianTanah'=>$post['6'],
					'UrugTanah'=>$post['7'],
					'Pembesian_pondasi'=>$post['8'],
					'begesting_pondasi'=>$post['9'],
					'pengecoran_pondasi'=>$post['10'],
					'pembongkaran_pondasi'=>$post['11'],
					'jml_pondasi'=>($post['5']/7)+ ($post['6']/7)+ ($post['7']/7)+ ($post['8']/7)+ ($post['9']/7)+ ($post['10']/7)+ ($post['11']/7)
					);
				$sloof= array(
					'bobot_id'=>$ID,
					'Pembesian_sloof'=>$post['12'],
					'begesting_sloof'=>$post['13'],
					'pengecoran_sloof'=>$post['14'],
					'pembongkaran_sloof'=>$post['15'],
					'jml_sloof'=>($post['12']/4)+($post['13']/4)+($post['14']/4)+($post['15']/4)
					);
				$balok= array(
					'bobot_id'=>$ID,
					'Pembesian_balok'=>$post['16'],
					'begesting_balok'=>$post['17'],
					'pengecoran_balok'=>$post['18'],
					'pembongkaran_balok'=>$post['19'],
					'jml_balok'=>($post['16']/4)+ ($post['17']/4)+ ($post['18']/4)+ ($post['19']/4)
					);
				$kolom= array(
					'bobot_id'=>$ID,
					'Pembesian_kolom'=>$post['20'],
					'begesting_kolom'=>$post['21'],
					'pengecoran_kolom'=>$post['22'],
					'pembongkaran_kolom'=>$post['23'],
					'jml_kolom'=>($post['20']/4)+ ($post['21']/4)+ ($post['22']/4)+ ($post['23']/4)
					);
				$batubata= array(
					'bobot_id'=>$ID,
					'bataDinding'=>$post['24'],
					'bataSekat'=>$post['25'],
					'bataKamarMandi'=>$post['26'],
					'jmlBata'=>($post['24']/3)+ ($post['25']/3)+ ($post['26']/3)
					);
				$plesteraci= array(
					'bobot_id'=>$ID,
					'aciDinding'=>$post['27'],
					'aciSekat'=>$post['28'],
					'aciKamarMandi'=>$post['29'],
					'aciLantai'=>$post['30'],
					'aciTeras'=>$post['31'],
					'jmlAci'=>($post['27']/5)+ ($post['28']/5)+ ($post['29']/5)+ ($post['30']/5)+ ($post['31']/5)
					);
				$atap= array(
					'bobot_id'=>$ID,
					'rangkaAtap'=>$post['32'],
					'penutupAtap'=>$post['33'],
					'lisplankAtap'=>$post['34'],
					'jmlAtap'=>($post['32']/3)+ ($post['33']/3)+ ($post['34']/3)
					);
				$plafon= array(
					'bobot_id'=>$ID,
					'rangkaPlafon'=>$post['35'],
					'penutupPalfon'=>$post['36'],
					'dempulPlafon'=>$post['37'],
					'cetPlafon'=>$post['38'],
					'jmlPlafon'=>($post['35']/4)+ ($post['36']/4)+ ($post['37']/4)+ ($post['38']/4)
					);
				$keramik= array(
					'bobot_id'=>$ID,
					'kerKamarMandi'=>$post['39'],
					'KerLantai'=>$post['40'],
					'kerDinding'=>$post['41'],
					'kerCloset'=>$post['42'],
					'kerTeras'=>$post['43'],
					'jmlKeramik'=>($post['39']/5)+ ($post['40']/5)+ ($post['41']/5)+ ($post['42']/5)+ ($post['43']/5)
					);
				$plumbing= array(
					'bobot_id' => $ID,
					'airBersih'=>$post['44'],
					'septiiktank'=>$post['45'],
					'jmlPlumbing'=>($post['44']/2)+ ($post['45']/2)
					);
				$listrik= array(
					'bobot_id' => $ID,
					'instalasiListrik'=>$post['46'],
					'jmlListrik'=>$post['46']
					);
				$pengecetan= array(
					'bobot_id' => $ID,
					'cet'=>$post['47'],
					'jmlCet'=>$post['47']
					);
				$pintu= array(
					'bobot_id' => $ID,
					'pintu'=>$post['48'],
					'jendela'=>$post['49'],
					'jmlpintu'=>($post['48']/2)+ ($post['49']/2)
					);
				$this->db->insert('tb_progres',$progres);
				$this->db->insert('tb_persiapan',$persiapan);
				$this->db->insert('tb_pondasi',$pondasi);
				$this->db->insert('tb_sloof',$sloof);
				$this->db->insert('tb_balok',$balok);
				$this->db->insert('tb_kolom',$kolom);
				$this->db->insert('tb_batubata',$batubata);
				$this->db->insert('tb_plesteraci',$plesteraci);
				$this->db->insert('tb_atap',$atap);
				$this->db->insert('tb_plafon',$plafon);
				$this->db->insert('tb_keramik',$keramik);
				$this->db->insert('tb_plumbing',$plumbing);
				$this->db->insert('tb_listik',$listrik);
				$this->db->insert('tb_pengecetan',$pengecetan);
				$this->db->insert('tb_pintudanjendela',$pintu);
			}
		}
	}
	public function saveDataTemporary()
	{
		$date=date("Y-m-d H:i:s");
		$jmlBlok = $this->input->post('jumlahBlok');
		$id = $this->session->userdata('perusahaan');
		$idd=$this->input->post('id');
		$query = $this->db->query("UPDATE tb_progres SET status=1, updated='$date',jmlBlok='$jmlBlok' WHERE status = 0 AND pembangunan_id='$idd'");
		if ($this->db->affected_rows($query) > 0) {
			return "sukses";
		}else{
			return "gagal";
		}
	}
	public function viewpembangunan()
	{
		$idCompany = $this->session->userdata('perusahaan');
		$query = $this->db->query(" SELECT *,
									(SELECT sum(progres) FROM tb_progres e WHERE status =1 AND e.pembangunan_id=a.pembangunan_id) as jmlProgres,
									(SELECT count(pembangunan_id) FROM tb_pembangunan f WHERE f.proyek_id=c.proyek_id) as jmlpembangunan
									FROM tb_progres a
									JOIN tb_pembangunan b ON b.pembangunan_id = a.pembangunan_id
									JOIN tb_proyek c ON c.proyek_id = b.proyek_id
									JOIN tb_bobot d ON d.bobot_id = b.bobot_id
									WHERE a.status = 1 AND c.company_id='$idCompany' AND b.pembangunan_id = a.pembangunan_id
									GROUP BY a.pembangunan_id
									ORDER BY nama ASC
									");
		return $query->result();
	}
	public function temporaryPembangunanPerID()
	{
		$idd = $this->session->userdata('perusahaan');
		$id = $this->input->post('id');
		$query = $this->db->query(" 
			SELECT *,
			(SELECT sum(progres) FROM tb_progres WHERE blok_id = a.blok_id AND pembangunan_id='$id' AND status=1) as jmlprogres,
			(SELECT sum(progres) FROM tb_progres WHERE pembangunan_id = '$id' AND status=1) as jmlprogresAll
			FROM tb_progres a 
			JOIN tb_blok b ON b.blok_id=a.blok_id
			JOIN tb_pembangunan c ON c.pembangunan_id=a.pembangunan_id
			JOIN tb_proyek d ON d.proyek_id=c.proyek_id
			JOIN tb_bobot f ON f.bobot_id = c.bobot_id
			WHERE a.pembangunan_id='$id' AND a.status=1
			GROUP BY a.blok_id 
			ORDER BY blok
		");
		return $query->result();
	}
	public function hapusPengajuanTemoraryPerID()
	{
		$id = $this->input->post('id');
		$query = $this->db->query("DELETE FROM tb_progres WHERE pembangunan_id='$id' AND status=1");
		if ($this->db->affected_rows($query) > 0) {
			return "berhasil";
		}else{
			return "gagal";
		}
	}
	public function saveTemporarypengajuan()
	{
		$date=date("Y-m-d H:i:s");
		$id = $this->session->userdata('perusahaan');
		$get = $this->db->query("SELECT pembangunan_id FROM tb_pembangunan JOIN tb_proyek USING(proyek_id) WHERE company_id='$id' ");

		if ($this->db->affected_rows($get) > 0) {
			foreach ($get->result() as $data) {
				$get2 = $this->db->query("SELECT pengajuan FROM tb_pengajuan WHERE company_id='$id' AND pembangunan_id='$data->pembangunan_id'")->row();
				if ($this->db->affected_rows($get2) > 0) {
					$ID = Uuid::uuid4()->toString();
					$query = $this->db->query("UPDATE tb_progres SET status =2,updated='$date',pengajuan_id='$ID' WHERE status=1 AND pembangunan_id='$data->pembangunan_id'");
					$pengajuan = array(
						'pengajuan_id' => $ID,
						'pembangunan_id' => $data->pembangunan_id,
						'company_id' => $id,
						'pengajuan' =>$get2->pengajuan+1,
						'statusPengajuan'=>1,
						'created' => $date
					);
					$query2 = $this->db->insert('tb_pengajuan',$pengajuan);
				}else{
					$ID = Uuid::uuid4()->toString();
					$query = $this->db->query("UPDATE tb_progres SET status =2,updated='$date',pengajuan_id='$ID' WHERE status=1 AND pembangunan_id='$data->pembangunan_id'");
					$pengajuan = array(
						'pengajuan_id' => $ID,
						'pembangunan_id' => $data->pembangunan_id,
						'company_id' => $id,
						'pengajuan' =>1,
						'statusPengajuan'=>1,
						'created' => $date
					);
					$query2 = $this->db->insert('tb_pengajuan',$pengajuan);
				}
			}
			if ($this->db->affected_rows($query) > 0 AND $this->db->affected_rows($query2) > 0) {
				return "sukses";
			}else{
				return "gagal";
			}
		}else{
			return "gagal";
		}
	}
	public function viewPengajuan()
	{
		$idCompany = $this->session->userdata('perusahaan');
		$query = $this->db->query(" SELECT *,
									(SELECT sum(progres) FROM tb_progres e WHERE status =2 AND e.pembangunan_id=a.pembangunan_id) as jmlProgres,
									(SELECT count(pembangunan_id) FROM tb_pembangunan f WHERE f.proyek_id=c.proyek_id) as jmlpembangunan
									FROM tb_progres a
									JOIN tb_pembangunan b ON b.pembangunan_id = a.pembangunan_id
									JOIN tb_proyek c ON c.proyek_id = b.proyek_id
									JOIN tb_bobot d ON d.bobot_id = b.bobot_id
									JOIN tb_pengajuan g ON g.pengajuan_id=a.pengajuan_id
									WHERE a.status = 2 AND c.company_id='$idCompany' AND b.pembangunan_id = a.pembangunan_id
									GROUP BY a.pembangunan_id
									ORDER BY nama ASC
									");
		return $query->result();
	}
	
// Query untuk pemeriksaan
	public function GetPemeriksaan()
	{
		$luser= $this->session->userdata('level_user');
		$lcompany= $this->session->userdata('level_company');
		if ($luser == 3 && $lcompany == 3) {//untuk officer projeck
			$query = $this->db->query(" 
				SELECT *,
				(SELECT sum(progres) FROM tb_progres e WHERE status =2 AND e.pembangunan_id=a.pembangunan_id) as jmlProgres,
				(SELECT count(pembangunan_id) FROM tb_pembangunan f WHERE f.proyek_id=c.proyek_id) as jmlpembangunan
				FROM tb_progres a
				JOIN tb_pembangunan b ON b.pembangunan_id = a.pembangunan_id
				JOIN tb_proyek c ON c.proyek_id = b.proyek_id
				JOIN tb_bobot d ON d.bobot_id = b.bobot_id
				JOIN tb_pengajuan g ON g.pengajuan_id=a.pengajuan_id
				WHERE b.pembangunan_id = a.pembangunan_id
				GROUP BY a.pembangunan_id
				ORDER BY namaProyek
				");
		return $query;
		}elseif($luser == 4 && $lcompany == 3){//untuk engginering
			$query = $this->db->query(" 
				SELECT *,
				(SELECT sum(progres) FROM tb_progres e WHERE status =2 AND e.pembangunan_id=a.pembangunan_id) as jmlProgres,
				(SELECT count(pembangunan_id) FROM tb_pembangunan f WHERE f.proyek_id=c.proyek_id) as jmlpembangunan
				FROM tb_progres a
				JOIN tb_pembangunan b ON b.pembangunan_id = a.pembangunan_id
				JOIN tb_proyek c ON c.proyek_id = b.proyek_id
				JOIN tb_bobot d ON d.bobot_id = b.bobot_id
				JOIN tb_pengajuan g ON g.pengajuan_id=a.pengajuan_id
				WHERE statusPengajuan != 1 AND b.pembangunan_id = a.pembangunan_id AND statusPengajuan != 8
				GROUP BY a.pembangunan_id
				ORDER BY namaProyek
				");
			return $query;
		}elseif($luser == 5 && $lcompany == 3){//untuk kepala devisi
			$query = $this->db->query(" 
				SELECT *,
				(SELECT sum(progres) FROM tb_progres e WHERE status =2 AND e.pembangunan_id=a.pembangunan_id) as jmlProgres,
				(SELECT count(pembangunan_id) FROM tb_pembangunan f WHERE f.proyek_id=c.proyek_id) as jmlpembangunan
				FROM tb_progres a
				JOIN tb_pembangunan b ON b.pembangunan_id = a.pembangunan_id
				JOIN tb_proyek c ON c.proyek_id = b.proyek_id
				JOIN tb_bobot d ON d.bobot_id = b.bobot_id
				JOIN tb_pengajuan g ON g.pengajuan_id=a.pengajuan_id
				WHERE statusPengajuan != 2 AND statusPengajuan != 1 AND statusPengajuan != 8 AND statusPengajuan != 9 AND b.pembangunan_id = a.pembangunan_id
				GROUP BY a.pembangunan_id
				ORDER BY namaProyek
				");
			return $query;
		}elseif($luser == 6 && $lcompany == 3){//untuk pimpinan proyek
			$query = $this->db->query(" 
				SELECT *,
				(SELECT sum(progres) FROM tb_progres e WHERE status =2 AND e.pembangunan_id=a.pembangunan_id) as jmlProgres,
				(SELECT count(pembangunan_id) FROM tb_pembangunan f WHERE f.proyek_id=c.proyek_id) as jmlpembangunan
				FROM tb_progres a
				JOIN tb_pembangunan b ON b.pembangunan_id = a.pembangunan_id
				JOIN tb_proyek c ON c.proyek_id = b.proyek_id
				JOIN tb_bobot d ON d.bobot_id = b.bobot_id
				JOIN tb_pengajuan g ON g.pengajuan_id=a.pengajuan_id
				WHERE statusPengajuan != 3 AND statusPengajuan != 2 AND statusPengajuan != 1 AND statusPengajuan != 8 AND statusPengajuan != 9 AND statusPengajuan != 10 AND b.pembangunan_id = a.pembangunan_id
				GROUP BY a.pembangunan_id
				ORDER BY namaProyek
				");
			return $query;
		}elseif($luser == 7 && $lcompany == 3){//untuk finance
			$query = $this->db->query(" 
				SELECT *,
				(SELECT sum(progres) FROM tb_progres e WHERE status =2 AND e.pembangunan_id=a.pembangunan_id) as jmlProgres,
				(SELECT count(pembangunan_id) FROM tb_pembangunan f WHERE f.proyek_id=c.proyek_id) as jmlpembangunan
				FROM tb_progres a
				JOIN tb_pembangunan b ON b.pembangunan_id = a.pembangunan_id
				JOIN tb_proyek c ON c.proyek_id = b.proyek_id
				JOIN tb_bobot d ON d.bobot_id = b.bobot_id
				JOIN tb_pengajuan g ON g.pengajuan_id=a.pengajuan_id
				WHERE statusPengajuan != 5 AND statusPengajuan != 4 AND statusPengajuan != 3 AND statusPengajuan != 2 AND statusPengajuan != 1 AND statusPengajuan != 8 AND statusPengajuan != 9 AND statusPengajuan != 10 AND statusPengajuan != 11 AND statusPengajuan != 12 AND b.pembangunan_id = a.pembangunan_id
				GROUP BY a.pembangunan_id
				ORDER BY namaProyek
				");
			return $query;
		}elseif($luser == 1 && $lcompany == 3){//untuk direktur utama
			$query = $this->db->query(" 
				SELECT *,
				(SELECT sum(progres) FROM tb_progres e WHERE status =2 AND e.pembangunan_id=a.pembangunan_id) as jmlProgres,
				(SELECT count(pembangunan_id) FROM tb_pembangunan f WHERE f.proyek_id=c.proyek_id) as jmlpembangunan
				FROM tb_progres a
				JOIN tb_pembangunan b ON b.pembangunan_id = a.pembangunan_id
				JOIN tb_proyek c ON c.proyek_id = b.proyek_id
				JOIN tb_bobot d ON d.bobot_id = b.bobot_id
				JOIN tb_pengajuan g ON g.pengajuan_id=a.pengajuan_id
				WHERE statusPengajuan != 4 AND statusPengajuan != 3 AND statusPengajuan != 2 AND statusPengajuan != 1 AND statusPengajuan != 8 AND statusPengajuan != 9 AND statusPengajuan != 10 AND statusPengajuan != 11 AND b.pembangunan_id = a.pembangunan_id
				GROUP BY a.pembangunan_id
				ORDER BY namaProyek
				");
			return $query;
		}
	}
	public function approvePemeriksaan()
	{
		$luser= $this->session->userdata('level_user');
		$lcompany= $this->session->userdata('level_company');
		if ($lcompany == 3 && $luser == 3) {
			$id = $this->input->post('id');
			$query = $this->db->query("UPDATE tb_pengajuan SET statusPengajuan=2 WHERE pengajuan_id='$id'");
			return $query;
		}elseif ($lcompany == 3 && $luser == 4) {
			$id = $this->input->post('id');
			$query = $this->db->query("UPDATE tb_pengajuan SET statusPengajuan=3 WHERE pengajuan_id='$id'");
			return $query;
		}elseif ($lcompany == 3 && $luser == 5) {
			$id = $this->input->post('id');
			$query = $this->db->query("UPDATE tb_pengajuan SET statusPengajuan=4 WHERE pengajuan_id='$id'");
			return $query;
		}elseif ($lcompany == 3 && $luser == 6) {
			$id = $this->input->post('id');
			$query = $this->db->query("UPDATE tb_pengajuan SET statusPengajuan=5 WHERE pengajuan_id='$id'");
			return $query;
		}elseif ($lcompany == 3 && $luser == 1) {
			$id = $this->input->post('id');
			$query = $this->db->query("UPDATE tb_pengajuan SET statusPengajuan=6 WHERE pengajuan_id='$id'");
			return $query;
		}elseif ($lcompany == 3 && $luser == 7) {
			$id = $this->input->post('id');
			$query = $this->db->query("UPDATE tb_pengajuan SET statusPengajuan=7 WHERE pengajuan_id='$id'");
			return $query;
		}
	}
	public function rejectPemeriksaan()
	{
		$luser= $this->session->userdata('level_user');
		$lcompany= $this->session->userdata('level_company');
		if ($lcompany == 3 && $luser == 3) {//officer projeck
			$id = $this->input->post('id');
			$query = $this->db->query("UPDATE tb_pengajuan SET statusPengajuan=8 WHERE pengajuan_id='$id'");
			return $query;
		}elseif ($lcompany == 3 && $luser == 4) {//Engginering
			$id = $this->input->post('id');
			$query = $this->db->query("UPDATE tb_pengajuan SET statusPengajuan=9 WHERE pengajuan_id='$id'");
			return $query;
		}elseif ($lcompany == 3 && $luser == 5) {//Kepala Devisi
			$id = $this->input->post('id');
			$query = $this->db->query("UPDATE tb_pengajuan SET statusPengajuan=10 WHERE pengajuan_id='$id'");
			return $query;
		}elseif ($lcompany == 3 && $luser == 6) {//Pimpinan Proyek
			$id = $this->input->post('id');
			$query = $this->db->query("UPDATE tb_pengajuan SET statusPengajuan=11 WHERE pengajuan_id='$id'");
			return $query;
		}elseif ($lcompany == 3 && $luser == 1) {//Direktur
			$id = $this->input->post('id');
			$query = $this->db->query("UPDATE tb_pengajuan SET statusPengajuan=12 WHERE pengajuan_id='$id'");
			return $query;
		}
	}

// Query untuk 	profile
	public function editProfile($post)
	{
		$id = $this->session->userdata('userid');

		$Profile['namaLengkap']=$post['nama'];
		$Profile['status']=$post['status'];
		$Profile['pendTerakhir']=$post['pendidikan'];
		$Profile['alamat']=$post['alamat'];
		$Profile['noTelp']=$post['nomor'];
		$Profile['email']=$post['email'];
		$Profile['wa']=$post['wa'];
		$Profile['username']=$post['username'];
		$Profile['updated']=date("Y-m-d H:i:s");;
		if (!empty($post['password'])) {
			$Profile['password']=$post['password'];
		}
		$this->db->where('user_id',$id);
		$this->db->update('tb_users',$Profile);
		return;
	}
}



