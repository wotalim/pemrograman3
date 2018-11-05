<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('login_model');
	}
	
	public function index(){
		$this->load->view('halaman_login');
	}

	function auth(){
		$email = $this->input->post('email',TRUE);
		$password = md5($this->input->post('password',TRUE));
		$validate = $this->login_model->validate($email,$password);
		if ($validate->num_rows() > 0){
			$data = $validate->row_array();
			$nama_depan = $data['nama_depan'];
			$nama_belakang = $data['nama_belakang'];
			$email = $data['email'];
			$alamat = $data['alamat_karyawan'];
			$kelamin = $data['jk'];
			$lahir = $data['tgl_lahir'];
			$telepon = $data['telp'];
			$foto = $data['foto'];
			$role = $data['role'];
			$nama_jabatan = $data['nama_jabatan'];
			$sesdata = array(
				'nama_depan' => $nama_depan,
				'nama_belakang' => $nama_belakang,
				'email' => $email,
				'alamat' => $alamat,
				'kelamin' => $kelamin,
				'lahir' => $lahir,
				'telepon' => $telepon,
				'foto' => $foto,
				'role' => $role,
				'nama_jabatan' => $nama_jabatan,
				'logged_in' => TRUE
			);
			$this->session->set_userdata($sesdata);

			if($role === '1'){
				redirect('admin');
			}else{
				redirect('pegawai');
			}
		}else{
			echo $this->session->set_flashdata('msg','Username atau Password yang Anda Masukkan Salah!');
			redirect();
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect();
	}

}
