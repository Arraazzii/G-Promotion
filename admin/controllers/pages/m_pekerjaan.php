<?php 
$url        = explode("/",$_SERVER["REQUEST_URI"]);
$segmen1    = $url[2];
    if ($segmen1 == 'job?input=berhasil' || $segmen1 == 'job?edit=berhasil') {?>
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
        <h3 class="text-white"><strong>DATA JOB</strong></h3>
        <a href="add_job">
            <button type="button" style="margin-top: -30px" class="btn btn-primary float-right bg-flat-color-1 btn-md no-margin" data-toggle="tooltip" data-placement="top" title="Tooltip on top"><i class="fa fa-plus">&nbspADD NEW</i></button>
        </a>
    </div>
    <div class="card-body">
        <table id="bootstrap-data-table-job" class="table table-striped table-bordered table-hover table-responsive{-sm|-md|-lg|-xl} display" style="width:100%">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Job</th>
                    <th>Description</th>
                    <th>#</th>
                </tr>
            </thead>
        </table>
    </div>
</div>