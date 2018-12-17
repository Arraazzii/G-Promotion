<?php
    $kode = $_POST['kode_perusahaan'];
    $q = mysql_fetch_array(mysql_query("SELECT * FROM m_perusahaan JOIN alamat ON m_perusahaan.kode_alamat = alamat.kode_alamat WHERE kode_perusahaan = '$kode' "));
    
?>
    <div class="card" style="margin: 15px">
        <div class="card-header bg-flat-color-5">
            <h3 class="text-white"><strong>EDIT PERUSAHAAN(<?= $q['kode_perusahaan'] ?>)</strong></h3>
            <a href="perusahaan">
            <button type="button" style="margin-top: -30px" class="btn btn-primary float-right bg-flat-color-1 btn-md no-margin"><i class="fa fa-arrow-left"></i>&nbspBack</button>
            </a>
        </div>
        <div class="card-body">
            <div class="col-sm-12">
                <?php include'../../../components/form/edit-perusahaan-form.php'; ?>
            </div>
        </div>
    </div>