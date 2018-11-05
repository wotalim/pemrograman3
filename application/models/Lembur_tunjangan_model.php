<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lembur_tunjangan_model extends CI_Model {

	public function tampil(){
		$query = $this->db->get('jenis_tunjangan');
		return $query;
	}

	public function simpan($data){
		$this->db->insert('jenis_tunjangan', $data);
	}

	public function edit($id_jenis_tunjangan){
		$query = $this->db->get_where('jenis_tunjangan', array('id_jenis_tunjangan'=>$id_jenis_tunjangan));
		return $query;
	}

	public function update($id_jenis_tunjangan, $data){
		$this->db->where('id_jenis_tunjangan', $id_jenis_tunjangan);
		$query = $this->db->update('jenis_tunjangan', $data);
	}

	public function hapus($id_jenis_tunjangan){
		$this->db->where('id_jenis_tunjangan', $id_jenis_tunjangan);
		$query = $this->db->delete('jenis_tunjangan');
	}


	

}
