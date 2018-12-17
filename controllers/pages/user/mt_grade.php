<?php 
$kode = $_SESSION['kode_user'];
$lihat = mysql_query("SELECT * FROM user JOIN m_role ON user.kode_role = m_role.kode_role WHERE m_role.master = 'employee_grade' AND m_role.lihat = 1 AND user.kode_user = '$kode'") or die(mysql_error());
$hapus = mysql_query("SELECT * FROM user JOIN m_role ON user.kode_role = m_role.kode_role WHERE m_role.master = 'employee_grade' AND m_role.hapus = 1 AND user.kode_user = '$kode'") or die(mysql_error());
?>
<div class="card" style="margin: 15px">
    <div class="card-header bg-flat-color-5">
        <h3 class="text-white"><strong>DATA EMPLOYEE employee_grade</strong></h3>
    </div>
    <div class="card-body">
        <table id="bootstrap-data-table-grade" class="table table-striped table-bordered table-hover table-responsive{-sm|-md|-lg|-xl}" style="width:100%">
            <thead>
                <tr>
                    <th>NIK</th>
                    <th>Name</th>
                    <th>Amount Point</th>
                    <th>#</th>
                </tr>
            </thead>
            <?php if (mysql_num_rows($lihat) >= 1) { ?>
            <tbody>
                <?php 
                $u = mysql_query("SELECT * FROM employee_penilaian JOIN mt_employee ON employee_penilaian.nik = mt_employee.nik GROUP BY employee_penilaian.nik ");
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
                        <form action="mt_employee_grade_details" method="post">
                            <input style="display: none" type="checkbox" name="check" checked>
                            <input type="hidden" name="id" value="<?= $du['nik'] ?>">
                            <input type="hidden" name="nama" value="<?= $du['nama_depan']." ".$du['nama_belakang'] ?>">
                            <button type="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-eye">Details</i></button>
                            <input type="text" name="master" class="master" id="master" value="Employee employee_grade" hidden>
                            <input type="text" name="kode" class="kode" id="kode" value="14" hidden>
                            <?php if (mysql_num_rows($hapus) >= 1 ) { ?>
                            <button type="button" class="btn btn-outline-danger btn-sm" onclick="return hapus(<?= $du['id'] ?>)"><i class="fa fa-eraser">Delete</i></button>
                            <?php } ?>
                        </form>
                    </td>
                </tr>
                <?php } 
            ?>
            </tbody>
            <?php } ?>
        </table>
    </div>
</div>