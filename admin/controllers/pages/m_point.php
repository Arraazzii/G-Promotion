<?php 
$url        = explode("/",$_SERVER["REQUEST_URI"]);
$segmen1    = $url[2];
    if ($segmen1 == 'point?input=berhasil' || $segmen1 == 'point?edit=berhasil' ) {?>
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
        <h3 class="text-white"><strong>DATA POINT</strong></h3>
        <a href="add_point">
            <button type="button" style="margin-top: -30px" class="btn btn-primary float-right bg-flat-color-1 btn-md no-margin" data-toggle="tooltip" data-placement="top" title="Tooltip on top"><i class="fa fa-plus">&nbspADD NEW</i></button>
        </a>
    </div>
    <div class="card-body">
        <table id="bootstrap-data-table-point" class="table table-striped table-bordered table-hover table-responsive{-sm|-md|-lg|-xl}" style="width:100%">
            <thead>
                <tr>
                    <th>Year</th>
                    <th>A</th>
                    <th>B</th>
                    <th>C</th>
                    <th>D</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no= 1;
                $u = mysql_query("SELECT * FROM m_penilaian ORDER BY tahun ASC");
                while ($du = mysql_fetch_array($u)) {?>
                <tr>
                    <td>
                        <?= $du['tahun'] ?>
                    </td>
                    <td>
                        <?= $du['a'] ?>
                    </td>
                    <td>
                        <?= $du['b'] ?>
                    </td>
                    <td>
                        <?= $du['c'] ?>
                    </td>
                    <td>
                        <?= $du['d'] ?>
                    </td>
                    <td>
                        <form action="point_details" method="post">
                            <input style="display: none" type="checkbox" name="check" checked>
                            <input type="hidden" name="id" value="<?= $du['id']?>">
                            <button type="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-eye">View</i></button>
                            <input type="text" name="master" class="master" id="master" value="Point" hidden="">
                            <input type="text" name="kode" class="kode" id="kode" value="12" hidden="">
                            <button type="button" class="btn btn-outline-danger btn-sm" onclick="return hapus(<?= $du['id'] ?>)"><i class="fa fa-eraser">Hapus</i></button>
                        </form>
                    </td>
                </tr>
                <?php } 
            ?>
            </tbody>
        </table>
    </div>
</div>