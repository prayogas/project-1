<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a href="template.php?pages=home" class="navbar-brand" style=" font-family: Niconne; font-size: 23px"><b>Sistem Penjualan Koperasi</b></a>
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
                <li class="active">
                    <a href="template.php?pages=home">
                        <i class="material-icons">home</i>
                        <span>Beranda</span>
                    </a>
                </li>
                <li class="active">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">computer</i>
                        <span>Master</span>
                    </a>
                     <ul class="ml-menu">
                            <li class="active">
                                <a href="template.php?pages=login">Data Admin</a>
                            </li>
                            <li class="active">
                                <a href="template.php?pages=member">Data Anggota</a>
                            </li>
                            <li class="active">
                                <a href="template.php?pages=barang">Data Barang </a>
                            </li>
                        </ul>
                </li> 
                <li class="active">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">computer</i>
                        <span>Transaksi</span>
                    </a>
                     <ul class="ml-menu">
                            <li class="active">
                                <a href="template.php?pages=pembelian">Pembelian</a>
                            </li>
                            <li class="active">
                                <a href="template.php?pages=penjualan">Penjualan</a>
                            </li>
                        </ul>
                </li> 
                <li class="active">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">computer</i>
                        <span>Laporan</span>
                    </a>
                     <ul class="ml-menu">
                            <li class="active">
                                <a href="template.php?pages=laporan_member">Laporan Anggota</a>
                            </li>
                            <li class="active">
                                <a href="template.php?pages=laporan_barang">Laporan Barang</a>
                            </li>
                            <li class="active">
                                <a href="template.php?pages=laporan_pembelian">Laporan Pembelian </a>
                            </li>
                            <li class="active">
                                <a href="template.php?pages=laporan_penjualan">Laporan Penjualan </a>
                            </li>
                        </ul>
                </li>
                <li class="active">
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
</section>
<?php
include "content.php";
?>