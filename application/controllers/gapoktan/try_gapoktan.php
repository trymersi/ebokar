<?php if(!defined('BASEPATH')) exit('Direct Script Is not Allowed');

class try_gapoktan extends CI_Controller
{

	public function __construct()
	{
		parent:: __construct();
		if($this->session->userdata('username') == "" )
		{
			$data['mod'] = "ok";
			$data['mods'] = "#login";	
			$this->session->set_flashdata('message', 'Harap Login Dahulu'); $this->load->view('index',$data);
		}
		//$this->load->helper('text');
	}
	public function index()
	{
		$data['username'] = $this->session->userdata('username');
		$this->load->view('gapoktan/index',$data);
	}
	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('auth');
	}
}