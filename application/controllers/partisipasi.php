<?php if(!defined('BASEPATH')) exit('Direct Script Is not Allowed');
class partisipasi extends CI_Controller
{
	function __construct()
	{
		parent:: __construct();
		
		$this->load->model('model_peserta');
		$this->load->model('model_listlelang');
	}

	public function index()
	{
		$data =array('main_view' => 'data/partisipasi','title' =>'Data partisipasi Lelang','bread'=>'partisipasi Lelang');
		$this->load->helper('url');
		$this->load->view('index',$data);
			}

	public function partisipasi()
	{
		$list = $this->model_peserta->getpartisipasi();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $partisipasi) {
			$jmlpes =  $this->model_listlelang->jumlahpeserta($partisipasi->id_lelang)->result();
			$jmlpess = count($jmlpes);
			$no++;
			$row = array();
			$row[] = $partisipasi->id_lelang;
			$row[] = $partisipasi->jdl_lelang;
			$row[] = $partisipasi->tgl_tutup;
			$row[] = number_format( $partisipasi->jml_tawar , 0, ',' , '.' );
			$row[] = $jmlpess;
			//add html for action
			$row[] = '<a class="btn btn-sm btn-success" href="'.site_url('listlelang/lihatlelang/'.$partisipasi->id_lelang).'" title="Detail" ><i class="glyphicon glyphicon-search"></i> Detail</a>';
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->model_peserta->hitung_all(),
						"recordsFiltered" => $this->model_peserta->hitung_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}		
}