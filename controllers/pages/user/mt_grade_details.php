<?php
    if (!isset($_POST['id'])) {
        echo "<script>window.history.back();</script>";
    }else{
    $kode = $_POST['id'];
    $nama = $_POST['nama'];
    $q = mysql_query("SELECT * FROM employee_penilaian WHERE nik = '$kode' ");
}
    
?>
<div class="card" style="margin: 15px">
    <div class="card-header bg-flat-color-5">
        <h3 class="text-white"><strong>DETAIL EMPLOYEE GRADE (<?= $nama ?>)</strong></h3>
        <a href="employee_grade">
            <button type="button" style="margin-top: -30px" class="btn btn-primary float-right bg-flat-color-1 btn-md no-margin"><i class="fa fa-arrow-left"></i>&nbspBack</button>
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            <table id="bootstrap-data-table" class="table table-striped table-bordered table-hover table-responsive{-sm|-md|-lg|-xl}" style="width:100%">
                <thead>
                    <tr>
                        <th>Year</th>
                        <th>Grade</th>
                        <th>Point</th>
                        <th>Status Point</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    while ($d = mysql_fetch_array($q)) {?>
                         <tr>
                            <td><b><?= $d['tahun'] ?></b></td>
                            <td><?= $d['grade'] ?></td>
                            <td><?= $d['nilai'] ?></td>
                            <?php 
                                if ($d['status'] ==  1) {?>
                                    <td style="color: green; text-align: center; font-weight: bold;">Ready</td>
                                <?php }else{?>
                                    <td style="color: red; text-align: center;font-weight: bold;">Used</td>
                                <?php }
                                ?>
                                </tr>
                            <?php } ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>