<?php
class login_model extends CI_Model {
	
	private $primary_key= 'NIM';
	private $table_name= 'mahasiswa';

	function __construct(){
		parent::__construct();
	}
	
	function cek_login($table,$where){		
		
		return $this->db->get_where($table,$where);
		// return $this->db->last_query();
	}

	 function get_dosen(){
    $result = $this->db->get($this->table_name);
    return $result;
  }

 	function delete($id){
		$this->db->where($this->primary_key, $id);
		$this->db->delete($this->table_name);
	}

	function count_all(){
		return $this->db->count_all($this->table_name);
	}
	
	function get_by_id($id){
		$this->db->where($this->primary_key, $id);
		return $this->db->get($this->table_name);
	}

	
	function save($akun){
		$this->db->insert($this->table_name, $akun);
		return $this->db->insert_id();
	}
	
	function updateone($id, $akun){
		$this->db->set('foto', $akun);
		$this->db->where($this->primary_key, $id);
		$this->db->update($this->table_name);
	}
	
}