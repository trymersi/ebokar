<?php if(!defined('BASEPATH')) exit('Direct Script Is not Allowed');

class Auth extends CI_controller
{
	
	public function index()
	{
		$data=array(
			'title'=>'Login',
			'main_view'=>'login',
			'bread' => 'Login',
			);
		$this->session->set_flashdata('message', 'Harap Login Dahulu');
		$this->load->view('index',$data);
	}

	public function cek_login()
	{
		
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->load->model('model_user');
		$hasil = $this->model_user->cek_user($username,md5($password));
		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result() as $sess) {
				$sess_data['login'] = 'Sudah Loggin';
				$sess_data['uid'] = $sess->uid;
				$sess_data['username'] = $sess->username;
				$sess_data['level'] = $sess->level;
				$this->session->set_userdata($sess_data);
			}
	}
		
		if($this->session->userdata('level')=='admin')
		{
			$data['mod'] = "ok";
			$data['mods'] = "#loginsuccess";	
			$this->session->set_flashdata('message', 'Login Sukses'); $this->load->view('index',$data);
			
		}
		elseif($this->session->userdata('level')=='gapoktan')
		{
			$data =array('main_view' => 'gapoktan/index','title' =>'Dashboard Gapoktan','bread'=>'Dashboard');
			$data['username'] = $this->session->userdata('username');
			array_push($data,$data['username']);
			$data['mod'] = "ok";
			array_push($data,$data['mod']);
			$data['mods'] = "#loginsuccess";
			array_push($data, $data['mods']);
			$this->session->set_flashdata('message', 'Login Sukses'); 
			$this->load->view('index',$data);
		}
		elseif($this->session->userdata('level')=='peserta')
		{
			$data =array('main_view' => 'peserta/index','title' =>'Dashboard Peserta','bread'=>'Dashboard');
			$data['username'] = $this->session->userdata('username');
			array_push($data,$data['username']);
			$data['mod'] = "ok";
			array_push($data,$data['mod']);
			$data['mods'] = "#loginsuccess";
			array_push($data, $data['mods']);
			$this->session->set_flashdata('message', 'Login Sukses'); 
			$this->load->view('index',$data);
		}
		else
		{
			$data['main_view'] = 'login';
			$data['username'] = $this->input->post('username');
			$data['password'] = $this->input->post('password');
			$this->session->set_flashdata('message', 'Username Atau Password Salah'); $this->load->view('index',$data);
		}
	}
}
	