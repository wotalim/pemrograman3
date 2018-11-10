<?php    
class Export_absensi_excel_model extends CI_Model{

    public function export_absensi(){
    if ($this->session->userdata('role')==='1'){
        $this->db->select('*');
        $this->db->from('absensi');
        $query = $this->db->get();
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }

        }else{
            echo "Akses Ditolak";
        }
    }
}