<?php if(!defined('BASEPATH'))exit('Direct Script Is Not Allowed');

class model_listlelang extends CI_model
{

	public function ambil()
	{
		$this->db->from('gapoktan');
		$this->db->join('lelang','gapoktan.id_gapoktan=lelang.id_gapoktan','RIGHT');
		$this->db->order_by('lelang.tgl_buka',"DESC");
		$query = $this->db->get();
		return $query; 
	}
	function autoid()
	{
		$query ="select MAX(RIGHT(id_translelang,3)) AS idmax from translelang";
		$q=$this->db->query($query);
		if($q->num_rows > 0)
		{
			$id="TRS001";
		}
		else
		{
			foreach($q->result() as $r)
			{
				$ids = ((int)$r->idmax)+1;
				$kd = sprintf("%04s\n", $ids);
				$id  = "TRS".$kd;
			}
		}
		return $id;
	}
	public function ambil_lelang($id)
	{
		$this->db->from('gapoktan');
		$this->db->join('lelang','gapoktan.id_gapoktan=lelang.id_gapoktan','RIGHT');
		$this->db->where('lelang.id_lelang',$id);
		$this->db->order_by('lelang.tgl_buka',"DESC");
		$query = $this->db->get();
		return $query; 
	}
	public function tawar($data)
	{
		$this->db->insert('translelang',$data);
		return $this->db->insert_id();
	}
	public function tawaranterbesar($id)
	{
		$this->db->from('translelang');
		$this->db->where('id_lelang',$id);
		$this->db->order_by('jml_tawar','DESC');
		return $this->db->get();
	}
	public function jumlahpeserta($id)
	{
		$this->db->from('translelang');
		$this->db->where('id_lelang',$id);
		$this->db->order_by('jml_tawar','DESC');
		$this->db->group_by('id_peserta');
		return $this->db->get();
	}
	public function pemenang($id)
	{
		$query ="select nm_peserta from peserta where id_peserta='$id'";
		$q=$this->db->query($query);
		return $q;
	}

}