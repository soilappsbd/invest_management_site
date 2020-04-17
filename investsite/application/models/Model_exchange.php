<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_exchange extends CI_Model {

	public function exchangestepone($data){
		$this->db->insert("transaction",$data);
		return $this->db->insert_id();
	}
	
	public function sendcurrencynamybyid($id){
		$query = $this->db->query("SELECT `currencyname` FROM `currency` WHERE `id`=$id")->result();
		foreach($query as $row){
			return $row->currencyname;
		}
	}
	
	
	public function accountinfobyid($id){
		$query = $this->db->query("SELECT `accountinfo` FROM `currency` WHERE `id`=$id")->result();
		foreach($query as $row){
			return $row->accountinfo;
		}
	}
	
	public function typename($type){
		if($type==0){
			return "BDT";
		}elseif($type==1){
			return "Dollar";
		}
	}
	
	public function updateexchangesteptwo($data, $id){
		$this->db->where("id",$id);
		$this->db->update("transaction",$data);
		return $this->db->affected_rows();
	}
	
	
	
	public function exchangeconfirm($data, $id){
		$this->db->where("id",$id);
		$this->db->update("transaction",$data);
		return $this->db->affected_rows();
	}
	
	public function currencytype($id){
		$query =  $this->db->query("SELECT `type` FROM `currency` WHERE `id`=$id");
		
		if($query->num_rows()){
			foreach($query->result() as $row){
				return $row->type;
			}
		}else{
			return false;
		}

	}
		
}//end of class

