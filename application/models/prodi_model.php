<?php
class prodi_model extends CI_Model {
	
	private $primary_key= 'KodeProdi';
	private $table_name= 'prodi';
	private $table_foreign= 'jurusan';


	function __construct(){
		parent::__construct();
	}

	 function get_prodi(){
	 	$this->db->select('*');
	 	$this->db->from($this->table_name);
	 	$this->db->join($this->table_foreign, 'prodi.KodeJurusan=jurusan.KodeJurusan');
    	$result = $this->db->get();
    return $result;
  }
 function get_prodi1(){
	 	$this->db->select('*');
	 	$this->db->from($this->table_name);
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