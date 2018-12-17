<?php 
	require '../../../_database/koneksi.php';
	$id = $_POST['id'];
	$kode = $_POST['kode'];
	$alamat = $_POST['alamat'];
	$kode_master = $_POST['kode_master'];
	if ($kode == 1) {
		mysql_query("DELETE FROM m_area WHERE id = '$id' ");
		// mysql_query("DELETE FROM alamat WHERE kode_alamat = '$alamat' "); // delete area
		// mysql_query("UPDATE master SET kode_area = '' WHERE kode_area ='$kode_master'");
	}elseif ($kode == 2) {
		mysql_query("DELETE FROM m_grup WHERE id = '$id' "); // delete group
		// mysql_query("UPDATE master SET kode_grup = '' WHERE kode_grup ='$kode_master'");
	}elseif ($kode == 3) {
		mysql_query("DELETE FROM m_pekerjaan WHERE id = '$id' "); //delete job
		// mysql_query("UPDATE master SET kode_pekerjaan = '' WHERE kode_pekerjaan ='$kode_master'");
	}elseif ($kode == 4) {
		mysql_query("DELETE FROM m_perusahaan WHERE id = '$id' "); //delete company
		// mysql_query("DELETE FROM alamat WHERE kode_alamat = '$alamat' ");
		// mysql_query("UPDATE master SET kode_perusahaan = '' WHERE kode_perusahaan ='$kode_master'");
	}elseif ($kode == 5) {
		mysql_query("DELETE FROM m_posisi WHERE id = '$id' "); //delete position
		// mysql_query("UPDATE master SET kode_posisi = '' WHERE kode_posisi ='$kode_master'");
	}elseif ($kode == 6) {
		mysql_query("DELETE FROM m_program WHERE id = '$id' "); //delete program
		// mysql_query("UPDATE program_karyawan set kode_program ='' WHERE id = '$id' ");
	}elseif ($kode == 7) {
		mysql_query("DELETE FROM m_tingkat WHERE id = '$id' "); //delete tingkat
		// mysql_query("UPDATE master SET kode_tingkat = '' WHERE kode_tingkat ='$kode_master'");
	}elseif ($kode == 8) {
		mysql_query("DELETE FROM m_unit WHERE id = '$id' "); //delete unit
		// mysql_query("UPDATE master SET kode_unit = '' WHERE kode_unit ='$kode_master'");
	}elseif ($kode == 9) {
		mysql_query("DELETE FROM user WHERE kode_user = '$id' "); //delete user
	}elseif ($kode == 10) {
		mysql_query("DELETE FROM m_role WHERE id = '$id' "); //delete role
	}elseif ($kode == 11) {
		mysql_query("DELETE FROM mt_employee WHERE id = '$id' "); //delete employee
		// mysql_query("DELETE FROM alamat WHERE kode_alamat = '$alamat' ");
	}elseif ($kode == 12) {
		mysql_query("DELETE FROM m_penilaian WHERE id = '$id' "); //delete penilaian
	}elseif ($kode == 13) {
		mysql_query("DELETE FROM employee_penilaian WHERE id = '$id' "); //delete program
	}elseif ($kode == 14) {
		mysql_query("DELETE FROM employee_penilaian WHERE nik = '$id' "); //delete grade
	}elseif ($kode == 15) {
		mysql_query("DELETE FROM program_karyawan WHERE nik = '$id' "); //delete program employee sesuai nik
	}elseif ($kode == 16) {
		mysql_query("DELETE FROM program_karyawan WHERE id_program = '$id' "); //delete program employee sesuai id program
	}else{
		echo "<script>window.history.back();</script>";
	}

?>