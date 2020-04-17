<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_common extends CI_Model {

	public function databysql($sql){
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	public function countrows($sql){
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return $query->num_rows();
		}else{
			return false;
		}
	}

	
	public function insertdata($tablename,$data){
		$query = $this->db->insert($tablename,$data);
		return $this->db->insert_id();
	}

	
	public function updatedata($tablename,$data, $column, $id){
		$this->db->where($column,$id);
		$query = $this->db->update($tablename,$data);
		return $this->db->affected_rows();
	}

	public function deletedata($tablename,$column, $id){
		$this->db->where($column,$id);
		$query = $this->db->delete($tablename);
		return $this->db->affected_rows();
	}
	
	
	

		
}//end of class

