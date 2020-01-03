<?php
class materi_model extends CI_Model {
	
	private $primary_key= 'id_materi';
	private $table_name= 'tb_materi';

	function __construct(){
		parent::__construct();
	}

	 function get_materi(){
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
	
	function update($id, $akun){
		$this->db->where($this->primary_key, $id);
		$this->db->update($this->table_name, $akun);
	}
	
}