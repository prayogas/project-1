<?php 
//  http://buffernow.com/backup-and-restore-class-mysql-database-using-php-script/
function import_tables($host,$user,$pass,$dbname,$sql_file,  $clear_or_not=false )
{

// Connect to MySQL server
    //$link = mysqli_connect($host,$user,$pass,$name);
    //mysqli_select_db($link,$mysqli);
$mysqli = new mysqli($host, $user, $pass, $dbname);
// Check connection
if (mysqli_connect_errno())   {   echo "Failed to connect to MySQL: " . mysqli_connect_error();   }

if($clear_or_not) 
{
    $zzzzzz = $mysqli->query('SET foreign_key_checks = 0');
    if ($result = $mysqli->query("SHOW TABLES"))
    {
        while($row = $result->fetch_array(MYSQLI_NUM))
        {
            $mysqli->query('DROP TABLE IF EXISTS '.$row[0]);
        }
    }
    $zzzzzz = $mysqli->query('SET foreign_key_checks = 1');
}

$mysqli->query("SET NAMES 'utf8'");
// Temporary variable, used to store current query
$templine = '';
// Read in entire file
$lines = file($sql_file);
// Loop through each line
foreach ($lines as $line)
{
    // Skip it if it's a comment
    if (substr($line, 0, 2) == '--' || $line == '')
        continue;
    // Add this line to the current segment
    $templine .= $line;
    // If it has a semicolon at the end, it's the end of the query
    if (substr(trim($line), -1, 1) == ';')
    {
        // Perform the query
        $mysqli->query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . $mysqli->error . '<br /><br />');
        // Reset temp variable to empty
        $templine = '';
    }
}
 // echo 'Tables imported successfully. <button onclick="window.history.back();">Go Back</button>';
}

/** config. php **/
$host ="localhost";
$user = "root";
$pass ="";
$db ="db_toko";
/****************/

if(isset($_REQUEST['backup'])){
    require_once('backup_restore.class.php');
    // $newExport = new backup_restore($db_host,$db_name,$db_user,$db_pass);
    
    // $fileName = $db_name . "_" . date("Y-m-d") . ".sql";    
    // header("Content-disposition: attachment; filename=".$fileName);
    // header("Content-Type: application/force-download");
    // //header("Content-Transfer-Encoding: application/zip;\n");
    // header("Pragma: no-cache");
    // header("Cache-Control: must-revalidate, post-check=0, pre-check=0, public");
    // header("Expires: 0");

    // //call of backup function
    // echo $newExport -> backup(); die();
    
}

if(isset($_REQUEST['restore'])){
    if(isset($_FILES['rfile']['error']) && UPLOAD_ERR_OK == $_FILES['rfile']['error'])
    {
        $file =$_FILES['rfile']['tmp_name'];
        // $sql=mysqli_connect($host,$user,$pass,$db);
        // echo $file;
        // $file="INSERT INTO anggota (`nis`,`password`,`nama`,`tempat`,`lahir`,`kelas`,`alamat`,`hp`,`foto`,`input`,`output`,`count`,`onn`,`jam`,`pesan1`,`time1`,`id_pesan`,`aktif`) VALUES (\"109130640336\",\"$2y$10$.AFyU0ZbjKF17SSqj6La6Om/wtUIx/iMv2inOiQO1zWkSXz5f6Ily\",\"Syaban\",\"Depok Baru\",\"22/03/1990\",\"XII.2\",\"Jl.Margonda Raya Gg.Irigasi RT.02/13 No.39 Kel.Kemirimuka Kec.Beji Kota Depok 16423\",\"082298666475\",\"user.png\",\"Senin, 2 October 2017\",\"Senin, 2 October 2020\",\"0\",\"terakhir aktif pada\",\"2017-10-02 20:28:29\",\"samasama\",\"2017-10-02 21:29:40\",\"0\",\"2017-10-02 20:19:21\");";
        import_tables($host,$user,$pass,$db,$file,  false );
        // header(string)
    }
}


