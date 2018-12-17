<?php
require '../../_database/koneksi.php';
require_once '../../assets/phpExcel/Classes/PHPExcel.php';

$u              = mysql_query("SELECT * FROM m_perusahaan JOIN alamat ON m_perusahaan.kode_alamat = alamat.kode_alamat");;
$objPHPExcel    = new PHPExcel();
$date           = date('d_M_Y');

$objPHPExcel->getProperties()->setCreator("Gama Plantation")
                            ->setLastModifiedBy("Gama Plantation")
                            ->setTitle("Master Company")
                            ->setSubject("Company")
                            ->setDescription("Master Company".$date)
                            ->setKeywords("G-Promotion _Master Company_")
                            ->setCategory("Master Company");

$row    = 1;

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$row, 'No')
            ->setCellValue('B'.$row, 'Code')
            ->setCellValue('C'.$row, 'Name')
            ->setCellValue('D'.$row, 'Phone Number')
            ->setCellValue('E'.$row, 'Address')
            ->setCellValue('F'.$row, 'Address Number')
            ->setCellValue('G'.$row, 'RT')
            ->setCellValue('H'.$row, 'RW')
            ->setCellValue('I'.$row, 'Kelurahan')
            ->setCellValue('J'.$row, 'Kecamatan')
            ->setCellValue('K'.$row, 'City')
            ->setCellValue('L'.$row, 'Postal Code')
            ->setCellValue('M'.$row, 'Description');


$row++;

$no     = 1;
while( $du = mysql_fetch_array($u)){
    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$row, $no)
            ->setCellValue('B'.$row, $du['kode_perusahaan'])
            ->setCellValue('C'.$row, $du['nama_perusahaan'])
            ->setCellValue('D'.$row, $du['no_telepon'])
            ->setCellValue('E'.$row, $du['alamat'])
            ->setCellValue('F'.$row, $du['no_rumah'])
            ->setCellValue('G'.$row, $du['rt'])
            ->setCellValue('H'.$row, $du['rw'])
            ->setCellValue('I'.$row, $du['kelurahan'])
            ->setCellValue('J'.$row, $du['kecamatan'])
            ->setCellValue('K'.$row, $du['kota'])
            ->setCellValue('L'.$row, $du['kode_pos'])
            ->setCellValue('M'.$row, $du['deskripsi']);

$no++;
$row++; 

}


$objPHPExcel->getActiveSheet()->setTitle('Master Company');
$objPHPExcel->setActiveSheetIndex(0);


// Download (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Master_Company_'.$date.'.xlsx"');
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
