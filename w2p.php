<?php
include("redirect0.php");
include('connect.php');
//login Detail
$email= $_SESSION['email'];
$query1 = mysqli_query($conn, "SELECT * FROM login WHERE email='$email'");

$row1 = mysqli_fetch_array($query1);
$wallet = $row1["wallet"];
$name=$row1["Name"];
//On submit Form
if (isset($_POST['submit'])){
    $rtrx=$_POST['trx'];

    $ntrx=$rtrx-$rtrx*0.05;
    if($rtrx<=$wallet && $rtrx>=10)
    {    
    $sql01="INSERT INTO transfer(email,rtrx,ntrx,rdate,status,cdate,tron) VALUES 
    ('$email','$rtrx','$ntrx',current_timestamp(),'Success',current_timestamp(),'PinWallet');";
    $result=mysqli_query($conn,$sql01);
    $newwallet=$wallet-$rtrx;
    $result01 = mysqli_query($conn, "UPDATE login set wallet='$newwallet',shopwallet=shopwallet+$rtrx where email='$email'");
    echo '<script type ="text/JavaScript">  
    alert("Transfer Successfully")  
    </script>';
    echo"<script>
        
    window.location.href='Transferhistory.php';
    </script>
    ";
    }
    if($rtrx<10){
    echo '<script type ="text/JavaScript">  
    alert("Minimun Transfer 10 Tron")  
    </script>';
    echo"<script>
        
    window.location.href='w2p.php';
    </script>
    ";
    }
    if($rtrx>$wallet){
    echo '<script type ="text/JavaScript">  
    alert("Insuficient Balance Available")  
    </script>';
    echo"<script>
        
    window.location.href='w2p.php';
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
      <!--Start Here-->
      <h3 class="text-center text-success" style="font-family: 'Playfair Display', serif;">Wallet to PinWallet</h3>

      <div class="col-lg-10 col-12 container border rounded bg-white p-2" >
      <div class="form p-2 ">         
            
            <form action="w2p.php" method="post">
            <div class="form-group">
            <label for="name" class="text-primary ">Name</label>
            <input type="text" id="name" name="name" value="<?php echo $name;?>" class="form-control" disabled>
            </div>

            <div class="form-group">
            <label for="trx" class="text-primary ">Enter Trx</label>
            <input type="text" id="trx" name="trx"  value="" class="form-control" >
            <label id="msg" style="display:block"  class="text-danger ">Minimun Transfer 10Tron</label>
            
            </div>


            <div class="form-group">
            <label for="wallet1" class="text-primary ">Available Wallet Balance</label>
            <input type="text" id="wallet1" name="wallet1"  value="<?php echo $row1["wallet"];?>"  class="form-control" disabled>
            </div>
           
            <div  class="btn-group d-flex p-3" >
            
            <button id="btn" style="display:none"  class="btn btn-primary flex-fill "  name="submit">Submit</button>
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
    var txt1=document.getElementById("wallet1").value;
    var btn=document.getElementById("btn");
    var msg=document.getElementById("msg");


    if(txt1>=10 ){
        btn.style.display="block";
        msg.style.display="none";
        btn1.style.display="none";
        
    }
       

</script>

 <?php include("footer.php"); ?>
</body>
</html>
