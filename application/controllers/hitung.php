<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class hitung extends CI_Controller {
	private $limit = 10;
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->library(array('table','form_validation'));
		$this->load->model('matakuliah_model','',TRUE);
		$this->load->model('siswa_model','',TRUE);
	}
	function index(){
		$this->load->view('menu_table');
	}
	function daftarmatakuliah($offset = 0, $order_column = 'kodemk', $order_type = 'asc',$keyword='')
	{

		if (empty($offset)) $offset = 0;
		//disinirubah
		if (empty($order_column)) $order_column = 'kodemk';
		if (empty($order_type)) $order_type = 'asc';
		//TODO: check for valid column
		$data['action'] = site_url('hitung/daftarmatakuliah');
	 	$keyword = $this->input->post('keyword');
	 	
		// load data
		//disini rubah
		$matakuliahs = $this->matakuliah_model->get_paged_list($this->limit, $offset, $order_column, $order_type, $keyword )->result();
	 
		// generate pagination
		$this->load->library('pagination');
		//disini rubah
		$config['base_url'] = site_url('hitung/daftarmatakuliah/');
		$config['total_rows'] = $this->matakuliah_model->count_all();
		$config['per_page'] = $this->limit;
		$config['uri_segment'] = 3;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
	 
		// generate table data
		$this->load->library('table');
		$this->table->set_empty("&nbsp;");
		$new_order = ($order_type == 'asc' ? 'desc' : 'asc');
		$this->table->set_heading(
			anchor('matakuliah/index/'.$offset.'/kodemk/'.$new_order.'/'.$keyword, 'Kode Mata Kuliah'),
			anchor('matakuliah/index/'.$offset.'/namamk/'.$new_order.'/'.$keyword, 'Nama mata kuliah'),
			anchor('matakuliah/index/'.$offset.'/jmlsks/'.$new_order.'/'.$keyword, 'Jumlah sks'),
			anchor('matakuliah/index/'.$offset.'/semester/'.$new_order.'/'.$keyword, 'Semester'),
			'Actions'
		);
		$i = 0 + $offset;
		foreach ($matakuliahs as $matakuliah){
			$this->table->add_row( 
								  $matakuliah->kodemk,
								  $matakuliah->namamk,
								  $matakuliah->jmlsks,
								  $matakuliah->semester,
								 
				anchor('hitung/view/'.$matakuliah->kodemk,'view',array('class'=>'view')).' '.
				anchor('hitung/update/'.$matakuliah->kodemk,'update',array('class'=>'update')).' '.
				anchor('hitung/delete/'.$matakuliah->kodemk,'delete',array('class'=>'delete','onclick'=>"return confirm('Apakah anda yakin ingin menghapus data matakuliah?')"))
			);
		}
		$data['table'] = $this->table->generate();
		
		if ($this->uri->segment(3)=='delete_success')
			$data['message'] = 'Data berhasil dihapus';
		else if ($this->uri->segment(3)=='add_success')
			$data['message'] = 'Data berhasil ditambah';
		else
			$data['message'] = '';
		// load view
		$this->load->view('matakuliahList', $data);
	}

	function daftarsiswa($offset = 0, $order_column = 'id', $order_type = 'asc',$keyword='')
	{

		if (empty($offset)) $offset = 0;
		if (empty($order_column)) $order_column = 'id';
		if (empty($order_type)) $order_type = 'asc';
		//TODO: check for valid column
	 
	 $keyword = $this->input->post('keyword');
		// load data
		$siswas = $this->siswa_model->get_paged_list($this->limit, $offset, $order_column, $order_type)->result();
	 
		// generate pagination
		$this->load->library('pagination');
		$config['base_url'] = site_url('hitung/daftarsiswa/');
		$config['total_rows'] = $this->siswa_model->count_all();
		$config['per_page'] = $this->limit;
		$config['uri_segment'] = 3;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
	 
		// generate table data
		$this->load->library('table');
		$this->table->set_empty("&nbsp;");
		$new_order = ($order_type == 'asc' ? 'desc' : 'asc');
		$this->table->set_heading(
			'No',
			anchor('siswa/index/'.$offset.'/nama/'.$new_order, 'Nama'),
			anchor('siswa/index/'.$offset.'/alamat/'.$new_order, 'Alamat'),
			anchor('siswa/index/'.$offset.'/jenis_kelamin/'.$new_order, 'Jenis Kelamin'),
			anchor('siswa/index/'.$offset.'/tanggal_lahir/'.$new_order, 'Tanggal Lahir (dd-mm-yyyy)'),
			'Actions'
		);
		$i = 0 + $offset;
		foreach ($siswas as $siswa){
			$this->table->add_row(++$i, 
								  $siswa->nama,
								  $siswa->alamat, 
								  strtoupper($siswa->jenis_kelamin)=='M'? 'Laki-Laki':'Perempuan', 
								  date('d-m-Y',strtotime($siswa->tanggal_lahir)),
				anchor('hitung/viewSiswa/'.$siswa->id,'view',array('class'=>'view')).' '.
				anchor('hitung/updateSiswa/'.$siswa->id,'update',array('class'=>'update')).' '.
				anchor('hitung/deleteSiswa/'.$siswa->id,'delete',array('class'=>'delete','onclick'=>"return confirm('Apakah anda yakin ingin menghapus datasiswa?')"))
			);
		}
		$data['table'] = $this->table->generate();
		
		if ($this->uri->segment(3)=='delete_success')
			$data['message'] = 'Data berhasil dihapus';
		else if ($this->uri->segment(3)=='add_success')
			$data['message'] = 'Data berhasil ditambah';
		else
			$data['message'] = '';
		// load view
		$data['action'] = site_url('hitung/daftarsiswa');
		$this->load->view('siswaList', $data);
	}


		function add(){
		// set common properties
		$data['title'] = 'Tambah Matakuliah matakuliah';
		$data['action'] = site_url('hitung/add');
		$data['link_back'] = anchor('hitung/daftarmatakuliah/','Back to list of matakuliahs',array('class'=>'back'));

		$this->_set_rules();

		// run validation
		if ($this->form_validation->run() === FALSE){
			$data['message'] = '';
					// set common properties
			$data['title'] = 'Add new matakuliah';
			$data['message'] = '';
			$data['matakuliah']['kodemk']='';
			$data['matakuliah']['namamk']='';
			$data['matakuliah']['jmlsks']='';
			$data['matakuliah']['semester']='';
			$data['link_back'] = anchor('hitung/daftarmatakuliah/','Lihat Daftar Matakuliah',array('class'=>'back'));
			$this->load->view('matakuliahEdit', $data);
		
		}else{
			// save data
			//$siswa = array('nama' => $this->input->post('nama'),
			//				'alamat' => $this->input->post('alamat'),
			//				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			//				'tanggal_lahir' => date('d-m-Y', strtotime($this->input->post('tanggal_lahir'))));

			$matakuliah = array('kodemk' => $this->input->post('kodemk'),
							'namamk' => $this->input->post('namamk'),
							'jmlsks' => $this->input->post('jmlsks'),
							'semester' => $this->input->post('semester'));
			$kodemk = $this->matakuliah_model->save($matakuliah);

			// set form input nama="id"
			$this->validation->kodemk = $kodemk;

			redirect('hitung/daftarmatakuliah/add_success');
			
		}
		
	}

	function view($kodemk){
		// set common properties
		$data['title'] = 'Detail Data Matakuliah';
		$data['link_back'] = anchor('hitung/daftarmatakuliah','Daftar matakuliah',array('class'=>'back'));

		// get siswa details
		$data['matakuliah'] = $this->matakuliah_model->get_by_id($kodemk)->row();

		// load view
		$this->load->view('matakuliahView', $data);
	}



	function update($kodemk){
		// set common properties
		$data['title'] = 'Update matakuliah';
		$this->load->library('form_validation');
		// set validation properties
		$this->_set_rules();
		$data['action'] = ('hitung/update/'.$kodemk);

		// run validation
		if ($this->form_validation->run() === FALSE){
		
			$data['message'] = '';
			$data['matakuliah'] = (array)$this->matakuliah_model->get_by_id($kodemk)->row();
			
			$_POST['jmlsks'] = strtoupper($data['matakuliah']['jmlsks']);
			

			// set common properties
			$data['title'] = 'Update matakuliah';
			$data['message'] = '';

		
		}else{
			// save data
			$kodemk = $this->input->post('kodemk');
			$matakuliah = array('kodemk' => $this->input->post('kodemk'),
							'namamk' => $this->input->post('namamk'),
							'jmlsks' => $this->input->post('jmlsks'),
							'semester' => $this->input->post('semester'));
							
			$this->matakuliah_model->update($kodemk,$matakuliah);
			$data['matakuliah'] = (array)$this->matakuliah_model->get_by_id($kodemk)->row();
			// set user message
			$data['message'] = 'update matakuliah succes';
			redirect('hitung/daftarmatakuliah/add_success');
		}
		$data['link_back'] = anchor('hitung/daftarmatakuliah/','Daftar Matakuliah',array('class'=>'back'));
		// load view
		$this->load->view('matakuliahEdit', $data);

	}

	function delete($kodemk){
		// delete siswa
		$this->matakuliah_model->delete($kodemk);
		// redirect to siswa list page
		redirect('matakuliah/index/delete_success','refresh');
	}

	// validation rules
	function _set_rules(){
			
		//$this->form_validation->set_rules('kodemk', 'Kode Mata Kuliah', 'required|trim');
		$this->form_validation->set_rules('namamk', 'Nama Mata Kuliah', 'required');
		$this->form_validation->set_rules('jmlsks', 'Jumlah sks', 'required');
		$this->form_validation->set_rules('semester', 'Semester', 'required');

	}


	function addSiswa(){
		// set common properties
		$data['title'] = 'Tambah Siswa siswa';
		$data['action'] = site_url('hitung/addSiswa');
		$data['link_back'] = anchor('hitung/daftarsiswa/','Back to list of siswas',array('class'=>'back'));

		$this->_set_rulesSiswa();

		// run validation
		if ($this->form_validation->run() === FALSE){
			$data['message'] = '';
					// set common properties
			$data['title'] = 'Add new siswa';
			$data['message'] = '';
			$data['siswa']['id']='';
			$data['siswa']['nama']='';
			$data['siswa']['alamat']='';
			$data['siswa']['jenis_kelamin']='';
			$data['siswa']['tanggal_lahir']='';
			$data['link_back'] = anchor('hitung/daftarsiswa/','Lihat Daftar Siswa',array('class'=>'back'));
			$this->load->view('siswaEdit', $data);
		
		}else{
			// save data
			//$siswa = array('nama' => $this->input->post('nama'),
			//				'alamat' => $this->input->post('alamat'),
			//				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			//				'tanggal_lahir' => date('d-m-Y', strtotime($this->input->post('tanggal_lahir'))));

			$siswa = array('nama' => $this->input->post('nama'),
							'alamat' => $this->input->post('alamat'),
							'jenis_kelamin' => $this->input->post('jenis_kelamin'),
							'tanggal_lahir' => $this->input->post('tanggal_lahir'));
			$id = $this->siswa_model->save($siswa);

			// set form input nama="id"
			$this->validation->id = $id;

			redirect('hitung/daftarsiswa/add_success');
			
		}
		
	}

	function viewSiswa($id){
		// set common properties
		$data['title'] = 'Detail Data Siswa';
		$data['link_back'] = anchor('hitung/daftarsiswa/','Daftar siswa',array('class'=>'back'));

		// get siswa details
		$data['siswa'] = $this->siswa_model->get_by_id($id)->row();

		// load view
		$this->load->view('siswaView', $data);
	}



	function updateSiswa($id){
		// set common properties
		$data['title'] = 'Update siswa';
		$this->load->library('form_validation');
		// set validation properties
		$this->_set_rulesSiswa();
		$data['action'] = ('hitung/updateSiswa/'.$id);

		// run validation
		if ($this->form_validation->run() === FALSE){
		
			$data['message'] = '';
			$data['siswa'] = (array)$this->siswa_model->get_by_id($id)->row();
			
			$_POST['jenis_kelamin'] = strtoupper($data['siswa']['jenis_kelamin']);
			$data['siswa']['tanggal_lahir'] = date('Y-m-d',strtotime($data['siswa']['tanggal_lahir']));

			// set common properties
			$data['title'] = 'Update siswa';
			$data['message'] = '';

		
		}else{
			// save data
			$id = $this->input->post('id');
			$siswa = array('nama' => $this->input->post('nama'),
							'alamat' => $this->input->post('alamat'),
							'jenis_kelamin' => $this->input->post('jenis_kelamin'),
							'tanggal_lahir' => $this->input->post('tanggal_lahir'));
							
			$this->siswa_model->update($id,$siswa);
			$data['siswa'] = (array)$this->siswa_model->get_by_id($id)->row();
			// set user message
			$data['message'] = 'update siswa success';
		}
		$data['link_back'] = anchor('hitung/daftarsiswa/','Daftar siswa',array('class'=>'back'));
		// load view
		$this->load->view('siswaEdit', $data);
	}

	function deleteSiswa($id){
		// delete siswa
		$this->siswa_model->delete($id);
		// redirect to siswa list page
		redirect('hitung/daftarsiswa/delete_success','refresh');
	}

	// validation rules
	function _set_rulesSiswa(){
			
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('jenis_kelamin', 'Password', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|callback_valid_date');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');

	}


	
}
/* End of file Blog.php */
/* Location: ./application/controllers/blog.php */

