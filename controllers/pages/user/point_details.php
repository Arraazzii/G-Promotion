<?php
    if (!isset($_POST['id'])) {
        echo "<script>window.history.back();</script>";
    }else{

    $kode = $_POST['id'];
    $q = mysql_fetch_array(mysql_query("SELECT * FROM m_penilaian WHERE id = '$kode' "));
    
?>
    <div class="card" style="margin: 15px">
        <div class="card-header bg-flat-color-5">
            <h3 class="text-white"><strong>EDIT POINT/TAHUN(<?= $q['id'] ?>)</strong></h3>
            <a href="point">
            <button type="button" style="margin-top: -30px" class="btn btn-primary float-right bg-flat-color-1 btn-md no-margin"><i class="fa fa-arrow-left"></i>&nbspBack</button>
            </a>
        </div>
        <div class="card-body">
            <div class="col-sm-12">
                <?php include'../../../components/form/edit-point-form.php'; ?>
            </div>
        </div>
    </div>
<?php } ?>