?>
    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sya'BaNdz :: Doc's</title>
    <link rel="icon"       type="image/x-icon" href="bootstrap/images/sya.png" >
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/animate.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-material-datetimepicker.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/themes/all-themes.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-select.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-table.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/font-awesome.min.css">
</head>
<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a href="template.php?pages=home" class="navbar-brand" style=" font-family: Niconne; font-size: 23px"><b>SyaBaNdz.BlogSpot.cOm</b></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><br>
                    <script type="text/javascript">
                    // 1 detik = 1000
                    window.setTimeout("waktu()",1000);  
                    function waktu() {   
                    var tanggal = new Date();  
                    setTimeout("waktu()",1000);  
                    document.getElementById("output").innerHTML = tanggal.getHours()+":"+tanggal.getMinutes()+":"+tanggal.getSeconds();
                    }
                    </script>
                    
                    <div style="color: white">
                    <?php
                    $array_hr= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
                    $hr = $array_hr[date('N')];
                    $tgl= date('j');
                    $array_bln = array(1=>"Januari","Februari","Maret", "April", "Mei","Juni","Juli","Agustus","September","Oktober", "November","Desember");
                    $bln = $array_bln[date('n')];
                    $thn = date('Y');
                    echo $hr . ", " . $tgl . " " . $bln . " " . $thn . " ";
                    ?>
                    </div>
                    <div id="output" class="jam" style="color: white" ></div>
                </li>
                <li class="pull-right">
                    <a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <!-- Right Sidebar -->
<aside id="rightsidebar" class="right-sidebar">
    <ul class="nav nav-tabs tab-nav-right" role="tablist">
        <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
    </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                <ul class="demo-choose-skin">
                    <li data-theme="red" class="active">
                        <div class="red"></div>
                        <span>Red</span>
                    </li>
                    <li data-theme="pink">
                        <div class="pink"></div>
                        <span>Pink</span>
                    </li>
                    <li data-theme="purple">
                        <div class="purple"></div>
                        <span>Purple</span>
                    </li>
                    <li data-theme="deep-purple">
                        <div class="deep-purple"></div>
                        <span>Deep Purple</span>
                    </li>
                    <li data-theme="indigo">
                        <div class="indigo"></div>
                        <span>Indigo</span>
                    </li>
                    <li data-theme="blue">
                        <div class="blue"></div>
                        <span>Blue</span>
                    </li>
                    <li data-theme="light-blue">
                        <div class="light-blue"></div>
                        <span>Light Blue</span>
                    </li>
                    <li data-theme="cyan">
                        <div class="cyan"></div>
                        <span>Cyan</span>
                    </li>
                    <li data-theme="teal">
                        <div class="teal"></div>
                        <span>Teal</span>
                    </li>
                    <li data-theme="green">
                        <div class="green"></div>
                        <span>Green</span>
                    </li>
                    <li data-theme="light-green">
                        <div class="light-green"></div>
                        <span>Light Green</span>
                    </li>
                    <li data-theme="lime">
                        <div class="lime"></div>
                        <span>Lime</span>
                    </li>
                    <li data-theme="yellow">
                        <div class="yellow"></div>
                        <span>Yellow</span>
                    </li>
                    <li data-theme="amber">
                        <div class="amber"></div>
                        <span>Amber</span>
                    </li>
                    <li data-theme="orange">
                        <div class="orange"></div>
                        <span>Orange</span>
                    </li>
                    <li data-theme="deep-orange">
                        <div class="deep-orange"></div>
                        <span>Deep Orange</span>
                    </li>
                    <li data-theme="brown">
                        <div class="brown"></div>
                        <span>Brown</span>
                    </li>
                    <li data-theme="grey">
                        <div class="grey"></div>
                        <span>Grey</span>
                    </li>
                    <li data-theme="blue-grey">
                        <div class="blue-grey"></div>
                        <span>Blue Grey</span>
                    </li>
                    <li data-theme="black">
                        <div class="black"></div>
                        <span>Black</span>
                    </li>
                </ul>
            </div>
        </div>
    </aside>
    <!-- #END# Right Sidebar -->
