<?php
    if (!isset($_POST['kode_unit'])) {
        echo "<script>window.history.back();</script>";
    }else{

    $kode = $_POST['kode_unit'];
    $q = mysql_fetch_array(mysql_query("SELECT * FROM m_unit WHERE kode_unit = '$kode' "));
    
?>
    <div class="card" style="margin: 15px">
        <div class="card-header bg-flat-color-5">
            <h3 class="text-white"><strong>EDIT UNIT(<?= $q['kode_unit'] ?>)</strong></h3>
            <a href="unit">
            <button type="button" style="margin-top: -30px" class="btn btn-primary float-right bg-flat-color-1 btn-md no-margin"><i class="fa fa-arrow-left"></i>&nbspBack</button>
            </a>
        </div>
        <div class="card-body">
            <div class="col-sm-12">
                <?php include'../../../components/form/edit-unit-form.php'; ?>
            </div>
        </div>
    </div>
<?php } ?>