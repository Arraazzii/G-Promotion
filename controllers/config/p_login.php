<?php
 session_start();
    if (isset($_POST['login'])) {
        
        require '../../_database/koneksi.php';

        $username                   = mysql_real_escape_string($_POST['username']);
        $password                   = mysql_real_escape_string($_POST['password']);
        $query                      = mysql_query("SELECT * FROM user where username = '$username' AND password = '$password'") or die(mysql_error());
        $query1                     = mysql_query("SELECT * FROM admin where username = '$username' AND password = '$password'") or die(mysql_error());

        if (mysql_num_rows($query) > 0) {
            $row                    = mysql_fetch_array($query);
            $kode_user              = $row['kode_user'];
            
            if ($row['status'] == 0) {
                echo "<script>window.location.href='/?status=disabled'</script>";
            } elseif (!empty($kode_user)) {
                $_SESSION['kode_user']  = $kode_user;
                $_SESSION['user']       = "user";
                $_SESSION['nama']       = $row['nama'];
                if(!empty($_POST["ingat"])) {  
                    setcookie ("username",$username,time()+ (86400 * 30), "/");
                    setcookie ("password",$password,time()+ (86400 * 30), "/");
                }
                echo "<script>window.location.href='/user/home?login=berhasil'</script>";
            }
        }else if(mysql_num_rows($query1) > 0){      
            $row                    = mysql_fetch_array($query1);
            $admin                  = $row['username'];
            if (!empty($admin)){
                $_SESSION['username']       = $admin;
                $_SESSION['admin']          = "admin";
                if(!empty($_POST["ingat"])) {  
                    setcookie ("username",$username,time()+ (86400 * 30), "/");
                    setcookie ("password",$password,time()+ (86400 * 30), "/");
                }
                echo "<script>window.location.href='/adminweb/home?login=berhasil'</script>";
            }
        } else {
            echo "<script>window.location.href='/?login=gagal'</script>";
        }
    }
?>