<?php if(!defined('BASEPATH')) exit('Direct Script Is not Allowed');

Class gapoktan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model(array('model_gapoktan'));
		$this->load->helper(array('url','form'));
	}
	
	function index()
	{
		$data =array('main_view' => 'data/gapoktan','title' =>'Data Gapoktan','bread'=>'Gapoktan');
		$data['gapoktan'] = $this->model_gapoktan->ambil();
		array_push($data,$data['gapoktan']);
		$data['id'] = $this->model_gapoktan->autoid();
		array_push($data,$data['id']);
		$this->load->helper('url');
		$this->load->view('index',$data);
	}

	public function ajax_list()
	{
		$list = $this->model_gapoktan->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $gapoktan) {
			$no++;
			$row = array();
			$row[] = $gapoktan->id_gapoktan;
			$row[] = $gapoktan->nm_gapoktan;
			$row[] = $gapoktan->kab_gapoktan;
			$row[] = $gapoktan->ket;
			$row[] = $gapoktan->tgl;
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_gapoktan('."'".$gapoktan->id_gapoktan."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_gapoktan('."'".$gapoktan->id_gapoktan."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->model_gapoktan->count_all(),
						"recordsFiltered" => $this->model_gapoktan->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	public function ajax_edit($id)
	{
		$data = $this->model_gapoktan->get_by_id($id);
		echo json_encode($data);
	}
public function ajax_add()
	{
		$tgl=date('Y-m-d');
		$data = array(
				'id_gapoktan' => $this->input->post('id'),
				'nm_gapoktan' => $this->input->post('nama'),
				'legal_aspek' => $this->input->post('la'),
				'thn_berdiri' => $this->input->post('tb'),
				'thn_operasi' => $this->input->post('to'),
				'desa_gapoktan' => $this->input->post('nd'),
				'kec_gapoktan' => $this->input->post('nk'),
				'kab_gapoktan' => $this->input->post('kab'),
				'ketua_gapoktan' => $this->input->post('nk'),
				'no_hp' => $this->input->post('nh'),
				'ket' => $this->input->post('ket'),
				'tgl' => $tgl,
			);
		$user = array(
			'uid' => $this->input->post('id'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'level' => 'gapoktan',
			);
		$insert = $this->model_gapoktan->save($data);
		$input	= $this->model_gapoktan->saveuser($user);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'nm_gapoktan' => $this->input->post('nama'),
				'kab_gapoktan' => $this->input->post('kab'),
				'ket' => $this->input->post('ket'),
				);
		
		$this->model_gapoktan->update(array('id_gapoktan' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->model_gapoktan->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	public function regis()
	{
		$list = $this->model_gapoktan->regis();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $gapoktan) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $gapoktan->nm_gapoktan;
			$row[] = $gapoktan->kab_gapoktan;
			$row[] = $gapoktan->ket;
			$row[] = $gapoktan->username;
			//add html for action
			$row[] = '<a class="btn btn-sm btn-success" href="javascript:void(0)" title="Setujui" onclick="setujui('."'".$gapoktan->username."'".')"><i class="glyphicon glyphicon-ok"></i> Setujui</a>
			<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Tolak" onclick="tolak('."'".$gapoktan->username."'".')"><i class="glyphicon glyphicon-remove"></i> Tolak</a>';
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->model_gapoktan->hitung_all(),
						"recordsFiltered" => $this->model_gapoktan->hitung_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	public function setujui($id)
	{
		$this->model_gapoktan->setujui($id);
		echo json_encode(array("status" => TRUE));
	}
	public function tolak($id)
	{
		$this->model_gapoktan->tolak($id);
		echo json_encode(array("status" => TRUE));
	}
	public function detail($id)
	{
		$data =array('main_view' => 'data/detailgapoktan','title' =>'Detail Gapoktan','bread'=>'Detail Gapoktan');
		$data['gapoktan'] = $this->model_gapoktan->detail($id)->result();
		array_push($data,$data['gapoktan']);
		$this->load->view('index',$data);
	}
}