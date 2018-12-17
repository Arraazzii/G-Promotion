<?php 
	require '../../../_database/koneksi.php';
	$id = $_POST['id'];
	if (isset($_POST['id'])) {
		mysql_query("UPDATE employee_penilaian SET status = '0' WHERE nik ='$id'");
	}else{
		echo "<script>window.history.back();</script>";
	}

?>