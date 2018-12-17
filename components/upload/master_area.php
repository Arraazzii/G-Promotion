<?php 
    
    error_reporting(E_ALL ^ E_NOTICE);  
    session_start();
    include '../../_database/koneksi.php';
    include '../../assets/phpExcel/import/excel_reader.php';

    if(isset($_POST['area'])){
        if ($_FILES['area']['name'] != 'area.xls') {?>
            <script>alert('Different File! \nPlease use template file'); window.history.back();</script>
            <?php return false;
        }
        function acak(){
            $gpass  = NULL;
            $n    = 11; 
            $chr  = "0123456789";
            for($i=0;$i<=$n;$i++){
              $rIdx = rand(1,strlen($chr));
              $gpass .=substr($chr,$rIdx,1);
            }
            return $gpass;
        };
         
        $target     = basename($_FILES['area']['name']) ;
        move_uploaded_file($_FILES['area']['tmp_name'], $target);
     
        chmod($_FILES['area']['name'],0777);
        
        $data       = new Spreadsheet_Excel_Reader($_FILES['area']['name'],false);
        
        $baris      = $data->rowcount($sheet_index=0);
        $drop       = isset( $_POST["drop"] ) ? $_POST["drop"] : 0 ;
        if($drop == 1){

            $truncate ="DELETE FROM m_area";
            mysql_query($truncate);
        };
        
        for ($i=3; $i<=$baris; $i++){
            
            $id             = acak(); 

            //kode alamat
            $query          = "SELECT max(kode_alamat) as maxKode FROM alamat";
            $hasil          = mysql_query($query) or die(mysql_error());
            $data1           = mysql_fetch_array($hasil);
            $kodeAlamat     = $data1['maxKode'];

            $noUrut         = (int) substr($kodeAlamat, 5, 5);

            $noUrut++;
            $char           = "ALM";
            $newID          = $char . sprintf("%05s", $noUrut); 
            //end kode alamat
            
            $kode_area      = $data->val($i, 1);
            $desc           = $data->val($i, 2);
            $alamat         = $data->val($i, 3);
            $no_rumah       = $data->val($i, 4);
            $rt             = $data->val($i, 5);
            $rw             = $data->val($i, 6);
            $kelurahan      = $data->val($i, 7);
            $kecamatan      = $data->val($i, 8);
            $kota           = $data->val($i, 9);
            $kode_pos       = $data->val($i, 10);
            
            $insAlamat  = mysql_query("INSERT INTO alamat VALUES 
                        ('$newID','$alamat','$no_rumah','$rt','$rw','$kelurahan','$kecamatan','$kota','$kode_pos')
                        ")or die(mysql_error());
            if ($insAlamat == 'true') {
                $area   = mysql_query("INSERT INTO m_area VALUES 
                        ('$kode_area','$desc','$newID','$id');
                        ") or die(mysql_error());
                
            }
        }
        
        if ($area) {
            if (isset($_SESSION['admin'])) {
                echo "<script>alert('Success!');window.location.href='/adminweb/upload?input=berhasil'</script>";
            }else{
                echo "<script>alert('Success, User!');window.location.href='/user/upload?input=berhasil'</script>";
            }
        }else{
            echo "<script>alert('File is empty!'); window.history.back();</script>";
        }
        
        unlink($_FILES['area']['name']);
    }else{
        echo "<script>window.history.back();</script>";
    }
 
?>