<?php
include("redirect0.php");
include('connect.php');
$email= $_SESSION['email'];
//For Fetch Id

$query1 = "SELECT * ,DAY(doa),MONTH(doa),YEAR(doa) FROM login WHERE email='$email'  ";
$result1 = mysqli_query($conn, $query1);
$user1 = mysqli_fetch_assoc($result1);
// for total downline Active
$id=$user1['Id'];
$Adate =$user1['doa'];
// echo $user1['DAY(doa)'];
// echo $user1['MONTH(doa)'];
// echo $user1['YEAR(doa)'];
if($user1['MONTH(doa)']<10)
{
$zero=0;
$hi=$user1['YEAR(doa)'].$zero.$user1['MONTH(doa)'].$user1['DAY(doa)'];
}
else{
  $hi=$user1['YEAR(doa)'].$user1['MONTH(doa)'].$user1['DAY(doa)'];

}
if($user1['Status']=='Active')
{
  $sql = "SELECT * FROM login WHERE Id>$id and Status='Active' and doa>$hi ORDER BY Id asc";
  $queryfire=mysqli_query($conn, $sql);
  $num=mysqli_num_rows($queryfire);
  //Date For Pool
  $pool1date = date('Y-m-d ', strtotime($Adate . ' +1 day'));
  $pool2date = date('Y-m-d ', strtotime($Adate . ' +6 day'));
  $pool3date = date('Y-m-d ', strtotime($Adate . ' +16 day'));
  $pool4date = date('Y-m-d ', strtotime($Adate . ' +36 day'));
  $pool5date = date('Y-m-d ', strtotime($Adate . ' +66 day'));
  $pool6date = date('Y-m-d ', strtotime($Adate . ' +116 day'));

  // yyyy mm dd for pool
  //echo $user1['DAY(doa)'];
  // echo $user1['MONTH(doa)'];
  // echo $user1['YEAR(doa)'];
  //For Auto pool Income 

  $query03 = "SELECT * FROM level WHERE email='$email'  ";
  $result03 = mysqli_query($conn, $query03);
  $user03 = mysqli_fetch_assoc($result03);
  if($num>=4 && $user03['pool1']==0.00 ){
      $sql01="UPDATE level set pool1=4 , pool1b=4 where email='$email'";
      $queryfire01=mysqli_query($conn,$sql01);
  }
  if($num>=16 && $user03['pool2']==0.00){
      $sql02="UPDATE level set pool2=16 , pool2b=16 where email='$email'";
      $queryfire02=mysqli_query($conn,$sql02);
  }
  if($num>=64 && $user03['pool3']==0.00){
      $sql03="UPDATE level set pool3=64 , pool3b=64 where email='$email'";
      $queryfire03=mysqli_query($conn,$sql03);
  }
  if($num>=256 && $user03['pool4']==0.00){
      $sql04="UPDATE level set pool4=256 , pool4b=256 where email='$email'";
      $queryfire04=mysqli_query($conn,$sql04);
  }
  if($num>=512 && $user03['pool5']==0.00){
      $sql05="UPDATE level set pool5=512 , pool5b=512 where email='$email'";
      $queryfire05=mysqli_query($conn,$sql05);
  }
  if($num>=1024 && $user03['pool6']==0.00){
      $sql06="UPDATE level set pool6=1024 , pool6b=1024 where email='$email'";
      $queryfire06=mysqli_query($conn,$sql06);
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
<?php include('sidebar.php'); ?>

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.jpg" alt="AdminLTELogo" height="60" width="60">
  </div>

 <!-- Sidebar -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid ">
        <?php
            //For Auto pool Income 
            $query = "SELECT * FROM level WHERE email='$email'  ";
            $result = mysqli_query($conn, $query);
            $user = mysqli_fetch_assoc($result);
        ?>
        <h3 class="text-center text-success" style="font-family: 'Playfair Display', serif;">Autopool Income</h3>
        <p id="day" style="display:none"><?php  echo $user1['DAY(doa)'];?></p>
        <p id="month" style="display:none"><?php  echo $user1['MONTH(doa)'];?></p>
        <p id="year" style="display:none"><?php  echo $user1['YEAR(doa)'];?></p>

        <div class="row ">
        <div class="col-lg-10 col-12 container border rounded bg-white p-2" >
        <div class="row ">
          
          <div class="col-lg-4 col-12">
            <!-- small box -->
            <div class="info-box mb-3 bg-pink">
              <span class="info-box-icon"> <img src="dist/img/AdminLTELogo.jpg" alt="Easy Tron Logo" class="brand-image img-circle elevation-3" style="opacity: 15"></i></span>

              <div class="info-box-content">
                <h5>Pool 1</h5>
                <h5>4.00 Trx</h5>
                <h5><?php if($user1['Status']=='Active')
                          { 
                            echo $pool1date;
                          }
                          else {
                             echo "NotActive";
                          }?></h5> 
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>
          <div class="col-lg-4 col-12">
            <!-- small box -->
            <div class="info-box mb-3 bg-indigo">
              <span class="info-box-icon"> <img src="dist/img/AdminLTELogo.jpg" alt="Easy Tron Logo" class="brand-image img-circle elevation-3" style="opacity: 15"></i></span>

              <div class="info-box-content">
                <h5>Pool 2</h5>
                <h5>16.00 Trx <?php echo $hi.$num; ?></h5>
                <h5><?php if($user1['Status']=='Active')
                          { 
                            echo $pool2date;
                          }
                          else {
                            echo "NotActive";
                          }?></h5> 
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>
          <div class="col-lg-4 col-12">
            <!-- small box -->
            <div class="info-box mb-3 bg-purple">
              <span class="info-box-icon"> <img src="dist/img/AdminLTELogo.jpg" alt="Easy Tron Logo" class="brand-image img-circle elevation-3" style="opacity: 15"></i></span>

              <div class="info-box-content">
                <h5>Pool 3</h5>
                <h5>64.00 Trx</h5>
                <h5><?php if($user1['Status']=='Active')
                          { 
                            echo $pool3date;
                          }
                          else 
                          {
                            echo "NotActive";
                          }?></h5> 
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>
          <div class="col-lg-4 col-12">
            <!-- small box -->
            <div class="info-box mb-3 bg-lightblue">
              <span class="info-box-icon"> <img src="dist/img/AdminLTELogo.jpg" alt="Easy Tron Logo" class="brand-image img-circle elevation-3" style="opacity: 15"></i></span>

              <div class="info-box-content">
                <h5>Pool 4</h5>
                <h5>64.00 Trx</h5>
                <h5><?php if($user1['Status']=='Active')
                          { 
                            echo $pool4date;
                          }
                          else { 
                            echo "NotActive";
                          }?></h5>  
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>
          <div class="col-lg-4 col-12">
            <!-- small box -->
            <div class="info-box mb-3 bg-primary">
              <span class="info-box-icon"> <img src="dist/img/AdminLTELogo.jpg" alt="Easy Tron Logo" class="brand-image img-circle elevation-3" style="opacity: 15"></i></span>

              <div class="info-box-content">
                <h5>Pool 5</h5>
                <h5>512.00 Trx</h5>
                <h5><?php if($user1['Status']=='Active')
                          { 
                            echo $pool5date;
                          }
                          else {
                            echo "NotActive";
                          }?></h5> 
              </div>
              <!-- /.info-box-content -->
            </div>

          </div>
          <div class="col-lg-4 col-12">
            <!-- small box -->
            <div class="info-box mb-3 bg-teal">
              <span class="info-box-icon"> <img src="dist/img/AdminLTELogo.jpg" alt="Easy Tron Logo" class="brand-image img-circle elevation-3" style="opacity: 15"></i></span>

              <div class="info-box-content">
                <h5>Pool 6</h5>
                <h5>1024.00 Trx</h5>
                <h5><?php if($user1['Status']=='Active')
                          { 
                            echo $pool6date;
                          }
                          else {
                            echo "NotActive";
                          }?></h5> 
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>
        </div>
            <!-- table -->

            <div class="table-responsive">
            <form action="autoaction.php" method="post">
            <table class="table table-striped">
              <thead class="text-center">
                <tr class="d-flex">
                  <th class="col-1 bg-black">Pool</th>
                  <th class="col-2 bg-black">Total Income</th>
                  <th class="col-2 bg-black">Balance </th>
                  <th class="col-2 bg-black">Paid </th>
                  <th class="col-2 bg-black" style="width: 25px">Daily</th>
                  <th class="col-3 bg-black">Today Claim</th>

                </tr>
              </thead>
              <tbody class="text-center">
                <tr class="d-flex">
                  <td class="col-1">1.</td>
                  <td class="col-2"><?php echo $user['pool1'];?></td>
                  <td class="col-2"><?php echo $user['pool1b'];?></td>
                  <td class="col-2 "><?php $sum=$user['pool1']-$user['pool1b']; echo $sum;?></td>
                  <td class="col-2"><span class="badge bg-pink"> 100% </span></td>
                  <td class="col-3" id="btn1" style="display:none"><?php
                  $date=date("Ymd");
                  $user_check_query = "SELECT Status FROM levelhistory WHERE email='$email' and pool=1 and date=$date";
                  $result = mysqli_query($conn, $user_check_query);
                  $row=mysqli_num_rows($result);
                  if($user1['Status']=='Active')
                  { 
                    if($num>=4){
                      if($sum==4){
                        ?>
                        <button class="btn btn-success flex-fill" name="one2" p-3 style="font-family: 'Sansita', sans-serif; font-size:13px;">Completed</button>
                        <?php
                      }
                      else{
                        if($row>0){
                          ?>
                          <button class="btn btn-warning flex-fill" name="one" p-3 style="font-family: 'Sansita', sans-serif; font-size:13px;">Success</button>
                          <?php
                        }
                        else{
                          ?>
                          <button class="btn btn-danger flex-fill" name="one1" p-3 style="font-family: 'Sansita', sans-serif; font-size:13px;">Pending</button>
                          <?php
                        }
                      }
                    }
                  }
                  else
                  { 
                    echo "NotActive";
                  }
                  ?> </td>
                </tr>
                <tr class="d-flex">
                  <td class="col-1">2.</td>
                  <td class="col-2"><?php echo $user['pool2'];?></td>
                  <td class="col-2"><?php echo $user['pool2b'];?></td>
                  <td class="col-2"><?php $sum1=$user['pool2']-$user['pool2b']; echo $sum1;?></td>
                  <td class="col-2"><span class="badge bg-dark">100%</span></td>
                  <td class="col-3" id="btn2" style="display:none"><?php
                  $date=date("Ymd");
                  $user_check_query = "SELECT Status FROM levelhistory WHERE email='$email' and pool=2 and date=$date";
                  $result = mysqli_query($conn, $user_check_query);
                  $row=mysqli_num_rows($result);
                  if($user1['Status']=='Active')
                  { 
                    if($num>=16){
                      if($sum1==16){
                        ?>
                        <button class="btn btn-success flex-fill" name="two2" p-3 style="font-family: 'Sansita', sans-serif; font-size:13px;">Completed</button>
                        <?php
                      }
                      else{
                        if($row>0){
                          ?>
                          <button class="btn btn-warning flex-fill" name="two" p-3 style="font-family: 'Sansita', sans-serif; font-size:13px;">Success</button>
                          <?php
                        }
                        else{
                          ?>
                          <button class="btn btn-danger flex-fill" name="two1" p-3 style="font-family: 'Sansita', sans-serif; font-size:13px;">Pending</button>
                          <?php
                        }
                      }
                    }
                  }
                  else
                  { 
                    echo "NotActive";
                  }
                  ?> </td>
                </tr>
                <tr class="d-flex">
                  <td class="col-1">3.</td>
                  <td class="col-2"><?php echo $user['pool3'];?></td>
                  <td class="col-2"><?php echo $user['pool3b'];?></td>
                  <td class="col-2"><?php $sum2=$user['pool3']-$user['pool3b']; echo $sum2;?></td>
                  <td class="col-2"><span class="badge bg-indigo">50%</span></td>
                  <td class="col-3" id="btn3" style="display:none"><?php
                  $date=date("Ymd");
                  $user_check_query = "SELECT Status FROM levelhistory WHERE email='$email' and pool=3 and date=$date";
                  $result = mysqli_query($conn, $user_check_query);
                  $row=mysqli_num_rows($result);
                  if($user1['Status']=='Active')
                  { 
                    if($num>=64){
                      if($sum2==64){
                        ?>
                        <button class="btn btn-success flex-fill" name="three2" p-3 style="font-family: 'Sansita', sans-serif; font-size:13px;">Completed</button>
                        <?php
                      }
                      else{
                        if($row>0){
                          ?>
                          <button class="btn btn-warning flex-fill" name="three" p-3 style="font-family: 'Sansita', sans-serif; font-size:13px;">Success</button>
                          <?php
                        }
                        else{
                          ?>
                          <button class="btn btn-danger flex-fill" name="three1" p-3 style="font-family: 'Sansita', sans-serif; font-size:13px;">Pending</button>
                          <?php
                        }
                      }
                    }
                  }
                  else
                  { 
                    echo "NotActive";
                  }

                  ?> </td>
                </tr>
                <tr class="d-flex">
                  <td class="col-1">4.</td>
                  <td class="col-2"><?php echo $user['pool4'];?></td>
                  <td class="col-2"><?php echo $user['pool4b'];?></td>
                  <td class="col-2"><?php $sum3=$user['pool4']-$user['pool4b']; echo $sum3;?></td>
                  <td class="col-2"><span class="badge bg-teal">20%</span></td>
                  <td class="col-3" id="btn4" style="display:none"><?php
                  $date=date("Ymd");
                  $user_check_query = "SELECT Status FROM levelhistory WHERE email='$email' and pool=4 and date=$date";
                  $result = mysqli_query($conn, $user_check_query);
                  $row=mysqli_num_rows($result);
                  if($user1['Status']=='Active')
                  { 
                    if($num>=256){
                      if($sum3==256){
                        ?>
                        <button class="btn btn-success flex-fill" name="four2" p-3 style="font-family: 'Sansita', sans-serif; font-size:13px;">Completed</button>
                        <?php
                      }
                      else{
                        if($row>0){
                          ?>
                          <button class="btn btn-warning flex-fill" name="four" p-3 style="font-family: 'Sansita', sans-serif; font-size:13px;">Success</button>
                          <?php
                        }
                        else{
                          ?>
                          <button class="btn btn-danger flex-fill" name="four1" p-3 style="font-family: 'Sansita', sans-serif; font-size:13px;">Pending</button>
                          <?php
                        }
                      }
                    }
                  }
                  else
                  { 
                    echo "NotActive";
                  }
                  ?> </td>
                </tr>
                <tr class="d-flex">
                  <td class="col-1">5.</td>
                  <td class="col-2"><?php echo $user['pool5'];?></td>
                  <td class="col-2"><?php echo $user['pool5b'];?></td>
                  <td class="col-2"><?php $sum5=$user['pool5']-$user['pool5b']; echo $sum5;?></td>
                  <td class="col-2"><span class="badge bg-orange">10%</span></td>
                  <td class="col-3" id="btn5" style="display:none"><?php
                  $date=date("Ymd");
                  $user_check_query = "SELECT Status FROM levelhistory WHERE email='$email' and pool=5 and date=$date";
                  $result = mysqli_query($conn, $user_check_query);
                  $row=mysqli_num_rows($result);
                  if($user1['Status']=='Active')
                  { 
                    if($num>=512){
                      if($sum5==512){
                        ?>
                        <button class="btn btn-success flex-fill" name="five2" p-3 style="font-family: 'Sansita', sans-serif; font-size:13px;">Completed</button>
                        <?php
                      }
                      else{
                        if($row>0){
                          ?>
                          <button class="btn btn-success flex-fill" name="five" p-3 style="font-family: 'Sansita', sans-serif; font-size:13px;">Success</button>
                          <?php
                        }
                        else{
                          ?>
                          <button class="btn btn-danger flex-fill" name="five1" p-3 style="font-family: 'Sansita', sans-serif; font-size:13px;">Pending</button>
                          <?php
                        }
                      }
                    }
                  }
                  else
                  { 
                    echo "NotActive";
                  }
                  ?> </td>
                </tr>
                <tr class="d-flex">
                  <td class="col-1">6.</td>
                  <td class="col-2"><?php echo $user['pool6'];?></td>
                  <td class="col-2"><?php echo $user['pool6b'];?></td>
                  <td class="col-2"><?php $sum6=$user['pool6']-$user['pool6b']; echo $sum6;?></td>
                  <td class="col-2"><span class="badge bg-purple">5%</span></td>
                  <td class="col-3" id="btn6" style="display:none"><?php
                  $date=date("Ymd");
                  $user_check_query = "SELECT Status FROM levelhistory WHERE email='$email' and pool=6 and date=$date";
                  $result = mysqli_query($conn, $user_check_query);
                  $row=mysqli_num_rows($result);
                  if($user1['Status']=='Active')
                  { 
                    if($num>=1024){
                      if($sum6==1024){
                        ?>
                        <button class="btn btn-success flex-fill" name="six2" p-3 style="font-family: 'Sansita', sans-serif; font-size:13px;">Completed</button>
                        <?php
                      }
                      else{
                        if($row>0){
                          ?>
                          <button class="btn btn-success flex-fill" name="six" p-3 style="font-family: 'Sansita', sans-serif; font-size:13px;">Success</button>
                          <?php
                        }
                        else{
                          ?>
                          <button class="btn btn-danger flex-fill" name="six1" p-3 style="font-family: 'Sansita', sans-serif; font-size:13px;">Pending</button>
                          <?php
                        }
                      }
                    }
                  }
                  else
                  { 
                    echo "NotActive";
                  }

                  ?> </td>
                </tr>
                
              </tbody>
            </table>
            </form>
        </div>

            <!-- end table -->
        </div>    
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
</div>
<script>
// var d = new Date();
// var date = d.getFullYear()+'-'+(d.getMonth()+1)+'-'+d.getDate();
// var txt1=parseInt(document.getElementById('t1').innerHTML);
// var txt2=parseInt(document.getElementById('t1').innerHTML);
// var txt3=parseInt(document.getElementById('t1').innerHTML);

// var d1=(d.getDate()-txt1);
// var newdate1 = d.getFullYear()+'-'+(d.getMonth()+1)+'-'+(d.getDate()+d1);
// var pool1date=
// console.log(date);
// console.log(newdate1);

//Note: 00 is month i.e. January 
var d = new Date();
var c1=d.getDate();
var c2=(d.getMonth()+1);
var c3=d.getFullYear();
var txt1=parseInt(document.getElementById('day').innerHTML);
var txt2=parseInt(document.getElementById('month').innerHTML);
var txt3=parseInt(document.getElementById('year').innerHTML);   
var dateOne = new Date(txt3, txt2, txt1); //Activation Date   
var dateTwo = new Date(c3, c2, c1); //Current Date   
//For button 
var btn1=document.getElementById("btn1");
var btn2=document.getElementById("btn2");
var btn3=document.getElementById("btn3");
var btn4=document.getElementById("btn4");
var btn5=document.getElementById("btn5");
var btn6=document.getElementById("btn6");



if (dateOne < dateTwo) {    
    var pool1= new Date(txt3,txt2, txt1+1); //pool 1 
    if (dateTwo>=pool1) {  
    var date = pool1.getFullYear()+'-'+pool1.getMonth()+'-'+pool1.getDate(); 
    btn1.style.display="block"; 
    } 
    var pool2= new Date(txt3,txt2, txt1+6); //pool 2 
    if (dateTwo>=pool2) {  
    var date = pool2.getFullYear()+'-'+pool2.getMonth()+'-'+pool2.getDate(); 
    btn2.style.display="block"; 

    }  
    var pool3= new Date(txt3,txt2, txt1+16); //pool 3 
    if (dateTwo>=pool3) {  
    var date = pool3.getFullYear()+'-'+pool3.getMonth()+'-'+pool3.getDate(); 
    btn3.style.display="block"; 

    }  
    var pool4= new Date(txt3,txt2, txt1+36); //pool 4 
    if (dateTwo>=pool4) {  
    var date = pool4.getFullYear()+'-'+pool4.getMonth()+'-'+pool4.getDate(); 
    btn4.style.display="block"; 
  
    }
    var pool5= new Date(txt3,txt2, txt1+66); //pool 4 
    if (dateTwo>=pool5) {  
    var date = pool5.getFullYear()+'-'+pool5.getMonth()+'-'+pool5.getDate(); 
    btn5.style.display="block"; 
  
    }
    var pool6= new Date(txt3,txt2, txt1+116); //pool 4 
    if (dateTwo>=pool6) {  
    var date = pool6.getFullYear()+'-'+pool6.getMonth()+'-'+pool6.getDate(); 
    btn6.style.display="block"; 
  
    }       
}else {  
      
}    


</script>
 <?php include("footer.php"); ?>
</body>
</html>
