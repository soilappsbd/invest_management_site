<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_home extends CI_Model {


	public function signup($data){
		$this->db->insert("member",$data);
		return $this->db->insert_id();
	}
	
	public function useridbyuname($username){
		$query = $this->db->query("SELECT `id` FROM `member` WHERE `username`='$username'");
		
		if($query->num_rows()){
			foreach($query->result() as $row){
				return $row->id;
			}
		}
	}
	

	public function checkreferalneed(){
		$query = $this->db->query("SELECT `referralforsignup` FROM `settings`")->result();

		foreach($query as $row){
			if($row->referralforsignup==1){
				return true;
			}else{
				return false;
			}
		}
	}
	
		
}//end of class

