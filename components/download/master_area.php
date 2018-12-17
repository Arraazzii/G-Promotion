<?php
require '../../_database/koneksi.php';
require_once '../../assets/phpExcel/Classes/PHPExcel.php';

$u              = mysql_query("SELECT * FROM m_area JOIN alamat ON m_area.kode_alamat = alamat.kode_alamat");
$objPHPExcel    = new PHPExcel();
$date           = date('d_M_Y');

$objPHPExcel->getProperties()->setCreator("Gama Plantation")
                            ->setLastModifiedBy("Gama Plantation")
                            ->setTitle("Master Area")
                            ->setSubject("Area")
                            ->setDescription("Master Area".$date)
                            ->setKeywords("G-Promotion _Master Area_")
                            ->setCategory("Master Area");

$row    = 1;

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$row, 'No')
            ->setCellValue('B'.$row, 'Code')
            ->setCellValue('C'.$row, 'Address')
            ->setCellValue('D'.$row, 'Address Number')
            ->setCellValue('E'.$row, 'RT')
            ->setCellValue('F'.$row, 'RW')
            ->setCellValue('G'.$row, 'Kelurahan')
            ->setCellValue('H'.$row, 'Kecamatan')
            ->setCellValue('I'.$row, 'City')
            ->setCellValue('J'.$row, 'Postal Code')
            ->setCellValue('K'.$row, 'Description');


$row++;

$no     = 1;
while( $du = mysql_fetch_array($u)){
    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$row, $no)
            ->setCellValue('B'.$row, $du['kode_area'] )
            ->setCellValue('C'.$row, $du['alamat'])
            ->setCellValue('D'.$row, $du['no_rumah'])
            ->setCellValue('E'.$row, $du['rt'])
            ->setCellValue('F'.$row, $du['rw'])
            ->setCellValue('G'.$row, $du['kelurahan'])
            ->setCellValue('H'.$row, $du['kecamatan'])
            ->setCellValue('I'.$row, $du['kota'])
            ->setCellValue('J'.$row, $du['kode_pos'])
            ->setCellValue('K'.$row, $du['deskripsi']);

$no++;
$row++; 

}


$objPHPExcel->getActiveSheet()->setTitle('Master Area');
$objPHPExcel->setActiveSheetIndex(0);


// Download (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Master_Area_'.$date.'.xlsx"');
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
