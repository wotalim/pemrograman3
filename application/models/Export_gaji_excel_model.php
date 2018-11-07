<?php    
class Export_gaji_excel_model extends CI_Model{
    function export_gaji(){
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->join('jabatan', 'jabatan.id_jabatan=karyawan.id_jabatan');
        $query = $this->db->get();
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
}