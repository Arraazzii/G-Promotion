<div class="card" style="margin: 15px">
    <div class="card-header bg-flat-color-5">
        <h3 class="text-white"><strong>DATA EMPLOYEE PROMOTION</strong></h3>
    </div>
    <div class="card-body">
        <table id="bootstrap-data-table-employee-promotion" class="table table-striped table-bordered table-hover table-responsive{-sm|-md|-lg|-xl}" style="width:100%">
            <thead>
                <tr>
                    <th>NIK</th>
                    <th>Name</th>
                    <th>Enterprise Begin</th>
                    <th>Amount Point</th>
                    <th>Annotation</th>
                    <th>
                        <?php 
                            if (!isset($_POST['promote'])) {?>
                                <form action="" method="post">
                                    <input type="hidden" name="promote">
                                    <input style="display: none" type="checkbox" name="check" checked>
                                    <input type="date" name="promote" required="">
                                    <button type="submit" class="btn btn-primary btn-sm" name="btn" style="float: right;"><i class="fa fa-download"></i>Generate</button>
                                </form>
                            <?php }else{?>
                                <button type="button" onclick="window.history.back();" class="btn btn-primary btn-sm" name="promote" style="float: left;"><i class="fa fa-arrow-left"></i> Back</button>
                        <?php }?>
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php 
                if (!isset($_POST['promote'])) {?>
                    
                <?php }else{

                    $u = mysql_query("SELECT * FROM employee_penilaian JOIN mt_employee ON employee_penilaian.nik = mt_employee.nik JOIN master ON master.nik = employee_penilaian.nik  GROUP BY employee_penilaian.nik ");
                    while ($du = mysql_fetch_array($u)) {?>
                    <tr>
                        <td>
                            <?= $du['nik'] ?>
                        </td>
                        <td>
                            <?= $du['nama_depan']." ".$du['nama_belakang'] ?> 
                        </td>
                        <td>
                            <?= $du['enterprise_begin'] ?>
                        </td>
                        <td>
                            <?php
                                $nik = $du['nik'];
                                $tgl = $_POST['promote'];
                                $amount = mysql_query("SELECT *,SUM(nilai) as total,timestampdiff(YEAR,enterprise_begin,'$tgl') as jarak 
                                    FROM employee_penilaian 
                                    JOIN master ON master.nik = employee_penilaian.nik 
                                    WHERE employee_penilaian.nik = '$nik' 
                                        AND status <> 1 
                                    ORDER BY total ASC ") or die(mysql_error());
                                $t = mysql_fetch_array($amount);
                                $begin = $t['jarak'];

                                if (is_null($t['total'])) {
                                    echo "0";
                                }else{
                                    echo $t['total'];
                                }
                                
                                
                             ?>
                        </td>
                        <td>
                            <?php 
                                if ($begin >= 2 AND $t['total'] >= 100) {?>
                                    <p style="color: green">Layak Promosi</p>
                                <?php }else{?>
                                    <p>Belum Layak Promosi</p>
                                <?php }
                            ?>
                        </td>
                        <td>
                            <form action="" method="post">
                                <input style="display: none" type="checkbox" name="check" checked>
                                <input type="hidden" name="id" value="<?= $du['nik'] ?>">
                                <?php 
                                    if ($begin >= 2 AND $t['total'] >= 100) {?>
                                        <button type="button" class="btn btn-outline-success" onclick="promote(<?= $du['nik'] ?>)"><i class="fa fa-eye">Promote</i></button>
                                    <?php }else{?>
                                        
                                    <?php }
                                ?>
                                <input type="text" name="master" class="master" id="master" value="Employee Promote" hidden>
                                <!-- <input type="text" name="kode" class="kode" id="kode" value="14" hidden> -->
                                <!-- <button type="button" class="btn btn-outline-danger" onclick="hapus(<?= $du['id'] ?>)"><i class="fa fa-eraser">Hapus</i></button> -->
                            </form>
                        </td>
                    </tr>
                    <?php } 
                }
            ?>
            </tbody>
        </table>
    </div>
</div>
