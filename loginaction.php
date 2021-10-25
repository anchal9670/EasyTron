<?php
session_start();
if(isset($_SESSION['rnum'])){
   
if (isset($_POST['OTP'])){
$otp=$_POST['Eotp'];
$con=$_SESSION['rnum'];
$email=$_SESSION['conemail'];
$Id=$_SESSION['conId'];
if($con==$otp)
{
    unset($_SESSION['rnum']);
    $_SESSION['email'] = $email;
    $_SESSION['Id'] = $Id;
    // Welcome message
    $_SESSION['success'] = "Online";

    // Page on which the user is sent
    // to after logging in
    
    header("Location: dash.php");
}
else
{
    echo '<script type ="text/JavaScript">';  
    echo 'alert("OTP is incorrect")';  
    echo '</script>';
    echo '<script type ="text/JavaScript">';  
    echo 'window.location.href = "login.php";';  
    echo '</script>';
    
}
}
?>
<?php include("nav.php"); 
if(isset($_SESSION['email'])){
echo "<script>window.location.href = 'dash.php'</script>";

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
 
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Sansita:ital@1&display=swap" rel="stylesheet">
<style>
    
    .footer {
	background-color: #39464a;
	color: #ffffff;
	text-align: center;
	font-size: 12px;
	padding: 15px;
	}
    /* For mobile phones: */
    [class*="col-"] {
    width: 100%;
    }
    @media only screen and (min-width: 0px) {
    /* For tablets: */
    
    .container {width: 100%;
    }
    
    }
    @media only screen and (min-width: 600px) {
    /* For tablets: */
    
    .container {width: 45%;
        }
    
    }
    @media only screen and (min-width: 768pix) {
    /* For desktop: */
    
    .container {width: 45%;
       }
  
    
    }
    h2{
        font-family: 'Sansita', sans-serif;
    }
    #img2{
        width: 100%;
        height:10em;
    }
</style>
</head>
<body class="bg-light">
   
    <div class="row p-3">
        
        <div class="container border rounded bg-white ">
        <div class="form p-2 ">     
			<img src="img/trx.png" id="img2" alt="Easy Tron Logo" class="text-center border-radius" >

            <h2 class="text-center text-success">Login </h2>
            <form action="loginaction.php" method="post">
            <!-- only for session the value -->
            <div class="form-group">
            <label for="Eotp" class="text-primary">Enter OTP</label>
            <input type="number" name="Eotp" id="Eotp" class="form-control " value="">
            </div>
            <div class="btn-group d-flex p-3">
            <button class="btn btn-primary flex-fill" name="OTP" style="font-family: 'Sansita', sans-serif; font-size:25px;">Submit</button>
            </div>
            </form>
        </div>
        </div>
       
    </div>
	<div class="footer">
    <p>copyright: &copy; 2021-2024 Easy Tron. All right are reserved.</p>
</div>

</body>
</html>
<?php
}

else{
echo "<script>window.location.href = 'login.php'</script>";
}
?>
