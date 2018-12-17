<?php
require '../../_database/koneksi.php';
require_once '../../assets/phpExcel/Classes/PHPExcel.php';

$u = mysql_query("SELECT * FROM master 
    JOIN mt_employee ON mt_employee.nik = master.nik 
    JOIN alamat ON alamat.kode_alamat = mt_employee.kode_alamat") or die(mysql_error());
$objPHPExcel    = new PHPExcel();
$date           = date('d_M_Y');

$objPHPExcel->getProperties()->setCreator("Gama Plantation")
                            ->setLastModifiedBy("Gama Plantation")
                            ->setTitle("Master E")
                            ->setSubject("E")
                            ->setDescription("Master E".$date)
                            ->setKeywords("G-Promotion _Master E_")
                            ->setCategory("Master E");

$row    = 1;

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$row, 'No')
            ->setCellValue('B'.$row, 'NIK')
            ->setCellValue('C'.$row, 'First Name')
            ->setCellValue('D'.$row, 'Last Name')
            ->setCellValue('E'.$row, 'Birth Place')
            ->setCellValue('F'.$row, 'Birth Date')
            ->setCellValue('G'.$row, 'Gender')
            ->setCellValue('H'.$row, 'Phone Number')
            ->setCellValue('I'.$row, 'Email')
            ->setCellValue('J'.$row, 'Address')
            ->setCellValue('K'.$row, 'Address Number')
            ->setCellValue('L'.$row, 'RT')
            ->setCellValue('M'.$row, 'RW')
            ->setCellValue('N'.$row, 'Kelurahan')
            ->setCellValue('O'.$row, 'Kecamatan')
            ->setCellValue('P'.$row, 'City')
            ->setCellValue('Q'.$row, 'Postal Code')
            ->setCellValue('R'.$row, 'Enterprise Begin')
            ->setCellValue('S'.$row, 'Enterprise Last')
            ->setCellValue('T'.$row, 'Company Code')
            ->setCellValue('U'.$row, 'Area Code')
            ->setCellValue('V'.$row, 'Group Code')
            ->setCellValue('W'.$row, 'Unit Code')
            ->setCellValue('X'.$row, 'Job Code')
            ->setCellValue('Y'.$row, 'Position Code')
            ->setCellValue('Z'.$row, 'Level Code')
            ->setCellValue('AA'.$row, 'Staff Date');


$row++;

$no     = 1;
while( $du = mysql_fetch_array($u)){
    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$row, $no)
            ->setCellValue('B'.$row, $du['nik'])
            ->setCellValue('C'.$row, $du['nama_depan'])
            ->setCellValue('D'.$row, $du['nama_belakang'])
            ->setCellValue('E'.$row, $du['tempat_lahir'])
            ->setCellValue('F'.$row, $du['tanggal_lahir'])
            ->setCellValue('G'.$row, $du['jenis_kelamin'])
            ->setCellValue('H'.$row, $du['no_telepon'])
            ->setCellValue('I'.$row, $du['email'])
            ->setCellValue('J'.$row, $du['alamat'])
            ->setCellValue('K'.$row, $du['no_rumah'])
            ->setCellValue('L'.$row, $du['rt'])
            ->setCellValue('M'.$row, $du['rw'])
            ->setCellValue('N'.$row, $du['kelurahan'])
            ->setCellValue('O'.$row, $du['kecamatan'])
            ->setCellValue('P'.$row, $du['kota'])
            ->setCellValue('Q'.$row, $du['kode_pos'])
            ->setCellValue('R'.$row, $du['enterprise_begin'])
            ->setCellValue('S'.$row, $du['enterprise_last'])
            ->setCellValue('T'.$row, $du['kode_perusahaan'])
            ->setCellValue('U'.$row, $du['kode_area'])
            ->setCellValue('V'.$row, $du['kode_grup'])
            ->setCellValue('W'.$row, $du['kode_unit'])
            ->setCellValue('X'.$row, $du['kode_pekerjaan'])
            ->setCellValue('Y'.$row, $du['kode_posisi'])
            ->setCellValue('Z'.$row, $du['kode_tingkat'])
            ->setCellValue('AA'.$row, $du['staff_date']);

$no++;
$row++; 

}


$objPHPExcel->getActiveSheet()->setTitle('Master E');
$objPHPExcel->setActiveSheetIndex(0);


// Download (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Master_E_'.$date.'.xlsx"');
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
