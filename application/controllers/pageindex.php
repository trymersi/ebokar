<?php if(!defined('BASEPATH')) exit('Direct Script Is not Allowed');

Class pageindex extends CI_Controller
{
	public function index()
	{
		$data =array('main_view' => 'home','title' =>'Selamat Datang Di Website Lelang Karet','bread'=>'');
		$this->load->view('index',$data);
	}
	public function tos()
	{
		$data =array('main_view' => 'tos','title' =>'Sarat dan Ketentuan Website E-Bokar','bread'=>'Sarat dan Ketentuan');
		$this->load->view('index',$data);
	}
}