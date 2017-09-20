<?php if(!defined('BASEPATH')) exit('Direct Script Is not Allowed');

class try_peserta extends CI_Controller
{

	public function __construct()
	{
		parent:: __construct();
		if(($this->session->userdata('level')!='peserta')||(empty($this->session->userdata('level'))))
		{
			redirect('auth');
		}
		$this->load->helper('text');
		$this->load->model('model_peserta');
	}

	function index()
	{
		$data['username'] = $this->session->userdata('username');
		$data =array('main_view' => 'peserta/index','title' =>'Dashboard Peserta','bread'=>'Dashboard');
		array_push($data,$data['username']);
		$data['mod'] = "ok";
		array_push($data,$data['mod']);
		$data['mods'] = "#loginsuccess";
		array_push($data, $data['mods']);
		$this->session->set_flashdata('message', 'Login Sukses'); 
		$this->load->view('index',$data);
	}
	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		$this->session->sess_destroy();
		redirect('auth');
	}
	
	public function partisipasi()
	{
		$data =array('main_view' => 'data/partisipasi','title' =>'Dashboard Peserta','bread'=>'Dashboard');
		$list = $this->model_peserta->getpartisipas($id);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $partisipasi) {
			$no++;
			$row = array();
			$row[] = $partisipasi->id_lelang;
			$row[] = $partisipasi->jdl_lelang;
			$row[] = $partisipasi->tgl_tutup;
			$row[] = $partisipasi->jml_tawar;
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_partisipasi('."'".$partisipasi->id_partisipasi."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_partisipasi('."'".$partisipasi->id_partisipasi."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->model_partisipasi->count_all(),
						"recordsFiltered" => $this->model_partisipasi->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
}