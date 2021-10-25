<?php
include("redirect0.php");
include('connect.php');
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
      <h3 class="text-center text-success" style="font-family: 'Playfair Display', serif;">Downline</h3>

      <div class="col-lg-10 col-12 container border rounded bg-white p-2" >

      <div class="table-responsive">
            <table class="table ">
                <thead class="text-center">
                    <tr class="d-flex">
                    <th class="col-2">Level</th>
                    <th class="col-3">Name</th>
                    <th class="col-3">Mobile</th>
                    <th class="col-3">Sponsor Name</th>
                    <th class="col-3">status</th>
                    
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    // Level 1 code
                    $level= $_SESSION['Id'];
                    $sql = "SELECT * FROM login WHERE sponsor = $level ORDER BY Id asc";
                    $queryfire=mysqli_query($conn, $sql);
                    $num=mysqli_num_rows($queryfire);
                    if($num>0){
                        while($product=mysqli_fetch_array($queryfire)){
                            $i=1;
                            echo"<tr class='d-flex'>
                            <td class='col-2'>$i</td>
                            <td class='col-3'>$product[Name]</td>
                            <td class='col-3'>$product[mob]</td>
                            <td class='col-3'>$product[spName]</td>
                            <td class='col-3'>$product[Status]</td></tr>";
                            
                        // level 2 code 
                            $sql1 = "SELECT * FROM login WHERE sponsor = $product[Id]  ORDER BY Id asc";
                            $queryfire1=mysqli_query($conn, $sql1);
                            $num1=mysqli_num_rows($queryfire1);
                            if($num1>0){
                                while($product1=mysqli_fetch_array($queryfire1)){
                                    $i=2;
                                    echo"<tr class='d-flex'>
                                    <td class='col-2'>$i</td>
                                    <td class='col-3'>$product1[Name]</td>
                                    <td class='col-3'>$product1[mob]</td>
                                    <td class='col-3'>$product1[spName]</td>
                                    <td class='col-3'>$product1[Status]</td></tr>";
                                  
                                    // Level 3 code
                                    $sql2 = "SELECT * FROM login WHERE sponsor = $product1[Id]  ORDER BY Id asc";
                                    $queryfire2=mysqli_query($conn, $sql2);
                                    $num2=mysqli_num_rows($queryfire2);
                                    if($num2>0){
                                        while($product2=mysqli_fetch_array($queryfire2)){
                                            $i=3;
                                            echo"<tr class='d-flex'>
                                            <td class='col-2'>$i</td>
                                            <td class='col-3'>$product2[Name]</td>
                                            <td class='col-3'>$product2[mob]</td>
                                            <td class='col-3'>$product2[spName]</td>
                                            <td class='col-3'>$product2[Status]</td></tr>";
                                            
                                            
                                            // Level 4 code
                                            $sql3 = "SELECT * FROM login WHERE sponsor = $product2[Id]  ORDER BY Id asc";
                                            $queryfire3=mysqli_query($conn, $sql3);
                                            $num3=mysqli_num_rows($queryfire3);
                                            if($num3>0){
                                                while($product3=mysqli_fetch_array($queryfire3)){
                                                    $i=4;
                                                    echo"<tr class='d-flex'>
                                                    <td class='col-2'>$i</td>
                                                    <td class='col-3'>$product3[Name]</td>
                                                    <td class='col-3'>$product3[mob]</td>
                                                    <td class='col-3'>$product3[spName]</td>
                                                    <td class='col-3'>$product3[Status]</td></tr>";
                                                    
                                            
                                                    // Level 5 code
                                                    $sql4 = "SELECT * FROM login WHERE sponsor = $product3[Id]  ORDER BY Id asc";
                                                    $queryfire4=mysqli_query($conn, $sql4);
                                                    $num4=mysqli_num_rows($queryfire4);
                                                    if($num4>0){
                                                        while($product4=mysqli_fetch_array($queryfire4)){
                                                            $i=5;
                                                            echo"<tr class='d-flex'>
                                                            <td class='col-2'>$i</td>
                                                            <td class='col-3'>$product4[Name]</td>
                                                            <td class='col-3'>$product4[mob]</td>
                                                            <td class='col-3'>$product4[spName]</td>
                                                            <td class='col-3'>$product4[Status]</td></tr>";
                                                           
                                                            // Level 6 code
                                                            $sql5 = "SELECT * FROM login WHERE sponsor = $product4[Id]  ORDER BY Id asc";
                                                            $queryfire5=mysqli_query($conn, $sql5);
                                                            $num5=mysqli_num_rows($queryfire5);
                                                            if($num5>0){
                                                                while($product5=mysqli_fetch_array($queryfire5)){
                                                                    $i=6;
                                                                    echo"<tr class='d-flex'>
                                                                    <td class='col-2'>$i</td>
                                                                    <td class='col-3'>$product5[Name]</td>
                                                                    <td class='col-3'>$product5[mob]</td>
                                                                    <td class='col-3'>$product5[spName]</td>
                                                                    <td class='col-3'>$product5[Status]</td></tr>";
                                                                    
                                                                    // Level 6 code
                                                                    $sql6= "SELECT * FROM login WHERE sponsor = $product5[Id]  ORDER BY Id asc";
                                                                    $queryfire6=mysqli_query($conn, $sql6);
                                                                    $num6=mysqli_num_rows($queryfire6);
                                                                    if($num6>0){
                                                                        while($product6=mysqli_fetch_array($queryfire6)){
                                                                            $i=7;
                                                                            echo"<tr class='d-flex'>
                                                                            <td class='col-2'>$i</td>
                                                                            <td class='col-3'>$product6[Name]</td>
                                                                            <td class='col-3'>$product6[mob]</td>
                                                                            <td class='col-3'>$product6[spName]</td>
                                                                            <td class='col-3'>$product6[Status]</td></tr>";
                                                                            
                                                                    
                                                                        }

                                                                    }
                                                                }

                                                            }
                                                        }

                                                    }
                                                }

                                            }
                                        }

                                    }

                                }
                            }
                        
                        }
                    }
                    
                    ?>
                </tbody>
            </table>
           
        </div>
      </div>
      </div><!-- /.container-fluid -->
     
    </section>
    <!-- /.content -->
  </div>
 <?php include("footer.php"); ?>
</body>
</html>
