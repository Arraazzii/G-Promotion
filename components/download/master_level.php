<?php
require '../../_database/koneksi.php';
require_once '../../assets/phpExcel/Classes/PHPExcel.php';

$u              = mysql_query("SELECT * FROM m_tingkat");;
$objPHPExcel    = new PHPExcel();
$date           = date('d_M_Y');

$objPHPExcel->getProperties()->setCreator("Gama Plantation")
                            ->setLastModifiedBy("Gama Plantation")
                            ->setTitle("Master Level")
                            ->setSubject("Level")
                            ->setDescription("Master Level".$date)
                            ->setKeywords("G-Promotion _Master Level_")
                            ->setCategory("Master Level");

$row    = 1;

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$row, 'No')
            ->setCellValue('B'.$row, 'Code')
            ->setCellValue('C'.$row, 'Name')
            ->setCellValue('D'.$row, 'Description');


$row++;

$no     = 1;
while( $du = mysql_fetch_array($u)){
    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$row, $no)
            ->setCellValue('B'.$row, $du['kode_tingkat'])
            ->setCellValue('C'.$row, $du['nama_tingkat'])
            ->setCellValue('D'.$row, $du['deskripsi']);

$no++;
$row++; 

}


$objPHPExcel->getActiveSheet()->setTitle('Master Level');
$objPHPExcel->setActiveSheetIndex(0);


// Download (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Master_Level_'.$date.'.xlsx"');
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
