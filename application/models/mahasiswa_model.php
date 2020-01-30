<?php
class mahasiswa_model extends CI_Model {
	
	private $primary_key= 'NIM';
	private $table_name= 'mahasiswa';
	private $table_foreign= 'prodi';

	function __construct(){
		parent::__construct();
	}

	 function get_mahasiswa(){
	 	$this->db->select('mahasiswa.*, prodi.NamaProdi');
	 	$this->db->from($this->table_name);
	 	$this->db->join($this->table_foreign, 'prodi.KodeProdi=mahasiswa.KodeProdi');
    	$result = $this->db->get();
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