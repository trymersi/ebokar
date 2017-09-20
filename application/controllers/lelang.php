<?php if(!defined('BASEPATH')) exit('Direct Script Is not Allowed');

Class lelang extends CI_Controller
{
	
	public function __construct()
	{
		parent:: __construct();
		$this->load->model(array('model_lelang'));
		$this->load->helper(array('url','form'));
		if(($this->session->userdata('username') == "") && ($this->session->userdata('level') != "gapoktan") && ($this->session->userdata('level') != "admin"))
		{
			$data['main_view'] = "login";	
			$this->session->set_flashdata('message', 'Harap Login Dahulu'); $this->load->view('index',$data);
			redirect('auth');
		}
		$this->load->helper('text');
	}
	public function index()
	{
		$data =array('main_view' => 'gapoktan/index','title' =>'Dashboard Gapoktan','bread'=>'Dashboard');	
		$data['username'] = $this->session->userdata('username');
		array_push($data, $data['username']);
		$data['mod'] = "ok";
		array_push($data,$data['mod']);
		$data['mods'] = "#loginsuccess";
		array_push($data, $data['mods']);
		$this->session->set_flashdata('message', 'Login Sukses'); 
		$this->load->view('index',$data);
	}
	public function addlelang()
	{
		$data =array('main_view' => 'data/lelang','title' =>'Data lelang Karet','bread'=>'List Lelang Karet');
		$data['lelang'] = $this->model_lelang->ambil();
		array_push($data,$data['lelang']);
		$data['id'] = $this->model_lelang->autoid();
		array_push($data,$data['id']);
		$this->load->helper('url');
		$this->load->view('index',$data);
	}	
	public function ajax_list()
	{
		$list = $this->model_lelang->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $lelang) {
			$no++;
			$id = $lelang->id_lelang;
			$jmlpes= count($this->model_lelang->jumlahpeserta($id)->result());
			$row = array();
			$row[] = $lelang->id_lelang;
			$row[] = $lelang->jdl_lelang;
			$row[] = $lelang->jml_karet;
			$row[] = $lelang->tgl_buka;
			$row[] = $lelang->tgl_tutup;
			$row[] = $jmlpes;	
			//add html for action
			$row[]	=' <a class="btn btn-sm btn-success" href="'.site_url('lelang/detail/'.$lelang->id_lelang).'" title="Detail"><i class="glyphicon glyphicon-search"></i> Detail</a>';
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_lelang('."'".$lelang->id_lelang."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_lelang('."'".$lelang->id_lelang."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>'
				 ;
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->model_lelang->count_all(),
						"recordsFiltered" => $this->model_lelang->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	public function ajax_edit($id)
	{
		$data = $this->model_lelang->get_by_id($id);
		echo json_encode($data);
	}
public function ajax_add()
	{
		$tgl=date('Y-m-d');
		$data = array(
				'id_lelang' => $this->input->post('id'),
				'id_gapoktan' => $this->session->userdata('uid'),
				'jdl_lelang' => $this->input->post('jdl'),
				'jml_karet' => $this->input->post('jml'),
				'tgl_buka' => $tgl,
				'tgl_tutup' => $this->input->post('tglttp'),
				'ket' => $this->input->post('ket'),
			);
		$insert = $this->model_lelang->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
	$data = array(
				'id_gapoktan' => $this->session->userdata('uid'),
				'jdl_lelang' => $this->input->post('jdl'),
				'jml_karet' => $this->input->post('jml'),
				'tgl_tutup' => $this->input->post('tglttp'),
				'ket' => $this->input->post('ket'),
			);
		$insert =
		
		$this->model_lelang->update(array('id_lelang' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->model_lelang->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	public function detail($id)
	{
		if($this->session->userdata('username') == ""){
			redirect('auth');
		}
		else
		{
			$datalelang = $this->model_lelang->ambil_lelang($id)->result();
			foreach ($datalelang as $datel ) 
			{
				$jdl = "<a href=".base_url('index.php/lelang/addlelang').">Data Lelang </a>  <span class='tod'>/</span>  ".$datel->jdl_lelang;
			}
			$data =array('main_view' => 'data/detaillelang','title' =>'Detail Data Lelang','bread'=>$jdl,);
			$data['datalelang'] = $datalelang;
			array_push($data,$data['datalelang']);
			$data['tawar'] = $this->model_lelang->tawaranterbesar($id)->result();
			array_push($data,$data['tawar']);
			$data['jmlpes'] = $this->model_lelang->jumlahpeserta($id)->result();
			array_push($data,$data['jmlpes']);
			$data['pesertalist'] = $this->model_lelang->ambil_peserta($id)->result();
			array_push($data,$data['pesertalist']);
			$this->load->view('index',$data);
		}
	}
	public function addpemenang($id,$ids)
	{
		$pemenang = $this->model_lelang->datapemenang($id,$ids)->result();
		$idlelang = $pemenang[0]->id_lelang;
		$idpeserta = $pemenang[0]->id_peserta;
		$tawaran = $pemenang[0]->jml_tawar;
		$this->model_lelang->simpanpemenang($idlelang,$idpeserta,$tawaran);
		echo json_encode(array("status" => TRUE));
	}
	public function detailpes($id)
	{	
		$cek = $this->model_lelang->cek_peserta($id);
		if($cek=='ada')
		{
			$view='data/detailpeserta';
			$tod = $this->model_lelang->detail($id)->result();
		}
		elseif($cek)
		{
			$view='data/detailperusahaan';
			$tod = $this->model_lelang->detailperusahaan($id)->result();
		}

		$data =array('main_view' => $view,'title' =>'Detail Peserta','bread'=>'Detail Peserta');
		$data['peserta'] = $tod;
		array_push($data,$data['peserta']);
		$this->load->view('index',$data);
	}

}