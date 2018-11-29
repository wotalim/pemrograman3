<?php
Class Export_pegawai_pdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('Pdf');
    }
    
    function index(){
        $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        $image="wibu.png";
        $pdf->Image('assets/img/'.$image,10,5,-900);
        // mencetak string 
        $pdf->Cell(190,7,'DAFTAR NAMA KARYAWAN',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(22,6,'NIP',1,0);
        $pdf->Cell(44,6,'NAMA KARYAWAN',1,0);
        $pdf->Cell(28,6,'JABATAN',1,0);
        $pdf->Cell(30,6,'JENIS KELAMIN',1,0);
        $pdf->Cell(29,6,'TEMPAT LAHIR',1,0);
        $pdf->Cell(32,6,'TANGGAL LAHIR',1,1);
        $pdf->SetFont('Arial','',10);
        $this->db->select('*');
		$this->db->from('karyawan');
		$this->db->join('jabatan', 'jabatan.id_jabatan=karyawan.id_jabatan');
		$karyawan = $this->db->get();
        foreach ($karyawan->result() as $row){
            $pdf->Cell(22,6,$row->nip,1,0);
            $pdf->Cell(44,6,$row->nama_depan." ".$row->nama_belakang,1,0);
            $pdf->Cell(28,6,$row->nama_jabatan,1,0);
            $pdf->Cell(30,6,$row->jk,1,0); 
            $pdf->Cell(29,6,$row->tempat_lahir,1,0);
            $pdf->Cell(32,6,$row->tgl_lahir,1,1);
        }
        $pdf->Output();
    }
}