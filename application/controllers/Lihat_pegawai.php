<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lihat_pegawai extends CI_Controller {

  public function __construct(){
    parent::__construct();
    if ($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }

  public function index(){
    if ($this->session->userdata('role')==='1'){
      if (isset($_POST['q'])){
        $data['ringkasan'] = $this->input->post('cari');
        $this->session->set_userdata('sess_ringkasan', $data['ringkasan']);
      }else{
        $data['ringkasan'] = $this->session->userdata('sess_ringkasan');
      }
      $this->load->model('lihat_pegawai_model');
      $this->db->like('nama_depan', $data['ringkasan']);
      $this->db->or_like('nama_belakang', $data['ringkasan']);
      $this->db->or_like('nip', $data['ringkasan']);
      $this->db->from('karyawan');

      $pagination['base_url'] = base_url().'index.php/lihat_pegawai/index/page/';
		  $pagination['total_rows'] = $this->db->count_all_results();
      $pagination['per_page'] = 15;
      $pagination['uri_segment'] = 3;
      $choice = $pagination['total_rows'] / $pagination['per_page'];
      $pagination['num_links'] = floor($choice);
      $pagination['first_link']       = 'First';
      $pagination['last_link']        = 'Last';
      $pagination['next_link']        = 'Next';
      $pagination['prev_link']        = 'Prev';
      $pagination['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
      $pagination['full_tag_close']   = '</ul></nav></div>';
      $pagination['num_tag_open']     = '<li class="page-item"><span class="page-link">';
      $pagination['num_tag_close']    = '</span></li>';
      $pagination['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
      $pagination['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
      $pagination['next_tag_open']    = '<li class="page-item"><span class="page-link">';
      $pagination['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
      $pagination['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
      $pagination['prev_tagl_close']  = '</span>Next</li>';
      $pagination['first_tag_open']   = '<li class="page-item"><span class="page-link">';
      $pagination['first_tagl_close'] = '</span></li>';
      $pagination['last_tag_open']    = '<li class="page-item"><span class="page-link">';
      $pagination['last_tagl_close']  = '</span></li>';
		  
      
      
      $this->pagination->initialize($pagination);
      $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
      $data['listKaryawan'] = $this->lihat_pegawai_model->ambildata($pagination['per_page'],$this->uri->segment(4,0),$data['ringkasan']);
      $data['title'] = "Lihat Pegawai";
      $this->load->vars($data); 
      $this->load->view('header', $data);
      $this->load->view('sidebar');
      $this->load->view('content/admin/lihat_pegawai', $data);
      $this->load->view('footer');

    }else{
      echo "Akses Ditolak!!";
    }
  }
  public function tambah(){
    if ($this->session->userdata('role')==='1'){
      $this->load->model('lihat_pegawai_model');
      $data['query_jabatan'] = $this->lihat_pegawai_model->lihat_jabatan();
      $data['title'] = "Tambah Pegawai";  
      $this->load->view('header', $data);
      $this->load->view('sidebar');
      $this->load->view('content/admin/lihatpegawai/tambah', $data);
      $this->load->view('footer');
    }else{
      echo "Akses Ditolak!!";
    }
  }

  public function lihat(){
    if ($this->session->userdata('role')==='1'){
      $this->load->model('lihat_pegawai_model');
      $nip = $this->uri->segment(3);
      $data['query'] = $this->lihat_pegawai_model->lihat($nip); 
      $data['title'] = "Lihat Pegawai";
      $this->load->view('header', $data);
      $this->load->view('sidebar');
      $this->load->view('content/admin/lihatpegawai/lihat', $data, array());
      $this->load->view('footer');
    }else{
      echo "Akses Ditolak!!";
    }
  }
  public function edit(){
    if ($this->session->userdata('role')==='1'){
      $this->load->model('lihat_pegawai_model');
      $nip = $this->uri->segment(3);
      $data['query_jabatan'] = $this->lihat_pegawai_model->lihat_jabatan();
      $data['query'] = $this->lihat_pegawai_model->edit($nip);
      $data['title'] = "Edit Pegawai";
      $this->load->view('header', $data);
      $this->load->view('sidebar');
      $this->load->view('content/admin/lihatpegawai/edit', $data, array());
      $this->load->view('footer');
    }else{
      echo "Akses Ditolak!!";
    }
  }

  public function simpan(){
    if ($this->session->userdata('role')==='1'){
      $this->load->model('lihat_pegawai_model');
      $data = array(
        'nip' => $this->input->post('nip'),
        'nama_depan' => $this->input->post('nama_depan'),
        'nama_belakang' => $this->input->post('nama_belakang'),
        'jk' => $this->input->post('jk'),
        'tempat_lahir' => $this->input->post('tempat_lahir'),
        'tgl_lahir' => $this->input->post('tgl_lahir'),
        'alamat_karyawan' => $this->input->post('alamat_karyawan'),
        'telp' => $this->input->post('telp'),
        'email' => $this->input->post('email'),
        'id_jabatan' => $this->input->post('id_jabatan')
      );
      $proses = $this->lihat_pegawai_model->simpan($data);
      if (!$proses){
        redirect('lihat_pegawai');
      }else{
        echo "Data Gagal Disimpan";
        echo "br";
        echo "<a href='".site_url('lihat_pegawai/tambah');
      }
    }else{
      echo "Akses Ditolak!!";
    }
  }

  public function update(){
    if ($this->session->userdata('role')==='1'){
      $nip = $this->input->post('nip');
      $this->load->model('lihat_pegawai_model');
      $data = array(
        'nip' => $this->input->post('nip'),
        'nama_depan' => $this->input->post('nama_depan'),
        'nama_belakang' => $this->input->post('nama_belakang'),
        'jk' => $this->input->post('jk'),
        'tempat_lahir' => $this->input->post('tempat_lahir'),
        'tgl_lahir' => $this->input->post('tgl_lahir'),
        'alamat_karyawan' => $this->input->post('alamat_karyawan'),
        'telp' => $this->input->post('telp'),
        'email' => $this->input->post('email'),
        'id_jabatan' => $this->input->post('id_jabatan')
      );
	    $proses = $this->lihat_pegawai_model->update($nip, $data);
	    if (!$proses) {
  		  redirect('lihat_pegawai');
	    } else {
		    echo "Data Gagal Diupdate";
		    echo "<br>";
		    echo "<a href='".base_url('index.php/crud/tampil/')."'>Tampil data</a>";
	    }
    }else{
      echo "Akses Ditolak!!";
    }
  }

  public function hapus($nip){
    if ($this->session->userdata('role')==='1'){
      $this->load->model('lihat_pegawai_model');
	    $nip = $this->uri->segment(3);
	    $proses = $this->lihat_pegawai_model->hapus($nip);
	    if (!$proses) {
		    redirect(site_url('lihat_pegawai'));
	    } else {
		    echo "Data Gagal dihapus";
		    echo "<br>";
		    echo "<a href='".base_url('index.php/crud/tampil/')."'>Tampil data</a>";
  	  }
    }else{
      echo "Akses Ditolak";
    }	  
  }
}