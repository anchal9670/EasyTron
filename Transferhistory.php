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
      <h3 class="text-center text-success" style="font-family: 'Playfair Display', serif;">Transaction History</h3>

      <div class="col-lg-10 col-12 container border rounded bg-white p-2" >
      <?php
      $email= $_SESSION['email'];
      $sql = "SELECT * FROM transfer WHERE email = '$email' ORDER BY rdate desc";
      $queryfire=mysqli_query($conn, $sql);
      $num=mysqli_num_rows($queryfire);
      $i=1;
      if($num>0){  
      ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="text-center">
                    <tr class="d-flex">
                    <th class="col bg-black">Sr No.</th>
                    <th class="col bg-black">Request Trx</th>
                    <th class="col bg-black">TDS</th>
                    <th class="col bg-black">Service Charge</th>
                    <th class="col bg-black">Net Transfer</th>
                    <th class="col bg-black">Request Date</th>
                    <th class="col bg-black">Status</th>
                    <th class="col bg-black">Transfer In</th>

                    <th class="col bg-black">Confirm Date</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                        while($pin=mysqli_fetch_array($queryfire)){
                           $tds=$pin['rtrx']*0.05;
                           $service=$pin['rtrx']*0.05;
                            if($pin['tron']=='TrxWallet')
                            {
                            echo"<tr class='d-flex'>
                            <td class='col'>$i</td>
                            <td class='col'>$pin[rtrx]</td>
                            <td class='col'>$tds</td>
                            <td class='col'>$service</td>
                            <td class='col'>$pin[ntrx]</td>
                            <td class='col'>$pin[rdate]</td>
                            <td class='col'>$pin[status]</td>
                            <td class='col'>$pin[tron]</td>
                            
                            <td class='col'>$pin[cdate]</td></tr>";
                            $i=$i+1;
                            }
                            if($pin['tron']=='PinWallet')
                            {
                            echo"<tr class='d-flex'>
                            <td class='col'>$i</td>
                            <td class='col'>$pin[rtrx]</td>
                            <td class='col'>0.00</td>
                            <td class='col'>$service</td>
                            <td class='col'>$pin[ntrx]</td>
                            <td class='col'>$pin[rdate]</td>
                            <td class='col'>$pin[status]</td>
                            <td class='col'>$pin[tron]</td>
                            
                            <td class='col'>$pin[cdate]</td></tr>";
                            $i=$i+1;
                            }
                        }
                    
                    
                    ?>
                </tbody>
            </table>
           
        </div>
        <?php
        }
        else
        {
        ?>
        <h5 class="text-center text-danger" style="font-family: 'Playfair Display', serif;">No record found !</h5>
        <?php
        }
        ?>
      </div>
      </div><!-- /.container-fluid -->
     
    </section>
    <!-- /.content -->
  </div>
 <?php include("footer.php"); ?>
</body>
</html>
