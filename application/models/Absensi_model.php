<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi_model extends CI_Model {

    public function tampilPegawai(){
        if($this->session->userdata('role')==='1'){
            $queryPegawai = $this->db->get('karyawan');
            return $queryPegawai;
        }else{
            echo "Akses Ditolak!!";
        }
        
    }

    public function tampilSudahHadir(){
        if($this->session->userdata('role')==='1'){
            $this->db->select('*');
			$this->db->from('absensi');
            $this->db->join('karyawan', 'karyawan.nip=absensi.nip');
            $querySudahHadir = $this->db->get();
            return $querySudahHadir;
        }else{
            echo "Akses Ditolak!!";
        }
    }

    public function tampilPulang(){
        if($this->session->userdata('role')==='1'){
            $this->db->select('*');
			$this->db->from('absensi');
            $this->db->join('karyawan', 'karyawan.nip=absensi.nip');
            $querytampilPulang = $this->db->get();
            return $querytampilPulang;
        }else{
            echo "Akses Ditolak!!";
        }
    }

    public function absen_kehadiran($nip){
        if($this->session->userdata('role')==='1'){
            $queryAbsenkehadiran = $this->db->get_where('karyawan', array('nip'=>$nip));
            return $queryAbsenkehadiran;
        }else{
            echo "Akses Ditolak!";
        } 
    }
    
    public function absen_pulang($id_absensi){
        if($this->session->userdata('role')==='1'){
            $this->db->select('*');
			$this->db->from('absensi');
            $this->db->join('karyawan', 'karyawan.nip=absensi.nip');
            $this->db->where('id_absensi', $id_absensi);
            $queryAbsenpulang = $this->db->get();
            return $queryAbsenpulang;
        }else{
            echo "Akses Ditolak!";
        } 
    }

    public function update_absen_terakhir($nip, $data1){
        if($this->session->userdata('role')==='1'){
            $this->db->set($data1);
            $this->db->where('nip', $nip);
            $this->db->update('karyawan');
        }else{
            echo "Akses Ditolak!";
        }
    }

    public function submit_kehadiran($data2){
        if($this->session->userdata('role')==='1'){
            $this->db->insert('absensi', $data2);
        }else{
            echo "Akses Ditolak!";
        } 
    }

    public function submit_pulang($id_absensi, $data){
        if($this->session->userdata('role')==='1'){
            $this->db->set($data);
            $this->db->where('id_absensi', $id_absensi);
            $this->db->update('absensi');
        }else{
            echo "Akses Ditolak!";
        }
    }

    public function informasi_pulang($id_absensi){
        if($this->session->userdata('role')==='1'){
            $this->db->select('*');
			$this->db->from('absensi');
            $this->db->join('karyawan', 'karyawan.nip=absensi.nip');
            $this->db->where('id_absensi', $id_absensi);
            $queryInformasi = $this->db->get();
            return $queryInformasi;
        }else{
            echo "Akses Ditolak!";
        }
    }
}
?>