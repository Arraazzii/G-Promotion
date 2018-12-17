<?php
    $kode = base64_decode($_POST['id']);
    $q = mysql_fetch_array(mysql_query("SELECT * FROM user WHERE kode_user = '$kode' GROUP BY kode_user"));
    $x = $q['username'];
    $role = $q['kode_role'];
    $array =  explode(',', $role);
    $username = $q['username'];
    $password = $q['password'];
    $status = $q['status'];
    $nama = $q['nama'];
    if (is_null($x)) {
        echo "<script>window.location.href='user';</script>";
    }
    $q1 = mysql_query("SELECT * FROM user WHERE kode_user = '$kode' ");
    
?>  

    <div class="card" style="margin: 15px">
        <div class="card-header bg-flat-color-5">
            <h3 class="text-white"><strong>EDIT USER(<?= $q['username'] ?>)</strong></h3>
            <a href="user">
            <button type="button" style="margin-top: -30px" class="btn btn-primary float-right bg-flat-color-1 btn-md no-margin"><i class="fa fa-arrow-left"></i>&nbspBack</button>
            </a>
        </div>
        <div class="card-body">
            <div class="col-sm-12">
                <?php include'../../../components/form/edit-user-form.php'; ?>
            </div>
        </div>
    </div>