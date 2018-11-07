<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Export_gaji_excel extends CI_Controller {

		public function __construct(){
		parent::__construct();
		
		$this->load->model('export_gaji_excel_model');
		}

		public function index(){
		$data['karyawan'] = $this->export_gaji_excel_model->view();
		$this->load->view('view', $data);
		}

	}