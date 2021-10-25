<?php
include('connect.php');
include('nav.php');
session_start();
if(isset($_SESSION['email'])){
echo "<script>window.location.href = 'dash.php'</script>";
}
    $errors = array();
  
    if (isset($_POST['sign_btn'])){
        $cname=mysqli_real_escape_string($conn,$_POST['cname']);
        $email=mysqli_real_escape_string($conn,$_POST['email']);
        $dob=$_POST['dob'];
        $mob=mysqli_real_escape_string($conn,$_POST['mob']);
        $password=mysqli_real_escape_string($conn,$_POST['password']);
        $cpassword=mysqli_real_escape_string($conn,$_POST['cpassword']);
        $sponsor=mysqli_real_escape_string($conn,$_POST['sponsor']);
        $search=mysqli_real_escape_string($conn,$_POST['search']);
        if ($password != $cpassword) {
            array_push($errors, "The two passwords do not match");
            echo '<script type ="text/JavaScript">';  
            echo 'alert("The two passwords do not match")';  
            echo '</script>'; 
            
          }
        else{
          // first check the database to make sure 
          // a user does not already exist with the same username and/or email
          $user_check_query = "SELECT email , Id FROM login WHERE email='$email'  LIMIT 1";
          $result = mysqli_query($conn, $user_check_query);
          $user = mysqli_fetch_assoc($result);
          
          if ($user) { // if user exis
        
            if ($user['email'] === $email) {
              array_push($errors, "email already exists");
             
              echo '<script type ="text/JavaScript">';  
              echo 'alert("email already exists")';  
              echo '</script>';
             
            }
            
          }

        }
        if (count($errors) == 0)
        {
            $hashpassword=password_hash($password,PASSWORD_DEFAULT);
            $sql="INSERT INTO login(Name,email,date,mob,password,doj,sponsor,spName) VALUES 
            ('$cname','$email','$dob','$mob','$hashpassword',current_timestamp(),'$sponsor','$search');";
            $result=mysqli_query($conn,$sql);
            $sql01="INSERT INTO level(email) VALUES ('$email');";
            $result01=mysqli_query($conn,$sql01);
            $sql1="UPDATE login set refler=refler+1 where Id=$sponsor";
            $result1=mysqli_query($conn,$sql1);
            if($result){
                $html="<h3 style='color:blue;'>Easy Tron</h3><h4 style='color:red;'>Welcome</h4> Congratulation for become the member of Easy Tron. <br><center><table style='width=100%;   border-bottom: 1px solid #ddd;'><tr><td>Name</td><td>$cname</td></tr><tr><td>Email</td><td>$email</td></tr><tr><td>Mobile</td><td>$mob</td></tr><tr><td>Password</td><td>$password</td></tr></table></center>";
                
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
                $mail->Subject="Welcome to Easy Tron";
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
                
                echo '<script type ="text/JavaScript">';  
                echo 'alert("You are successfully Register")';  
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
    <title>SignUp</title>
  
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="preconnect" href="https://fonts.gstatic.com">
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
    width: 90%;
    }
    #img2{
        width: 100%;
        height:10em;
    }
    @media only screen and (min-width: 600px) {
    /* For tablets: */
    
    .container {width: 50%;}
    
    }
    #img2{
        width: 100%;
        height:10em;
    }
    @media only screen and (min-width: 768px) {
    /* For desktop: */
    
    .container {width: 50%;}
  
    
    }
    h2{
        font-family: 'Sansita', sans-serif;
    }
    #img2{
        width: 100%;
        height:10em;
    }
    /* The message box is shown when the user clicks on the password field */
    #message {
    display:none;
    background: white;
    color: #000;
    position: relative;
    padding: 0px;
    margin-top: 10px;
    }

    #message p {
    padding: 0px 0px;
    font-size: 12px;
    }

    /* Add a green text color and a checkmark when the requirements are right */
    .valid {
    color: green;
    }

    .valid:before {
    position: relative;
    left: -35px;
    
    }

    /* Add a red text color and an "x" icon when the requirements are wrong */
    .invalid {
    color: red;
    }

    .invalid:before {
    position: relative;
    left: -35px;
   
    }
</style>
</head>
<body class="bg-light">
<div class="row p-3">
    <div class="container border rounded bg-white ">
  
        <div class="form p-2 ">        
			<img src="img/trx.png" id="img2" alt="Easy Tron Logo" class="text-center border-radius" >

            <h2 class="text-center text-success p-3">SignUp </h2>
            <label name="msg"></label>
            <form action="SignUp.php" method="post" autocomplete="off">
    
            <div class="form-group">
            <label for="Name" class="text-primary ">Enter Name</label>
            <input type="text" id="Name" name="cname" class="form-control " required>
            </div><div class="form-group">
            <label for="email" class="text-primary ">Enter Your E-Mail</label>
            <input type="email" id="email" name="email" class="form-control " required>
            </div><div class="form-group">
            <label for="DOB" class="text-primary ">Date of Birth</label>
            <input type="Date" id="DOB" name="dob" class="form-control " required>
            </div><div class="form-group">
            <label for="mob" class="text-primary ">Enter Mob. Number</label>
            <input type="tel" id="mob" name="mob" pattern="[0-9]{10}" class="form-control " required>
            </div><div class="form-group">
            <label for="password" class="text-primary ">Enter Password</label>
            <input type="password" id="password" onclick="go()" name="password" class="form-control " pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
            </div>
            <!-- Password -->
            <div id="message">
            <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
            <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
            <p id="number" class="invalid">A <b>number</b></p>
            <p id="length" class="invalid">Minimum <b>8 characters</b></p>
            </div>
            <div class="form-group">
            <label for="cpassword" class="text-primary ">Enter Confirm Password</label>
            <input type="password" id="cpassword" name="cpassword" class="form-control "required>
            </div>
            
         
            <div class="form-group">
            <input type="hidden" id="sponsor" name="sponsor"  value=""  >
            <label for="spemail" class="text-primary ">Enter Sponsor email</label>
            <input type="text" id="spemail" name="spemail" onkeyup="GetDetail(this.value)" value="" class="form-control" >
            </div>
            <div class="form-group">
            <label for="search" class="text-primary ">Sponsor Name</label>
            
            <input type="hidden" id="search" name="search" value="" class="form-control" >
            <input type="text" id="search1" name="search1" value="" class="form-control" disabled>
            </div>
            <div class="btn-group d-flex p-3">
            <button class="btn btn-primary flex-fill" name="sign_btn" p-3 style="font-family: 'Sansita', sans-serif; font-size:25px;">Submit</button>
            
            </div>
        </form>

        </div>
    </div>
</div>
<div class="footer">
    <p>copyright: &copy; 2021-2024 Easy Tron. All right are reserved.</p>
</div>
<script>
var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
// onkeyup event will occur when the user
// release the key and calls the function
// assigned to this event
function GetDetail(str) {
    if (str.length == 0) {
        document.getElementById("search").value = "";
        document.getElementById("search1").value = "";
        document.getElementById("sponsor").value = "";
        

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
                
                document.getElementById(
                    "search").value = myObj[0];
                document.getElementById(
                        "search1").value = myObj[1];
                document.getElementById(
							"sponsor").value = myObj[2];
                
              
            }
        };

        // xhttp.open("GET", "filename", true);
        xmlhttp.open("GET", "gfg1.php?spemail=" + str, true);
        
        // Sends the request to the server
        xmlhttp.send();
    }
}
</script>
</body>
</html>