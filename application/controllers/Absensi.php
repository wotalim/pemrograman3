<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {

  public function __construct(){
    parent::__construct();
    if ($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }

  public function index(){
    if ($this->session->userdata('role')==='1'){
      $this->load->model('absensi_model');
      $data['querySudahHadir'] = $this->absensi_model->tampilSudahHadir();
      $data['title'] = "Absensi~Sudah Absen";
      $this->load->view('header', $data);
      $this->load->view('sidebar');
      $this->load->view('content/admin/absensi/sudah_hadir');
      $this->load->view('footer');
    }else{
        echo "Akses Ditolak!!";
    }
  }
  public function belum_hadir(){
    if ($this->session->userdata('role')==='1'){
      $this->load->model('absensi_model');
      $data['queryPegawai'] = $this->absensi_model->tampilPegawai();
      $data['title'] = "Absensi~Belum Hadir";
      $this->load->view('header', $data);
      $this->load->view('sidebar');
      $this->load->view('content/admin/absensi/belum_hadir');
      $this->load->view('footer');
    }else{
        echo "Akses Ditolak!!";
    }
  }

  public function pulang(){
    if ($this->session->userdata('role')==='1'){
      $this->load->model('absensi_model');
      $data['querytampilPulang'] = $this->absensi_model->tampilPulang();
      $data['title'] = "Absensi~Pulang";
      $this->load->view('header', $data);
      $this->load->view('sidebar');
      $this->load->view('content/admin/absensi/pulang');
      $this->load->view('footer');
    }else{
        echo "Akses Ditolak!!";
    }
  }

  public function form_absen_kehadiran(){
    if ($this->session->userdata('role')==='1'){
      $nip = $this->uri->segment(3);
      $this->load->model("absensi_model");
      $data['queryAbsenkehadiran'] = $this->absensi_model->absen_kehadiran($nip);
      $data['title'] ="Form Absen Kehadiran";
      $this->load->view('header', $data);
      $this->load->view('sidebar');
      $this->load->view('content/admin/absensi/form_absen_kehadiran', $data, array());
      $this->load->view('footer');
    }else{
        echo "Akses Ditolak!!";
    }
  }

  public function form_absen_pulang(){
    if ($this->session->userdata('role')==='1'){
      $id_absensi = $this->uri->segment(3);
      $this->load->model("absensi_model");
      $data['queryAbsenpulang'] = $this->absensi_model->absen_pulang($id_absensi);
      $data['title'] ="Form Absen Pulang";
      $this->load->view('header', $data);
      $this->load->view('sidebar');
      $this->load->view('content/admin/absensi/form_absen_pulang', $data, array());
      $this->load->view('footer');
    }else{
        echo "Akses Ditolak!!";
    }
  }

  public function form_informasi_pulang(){
    if ($this->session->userdata('role')==='1'){
      $id_absensi = $this->uri->segment(3);
      $this->load->model('absensi_model');
      $data['queryInformasi'] = $this->absensi_model->informasi_pulang($id_absensi);
      $data['title'] = "Form Informasi Pulang";
      $this->load->view('header', $data);
      $this->load->view('sidebar');
      $this->load->view('content/admin/absensi/form_informasi_pulang');
      $this->load->view('footer');
    }else{
        echo "Akses Ditolak!!";
    }
  }
  
  public function submit_kehadiran(){
    if ($this->session->userdata('role')==='1'){
      $datang = new DateTime($this->input->post('datang'));
      $patokan_jam 	= new DateTime("08:00:00");
      $kehadiran = $this->input->post('kehadiran');
      if ($datang > $patokan_jam && $kehadiran=="Hadir"){
        $delta = $datang->diff($patokan_jam);
        $telat = (($delta->h)*60) + ($delta->i);
      }elseif ($datang <= $patokan_jam || $kehadiran=="Izin"){
        $telat = 0;
      }
      $nip = $this->input->post('nip');
      $this->load->model('absensi_model');
      $data1 = array(
        'nip' => $this->input->post('nip'),
        'absen_terakhir' => $this->input->post('absen_terakhir')
      );
      $data2 = array(
        'id_absensi' => $this->input->post('id_absensi'),
        'nip' => $this->input->post('nip'),
        'kehadiran' => $this->input->post('kehadiran'),
        'datang' => $this->input->post('datang'),
        'tgl_absensi' => $this->input->post('tgl_absensi'),
        'telat' => $telat,
        'keterangan' => $this->input->post('keterangan')
      );
      $proses1 = $this->absensi_model->update_absen_terakhir($nip,$data1);//update tanggal absen_terakhir
      $proses2 = $this->absensi_model->submit_kehadiran($data2);//simpan
      if (!$proses1 && !$proses2){
        redirect('absensi/belum_hadir');
      }else{
        echo "Data Gagal Disimpan";
        echo "<br>";
        echo "<a href='".site_url('absensi/belum_hadir');
      }
    }else{
        echo "Akses Ditolak!!";
    }
  }

  public function submit_pulang(){
    if ($this->session->userdata('role')==='1'){
      $id_absensi= $this->input->post('id_absensi');
      $this->load->model('absensi_model');
      $data = array(
        'id_absensi' => $this->input->post('id_absensi'),
        'pulang' => $this->input->post('pulang')
      );
      $proses = $this->absensi_model->submit_pulang($id_absensi, $data);
      if (!$proses){
        redirect('absensi/pulang');
      }else{
        echo "Data Gagal Disimpan";
        echo "<br>";
        echo "<a href='".site_url('absensi/pulang');
      }
    }else{
      echo "Akses Ditolak !!";
    }
  }
}