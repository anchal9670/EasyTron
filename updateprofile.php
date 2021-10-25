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
  <style>
 .btn01{
        display:block;
        background-color:red;
        width:100%;
        color:white;
        font-size: 1.3em;
        margin-left: 0;
        padding-top: 2px;
        padding-bottom: 2px;
        border: 0;
        border-radius: 12px;
       
    }
    .btn02{
        display:none;
        background-color: green;
        width:100%;
        color:white;
        font-size:1.3em;
        border: 0;
        padding-top: 2px;
        padding-bottom: 2px;
        border-radius: 12px;
       
    }
    #p3{
        display: block;
    }
    #p4{
        display: none;
    }
    @media only screen and (min-width: 768px) {
    /* For desktop: */
    .btn01{
        width:30%;
        
    }
    .btn02{
        width:30%;
    }
    }
  </style>
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
    <section class="content pb-5">
      <div class="container-fluid">
       <!-- Profile -->
       <input type="button" class="btn01" value="Update Trx Address " onclick="go()" id="p1" >
       <input type="button" class="btn02" value="Update Personal Details " onclick="go()" id="p2" >
    
        <div class="col-lg-10 col-12 container border rounded bg-white p-2" id="p3">
    
        <div  class="form p-2 col-lg-8 col-12 m-auto  ">         
            <h2 class="text-center text-success p-3" style="font-family: 'Playfair Display', serif;">Personal Details</h2>
            
            <form action="updateprofile.php" method="post">
    
            <div class="form-group">
            <label for="add" class="text-primary ">Enter Address</address></label>
            <input type="text" id="add" name="add" class="form-control " required>
            </div><div class="form-group">
            <label for="city" class="text-primary ">Enter City</label>
            <input type="text" id="city" name="city" class="form-control " required>
            </div><div class="form-group">
            <label for="pin" class="text-primary ">Enter pin</label>
            <input type="tel" id="pin" name="pin" pattern="[0-9]{6}" class="form-control " required>
            </div><div class="form-group">
            <label for="state" class="text-primary ">Enter State </label>
            <input type="text" id="state" name="state"  class="form-control " required>
            </div><div class="form-group">
            <label for="country" class="text-primary ">Enter Country</label>
            <input type="text" id="country" name="country" class="form-control " required>
            </div>
            <div class="btn-group d-flex ">
            <button class=" btn btn flex-fill bg-purple " style="font-family: 'Playfair Display', serif; font-size:20px;" name="P_update" >Update Personal Details</button>
            
            </div>
        </form>

        </div>
    </div>
    <div class="col-lg-10 col-12 container border rounded bg-white " id="p4">
        <div class="form p-2 col-lg-8 col-12 m-auto ">         
            <h2 class="text-center text-success p-3" style="font-family: 'Playfair Display', serif;">Wallet Details</h2>
            
            <form action="updateprofile.php" method="post">

            <div class="form-group">
            <label for="add" class="text-primary ">Enter Trx Address</address></label>
            <input type="text" id="add" name="trx" class="form-control " required>
            </div>
            <div class="btn-group d-flex pb-5">
            <button class=" btn btn flex-fill bg-purple" name="B_update" style="font-family: 'Playfair Display', serif; font: size 20px;">Update Trx Details</button>
            
            </div>
            </form>

        </div>
    </div>
<?php
 if (isset($_POST['P_update'])){
    $add=mysqli_real_escape_string($conn,$_POST['add']);
    $city=mysqli_real_escape_string($conn,$_POST['city']);
    $pin=mysqli_real_escape_string($conn,$_POST['pin']);
    $state=mysqli_real_escape_string($conn,$_POST['state']);
    $country=mysqli_real_escape_string($conn,$_POST['country']);
    $email=mysqli_real_escape_string($conn,$_SESSION['email']);
    $sql="UPDATE login set address='$add' , city='$city', pin='$pin' ,state='$state',country='$country' where email='$email'";
    $result=mysqli_query($conn,$sql);
    echo '<script>
      swal({
        title: "Trx Address!",
        text: "Your Profile Update Successfully!",
        icon: "success",
        button: "OK!",
      });
      </script>  ';

 }
 if (isset($_POST['B_update'])){
    $trx=$_POST['trx'];
    $email=$_SESSION['email'];
    
    $sql="UPDATE login set tronadd='$trx' where email='$email'";
    $result=mysqli_query($conn,$sql);
    echo '<script>
    swal({
      title: "Trx Address!",
      text: "Your TRX Details Update Successfully!",
      icon: "success",
      button: "OK!",
    });
    </script>  ';
    

    
}
?>
<script>
  function go(){
    var p1=document.getElementById("p1");
    var p2=document.getElementById("p2");
    var p3=document.getElementById("p3");
    var p4=document.getElementById("p4");

    if(p2.style.display==="block")
    {
        p1.style.display="block";
        p2.style.display="none";
        p3.style.display="block";
        p4.style.display="none";

    }
    else{
 
        p1.style.display="none";
        p2.style.display="block";
        p3.style.display="none";
        p4.style.display="block";
    }
    }
</script>
      </div><!-- /.container-fluid -->
     
    </section>
    <!-- /.content -->
  </div>
 <?php include("footer.php"); ?>
</body>
</html>
