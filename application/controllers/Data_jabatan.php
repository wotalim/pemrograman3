<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_jabatan extends CI_Controller {

  public function __construct(){
  	parent::__construct();
    if ($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }

  public function index(){
    if ($this->session->userdata('role')==='1'){ 
		$this->load->model('data_jabatan_model');
		$data['query'] = $this->data_jabatan_model->tampil();
		$data['title'] = "Data Jabatan";
		$this->load->view('header', $data);
		$this->load->view('sidebar');
		$this->load->view('content/admin/data_jabatan', $data, array());
		$this->load->view('footer');
	}else{
		echo "Akses Ditolak!!";
	}
	}
	
	public function simpan(){
		if ($this->session->userdata('role')==='1'){
			$this->load->model('data_jabatan_model');
			$data = array(
				'id_jabatan' => $this->input->post('id_jabatan'),
				'nama_jabatan' => $this->input->post('nama_jabatan'),
				'gapok' => $this->input->post('gapok') ,
				'tgl_ganti' => $this->input->post('tgl_ganti') 
			);
			$proses = $this->data_jabatan_model->simpan($data);
			if (!$proses){
				redirect('data_jabatan');
			}else{
				echo "Data Gagal Diupdate";
				echo "<br>";
				echo "<a href='".site_url('data_jabatan')."'>Tampil Data</a>";
			}
		}else{
			echo "Akses Ditolak";
		}
	}

	public function edit(){
		if ($this->session->userdata('role')==='1'){
			$this->load->model('data_jabatan_model');
			$id_jabatan = $this->uri->segment(3);
			$data['query'] = $this->data_jabatan_model->edit($id_jabatan);
			$data['title'] = "Data Jabatan";
			$this->load->view('header', $data);
			$this->load->view('sidebar');
			$this->load->view('content/admin/datajabatan/edit', $data);
			$this->load->view('footer');
		}else{
			echo "Akses Ditolak";
		}
	}

	public function update(){
		if ($this->session->userdata('role')==='1'){
			$this->load->model('data_jabatan_model');
			$id_jabatan = $this->input->post('id_jabatan');
			$data = array(
				'id_jabatan' => $this->input->post('id_jabatan'),
				'nama_jabatan' => $this->input->post('nama_jabatan'),
				'gapok' => $this->input->post('gapok') ,
				'tgl_ganti' => $this->input->post('tgl_ganti') 
			);
			$proses = $this->data_jabatan_model->update($id_jabatan, $data);
			if(!$proses){
				redirect('data_jabatan');
			}else{
				echo "Data Gagal Diupdate";
				echo "<br>";
				echo "<a href='".site_url('data_jabatan')."'>Tampil Data</a>";
			}
		}else{
			echo "Akses Ditolak!!";
		}
	}

	public function hapus(){
		$this->load->model('data_jabatan_model');
		$id_jabatan = $this->uri->segment(3);
		$proses = $this->data_jabatan_model->hapus($id_jabatan);
		if(!$proses){
			redirect('data_jabatan');
		}else{
			echo "Data Gagal Diupdate";
			echo "<br>";
			echo "<a href='".site_url('data_jabatan')."'>Tampil Data</a>";
		}
	}


}