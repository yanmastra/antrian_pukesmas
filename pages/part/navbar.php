
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
                    $ss = $db->query("SELECT * FROM antrian_tidak_datang WHERE tanggal_masuk LIKE '%".date('Y-m-d')."%'");
                    if($ss->rowCount()>0){
                        echo "
                    <ul class='dropdown-menu' style='width: 250px; max-height:400px; overflow: auto'>";
                        while ($res = $ss->fetch(PDO::FETCH_OBJ)) {
                            echo "
                        <li>
                            <div style='margin:0 12px'>
                            <div>
                                <strong>".$res->nama_lengkap."</strong>
                                <span class='pull-right text-muted'>
                                    <em>".substr(strval($res->tanggal_masuk),11)."</em>
                                </span>
                            </div>
                            <div>".$res->keluhan."</div>
                            <a href='?id_antrian=".$res->id_antrian."' class='text-center'>
                                <span class='pull-right link'>Sudah datang?</strong>
                            </a>
                            </div>
                        </li>
                        <li class='divider'></li>";
                        }
                    }else{
                        echo "
                    <ul class='dropdown-menu' style='width: 250px;'>
                        <li>
                            <a class='text-center' href='#'>
                                <strong><em>Tidak ada<em></strong>
                            </a>
                        </li>
                    </ul>";
                    }
                    echo "
                    </ul>
                    <!-- /.dropdown-messages -->";
                }else{
                    echo "";
                }
                ?>
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
                            echo "
                        <li class='sidebar-search'>
                            <div class='text-center'>
                                <span class='fa fa-user fa-3x'> </span>
                                <br>
                                <h4>".$_COOKIE['username']."</h4>
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
                            <a href='antrian.php'><i class='fa fa-users fa-fw'></i> Tangani Antrian</a>
                        </li>
                        <li>
                            <a href='lihat_antrian.php'><i class='fa fa-history fa-fw'></i> Lihat Riwayat Antrian</a>
                        </li>
                        <li>
                            <a href='tambah_antrian.php'><i class='fa fa-plus fa-fw'></i> Tambahkan Antrian</a>
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