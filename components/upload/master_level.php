<?php 
    
    error_reporting(E_ALL ^ E_NOTICE);  
    session_start();
    include '../../_database/koneksi.php';
    include '../../assets/phpExcel/import/excel_reader.php';

    if(isset($_POST['level'])){
        if ($_FILES['level']['name'] != 'level.xls') {?>
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
         
        $target     = basename($_FILES['level']['name']) ;
        move_uploaded_file($_FILES['level']['tmp_name'], $target);
     
        chmod($_FILES['level']['name'],0777);
        
        $data       = new Spreadsheet_Excel_Reader($_FILES['level']['name'],false);
        
        $baris      = $data->rowcount($sheet_index=0);
        $drop       = isset( $_POST["drop"] ) ? $_POST["drop"] : 0 ;
        if($drop == 1){

        $truncate   =   "DELETE FROM m_tingkat";
            mysql_query($truncate);
        };

        for ($i=4; $i<=$baris; $i++){
            
        $id         = acak();
            

        $kode_level = $data->val($i, 1);
        $nama       = $data->val($i, 2);
        $desc       = $data->val($i, 3);        
        $insert     = mysql_query("INSERT INTO m_tingkat VALUES
                    ('$kode_level', '$nama', '$desc','$id') ") or die(mysql_error());
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
        
        unlink($_FILES['level']['name']);
    }else{
        echo "<script>window.history.back();</script>";
    }
 
?>