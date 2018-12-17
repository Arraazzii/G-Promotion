<?php 
    
    error_reporting(E_ALL ^ E_NOTICE);  
    session_start();
    include '../../_database/koneksi.php';
    include '../../assets/phpExcel/import/excel_reader.php';

    if(isset($_POST['point'])){
        if ($_FILES['point']['name'] != 'point.xls') {?>
            <script>alert('Different File! \nPlease use template file!'); window.history.back();</script>
            <?php return false;
        }
        function acak(){
            $gpass  = NULL;
            $n      = 11; 
            $chr    = "0123456789";
            for($i=0;$i<=$n;$i++){
              $rIdx = rand(1,strlen($chr));
              $gpass.=substr($chr,$rIdx,1);
            }
            return $gpass;
        };
         
        $target     = basename($_FILES['point']['name']) ;
        move_uploaded_file($_FILES['point']['tmp_name'], $target);
     
        chmod($_FILES['point']['name'],0777);
        
        $data       = new Spreadsheet_Excel_Reader($_FILES['point']['name'],false);
        
        $baris      = $data->rowcount($sheet_index=0);
        $drop       = isset( $_POST["drop"] ) ? $_POST["drop"] : 0 ;
        if($drop == 1){

        $truncate   =   "DELETE FROM m_penilaian";
            mysql_query($truncate);
        };
        
        for ($i=4; $i<=$baris; $i++){
            
            $id     = acak(); 

            
            $year   = $data->val($i, 1);
            $a      = $data->val($i, 2);
            $b      = $data->val($i, 3);
            $c      = $data->val($i, 4);
            $d      = $data->val($i, 5);
            $insert = mysql_query("INSERT INTO m_penilaian VALUES
                            (NULL, '$year','$a', '$b', '$c','$d') ") or die(mysql_error());
        }
        
        if ($insert) {
            if (isset($_SESSION['admin'])) {
                echo "<script>alert('Success, Admin!');window.location.href='/adminweb/upload?input=berhasil'</script>";
            }else{
                echo "<script>alert('Success, User!');window.location.href='/user/upload?input=berhasil'</script>";
            }
        }else{
            echo "<script>alert('File is empty!'); window.history.back();</script>";
        }
        
        unlink($_FILES['point']['name']);
    }else{
        echo "<script>window.history.back();</script>";
    }
 
?>