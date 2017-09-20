<?php if(!defined('BASEPATH')) exit('Direct Script Is not Allowed');

Class perusahaan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model(array('model_perusahaan'));
		$this->load->helper(array('url','form'));
	}
	function index()
	{
		$data =array('main_view' => 'data/perusahaan','title' =>'Data perusahaan','bread'=>'perusahaan');
		$data['id'] = $this->model_perusahaan->autoid();
		array_push($data,$data['id']);
		$this->load->helper('url');
		$this->load->view('index',$data);
	}

	public function ajax_list()
	{
		$list = $this->model_perusahaan->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $peserta) {
			$no++;
			$row = array();
			$row[] = $peserta->id_perusahaan;
			$row[] = $peserta->nm_perusahaan;
			$row[] = $peserta->kota_kantor;
			$row[] = $peserta->prov_kantor;
			$row[] = $peserta->tgl;
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_perusahaan('."'".$peserta->id_perusahaan."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_perusahaan('."'".$peserta->id_perusahaan."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->model_perusahaan->count_all(),
						"recordsFiltered" => $this->model_perusahaan->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	public function ajax_edit($id)
	{
		$data = $this->model_perusahaan->get_by_id($id);
		echo json_encode($data);
	}
public function ajax_add()
	{
		$tgl=date('Y-m-d');
		$data = array(
				'id_perusahaan' => $this->input->post('id'),
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
				'tgl' => $tgl,
			);
		$user = array(
			'uid' => $this->input->post('id'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'level' => 'peserta',
			);
		$insert = $this->model_perusahaan->save($data);
		$input	= $this->model_perusahaan->saveuser($user);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
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
			);
		
		$this->model_perusahaan->update(array('id_perusahaan' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->model_perusahaan->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	public function regis()
	{
		$list = $this->model_perusahaan->regis();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $peserta) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $peserta->nm_perusahaan;
			$row[] = $peserta->kota_kantor;
			$row[] = $peserta->prov_kantor;
			$row[] = $peserta->username;
			$row[] = '<a class="btn btn-sm btn-success" href="javascript:void(0)" title="Setujui" onclick="setujui('."'".$peserta->username."'".')"><i class="glyphicon glyphicon-ok"></i> Setujui</a>
			<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Tolak" onclick="tolak('."'".$peserta->username."'".')"><i class="glyphicon glyphicon-remove"></i> Tolak</a>';
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->model_perusahaan->count_all(),
						"recordsFiltered" => $this->model_perusahaan->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	public function setujui($id)
	{
		$this->model_perusahaan->setujui($id);
		echo json_encode(array("status" => TRUE));
	}
	public function tolak($id)
	{
		$this->model_perusahaan->tolak($id);
		echo json_encode(array("status" => TRUE));
	}
	public function detail($id)
	{
		$data =array('main_view' => 'data/detailperusahaan','title' =>'Detail perusahaan','bread'=>'Detail perusahaan');
		$data['perusahaan'] = $this->model_perusahaan->detail($id)->result();
		array_push($data,$data['perusahaan']);
		$this->load->view('index',$data);
	}
}