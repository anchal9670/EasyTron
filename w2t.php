<?php
include("redirect0.php");
include('connect.php');
//login Detail
$email= $_SESSION['email'];
$query1 = mysqli_query($conn, "SELECT wallet FROM login WHERE email='$email'");

$row1 = mysqli_fetch_array($query1);
$shop = $row1["wallet"];

// Get corresponding first name and
// last name for that user id	
// Get the  name
$status="Success";
$sql="SELECT * FROM transfer WHERE email='$email' and status='Pending'";
$queryfire=mysqli_query($conn, $sql);
$row=mysqli_fetch_array($queryfire);
if($row["status"]=="Pending")
{
    $status="Pending";
}
if (isset($_POST['submit'])){
    $rtrx=$_POST['trx'];
    $wallet=$_POST['wallet'];

    $ntrx=$rtrx-$rtrx*0.10;
    if($rtrx<=$wallet && $rtrx>=20 && $rtrx<1000)
    {    
    $sql01="INSERT INTO transfer(email,rtrx,ntrx,rdate,status,tron) VALUES 
    ('$email','$rtrx','$ntrx',current_timestamp(),'Pending','TrxWallet');";
    $result=mysqli_query($conn,$sql01);
    $newwallet=$wallet-$rtrx;
    $result01 = mysqli_query($conn, "UPDATE login set wallet='$newwallet' where email='$email'");
    echo '<script type ="text/JavaScript">  
    alert("Transfer Successfully")  
    </script>';
    echo"<script>
        
    window.location.href='Transferhistory.php';
    </script>
    ";
    }
    if($rtrx<20){
    echo '<script type ="text/JavaScript">  
    alert("Minimun Transfer 20 Tron")  
    </script>';
    echo"<script>
        
    window.location.href='w2t.php';
    </script>
    ";
    }
    if($rtrx>$wallet){
    echo '<script type ="text/JavaScript">  
    alert("Insuficient Balance Available")  
    </script>';
    echo"<script>
        
    window.location.href='w2t.php';
    </script>
    ";
    }
    if($rtrx>1000){
    echo '<script type ="text/JavaScript">  
    alert("Maximum Transfer 1000 Tron")  
    </script>';
    echo"<script>
        
    window.location.href='w2t.php';
    </script>
    ";
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
      <h3 class="text-center text-success" style="font-family: 'Playfair Display', serif;">Transfer In TrxWallet</h3>

      <!--Start Here-->
      <div class="col-lg-10 col-12 container border rounded bg-white p-2" >
      <div class="form p-2 ">         
            
            <form action="w2t.php" method="post">
            <div class="form-group">
            <label for="trx" class="text-primary ">Enter Trx</label>
            <input type="text" id="trx" name="trx"  value="" class="form-control" >
            <label id="msg" style="display:block" class="text-danger ">Minimun Transfer 20Tron</label>
            
            </div>

            <div class="form-group">
            <label for="status" class="text-primary ">Last Transaction Status</label>
            <input type="hidden" id="status" name="status" value="<?php echo $status; ?>" class="form-control" >
            <input type="text" id="status1" name="status1" value="<?php echo $status;?>" class="form-control" disabled>
            </div>

            <div class="form-group">
            <label for="wallet1" class="text-primary ">Available Wallet Balance</label>
            <input type="hidden" id="wallet" name="wallet"  value="<?php echo $row1["wallet"];?>"  class="form-control">
            <input type="text" id="wallet1" name="wallet1"  value="<?php echo $row1["wallet"];?>"  class="form-control" disabled>
            </div>
           
            <div  class="btn-group d-flex p-3" >
            
            <button id="btn" style="display:none"  class="btn btn-primary flex-fill "  name="submit" >Submit</button>
            <input type="btn" style="display:block" id="btn1"   value="Submit"  class="btn btn-primary flex-fill " disabled>
            
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
var txt=document.getElementById("status").value;
    var txt1=document.getElementById("wallet").value;
    var btn=document.getElementById("btn");
    var msg=document.getElementById("msg");


    if(txt1>=20 && txt==="Success"){
        btn.style.display="block";
        msg.style.display="none";
        btn1.style.display="none";

        
    }
</script>

 <?php include("footer.php"); ?>
</body>
</html>
