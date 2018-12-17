<?php 
$url        = explode("/",$_SERVER["REQUEST_URI"]);
$segmen1    = $url[2];
    if ($segmen1 == 'user?input=berhasil' || $segmen1 == 'user?edit=berhasil' ) {?>
        <div class="col-sm-12"><br>
            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                <span class="badge badge-pill badge-success">Success!</span> Your Data Has Been Changed!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    <?php }
    ?>
<div class="col-sm-12">
    <div class="card" style="margin: 15px">
        <div class="card-header bg-flat-color-5">
            <h3 class="text-white"><strong>DATA USER</strong></h3>
            <a href="add_user">
            <button type="button" style="margin-top: -30px" class="btn btn-primary float-right bg-flat-color-1 btn-md no-margin" data-toggle="tooltip" data-placement="top" title="Tooltip on top"><i class="fa fa-plus">&nbspADD NEW</i></button>
            </a>
        </div>
        <div class="card-body">
            
            <table id="bootstrap-data-table-user" class="table table-striped table-bordered table-hover table-responsive{-sm|-md|-lg|-xl}" style="width:100%">
                <thead>
                    <tr>
                        <th>User Code</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Status Active</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                $u = mysql_query("SELECT * FROM user");
                while ($du = mysql_fetch_array($u)) {?>
                    <tr>
                        <td>
                            <?= $du['kode_user'] ?>
                        </td>
                        <td>
                            <?= $du['nama'] ?>
                        </td>
                        <td>
                            <?= $du['username'] ?>
                        </td>
                        <td>
                            <?php 
                            $u2 = mysql_query("SELECT * FROM user_role WHERE kode_user = '".$du['kode_user']."' ORDER BY akses_role") or die(mysql_error());
                            while ($du2 = mysql_fetch_array($u2)) {?>
                                 <?= $du2['akses_role']."."?>
                            <?php } ?>
                            
                        </td>
                        <td>
                            <label class="switch switch-text switch-success"><input type="checkbox" class="switch-input" <?php if($du['status']== 1){echo "checked";}?> value="<?= $du['kode_user'] ?>"
                            > <span data-on="On" data-off="Off" class="switch-label"></span> <span class="switch-handle"></span></label>
                        </td>
                        <td>
                            <form action="user_details" method="post">
                                <input style="display: none" type="checkbox" name="check" checked>
                                <input type="hidden" name="kode_user" id="kode_user" value="<?= base64_encode($du['username']) ?>">
                                <input type="hidden" name="id" value="<?= base64_encode($du['kode_user']) ?>">
                                <input type="hidden" name="status" value="<?= $du['status'] ?>">
                                <button type="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-eye">View</i></button>
                                <input type="text" name="master" class="master" id="master" value="User" hidden="">
                                <input type="text" name="kode" class="kode" id="kode" value="9" hidden=""> 
                                <button type="button" class="btn btn-outline-danger btn-sm" onclick="hapus(<?= $du['kode_user'] ?>)"><i class="fa fa-eraser">Hapus</i></button>
                            </form>
                        </td>
                    </tr>
                    <?php } 
            ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="../assets/js/ext/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.switch-input').click(function(){
            if ($(this).is(':checked')) {
                var kode = $(this).val();
                var status = 1;
                jQuery.ajax({
                    type: 'POST',
                    url: '../admin/controllers/config/p_status_user.php',
                    data: 'kode=' + kode + '&status=' + status,
                    success: function(data) {
                    }
                });
            }else if($(this).not(':checked')){
                var kode = $(this).val();
                var status = 0;
                jQuery.ajax({
                    type: 'POST',
                    url: '../admin/controllers/config/p_status_user.php',
                    data: 'kode=' + kode + '&status=' + status,
                    success: function(data) {
                    }
                });

            }else{
                return false;
            }
            
        });
    });
</script>