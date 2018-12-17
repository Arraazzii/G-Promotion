<?php 
	require '../../../_database/koneksi.php';
	if(!empty($_POST['id'])){
	    $kode = $_POST['id'];
	    $query = mysql_query("SELECT * FROM m_posisi WHERE id_tingkat = '$kode' ORDER BY nama_posisi ASC");
	    if(mysql_num_rows($query) > 0){
	        echo '<option value="" hidden>Select Position </option>';
	        while($row = mysql_fetch_array($query)){ 
	            echo '<option value="'.$row['kode_posisi'].'">'.$row['nama_posisi'].'</option>';
	        }
	    }else{
	        echo '<option value="">Position not available</option>';
	    }
	}

?>