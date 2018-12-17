<?php
    if (!isset($_POST['id'])) {
        echo "<script>window.history.back();</script>";
    }else{

    $kode = $_POST['id'];
    $qq = mysql_query("SELECT * FROM program_karyawan JOIN mt_employee ON program_karyawan.nik = mt_employee.nik WHERE program_karyawan.nik = '$kode' GROUP BY program_karyawan.nik ");

while ($q = mysql_fetch_array($qq)) {
?>

    <div class="card" style="margin: 15px">
        <div class="card-header bg-flat-color-5">
            <h3 class="text-white"><strong>EDIT PROGRAM(<?= $q['nama_depan']." ".$q['nama_belakang'] ?>)</strong></h3>
            <a href="employee_program">
            <button type="button" style="margin-top: -30px" class="btn btn-primary float-right bg-flat-color-1 btn-md no-margin"><i class="fa fa-arrow-left"></i>&nbspBack</button>
            </a>
        </div>
        <div class="card-body">
            <div class="col-sm-12">
                <?php include'../../../components/form/edit-employee-program-form.php'; ?>
            </div>
        </div>
    </div>
<?php } 
} ?>