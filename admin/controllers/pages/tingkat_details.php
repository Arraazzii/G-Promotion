<?php
    if (!isset($_POST['kode_tingkat'])) {
        echo "<script>window.history.back();</script>";
    }else{

    $kode = $_POST['kode_tingkat'];
    $q = mysql_fetch_array(mysql_query("SELECT * FROM m_tingkat WHERE kode_tingkat = '$kode' "));
?>
    <div class="card" style="margin: 15px">
        <div class="card-header bg-flat-color-5">
            <h3 class="text-white"><strong>EDIT TINGKAT(<?= $q['kode_tingkat'] ?>)</strong></h3>
            <a href="level">
            <button type="button" style="margin-top: -30px" class="btn btn-primary float-right bg-flat-color-1 btn-md no-margin"><i class="fa fa-arrow-left"></i>&nbspBack</button>
            </a>
        </div>
        <div class="card-body">
            <div class="col-sm-12">
                <?php include'../../../components/form/edit-tingkat-form.php'; ?>
            </div>
        </div>
    </div>
<?php } ?>