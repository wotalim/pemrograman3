<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lembur_tunjangan extends CI_Controller {

  public function __construct(){
  	parent::__construct();
    if ($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }

  public function index(){
    if ($this->session->userdata('role')==='1'){
      $this->load->model('lembur_tunjangan_model');
      $data['query'] = $this->lembur_tunjangan_model->tampil();
      $data['title'] = "Lembur/Tunjangan";
      $this->load->view('header', $data);
      $this->load->view('sidebar');
      $this->load->view('content/admin/lembur_tunjangan',$data, array());
      $this->load->view('footer');
    }else{
        echo "Akses Ditolak!!";
    }
  }

  public function simpan(){
    if ($this->session->userdata('role')==='1'){
      $this->load->model('lembur_tunjangan_model');
      $data = array(
        'id_jenis_tunjangan' => $this->input->post('id_jenis_tunjangan'),
        'nama_jenis_tunjangan' => $this->input->post('nama_jenis_tunjangan'),
        'besar_tunjangan' => $this->input->post('besar_tunjangan')
      );
      $proses = $this->lembur_tunjangan_model->simpan($data);
      if (!$proses){
        redirect('lembur_tunjangan');
      }else{
        echo "Data Gagal Diupdate";
        echo "<br>";
        echo "<a href='".site_url('lembur_tunjangan')."'>Tampil Data</a>";
      }
    }else{
      echo "Akses Ditolak";
    }
  }

  public function edit(){
    if ($this->session->userdata('role')==='1'){
      $this->load->model('lembur_tunjangan_model');
      $nip = $this->uri->segment(3);
	    $data['query'] = $this->lembur_tunjangan_model->edit($nip);
      $data['title'] = "Edit Data Tunjangan";
      $this->load->view('header', $data);
      $this->load->view('sidebar');
      $this->load->view('content/admin/lemburtunjangan/edit', $data, array());
      $this->load->view('footer');
    }else{
      echo "Akses Ditolak!!";
    }
  }

  public function update(){
    if ($this->session->userdata('role')==='1'){
			$this->load->model('lembur_tunjangan_model');
			$id_jenis_tunjangan = $this->input->post('id_jenis_tunjangan');
			$data = array(
				'id_jenis_tunjangan' => $this->input->post('id_jenis_tunjangan'),
				'nama_jenis_tunjangan' => $this->input->post('nama_jenis_tunjangan'),
				'besar_tunjangan' => $this->input->post('besar_tunjangan')
			);
			$proses = $this->lembur_tunjangan_model->update($id_jenis_tunjangan, $data);
			if(!$proses){
				redirect('lembur_tunjangan');
			}else{
				echo "Data Gagal Diupdate";
				echo "<br>";
				echo "<a href='".site_url('lembur_tunjangan')."'>Tampil Data</a>";
      }
		}else{
			echo "Akses Ditolak!!";
		}
  }

  public function hapus(){
    if ($this->session->userdata('role')==='1'){
      $this->load->model('lembur_tunjangan_model');
      $id_jenis_tunjangan = $this->uri->segment(3);
      $proses = $this->lembur_tunjangan_model->hapus($id_jenis_tunjangan);
      if(!$proses){
        redirect('lembur_tunjangan');
      }else{
        echo "Data Gagal Diupdate";
        echo "<br>";
        echo "<a href='".site_url('lembur_tunjangan')."'>Tampil Data</a>";
      }
    }else{
      echo "Akses Ditolak!!!";
    }
  }



}