<?php
class proposalta_model extends CI_Model {
	
	private $primary_key= 'NoProposal';
	private $table_name= 'proposalta';


	function __construct(){
		parent::__construct();
	}

	 function get_proposalta(){
	 	$this->db->select('ta.*,p.NamaDosen as Pembimbing1, ps.NamaDosen as Pembimbing2, m.NamaMahasiswa');
	 	$this->db->from('proposalta ta');
	 	$this->db->join('dosen p','ta.NIPPembimbing1=p.NIP');
	 	$this->db->join('dosen ps','ta.NIPPembimbing2=ps.NIP');
	 	$this->db->join('mahasiswa m','ta.NIM=m.NIM');
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