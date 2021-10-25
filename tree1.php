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
    <img class="img-circle animation__shake" src="dist/img/AdminLTELogo.jpg" alt="AdminLTELogo" height="60" width="60">
  </div>

 <!-- Sidebar -->
<?php include('sidebar.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
    <!-- Main content -->
    <section class="content ">
    <div class="container-fluid">
    <h3 class="text-center text-success" style="font-family: 'Playfair Display', serif;">Tree View</h3>
  
    <div class="col-lg-10 col-12 container border rounded bg-white p-2 " >
            <div class="table-responsive">
            <div class="col-lg-12">
                <table class="table ">
                    <thead class="text-center">
                        <tr class="d-flex">
                        <th class="col-1 bg-secondary">Level</th>
                        <th class="col-2 bg-secondary">Name</th>
                        <th class="col-3 bg-secondary">Mobile</th>
                        <th class="col-3 bg-secondary">Refler Name</th>
                        <th class="col-2 bg-secondary">status</th>
                        <th class="col-1 bg-secondary">Direct</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">

                <?php
               

                $level=$_SESSION['Id'] ;
                $sql = "SELECT * FROM login WHERE Id = $level ORDER BY Id asc";
                $queryfire=mysqli_query($conn, $sql);
                $num=mysqli_num_rows($queryfire);
                ?>
                <div class="container pl-5">
                <div class="row border-left-1 border-success"><?Php
                if($num>0){
                    while($product=mysqli_fetch_array($queryfire)){
                        $i='my';
                        echo"<tr class='d-flex'>
                        <td class='col-1'>$i</td>
                        
                        <td class='col-2'>$product[Name]</td>
                        <td class='col-3'>$product[mob]</td>
                        <td class='col-3'>$product[spName]</td>
                        <td class='col-2'>$product[Status]</td>
                        <td class='col-1'>   
                        <form action='tree1.php' method='POST'>
                        <input class='text-center' name='sponsor' type='hidden' value='$product[Id]' >
                    
                        <button class='btn btn-sm btn-success' name='show'> $product[refler] </button>    </form> </td>
                        
                        </tr>";
                    
                    }
                }?>
                </div>
                </div>
                <?php
                if($_SERVER["REQUEST_METHOD"]=="POST")
                {
                if(isset($_POST['show']))
                {
                    $sponsor=$_POST['sponsor'];
                    $sql = "SELECT * FROM login WHERE sponsor = '$sponsor'";
                    $queryfire1=mysqli_query($conn, $sql);
                    $num=mysqli_num_rows($queryfire1);
                    ?>
                    <div class="container pl-5">
                    <div class="row border-left-1 border-success"><?Php
                    if($num>0){
                        while($product=mysqli_fetch_array($queryfire1)){
                            $i=1;
                            echo"<tr class='d-flex'>
                            <td class='col-1'>$i</td>
                            
                            <td class='col-2'>$product[Name]</td>
                            <td class='col-3'>$product[mob]</td>
                            <td class='col-3'>$product[spName]</td>
                            
                            <td class='col-2'>$product[Status]</td>
                            <td class='col-1'>   
                            <form action='tree1.php' method='POST'>
                            <input class='text-center' name='sponsor1' type='hidden' value='$product[Id]' >
                        
                            <button class='btn btn-sm btn-success' name='show1'>$product[refler]</button>    </form> </td>
                        
                            </tr>";
                        
                                }
                                
                            }
                            ?>
                        </div>
                    </div>
                    <?php				
                }
                if(isset($_POST['show1']))
                {
                    $sponsor1=$_POST['sponsor1'];
                    $sql = "SELECT * FROM login WHERE sponsor = '$sponsor1'";
                    $queryfire2=mysqli_query($conn, $sql);
                    $num=mysqli_num_rows($queryfire2);
                    ?>
                    <div class="container pl-5">
                    <div class="row border-left-1 border-success"><?Php
                    if($num>0){
                        while($product=mysqli_fetch_array($queryfire2)){
                            $i=2;
                            echo"<tr class='d-flex'>
                            <td class='col-1'>$i</td>
                            
                            <td class='col-2'>$product[Name]</td>
                            <td class='col-3'>$product[mob]</td>
                            <td class='col-3'>$product[spName]</td>
                            
                            <td class='col-2'>$product[Status]</td>
                            <td class='col-1'>   
                            <form action='tree1.php' method='POST'>
                            <input class='text-center' name='sponsor2' type='hidden' value='$product[Id]' >
                        
                            <button class='btn btn-sm btn-success' name='show2'>$product[refler]</button>    </form> </td>
                        
                            </tr>";
                            
                                }
                                
                            }
                            ?>
                        </div>
                    </div>
                    <?php				
                }
                if(isset($_POST['show2']))
                {
                    $sponsor2=$_POST['sponsor2'];
                    $sql = "SELECT * FROM login WHERE sponsor = '$sponsor2'";
                    $queryfire2=mysqli_query($conn, $sql);
                    $num=mysqli_num_rows($queryfire2);
                    ?>
                    <div class="container pl-5">
                        <div class="row border-left-1 border-success"><?Php
                    if($num>0){
                        while($product=mysqli_fetch_array($queryfire2)){
                            $i=3;
                            echo"<tr class='d-flex'>
                            <td class='col-1'>$i</td>
                            
                            <td class='col-2'>$product[Name]</td>
                            <td class='col-3'>$product[mob]</td>
                            <td class='col-3'>$product[spName]</td>
                            <td class='col-2'>$product[Status]</td>
                            <td class='col-1'>   
                            <form action='tree1.php' method='POST'>
                            <input class='text-center' name='sponsor3' type='hidden' value='$product[Id]' >
                        
                            <button class='btn btn-sm btn-success' name='show3'>$product[refler]</button>    </form> </td>
                        
                            </tr>";
                            
                                }
                                
                            }
                            ?>
                        </div>
                    </div>
                    <?php				
                }
                if(isset($_POST['show3']))
                {
                    $sponsor3=$_POST['sponsor3'];
                    $sql = "SELECT * FROM login WHERE sponsor = '$sponsor3'";
                    $queryfire2=mysqli_query($conn, $sql);
                    $num=mysqli_num_rows($queryfire2);
                    ?>
                    <div class="container pl-5">
                        <div class="row border-left-1 border-success"><?Php
                    if($num>0){
                        while($product=mysqli_fetch_array($queryfire2)){
                            $i=4;
                            echo"<tr class='d-flex'>
                            <td class='col-1'>$i</td>
                            
                            <td class='col-2'>$product[Name]</td>
                            <td class='col-3'>$product[mob]</td>
                            <td class='col-3'>$product[spName]</td>
                            
                            <td class='col-2'>$product[Status]</td>
                            <td class='col-1'>   
                            <form action='tree1.php' method='POST'>
                            <input class='text-center' name='sponsor4' type='hidden' value='$product[Id]' >
                        
                            <button class='btn btn-sm btn-success' name='show4'>$product[refler]</button>    </form> </td>
                        
                            </tr>";
                        
                                }
                                
                            }
                            ?>
                        </div>
                    </div>
                    <?php				
                }
                if(isset($_POST['show4']))
                {
                    $sponsor4=$_POST['sponsor4'];
                    $sql = "SELECT * FROM login WHERE sponsor = '$sponsor4'";
                    $queryfire2=mysqli_query($conn, $sql);
                    $num=mysqli_num_rows($queryfire2);
                    ?>
                    <div class="container pl-5">
                        <div class="row border-left-1 border-success"><?Php
                    if($num>0){
                        while($product=mysqli_fetch_array($queryfire2)){
                            $i=5;
                            echo"<tr class='d-flex'>
                            <td class='col-1'>$i</td>
                            
                            <td class='col-2'>$product[Name]</td>
                            <td class='col-3'>$product[mob]</td>
                            <td class='col-3'>$product[spName]</td>
                            
                            <td class='col-2'>$product[Status]</td>
                            <td class='col-1'>   
                            <form action='tree1.php' method='POST'>
                            <input class='text-center' name='sponsor5' type='hidden' value='$product[Id]' >
                        
                            <button class='btn btn-sm btn-success' name='show5'>$product[refler]</button>    </form> </td>
                        
                            </tr>";
                            
                                }
                                
                            }
                            ?>
                        </div>
                    </div>
                    <?php				
                }
                if(isset($_POST['show5']))
                {
                    $sponsor5=$_POST['sponsor5'];
                    $sql = "SELECT * FROM login WHERE sponsor = '$sponsor5'";
                    $queryfire2=mysqli_query($conn, $sql);
                    $num=mysqli_num_rows($queryfire2);
                    ?>
                    <div class="container pl-5">
                        <div class="row border-left-1 border-success"><?Php
                    if($num>0){
                        while($product=mysqli_fetch_array($queryfire2)){
                            $i=6;
                            echo"<tr class='d-flex'>
                            <td class='col-1'>$i</td>
                            
                            <td class='col-2'>$product[Name]</td>
                            <td class='col-3'>$product[mob]</td>
                            <td class='col-3'>$product[spName]</td>
                            
                            <td class='col-2'>$product[Status]</td>
                            <td class='col-1'>   
                            <form action='tree1.php' method='POST'>
                            <input class='text-center' name='sponsor6' type='hidden' value='$product[Id]' >
                        
                            <button class='btn btn-sm btn-success' name='show6'>$product[refler]</button>    </form> </td>
                        
                            </tr>";
                            
                                }
                                
                            }
                            ?>
                        </div>
                    </div>
                    <?php				
                }
                if(isset($_POST['show6']))
                {
                    $sponsor6=$_POST['sponsor6'];
                    $sql = "SELECT * FROM login WHERE sponsor = '$sponsor6'";
                    $queryfire2=mysqli_query($conn, $sql);
                    $num=mysqli_num_rows($queryfire2);
                    ?>
                    <div class="container pl-5">
                        <div class="row border-left-1 border-success"><?Php
                    if($num>0){
                        while($product=mysqli_fetch_array($queryfire2)){
                            $i=7;
                            echo"<tr class='d-flex'>
                            <td class='col-1'>$i</td>
                            
                            <td class='col-2'>$product[Name]</td>
                            <td class='col-3'>$product[mob]</td>
                            <td class='col-3'>$product[spName]</td>
                            
                            <td class='col-2'>$product[Status]</td>
                            <td class='col-1'>   
                            <form action='tree1.php' method='POST'>
                            <input class='text-center' name='sponsor7' type='hidden' value='$product[Id]' >
                        
                            <button class='btn btn-sm btn-success' name='show7'>$product[refler]</button>    </form> </td>
                        
                            </tr>";
                            
                        
                                }
                                
                            }
                            ?>
                        </div>
                    </div>
                    <?php				
                }
                }

                ?>
                </tbody>
            </table>
        </div>
        </div>      
    </div>

    </div><!-- /.container-fluid -->
     
    </section>
    <!-- /.content -->
  </div>
 <?php include("footer.php"); ?>
</body>
</html>
