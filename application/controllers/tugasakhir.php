<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tugasakhir extends CI_Controller {


	function __construct()
	{
		parent::__construct();
			$this->load->helper(array('form', 'url','download'));
			$this->load->library('upload');
			$this->load->model('mahasiswa_model','',TRUE);
			$this->load->model('jurusan_model','',TRUE);
			$this->load->model('dosen_model','',TRUE);
			$this->load->model('prodi_model','',TRUE);
			$this->load->model('kajur_model','',TRUE);
			$this->load->model('kaprodi_model','',TRUE);
			$this->load->model('proposalta_model','',TRUE);
			$this->load->model('tugasakhir_model','',TRUE);
			

	}

	function index()
	{
		$this->load->view('halamanutama');
	}

	// START ACCOUNT FUNCTION
	function mahasiswa()
	{

	$data['mahasiswa'] = $this->mahasiswa_model->get_mahasiswa();
	$data['prodi'] = $this->prodi_model->get_prodi1();
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
	$data['jurusan']=$this->jurusan_model->get_jurusan();
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


// START kajur FUNCTION
	function kajur()
	{
	$data['jurusan']=$this->jurusan_model->get_jurusan();
	$data['kajur'] = $this->kajur_model->get_kajur();
	$data['dosen'] = $this->dosen_model->get_dosen();
	$this->load->view('kajur',$data);
	}

	function deletekajur(){
    $KodeJurusan = $this->uri->segment(3);
    $NIP = $this->uri->segment(4);
    $this->kajur_model->delete($KodeJurusan, $NIP);
    redirect('tugasakhir/kajur');
}

function addkajur(){
	 $KodeJurusan = $this->uri->segment(3);
	  $NIP = $this->uri->segment(4);
	$kajur = array('KodeJurusan' => $this->input->post('KodeJurusan'),
		'NIP' => $this->input->post('NIP'),
		'Periode' => $this->input->post('Periode'));

	if($KodeJurusan!=0){
		$this->kajur_model->update($KodeJurusan,$NIP,$kajur);

	}else{
	$KodeJurusan = $this->kajur_model->save($kajur);

	}
	
    redirect('tugasakhir/kajur');
}


	// END kajur FUNCTION


// START kaprodi FUNCTION
	function kaprodi()
	{
	$data['prodi'] = $this->prodi_model->get_prodi();
	$data['kaprodi'] = $this->kaprodi_model->get_kaprodi();
	$data['dosen'] = $this->dosen_model->get_dosen();
	$this->load->view('kaprodi',$data);
	}

	function deletekaprodi(){
    $KodeProdi = $this->uri->segment(3);
    $NIP = $this->uri->segment(4);
    $this->kaprodi_model->delete($KodeProdi, $NIP);
    redirect('tugasakhir/kaprodi');
}

function addkaprodi(){
	 $KodeProdi = $this->uri->segment(3);
	  $NIP = $this->uri->segment(4);
	$kaprodi = array('KodeProdi' => $this->input->post('KodeProdi'),
		'NIP' => $this->input->post('NIP'),
		'Periode' => $this->input->post('Periode'));

	if($KodeProdi!=0){
		$this->kaprodi_model->update($KodeProdi,$NIP,$kaprodi);

	}else{
	$KodeProdi = $this->kaprodi_model->save($kaprodi);

	}
	
    redirect('tugasakhir/kaprodi');
}


	// END kaprodi FUNCTION


// START proposalta FUNCTION
	function proposalta()
	{
	$data['mahasiswa'] = $this->mahasiswa_model->get_mahasiswa();
	$data['proposalta'] = $this->proposalta_model->get_proposalta();
	$data['dosen'] = $this->dosen_model->get_dosen();
	$this->load->view('proposalta',$data);
	}

	function deleteproposalta(){
    $NoProposal = $this->uri->segment(3);
    $this->proposalta_model->delete($NoProposal);
    redirect('tugasakhir/proposalta');
}

function addproposalta(){
	 $NoProposal = $this->uri->segment(3);
	$proposalta = array('JudulProposal' => $this->input->post('JudulProposal'),
		'TahunProposal' => $this->input->post('TahunProposal'),
		'NIM' => $this->input->post('NIM'),
		'NIPPembimbing1' => $this->input->post('NIPPembimbing1'),
		'NIPPembimbing2' => $this->input->post('NIPPembimbing2'));

	if($NoProposal!=0){
		$this->proposalta_model->update($NoProposal,$proposalta);

	}else{
	$NoProposal = $this->proposalta_model->save($proposalta);

	}
	
    redirect('tugasakhir/proposalta');
}


	// END proposalta FUNCTION


// START tugaskhir FUNCTION
	function ta(){
	$data['tugasakhir'] = $this->tugasakhir_model->get_tugasakhir();
	$data['mahasiswa'] = $this->mahasiswa_model->get_mahasiswa();
	$data['proposalta'] = $this->proposalta_model->get_proposalta();
	$data['dosen'] = $this->dosen_model->get_dosen();			
	$this->load->view('ta',$data);
	}

	function deleteta(){
    $NoTA = $this->uri->segment(3);
    $this->tugasakhir_model->delete($NoTA);
    redirect('tugasakhir/ta');
}

function addta(){
	 $NoTA = $this->uri->segment(3);
	 $simpanfile=$this->ta_upload();
	 if($simpanfile==""){
	 	$tugasakhir = array('NoProposal' => $this->input->post('NoProposal'),
		'JudulTA' => $this->input->post('JudulTA'),
		'TahunTA' => $this->input->post('TahunTA'),
		'NIM' => $this->input->post('NIM'),
		'TglDisetujui' => $this->input->post('TglDisetujui'),
		'NIPPembimbing1' => $this->input->post('NIPPembimbing1'),
		'NIPPembimbing2' => $this->input->post('NIPPembimbing2'),
		'FolderSoftCopySource'=> $this->input->post('FolderSoftCopySource'),
		'Status' => $this->input->post('Status'));


	 }else{
	 	$tugasakhir = array('NoProposal' => $this->input->post('NoProposal'),
		'JudulTA' => $this->input->post('JudulTA'),
		'TahunTA' => $this->input->post('TahunTA'),
		'NIM' => $this->input->post('NIM'),
		'TglDisetujui' => $this->input->post('TglDisetujui'),
		'NIPPembimbing1' => $this->input->post('NIPPembimbing1'),
		'NIPPembimbing2' => $this->input->post('NIPPembimbing2'),
		'FolderSoftCopyLaporan' => $simpanfile,
		'FolderSoftCopySource'=> $this->input->post('FolderSoftCopySource'),
		'Status' => $this->input->post('Status'));

	 }

	
	if($NoTA!=0){
		$this->tugasakhir_model->update($NoTA,$tugasakhir);

	}else{
		
	 $NoTA = $this->tugasakhir_model->save($tugasakhir);

	}
	
    redirect('tugasakhir/ta');
}
function ta_upload()
	{
        $config['upload_path'] = './uploadta/'; 
		$config['overwrite'] = 'FALSE';
		$config['allowed_types'] = 'doc|docx|pdf|zip|rar';
		$config['max_size']	= '5120'; 
		$config['max_width']  = '0';
		$config['max_height']  = '0';
		// $config['file_name']  = 'rama1';
		$this->upload->initialize($config);
		// $this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('FolderSoftCopyLaporan'))
		{
			$upload_data = $this->upload->data(); 
			$file_name = $upload_data['file_name'];
			// $data['error']= $this->upload->display_errors();
			// $data['message']='Upload Fail'; 
			// $data['go']=$file_name; //pesan jika proses upload berhasil
				// $this->load->view('test',$data);
			// $this->content();
			return $file_name;
		}else{
		$upload_data = $this->upload->data(); 
		$file_name = $upload_data['file_name'];
		// $data['error']= "";
		// $data['message']='Upload Success'; //pesan jika proses upload berhasil
		// // $data['go']=$file_name; //pesan jika proses upload berhasil
		// $this->load->view('test',$data);
		// $this->content();}	
		return $file_name;
	
        }
}
	 function downloadta(){
		  $name=$this->uri->segment(3);	
		  $path="./uploadta/".$name;

	 	  if(file_exists($path)){
	 	  	$file = file_get_contents($path);	
	 	  	 force_download($name, $file);
	 	  	}else{
	 	  		echo "File not Found !!";
	 	  		 redirect('tugasakhir/ta','refresh');
	 	  	};

		
		
	}

	// END tugasakhir FUNCTION

function login()
	{
		$this->load->view('login');
	}
}