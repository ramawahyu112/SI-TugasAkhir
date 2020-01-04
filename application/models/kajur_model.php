<?php
class kajur_model extends CI_Model {
	
	private $primary_key= 'KodeJurusan';
	private $primary_key2= 'NIP';
	private $table_name= 'ketuajurusan';
	private $table_foreign2= 'dosen';
	private $table_foreign= 'jurusan';

	function __construct(){
		parent::__construct();
	}

	 function get_kajur(){
		$this->db->select('*');
	 	$this->db->from($this->table_name);
	 	$this->db->join($this->table_foreign, 'ketuajurusan.KodeJurusan=jurusan.KodeJurusan');
	 	$this->db->join($this->table_foreign2, 'ketuajurusan.NIP=dosen.NIP');
    	$result = $this->db->get();
    return $result;
  }

 	function delete($idjur, $iddosen){
		$this->db->where($this->primary_key, $idjur);
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
	
	function update($idjur, $iddosen, $akun){
		$this->db->where($this->primary_key, $idjur);
		$this->db->_where($this->primary_key2, $iddosen);
		$this->db->update($this->table_name, $akun);
	}
	
}