<?php if(!defined('BASEPATH'))exit('Direct Script Is Not Allowed');

class model_lelang extends CI_model
{

	var $table = 'lelang';
	var $column_order = array('id_lelang','jdl_lelang','jml_karet','tgl_buka','tgl_tutup'); 
	var $column_search = array('id_lelang','jdl_lelang','jml_karet','tgl_buka','tgl_tutup');  //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('id_lelang' => 'asc'); // default order 
	function ambil()
	{
		return $this->db->get('lelang');
	}

	function autoid()
	{
		$query ="select MAX(RIGHT(id_lelang,3)) AS idmax from lelang";
		$q=$this->db->query($query);
		if($q->num_rows > 0)
		{
			$id="LEL001";
		}
		else
		{
			foreach($q->result() as $r)
			{
				$ids = ((int)$r->idmax)+1;
				$kd = sprintf("%04s\n", $ids);
				$id  = "LEL".$kd;
			}
		}
		return $id;
	}
	function idgapoktan()
	{
		return $this->session->userdata('uid');
	}

private function _get_datatables_query()
	{
		if($this->session->userdata('level') == 'admin'){
			$this->db->from($this->table);
		}
		else
		{
			$this->db->from('gapoktan');
			$this->db->where('gapoktan.id_gapoktan',$this->session->userdata('uid'));
			$this->db->join('lelang','gapoktan.id_gapoktan=lelang.id_gapoktan','RIGHT');
		}
		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id_lelang',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id_lelang', $id);
		$this->db->delete($this->table);
	}

	public function jumlahpeserta($id)
	{
		$this->db->from('translelang');
		$this->db->where('id_lelang',$id);
		$this->db->order_by('jml_tawar','DESC');
		$this->db->group_by('id_peserta');
		return $this->db->get();
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
	public function tawaranterbesar($id)
	{
		$this->db->from('translelang');
		$this->db->where('id_lelang',$id);
		$this->db->order_by('jml_tawar','DESC');
		return $this->db->get();
	}

	public function tawar($data)
	{
		$this->db->insert('translelang',$data);
		return $this->db->insert_id();
	}

	public function ambil_peserta($id)
	{
		$this->db->from('translelang');
		$this->db->join('peserta','translelang.id_peserta=peserta.id_peserta','left');
		$this->db->where('translelang.id_lelang',$id);
		$this->db->group_by('translelang.id_peserta');
		$this->db->order_by('translelang.jml_tawar','DESC');
		$query = $this->db->get();
		return $query; 
	}
	
	public function datapemenang($id,$ids)
	{
		$data = array('id_lelang' => $ids, 'id_peserta' => $id,);
		$this->db->from('translelang');
		$this->db->where($data);
		$this->db->order_by('jml_tawar','DESC');
		return $this->db->get();
	}

	public function simpanpemenang($idlelang,$idpeserta,$tawaran)
	{
		$data = array('id_pemenang' => $idpeserta, 'jml_tawar' => $tawaran,);
		$where = array('id_lelang' => $idlelang,);
		$this->db->update('lelang', $data, $where);
		return $this->db->affected_rows();
	}
	public function detail($id)
	{
		$this->db->from('peserta');
		$this->db->where('id_peserta',$id);
		return $this->db->get();
	}
	public function cek_peserta($id)
	{
		$query ="SELECT id_peserta FROM peserta WHERE id_peserta='$id'";
		$q=$this->db->query($query);
		if($q->num_rows() != 0)
		{
			$tod='ada';
		}
		else
		{
			$tod='tidak';
		}
		return $tod;
	}
	public function detailperusahaan($id)
	{
		$this->db->from('perusahaan');
		$this->db->where('id_perusahaan',$id);
		return $this->db->get();
	}

}