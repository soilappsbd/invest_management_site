<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_admin extends CI_Model {
	public function validate(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
	
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$query = $this->db->get('admin');
	
			if($query->num_rows() > 0)
			{
						$row = $query->row();
						$data = array(
							'id' => $row->id,
							'username' => $row->username,
							'admin_login' => true
						);		
			  $this->session->set_userdata($data);
			  return $data;		
			}
	}


	public function referralsbyid($id){
		return   $this->db->query("SELECT `member`.id,`member`.firstname, `member`.lastname FROM `member` WHERE `referid`='$id'")->result();
	}
	
	
	public function useridbyuname($username){
		$query = $this->db->query("SELECT `id` FROM `member` WHERE `username`='$username'");
		
		if($query->num_rows()){
			foreach($query->result() as $row){
				return $row->id;
			}
		}
	}
		
		
		
	public function changepassword($data){
		$this->db->where("id",1);
		$this->db->update("admin",$data);
		return $this->db->affected_rows();
	}
}//end of class

