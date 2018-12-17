<?php
    $kode = $_POST['kode_posisi'];
    $q = mysql_fetch_array(mysql_query("SELECT * FROM m_posisi WHERE kode_posisi = '$kode' "));
    
?>
    <div class="card" style="margin: 15px">
        <div class="card-header bg-flat-color-5">
            <h3 class="text-white"><strong>EDIT POSISI(<?= $q['kode_posisi'] ?>)</strong></h3>
            <a href="posisi">
            <button type="button" style="margin-top: -30px" class="btn btn-primary float-right bg-flat-color-1 btn-md no-margin"><i class="fa fa-arrow-left"></i>&nbspBack</button>
            </a>
        </div>
        <div class="card-body">
            <div class="col-sm-12">
                <?php include'../../../components/form/edit-posisi-form.php'; ?>
            </div>
        </div>
    </div>