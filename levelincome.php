<?php
include("redirect0.php");
include('connect.php');
//login Detail


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
      <h3 class="text-center text-success" style="font-family: 'Playfair Display', serif;">Level Income</h3>

      <?php
      $email= $_SESSION['email'];

      $query = "SELECT * FROM level WHERE email='$email'";
      $result = mysqli_query($conn, $query);
      $user = mysqli_fetch_assoc($result);
      ?>
      <div class="col-lg-10 col-12 container border rounded bg-white p-2" >
        <div class="table-responsive">
        <form action="levelaction.php" method="post">
            <table class="table table-striped">
              <thead class="text-center">
                <tr class="d-flex">
                  <th class="col-2 bg-black">Level</th>
                  <th class="col-2 bg-black">Total Income</th>
                  <th class="col-2 bg-black">Balance </th>
                  <th class="col-2 bg-black">Paid </th>
                  <th class="col-1 bg-black" style="width: 25px">Daily</th>
                  <th class="col-3 bg-black">Today Claim</th>

                </tr>
              </thead>
              <tbody class="text-center">
                <tr class="d-flex">
                  <td class="col-2">1.</td>
                  <td class="col-2"><?php echo $user['L1'];?></td>
                  <td class="col-2"><?php echo $user['BL1'];?></td>
                  <td class="col-2"><?php $sum=$user['L1']-$user['BL1']; echo $sum;?></td>
                  <td class="col-1"><span class="badge bg-pink"> 1% </span></td>
                  <td class="col-3"><?php
                  $date=date("Ymd");
                  $user_check_query = "SELECT Status FROM levelhistory WHERE email='$email' and level=1 and date=$date";
                  $result = mysqli_query($conn, $user_check_query);
                  $row=mysqli_num_rows($result);
                  if($user['BL1']==0)
                  {
                    if($user['L1']==0)
                    {

                    }
                    else
                    {
                      ?>
                      <button class="btn btn-success flex-fill" style="font-family: 'Sansita', sans-serif; font-size:13px;">Paid</button>
                      <?php
                    }
                  }
                  else{
                    if($row>0){
                      ?>
                      <button class="btn btn-success flex-fill" name="one" style="font-family: 'Sansita', sans-serif; font-size:13px;">Success</button>
                      <?php
                    }
                    else{
                      ?>
                      <button class="btn btn-danger flex-fill" name="one1"style="font-family: 'Sansita', sans-serif; font-size:13px;">Pending</button>
                      <?php
                    }
                  }
                  ?> </td>
                </tr>
                <tr class="d-flex">
                  <td class="col-2">2.</td>
                  <td class="col-2"><?php echo $user['L2'];?></td>
                  <td class="col-2"><?php echo $user['BL2'];?></td>
                  <td class="col-2"><?php $sum1=$user['L2']-$user['BL2']; echo $sum1;?></td>
                  <td class="col-1"><span class="badge bg-dark">1%</span></td>
                  <td class="col-3"><?php
                  $date=date("Ymd");
                  $user_check_query = "SELECT Status FROM levelhistory WHERE email='$email' and level=2 and date=$date";
                  $result = mysqli_query($conn, $user_check_query);
                  $row=mysqli_num_rows($result);
                  if($user['BL2']==0)
                  {
                    if($user['L2']==0)
                    {

                    }
                    else
                    {
                      ?>
                      <button class="btn btn-success flex-fill" style="font-family: 'Sansita', sans-serif; font-size:13px;">Paid</button>
                      <?php
                    }
                  }
                  else{
                    if($row>0){
                      ?>
                      <button class="btn btn-success flex-fill" name="two"  style="font-family: 'Sansita', sans-serif; font-size:13px;">Success</button>
                      <?php
                    }
                    else{
                      ?>
                      <button class="btn btn-danger flex-fill" name="two1"  style="font-family: 'Sansita', sans-serif; font-size:13px;">Pending</button>
                      <?php
                    }
                  }
                  ?> </td>
                </tr>
                <tr class="d-flex">
                  <td class="col-2">3.</td>
                  <td class="col-2"><?php echo $user['L3'];?></td>
                  <td class="col-2"><?php echo $user['BL3'];?></td>
                  <td class="col-2"><?php $sum2=$user['L3']-$user['BL3']; echo $sum2;?></td>
                  <td class="col-1"><span class="badge bg-indigo">1%</span></td>
                  <td class="col-3"><?php
                  $date=date("Ymd");
                  $user_check_query = "SELECT Status FROM levelhistory WHERE email='$email' and level=3 and date=$date";
                  $result = mysqli_query($conn, $user_check_query);
                  $row=mysqli_num_rows($result);
                  if($user['BL3']==0)
                  {
                    if($user['L3']==0)
                    {

                    }
                    else
                    {
                      ?>
                      <button class="btn btn-success flex-fill" style="font-family: 'Sansita', sans-serif; font-size:13px;">Paid</button>
                      <?php
                    }
                  }
                  else{
                    if($row>0){
                      ?>
                      <button class="btn btn-success flex-fill" name="three"  style="font-family: 'Sansita', sans-serif; font-size:13px;">Success</button>
                      <?php
                    }
                    else{
                      ?>
                      <button class="btn btn-danger flex-fill" name="three1"  style="font-family: 'Sansita', sans-serif; font-size:13px;">Pending</button>
                      <?php
                    }
                  }
                  ?> </td>
                </tr>
                <tr class="d-flex">
                  <td class="col-2">4.</td>
                  <td class="col-2"><?php echo $user['L4'];?></td>
                  <td class="col-2"><?php echo $user['BL4'];?></td>
                  <td class="col-2"><?php $sum3=$user['L4']-$user['BL4']; echo $sum3;?></td>
                  <td class="col-1"><span class="badge bg-teal">1%</span></td>
                  <td class="col-3"><?php
                  $date=date("Ymd");
                  $user_check_query = "SELECT Status FROM levelhistory WHERE email='$email' and level=4 and date=$date";
                  $result = mysqli_query($conn, $user_check_query);
                  $row=mysqli_num_rows($result);
                  if($user['BL4']==0)
                  {
                    if($user['L4']==0)
                    {

                    }
                    else
                    {
                      ?>
                      <button class="btn btn-success flex-fill" style="font-family: 'Sansita', sans-serif; font-size:13px;">Paid</button>
                      <?php
                    }
                  }
                  else{
                    if($row>0){
                      ?>
                      <button class="btn btn-success flex-fill" name="four"  style="font-family: 'Sansita', sans-serif; font-size:13px;">Success</button>
                      <?php
                    }
                    else{
                      ?>
                      <button class="btn btn-danger flex-fill" name="four1"  style="font-family: 'Sansita', sans-serif; font-size:13px;">Pending</button>
                      <?php
                    }
                  }
                  ?> </td>
                </tr>
                <tr class="d-flex">
                  <td class="col-2">5.</td>
                  <td class="col-2"><?php echo $user['L5'];?></td>
                  <td class="col-2"><?php echo $user['BL5'];?></td>
                  <td class="col-2"><?php $sum5=$user['L5']-$user['BL5']; echo $sum5;?></td>
                  <td class="col-1"><span class="badge bg-orange">1%</span></td>
                  <td class="col-3"><?php
                  $date=date("Ymd");
                  $user_check_query = "SELECT Status FROM levelhistory WHERE email='$email' and level=5 and date=$date";
                  $result = mysqli_query($conn, $user_check_query);
                  $row=mysqli_num_rows($result);
                  if($user['BL5']==0)
                  {
                    if($user['L5']==0)
                    {

                    }
                    else
                    {
                      ?>
                      <button class="btn btn-success flex-fill" style="font-family: 'Sansita', sans-serif; font-size:13px;">Paid</button>
                      <?php
                    }
                  }
                  else{
                    if($row>0){
                      ?>
                      <button class="btn btn-success flex-fill" name="five"  style="font-family: 'Sansita', sans-serif; font-size:13px;">Success</button>
                      <?php
                    }
                    else{
                      ?>
                      <button class="btn btn-danger flex-fill" name="five1"  style="font-family: 'Sansita', sans-serif; font-size:13px;">Pending</button>
                      <?php
                    }
                  }
                  ?> </td>
                </tr>
                <tr class="d-flex">
                  <td class="col-2">6.</td>
                  <td class="col-2"><?php echo $user['L6'];?></td>
                  <td class="col-2"><?php echo $user['BL6'];?></td>
                  <td class="col-2"><?php $sum6=$user['L6']-$user['BL6']; echo $sum6;?></td>
                  <td class="col-1"><span class="badge bg-purple">1%</span></td>
                  <td class="col-3"><?php
                  $date=date("Ymd");
                  $user_check_query = "SELECT Status FROM levelhistory WHERE email='$email' and level=6 and date=$date";
                  $result = mysqli_query($conn, $user_check_query);
                  $row=mysqli_num_rows($result);
                  if($user['BL6']==0)
                  {
                    if($user['L6']==0)
                    {

                    }
                    else
                    {
                      ?>
                      <button class="btn btn-success flex-fill" style="font-family: 'Sansita', sans-serif; font-size:13px;">Paid</button>
                      <?php
                    }
                  }
                  else{
                    if($row>0){
                      ?>
                      <button class="btn btn-success flex-fill" name="six"  style="font-family: 'Sansita', sans-serif; font-size:13px;">Success</button>
                      <?php
                    }
                    else{
                      ?>
                      <button class="btn btn-danger flex-fill" name="six1"  style="font-family: 'Sansita', sans-serif; font-size:13px;">Pending</button>
                      <?php
                    }
                  }
                  ?> </td>
                </tr>
                <tr class="d-flex">
                  <td class="col-2">7.</td>
                  <td class="col-2"><?php echo $user['L7'];?></td>
                  <td class="col-2"><?php echo $user['BL7'];?></td>
                  <td class="col-2"><?php $sum7=$user['L7']-$user['BL7']; echo $sum7;?></td>
                  <td class="col-1"><span class="badge bg-info">1%</span></td>
                  <td class="col-3"><?php
                  $date=date("Ymd");
                  $user_check_query = "SELECT Status FROM levelhistory WHERE email='$email' and level=7 and date=$date";
                  $result = mysqli_query($conn, $user_check_query);
                  $row=mysqli_num_rows($result);
                  if($user['BL7']==0)
                  {
                    if($user['L7']==0)
                    {

                    }
                    else
                    {
                      ?>
                      <button class="btn btn-success flex-fill" style="font-family: 'Sansita', sans-serif; font-size:13px;">Paid</button>
                      <?php
                    }
                  }
                  else{
                    if($row>0){
                      ?>
                      <button class="btn btn-success flex-fill" name="seven"  style="font-family: 'Sansita', sans-serif; font-size:13px;">Success</button>
                      <?php
                    }
                    else{
                      ?>
                      <button class="btn btn-danger flex-fill" name="seven1"  style="font-family: 'Sansita', sans-serif; font-size:13px;">Pending</button>
                      <?php
                    }
                  }
                  ?> </td>
                </tr>
              </tbody>
            </table>
            <!-- Table end -->
            </form>
        </div>
        </div>
      <!--End-->
      </div><!-- /.container-fluid -->
     
    </section>
    <!-- /.content -->
  </div>


 <?php include("footer.php"); ?>
</body>
</html>
