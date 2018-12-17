<style type="text/css">
table tr {
    border: 1px solid #000;
}
</style>
<?php 
$kode = $_SESSION['kode_user'];
$lihat = mysql_query("SELECT * FROM user JOIN m_role ON user.kode_role = m_role.kode_role WHERE m_role.master = 'employee_point' AND m_role.lihat = 1 AND user.kode_user = '$kode'") or die(mysql_error());
$tambah = mysql_query("SELECT * FROM user JOIN m_role ON user.kode_role = m_role.kode_role WHERE m_role.master = 'employee_point' AND m_role.tambah = 1 AND user.kode_user = '$kode'") or die(mysql_error());
$hapus = mysql_query("SELECT * FROM user JOIN m_role ON user.kode_role = m_role.kode_role WHERE m_role.master = 'employee_point' AND m_role.hapus = 1 AND user.kode_user = '$kode'") or die(mysql_error());
?>
<div class="card" style="margin: 15px">
    <div class="card-header bg-flat-color-5">
        <h3 class="text-white"><strong>DATA EMPLOYEE POINT</strong></h3>
        <a href="add_employee_point">
            <?php if (mysql_num_rows($tambah) >= 1 ) {?>
            <button type="button" style="margin-top: -30px" class="btn btn-primary float-right bg-flat-color-1 btn-md no-margin" data-toggle="tooltip" data-placement="top" title="Tooltip on top"><i class="fa fa-plus">&nbspADD NEW</i></button>
            <?php } ?>
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            <table id="row-select" class="table table-striped table-bordered table-hover table-responsive{-sm|-md|-lg|-xl}" style="width:100%">
                <thead>
                    <tr>
                        <th>Year</th>
                        <th>NIK</th>
                        <th>Name</th>
                        <th>Grade</th>
                        <th hidden=""></th>
                        <th>Status Point</th>
                        <th>#</th>
                    </tr>
                </thead>
                <?php if (mysql_num_rows($lihat) >= 1) { ?>
                <tbody>
                    <?php 
                $u = mysql_query("SELECT * FROM employee_penilaian JOIN mt_employee ON employee_penilaian.nik = mt_employee.nik ORDER BY employee_penilaian.tahun ASC");
                while ($du = mysql_fetch_array($u)) {?>
                    <tr>
                        <td>
                            <?= $du['tahun'] ?>
                        </td>
                        <td>
                            <?= $du['nik'] ?>
                        </td>
                        <td hidden="">
                        </td>
                        <td>
                            <?= $du['nama_depan']." ".$du['nama_belakang'] ?>
                        </td>
                        <td>
                            <?= $du['grade'] ?>
                        </td>
                        <?php 
                        if ($du['status'] ==  1) {?>
                        <td style="color: green; text-align: center; font-weight: bold;">Ready</td>
                        <?php 
                        }else{
                        ?>
                        <td style="color: red; text-align: center;font-weight: bold;">Used</td>
                        <?php } ?>
                        <td>
                            <form action="employee_point_details" method="post">
                                <input style="display: none" type="checkbox" name="check" checked>
                                <input type="hidden" name="id" value="<?= $du['nik'] ?>">
                                <input type="hidden" name="tahun" value="<?= $du['tahun'] ?>">
                                <button type="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-eye">Details</i></button>
                                <input type="text" name="master" class="master" id="master" value="Employee Point" hidden="">
                                <input type="text" name="kode" class="kode" id="kode" value="13" hidden="">
                                <?php if (mysql_num_rows($hapus) >= 1 ) { ?>
                                <button type="button" class="btn btn-outline-danger btn-sm" onclick="return hapus(<?= $du['id'] ?>)"><i class="fa fa-eraser">Delete</i></button>
                                <?php } ?>
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
</div>