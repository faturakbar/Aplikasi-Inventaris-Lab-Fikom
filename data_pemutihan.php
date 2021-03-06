<?php 
session_start();
if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
} 

require 'functions.php';


 
$pemutihan =tampil_data ("SELECT * FROM pemutihan JOIN barang ON pemutihan.kode_barang = barang.kode_barang");	   

 

 

 
// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

  // cek apakah berhasil di tambahkan atau tidak
 if (tambah_ruangan ($_POST) > 0) {

 
   echo "<script> 
       alert('Data Berhasil Ditambahkan!');
       document.location.href='data_ruangan.php';
     </script>";	
 } else {
   echo "<script> 
       alert('Data Gagal Ditambahkan!');
       document.location.href='data_ruangan.php';
     </script>";	
 }
  
}

 
 ?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Aplikasi Inventaris Barang Lab FIKOM USTJ</title

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">
<?php 
// kode Ruangan 
$id = id_ruangan ( "SELECT max(kode_ruangan) as kodeTerbesar FROM ruangan"); 
$koderuangan = $id['kodeTerbesar'];
// mengambil angka dari kode barang terbesar, menggunakan fungsi substr dan diubah ke integer dengan (int)
$urutan = (int) substr($koderuangan, 1, 1);
$urutan++;
$huruf = "R";
$koderuangan = $huruf . sprintf("%01s", $urutan); 
?>

<!-- Page Wrapper -->
  <div id="wrapper">

  <!-- sidebar -->
  <?php 
  include'sidebar.php'
  ?>
  <!-- endsidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <form class="form-inline">
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>
          </form> 

         <!--  top navbar -->
        <?php 
         include'topnavbar.php'
        ?>
        <!-- end top navbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Data Pemutihan  </h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Pemutihan </h6>
            </div>
          
            <div class="card-body"> 
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Barang</th>
                      <th>Nama Barang</th>
                      <th>Baik</th>
                      <th>Rusak</th>
                      <th>Putihkan</th>
                      <th>Jumlah</th>
                      <?php 
                      $level = $_SESSION['level'];
                      if($level == "admin") :?> 
                      <th>Detail</th>  
                      <?php endif; ?>     
                    </tr>
                    
                  </thead>
             
                  <tbody>
                  <?php $i=1; ?>
                  <?php foreach($pemutihan as $data) : ?>

                    <tr>
                      <td><?= $i ?></td>
                      <td><?= $data["kode_barang"];?> </td>
                      <td><?= $data["nama_barang"];?> </td>
                      <td><?= $data["baik"];?> </td>
                      <td><?= $data["rusak"];?> </td>
                      <td><?= $data["putihkan"];?> </td>
                      <td><?= $data["jumlah"];?> </td>  
                      <?php 
                      $level = $_SESSION['level'];
                      if($level == "admin") :?> 
                    <td width = 13px;>
                    <form action="data_detail.php" method="post">
                    <input type="hidden" name="cari" value="<?php echo $data['kode_barang']; ?> ">
                    <input value="Detail Barang" type="submit" class="btn btn-primary">
                    </form>                  
                    </td>
                      <?php endif; ?>
                      
                    </tr>
                    <?php $i++ ?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          </div>

      </div>
      <!-- End of Main Content -->

      
      <!-- Footer -->     
      <?php
      include 'footer.php';
      ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  
  <!-- Logout Modal-->
      <?php
      include 'logoutmodal.php';
      ?>

    
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
