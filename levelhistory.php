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
      <h3 class="text-center text-success" style="font-family: 'Playfair Display', serif;">Level Income History</h3>
      <div class="col-lg-10 col-12 container border rounded bg-white p-2" >
        <div class="table-responsive">
            <table class="table table-striped">
              <thead class="text-center">
                <tr class="d-flex">
                  <th class="col bg-secondary">#</th>
                  <th class="col bg-secondary">Level</th>
                  <th class="col bg-secondary">Amount </th>
                  <th class="col bg-secondary">Date </th>
                  <th class="col bg-secondary">Status</th>
                </tr>
              </thead>
              <tbody class="text-center">
              <?php
                    $email= $_SESSION['email'];
                    $sql = "SELECT * FROM levelhistory WHERE email = '$email' and level!=0 ORDER BY Sno desc";
                    $queryfire=mysqli_query($conn, $sql);
                    $num=mysqli_num_rows($queryfire);
                    $i=1;
                    if($num>0){
                        while($pin=mysqli_fetch_array($queryfire)){
                            echo"<tr class='d-flex'>
                            <td class='col'>$i</td>
                            <td class='col'>$pin[level]</td>
                            <td class='col'>$pin[trx]</td>
                            <td class='col'>$pin[date]</td>
                            <td class='col text-success'><b>$pin[Status]</b></td>
                            </tr>";
                            $i=$i+1;
                        }
                    }
                    else{
                      echo "<h5 class='text-danger'> No Record Found!</h5>";
                    }
                ?>            
               
              </tbody>
            </table>
            <!-- Table end -->
         
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
