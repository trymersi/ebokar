<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Model_user extends CI_Model {

		public function cek_user($username="",$password="") {
			$query = $this->db->get_where('login_session',array('username' => $username, 'password' => $password));
			return $query;
		}

	}

?>
