<?php
session_start();
    require '../../../_database/koneksi.php';
    if(!$_SESSION['admin']){
        echo "<script>window.history.back();</script>";
    }
?>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <div class="navbar-brand" href="home" style="padding: 20px"><img src="../assets/images/logo.png" alt="Logo"></div>
                <div class="navbar-brand hidden" href="home"><img src="../assets/images/logo2.png" alt="Logo"></div>
            </div>
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="home">
                            <i class="menu-icon fa fa-dashboard"></i>Dashboard
                        </a>
                    </li>
                    <h3 class="menu-title">Master</h3>
                    <!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown open show" >
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="true" id="form-master" > <i class="menu-icon fa fa-laptop"></i>Form</a>
                        <?php 
                        $q = mysql_fetch_array(mysql_query("SELECT status from m_navigasi_parent where id_parent = '1'"));
                        if ($q['status'] == 0) {?>
                            <ul class="sub-menu children dropdown-menu" id="menu-atas">
                        <?php }else{?>
                            <ul class="sub-menu children dropdown-menu show" id="menu-atas">
                        <?php }?>
                        
                            <?php                
                            $q = mysql_query("SELECT * FROM m_navigasi WHERE id_parent = 1");
                            while ($d = mysql_fetch_array($q)) {?>
                            <li><i class="<?= $d['class']?>"></i>
                                <a href="<?= $d['master']?>">
                                    <?= $d['nama_navigasi']?>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <h3 class="menu-title">Training</h3>
                    <!-- /.menu-title -->
                    <?php                
                        $q = mysql_query("SELECT * FROM m_navigasi WHERE id_parent = 2");
                        while ($d = mysql_fetch_array($q)) {?>
                    <li><a href="<?= $d['master']?>">
                            <i class="menu-icon <?= $d['class']?>"></i>
                                <?= $d['nama_navigasi']?>
                            </a>
                    </li>
                    <?php } ?>
                    <h3 class="menu-title">Extras</h3>
                    <!-- /.menu-title -->
                    <?php                
                        $q = mysql_query("SELECT * FROM m_navigasi WHERE id_parent = 3");
                        while ($d = mysql_fetch_array($q)) {?>
                    <li><a href="<?= $d['master']?>">
                            <i class="menu-icon <?= $d['class']?>"></i>
                                <?= $d['nama_navigasi']?>
                            </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Left Panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="header-menu">
                <div class="col-sm-7"><a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-angle-down float-right" style="margin: 10px"></i>
                            <p class="float-left" style="margin: 8px;">Hello, <?php echo $_SESSION['admin'] ?>!</p>
                            <img class="user-avatar rounded-circle float-right" src="../assets/images/avatar/user.png" alt="User Avatar">
                        </a>
                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="../controllers/config/p_logout.php"><i class="fa fa-sign-out"></i>Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- /header -->
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title" style="cursor: pointer;">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right" style="cursor: pointer;">
                            <?php 
                                if(isset($_GET['page'])){

                                    $page      = $_GET['page']; 
                                    $query1    = mysql_query("SELECT nama_navigasi FROM m_navigasi WHERE master = '$page'");
                                     
                                    while ($p  = mysql_fetch_array($query1)) {?>
                                        <li class="active">
                                            <font color="grey">Dashboard /</font>
                                            <?= $p['nama_navigasi'] ?>
                                        </li>
                                        <?php 
                                    }
                                }
                            ?>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <main>
<script src="../assets/js/ext/jquery-3.2.1.slim.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#form-master").click(function(){

            if ($("#menu-atas").attr( 'class') === 'sub-menu children dropdown-menu') {
                var status = 1;
                jQuery.ajax({
                    type: 'POST',
                    url: '../admin/controllers/config/p_status_navigasi.php',
                    data: 'status=' + status,
                    success: function(data) {
                    }
                });
            } else if ($("#menu-atas").attr( 'class') === 'sub-menu children dropdown-menu show'){
                var status = 0;
                jQuery.ajax({
                    type: 'POST',
                    url: '../admin/controllers/config/p_status_navigasi.php',
                    data: 'status=' + status,
                    success: function(data) {
                    }
                });
            }
        });
    });
</script>