<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Export_absensi_excel extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		
		$this->load->model('export_absensi_excel_model');
	}
	
	public function index(){
		$data['absensi'] = $this->export_absensi_excel_model->view();
		$this->load->view('view', $data);
	}
	
	public function export(){



		// Load plugin PHPExcel nya
		require_once APPPATH.'third_party/PHPExcel.php';

		// Panggil class PHPExcel nya
        $nip = $this->uri->segment(3);
		$ambildata = $this->export_absensi_excel_model->export_absensi(1002);


        if(count($ambildata)>0){
            $objPHPExcel = new PHPExcel();
            // Set properties
            $objPHPExcel->getProperties()
                  ->setCreator("UCHIHA KIMOCHI") //creator
                    ->setTitle("Data Absensi Karyawan");  //file title
 
            $objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
            $objget = $objPHPExcel->getActiveSheet();  //inisiasi get object


            $style_col = array(
            'font' => array('bold' => true), // Set font nya jadi bold
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
        );

        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = array(
            'alignment' => array(
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
        );


        $objPHPExcel->getActiveSheet()->getStyle('A4')->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('B4')->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('C4')->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('D4')->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('E4')->applyFromArray($style_col);
        $objPHPExcel->getActiveSheet()->getStyle('F4')->applyFromArray($style_col);



        $objDrawing = new PHPExcel_Worksheet_Drawing();
        $objDrawing->setName('wibu');
        $objDrawing->setDescription('wibu');
        $logo = 'assets/img/wibu.png'; // Provide path to your logo file
        $objDrawing->setPath($logo);  //setOffsetY has no effect
        $objDrawing->setCoordinates('A1');
        $objDrawing->setHeight(50); // logo height
        $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());


                $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', "DAFTAR ABSENSI"); 

        $objPHPExcel->getActiveSheet()->mergeCells('A1:F1'); // Set Merge Cell pada kolom A1 sampai E1
        $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
        $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20); // Set font size 15 untuk kolom A1
        $objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

 
            $objget->setTitle('Data Karyawan'); //sheet title
             
            $objget->getStyle("A4:F4")->applyFromArray(
                array(
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => '92d050')
                    ),
                    'font' => array(
                        'color' => array('rgb' => '000000')
                    )
                )
            );

            $objPHPExcel->getActiveSheet()->getRowDimension('4')->setRowHeight(15);
 
            //table header
            $cols = array("A","B","C","D","E","F");
             
            $val = array("Tanggal ","Datang","Pulang","Terlambat","Kehadiran","Keterangan");
             
            for ($a=0;$a<6; $a++) 
            {
                $objset->setCellValue($cols[$a].'4', $val[$a]);
                 
                //Setting lebar cell
                $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(6); 
                $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25); 
                $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
                $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(13);
                $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(12);
                $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(13);
             
                $style = array(
                    'alignment' => array(
                        'horizontal' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    )
                );
                $objPHPExcel->getActiveSheet()->getStyle($cols[$a].'4')->applyFromArray($style);
            }
             
            $baris  = 5;
            foreach ($ambildata as $frow){
                 
                //pemanggilan sesuaikan dengan nama kolom tabel
                $objset->setCellValue("A".$baris, $frow->tgl_absensi); //membaca data nama
                $objset->setCellValue("B".$baris, $frow->datang); //membaca data alamat
                $objset->setCellValue("C".$baris, $frow->pulang); //membaca data kontak
                $objset->setCellValue("D".$baris, $frow->telat);
                $objset->setCellValue("E".$baris, $frow->kehadiran);
                $objset->setCellValue("F".$baris, $frow->keterangan);
                 

                $objPHPExcel->getActiveSheet()->getStyle('A'.$baris)->applyFromArray($style_row);
                $objPHPExcel->getActiveSheet()->getStyle('B'.$baris)->applyFromArray($style_row);
                $objPHPExcel->getActiveSheet()->getStyle('C'.$baris)->applyFromArray($style_row);
                $objPHPExcel->getActiveSheet()->getStyle('D'.$baris)->applyFromArray($style_row);
                $objPHPExcel->getActiveSheet()->getStyle('E'.$baris)->applyFromArray($style_row);
                $objPHPExcel->getActiveSheet()->getStyle('F'.$baris)->applyFromArray($style_row);
            


                //Set number value
                $objPHPExcel->getActiveSheet()->getStyle('C1:C'.$baris)->getNumberFormat()->setFormatCode('0');
                 
                $baris++;
            }
             
            $objPHPExcel->getActiveSheet()->setTitle('Data Absen');
		      $objPHPExcel->setActiveSheetIndex(0);

		// Proses file excel

		$write = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Absensi_karyawan.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');
		$write->save('php://output');

		exit;
	}
}
}