<?php 
$kode = $_SESSION['kode_user'];
$lihat = mysql_query("SELECT * FROM user JOIN m_role ON user.kode_role = m_role.kode_role WHERE m_role.master = 'position' AND m_role.lihat = 1 AND user.kode_user = '$kode'") or die(mysql_error());
$tambah = mysql_query("SELECT * FROM user JOIN m_role ON user.kode_role = m_role.kode_role WHERE m_role.master = 'position' AND m_role.tambah = 1 AND user.kode_user = '$kode'") or die(mysql_error());
$hapus = mysql_query("SELECT * FROM user JOIN m_role ON user.kode_role = m_role.kode_role WHERE m_role.master = 'position' AND m_role.hapus = 1 AND user.kode_user = '$kode'") or die(mysql_error());
?>
<div class="card" style="margin: 15px">
    <div class="card-header bg-flat-color-5">
        <h3 class="text-white"><strong>DATA POSITION</strong></h3>
        <a href="add_position">
            <?php if (mysql_num_rows($tambah) >= 1 ) {?>
            <button type="button" style="margin-top: -30px" class="btn btn-primary float-right bg-flat-color-1 btn-md no-margin" data-toggle="tooltip" data-placement="top" title="Tooltip on top"><i class="fa fa-plus">&nbspADD NEW</i></button>
            <?php } ?>
        </a>
    </div>
    <div class="card-body">
        <table id="bootstrap-data-table" class="table table-striped table-bordered table-hover table-responsive{-sm|-md|-lg|-xl}" style="width:100%">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Position</th>
                    <th>Grade Code</th>
                    <th>Level</th>
                    <th>Description</th>
                    <th>#</th>
                </tr>
            </thead>
            <?php if (mysql_num_rows($lihat) >= 1) { ?>
            <tbody>
                <?php 
                $no = 1;
                $u = mysql_query("SELECT * FROM m_posisi");
                while ($du = mysql_fetch_array($u)) {?>
                <tr>
                    <td>
                        <?= $du['kode_posisi'] ?>
                    </td>
                    <td>
                        <?= $du['nama_posisi'] ?>
                    </td>
                    <td>
                        <?= $du['grade_posisi'] ?>
                    </td>   
                    <td>
                        <?php 
                            $id = $du['id_tingkat'];
                            $tng = mysql_query("SELECT * FROM m_tingkat WHERE kode_tingkat = '$id' ") or die(mysql_error()) ;
                            $tt = mysql_fetch_array($tng);
                        ?>
                        <?= $tt['nama_tingkat'] ?>
                    </td>
                    <td>
                        <?= $du['deskripsi'] ?>
                    </td>
                    <td>
                        <form action="position_details" method="post">
                            <input style="display: none" type="checkbox" name="check" checked>
                            <input type="hidden" name="kode_posisi" value="<?= $du['kode_posisi']?>">
                            <button type="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-eye">View</i></button>
                            <input type="text" name="master" class="master" id="master" value="Position" hidden="">
                            <input type="text" name="kode" class="kode" id="kode" value="5" hidden="">
                            <?php if (mysql_num_rows($hapus) >= 1 ) {?>
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