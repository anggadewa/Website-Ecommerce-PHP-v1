<?php 
require_once '../config/db.php'; 
if(!isset($_SESSION['admin'])){
    ?>
<script>
    alert('Anda Harus Login Terlebih Dahulu');
</script>
<?php
    header('Location: login.php');
    exit();
}
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>YUDEA - BATIK</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                    aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="images/logobaru.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php"> <i class="menu-icon fa fa-home"></i>Beranda </a>
                    </li>
                    <li>
                        <a href="index.php?halaman=produk"><i class="menu-icon fa fa-coffee"></i><span>Produk</span></a>
                    </li>
                    <li>
                        <a href="index.php?halaman=pembelian"><i
                                class="menu-icon fa fa-cart-plus"></i><span>Pembelian</span></a>
                    </li>
                    <li>
                        <a href="index.php?halaman=laporanpembelian"><i
                                class="menu-icon fa fa-bar-chart-o"></i><span>Laporan</span></a>
                    </li>
                    <li>
                        <a href="index.php?halaman=pelanggan"><i
                                class="menu-icon fa fa-users"></i><span>Pelanggan</span></a>
                    </li>
                    <li>
                        <a href="index.php?halaman=logout"><i
                                class="menu-icon fa fa-sign-out"></i><span>Logout</span></a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="index.php?halaman=logout"><i
                                    class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>
                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="content mt-3">
            <?php 
            if (isset($_GET['halaman'])){
                if ($_GET['halaman']=='produk'){
                    include 'produk.php';
                } elseif ($_GET['halaman']=='pembelian') {
                    include 'pembelian.php';
                } elseif ($_GET['halaman']=='pelanggan') {
                    include 'pelanggan.php';
                } elseif ($_GET['halaman']=='detail') {
                    include 'detail.php';
                } elseif ($_GET['halaman']=='tambahproduk') {
                    include 'tambahproduk.php';
                } elseif ($_GET['halaman']=='tambahpelanggan') {
                    include 'tambahpelanggan.php';
                } elseif ($_GET['halaman']=='hapusproduk') {
                    include 'hapusproduk.php';
                } elseif ($_GET['halaman']=='ubahproduk') {
                    include 'ubahproduk.php';
                } elseif ($_GET['halaman']=='hapuspelanggan') {
                    include 'hapuspelanggan.php';
                } elseif ($_GET['halaman']=='ubahpelanggan') {
                    include 'ubahpelanggan.php';
                } elseif ($_GET['halaman']=='pembayaran') {
                    include 'pembayaran.php';
                } elseif ($_GET['halaman']=='laporanpembelian') {
                    include 'laporanpembelian.php';
                } elseif ($_GET['halaman']=='logout') {
                    include 'logout.php';
                } elseif ($_GET['halaman']=='mail') {
                include 'mail.php';
                }
            } else {
                include 'home.php';
            }
            ?>
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>

    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>
    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#bootstrap-data-table-export').DataTable();
        });
    </script>

</body>

</html>