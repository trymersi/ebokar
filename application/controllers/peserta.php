<?php if(!defined('BASEPATH')) exit('Direct Script Is not Allowed');

Class peserta extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model(array('model_peserta'));
		$this->load->helper(array('url','form'));
	}
	function index()
	{
		$data =array('main_view' => 'data/peserta','title' =>'Data Peseta','bread'=>'Peserta');
		$data['id'] = $this->model_peserta->autoid();
		array_push($data,$data['id']);
		$this->load->helper('url');
		$this->load->view('index',$data);
	}

	public function ajax_list()
	{
		$list = $this->model_peserta->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $peserta) {
			$no++;
			$row = array();
			$row[] = $peserta->id_peserta;
			$row[] = $peserta->nm_peserta;
			$row[] = $peserta->kabupaten;
			$row[] = $peserta->provinsi;
			$row[] = $peserta->tgl;
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_peserta('."'".$peserta->id_peserta."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_peserta('."'".$peserta->id_peserta."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->model_peserta->count_all(),
						"recordsFiltered" => $this->model_peserta->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	public function ajax_edit($id)
	{
		$data = $this->model_peserta->get_by_id($id);
		echo json_encode($data);
	}
public function ajax_add()
	{
		$tgl=date('Y-m-d');
		$data = array(
				'id_peserta' => $this->input->post('id'),
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
				'tgl' => $tgl,
			);
		$user = array(
			'uid' => $this->input->post('id'),
			'username' => $this->input->post('user'),
			'password' => md5($this->input->post('pass')),
			'level' => 'peserta',
			);
		$insert = $this->model_peserta->save($data);
		$input	= $this->model_peserta->saveuser($user);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
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
			);
		
		$this->model_peserta->update(array('id_peserta' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->model_peserta->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	public function regis()
	{
		$list = $this->model_peserta->regis();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $peserta) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $peserta->nm_peserta;
			$row[] = $peserta->pekerjaan;
			$row[] = $peserta->kabupaten;
			$row[] = $peserta->provinsi;
			$row[] = $peserta->username;
			//add html for action
			$row[] = '<a class="btn btn-sm btn-success" href="javascript:void(0)" title="Setujui" onclick="setujui('."'".$peserta->username."'".')"><i class="glyphicon glyphicon-ok"></i> Setujui</a>
			<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Tolak" onclick="tolak('."'".$peserta->username."'".')"><i class="glyphicon glyphicon-remove"></i> Tolak</a>';
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->model_peserta->count_all(),
						"recordsFiltered" => $this->model_peserta->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	public function setujui($id)
	{
		$this->model_peserta->setujui($id);
		echo json_encode(array("status" => TRUE));
	}
	public function tolak($id)
	{
		$this->model_peserta->tolak($id);
		echo json_encode(array("status" => TRUE));
	}
	public function detail($id)
	{	
		$cek = $this->model_peserta->cek_peserta($id);
		if($cek=='ada')
		{
			$view='data/detailpeserta';
			$data['peserta'] = $this->model_peserta->detail($id)->result();
		}
		else
		{
			$view='data/detailperusahaan';
			$data['peserta'] = $this->model_peserta->detailperusahaan($id)->result();
		}
		$data =array('main_view' => $view,'title' =>'Detail Peserta','bread'=>'Detail Peserta');
		
		$data['peserta'] = $this->model_peserta->detail($id)->result();
		array_push($data,$data['peserta']);
		$this->load->view('index',$data);
	}
}