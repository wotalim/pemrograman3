<?php
Class Export_absensi_pdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('Pdf');
    }
    
    function index($nip){
        $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        $image="wibu.png";
        $id=$this->uri->segment(3);
        $pdf->Image('assets/img/'.$image,10,5,-900);
        // mencetak string 
        $pdf->Cell(190,7,'DAFTAR ABSENSI',0,1,'C');
        $pdf->Cell(190,8,'ID KARYAWAN : '.$id,0,1,'C');
        $pdf->SetFont('Arial','B',12);
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(22,6,'TANGGAL',1,0);
        $pdf->Cell(44,6,'DATANG',1,0);
        $pdf->Cell(28,6,'PULANG',1,0);
        $pdf->Cell(30,6,'TERLAMBAT',1,0);
        $pdf->Cell(29,6,'KEHADIRAN',1,0);
        $pdf->Cell(32,6,'KETERANGAN',1,1);
        $pdf->SetFont('Arial','',10);
        $this->db->select('*');
		$this->db->from('absensi');
		$this->db->where('nip', $nip);
        $query = $this->db->get();
        foreach ($query->result() as $row){
            $pdf->Cell(22,6,$row->tgl_absensi,1,0);
            $pdf->Cell(44,6,$row->datang,1,0);
            $pdf->Cell(28,6,$row->pulang,1,0);
            $pdf->Cell(30,6,$row->telat,1,0); 
            $pdf->Cell(29,6,$row->kehadiran,1,0);
            $pdf->Cell(32,6,$row->keterangan,1,1);
        }
        $pdf->Output('Absensi Karyawan.pdf','I');
    }
}