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
  <?php
  //login Detail
$email=$_SESSION['email'];
$owner='myself9670@gmail.com';
$query1 = mysqli_query($conn, "SELECT * FROM login WHERE email='$email'");
$row1 = mysqli_fetch_array($query1);
$query2 = mysqli_query($conn, "SELECT * FROM login WHERE email='$owner'");
$row2 = mysqli_fetch_array($query2);
$wallet = $row1["wallet"];
$name=$row1["Name"];
$tronadd=$row1["tronadd"];
$ownadd=$row2["tronadd"];
//On submit Form
if (isset($_POST['submit'])){
    
    $hash=mysqli_real_escape_string($conn,$_POST['hash']);
    $user_check_query = "SELECT hashf FROM fund WHERE hashf='$hash'  LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // if user exis
  
      if ($user['hashf'] === $hash) {
        echo '<script>
        swal({
          title: "Add Fund!",
          text: "Fund Request Failed!",
          icon: "error",
          button: "OK!",
        });
        </script>  ';
        
      }
      else{
      $sql01="INSERT INTO fund(email,send,hashf,status) VALUES 
      ('$email','$tronadd','$hash','Pending');";
      $result=mysqli_query($conn,$sql01);
      echo '<script>
      swal({
        title: "Add Fund!",
        text: "Fund Request Send Successfully!",
        icon: "success",
        button: "OK!",
      });
      </script>  ';
      }
    }

}
?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <h3 class="text-center text-success" style="font-family: 'Playfair Display', serif;">Add Fund</h3>
        <div class="col-lg-10 col-12 container border rounded bg-white p-2" >
        <div class="form p-2 col-lg-8 col-12 m-auto "> 
            <form action="AddFund.php" method="post">
            <label id="msg"  class="text-danger ">Minimun Add fund 100Tron</label>
                <div class="form-group">
                <label for="name" class="text-primary ">Name</label>
                <input type="text" id="name"  value="<?php echo $name;?>" class="form-control" disabled>
                </div>
                <div class="form-group">
                <label for="mail" class="text-primary ">E-mail</label>
                <input type="text" id="mail" value="<?php echo $email;?>" class="form-control" disabled>
                </div>
                <div class="form-group ">
                  <label for="myInput" class="text-primary ">Company Trx Address</label>
                  <input type="text" id="myInput"  value="<?php echo $ownadd;?>" class="form-control" disabled>
                </div>
                <div class="form-group">
                <label for="trxadd" class="text-primary ">Your Trx Address</label>
                <input type="text" id="trxadd"  value="<?php echo $tronadd;?>" class="form-control" disabled>
                </div>
                <div class="form-group">
                <label for="hash" class="text-primary ">Enter Transaction Id</label>
                <input type="text" id="hash" name="hash" value="" class="form-control" required>
                </div>
                <div  class="btn-group d-flex p-3" >
                
                <button id="btn" class="btn btn flex-fill bg-purple"  name="submit" p-3 style="font-family: 'Sansita', sans-serif; font-size:20px;">Submit</button>
                
                </div>
          
            </form>
          </div>
        </div>
      </div><!-- /.container-fluid -->
     
    </section>
    <!-- /.content -->
  </div>
  <script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  alert("Copied the text: " + copyText.value);
}
</script>

 <?php include("footer.php"); ?>
</div>
</body>
</html>
