<?php
    if (!isset($_POST['nik'])) {
        echo "<script>window.history.back();</script>";
    }else{

    $kode = $_POST['nik'];
    $nama = $_POST['nama'];
    $query = mysql_query("SELECT * FROM master 
        INNER JOIN mt_employee ON mt_employee.nik = master.nik 
        INNER JOIN alamat ON alamat.kode_alamat = mt_employee.kode_alamat 
        -- INNER JOIN m_perusahaan ON m_perusahaan.kode_perusahaan = master.kode_perusahaan 
        -- INNER JOIN m_area ON m_area.kode_area = master.kode_area 
        -- INNER JOIN m_unit ON m_unit.kode_unit = master.kode_unit 
        -- INNER JOIN m_grup ON m_grup.kode_grup = master.kode_grup 
        -- INNER JOIN m_pekerjaan ON m_pekerjaan.kode_pekerjaan = master.kode_pekerjaan 
        -- INNER JOIN m_posisi ON m_posisi.kode_posisi = master.kode_posisi
        -- INNER JOIN m_tingkat ON m_tingkat.kode_tingkat = master.kode_tingkat
        WHERE mt_employee.nik = '$kode' GROUP BY master.nik ") or die(mysql_error());
?>
    
    <?php while ($q = mysql_fetch_array($query)) { ?>
    <div class="card" style="margin: 15px">
        <div class="card-header bg-flat-color-5">
            <h3 class="text-white"><strong>EMPLOYEE Name: <b><?= $nama ?></b></strong></h3>
            <a href="employee">
                <button type="button" style="margin-top: -30px" class="btn btn-primary float-right bg-flat-color-1 btn-md no-margin"><i class="fa fa-arrow-left"></i>&nbspBack</button>
            </a>
        </div>
        <div class="card-body">
            
            <div class="default-tab">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-details-tab" data-toggle="tab" href="#nav-details" role="tab" aria-controls="nav-details" aria-selected="true">Details</a>
                        <a class="nav-item nav-link" id="nav-edit-tab" data-toggle="tab" href="#nav-edit" role="tab" aria-controls="nav-edit" aria-selected="false">Edit</a>
                    </div>
                </nav>
                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-details" role="tabpanel" aria-labelledby="nav-details-tab">
                        <div class="col-sm-12">
                            <?php include'../../../components/form/details-employee.php'; ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-edit" role="tabpanel" aria-labelledby="nav-edit-tab">
                        <div class="col-sm-12">
                            <?php include'../../../components/form/edit-employee-form.php'; ?>
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>

<?php }
} ?>