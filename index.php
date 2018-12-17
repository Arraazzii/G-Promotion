<!-- <meta http-equiv="refresh" content="0;url=controllers/index.html"> -->
<?php include'components/base/head-login.php'; ?>
<?php 

$url        = explode("/",$_SERVER["REQUEST_URI"]);
session_start();    
include'_database/koneksi.php';
if (@$_SESSION['nama']) {
    echo "<script>window.location='user/home?alreadylogin'</script>";
}elseif (@$_SESSION['admin']) {
    echo "<script>window.location='adminweb/home?alreadylogin'</script>";
} else {
?>
<?php include'components/base/head-login.php'; ?>
<?php 
    if (isset($url[1])) {
      if ($url[1] == '?login=gagal') {?>
            <div class="col-sm-12"><br>
                <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-danger">Warning!</span> Login Failed, Something Wrong With Username and Password!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        <?php } elseif ($url[1] == '?status=disabled') {?>
            <div class="col-sm-12"><br>
                <div class="alert  alert-warning alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-warning">Warning!</span> Account has been disabled,Contact Your Administrator!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        <?php }
    }
    ?>
<div class="bg-dark">
    <div class="sufee-login d-flex align-content-center flex-wrap" style="margin-top: 175px">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="./">
                       <img style="width: 100px;margin-bottom: 5px;margin-top: 5px;margin-right: 5px" class="float-right align-content" src="assets/images/logo.jpg" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <?php include 'components/form/login-admin-form.php'; ?>
                </div>
            </div>
        </div>

    </div>
</div>
<?php } ?>