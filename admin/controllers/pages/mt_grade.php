<div class="card" style="margin: 15px">
    <div class="card-header bg-flat-color-5">
        <h3 class="text-white"><strong>DATA EMPLOYEE GRADE</strong></h3>
    </div>
    <div class="card-body">
        <table id="bootstrap-data-table-employee-grade" class="table table-striped table-bordered table-hover table-responsive{-sm|-md|-lg|-xl}" style="width:100%">
            <thead>
                <tr>
                    <th>NIK</th>
                    <th>Name</th>
                    <th>Amount Point</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $u = mysql_query("SELECT * FROM employee_penilaian JOIN mt_employee ON employee_penilaian.nik = mt_employee.nik GROUP BY employee_penilaian.nik");
                while ($du = mysql_fetch_array($u)) {?>
                <tr>
                    <td>
                        <?= $du['nik'] ?>
                    </td>
                    <td>
                        <?= $du['nama_depan']." ".$du['nama_belakang'] ?> 
                    </td>
                    <td>
                        <?php
                            $nik = $du['nik'];
                            $amount = mysql_query("SELECT SUM(nilai) as total FROM employee_penilaian WHERE nik = '$nik' AND status <> 1 ORDER BY nik asc ");
                            while ($t = mysql_fetch_array($amount)) {
                                if (is_null($t['total'])) {
                                    echo "0";
                                }else{
                                    echo $t['total'];
                                }
                            }
                         ?>
                    </td>
                    <td>
                        <form action="mt_grade_details" method="post">
                            <input style="display: none" type="checkbox" name="check" checked>
                            <input type="hidden" name="id" value="<?= $du['nik'] ?>">
                            <input type="hidden" name="nama" value="<?= $du['nama_depan']." ".$du['nama_belakang'] ?>">
                            <button type="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-eye">Details</i></button>
                            <input type="text" name="master" class="master" id="master" value="Employee Grade" hidden>
                            <input type="text" name="kode" class="kode" id="kode" value="14" hidden>
                            <button type="button" class="btn btn-outline-danger btn-sm" onclick="hapus(<?= $du['nik'] ?>)"><i class="fa fa-eraser">Hapus</i></button>
                        </form>
                    </td>
                </tr>
                <?php } 
            ?>
            </tbody>
        </table>
    </div>
</div>
