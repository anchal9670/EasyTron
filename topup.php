<?php
include("redirect0.php");
include('connect.php');
$email=$_SESSION['email'];
$query1 = mysqli_query($conn, "SELECT * FROM login WHERE email='$email'");

$row1 = mysqli_fetch_array($query1);
$shop = $row1["shopwallet"];


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
      <h3 class="text-center text-success" style="font-family: 'Playfair Display', serif;">Topup ID</h3>

      <div class="col-lg-10 col-12 container border rounded bg-white p-2" >
    
      <div class="form p-2 col-lg-6 col-12 m-auto ">         
            <label name="msg"></label>
            <form action="topupsuccess.php" method="post">
            <div class="form-group">
            <input type="hidden" id="user" name="user"  value=""  >
            <label for="useremail" class="text-primary ">Enter user email</label>
            <input type="text" id="useremail" name="useremail" onkeyup="GetDetail(this.value)" value="" class="form-control" >
            </div>
           
            <div class="form-group">
            <label for="search" class="text-primary ">User Name</label>
            <input type="hidden" id="search" name="search" value="" class="form-control" >
            <input type="text" id="search1" name="search1" value="" class="form-control" disabled>
            </div>

            <div class="form-group">
            <label for="status" class="text-primary ">User Status</label>
            <input type="hidden" id="status" name="status" value="" class="form-control" >
            <input type="text" id="status1" name="status1" value="" class="form-control" disabled>
            </div>

            <div class="form-group">
            <label for="shop1" class="text-primary ">Your Pin Wallet</label>
            <input type="hidden" id="shop" name="shop"  value="<?php echo $row1["shopwallet"];?>"  class="form-control">
            <input type="text" id="shop1" name="shop1"  value="<?php echo $row1["shopwallet"];?>"  class="form-control" disabled>
            </div>

            <div class="btn-group d-flex ">
            <button class="btn btn flex-fill bg-purple " name="topup" p-3 style="font-family: 'Sansita', sans-serif; font-size:20px;">Submit</button>
            
            </div>
        </form>
      </div>
      </div>
      <!--End-->
      </div><!-- /.container-fluid -->
     
    </section>
    <!-- /.content -->
  </div>
<script>
// onkeyup event will occur when the user
// release the key and calls the function
// assigned to this event
function GetDetail(str) {
    if (str.length == 0) {
        document.getElementById("search").value = "";
        document.getElementById("search1").value = "";
        document.getElementById("user").value = "";
        document.getElementById("status").value = "";
        document.getElementById("status1").value = "";

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
							"user").value = myObj[2];
                document.getElementById(
							"status").value = myObj[3];
                document.getElementById(
							"status1").value = myObj[4];
            }
        };

        // xhttp.open("GET", "filename", true);
        xmlhttp.open("GET", "gfg2.php?useremail=" + str, true);
        
        // Sends the request to the server
        xmlhttp.send();

    }
}
</script>

 <?php include("footer.php"); ?>
</body>
</html>
