<?php
include("redirect0.php");
include('connect.php');
//login Detail
if (isset($_GET['show1'])){
    $trxid=$_GET['trxid'];
    $tran=$trxid;

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Easy Tron</title>

  <?php include('header.php'); ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.jpg" alt="AdminLTELogo" height="60" width="60">
  </div>

 <!-- Sidebar -->
<?php include('sidebar.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <h3 class="text-center text-success" style="font-family: 'Playfair Display', serif;">Add Fund History</h3>

      <div class="col-lg-12 col-12 container border rounded bg-white p-2" >
      <iframe src="https://tronscan.org/#/transaction/<?php echo$tran;?>" style="width:100%;height:500px;" title="description" scrolling="yes"></iframe>
      </div>
      </div><!-- /.container-fluid -->
     
    </section>
    <!-- /.content -->
  </div>
 <?php include("footer.php"); ?>
</body>
</html>
