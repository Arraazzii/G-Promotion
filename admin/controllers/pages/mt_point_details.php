<?php
    if (!isset($_POST['id'])) {
        echo "<script>window.history.back();</script>";
    }else{
    $year = $_POST['tahun'];
    $kode = $_POST['id'];
    $q = mysql_fetch_array(mysql_query("SELECT * FROM employee_penilaian JOIN mt_employee ON employee_penilaian.nik = mt_employee.nik WHERE employee_penilaian.nik = '$kode' AND employee_penilaian.tahun = '$year' "));
    
?>
    <div class="card" style="margin: 15px">
        <div class="card-header bg-flat-color-5">
            <h3 class="text-white"><strong>EDIT POINT(<?= $q['nama_depan']." ".$q['nama_belakang'] ?>)</strong></h3>
            <a href="employee_point">
            <button type="button" style="margin-top: -30px" class="btn btn-primary float-right bg-flat-color-1 btn-md no-margin"><i class="fa fa-arrow-left"></i>&nbspBack</button>
            </a>
        </div>
        <div class="card-body">
            <div class="col-sm-12">
                <?php include'../../../components/form/edit-employee-point-form.php'; ?>
            </div>
        </div>
    </div>
<?php } ?>