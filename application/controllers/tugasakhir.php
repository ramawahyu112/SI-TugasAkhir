<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tugasakhir extends CI_Controller {


	function __construct()
	{
		parent::__construct();
			$this->load->model('mahasiswa_model','',TRUE);
			$this->load->model('jurusan_model','',TRUE);
			$this->load->model('prodi_model','',TRUE);
			$this->load->model('dosen_model','',TRUE);
	}

	function index()
	{
		$this->load->view('halamanutama');
	}

	// START ACCOUNT FUNCTION
	function mahasiswa()
	{

	$data['mahasiswa'] = $this->mahasiswa_model->get_mahasiswa();
	$this->load->view('mahasiswa',$data);
	}

	function deletemahasiswa(){
    $NIM = $this->uri->segment(3);
    $this->mahasiswa_model->delete($NIM);
    redirect('tugasakhir/mahasiswa');
}


function addmahasiswa(){
	 $NIM = $this->uri->segment(3);
	$mahasiswa = array('Username' => $this->input->post('Username'),
							'Password' => $this->input->post('Password'),
							'NIM' => $this->input->post('NIM'),
							'NamaMahasiswa' => $this->input->post('NamaMahasiswa'),
							'Alamat' => $this->input->post('Alamat'),
							'NoTelp' => $this->input->post('NoTelp'),
							'KodeProdi' => $this->input->post('KodeProdi'));
	if($NIM!=0){
		$this->mahasiswa_model->update($NIM,$mahasiswa);

	}else{
	$NIM = $this->mahasiswa_model->save($mahasiswa);

	}
	
    redirect('tugasakhir/mahasiswa');
}


	// END ACCOUNT FUNCTION

// START jurusan FUNCTION
	function jurusan()
	{

	$data['jurusan'] = $this->jurusan_model->get_jurusan();
	$this->load->view('jurusan',$data);
	}

	function deletejurusan(){
    $KodeJurusan = $this->uri->segment(3);
    $this->jurusan_model->delete($KodeJurusan);
    redirect('tugasakhir/jurusan');
}

function addjurusan(){
	 $KodeJurusan = $this->uri->segment(3);
	$jurusan = array('KodeJurusan' => $this->input->post('KodeJurusan'),
		'NamaJurusan' => $this->input->post('NamaJurusan'),
		'NamaKaJurusan' => $this->input->post('NamaKaJurusan'),
		'NoTelp' => $this->input->post('NoTelp'));

	if($KodeJurusan!=0){
		$this->jurusan_model->update($KodeJurusan,$jurusan);

	}else{
	$KodeJurusan = $this->jurusan_model->save($jurusan);

	}
	
    redirect('tugasakhir/jurusan');
}


	// END jurusan FUNCTION

// START prodiFUNCTION
	function prodi()
	{

	$data['prodi'] = $this->prodi_model->get_prodi();
	$this->load->view('prodi',$data);
	}

	function deleteprodi(){
    $KodeProdi = $this->uri->segment(3);
    $this->prodi_model->delete($KodeProdi);
    redirect('tugasakhir/prodi');
}

function addprodi(){
	 $KodeProdi = $this->uri->segment(3);
	$prodi = array('KodeProdi' => $this->input->post('KodeProdi'),
		'KodeJurusan' => $this->input->post('KodeJurusan'),
	'NamaProdi' => $this->input->post('NamaProdi'),
	'NoTelp' => $this->input->post('NoTelp'));

	if($KodeProdi!=0){
		$this->prodi_model->update($KodeProdi,$prodi);

	}else{
	$KodeProdi = $this->prodi_model->save($prodi);

	}
	
    redirect('tugasakhir/prodi');
}


	// END jurusan FUNCTION



// START dosen FUNCTION
	function dosen()
	{

	$data['dosen'] = $this->dosen_model->get_dosen();
	$this->load->view('dosen',$data);
	}

	function deletedosen(){
    $NIP = $this->uri->segment(3);
    $this->dosen_model->delete($NIP);
    redirect('tugasakhir/dosen');
}

function adddosen(){
	 $NIP = $this->uri->segment(3);
	$dosen = array('NIP' => $this->input->post('NIP'),
		'NIDN' => $this->input->post('NIDN'),
		'NamaDosen' => $this->input->post('NamaDosen'),
		'Alamat' => $this->input->post('Alamat'),
		'NoTelp' => $this->input->post('NoTelp'),
		'Golongan' => $this->input->post('Golongan'),
		'Pangkat' => $this->input->post('Pangkat'),
		'PendidikanTerakhir' => $this->input->post('PendidikanTerakhir'),
		'Username' => $this->input->post('Username'),
		'Password' => $this->input->post('Password'));

	if($NIP!=0){
		$this->dosen_model->update($NIP,$dosen);

	}else{
	$NIP = $this->dosen_model->save($dosen);

	}
	
    redirect('tugasakhir/dosen');
}


	// END jurusan FUNCTION

function login()
	{
		$this->load->view('login');
	}
}