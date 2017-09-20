<?php if(!defined('BASEPATH'))exit('Direct Script Is Not Allowed');

class model_gapoktan extends CI_model
{

	var $table = 'gapoktan';
	var $column_order = array('id_gapoktan','nm_gapoktan','kab_gapoktan','ket','tgl'); 
	var $column_search = array('id_gapoktan','nm_gapoktan','kab_gapoktan'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('id_gapoktan' => 'asc'); // default order 
	function ambil()
	{
		return $this->db->get('gapoktan');
	}

	function autoid()
	{
		$query ="select id_gapoktan from gapoktan order by id_gapoktan DESC";
		$q=$this->db->query($query);
		if($q->num_rows() <= 0)
		{
			$id="GAP0001";
		}
		else
		{
			foreach($q->result() as $r)
			{
				$ids = str_replace('GAP','',$r->id_gapoktan);
				$idss = $ids+1;
				$a = sprintf("%04s",$idss); 
				$id  = 'GAP'.$a;
			}
		}
		return $id;
	}

private function _get_datatables_query()
	{
		
		$this->db->from($this->table);

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
		$this->db->where('gapoktan.id_gapoktan',$id);
		$this->db->join('login_session','gapoktan.id_gapoktan=login_session.uid','RIGHT');
		$query = $this->db->get();
		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}
		public function saveuser($data)
	{
		$this->db->insert('login_session', $data);
		
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id_gapoktan', $id);
		$this->db->delete($this->table);
		$this->db->where('uid', $id);
		$this->db->delete('login_session');
	}

	public function regis()
	{
		$this->db->from('regisgapoktan');
		$query= $this->db->get();
		return $query->result();

	}
	public function hitung_all()
	{
		$this->db->from('regisgapoktan');
		$query= $this->db->get();
		return $query->result();
	}
	function hitung_filtered()
	{
		$this->db->from('regisgapoktan');
		$query= $this->db->get();
		return $query->result();
	}
	function setujui($id)
	{
		$this->db->from('regisgapoktan');
		$this->db->where('username',$id);
		$query = $this->db->get();
		$da = $query->result();
		$tgl=date('Y-m-d');
		$uid = trim($this->autoid());
		foreach($da as $dat)
		{
			$tod=array(
				'id_gapoktan' => $uid,
					'nm_gapoktan' =>  $dat->nm_gapoktan,
					'legal_aspek' =>  $dat->legal_aspek,
					'thn_berdiri' =>  $dat->thn_berdiri,
					'thn_operasi' => $dat->thn_operasi,
					'desa_gapoktan' =>  $dat->desa_gapoktan,
					'kec_gapoktan' =>  $dat->kec_gapoktan,
					'kab_gapoktan' =>  $dat->kab_gapoktan,
					'ketua_gapoktan' =>  $dat->ketua_gapoktan,
					'no_hp' =>  $dat->no_hp,
					'ket' =>  $dat->ket,
					'tgl' =>$tgl,
					);
			$tid = array(
				'uid' => $uid,
				'username' => $dat->username,
				'password' => $dat->password,
				'level' => 'gapoktan',
				);
		}
		$this->db->insert('gapoktan',$tod);
		$this->db->insert('login_session',$tid);
		$this->db->where('username',$id);
		$this->db->delete('regisgapoktan');
	}
	public function tolak($id)
	{
		$this->db->where('username',$id);
		$this->db->delete('regisgapoktan');
	}
	public function detail($id)
	{
		$this->db->from('gapoktan');
		$this->db->where('id_gapoktan',$id);
		return $this->db->get();
	}

}