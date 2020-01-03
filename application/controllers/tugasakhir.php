<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tugasakhir extends CI_Controller {


	function __construct()
	{
		parent::__construct();
			$this->load->model('akun_model','',TRUE);
			$this->load->model('jurusan_model','',TRUE);
			$this->load->model('mapel_model','',TRUE);
			$this->load->model('materi_model','',TRUE);
	}

	function index()
	{
		$this->load->view('halamanutama');
	}

	// START ACCOUNT FUNCTION
	function akun()
	{

	$data['akun'] = $this->akun_model->get_akun();
	$this->load->view('akun',$data);
	}

	function deleteakun(){
    $id_user = $this->uri->segment(3);
    $this->akun_model->delete($id_user);
    redirect('tugasakhir/akun');
}


function addakun(){
	 $id_user = $this->uri->segment(3);
	$akun = array('username' => $this->input->post('username'),
							'password' => $this->input->post('password'),
							'nama_user' => $this->input->post('nama_user'),
							'akses' => $this->input->post('hak_akses'),
							'status' => $this->input->post('status'),
							'KodeJurusan' => $this->input->post('KodeJurusan'));
	if($id_user!=0){
		$this->akun_model->update($id_user,$akun);

	}else{
	$id_user = $this->akun_model->save($akun);

	}
	
    redirect('tugasakhir/akun');
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


// // START jurusan FUNCTION
// 	function jurusan()
// 	{

// 	$data['jurusan'] = $this->jurusan_model->get_jurusan();
// 	$this->load->view('jurusan',$data);
// 	}

// 	function deletejurusan(){
//     $KodeJurusan = $this->uri->segment(3);
//     $this->jurusan_model->delete($KodeJurusan);
//     redirect('tugasakhir/jurusan');
// }

// function addjurusan(){
// 	 $KodeJurusan = $this->uri->segment(3);
// 	$jurusan = array('nama_jj' => $this->input->post('nama_jurusan'),
// 		'status' => $this->input->post('status_jurusan'));

// 	if($KodeJurusan!=0){
// 		$this->jurusan_model->update($KodeJurusan,$jurusan);

// 	}else{
// 	$KodeJurusan = $this->jurusan_model->save($jurusan);

// 	}
	
//     redirect('tugasakhir/jurusan');
// }


// 	// END jurusan FUNCTION



// START MAPELFUNCTION
	function mapel()
	{

	$data['mapel'] = $this->mapel_model->get_mapel();
	$this->load->view('mapel',$data);
	}

	function deletemapel(){
    $id_mapel = $this->uri->segment(3);
    $this->mapel_model->delete($id_mapel);
    redirect('tugasakhir/mapel');
}

function addmapel(){
	 $id_mapel = $this->uri->segment(3);
	$mapel = array('nama_mp' => $this->input->post('namamapel'),
		'KodeJurusan' => $this->input->post('jurusan'));

	if($id_mapel!=0){
		$this->mapel_model->update($id_mapel,$mapel);

	}else{
	$KodeJurusan = $this->mapel_model->save($mapel);

	}
	
    redirect('tugasakhir/mapel');
}


	// END jurusan FUNCTION



// START materi FUNCTION
	function materi()
	{

	$data['materi'] = $this->materi_model->get_materi();
	$this->load->view('materi',$data);
	}

	function deletemateri(){
    $id_materi = $this->uri->segment(3);
    $this->materi_model->delete($id_materi);
    redirect('tugasakhir/materi');
}

function addmateri(){
	 $id_materi = $this->uri->segment(3);
	$materi = array('id_mpd' => $this->input->post('pelajaran'),
		'judul' => $this->input->post('judul'),
		'detail' => $this->input->post('detail'),
		'url_video' => $this->input->post('urlvideo'),
		'url_teks' => $this->input->post('urlteks'));

	if($id_materi!=0){
		$this->materi_model->update($id_materi,$materi);

	}else{
	$KodeJurusan = $this->materi_model->save($materi);

	}
	
    redirect('tugasakhir/materi');
}


	// END jurusan FUNCTION

function login()
	{
		$this->load->view('login');
	}
}