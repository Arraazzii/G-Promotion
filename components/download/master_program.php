<?php
require '../../_database/koneksi.php';
require_once '../../assets/phpExcel/Classes/PHPExcel.php';

$u              = mysql_query("SELECT * FROM m_program");;
$objPHPExcel    = new PHPExcel();
$date           = date('d_M_Y');

$objPHPExcel->getProperties()->setCreator("Gama Plantation")
                            ->setLastModifiedBy("Gama Plantation")
                            ->setTitle("Master Program")
                            ->setSubject("Program")
                            ->setDescription("Master Program".$date)
                            ->setKeywords("G-Promotion _Master Program_")
                            ->setCategory("Master Program");

$row    = 1;

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$row, 'No')
            ->setCellValue('B'.$row, 'Code')
            ->setCellValue('C'.$row, 'Name')
            ->setCellValue('D'.$row, 'Program Start')
            ->setCellValue('E'.$row, 'Program End')
            ->setCellValue('F'.$row, 'Description');


$row++;

$no     = 1;
while( $du = mysql_fetch_array($u)){
    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$row, $no)
            ->setCellValue('B'.$row, $du['kode_program'])
            ->setCellValue('C'.$row, $du['nama_program'])
            ->setCellValue('D'.$row, $du['tanggal_mulai'])
            ->setCellValue('E'.$row, $du['tanggal_selesai'])
            ->setCellValue('F'.$row, $du['deskripsi']);

$no++;
$row++; 

}


$objPHPExcel->getActiveSheet()->setTitle('Master Program');
$objPHPExcel->setActiveSheetIndex(0);


// Download (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Master_Program_'.$date.'.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');
// If you're serving to IE over SSL, then the following may be needed
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); 

$objWriter->save('php://output');
exit;

?>
