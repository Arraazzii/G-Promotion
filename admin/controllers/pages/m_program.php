<?php 
$url        = explode("/",$_SERVER["REQUEST_URI"]);
$segmen1    = $url[2];
    if ($segmen1 == 'program?input=berhasil' || $segmen1 == 'program?edit=berhasil' ) {?>
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
            <h3 class="text-white"><strong>DATA PROGRAM</strong></h3>
            <a href="add_program">
                <button type="button" style="margin-top: -30px" class="btn btn-primary float-right bg-flat-color-1 btn-md no-margin" data-toggle="tooltip" data-placement="top" title="Tooltip on top"><i class="fa fa-plus">&nbspADD NEW</i></button>
            </a>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table-program" class="table table-striped table-bordered table-hover table-responsive{-sm|-md|-lg|-xl}" style="width:100%">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Program name</th>
                        <th>Start Program</th>
                        <th>End Program</th>
                        <th>Description</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                $no = 1;
                $u = mysql_query("SELECT * FROM m_program");
                while ($du = mysql_fetch_array($u)) {?>
                    <tr>
                        <td>
                            <?= $du['kode_program'] ?>
                        </td>
                        <td>
                            <?= $du['nama_program'] ?>
                        </td>
                        <td>
                            <?= $du['tanggal_mulai'] ?>
                        </td>
                        <td>
                            <?= $du['tanggal_selesai'] ?>
                        </td>
                        <td>
                            <?= substr($du['deskripsi'], 0, 30); ?>...
                        </td>
                        <td>
                            <form action="program_details" method="post">
                                <input style="display: none" type="checkbox" name="check" checked>
                                <input type="hidden" name="kode_program" value="<?= $du['kode_program']?>">
                                <button type="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-eye">View</i></button> 
                                <input type="text" name="master" class="master" id="master" value="Program" hidden="">
                                <input type="text" name="kode" class="kode" id="kode" value="6" hidden="">
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