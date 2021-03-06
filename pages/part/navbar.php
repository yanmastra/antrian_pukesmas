
        <nav class='navbar navbar-default navbar-static-top' role='navigation' style='margin-bottom: 0'>
            <div class='navbar-header'>
                <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-collapse'>
                    <span class='sr-only'>Toggle navigation</span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                </button>
                <a class='navbar-brand' href='../pages/'>%Puskesmas%</a>
            </div>
            <!-- /.navbar-header -->
            <ul class='nav navbar-top-links navbar-right' style='margin-right: 20px'>
                <!-- /.dropdown -->
                <li class='dropdown'>
                    <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
                        <i class='fa fa-users fa-lg'></i> <i class='fa fa-caret-down'></i>
                    </a>
                <?php 
                if(isLoged()){
                    $db = getConnection();
                    $ss = $db->query("SELECT * FROM antrian_aktif WHERE Status = 'tidak datang' AND 'Tanggal Masuk' >= '".date('Y-m-d')."'");
                    if($ss->rowCount()>0){
                        echo "
                    <ul class='dropdown-menu' style='width: 250px; max-height:400px; overflow: auto'>";
                        while ($res = $ss->fetch(PDO::FETCH_ASSOC)) {
                            echo "
                        <li>
                            <div style='margin:0 12px'>
                            <div>
                                <strong>".$res['Nama Lengkap']."</strong>
                                <span class='pull-right text-muted'>
                                    <em>".substr(strval($res['Tanggal Masuk']),11)."</em>
                                </span>
                            </div>
                            
                            <div>".$res['Keluhan']."</div>
                            <a href='../process/tangani.php?id=".$res['Nomor Antrian']."&status=sudah_datang' class='text-center'>
                                <span class='pull-right link'>Sudah datang?</span>
                            </a>
                            </div>
                        </li>
                        <li class='divider'></li>";
                        }
                        echo 
                    "</ul>";
                    }else{
                        echo "
                    <ul class='dropdown-menu' style='width: 250px;'>
                        <li>
                            <a class='text-center' href='#'>
                                <strong><em>Tidak ada</em></strong>
                            </a>
                        </li>
                    </ul>";
                    }
                }?>

                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <!-- menu navigaasi -->
            <div class='navbar-default sidebar' role='navigation'>
                <div class='sidebar-nav navbar-collapse collapse' aria-expanded='false'>

                    <!-- sidebar -->
                    <ul class='nav' id='side-menu'>
                            
                            <!-- input-group -->
                            <!--form method='get' action='search.php'>
                                <div class='input-group custom-search-form'>
                                    <input type='text' class='form-control' placeholder='Search...'>
                                    <span class='input-group-btn'>
                                        <button class='btn btn-default' type='submit'>
                                            <i class='fa fa-search'></i>
                                        </button>
                                    </span>
                                </div>
                            </form-->
                            <!-- /input-group -->
                        <?php 
                        if(isLoged()){
                            $getUser= getConnection();
                            $ss = $getUser->query("SELECT * FROM dt_pegawai WHERE username = '".$_COOKIE['username']."'");
                            $resUser = $ss->fetch(PDO::FETCH_OBJ);
                            $ss = null;
                            $getUser = null;
                            echo "
                        <li class='sidebar-search'>
                            <div class='text-center'>
                                <span class='fa fa-user fa-3x'> </span>
                                <br>
                                <h4>".$resUser->nama_lengkap."</h4>
                                <div class='input-group text-center' style='width: 100%'>
                                    <a href='#' class='btn btn-outline btn-primary btn-xs' type='button'>
                                        <i class='fa fa-gear fa-fw'> </i>
                                        Setting
                                    </a>
                                    <a href='../process/logout.php?key=".md5('pesu')."&from=pegawai' class='btn btn-outline btn-success btn-xs'>
                                        <i class='fa fa-sign-out fa-fw'></i>
                                        Logout
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href='../pages/'><i class='fa fa-dashboard fa-fw'></i> Dashboard</a>
                        </li>
                        <li>
                            <a href='?page=tanganiantri'><i class='fa fa-users fa-fw'></i> Tangani Antrian</a>
                        </li>
                        <li>
                            <a href='?page=riwayat'><i class='fa fa-history fa-fw'></i> Lihat Riwayat Antrian</a>
                        </li>
                        <li>
                            <a href='#' data-toggle='modal' data-target='#modal-add-antrian'><i class='fa fa-plus fa-fw'></i> Tambahkan Antrian</a>
                        </li>";
                        }else{
                            echo "
                        <li>
                            <a href='#' data-toggle='modal' data-target='#modal-login'>
                                <i class='fa fa-sign-in fa-fw'></i> 
                                Login
                            </a>
                        </li>";
                        }
                        ?>
                    </ul>
                    <!-- /sidebar -->
                    
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>