<?php

class Lihat_pegawai_model extends CI_Model {

	public function ambildata($perPage, $uri, $ringkasan) {
		if ($this->session->userdata('role')==='1'){
			$this->db->select('*');
			$this->db->from('karyawan');
			$this->db->join('jabatan', 'jabatan.id_jabatan=karyawan.id_jabatan');

			if (!empty($ringkasan)) {
				$this->db->like('nama_depan', $ringkasan);
				$this->db->or_like('nama_belakang', $ringkasan);
				$this->db->or_like('nip', $ringkasan);
			}
			$this->db->order_by('nip','asc');
			$getData = $this->db->get('', $perPage, $uri);

			if ($getData->num_rows() > 0)
				return $getData->result_array();
			else
				return null;
		}else{
			echo "Akses Ditolak!!";
		}
		
	}

	public function lihat($nip){
		if ($this->session->userdata('role')==='1'){
			$this->db->where('nip', $nip);
			$query = $this->db->get('karyawan');
			return $query;
		}else{
			echo "Akses Ditolak";
		}
	}

	public function simpan($data){
		if ($this->session->userdata('role')==='1'){
			$this->db->insert('karyawan', $data);
		}else{
			echo "Akses Ditolak!!";
		}
	}
	
	public function update($nip, $data){
		if ($this->session->userdata('role')==='1'){
			$this->db->where('nip', $nip);
			$query = $this->db->update('karyawan', $data);
		}else{
			echo "Akses Ditolak!!";
		}
	}

	public function hapus($nip){
		if ($this->session->userdata('role')==='1'){
			$this->db->where('nip', $nip);
			$query = $this->db->delete('karyawan');
		}else{
			echo "Akses Ditolak!!";
		}
		
	}

	public function edit($nip){
		if ($this->session->userdata('role')==='1'){
			$this->db->select('*');
			$this->db->from('karyawan');
			$this->db->join('jabatan', 'jabatan.id_jabatan=karyawan.id_jabatan');
			$this->db->where('nip', $nip);
			$query = $this->db->get();
			return $query;
		}else{
			echo "Akses Ditolak!!";
		}
	}
	
	public function lihat_jabatan(){
		if ($this->session->userdata('role')==='1'){
			$query_jabatan = $this->db->get('jabatan');
			return $query_jabatan;
		}else{
			echo "Akses Ditolak!!";
		}
	}
}
?>