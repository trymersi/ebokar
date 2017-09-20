<?php if(!defined('BASEPATH'))exit('Direct Script Is Not Allowed');
class model_regis extends CI_Model
{
	public function addgapoktan($data)
	{
		$this->db->insert('regisgapoktan',$data);
	}

	public function addpeserta($data)
	{
		$this->db->insert('regispeserta',$data);
	}

	public function addperusahaan($data)
	{
		$this->db->insert('regisperusahaan',$data);
	}
}