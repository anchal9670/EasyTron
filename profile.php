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
       <!-- Profile -->
        <?php
        $email= $_SESSION['email'];    
        $query="SELECT * from login WHERE email='$email'  LIMIT 1";
        $queryfire=mysqli_query($conn, $query);
        $num=mysqli_num_rows($queryfire);

        if($num>0){
            while($product=mysqli_fetch_array($queryfire)){
        ?>
        <div class="row p-3">
            <div class="col-lg-10 col-12 container border rounded bg-white ">
                
                <div class="form p-2 col-lg-8 col-12 m-auto">         
                <h3 class="text-center text-success" style="font-family: 'Playfair Display', serif;">Profile Details</h3>
                    
                    <form >
                    <h5 class="text-danger">Personal Details</h5>
                    <div class="form-group">
                    <label for="name" class="text-primary ">Name</label>
                    <input type="text" id="name"  class="form-control " value="<?php echo $product['Name'];?>" disabled>
                    </div><div class="form-group">
                    <label for="mob" class="text-primary ">Mobile Number</label>
                    <input type="text" id="mob"  class="form-control " value="<?php echo $product['mob'];?>" disabled>
                    </div><div class="form-group">
                    <label for="email" class="text-primary ">E-mail</label>
                    <input type="tel" id="email"   class="form-control " value="<?php echo $product['email'];?>" disabled>
                    </div><div class="form-group">
                    <label for="dob" class="text-primary ">Date Of Birth </label>
                    <input type="text" id="dob"  class="form-control " value="<?php echo $product['date'];?>" disabled>
                    </div><div class="form-group">
                    <label for="add" class="text-primary ">Address</label>
                    <input type="text" id="add"  class="form-control " value="<?php echo $product['address'];?>" disabled>
                    </div>
                    <div class="form-group">
                    <label for="city" class="text-primary ">City</label>
                    <input type="text" id="city"  class="form-control " value="<?php echo $product['city'];?>" disabled>
                    </div>
                    <div class="form-group">
                    <label for="pin" class="text-primary ">Pin Code</label>
                    <input type="text" id="pin"  class="form-control " value="<?php echo $product['pin'];?>" disabled>
                    </div>
                    <div class="form-group">
                    <label for="state" class="text-primary ">State</label>
                    <input type="text" id="state"  class="form-control " value="<?php echo $product['state'];?>" disabled>
                    </div>
                    <div class="form-group">
                    <label for="country" class="text-primary ">Country</label>
                    <input type="text" id="country"  class="form-control " value="<?php echo $product['country'];?>" disabled>
                    </div>
                    <h5 class="text-danger">Trx Details</h5>
                    
                    <div class="form-group">
                    <label for="bankname" class="text-primary ">Trx Address</label>
                    <input type="text" id="bankname"  class="form-control " value="<?php echo $product['tronadd'];?>" disabled>
                    </div>
                    
                
                </form>

                </div>
            </div>

        </div>
        <?php 
            }
        }
        ?>
      </div><!-- /.container-fluid -->
     
    </section>
    <!-- /.content -->
  </div>
 <?php include("footer.php"); ?>
</body>
</html>
