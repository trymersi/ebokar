<?php if(!defined('BASEPATH')) exit('Direct Script Is not Allowed');

class try_admin extends CI_Controller
{
	
	public function __construct()
	{
		parent:: __construct();
		if($this->session->userdata('username') == "" )
		{
			$data['main_view'] = "login";	
			$this->session->set_flashdata('message', 'Harap Login Dahulu'); $this->load->view('index',$data);
			redirect('auth');
		}
		$this->load->helper('text');

	}
	public function index()
	{
		$data =array('main_view' => 'admin/index','title' =>'Dashboard Admin','bread'=>'Dashboard');	
		$data['username'] = $this->session->userdata('username');
		array_push($data, $data['username']);
		$this->load->view('index',$data);
	}
	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		$this->session->sess_destroy();
		redirect('');
	}
}