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
			$this->db->where('MONTH(start_date)', (int)$bulan);
			$this->db->where('YEAR(start_date)', (int)$tahun);
			$lihatevent = $this->db->get();
			return $lihatevent;
		}else{
			echo "Akses Ditolak!";
		}
	}

	public function list_karyawan(){
		if($this->session->userdata('role')==="1"){
			$list_karyawan = $this->db->get('karyawan')->result();
		}else{
			echo "Akses Ditolak!";
		}
	}

	public function cari_absensi($nip){
		if($this->session->userdata('role')==="1"){
			$date = date(strtotime("-1 month", strtotime(date("m"))));
			$this->db->select('*');
			$this->db->from('absensi');
			$this->db->where('tgl_absensi', $date);
			$this->db->where('nip', $nip);
			$cari_absensi = $this->db->get();
		}else{
			echo "Akses Ditolak!";
		}
	}

	public function harilibur(){
		if($this->session->userdata('role')==="1"){
			$bulan = date('m');
			$this->db->select('*');
			$this->db->from('calendar');
			$this->db->where('MONTH(start_date)', (int)(date(strtotime("-2 month", strtotime($bulan)))));
			$this->db->where('MONTH(start_date)', (int)(date(strtotime("-1 month", strtotime($bulan)))));
			$libur = $this->db->get();
		}else{
			echo "Akses Ditolak";
		}
	}

	public function lihat_januari(){
		if($this->session->userdata('role')==="1"){
			$tahun = date('Y');
			$this->db->select('*');
			$this->db->from('calendar');
			$this->db->where('MONTH(start_date)', 1);
			$this->db->where('YEAR(start_date)', $tahun);
			$lihatjanuari = $this->db->get();
			return $lihatjanuari;
		}else{
			echo "Akses Ditolak!";
		}
	}

	public function lihat_februari(){
		if($this->session->userdata('role')==="1"){
			$tahun = date('Y');
			$this->db->select('*');
			$this->db->from('calendar');
			$this->db->where('MONTH(start_date)', 2);
			$this->db->where('YEAR(start_date)', $tahun);
			$lihatfebruari = $this->db->get();
			return $lihatfebruari;
		}else{
			echo "Akses Ditolak!";
		}
	}

	public function lihat_maret(){
		if($this->session->userdata('role')==="1"){
			$tahun = date('Y');
			$this->db->select('*');
			$this->db->from('calendar');
			$this->db->where('MONTH(start_date)', 3);
			$this->db->where('YEAR(start_date)', $tahun);
			$lihatmaret = $this->db->get();
			return $lihatmaret;
		}else{
			echo "Akses Ditolak!";
		}
	}
	
	public function lihat_april(){
		if($this->session->userdata('role')==="1"){
			$tahun = date('Y');
			$this->db->select('*');
			$this->db->from('calendar');
			$this->db->where('MONTH(start_date)', 4);
			$this->db->where('YEAR(start_date)', $tahun);
			$lihatapril = $this->db->get();
			return $lihatapril;
		}else{
			echo "Akses Ditolak!";
		}
	}

	public function lihat_mei(){
		if($this->session->userdata('role')==="1"){
			$tahun = date('Y');
			$this->db->select('*');
			$this->db->from('calendar');
			$this->db->where('MONTH(start_date)', 5);
			$this->db->where('YEAR(start_date)', $tahun);
			$lihatmei = $this->db->get();
			return $lihatmei;
		}else{
			echo "Akses Ditolak!";
		}
	}

	public function lihat_juni(){
		if($this->session->userdata('role')==="1"){
			$tahun = date('Y');
			$this->db->select('*');
			$this->db->from('calendar');
			$this->db->where('MONTH(start_date)', 6);
			$this->db->where('YEAR(start_date)', $tahun);
			$lihatjuni = $this->db->get();
			return $lihatjuni;
		}else{
			echo "Akses Ditolak!";
		}
	}

	public function lihat_juli(){
		if($this->session->userdata('role')==="1"){
			$tahun = date('Y');
			$this->db->select('*');
			$this->db->from('calendar');
			$this->db->where('MONTH(start_date)', 7);
			$this->db->where('YEAR(start_date)', $tahun);
			$lihatjuli = $this->db->get();
			return $lihatjuli;
		}else{
			echo "Akses Ditolak!";
		}
	}

	public function lihat_agustus(){
		if($this->session->userdata('role')==="1"){
			$tahun = date('Y');
			$this->db->select('*');
			$this->db->from('calendar');
			$this->db->where('MONTH(start_date)', 8);
			$this->db->where('YEAR(start_date)', $tahun);
			$lihatagustus = $this->db->get();
			return $lihatagustus;
		}else{
			echo "Akses Ditolak!";
		}
	}

	public function lihat_september(){
		if($this->session->userdata('role')==="1"){
			$tahun = date('Y');
			$this->db->select('*');
			$this->db->from('calendar');
			$this->db->where('MONTH(start_date)', 9);
			$this->db->where('YEAR(start_date)', $tahun);
			$lihatseptember = $this->db->get();
			return $lihatseptember;
		}else{
			echo "Akses Ditolak!";
		}
	}

	public function lihat_oktober(){
		if($this->session->userdata('role')==="1"){
			$tahun = date('Y');
			$this->db->select('*');
			$this->db->from('calendar');
			$this->db->where('MONTH(start_date)', 10);
			$this->db->where('YEAR(start_date)', $tahun);
			$lihatoktober = $this->db->get();
			return $lihatoktober;
		}else{
			echo "Akses Ditolak!";
		}
	}

	public function lihat_november(){
		if($this->session->userdata('role')==="1"){
			$tahun = date('Y');
			$this->db->select('*');
			$this->db->from('calendar');
			$this->db->where('MONTH(start_date)', 11);
			$this->db->where('YEAR(start_date)', $tahun);
			$lihatnovember = $this->db->get();
			return $lihatnovember;
		}else{
			echo "Akses Ditolak!";
		}
	}

	public function lihat_desember(){
		if($this->session->userdata('role')==="1"){
			$tahun = date('Y');
			$this->db->select('*');
			$this->db->from('calendar');
			$this->db->where('MONTH(start_date)', 12);
			$this->db->where('YEAR(start_date)', $tahun);
			$lihatdesember = $this->db->get();
			return $lihatdesember;
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

	public function edit_event(){
		if($this->session->userdata('role')==="1"){
			
		}else{
			echo "Akses Ditolak!";
		}
	}
	
	public function update_event($table, $set, $where){
		if($this->session->userdata('role')==="1"){

		}else{
			echo "Akses Ditolak!";
		}

	}

	public function delete_event($table, $where){
		if($this->session->userdata('role')==="1"){

		}else{
			echo "Akses Ditolak!";
		}

	}

}