<!-- #Top Bar -->
<section>
    <aside id="leftsidebar" class="sidebar">
        <div class="user-info" align="center">
            <div class="image">
                <a href="https://syaban90.000webhostapp.com" target="_blank" ><img src="images/sya.png" title="Klik Disini Untuk Melihat Portofolio Saya" width="100" height="100" style="border: 2px solid #333333;" alt="User" /></a><div style="color: white; font-family: Niconne;" >MAWARDI SYA'BAN</div>
            </div>
        </div>
        <div class="menu">
            <ul class="list">
                <li class="header" align="center">MENU UTAMA</li>
                <li class="active"></li>
                <li>
                    <a href="template.php?pages=home">
                        <i class="material-icons">home</i>
                        <span>Beranda</span>
                    </a>
                </li>
                <li>
                    <a href="template.php?pages=master">
                        <i class="material-icons">computer</i>
                        <span>Master</span>
                    </a>
                </li>
                <li>
                    <a href="template.php?pages=commerce">
                        <i class="material-icons">phonelink</i>
                        <span>E-Commerce</span>
                    </a>
                </li>
                <li>
                    <a href="template.php?pages=transaksi">
                        <i class="material-icons">shopping_cart</i>
                        <span>Transaksi</span>
                    </a>
                </li>
                <li>
                    <a href="template.php?pages=akuntansi">
                        <i class="material-icons">book</i>
                        <span>Akuntansi</span>
                    </a>
                </li>
                <li>
                    <a href="template.php?pages=laporan">
                        <i class="material-icons">event</i>
                        <span>Laporan</span>
                    </a>
                </li>
                <li>
                    <a href="backup.php">
                        <i class="material-icons">cloud_upload</i>
                        <span>Backup Data</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="legal">
            <div class="copyright">
                Copyright &copy; <?php echo date('Y') ?> <a href="javascript:void(0);" style="font-family: Niconne; font-size: 15px" >Sya'BaNdz :: D<img src="images/sya.png" width="10px" height="10px">c's</a>
            </div>
        </div>
    </aside>
    <!-- #END# Left Sidebar -->
</section>
<section class="content">
    <div class="container-fluid">
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2 style="color: teal; "><marquee behavior="alternate" onmouseover="this.stop();" onmouseout="this.start();"><b>Backup Data Secara Berkala Untuk Menjaga Database Program Dari Pencurian Data</b></h2></marquee>
                    </div>
                    <div class="body">
                        <div align="center">    <form name="import" action="" method="POST" enctype="multipart/form-data">
                           <label>File to Restore from: </label><input type="file" name="rfile" />
                           <p><center><br>
                            <input type="submit"  class="btn btn-primary waves-effect" name="backup" value="Backup">&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="submit" class="btn btn-primary waves-effect" name="restore" value="Restore">
                        </p>
                    </form></center>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Exportable Table -->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <footer class="main-footer" align="center">
            <div class="pull-center hidden-xs">
                &nbsp;&nbsp;Copyright&nbsp;&copy;&nbsp;<?php echo "".date('Y'); ?>&nbsp;<a href="#"><strong>&nbsp;<a href="javascript:void(0);" style="font-family: Niconne; font-size: 15px; color: red;" >Sya'BaNdz :: D<img src="images/sya.png" width="10px" height="10px">c's</a>&nbsp;</a>&nbsp;<b>Version&nbsp;</b>&nbsp;2.4.0.</strong>
            </div>
        </footer>
    </div>
</div>
</section>

    <script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap-table.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap-select.js"></script>
    <script type="text/javascript" src="bootstrap/js/jquery.slimscroll.js"></script>
    <script type="text/javascript" src="bootstrap/js/waves.js"></script>
    <script type="text/javascript" src="bootstrap/js/admin.js"></script>
    <script type="text/javascript" src="bootstrap/js/demo.js"></script>
    <script type="text/javascript" src="bootstrap/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="bootstrap/js/autosize.js"></script>
    <script type="text/javascript" src="bootstrap/js/moment.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap-material-datetimepicker.js"></script>
    <script type="text/javascript" src="bootstrap/js/basic-form-elements.js"></script>
    <script type="text/javascript" src="bootstrap/js/chart.js"></script>
</body>
</html>