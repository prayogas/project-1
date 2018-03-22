<?php
// 0disable error message level E_NOTICE
error_reporting(E_ALL ^  (E_NOTICE | E_WARNING)) ;
error_reporting(0);
$config = mysqli_connect("localhost","root","","db_toko");
if ($_GET['pages'] == 'home') {
?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">       
                        <div class="alert alert-info">
                            <marquee><b>
                            SELAMAT DATANG DI SISTEM PENJUALAN </b>
                            </marquee>
                        </div>
                    </div>
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="info-box bg-red hover-expand-effect hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">face</i>
                        </div>
                        <div class="content">
                            <div class="text">Members</div>
                            <?php                             
                            $tampil=mysqli_query($config,"SELECT * from member");
                            $data1=mysqli_num_rows($tampil);
                            ?>
                            <div class="number count-to" data-from="0" data-to="<?php echo "$data4"; ?>" data-speed="1000" data-fresh-interval="20"><?php echo "$data1"; ?></div>
                        </div>
                    </div>
                    <div class="info-box bg-orange hover-expand-effect hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">local_bar</i>
                        </div>
                        <div class="content">
                            <div class="text">Stock</div>
                            <?php                             
                            $tampil=mysqli_query($config,"SELECT * from barang WHERE stok ");
                            $data2=mysqli_num_rows($tampil);
                            ?>
                            <div class="number count-to" data-from="0" data-to="<?php echo "$data4"; ?>" data-speed="1000" data-fresh-interval="20"><?php echo "$data2"; ?></div>
                        </div>
                    </div>
                    <div class="info-box bg-cyan hover-expand-effect hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">phonelink</i>
                        </div>
                        <div class="content">
                            <div class="text">Penjualan</div>
                            <?php                             
                            $tampil=mysqli_query($config,"SELECT * from penjualan ");
                            $data4=mysqli_num_rows($tampil);
                            ?>
                            <div class="number count-to" data-from="0" data-to="<?php echo "$data4"; ?>" data-speed="1000" data-fresh-interval="20"><?php echo "$data4"; ?></div>
                        </div>
                    </div>
                    <div class="info-box bg-teal hover-expand-effect hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">shopping_cart</i>
                        </div>
                        <div class="content">
                            <div class="text">Transaksi</div>
                            <?php                             
                            $tampil=mysqli_query($config,"SELECT * from transaksi ");
                            $data3=mysqli_num_rows($tampil);
                            ?>
                            <div class="number count-to" data-from="0" data-to="<?php echo "$data4"; ?>" data-speed="1000" data-fresh-interval="20"><?php echo "$data3"; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><i class="fa fa-bar-chart-o fa-fw"></i> Grafik Transaksi</div>
                        <div class="panel-body">
                            <div class="embed-responsive embed-responsive-16by9">
                              <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}
