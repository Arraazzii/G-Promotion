<?php 
    
    error_reporting(E_ALL ^ E_NOTICE);  
    session_start();
    include '../../_database/koneksi.php';
    include '../../assets/phpExcel/import/excel_reader.php';

    if(isset($_POST['master'])){
        if ($_FILES['master']['name'] != 'master.xls') {?>
            <script>alert('Different File! \nPlease use template file'); window.history.back();</script>
            <?php return false;
        }
        function acak(){
            $gpass  = NULL;
            $n      = 11; 
            $chr    = "0123456789";
            for($i=0;$i<=$n;$i++){
              $rIdx = rand(1,strlen($chr));
              $gpass .=substr($chr,$rIdx,1);
            }
            return $gpass;
        };
         
        $target     = basename($_FILES['master']['name']) ;
        move_uploaded_file($_FILES['master']['tmp_name'], $target);
     
        chmod($_FILES['master']['name'],0777);
        
        $data       = new Spreadsheet_Excel_Reader($_FILES['master']['name'],false);
        
        $baris      = $data->rowcount($sheet_index=0);
        $drop       = isset( $_POST["drop"] ) ? $_POST["drop"] : 0 ;
        if($drop == 1){

            $truncate ="DELETE FROM mt_employee";
            mysql_query($truncate);
        };
        
        for ($i=4; $i<=$baris; $i++){
            
            $id             = acak(); 

            //kode alamat
            $query          = "SELECT max(kode_alamat) as maxKode FROM alamat";
            $hasil          = mysql_query($query) or die(mysql_error());
            $data1          = mysql_fetch_array($hasil);
            $kodeAlamat     = $data1['maxKode'];

            $noUrut         = (int) substr($kodeAlamat, 5, 5);

            $noUrut++;
            $char           = "ALM";
            $newID          = $char . sprintf("%05s", $noUrut); 
            //end kode alamat

            $nik                = $data->val($i, 1);
            $nama_depan         = $data->val($i, 2);
            $nama_belakang      = $data->val($i, 3);
            $pob                = $data->val($i, 4);
            $dob                = $data->val($i, 5);
            $gender             = $data->val($i, 6);
            $no_telepon         = $data->val($i, 7);
            $email              = $data->val($i, 8);
            $alamat             = $data->val($i, 9);
            $no_rumah           = $data->val($i, 10);
            $rt                 = $data->val($i, 11);
            $rw                 = $data->val($i, 12);
            $kelurahan          = $data->val($i, 13);
            $kecamatan          = $data->val($i, 14);
            $kota               = $data->val($i, 15);
            $kode_pos           = $data->val($i, 16);
            $begin              = $data->val($i, 17);
            $last               = $data->val($i, 18);
            $k_perus            = $data->val($i, 19);
            $k_area             = $data->val($i, 20);
            $k_unit             = $data->val($i, 21);
            $k_grup             = $data->val($i, 22);
            $k_peker            = $data->val($i, 23);
            $k_posisi           = $data->val($i, 24);
            $k_tingkat          = $data->val($i, 25);
            $staff_date         = $data->val($i, 26);
            $insAlamat  = mysql_query("INSERT INTO alamat VALUES 
                        ('$newID','$alamat','$no_rumah','$rt','$rw','$kelurahan','$kecamatan','$kota','$kode_pos')
                        ")or die(mysql_error());
            if ($insAlamat == 'true') {
                $area   = mysql_query("INSERT INTO mt_employee VALUES 
                        ('$nik','$nama_depan','$nama_belakang','$pob','$dob','$gender','$no_telepon','$email','$newID');
                        ") or die(mysql_error());
                if ($area) {
                    $master     = mysql_query("INSERT INTO master VALUES 
                        ('$nik','$begin','$last','$k_perus','$k_area','$k_unit','$k_grup','$k_peker','$k_posisi','$k_tingkat','$staff_date');
                        ") or die(mysql_error());
                }
            }
        }
        
        if ($master) {
            if (isset($_SESSION['admin'])) {
                echo "<script>alert('Success, Admin!');window.location.href='/adminweb/upload?input=berhasil'</script>";
            }else{
                echo "<script>alert('Success, User!');window.location.href='/user/upload?input=berhasil'</script>";
            }
        }else{
            echo "<script>alert('File is empty!'); window.history.back();</script>";
        }
        
        unlink($_FILES['master']['name']);
    }else{
        echo "<script>window.history.back();</script>";
    }
 
?>