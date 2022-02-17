<?php
include "koneksi/koneksi.php";
session_start();
  if((isset($_GET['aksi']))&&(isset($_GET['data']))){
    if($_GET['aksi']=='hapus'){
    $id_user = $_GET['data'];
    //hapus kategori buku
    $sql_dh = "delete from `devices` where `id` = '$id'";
    mysqli_query($conn,$sql_dh);
    }
  }
  if(isset($_POST["katakunci"])){
    $katakunci_kategori = $_POST["katakunci"];
    $_SESSION['katakunci_kategori'] = $katakunci_kategori;
  }
  if(isset($_SESSION['katakunci_kategori'])){
    $katakunci_kategori = $_SESSION['katakunci_kategori'];
  }else{
    unset($_SESSION['katakunci_kategori']);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | DataTables</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Pet Feeder</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['username'];?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="devicelist.php" class="nav-link active">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Data Devices
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="datauser.php" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="logsensor.php" class="nav-link">
              <i class="nav-icon fas fa-history"></i>
              <p>
                Log
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Devices</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Data Devices</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
            <div class="card-header">
                <h3 class="card-title" style="margin-top:5px;">Data Devices</h3>
                <div class="card-tools">
                  <a href="createdevice.php" class="btn btn-sm btn-info float-right"><i class="fas fa-plus"></i> Tambah Device</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Seri Device</th>
                    <th scope="col">Nama Devices</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    $batas = 5;
                    if(!isset($_GET['halaman'])){
                      $posisi = 0;
                      $halaman = 1;
                    }else{
                      $halaman = $_GET['halaman'];
                      $posisi = ($halaman-1) * $batas;
                    }
                      $sql_k = "SELECT `id`,`seri_devices`,`nama_devices` FROM `devices`";
                      if (!empty($katakunci_kategori)){
                        $sql_k .= " where `nama_devices` LIKE '%$katakunci_kategori%' ";
                      }
                      $sql_k .= " ORDER BY `id` limit $posisi, $batas ";
                      $query_k = mysqli_query($conn,$sql_k);
                      $no = $posisi+1;
                      while($data_k = mysqli_fetch_row($query_k)){
                      $id = $data_k[0];
                      $seri_devices = $data_k[1];
                      $nama_devices = $data_k[2];
                    ?>
                  <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $seri_devices?></td>
                    <td><?php echo $nama_devices?></td>
                    <td>
                      <a href="editdevice.php?id=<?php echo $id;?>" class="btn btn-xs btn-info" title="Edit"><i class="fas fa-edit"></i></a>
                      <a href="read_device.php?id=<?php echo $id;?>" class="btn btn-xs btn-info" title="Detail"><i class="fas fa-eye"></i></a>
                      <a href="hapusdevice.php?id=<?php echo $id; ?>"class="btn btn-xs btn-warning"><i class="fas fa-trash"></i></a>                     
                     </td>
                  </tr>
                  <?php $no++;}?>
                </tbody>
              </table>
              </div>
              <?php
              //hitung jumlah semua data
              $sql_jum = "SELECT `id`,`seri_devices`,`nama_devices` FROM `devices`";
              if (!empty($katakunci_kategori)){
                $sql_jum .= " where `nama_devices` LIKE '%$katakunci_kategori%'";
              }
              $sql_jum .= " order by `id`";
              $query_jum = mysqli_query($conn,$sql_jum);
              $jum_data = mysqli_num_rows($query_jum);
              $jum_halaman = ceil($jum_data/$batas);
              ?>
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <?php
                    if($jum_halaman==0){
                    //tidak ada halaman
                    }else if($jum_halaman==1){
                    echo "<li class='page-item'><a class='page-link'>1</a></li>";
                    }else{
                    $sebelum = $halaman-1;
                    $setelah = $halaman+1;
                    if($halaman!=1){
                    echo "<li class='page-item'><a class='page-link' href='?halaman=1'>First</a></li>";
                    echo "<li class='page-item'><a class='page-link' href='?halaman-$sebelum'>«</a></li>";
                    }
                    for($i=1; $i<=$jum_halaman; $i++){
                    if ($i > $halaman - 5 and $i < $halaman + 5 ) {
                    if($i!=$halaman){
                    echo "<li class='page-item'><a class='page-link' href='?halaman=$i'>$i</a></li>";
                    }else{
                    echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                    }
                    }
                    }
                    if($halaman!=$jum_halaman){
                    echo "<li class='page-item'><a class='page-link' href='?halaman=$setelah'>»</a></li>";
                    echo "<li class='page-item'><a class='page-link' href='?halaman=$jum_halaman'>Last</a></li>";
                    }
                    }?>
                  </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
