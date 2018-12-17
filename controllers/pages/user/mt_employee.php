<?php 
$kode = $_SESSION['kode_user'];
$lihat = mysql_query("SELECT * FROM user JOIN m_role ON user.kode_role = m_role.kode_role WHERE m_role.master = 'employee' AND m_role.lihat = 1 AND user.kode_user = '$kode'") or die(mysql_error());
$tambah = mysql_query("SELECT * FROM user JOIN m_role ON user.kode_role = m_role.kode_role WHERE m_role.master = 'employee' AND m_role.tambah = 1 AND user.kode_user = '$kode'") or die(mysql_error());
$hapus = mysql_query("SELECT * FROM user JOIN m_role ON user.kode_role = m_role.kode_role WHERE m_role.master = 'employee' AND m_role.hapus = 1 AND user.kode_user = '$kode'") or die(mysql_error());
?>
<div class="card" style="margin: 15px">
    <div class="card-header bg-flat-color-5">
        <h3 class="text-white"><strong>DATA EMPLOYEE</strong></h3>
        <a href="add_employee">
            <?php if (mysql_num_rows($tambah) >= 1 ) {?>
            <button type="button" style="margin-top: -30px" class="btn btn-primary float-right bg-flat-color-1 btn-md no-margin" data-toggle="tooltip" data-placement="top" title="Tooltip on top"><i class="fa fa-plus">&nbspADD NEW</i></button>
            <?php } ?>
        </a>
    </div>
    <div class="card-body">
        <table id="bootstrap-data-table-employee" class="table table-striped table-bordered table-hover table-responsive{-sm|-md|-lg|-xl}" style="width:100%">
            <thead>
                <tr>
                    <th>NIK</th>
                    <th>Name</th>
                    <th>Enterprise Begin</th>
                    <th>#</th>
                </tr>
            </thead>
            <?php if (mysql_num_rows($lihat) >= 1) { ?>
            <tbody>
                <?php 
                $u = mysql_query("SELECT * FROM mt_employee JOIN master ON mt_employee.nik = master.nik");
                while ($du = mysql_fetch_array($u)) {?>
                <tr>
                    <td>
                        <?= $du['nik'] ?>
                    </td>
                    <td>
                        <?= $du['nama_depan']." ". $du['nama_belakang'] ?>
                    </td>
                    <td>
                        <?= $du['enterprise_begin'] ?>
                    </td>
                    <td>
                        <form action="employee_details" method="post">
                            <input style="display: none" type="checkbox" name="check" checked>
                            <input type="hidden" name="nik" value="<?= $du['nik'] ?>">
                            <input type="hidden" name="nama" value="<?= $du['nama_depan'] ?> <?= $du['nama_belakang'] ?>">
                            <button type="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-eye">Details</i></button>
                            <input type="text" name="master" class="master" id="master" value="Employee" hidden="">
                            <input type="text" name="alamat" class="alamat" id="alamat" value="<?= $du['kode_alamat']?>" hidden="">
                            <input type="text" name="kode" class="kode" id="kode" value="11" hidden="">
                                <?php if (mysql_num_rows($hapus) >= 1 ) { ?>
                                    <button type="button" class="btn btn-outline-danger" onclick="hapus(<?= $du['nik'] ?>)"><i class="fa fa-eraser btn-sm">Delete</i></button>
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
<!-- <div class="modal fade" id="scrollmodal" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scrollmodalLabel">Details Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="fetched-data"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#scrollmodal').on('show.bs.modal', function (e) {
            var id = $(event.relatedTarget).data('id');
            $.ajax({
                type : 'POST',
                url : '../admin/controllers/config/p_details_employee.php',
                data :  'id='+ id,
                success : function(data){
                    $('.fetched-data').html(data);
                }
            });
        });
    });
</script>

 -->