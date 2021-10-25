<?php
include("redirect0.php");
include('connect.php');
//login Detail
$email= $_SESSION['email'];
$query = "SELECT * FROM login WHERE email='$email'  ";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
//level Details
$query1 = "SELECT * FROM level WHERE email='$email'  ";
$result1 = mysqli_query($conn, $query1);
$user1 = mysqli_fetch_assoc($result1);
//transfer Details
$query2 = "SELECT * FROM transfer WHERE email='$email' and status='success' and tron='TrxWallet' ";
$result2 = mysqli_query($conn, $query2);
$num1=mysqli_num_rows($result2);
$with=0;
if($num1>0){
    while($transfer=mysqli_fetch_array($result2)){
        $with=$with+$transfer['rtrx'];
    }
}
//roi details
$query3 = "SELECT * FROM roi WHERE email='$email'  ";
$result3 = mysqli_query($conn, $query3);
$num2=mysqli_num_rows($result3);
$roi=0;
if($num2>0){
    while($dailyroi=mysqli_fetch_array($result3)){
        $roi=$roi+$dailyroi['roi'];
    }
}
//daily roi details
$roidate=date('20ymd');
$query4 = "SELECT * FROM roi WHERE email='$email' and date='$roidate' ";
$result4 = mysqli_query($conn, $query4);
$num3=mysqli_num_rows($result4);

if($num3>0){
  $todayroi='Success';
}
else{
  $todayroi='pending';
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Easy Tron| Dashboard</title>

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
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="ion ion-person"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"> Name</span>
                <span class="info-box-number">
                <?php echo $user['Name'];?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>
        <!-- box -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="ion ion-person"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Sponsor's Name</span>
                <span class="info-box-number">
                <?php echo $user['spName'];?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><i class="ion ion-ribbon-b"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Status</span>
                <span class="info-box-number">
                <?php echo $user['Status'];?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-warning elevation-1"><i class="ion ion-person-add"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Direct </span>
                <span class="info-box-number">
                <?php echo $user['refler'];?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>
          
          <!-- ./col -->
        
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-green elevation-1"><i class="ion ion-person-add"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Direct Active</span>
                <span class="info-box-number">
                <?php echo $user['refler'];?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-danger elevation-1"><i class="ion ion-cash"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Wallet</span>
                <span class="info-box-number">
                <?php echo $user['wallet'];?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>
        <!-- ./col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-secondary elevation-1"><i class="ion ion-key"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pin Wallet</span>
                <span class="info-box-number">
                <?php echo $user['shopwallet'];?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-pink elevation-1"><i class="ion ion-heart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Today's ROI</span>
                <span class="info-box-number">
                <?php echo $todayroi; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-green elevation-1"><i class="ion ion-cash"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total ROI</span>
                <span class="info-box-number">
                <?php echo $roi; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-pink elevation-1"><i class="ion ion-heart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Level Income</span>
                <span class="info-box-number">
                <?php $total= $user1['L1']+$user1['L2']+$user1['L3']+$user1['L4']+$user1['L5']+$user1['L6']+$user1['L7'];
                echo $total;?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-primary elevation-1"><i class="icon ion-trophy"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Available Level Income</span>
                <span class="info-box-number">
                <?php $total1= $user1['BL1']+$user1['BL2']+$user1['BL3']+$user1['BL4']+$user1['BL5']+$user1['BL6']+$user1['BL7'];
                echo $total1;?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-purple elevation-1"><i class="icon ion-thumbsup"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Income</span>
                <span class="info-box-number">
                <?php $sum=$total+$user1['pool1']+$user1['pool2']+$user1['pool3']+$user1['pool4']; echo $sum; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-lightblue elevation-1"><i class="icon ion-cash"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Withdrawal</span>
                <span class="info-box-number">
                <?php echo $with ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-12">
            <!-- small box -->
            <div class="small-box bg-pink">
              <div class="inner">
                <h5><?php echo $user1['pool1']; ?></h5>

                <h5>Pool 1</h5>
              </div>
              <div class="icon">
                <i class="ion ion-cube"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-12">
            <!-- small box -->
            <div class="small-box bg-navy">
              <div class="inner">
                <h5><?php echo $user1['pool2']; ?><sup style="font-size: 20px"></sup></h5>

                <h5>Pool 2</h5>
              </div>
              <div class="icon">
                <i class="ion ion-cube"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-12">
            <!-- small box -->
            <div class="small-box bg-teal">
              <div class="inner">
                <h5><?php echo $user1['pool3']; ?></h5>

                <h5>Pool 3</h5>
              </div>
              <div class="icon">
                <i class="ion ion-cube"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-12">
            <!-- small box -->
            <div class="small-box bg-indigo">
              <div class="inner">
                <h5><?php echo $user1['pool4']; ?></h5>

                <h5>Pool 4</h5>
              </div>
              <div class="icon">
                <i class="ion ion-cube"></i>
              </div>
            </div>
          </div>
          
          <!-- ./col -->
          <div class="col-lg-3 col-12">
            <!-- small box -->
            <div class="small-box bg-orange">
              <div class="inner">
                <h5><?php echo $user1['pool5']; ?></h5>

                <h5>Pool 5</h5>
              </div>
              <div class="icon">
                <i class="ion ion-cube"></i>
              </div>
            </div>
          </div>
          
          <!-- ./col -->
          <div class="col-lg-3 col-12">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner">
                <h5><?php echo $user1['pool6']; ?></h5>

                <h5>Pool 6</h5>
              </div>
              <div class="icon">
                <i class="ion ion-cube"></i>
              </div>
            </div>
          </div>
          
          <!-- ./col -->
          
        </div> 
      </div><!-- /.container-fluid -->
     
    </section>
    <!-- /.content -->
  </div>

 <?php include("footer.php"); ?>
</body>
</html>
