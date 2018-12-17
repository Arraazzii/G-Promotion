<?php 
$url        = explode("/",$_SERVER["REQUEST_URI"]);
$segmen1    = $url[2];
    if ($segmen1 == 'home?login=berhasil') {?>
        <div class="col-sm-12"><br>
            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                <span class="badge badge-pill badge-success">Welcome!</span> You successfully login, <?= $_SESSION['admin']?>!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
            <center>
                <img src="../../assets/images/logo.jpg" width="500">
            </center>
        <?php }else{?>
        <div class="content mt-3">
            <div class="alert  alert-primary alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-success">Dashboard</span> <b>G-Promotion</b> <i>Application</i>
            </div>
            <center>
                    <img src="../../assets/images/logo.jpg" width="500">
            </center>
        </div>
<?php }?>