elseif ($_GET['pages'] == 'login') {
?>
<?php 
mysqli_query($config,"DELETE FROM login WHERE id_login = '$_GET[id]' ");
?>
<section class="content">
    <div class="container-fluid">
         <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                <div class="panel panel-primary">
                <div class="panel-heading">
                <i class="fa fa-desktop fa-fw"></i>&nbsp;&nbsp;Data Admin
                </div><br>&nbsp;&nbsp;&nbsp;&nbsp;
                  <a href="javascript:void(0);" data-toggle="modal" data-target="#admin" class="btn btn-primary"><i class="material-icons">add_circle</i><span>Tambah Admin</span></a>
                  <div class="clearfix"></div>    
                    <div class="panel-body">
                        <table data-toggle="table" data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="true"  data-pagination="true" data-sort-name="name" data-sort-order="asc">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th data-sortable="true">NIK</th>
                                        <th data-sortable="true">Nama</th>
                                        <th data-sortable="true">Foto</th>
                                        <th data-sortable="true">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php                                
                                $sql = "SELECT * FROM login order by nama asc" ;
                                $qry = mysqli_query($config,$sql);  
                                $jml = mysqli_num_rows($qry);
                                $no = 1;
                                while($data = mysqli_fetch_array($qry)){
                                ?>
                                    <tr>
                                        <td><?php echo $no++;?></td>
                                        <td><?php echo $data['user'];?></td>
                                        <td><?php echo $data['nama'];?></td>
                                        <td><img src="bootstrap/images/<?php echo $data['foto'];?>"></td>
                                        <td>
                                        <a type="button" class="btn btn-info btn-circle waves-effect waves-circle waves-float" title="Edit Data" href="template.php?pages=useredit&id_login=<?php echo $data['id'] ;?>"><i class="material-icons">edit</i></a>   
                                        <a type="button" class="btn btn-danger btn-circle waves-effect waves-circle waves-float" onclick="return confirm('Yakin Ingin Hapus ? ')" title="Hapus Data" href="template.php?pages=login&id_login=<?php echo $data['id'] ;?>"><i class="material-icons">delete</i></a>   
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}
elseif ($_GET['pages'] == 'member') {
?>
<?php 
mysqli_query($config,"DELETE FROM member WHERE id_member = '$_GET[id_member]' ");
?>
<section class="content">
    <div class="container-fluid">
         <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                <div class="panel panel-primary">
                <div class="panel-heading">
                <i class="fa fa-desktop fa-fw"></i>&nbsp;&nbsp;Data Anggota
                </div><br>&nbsp;&nbsp;&nbsp;&nbsp;
                  <a href="javascript:void(0);" data-toggle="modal" data-target="#member" class="btn btn-danger"><i class="material-icons">add_circle</i><span>Tambah Anggota</span></a>
                  <div class="clearfix"></div>    
                    <div class="panel-body">
                        <table data-toggle="table" data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="true"  data-pagination="true" data-sort-name="name" data-sort-order="asc">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th data-sortable="true">NIK</th>
                                        <th data-sortable="true">Nama Anggota</th>
                                        <th data-sortable="true">Telepon</th>
                                        <th data-sortable="true">Gambar</th>
                                        <th data-sortable="true">Aksi</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                <?php                                
                                $sql = "SELECT * FROM member order by nm_member asc" ;
                                $qry = mysqli_query($config,$sql);  
                                $jml = mysqli_num_rows($qry);
                                $no = 1;
                                while($data = mysqli_fetch_array($qry)){
                                ?>
                                    <tr>
                                        <td><?php echo $no++;?></td>
                                        <td><?php echo $data['NIK'];?></td>
                                        <td><?php echo $data['nm_member'];?></td>
                                        <td><?php echo $data['telepon'];?></td>
                                         <td><img src="images/<?php echo $data['gambar'];?>" width="50" hight="50" class="img-rounded" style="border: 3px"></td>
                                        <td>
                                        <a type="button" class="btn btn-info btn-circle waves-effect waves-circle waves-float" title="Edit Data" href="template.php?pages=barangedit&id_member=<?php echo $data['id'] ;?>"><i class="material-icons">edit</i></a>   
                                        <a type="button" class="btn btn-danger btn-circle waves-effect waves-circle waves-float" onclick="return confirm('Yakin Ingin Hapus ? ')" title="Hapus Data" href="template.php?pages=member&id_member=<?php echo $data['id_member'] ;?>"><i class="material-icons">delete</i></a>   
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}
elseif ($_GET['pages'] == 'barang') {
?>
<?php 
mysqli_query($config,"DELETE FROM barang WHERE id_barang= '$_GET[id]' ");
?>
<section class="content">
    <div class="container-fluid">
         <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                <div class="panel panel-primary">
                <div class="panel-heading">
                <i class="fa fa-shopping-cart fa-fw"></i>&nbsp;&nbsp;Data Barang
                </div><br>&nbsp;&nbsp;&nbsp;&nbsp;
                  <a href="javascript:void(0);" data-toggle="modal" data-target="#barang" class="btn btn-danger"><i class="material-icons">add_circle</i><span>Tambah Barang</span></a>
                  <div class="clearfix"></div>    
                    <div class="panel-body">
                        <table data-toggle="table" data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="true"  data-pagination="true" data-sort-name="name" data-sort-order="asc">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th data-sortable="true">Nama Barang</th>
                                        <th data-sortable="true">Merk</th>
                                        <th data-sortable="true">Harga Beli</th>
                                        <th data-sortable="true">Harga Jual</th>
                                        <th data-sortable="true">Stok</th>
                                        <th data-sortable="true">Tanggal Input</th>
                                        <th data-sortable="true">Tanggal Update</th>
                                        <th data-sortable="true">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php                                
                                $sql = "SELECT * FROM barang order by nama_barang asc" ;
                                $qry = mysqli_query($config,$sql);  
                                $jml = mysqli_num_rows($qry);
                                $no = 1;
                                while($data = mysqli_fetch_array($qry)){
                                ?>
                                    <tr>
                                        <td><?php echo $no++;?></td>
                                        <td><?php echo $data['nama_barang'];?></td>
                                        <td><?php echo $data['merk'];?></td>
                                        <td>Rp. <?php echo number_format($data['harga_beli']);?></td>
                                        <td>Rp. <?php echo number_format($data['harga_jual']);?></td>
                                        <td><?php echo $data['stok'];?></td>
                                        <td><?php echo $data['tgl_input'];?></td>
                                        <td><?php echo $data['tgl_update'];?></td>
                                        <td>
                                        <a type="button" class="btn btn-info btn-circle waves-effect waves-circle waves-float" title="Edit Data" href="template.php?pages=barangedit&id_barang=<?php echo $data['id'] ;?>"><i class="material-icons">edit</i></a>   
                                        <a type="button" class="btn btn-danger btn-circle waves-effect waves-circle waves-float" onclick="return confirm('Yakin Ingin Hapus ? ')" title="Hapus Data" href="template.php?pages=barang&id_barang=<?php echo $data['id'] ;?>"><i class="material-icons">delete</i></a>   
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}
elseif ($_GET['pages'] == 'pembelian') {
?>
<?php 
mysqli_query($config,"DELETE FROM pembelian WHERE id_pembelian = '$_GET[id]' ");
?>
<section class="content">
    <div class="container-fluid">
         <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                <div class="panel panel-primary">
                <div class="panel-heading">
                <i class="fa fa-shopping-cart fa-fw"></i>&nbsp;&nbsp;Transaksi Pembelian
                </div><br>&nbsp;&nbsp;&nbsp;&nbsp;
                  <a href="javascript:void(0);" data-toggle="modal" data-target="#pembelian" class="btn btn-danger"><i class="material-icons">add_circle</i><span>Tambah Pembelian</span></a>
                  <div class="clearfix"></div>    
                    <div class="panel-body">
                        <table data-toggle="table" data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="true"  data-pagination="true" data-sort-name="name" data-sort-order="asc">
                                <thead>
                                    <tr>
                                        <th>No</th>

                                        <th data-sortable="true">ID Barang</th>
                                        <th data-sortable="true">Nama Admin</th>
                                        <th data-sortable="true">Jumlah</th>
                                        <th data-sortable="true">Total</th>
                                        <th data-sortable="true">Tanggal Input</th>
                                        <th data-sortable="true">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php                                
                                $sql = "SELECT * FROM pembelian order by tanggal_input asc" ;
                                $qry = mysqli_query($config,$sql);  
                                $jml = mysqli_num_rows($qry);
                                $no = 1;
                                while($data = mysqli_fetch_array($qry)){
                                ?>
                                    <tr>
                                        <td><?php echo $no++;?></td>
                                        <td><?php echo $data['id_barang'];?></td>
                                        <td><?php echo $data['NIK'];?></td>
                                        <td><?php echo $data['jumlah'];?></td>
                                        <td><?php echo number_format($data['total']);?></td>
                                        <td><?php echo $data['tanggal_input'];?></td>
                                        <td>
                                        <a type="button" class="btn btn-info btn-circle waves-effect waves-circle waves-float" title="Edit Data" href="template.php?pages=pembelianedit&id_pembelian=<?php echo $data['id'] ;?>"><i class="material-icons">edit</i></a>   
                                        <a type="button" class="btn btn-danger btn-circle waves-effect waves-circle waves-float" onclick="return confirm('Yakin Ingin Hapus ? ')" title="Hapus Data" href="template.php?pages=pembelian&id_pembelian=<?php echo $data['id'] ;?>"><i class="material-icons">delete</i></a>   
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}
elseif ($_GET['pages'] == 'penjualan') {
?>
<?php 
mysqli_query($config,"DELETE FROM penjualan WHERE id_penjualan = '$_GET[id]' ");
?>
<section class="content">
    <div class="container-fluid">
         <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                <div class="panel panel-primary">
                <div class="panel-heading">
                <i class="fa fa-shopping-cart fa-fw"></i>&nbsp;&nbsp;Transaksi Penjualan
                </div><br>&nbsp;&nbsp;&nbsp;&nbsp;
                  <a href="javascript:void(0);" data-toggle="modal" data-target="#penjualan" class="btn btn-danger"><i class="material-icons">add_circle</i><span>Tambah Penjualan</span></a>
                  <div class="clearfix"></div>    
                    <div class="panel-body">
                        <table data-toggle="table" data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="true"  data-pagination="true" data-sort-name="name" data-sort-order="asc">
                                <thead>
                                    <tr>
                                        <th>No</th>

                                        <th data-sortable="true">ID Barang</th>
                                        <th data-sortable="true">Nama Anggota</th>
                                        <th data-sortable="true">Jumlah</th>
                                        <th data-sortable="true">Total</th>
                                        <th data-sortable="true">Tanggal Input</th>
                                        <th data-sortable="true">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php                                
                                $sql = "SELECT * FROM penjualan order by tanggal_input asc" ;
                                $qry = mysqli_query($config,$sql);  
                                $jml = mysqli_num_rows($qry);
                                $no = 1;
                                while($data = mysqli_fetch_array($qry)){
                                ?>
                                    <tr>
                                        <td><?php echo $no++;?></td>
                                        <td><?php echo $data['id_barang'];?></td>
                                        <td><?php echo $data['id_member'];?></td>
                                        <td><?php echo $data['jumlah'];?></td>
                                        <td><?php echo number_format($data['total']);?></td>
                                        <td><?php echo $data['tanggal_input'];?></td>
                                        <td>
                                        <a type="button" class="btn btn-info btn-circle waves-effect waves-circle waves-float" title="Edit Data" href="template.php?pages=penjualanedit&id_penjualan=<?php echo $data['id'] ;?>"><i class="material-icons">edit</i></a>   
                                        <a type="button" class="btn btn-danger btn-circle waves-effect waves-circle waves-float" onclick="return confirm('Yakin Ingin Hapus ? ')" title="Hapus Data" href="template.php?pages=penjualan&id_penjualan=<?php echo $data['id'] ;?>"><i class="material-icons">delete</i></a>   
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <?php
}
elseif ($_GET['pages'] == 'laporan_member') {
?>
<section class="content">
    <div class="container-fluid">
         <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                <div class="panel panel-primary">
                <div class="panel-heading">
                <i class="fa fa-area-chart fa-fw"></i>&nbsp;&nbsp;Laporan Anggota
                </div><br>&nbsp;&nbsp;&nbsp;&nbsp;
                <form method="" action="">
                <div class="col-md-3">
                    <div class="form-line">
                        <input type="text" class="datepicker form-control" name="dari" id="dari" placeholder="Dari Tanggal" required="required">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-line">
                        <input type="text" class="datepicker form-control" name="sampai" id="sampai" placeholder="Sampai Tanggal" required="required">
                    </div>
                </div>
                </form>
                  <div class="clearfix"></div>    
                    <div class="panel-body">
                         <table data-toggle="table" data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="true"  data-pagination="true" data-sort-name="name" data-sort-order="asc">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th data-sortable="true">NIK</th>
                                        <th data-sortable="true">Nama Anggota</th>
                                        <th data-sortable="true">Telepon</th>
                                        <th data-sortable="true">Gambar</th>
                                        <th data-sortable="true">Aksi</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                <?php                                
                                $sql = "SELECT * FROM member order by nm_member asc" ;
                                $qry = mysqli_query($config,$sql);  
                                $jml = mysqli_num_rows($qry);
                                $no = 1;
                                while($data = mysqli_fetch_array($qry)){
                                ?>
                                    <tr>
                                        <td><?php echo $no++;?></td>
                                        <td><?php echo $data['NIK'];?></td>
                                        <td><?php echo $data['nm_member'];?></td>
                                        <td><?php echo $data['telepon'];?></td>
                                        <td><?php echo $data['gambar'];?></td>
                                        <td>
                                        <a type="button" class="btn btn-info btn-circle waves-effect waves-circle waves-float" title="Edit Data" href="template.php?pages=barangedit&id_member=<?php echo $data['id'] ;?>"><i class="material-icons">edit</i></a>   
                                        <a type="button" class="btn btn-danger btn-circle waves-effect waves-circle waves-float" onclick="return confirm('Yakin Ingin Hapus ? ')" title="Hapus Data" href="template.php?pages=member&id_member=<?php echo $data['id'] ;?>"><i class="material-icons">delete</i></a>   
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}
elseif ($_GET['pages'] == 'laporan') {
?>
<section class="content">
    <div class="container-fluid">
         <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                <div class="panel panel-primary">
                <div class="panel-heading">
                <i class="fa fa-area-chart fa-fw"></i>&nbsp;&nbsp;Table Laporan
                </div><br>&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="col-sm-2">
                    <select class="form-control show-tick" data-live-search="true" name="cetak" id="cetak" required="required">
                    <option value="" selected="disabled"> - - Pilih Cetak - - </option>
                    <option value="Pembelian">Pembelian</option>
                    <option value="Penjualan">Penjualan</option>
                    <option value="E-Commerce">E-Commerce</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <div class="form-line">
                        <input type="text" class="datepicker form-control" name="dari" id="dari" placeholder="Dari Tanggal" required="required">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-line">
                        <input type="text" class="datepicker form-control" name="sampai" id="sampai" placeholder="Sampai Tanggal" required="required">
                    </div>
                </div>
                  <div class="clearfix"></div>    
                    <div class="panel-body">
                        <table data-toggle="table" data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="true"  data-pagination="true" data-sort-name="name" data-sort-order="asc">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th data-sortable="true">No Transaksi</th>
                                        <th data-sortable="true">Nama</th>
                                        <th data-sortable="true">Barang</th>
                                        <th data-sortable="true">Harga</th>
                                        <th data-sortable="true">Jumlah</th>
                                        <th data-sortable="true">Total</th>
                                        <th data-sortable="true">Potongan</th>
                                        <th data-sortable="true">Saldo</th>
                                        <th data-sortable="true">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php                                
                                $sql = "SELECT * FROM transaksi WHERE ket = 'pembelian' order by id asc" ;
                                $qry = mysqli_query($config,$sql);  
                                $jml = mysqli_num_rows($qry);
                                $no = 1;
                                while($data = mysqli_fetch_array($qry)){
                                ?>
                                    <tr>
                                        <td><?php echo $no++;?></td>
                                        <td><?php echo $data['namaU'];?></td>
                                        <td><?php echo $data['namaB'];?></td>
                                        <td><?php echo $data['harga'];?></td>
                                        <td><?php echo $data['jumlah'];?></td>
                                        <td><?php echo number_format($data['total']);?></td>
                                        <td><?php echo number_format($data['pot']);?></td>
                                        <td><?php echo number_format($data['saldo']);?></td>
                                        <td>
                                        <a type="button" class="btn btn-info btn-circle waves-effect waves-circle waves-float" title="Edit Data" href="template.php?pages=transaksiedit&id=<?php echo $data['id'] ;?>"><i class="material-icons">edit</i></a>   
                                        <a type="button" class="btn btn-danger btn-circle waves-effect waves-circle waves-float" onclick="return confirm('Yakin Ingin Hapus ? ')" title="Hapus Data" href="template.php?pages=transaksi&id=<?php echo $data['id'] ;?>"><i class="material-icons">delete</i></a>   
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}
elseif ($_GET['pages'] == 'laporan') {
?>
<section class="content">
    <div class="container-fluid">
         <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                <div class="panel panel-primary">
                <div class="panel-heading">
                <i class="fa fa-area-chart fa-fw"></i>&nbsp;&nbsp;Table Laporan
                </div><br>&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="col-sm-2">
                    <select class="form-control show-tick" data-live-search="true" name="cetak" id="cetak" required="required">
                    <option value="" selected="disabled"> - - Pilih Cetak - - </option>
                    <option value="Pembelian">Pembelian</option>
                    <option value="Penjualan">Penjualan</option>
                    <option value="E-Commerce">E-Commerce</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <div class="form-line">
                        <input type="text" class="datepicker form-control" name="dari" id="dari" placeholder="Dari Tanggal" required="required">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-line">
                        <input type="text" class="datepicker form-control" name="sampai" id="sampai" placeholder="Sampai Tanggal" required="required">
                    </div>
                </div>
                  <div class="clearfix"></div>    
                    <div class="panel-body">
                        <table data-toggle="table" data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="true"  data-pagination="true" data-sort-name="name" data-sort-order="asc">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th data-sortable="true">No Transaksi</th>
                                        <th data-sortable="true">Nama</th>
                                        <th data-sortable="true">Barang</th>
                                        <th data-sortable="true">Harga</th>
                                        <th data-sortable="true">Jumlah</th>
                                        <th data-sortable="true">Total</th>
                                        <th data-sortable="true">Potongan</th>
                                        <th data-sortable="true">Saldo</th>
                                        <th data-sortable="true">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php                                
                                $sql = "SELECT * FROM transaksi WHERE ket = 'pembelian' order by id asc" ;
                                $qry = mysqli_query($config,$sql);  
                                $jml = mysqli_num_rows($qry);
                                $no = 1;
                                while($data = mysqli_fetch_array($qry)){
                                ?>
                                    <tr>
                                        <td><?php echo $no++;?></td>
                                        <td><?php echo $data['namaU'];?></td>
                                        <td><?php echo $data['namaB'];?></td>
                                        <td><?php echo $data['harga'];?></td>
                                        <td><?php echo $data['jumlah'];?></td>
                                        <td><?php echo number_format($data['total']);?></td>
                                        <td><?php echo number_format($data['pot']);?></td>
                                        <td><?php echo number_format($data['saldo']);?></td>
                                        <td>
                                        <a type="button" class="btn btn-info btn-circle waves-effect waves-circle waves-float" title="Edit Data" href="template.php?pages=transaksiedit&id=<?php echo $data['id'] ;?>"><i class="material-icons">edit</i></a>   
                                        <a type="button" class="btn btn-danger btn-circle waves-effect waves-circle waves-float" onclick="return confirm('Yakin Ingin Hapus ? ')" title="Hapus Data" href="template.php?pages=transaksi&id=<?php echo $data['id'] ;?>"><i class="material-icons">delete</i></a>   
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}
elseif ($_GET['pages'] == 'laporan') {
?>
<section class="content">
    <div class="container-fluid">
         <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                <div class="panel panel-primary">
                <div class="panel-heading">
                <i class="fa fa-area-chart fa-fw"></i>&nbsp;&nbsp;Table Laporan
                </div><br>&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="col-sm-2">
                    <select class="form-control show-tick" data-live-search="true" name="cetak" id="cetak" required="required">
                    <option value="" selected="disabled"> - - Pilih Cetak - - </option>
                    <option value="Pembelian">Pembelian</option>
                    <option value="Penjualan">Penjualan</option>
                    <option value="E-Commerce">E-Commerce</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <div class="form-line">
                        <input type="text" class="datepicker form-control" name="dari" id="dari" placeholder="Dari Tanggal" required="required">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-line">
                        <input type="text" class="datepicker form-control" name="sampai" id="sampai" placeholder="Sampai Tanggal" required="required">
                    </div>
                </div>
                  <div class="clearfix"></div>    
                    <div class="panel-body">
                        <table data-toggle="table" data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="true"  data-pagination="true" data-sort-name="name" data-sort-order="asc">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th data-sortable="true">No Transaksi</th>
                                        <th data-sortable="true">Nama</th>
                                        <th data-sortable="true">Barang</th>
                                        <th data-sortable="true">Harga</th>
                                        <th data-sortable="true">Jumlah</th>
                                        <th data-sortable="true">Total</th>
                                        <th data-sortable="true">Potongan</th>
                                        <th data-sortable="true">Saldo</th>
                                        <th data-sortable="true">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php                                
                                $sql = "SELECT * FROM transaksi WHERE ket = 'pembelian' order by id asc" ;
                                $qry = mysqli_query($config,$sql);  
                                $jml = mysqli_num_rows($qry);
                                $no = 1;
                                while($data = mysqli_fetch_array($qry)){
                                ?>
                                    <tr>
                                        <td><?php echo $no++;?></td>
                                        <td><?php echo $data['namaU'];?></td>
                                        <td><?php echo $data['namaB'];?></td>
                                        <td><?php echo $data['harga'];?></td>
                                        <td><?php echo $data['jumlah'];?></td>
                                        <td><?php echo number_format($data['total']);?></td>
                                        <td><?php echo number_format($data['pot']);?></td>
                                        <td><?php echo number_format($data['saldo']);?></td>
                                        <td>
                                        <a type="button" class="btn btn-info btn-circle waves-effect waves-circle waves-float" title="Edit Data" href="template.php?pages=transaksiedit&id=<?php echo $data['id'] ;?>"><i class="material-icons">edit</i></a>   
                                        <a type="button" class="btn btn-danger btn-circle waves-effect waves-circle waves-float" onclick="return confirm('Yakin Ingin Hapus ? ')" title="Hapus Data" href="template.php?pages=transaksi&id=<?php echo $data['id'] ;?>"><i class="material-icons">delete</i></a>   
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<?php
}
?>
<!-- Modal Dialog Tambah User -->
<?php 
if(isset($_POST['simpan']))
{
    $nama = $_POST['NIK'];
    $cek=mysqli_query($config,"SELECT * FROM member WHERE NIK ='$nama'");
    if(mysqli_num_rows($cek)>=1){
    $message[] = "Maaf, NIK <b> ' $nama ' </b> Sudah Ada !! ";
}
    if(count($message)==0)
    {
        $temp   = $_FILES['gambar']['tmp_name'];
        $gambar = $_FILES['gambar']['name'];
        $path   = "images/$gambar";
        move_uploaded_file ( $temp, $path );
        $sql=mysqli_query($config,"INSERT INTO member SET  nm_member='$_POST[nm_member]', telepon='$_POST[telepon]', gambar='$gambar', NIK='$_POST[NIK]'");
        if($sql)
        {
        echo "<meta http-equiv='refresh' content='0; url=template.php?pages=member'>";
        }
        exit;
        }
    }
?>
<div class="modal fade" id="member" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-user fa-fw"></i>FORM TAMBAH DATA ANGGOTA
                        </div>
                        <div class="panel-body">
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;
                            <div align="center">
                            <?php 
                                if (! count($message)==0 )
                                {
                                echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>";
                                    foreach ($message as $indeks=>$pesan_tampil) 
                                    { 
                                        echo "$pesan_tampil<br>"; 
                                    }
                                echo "</div>";
                                }
                            ?>
                            </div>
                            <form action="" id="validation-reg" method="post" enctype="multipart/form-data" target="_self">
                                <!-- <input type="hidden" class="form-control" name="id" id="id" value=" " readonly="readonly"> -->
                                <div class="form-group form-float">
                                    <div class="row">
                                        <div class="col-md-6"><br>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="NIK" id="NIK" required="required">
                                                <label class="form-label">NIK</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6"><br>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="nm_member" id="nm_member" required="required">
                                                <label class="form-label">Nama Anggota</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="row">
                                        <div class="col-md-6"><br>
                                            <div class="form-line">
                                                <input type="number" class="form-control" name="telepon" id="telepon" required="required">
                                                <label class="form-label">Telepon</label>
                                            </div>
                                        </div><br>
                                        <div class="col-md-6">
                                            <div class="form-line">
                                                <input type="file" name="gambar" id="gambar" class="form-control" required="required" placeholder="Upload Foto">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary waves-effect" type="submit" name="simpan"><i class="material-icons">save</i>
                                <span>SIMPAN</span></button>
                                <button class="btn btn-success waves-effect" type="reset"><i class="material-icons">cancel</i><span>BATAL</span></button>
                                <a href="javascript:history.go(-1)" class="btn btn-danger waves-effect"><i class="material-icons">settings_backup_restore</i><span>KEMBALI</span></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Dialog Tambah Barang -->
<?php 
if(isset($_POST['simpan']))
{
    $nama = $_POST['nama'];
    $cek=mysqli_query($config,"SELECT * FROM user WHERE nama ='$nama'");
    if(mysqli_num_rows($cek)>=1){
    $message[] = "Maaf, Nama <b> ' $nama ' </b> Sudah Ada !! ";
}
    if(count($message)==0)
    {
        $temp   = $_FILES['gambar']['tmp_name'];
        $gambar = $_FILES['gambar']['name'];
        $path   = "images/$gambar";
        move_uploaded_file ( $temp, $path );
        $sql=mysqli_query($config,"INSERT INTO user SET id='$_POST[id]', idlevel='$_POST[idlevel]', nama='$_POST[nama]', kelamin='$_POST[kelamin]', tempat='$_POST[tempat]', lahir='$_POST[lahir]', alamat='$_POST[alamat]', hp='$_POST[hp]', gambar='$gambar' ");
        if($sql)
        {
        echo "<meta http-equiv='refresh' content='0; url=template.php?pages=user'>";
        }
        exit;
        }
    }
?>
<div class="modal fade" id="barang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-glass fa-fw"></i> FORM TAMBAH DATA BARANG
                        </div>
                        <div class="panel-body">
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;
                            <div align="center">
                            <?php 
                                if (! count($message)==0 )
                                {
                                echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>";
                                    foreach ($message as $indeks=>$pesan_tampil) 
                                    { 
                                        echo "$pesan_tampil<br>"; 
                                    }
                                echo "</div>";
                                }
                            ?>
                            </div>
                            <form action="template.php?pages=usertambah" id="validation-reg" method="post" enctype="multipart/form-data" target="_self">
                                <input type="hidden" class="form-control" name="id" id="id" value=" " readonly="readonly">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <select class="form-control show-tick" data-live-search="true" name="idlevel" id="idlevel" required="required">
                                        <option value="" selected disabled> -- Pilih Kepala Keluarga -- </option>
                                        <?php
                                        $data = mysqli_query($config, "SELECT * FROM level WHERE level != 'admin' ORDER BY level ASC");
                                        while($level = mysqli_fetch_array($data)){
                                        echo "<option value='$level[id].$level[level]'>$level[level]</option>";
                                        }
                                        ?>                  
                                        </select>
                                    </div>
                                </div><br>
                                <div class="form-group form-float">
                                    <div class="row">
                                        <div class="col-md-6"><br>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="nama" id="nama" required="required">
                                                <label class="form-label">Nama Anggota</label>
                                            </div>
                                        </div><br>
                                        <div class="col-md-6" align="center">
                                            <input type="radio" name="kelamin" id="Laki - laki" value="Laki - laki" class="with-gap" required="required">
                                            <label for="Laki - laki">Laki - laki</label>

                                            <input type="radio" name="kelamin" id="Perempuan" value="Perempuan" class="with-gap" required="required">
                                            <label for="Perempuan" class="m-l-20">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="row">
                                        <div class="col-md-6"><br>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="tempat" id="template" required="required">
                                                <label class="form-label">Tempat</label>
                                            </div>
                                        </div><br>
                                        <div class="col-md-6">
                                            <div class="form-line">
                                                <input type="text" class="datepicker form-control" name="lahir" id="lahir" placeholder="Tgl.Lahir" required="required">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea type="text" class="form-control" name="alamat" id="alamat" required="required"></textarea>
                                        <label class="form-label">Alamat</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="row">
                                        <div class="col-md-6"><br>
                                            <div class="form-line">
                                                <input type="number" name="hp" id="hp" class="form-control" required="required">
                                                <label class="form-label">No HP</label>
                                            </div>
                                        </div><br>
                                        <div class="col-md-6">
                                            <div class="form-line">
                                                <input type="file" name="gambar" id="gambar" class="form-control" required="required" placeholder="Upload Foto">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary waves-effect" type="submit" name="simpan"><i class="material-icons">save</i>
                                <span>SIMPAN</span></button>
                                <button class="btn btn-success waves-effect" type="reset"><i class="material-icons">cancel</i><span>BATAL</span></button>
                                <a href="javascript:history.go(-1)" class="btn btn-danger waves-effect"><i class="material-icons">settings_backup_restore</i><span>KEMBALI</span></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Dialog Tambah Transaksi Masuk -->
<?php 
if(isset($_POST['simpan']))
{
    $nama = $_POST['nama'];
    $cek=mysqli_query($config,"SELECT * FROM user WHERE nama ='$nama'");
    if(mysqli_num_rows($cek)>=1){
    $message[] = "Maaf, Nama <b> ' $nama ' </b> Sudah Ada !! ";
}
    if(count($message)==0)
    {
        $temp   = $_FILES['gambar']['tmp_name'];
        $gambar = $_FILES['gambar']['name'];
        $path   = "images/$gambar";
        move_uploaded_file ( $temp, $path );
        $sql=mysqli_query($config,"INSERT INTO user SET id='$_POST[id]', idlevel='$_POST[idlevel]', nama='$_POST[nama]', kelamin='$_POST[kelamin]', tempat='$_POST[tempat]', lahir='$_POST[lahir]', alamat='$_POST[alamat]', hp='$_POST[hp]', gambar='$gambar' ");
        if($sql)
        {
        echo "<meta http-equiv='refresh' content='0; url=template.php?pages=user'>";
        }
        exit;
        }
    }
?>
<div class="modal fade" id="pembelian" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-glass fa-fw"></i> FORM TAMBAH DATA BARANG
                        </div>
                        <div class="panel-body">
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;
                            <div align="center">
                            <?php 
                                if (! count($message)==0 )
                                {
                                echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>";
                                    foreach ($message as $indeks=>$pesan_tampil) 
                                    { 
                                        echo "$pesan_tampil<br>"; 
                                    }
                                echo "</div>";
                                }
                            ?>
                            </div>
                            <form action="template.php?pages=usertambah" id="validation-reg" method="post" enctype="multipart/form-data" target="_self">
                                <input type="hidden" class="form-control" name="id" id="id" value=" " readonly="readonly">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <select class="form-control show-tick" data-live-search="true" name="idlevel" id="idlevel" required="required">
                                        <option value="" selected disabled> -- Pilih Kepala Keluarga -- </option>
                                        <?php
                                        $data = mysqli_query($config, "SELECT * FROM level WHERE level != 'admin' ORDER BY level ASC");
                                        while($level = mysqli_fetch_array($data)){
                                        echo "<option value='$level[id].$level[level]'>$level[level]</option>";
                                        }
                                        ?>                  
                                        </select>
                                    </div>
                                </div><br>
                                <div class="form-group form-float">
                                    <div class="row">
                                        <div class="col-md-6"><br>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="nama" id="nama" required="required">
                                                <label class="form-label">Nama Anggota</label>
                                            </div>
                                        </div><br>
                                        <div class="col-md-6" align="center">
                                            <input type="radio" name="kelamin" id="Laki - laki" value="Laki - laki" class="with-gap" required="required">
                                            <label for="Laki - laki">Laki - laki</label>

                                            <input type="radio" name="kelamin" id="Perempuan" value="Perempuan" class="with-gap" required="required">
                                            <label for="Perempuan" class="m-l-20">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="row">
                                        <div class="col-md-6"><br>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="tempat" id="template" required="required">
                                                <label class="form-label">Tempat</label>
                                            </div>
                                        </div><br>
                                        <div class="col-md-6">
                                            <div class="form-line">
                                                <input type="text" class="datepicker form-control" name="lahir" id="lahir" placeholder="Tgl.Lahir" required="required">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea type="text" class="form-control" name="alamat" id="alamat" required="required"></textarea>
                                        <label class="form-label">Alamat</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="row">
                                        <div class="col-md-6"><br>
                                            <div class="form-line">
                                                <input type="number" name="hp" id="hp" class="form-control" required="required">
                                                <label class="form-label">No HP</label>
                                            </div>
                                        </div><br>
                                        <div class="col-md-6">
                                            <div class="form-line">
                                                <input type="file" name="gambar" id="gambar" class="form-control" required="required" placeholder="Upload Foto">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary waves-effect" type="submit" name="simpan"><i class="material-icons">save</i>
                                <span>SIMPAN</span></button>
                                <button class="btn btn-success waves-effect" type="reset"><i class="material-icons">cancel</i><span>BATAL</span></button>
                                <a href="javascript:history.go(-1)" class="btn btn-danger waves-effect"><i class="material-icons">settings_backup_restore</i><span>KEMBALI</span></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Dialog Tambah Transaksi Keluar -->
<?php 
if(isset($_POST['simpan']))
{
    $nama = $_POST['nama'];
    $cek=mysqli_query($config,"SELECT * FROM user WHERE nama ='$nama'");
    if(mysqli_num_rows($cek)>=1){
    $message[] = "Maaf, Nama <b> ' $nama ' </b> Sudah Ada !! ";
}
    if(count($message)==0)
    {
        $temp   = $_FILES['gambar']['tmp_name'];
        $gambar = $_FILES['gambar']['name'];
        $path   = "images/$gambar";
        move_uploaded_file ( $temp, $path );
        $sql=mysqli_query($config,"INSERT INTO user SET id='$_POST[id]', idlevel='$_POST[idlevel]', nama='$_POST[nama]', kelamin='$_POST[kelamin]', tempat='$_POST[tempat]', lahir='$_POST[lahir]', alamat='$_POST[alamat]', hp='$_POST[hp]', gambar='$gambar' ");
        if($sql)
        {
        echo "<meta http-equiv='refresh' content='0; url=template.php?pages=user'>";
        }
        exit;
        }
    }
?>
<div class="modal fade" id="penjualan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-glass fa-fw"></i> FORM TAMBAH DATA BARANG
                        </div>
                        <div class="panel-body">
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;
                            <div align="center">
                            <?php 
                                if (! count($message)==0 )
                                {
                                echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>";
                                    foreach ($message as $indeks=>$pesan_tampil) 
                                    { 
                                        echo "$pesan_tampil<br>"; 
                                    }
                                echo "</div>";
                                }
                            ?>
                            </div>
                            <form action="template.php?pages=usertambah" id="validation-reg" method="post" enctype="multipart/form-data" target="_self">
                                <input type="hidden" class="form-control" name="id" id="id" value=" " readonly="readonly">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <select class="form-control show-tick" data-live-search="true" name="idlevel" id="idlevel" required="required">
                                        <option value="" selected disabled> -- Pilih Kepala Keluarga -- </option>
                                        <?php
                                        $data = mysqli_query($config, "SELECT * FROM level WHERE level != 'admin' ORDER BY level ASC");
                                        while($level = mysqli_fetch_array($data)){
                                        echo "<option value='$level[id].$level[level]'>$level[level]</option>";
                                        }
                                        ?>                  
                                        </select>
                                    </div>
                                </div><br>
                                <div class="form-group form-float">
                                    <div class="row">
                                        <div class="col-md-6"><br>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="nama" id="nama" required="required">
                                                <label class="form-label">Nama Anggota</label>
                                            </div>
                                        </div><br>
                                        <div class="col-md-6" align="center">
                                            <input type="radio" name="kelamin" id="Laki - laki" value="Laki - laki" class="with-gap" required="required">
                                            <label for="Laki - laki">Laki - laki</label>

                                            <input type="radio" name="kelamin" id="Perempuan" value="Perempuan" class="with-gap" required="required">
                                            <label for="Perempuan" class="m-l-20">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="row">
                                        <div class="col-md-6"><br>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="tempat" id="template" required="required">
                                                <label class="form-label">Tempat</label>
                                            </div>
                                        </div><br>
                                        <div class="col-md-6">
                                            <div class="form-line">
                                                <input type="text" class="datepicker form-control" name="lahir" id="lahir" placeholder="Tgl.Lahir" required="required">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea type="text" class="form-control" name="alamat" id="alamat" required="required"></textarea>
                                        <label class="form-label">Alamat</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="row">
                                        <div class="col-md-6"><br>
                                            <div class="form-line">
                                                <input type="number" name="hp" id="hp" class="form-control" required="required">
                                                <label class="form-label">No HP</label>
                                            </div>
                                        </div><br>
                                        <div class="col-md-6">
                                            <div class="form-line">
                                                <input type="file" name="gambar" id="gambar" class="form-control" required="required" placeholder="Upload Foto">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary waves-effect" type="submit" name="simpan"><i class="material-icons">save</i>
                                <span>SIMPAN</span></button>
                                <button class="btn btn-success waves-effect" type="reset"><i class="material-icons">cancel</i><span>BATAL</span></button>
                                <a href="javascript:history.go(-1)" class="btn btn-danger waves-effect"><i class="material-icons">settings_backup_restore</i><span>KEMBALI</span></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Dialog Tambah Akuntansi -->
<?php 
if(isset($_POST['simpan']))
{
    $nama = $_POST['nama'];
    $cek=mysqli_query($config,"SELECT * FROM user WHERE nama ='$nama'");
    if(mysqli_num_rows($cek)>=1){
    $message[] = "Maaf, Nama <b> ' $nama ' </b> Sudah Ada !! ";
}
    if(count($message)==0)
    {
        $temp   = $_FILES['gambar']['tmp_name'];
        $gambar = $_FILES['gambar']['name'];
        $path   = "images/$gambar";
        move_uploaded_file ( $temp, $path );
        $sql=mysqli_query($config,"INSERT INTO user SET id='$_POST[id]', idlevel='$_POST[idlevel]', nama='$_POST[nama]', kelamin='$_POST[kelamin]', tempat='$_POST[tempat]', lahir='$_POST[lahir]', alamat='$_POST[alamat]', hp='$_POST[hp]', gambar='$gambar' ");
        if($sql)
        {
        echo "<meta http-equiv='refresh' content='0; url=template.php?pages=user'>";
        }
        exit;
        }
    }
?>
<div class="modal fade" id="akuntansi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-glass fa-fw"></i> FORM TAMBAH DATA BARANG
                        </div>
                        <div class="panel-body">
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;
                            <div align="center">
                            <?php 
                                if (! count($message)==0 )
                                {
                                echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>";
                                    foreach ($message as $indeks=>$pesan_tampil) 
                                    { 
                                        echo "$pesan_tampil<br>"; 
                                    }
                                echo "</div>";
                                }
                            ?>
                            </div>
                            <form action="template.php?pages=usertambah" id="validation-reg" method="post" enctype="multipart/form-data" target="_self">
                                <input type="hidden" class="form-control" name="id" id="id" value=" " readonly="readonly">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <select class="form-control show-tick" data-live-search="true" name="idlevel" id="idlevel" required="required">
                                        <option value="" selected disabled> -- Pilih Kepala Keluarga -- </option>
                                        <?php
                                        $data = mysqli_query($config, "SELECT * FROM level WHERE level != 'admin' ORDER BY level ASC");
                                        while($level = mysqli_fetch_array($data)){
                                        echo "<option value='$level[id].$level[level]'>$level[level]</option>";
                                        }
                                        ?>                  
                                        </select>
                                    </div>
                                </div><br>
                                <div class="form-group form-float">
                                    <div class="row">
                                        <div class="col-md-6"><br>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="nama" id="nama" required="required">
                                                <label class="form-label">Nama Anggota</label>
                                            </div>
                                        </div><br>
                                        <div class="col-md-6" align="center">
                                            <input type="radio" name="kelamin" id="Laki - laki" value="Laki - laki" class="with-gap" required="required">
                                            <label for="Laki - laki">Laki - laki</label>

                                            <input type="radio" name="kelamin" id="Perempuan" value="Perempuan" class="with-gap" required="required">
                                            <label for="Perempuan" class="m-l-20">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="row">
                                        <div class="col-md-6"><br>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="tempat" id="template" required="required">
                                                <label class="form-label">Tempat</label>
                                            </div>
                                        </div><br>
                                        <div class="col-md-6">
                                            <div class="form-line">
                                                <input type="text" class="datepicker form-control" name="lahir" id="lahir" placeholder="Tgl.Lahir" required="required">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea type="text" class="form-control" name="alamat" id="alamat" required="required"></textarea>
                                        <label class="form-label">Alamat</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="row">
                                        <div class="col-md-6"><br>
                                            <div class="form-line">
                                                <input type="number" name="hp" id="hp" class="form-control" required="required">
                                                <label class="form-label">No HP</label>
                                            </div>
                                        </div><br>
                                        <div class="col-md-6">
                                            <div class="form-line">
                                                <input type="file" name="gambar" id="gambar" class="form-control" required="required" placeholder="Upload Foto">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary waves-effect" type="submit" name="simpan"><i class="material-icons">save</i>
                                <span>SIMPAN</span></button>
                                <button class="btn btn-success waves-effect" type="reset"><i class="material-icons">cancel</i><span>BATAL</span></button>
                                <a href="javascript:history.go(-1)" class="btn btn-danger waves-effect"><i class="material-icons">settings_backup_restore</i><span>KEMBALI</span></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Dialog Tambah Neraca -->
<?php 
if(isset($_POST['simpan']))
{
    $nama = $_POST['nama'];
    $cek=mysqli_query($config,"SELECT * FROM user WHERE nama ='$nama'");
    if(mysqli_num_rows($cek)>=1){
    $message[] = "Maaf, Nama <b> ' $nama ' </b> Sudah Ada !! ";
}
    if(count($message)==0)
    {
        $temp   = $_FILES['gambar']['tmp_name'];
        $gambar = $_FILES['gambar']['name'];
        $path   = "images/$gambar";
        move_uploaded_file ( $temp, $path );
        $sql=mysqli_query($config,"INSERT INTO user SET id='$_POST[id]', idlevel='$_POST[idlevel]', nama='$_POST[nama]', kelamin='$_POST[kelamin]', tempat='$_POST[tempat]', lahir='$_POST[lahir]', alamat='$_POST[alamat]', hp='$_POST[hp]', gambar='$gambar' ");
        if($sql)
        {
        echo "<meta http-equiv='refresh' content='0; url=template.php?pages=user'>";
        }
        exit;
        }
    }
?>
<div class="modal fade" id="neraca" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-glass fa-fw"></i> FORM TAMBAH DATA BARANG
                        </div>
                        <div class="panel-body">
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;
                            <div align="center">
                            <?php 
                                if (! count($message)==0 )
                                {
                                echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>";
                                    foreach ($message as $indeks=>$pesan_tampil) 
                                    { 
                                        echo "$pesan_tampil<br>"; 
                                    }
                                echo "</div>";
                                }
                            ?>
                            </div>
                            <form action="template.php?pages=usertambah" id="validation-reg" method="post" enctype="multipart/form-data" target="_self">
                                <input type="hidden" class="form-control" name="id" id="id" value=" " readonly="readonly">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <select class="form-control show-tick" data-live-search="true" name="idlevel" id="idlevel" required="required">
                                        <option value="" selected disabled> -- Pilih Kepala Keluarga -- </option>
                                        <?php
                                        $data = mysqli_query($config, "SELECT * FROM level WHERE level != 'admin' ORDER BY level ASC");
                                        while($level = mysqli_fetch_array($data)){
                                        echo "<option value='$level[id].$level[level]'>$level[level]</option>";
                                        }
                                        ?>                  
                                        </select>
                                    </div>
                                </div><br>
                                <div class="form-group form-float">
                                    <div class="row">
                                        <div class="col-md-6"><br>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="nama" id="nama" required="required">
                                                <label class="form-label">Nama Anggota</label>
                                            </div>
                                        </div><br>
                                        <div class="col-md-6" align="center">
                                            <input type="radio" name="kelamin" id="Laki - laki" value="Laki - laki" class="with-gap" required="required">
                                            <label for="Laki - laki">Laki - laki</label>

                                            <input type="radio" name="kelamin" id="Perempuan" value="Perempuan" class="with-gap" required="required">
                                            <label for="Perempuan" class="m-l-20">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="row">
                                        <div class="col-md-6"><br>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="tempat" id="template" required="required">
                                                <label class="form-label">Tempat</label>
                                            </div>
                                        </div><br>
                                        <div class="col-md-6">
                                            <div class="form-line">
                                                <input type="text" class="datepicker form-control" name="lahir" id="lahir" placeholder="Tgl.Lahir" required="required">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea type="text" class="form-control" name="alamat" id="alamat" required="required"></textarea>
                                        <label class="form-label">Alamat</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="row">
                                        <div class="col-md-6"><br>
                                            <div class="form-line">
                                                <input type="number" name="hp" id="hp" class="form-control" required="required">
                                                <label class="form-label">No HP</label>
                                            </div>
                                        </div><br>
                                        <div class="col-md-6">
                                            <div class="form-line">
                                                <input type="file" name="gambar" id="gambar" class="form-control" required="required" placeholder="Upload Foto">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary waves-effect" type="submit" name="simpan"><i class="material-icons">save</i>
                                <span>SIMPAN</span></button>
                                <button class="btn btn-success waves-effect" type="reset"><i class="material-icons">cancel</i><span>BATAL</span></button>
                                <a href="javascript:history.go(-1)" class="btn btn-danger waves-effect"><i class="material-icons">settings_backup_restore</i><span>KEMBALI</span></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
