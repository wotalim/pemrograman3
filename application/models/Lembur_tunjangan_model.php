<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lembur_tunjangan_model extends CI_Model {

	public function tampil(){
		if($this->session->userdata('role')==="1"){
			$query = $this->db->get('jenis_tunjangan');
			return $query;
		}else{
			echo "Akses Ditolak!";
		}
		
	}

	public function simpan($data){
		if($this->session->userdata('role')==="1"){
			$this->db->insert('jenis_tunjangan', $data);
		}else{
			echo "Akses Ditolak!";
		}
	}

	public function edit($id_jenis_tunjangan){
		if($this->session->userdata('role')==="1"){
			$query = $this->db->get_where('jenis_tunjangan', array('id_jenis_tunjangan'=>$id_jenis_tunjangan));
			return $query;
		}else{
			echo "Akses Ditolak!";
		}
		
	}

	public function update($id_jenis_tunjangan, $data){
		if($this->session->userdata('role')==="1"){
			$this->db->where('id_jenis_tunjangan', $id_jenis_tunjangan);
			$query = $this->db->update('jenis_tunjangan', $data);
		}else{
			echo "Akses Ditolak!";
		}
	}

	public function hapus($id_jenis_tunjangan){
		if($this->session->userdata('role')==="1"){
			$this->db->where('id_jenis_tunjangan', $id_jenis_tunjangan);
			$query = $this->db->delete('jenis_tunjangan');
		}else{
			echo "Akses Ditolak!";
		}
	}
}
