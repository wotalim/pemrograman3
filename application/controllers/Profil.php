<?php
class Profil extends CI_Controller{
    function __construct(){
        parent::__construct();
        if ($this->session->userdata('logged_in') !== TRUE){
            redirect('login');
        }
    }

    function index(){
        if ($this->session->userdata('role')==='1'){
            
            $data['title'] = "Profil";
            $this->load->view('header', $data);
            $this->load->view('sidebar');
            $this->load->view('content/lihat_profil', array());
            $this->load->view('footer');
        }else{
            echo "Akses Ditolak!!";
        }
    }
}
?>