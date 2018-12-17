<?php
require '../../_database/koneksi.php';
require_once '../../assets/phpExcel/Classes/PHPExcel.php';

$du             = mysql_query("SELECT * FROM m_penilaian ORDER BY tahun ASC");
$objPHPExcel    = new PHPExcel();
$date           = date('d_M_Y');

$objPHPExcel->getProperties()->setCreator("Gama Plantation")
                            ->setLastModifiedBy("Gama Plantation")
                            ->setTitle("Master Point")
                            ->setSubject("Point")
                            ->setDescription("Master Point".$date)
                            ->setKeywords("G-Promotion _Master Point_")
                            ->setCategory("Master Point");

$row    = 1;

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$row, 'No')
            ->setCellValue('B'.$row, 'Year')
            ->setCellValue('C'.$row, 'A')
            ->setCellValue('D'.$row, 'B')
            ->setCellValue('E'.$row, 'C')
            ->setCellValue('F'.$row, 'D');


$row++;

$no     = 1;
while( $data = mysql_fetch_array($du)){
    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$row, $no )
            ->setCellValue('B'.$row, $data['tahun'] )
            ->setCellValue('C'.$row, $data['a'] )
            ->setCellValue('D'.$row, $data['b'] )
            ->setCellValue('E'.$row, $data['c'] )
            ->setCellValue('F'.$row, $data['d'] );

$no++;   
$row++;

}


$objPHPExcel->getActiveSheet()->setTitle('Master Point');
$objPHPExcel->setActiveSheetIndex(0);


header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Master_Point_'.$date.'.xlsx"');
header('Cache-Control: max-age=0');
header('Cache-Control: max-age=1');
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
header ('Cache-Control: cache, must-revalidate');
header ('Pragma: public');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); 

$objWriter->save('php://output');
exit;

?>
