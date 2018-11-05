<?php
class Login_model extends CI_Model{
    function validate($email,$password){
        $this->db->where('email',$email);
        $this->db->where('password',$password);
        $this->db->join('jabatan', 'jabatan.id_jabatan = karyawan.id_jabatan');
        $result = $this->db->get('karyawan',1);
        return $result;
    }
}
?>