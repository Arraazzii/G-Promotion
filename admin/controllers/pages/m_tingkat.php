<?php 
$url        = explode("/",$_SERVER["REQUEST_URI"]);
$segmen1    = $url[2];
    if ($segmen1 == 'level?input=berhasil' || $segmen1 == 'level?edit=berhasil' ) {?>
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
<div class="card" style="margin: 15px">
    <div class="card-header bg-flat-color-5">
        <h3 class="text-white"><strong>DATA LEVEL</strong></h3>
        <a href="add_level">
            <button type="button" style="margin-top: -30px" class="btn btn-primary float-right bg-flat-color-1 btn-md no-margin" data-toggle="tooltip" data-placement="top" title="Tooltip on top"><i class="fa fa-plus">&nbspADD NEW</i></button>
        </a>
    </div>
    <div class="card-body">
        <table id="bootstrap-data-table-level" class="table table-striped table-bordered table-hover table-responsive{-sm|-md|-lg|-xl}" style="width:100%">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Level</th>
                    <th>Description</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                $u = mysql_query("SELECT * FROM m_tingkat");
                while ($du = mysql_fetch_array($u)) {?>
                <tr>
                    <td>
                        <?= $du['kode_tingkat'] ?>
                    </td>
                    <td>
                        <?= $du['nama_tingkat'] ?>
                    </td>
                    <td>
                        <?= substr($du['deskripsi'], 0, 30); ?>...
                    </td>
                    <td>
                        <form action="level_details" method="post">
                            <input style="display: none" type="checkbox" name="check" checked>
                            <input type="hidden" name="kode_tingkat" value="<?= $du['kode_tingkat']?>">
                            <button type="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-eye">View</i></button>
                            <input type="text" name="kode_master" class="kode_master" id="kode_master" value="<?= $du['kode_tingkat']?>" hidden="">
                            <input type="text" name="master" class="master" id="master" value="Level" hidden="">
                            <input type="text" name="kode" class="kode" id="kode" value="7" hidden="">
                            <button type="button" class="btn btn-outline-danger btn-sm" onclick="hapus(<?= $du['id']?>)"><i class="fa fa-eraser">Hapus</i></button>
                        </form>
                    </td>
                </tr>
                <?php } 
            ?>
            </tbody>
        </table>
    </div>
</div>