<div class="card" style="margin: 15px">
    <div class="card-header bg-flat-color-5">
        <h3 class="text-white"><strong>Download Data</strong></h3>
    </div>
    <div class="card-body">
        <div class="col-md-6 col-lg-6">
            <div class="card bg-flat-color-5 text-light">
                <div class="card-body">
                    <div class="h4 m-0" style="border-left: 5px solid white;">&nbspEmployee Master</div>
                    <?php
                        $master = mysql_query("SELECT * FROM master")or die(mysql_error());
                    ?>
                        <br>
                        <div><b class="count"><?= mysql_num_rows($master) ?></b> Employee</div>
                        <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                        <small class="text-light">
                        <?php 
                        if (mysql_num_rows($master) > 0) {?>
                            <a href="../../../components/download/master.php" download style="color: white;">
                                <label class="btn btn-primary btn-sm">
                                Download
                                </label>
                            </a>
                        <?php }?>
                        
                    </small>
                </div>
            </div>
        </div>
        <!--/.col-->
        <div class="col-md-6 col-lg-6">
            <div class="card bg-flat-color-4 text-light">
                <div class="card-body">
                    <div class="h4 m-0" style="border-left: 5px solid white;">&nbspMaster Point (/year)</div>
                    <?php
                        $point = mysql_query("SELECT * FROM m_penilaian")or die(mysql_error());
                    ?>
                        <br>
                        <div><b class="count"><?= mysql_num_rows($point) ?></b> Data Point</div>
                        <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                        <small class="text-light">
                        <?php 
                        if (mysql_num_rows($point) > 0) {?>
                            <a href="../../../components/download/master_point.php" download style="color: white;">
                                <label class="btn btn-primary btn-sm">
                                Download
                                </label>
                            </a>
                        <?php }?>
                    </small>
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
    <hr>
    <div class="card-body">
        <div class="col-md-6 col-lg-3">
            <div class="card bg-flat-color-3 text-light">
                <div class="card-body">
                    <div class="h4 m-0" style="border-left: 5px solid white;">&nbspMaster Area</div>
                    <?php
                        $area = mysql_query("SELECT * FROM m_area")or die(mysql_error());
                    ?>
                        <br>
                        <div><b class="count"><?= mysql_num_rows($area) ?></b> Area</div>
                        <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                        <small class="text-light">
                        <?php 
                        if (mysql_num_rows($area) > 0) {?>
                            <a href="../../../components/download/master_area.php" download style="color: white;">
                                <label class="btn btn-primary btn-sm">
                                Download
                                </label>
                            </a>
                        <?php }?>
                            
                    </small>
                </div>
            </div>
        </div>
        <!--/.col-->
        <div class="col-md-6 col-lg-3">
            <div class="card bg-flat-color-2 text-light">
                <div class="card-body">
                    <div class="h4 m-0" style="border-left: 5px solid white;">&nbspMaster Group</div>
                    <?php
                        $grup = mysql_query("SELECT * FROM m_grup")or die(mysql_error());
                    ?>
                        <br>
                        <div><b class="count"><?= mysql_num_rows($grup) ?></b> Group</div>
                        <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                        <small class="text-light">
                        <?php 
                        if (mysql_num_rows($grup) > 0) {?>
                            <a href="../../../components/download/master_group.php" download style="color: white;">
                                <label class="btn btn-primary btn-sm">
                                Download
                                </label>
                            </a>
                        <?php }?>
                        
                    </small>
                </div>
            </div>
        </div>
        <!--/.col-->
        <div class="col-md-6 col-lg-3">
            <div class="card bg-flat-color-1 text-light">
                <div class="card-body">
                    <div class="h4 m-0" style="border-left: 5px solid white;">&nbspMaster Jobs</div>
                    <?php
                        $kerja = mysql_query("SELECT * FROM m_pekerjaan")or die(mysql_error());
                    ?>
                        <br>
                        <div><b class="count"><?= mysql_num_rows($kerja) ?></b> Jobs</div>
                        <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                        <small class="text-light">
                        <?php 
                        if (mysql_num_rows($kerja) > 0) {?>
                            <a href="../../../components/download/master_job.php" download style="color: white;">
                                <label class="btn btn-primary btn-sm">
                                Download
                                </label>
                            </a>
                        <?php }?>
                            
                    </small>
                </div>
            </div>
        </div>
        <!--/.col-->
        <div class="col-md-6 col-lg-3">
            <div class="card bg-flat-color-5 text-light">
                <div class="card-body">
                    <div class="h4 m-0" style="border-left: 5px solid white;">&nbspMaster Company</div>
                    <?php
                        $kantor = mysql_query("SELECT * FROM m_perusahaan")or die(mysql_error());
                    ?>
                        <br>
                        <div><b class="count"><?= mysql_num_rows($kantor) ?></b> Company</div>
                        <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                        <small class="text-light">
                        <?php 
                        if (mysql_num_rows($kantor) > 0) {?>
                            <a href="../../../components/download/master_company.php" download style="color: white;">
                                <label class="btn btn-primary btn-sm">
                                Download
                                </label>
                            </a>
                        <?php }?>
                            
                    </small>
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
    <div class="card-body">
        <div class="col-md-6 col-lg-3">
            <div class="card bg-flat-color-4 text-light">
                <div class="card-body">
                    <div class="h4 m-0" style="border-left: 5px solid white;">&nbspMaster Position</div>
                    <?php
                        $posisi = mysql_query("SELECT * FROM m_posisi")or die(mysql_error());
                    ?>
                        <br>
                        <div><b class="count"><?= mysql_num_rows($posisi) ?></b> Position</div>
                        <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                        <small class="text-light">
                        <?php 
                        if (mysql_num_rows($posisi) > 0) {?>
                            <a href="../../../components/download/master_position.php" download style="color: white;">
                                <label class="btn btn-primary btn-sm">
                                Download
                                </label>
                            </a>
                        <?php }?>
                        
                    </small>
                </div>
            </div>
        </div>
        <!--/.col-->
        <div class="col-md-6 col-lg-3">
            <div class="card bg-flat-color-3 text-light">
                <div class="card-body">
                    <div class="h4 m-0" style="border-left: 5px solid white;">&nbspMaster Program</div>
                    <?php
                        $program = mysql_query("SELECT * FROM m_program")or die(mysql_error());
                    ?>
                        <br>
                        <div><b class="count"><?= mysql_num_rows($program) ?></b> Program</div>
                        <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                        <small class="text-light">
                        <?php 
                        if (mysql_num_rows($program) > 0) {?>
                            <a href="../../../components/download/master_program.php" download style="color: white;">
                                <label class="btn btn-primary btn-sm">
                                Download
                                </label>
                            </a>
                        <?php }?>
                            
                    </small>
                </div>
            </div>
        </div>
        <!--/.col-->
        <div class="col-md-6 col-lg-3">
            <div class="card bg-flat-color-2 text-light">
                <div class="card-body">
                    <div class="h4 m-0" style="border-left: 5px solid white;">&nbspMaster Level</div>
                    <?php
                        $lvl = mysql_query("SELECT * FROM m_tingkat")or die(mysql_error());
                    ?>
                        <br>
                        <div><b class="count"><?= mysql_num_rows($lvl) ?></b> Level</div>
                        <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                        <small class="text-light">
                        <?php 
                        if (mysql_num_rows($lvl) > 0) {?>
                            <a href="../../../components/download/master_level.php" download style="color: white;">
                                <label class="btn btn-primary btn-sm">
                                Download
                                </label>
                            </a>
                        <?php }?>
                            
                    </small>
                </div>
            </div>
        </div>
        <!--/.col-->
        <div class="col-md-6 col-lg-3">
            <div class="card bg-flat-color-1 text-light">
                <div class="card-body">
                    <div class="h4 m-0" style="border-left: 5px solid white;">&nbspMaster Unit</div>
                    <?php
                        $un = mysql_query("SELECT * FROM m_unit")or die(mysql_error());
                    ?>
                        <br>
                        <div><b class="count"><?= mysql_num_rows($un) ?></b> Unit</div>
                        <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                        <small class="text-light">
                        <?php 
                        if (mysql_num_rows($un) > 0) {?>
                            <a href="../../../components/download/master_unit.php" download style="color: white;">
                                <label class="btn btn-primary btn-sm">
                                Download
                                </label>
                            </a>
                        <?php }?>
                        
                    </small>
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
</div>