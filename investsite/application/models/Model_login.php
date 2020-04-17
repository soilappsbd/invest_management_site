<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_login extends CI_Model {
//Login validation Admin Panel
	public function validate(){
		$username= $this->input->post('username');
		$password = $this->input->post('password');

		$query = $this->db->query("SELECT * FROM `member` WHERE  (`email`='$username' OR `username`='$username') AND `password`='$password'");
	
			if($query->num_rows() > 0)
			{
						$row = $query->row();
						$data = array(
							'id' => $row->id,
							'flag' => $row->flag,
							'login' => true
						);		
			  $this->session->set_userdata($data);
			  return $data;		
			}
	}
	
	
		
}//end of class

