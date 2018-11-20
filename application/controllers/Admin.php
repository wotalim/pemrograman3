<?php
class Admin extends CI_Controller{
    function __construct(){
        parent::__construct();
        if ($this->session->userdata('logged_in') !== TRUE){
            redirect('login');
        }
    }
    
    function index(){
        if($this->session->userdata('role')==='1'){
            $this->load->model('admin_model');
            $data_calendar = $this->admin_model->list_calendar();
		    $calendar = array();
		    foreach ($data_calendar as $key => $val) 
		    {
			    $calendar[] = array(
							    'id' => intval($val->id), 
							    'title' => $val->title,
							    'start' => date_format( date_create($val->start_date) ,"Y-m-d"),
							    'end' => date_format( date_create($val->end_date) ,"Y-m-d"),
							    'color' => $val->color,
							    );
		    }
		    $data = array();
            $data['get_data'] = json_encode($calendar);
            $data['lihatevent'] = $this->admin_model->lihat_event();
            $list_karyawan = $this->admin_model->list_karyawan();
            if (is_array($list_karyawan) || is_object($list_karyawan)){
                foreach($list_karyawan->result() as $row){
                    $nip = $row->nip;
                    $cari_absensi = $this->admin_model->cari_absensi($nip);
                    if($cari_absensi->result() == null){
    
                    }
    
                }
            }              
            $data['title'] = "Home";
            $this->load->view('header', $data);
            $this->load->view('sidebar');
            $this->load->view('content/admin/beranda');
            $this->load->view('footer');
        }else{
            echo "Akses Ditolak!!";
        }
    }
    
    public function tambah_event(){
        if ($this->session->userdata('role')==='1'){
            $data['title'] = "Tambah Event";
            $this->load->view('header', $data);
            $this->load->view('sidebar');
            $this->load->view('content/admin/beranda/tambah_event');
            $this->load->view('footer');
        }else{
            echo "Akses Ditolak!";
        }
    }

    public function lihat_edit_kalender(){
        if ($this->session->userdata('role')==='1'){
            $this->load->model('admin_model');
            $data['lihatjanuari'] = $this->admin_model->lihat_januari();
            $data['lihatfebruari'] = $this->admin_model->lihat_februari();
            $data['lihatmaret'] = $this->admin_model->lihat_maret();
            $data['lihatapril'] = $this->admin_model->lihat_april();
            $data['lihatmei'] = $this->admin_model->lihat_mei();
            $data['lihatjuni'] = $this->admin_model->lihat_juni();
            $data['lihatjuli'] = $this->admin_model->lihat_juli();
            $data['lihatagustus'] = $this->admin_model->lihat_agustus();
            $data['lihatseptember'] = $this->admin_model->lihat_september();
            $data['lihatoktober'] = $this->admin_model->lihat_oktober();
            $data['lihatnovember'] = $this->admin_model->lihat_november();
            $data['lihatdesember'] = $this->admin_model->lihat_desember();
            $data['title'] = "Lihat Dan Edit Kalender";
            $this->load->view('header', $data);
            $this->load->view('sidebar');
            $this->load->view('content/admin/beranda/lihat_edit_kalender');
            $this->load->view('footer');
        }else{
            echo "Akses Ditolak!";
        }
    }

    public function tambah_acara(){
        if($this->session->userdata('role')==='1'){
            $this->load->model('admin_model');
            $warna = $this->input->post('color');
            if($warna == ".::Pilih Warna::."){
                $warna = "#3a87ad";
            }
            $selesai = $this->input->post('end_date');
            if($selesai == "0000-00-00"){
                $end_date = null;
            }elseif($selesai != "0000-00-00"){
                $selesai1 = $this->input->post('end_date');
                $selesai2 = strtotime("+1 day", strtotime($selesai1));
                $end_date = date("Y-m-d", $selesai2);
            }
            $data = array(
                'id' => $this->input->post('id'),
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'color' => $warna,
                'start_date' => $this->input->post('start_date'),
                'end_date' => $end_date,
                'create_at' => $this->input->post('create_at'),
                'create_by' => $this->input->post('create_by')
            );
            $proses = $this->admin_model->tambah_event($data);
            if(!$proses){
                redirect('admin/lihat_edit_kalender');
            }
        }else{
            echo "Akses Ditolak!";
        }
    }

    public function edit_event(){
        if ($this->session->userdata('role')==='1'){
            $data['title'] = "Edit Event";
            $this->load->view('header', $data);
            $this->load->view('sidebar');
            $this->load->view('content/admin/beranda/edit_event');
            $this->load->view('footer');
        }else{
            echo "Akses Ditolak!";
        }
    }

}
?>