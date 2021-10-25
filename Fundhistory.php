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
      <h3 class="text-center text-success" style="font-family: 'Playfair Display', serif;">Add Fund History</h3>

      <div class="col-lg-10 col-12 container border rounded bg-white p-2" >
      <?php
       $email= $_SESSION['email'];
       $sql = "SELECT * FROM fund WHERE email = '$email' ORDER BY date desc";
       $queryfire=mysqli_query($conn, $sql);
       $num=mysqli_num_rows($queryfire);
       $i=1;
       if($num>0){
      ?>
       
        <div class="table-responsive">
          <table class="table table-striped">
            <thead class="text-center">
                <tr class="d-flex">
                <th class="col bg-secondary">Sr No.</th>
                <th class="col bg-secondary">Transaction Id</th>
                <th class="col bg-secondary">Trx Amount</th>
                <th class="col bg-secondary">Date</th>
                <th class="col bg-secondary">Status</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                
                
                    while($pin=mysqli_fetch_array($queryfire)){
                      if($pin['status']=='Success')
                      {
                        echo"<tr class='d-flex'>
                        <td class='col'>$i</td>
                        <td class='col' style='display: inline-block;
                        width: 200px;
                        white-space: nowrap;
                        overflow: hidden !important;
                        text-overflow: ellipsis;'>$pin[hashf]</td>
                        <td class='col'>$pin[tron]</td>
                        <td class='col'>$pin[date]</td>
                        <td class='col text-success font-weight-bold'>$pin[status]</td>
                        <td class='col'>
                        <form action='FundhistoryShow.php' method='GET'>
                            <input class='text-center' name='trxid' type='hidden' value='$pin[hashf]' >
                        
                            <button class='btn btn-sm btn-success' name='show1'>$pin[status]</button>    </form> </td>
                        </tr>";
                        $i=$i+1;
                        
                      }
                      else
                      {
                        echo"<tr class='d-flex'>
                        <td class='col'>$i</td>
                        <td class='col' style='display: inline-block;
                        width: 200px;
                        white-space: nowrap;
                        overflow: hidden !important;
                        text-overflow: ellipsis;'>$pin[hashf]</td>
                        <td class='col'>$pin[tron]</td>
                        <td class='col'>$pin[date]</td>
                        <td class='col'>
                        <form action='FundhistoryShow.php' method='GET'>
                            <input class='text-center' name='trxid' type='hidden' value='$pin[hashf]' >
                        
                            <button class='btn btn-sm btn-danger' name='show1'>$pin[status]</button>    </form> </td>
                        </tr>";
                        $i=$i+1;
                      } 
                    }
                
                
                ?>
            </tbody>
          </table>
        </div>
      <?php
      }
      else {
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
