<?php if(!defined('BASEPATH')) exit('Direct Script Is not Allowed');

Class listlelang extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		$this->load->model(array('model_listlelang'));
		$this->load->helper(array('url','form'));
	}
	
	public function index()
	{
		$data =array('main_view' => 'data/listlelang','title' =>'Daftar Lelang','bread'=>'List Lelang');
		$listlelang = $this->model_listlelang->ambil()->result();
		$data['listlelang'] = $listlelang;
		array_push($data,$data['listlelang']);

		$this->load->view('index',$data);
	}
	public function lihatlelang($id)
	{
		if($this->session->userdata('username') == ""){
			redirect('auth');
		}
		else
		{
			$datalelang = $this->model_listlelang->ambil_lelang($id)->result();
			foreach ($datalelang as $datel ) 
			{
				$jdl = "<a href=".base_url('index.php/listlelang').">List Lelang </a>  <span class='tod'>/</span>  ".$datel->jdl_lelang;
				if($datel->id_pemenang != NULL)
				{
					$tod = $this->model_listlelang->pemenang($datel->id_pemenang)->result();
				}
				else
				{
					$tod= 'Belum Ada Pemenang';
				}
			}
			$data =array('main_view' => 'data/showlelang','title' =>'Informasi Lelang','bread'=>$jdl,);
			$data['datalelang'] = $datalelang;
			array_push($data,$data['datalelang']);
			$data['id'] = $this->model_listlelang->autoid();
			array_push($data,$data['id']);
			$data['tawar'] = $this->model_listlelang->tawaranterbesar($id)->result();
			array_push($data,$data['tawar']);
			$data['jmlpes'] = $this->model_listlelang->jumlahpeserta($id)->result();
			array_push($data,$data['jmlpes']);
			$data['pemenang'] = $tod;
			array_push($data,$data['pemenang']);
			$this->load->view('index',$data);
		}
	}
	public function tawarlelang()
	{	
		$jml = str_replace('.','',$this->input->post('jml'));
		$data = array(
			'id_translelang' => $this->input->post('id'),
			'id_lelang' => $this->input->post('idlelang'),
			'id_peserta' => $this->input->post('idpeserta'),
			'jml_tawar' => $jml,
			);
		$this->model_listlelang->tawar($data);
		echo json_encode(array("status" => TRUE));
	}
}