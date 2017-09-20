<?php if(!defined('BASEPATH')) exit('Direct Script Is not Allowed');

class regis extends CI_Controller
{
	function __construct()
	{
		parent:: __construct();
		$this->load->model('model_regis');
	}
//proses pemanggilan registrasi gapoktan
	public function gapoktan()
	{
		$data = array(
			'nm_gapoktan' => $this->input->post('nama'),
			'legal_aspek' => $this->input->post('la'),
			'nm_gapoktan' => $this->input->post('nama'),
			'thn_berdiri' => $this->input->post('tb'),
			'thn_operasi' => $this->input->post('to'),
			'desa_gapoktan' => $this->input->post('nd'),
			'kec_gapoktan' => $this->input->post('nk'),
			'kab_gapoktan' => $this->input->post('kab'),
			'ketua_gapoktan' => $this->input->post('nk'),
			'no_hp' => $this->input->post('nh'),
			'ket' => $this->input->post('ket'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			);
		$this->model_regis->addgapoktan($data);
		echo "<Script> window.alert('data menunggu konfirmasi'); window.history.back();</Script>";;
	}
//proses pemanggilan registrasi perusahaan
	public function perusahaan()
	{
		$data = array(
				'nm_perusahaan' => $this->input->post('nama'),
				'alamat_kantor' => $this->input->post('alamat'),
				'kota_kantor' => $this->input->post('kotakantor'),
				'prov_kantor' => $this->input->post('provkantor'),
				'tel_kantor' => $this->input->post('telkantor'),
				'email_kantor' => $this->input->post('emailkantor'),
				'alamat_pabrik' => $this->input->post('alamatpabrik'),
				'kota_pabrik' => $this->input->post('kotapabrik'),
				'prov_pabrik' => $this->input->post('provpabrik'),
				'keterangan' => $this->input->post('ket'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
			);
		$this->model_regis->addperusahaan($data);
		echo "<Script> window.alert('data menunggu konfirmasi'); window.history.back();</Script>";;
	}

	public function peserta()
	{
		$data = array(
				'nm_peserta' => $this->input->post('nama'),
				'tmpt_lahir' => $this->input->post('tl'),
				'tgl_lahir' => $this->input->post('tgllhr'),
				'pekerjaan' => $this->input->post('pekerjaan'),
				'status' => $this->input->post('status'),
				'alamat' => $this->input->post('alamat'),
				'rtrw' => $this->input->post('rtrw'),
				'kelurahan' => $this->input->post('kelurahan'),
				'kecamatan' => $this->input->post('kecamatan'),
				'kabupaten' => $this->input->post('kabupaten'),
				'provinsi' => $this->input->post('provinsi'),
				'jk' => $this->input->post('jk'),
				'agama' => $this->input->post('agama'),
				'ket' => $this->input->post('ket'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
			);
		$this->model_regis->addpeserta($data);
		echo "<Script> window.alert('data menunggu konfirmasi'); window.history.back();</Script>";;
	}
}