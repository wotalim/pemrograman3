<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_jabatan_model extends CI_Model {

	public function tampil(){
		$query = $this->db->get('jabatan');
		return $query;
	}

	public function simpan($data){
		$this->db->insert('jabatan', $data);
	}

	public function edit($id_jabatan){
		$query = $this->db->get_where('jabatan', array('id_jabatan'=>$id_jabatan));
		return $query;
	}

	public function update($id_jabatan, $data){
		$this->db->where('id_jabatan', $id_jabatan);
		$query = $this->db->update('jabatan', $data);
	}

	public function hapus($id_jabatan){
		$this->db->where('id_jabatan', $id_jabatan);
		$query = $this->db->delete('jabatan');
	}


	

}
