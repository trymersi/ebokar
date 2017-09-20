<?php if(!defined('BASEPATH')) exit('Direct Script Is not Allowed');

Class forum extends CI_Controller
{
	public function index()
	{
		$data =array('main_view' => 'forum','title' =>'Selamat Datang Di Website Lelang Karet','bread'=>'');
		$this->load->view('index',$data);
	}
}