<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tugasakhir extends CI_Controller {


	function __construct()
	{
		parent::__construct();
			$this->load->model('akun_model','',TRUE);
			$this->load->model('jenjang_model','',TRUE);
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
							'id_jenjang' => $this->input->post('id_jenjang'));
	if($id_user!=0){
		$this->akun_model->update($id_user,$akun);

	}else{
	$id_user = $this->akun_model->save($akun);

	}
	
    redirect('tugasakhir/akun');
}


	// END ACCOUNT FUNCTION

// START JENJANG FUNCTION
	function jenjang()
	{

	$data['jenjang'] = $this->jenjang_model->get_jenjang();
	$this->load->view('jenjang',$data);
	}

	function deletejenjang(){
    $id_jenjang = $this->uri->segment(3);
    $this->jenjang_model->delete($id_jenjang);
    redirect('tugasakhir/jenjang');
}

function addjenjang(){
	 $id_jenjang = $this->uri->segment(3);
	$jenjang = array('nama_jj' => $this->input->post('nama_jenjang'),
		'status' => $this->input->post('status_jenjang'));

	if($id_jenjang!=0){
		$this->jenjang_model->update($id_jenjang,$jenjang);

	}else{
	$id_jenjang = $this->jenjang_model->save($jenjang);

	}
	
    redirect('tugasakhir/jenjang');
}


	// END JENJANG FUNCTION


// // START JENJANG FUNCTION
// 	function jenjang()
// 	{

// 	$data['jenjang'] = $this->jenjang_model->get_jenjang();
// 	$this->load->view('jenjang',$data);
// 	}

// 	function deletejenjang(){
//     $id_jenjang = $this->uri->segment(3);
//     $this->jenjang_model->delete($id_jenjang);
//     redirect('tugasakhir/jenjang');
// }

// function addjenjang(){
// 	 $id_jenjang = $this->uri->segment(3);
// 	$jenjang = array('nama_jj' => $this->input->post('nama_jenjang'),
// 		'status' => $this->input->post('status_jenjang'));

// 	if($id_jenjang!=0){
// 		$this->jenjang_model->update($id_jenjang,$jenjang);

// 	}else{
// 	$id_jenjang = $this->jenjang_model->save($jenjang);

// 	}
	
//     redirect('tugasakhir/jenjang');
// }


// 	// END JENJANG FUNCTION



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
		'id_jenjang' => $this->input->post('jenjang'));

	if($id_mapel!=0){
		$this->mapel_model->update($id_mapel,$mapel);

	}else{
	$id_jenjang = $this->mapel_model->save($mapel);

	}
	
    redirect('tugasakhir/mapel');
}


	// END JENJANG FUNCTION



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
	$id_jenjang = $this->materi_model->save($materi);

	}
	
    redirect('tugasakhir/materi');
}


	// END JENJANG FUNCTION

function login()
	{
		$this->load->view('login');
	}
}