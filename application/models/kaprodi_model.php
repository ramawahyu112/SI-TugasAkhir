<?php
class kaprodi_model extends CI_Model {
	
	private $primary_key= 'KodeProdi';
	private $primary_key2= 'NIP';
	private $table_name= 'ketuaprodi';
	private $table_foreign2= 'dosen';
	private $table_foreign= 'prodi';

	function __construct(){
		parent::__construct();
	}

	 function get_kaprodi(){
		$this->db->select('*');
	 	$this->db->from($this->table_name);
	 	$this->db->join($this->table_foreign, 'ketuaprodi.KodeProdi=prodi.KodeProdi');
	 	$this->db->join($this->table_foreign2, 'ketuaprodi.NIP=dosen.NIP');
    	$result = $this->db->get();
    return $result;
  }

 	function delete($idprodi, $iddosen){
		$this->db->where($this->primary_key, $idprodi);
		$this->db->_where($this->primary_key2, $iddosen);
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
	
	function update($idprodi, $iddosen, $akun){
		$this->db->where($this->primary_key, $idprodi);
		$this->db->_where($this->primary_key2, $iddosen);
		$this->db->update($this->table_name, $akun);
	}
	
}