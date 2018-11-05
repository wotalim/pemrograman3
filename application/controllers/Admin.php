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
            if(date('d')=="1"){
                
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
    
    public function kalender_lainnya(){
        if ($this->session->userdata('role')==='1'){
            $data['title'] = "Kalender";
            $this->load->view('header', $data);
            $this->load->view('sidebar');
            $this->load->view('content/admin/beranda/calendar_lainnya');
            $this->load->view('footer');
        }else{
            echo "Akses Ditolak!";
        }
    }

    public function tambah_acara(){
        if($this->session->userdata('role')==='1'){
            $this->load->model('admin_model');
            $data = array(
                'id' => $this->input->post('id'),
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'color' => $this->input->post('color'),
                'start_date' => $this->input->post('start_date'),
                'end_date' => $this->input->post('end_date'),
                'create_at' => $this->input->post('create_at'),
                'create_by' => $this->input->post('create_by')
            );
            $proses = $this->admin_model->tambah_event($data);
            if(!$proses){
                redirect('admin/');
            }
        }else{
            echo "Akses Ditolak!";
        }
    }

}
?>