<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model 
{
	public function list_calendar(){
        if ($this->session->userdata('role')==='1'){
            $data_calendar = $this->db->get('calendar')->result();
            return $data_calendar;
        }else{
            echo "Akses Ditolak!";
        }
        
	}	

	public function lihat_event(){
		if ($this->session->userdata('role')==="1"){
			$bulan = date('m');
			$tahun = date('Y');
			$this->db->select('*');
			$this->db->from('calendar');
			$this->db->where('MONTH(start_date)', $bulan);
			$this->db->where('YEAR(start_date)', $tahun);
			$lihatevent = $this->db->get();
			return $lihatevent;
		}else{
			echo "Akses Ditolak!";
		}
	}

	public function tambah_event($data){
		if ($this->session->userdata('role')==="1"){
			$this->db->insert('calendar', $data);
		}else{
			echo "Akses Ditolak!";
		}
	}

	public function update_event($table, $set, $where)
	{
		$this->db->where($where);
		$this->db->update($table, $set);
		return $this->db->affected_rows();
	}

	public function delete_event($table, $where)
	{
		$this->db->where($where);
		$this->db->delete($table);
		return $this->db->affected_rows();
	}

}