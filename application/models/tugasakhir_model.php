<?php
class tugasakhir_model extends CI_Model {
	
	private $primary_key= 'NoTA';
	private $table_name= 'tugasakhir';


	function __construct(){
		parent::__construct();
	}

	 function get_tugasakhir(){
	 	$this->db->select('tr.*,p.NamaDosen as Pembimbing1, ps.NamaDosen as Pembimbing2, m.NamaMahasiswa');
	 	$this->db->from('tugasakhir tr');
	 	$this->db->join('proposalta ta', 'tr.NoProposal=ta.NoProposal');
	 	$this->db->join('dosen p','tr.NIPPembimbing1=p.NIP');
	 	$this->db->join('dosen ps','tr.NIPPembimbing2=ps.NIP');
	 	$this->db->join('mahasiswa m','tr.NIM=m.NIM');
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