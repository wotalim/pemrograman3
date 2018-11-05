<?php
class Pegawai extends CI_Controller{
    function __construct(){
        parent::__construct();
        if ($this->session->userdata('logged_in') !== TRUE){
            redirect('login');
        }
    }

    
    function index(){
        $data['title'] = "Selamat Datang, " .$this->session->userdata('nama_depan'). " !!";
        $this->load->view('header', $data);
        $this->load->view('sidebar');
        $this->load->view('content/pegawai/beranda_pegawai');
        $this->load->view('footer');   
    }
    
}
?>