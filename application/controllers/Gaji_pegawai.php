<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji_pegawai extends CI_Controller {

  public function __construct(){
    parent::__construct();
    if ($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }

  public function index(){
    if ($this->session->userdata('role')==='1'){
      $data['title'] = "Gaji Pegawai";
      $this->load->view('header', $data);
      $this->load->view('sidebar');
      $this->load->view('content/admin/gaji_pegawai');
      $this->load->view('footer');
    }else{
      echo "Akses Ditolak!!";
    }
  }


}