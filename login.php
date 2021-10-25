<?php include("nav.php"); 
session_start();
if(isset($_SESSION['email'])){
echo "<script>window.location.href = 'dash.php'</script>";

}
if(isset($_SESSION['rnum'])){
    echo "<script>window.location.href = 'loginaction.php'</script>";
    
    }
if($_SERVER["REQUEST_METHOD"]=="POST")
{

    if (isset($_POST['sign_btn'])){
        $rnum=rand(100000,1000000);

        include("connect.php");
        $Id=$_POST['Id'];
        $Name=$_POST['Name'];
        $mob=$_POST['mob'];
        $doj=$_POST['doj'];
        $status=$_POST['status'];
        $email=mysqli_real_escape_string($conn,$_POST['email']);
        $password=mysqli_real_escape_string($conn,$_POST['password']);
        $user_check_query = "SELECT email ,password FROM login WHERE email='$email'  LIMIT 1";
        
        $result = mysqli_query($conn, $user_check_query);
        $row=mysqli_num_rows($result);
        $user = mysqli_fetch_assoc($result);
        
        if ($row>0) { // if user exis
            $verify=password_verify($password,$user['password']);
            if ($verify==1) 
            {   
                $html="<h3 style='color:blue;'>Easy Tron</h3>Your One Time Passwod is <h3 style='color:blue;'>$rnum</h3> ";
                
                include('smtp/PHPMailerAutoload.php');
                $mail=new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host="smtp.gmail.com";
                $mail->Port=587;
                $mail->SMTPSecure="tls";
                $mail->SMTPAuth=true;
                $mail->Username="digitaluniverse.india@gmail.com";
                $mail->Password="@Anchal12345";
                $mail->SetFrom("digitaluniverse.india@gmail.com");
                $mail->addAddress($email);
                $mail->IsHTML(true);
                $mail->Subject="OTP Easy Tron";
                $mail->Body=$html;
                $mail->SMTPOptions=array('ssl'=>array(
                    'verify_peer'=>false,
                    'verify_peer_name'=>false,
                    'allow_self_signed'=>false
                ));
                if($mail->send()){
                    //echo "Mail send";
                }else{
                    //echo "Error occur";
                }
                // Storing username in session variable
                
                $_SESSION['rnum'] = $rnum;
                $_SESSION['conId'] = $Id;
                $_SESSION['conemail'] = $email;

                // // Welcome message
                // $_SESSION['success'] = "Online";
            
                // // Page on which the user is sent
                // // to after logging in
                
                header("Location: loginaction.php");
               
            }
            else
            {
                echo '<script type ="text/JavaScript">';  
                echo 'alert("Password is incorrect")';  
                echo '</script>';
                echo '<script type ="text/JavaScript">';  
                echo 'window.location.href = "login.php";';  
                echo '</script>';
                
            }
        }
        else{
                echo '<script type ="text/JavaScript">';  
                echo 'alert("email is incorrect or not register")';  
                echo '</script>'; 
                
                echo '<script type ="text/JavaScript">';  
                echo 'window.location.href = "login.php";';  
                echo '</script>';
                
        }
  
    }

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
			<img src="img/log.png" id="img2" alt="Easy Tron Logo" class="text-center border-radius" >

            <h2 class="text-center text-success">Login </h2>
            <form action="login.php" method="post">
            <!-- only for session the value -->
            <input type='hidden' name="Id" id='Id' value="">
            <input type="hidden" name="Name"id="Name" value="">
            <input type="hidden" name="mob"id="mob" value="">
            <input type="hidden" name="doj" id="doj" value="">
            <input type="hidden" name="status" id="status" value="" >


            <div class="form-group">
            <label for="email" class="text-primary">Enter E-mail</label>
            <input type="email" name="email"
                id="email" class="form-control " onkeyup="GetDetail(this.value)" value="">
            </div>
           
            <div class="form-group">
            <label for="pass" class="text-primary">Enter Password</label>
            <input type="password" id="pass"  name="password" class="form-control " >
            </div>
            <!-- An element to toggle between password visibility -->
            <p class="text-danger"><input type="checkbox" onclick="myFunction()">  Show Password</p>
          
            <label>Forget Password</label>
            <div class="btn-group d-flex p-3">
            <button class="btn btn-primary flex-fill" name="sign_btn" style="font-family: 'Sansita', sans-serif; font-size:25px;">Submit</button>
            </div>
            </form>
        </div>
        </div>
       
    </div>
	<div class="footer">
    <p>copyright: &copy; 2021-2024 Easy Tron. All right are reserved.</p>
</div>
<script>
function myFunction() {
  var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
// onkeyup event will occur when the user
// release the key and calls the function
// assigned to this event
function GetDetail(str) {
    if (str.length == 0) {
        document.getElementById("Name").value = "";
        document.getElementById("Id").value = "";
        document.getElementById("mob").value = "";
        document.getElementById("doj").value = "";

        document.getElementById("status").value = "";

        return;
    }
    else {

        // Creates a new XMLHttpRequest object
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {

            // Defines a function to be called when
            // the readyState property changes
            if (this.readyState == 4 &&
                    this.status == 200) {
                
                // Typical action to be performed
                // when the document is ready
                var myObj = JSON.parse(this.responseText);

                // Returns the response data as a
                // string and store this array in
                // a variable assign the value
                // received to first name input field
                
                document.getElementById
                    ("Name").value = myObj[0];
                
                // Assign the value received to
                // last name input field
                document.getElementById(
                    "Id").value = myObj[1];
                document.getElementById(
                    "mob").value = myObj[2];
                document.getElementById(
                    "doj").value = myObj[3];
                document.getElementById(
                    "status").value = myObj[4];
            }
        };

        // xhttp.open("GET", "filename", true);
        xmlhttp.open("GET", "gfg.php?email=" + str, true);
        
        // Sends the request to the server
        xmlhttp.send();
    }
}
</script>
</body>
</html>