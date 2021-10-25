<?php
include('connect.php');
$email=$_SESSION['email'];
if (isset($_POST['reset'])){
    $oldPass=mysqli_real_escape_string($conn,$_POST['oldPass']);
    $newPass=mysqli_real_escape_string($conn,$_POST['newPass']);
    $newPass1=mysqli_real_escape_string($conn,$_POST['newPass1']);
    if ($newPass != $newPass1) {
        array_push($errors, "The two passwords do not match");
        echo '<script type ="text/JavaScript">';  
        echo 'alert("The two passwords do not match")';  
        echo '</script>'; 
        
    }
    else{
        if(strlen($newPass)>=8)
        {
            $hashpassword=password_hash($newPass,PASSWORD_DEFAULT);
            $user_check_query = "SELECT email ,password FROM login WHERE email='$email'  LIMIT 1";
            
            $result = mysqli_query($conn, $user_check_query);
            $row=mysqli_num_rows($result);
            $user = mysqli_fetch_assoc($result);
            if ($row>0) { // if user exis
                $verify=password_verify($oldPass,$user['password']);
                if ($verify==1) 
                {   
                    $sql="UPDATE login set password='$hashpassword' where email='$email'";
                    $result=mysqli_query($conn,$sql);
                    echo '<script type ="text/JavaScript">';  
                    echo 'alert("Password is Successfully change")';  
                    echo '</script>'; 
                    
                }
                else{
                    echo '<script type ="text/JavaScript">';  
                    echo 'alert("old Password is incorrect ")';  
                    echo '</script>'; 
                    
                }
            }
        }
        else{
            echo '<script type ="text/JavaScript">';  
            echo 'alert("The password length must be 8.")';  
            echo '</script>'; 
        }
    }
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
      <!--Start Here-->
      <h3 class="text-center text-success" style="font-family: 'Playfair Display', serif;"> Change Password</h3>

      <div class="col-lg-10 col-12 container border rounded bg-white p-2" >
    
      <div class="form p-2 col-lg-6 col-12 m-auto">         
            <label name="msg"></label>
            <form action="changepassword.php" method="post">
            <div class="form-group">
            <label for="oldPass" class="text-primary ">Enter old password</label>
            <input type="password" id="oldPass" name="oldPass" value="" class="form-control" >
            </div>
           
            <div class="form-group">
            <label for="newPass" class="text-primary ">Enter New Password</label>
            <input type="password" id="newPass" name="newPass" value="" class="form-control" >
            </div>

            <div class="form-group">
            <label for="newPass1" class="text-primary ">Enter Confirm Password</label>
            <input type="password" id="newPass1" name="newPass1" value="" class="form-control" >
            </div>
            <div class="btn-group d-flex ">
            <button class="btn btn flex-fill bg-purple " name="reset" style="font-family: 'Sansita', sans-serif; font-size:20px;">Submit</button>
            
            </div>
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
