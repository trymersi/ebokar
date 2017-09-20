<?php if(!defined('BASEPATH'))exit('Direct Script Is Not Allowed');

class model_peserta extends CI_model
{

	var $table = 'peserta';
	var $column_order = array('id_peserta','nm_peserta','kabupaten','provinsi','jk','tgl'); 
	var $column_search = array('id_peserta','nm_peserta','kabupaten');
	var $order = array('id_peserta' => 'asc');

	function autoid()
	{
		$query ="SELECT uid FROM login_session WHERE level='peserta' order by uid ASC";
		$q=$this->db->query($query);
		if($q->num_rows() <= 0)
		{
			$id="PES0001";
		}
		else
		{
			foreach($q->result() as $r)
			{
				$ids = str_replace('PES','',$r->uid);
				$idss = $ids+1;
				$a = sprintf("%04s",$idss); 
				$id  = 'PES'.$a;
			}
		}
		return $id;
	}

private function _get_datatables_query()
	{
		
		$this->db->from($this->table);

		$i = 0;
	
		foreach ($this->column_search as $item)
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
		$this->db->where('peserta.id_peserta',$id);
		$this->db->join('login_session','peserta.id_peserta=login_session.uid','LEFT');
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
		$this->db->where('id_peserta', $id);
		$this->db->delete($this->table);
		$this->db->where('uid', $id);
		$this->db->delete('login_session');
	}
	public function getpartisipasi()
	{
		$this->db->from('translelang');
		$this->db->where('translelang.id_peserta',$this->session->userdata('uid'));
		$this->db->join('lelang','translelang.id_lelang=lelang.id_lelang');
		$this->db->group_by('translelang.id_lelang');
		$query= $this->db->get();
		return $query->result();

	}
	public function hitung_all()
	{
		$this->db->from('translelang');
		$this->db->where('translelang.id_peserta',$this->session->userdata('uid'));
		$this->db->join('lelang','translelang.id_lelang=lelang.id_lelang');
		$this->db->group_by('translelang.id_lelang');
		return $this->db->count_all_results();
	}
	function hitung_filtered()
	{
		$this->db->from('translelang');
		$this->db->where('translelang.id_peserta',$this->session->userdata('uid'));
		$this->db->join('lelang','translelang.id_lelang=lelang.id_lelang');
		$this->db->group_by('translelang.id_lelang');
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function regis()
	{
		$this->db->from('regispeserta');
		$query= $this->db->get();
		return $query->result();

	}
	public function hitungg_all()
	{
		$this->db->from('regispeserta');
		$query= $this->db->get();
		return $query->result();
	}
	function hitungg_filtered()
	{
		$this->db->from('regispeserta');
		$query= $this->db->get();
		return $query->result();
	}
	function setujui($id)
	{
		$this->db->from('regispeserta');
		$this->db->where('username',$id);
		$query = $this->db->get();
		$da = $query->result();
		$tgl=date('Y-m-d');
		$uid = trim($this->autoid());
		foreach($da as $dat)
		{
			$tod=array(
				'id_peserta' => $uid,
				'nm_peserta' => $dat->nm_peserta,
				'tmpt_lahir' => $dat->tmpt_lahir,
				'tgl_lahir' => $dat->tgl_lahir,
				'pekerjaan' => $dat->pekerjaan,
				'status' => $dat->status,
				'alamat' => $dat->alamat,
				'rtrw' => $dat->rtrw,
				'kelurahan' => $dat->kelurahan,
				'kecamatan' => $dat->kecamatan,
				'kabupaten' => $dat->kabupaten,
				'provinsi' => $dat->provinsi,
				'jk' => $dat->jk,
				'agama' => $dat->agama,
				'ket' => $dat->ket,
				'tgl' => $tgl,
			);
			$tid = array(
				'uid' => $uid,
				'username' => $dat->username,
				'password' => $dat->password,
				'level' => 'peserta',
				);
		}
		$this->db->insert('peserta',$tod);
		$this->db->insert('login_session',$tid);
		$this->db->where('username',$id);
		$this->db->delete('regispeserta');
	}
	public function tolak($id)
	{
		$this->db->where('username',$id);
		$this->db->delete('regispeserta');
	}
	public function detail($id)
	{
		$this->db->from('peserta');
		$this->db->where('id_peserta',$id);
		return $this->db->get();
	}
	public function cek_peserta($id)
	{
		$query ="SELECT uid FROM login_session WHERE level='peserta' order by uid ASC";
		$q=$this->db->query($query);
		if($q->num_rows() <= 0)
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