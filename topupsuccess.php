<?php
include("redirect0.php");
include('connect.php');
$email=$_SESSION['email'];
if (isset($_POST['topup'])){
    $useremail=$_POST['useremail'];
    $search=$_POST['search'];
    $status=$_POST['status'];
    $shop=$_POST['shop'];
    $user=$_POST['user'];
    if($status=='Active')
    {
        echo '<script type ="text/JavaScript">  
        alert("This Id is Already Topup")  
       </script>';
       echo"<script>
            
       window.location.href='topup.php';
       </script>
       ";
       
      
    }
    else
    {
        if($shop<100)
        {
            echo '<script type ="text/JavaScript">  
            alert("Insufficient Pin Wallet")  
        </script>';
        echo"<script>
            
        window.location.href='topup.php';
        </script>
        ";
        }
        else{
            $query = mysqli_query($conn, "UPDATE login set Status='Active',doa=current_timestamp() where email='$useremail'");
            $newshop=$shop-100;
            $query1 = mysqli_query($conn, "UPDATE login set shopwallet='$newshop' where email='$email'");
            $query2="INSERT INTO pin(email,name,userTopup,date ) VALUES 
            ('$useremail','$search','$email',current_timestamp());";
            $result=mysqli_query($conn,$query2);
            // Code Of level 
            $sql = "SELECT * FROM login WHERE email = '$useremail' ";
            $queryfire=mysqli_query($conn, $sql);
            $product=mysqli_fetch_array($queryfire);  
            //echo $product['Id'];
            
            //level 1
            $sql01 = "SELECT * FROM login WHERE Id = '$product[sponsor]'";
            $queryfire01=mysqli_query($conn, $sql01);
            $product01=mysqli_fetch_array($queryfire01); 
            //echo $product01['Id'];
            
            //level 2
            $sql02 = "SELECT * FROM login WHERE Id = '$product01[sponsor]'";
            $queryfire02=mysqli_query($conn, $sql02);
            $product02=mysqli_fetch_array($queryfire02); 
            //echo $product02['Id'];

            //level 3
            $sql03 = "SELECT * FROM login WHERE Id = '$product02[sponsor]'";
            $queryfire03=mysqli_query($conn, $sql03);
            $product03=mysqli_fetch_array($queryfire03); 
            //echo $product03['Id'];

            //level 4
            $sql04 = "SELECT * FROM login WHERE Id = '$product03[sponsor]'";
            $queryfire04=mysqli_query($conn, $sql04);
            $product04=mysqli_fetch_array($queryfire04); 
            //echo $product04['Id'];

            //level 5
            $sql05 = "SELECT * FROM login WHERE Id = '$product04[sponsor]'";
            $queryfire05=mysqli_query($conn, $sql05);
            $product05=mysqli_fetch_array($queryfire05); 
            //echo $product05['Id'];

            //level 6
            $sql06 = "SELECT * FROM login WHERE Id = '$product05[sponsor]'";
            $queryfire06=mysqli_query($conn, $sql06);
            $product06=mysqli_fetch_array($queryfire06); 
            //echo $product06['Id'];
            
            //level 7
            $sql07 = "SELECT * FROM login WHERE Id = '$product06[sponsor]'";
            $queryfire07=mysqli_query($conn, $sql07);
            $product07=mysqli_fetch_array($queryfire07); 
            //echo $product07['Id'];
            
            // direct Update
            $loginsql1="UPDATE login set directactive=directactive+1 where Id = '$product01[Id]'";
            $login1=mysqli_query($conn, $loginsql1);
            // level 1 update
            $levelsql2="UPDATE level set L1=L1+20 , BL1=BL1+20 where email = '$product01[email]'";
            $level2=mysqli_query($conn, $levelsql2);
                
            // Level 2 update
            $levelsql3="UPDATE level set L2=L2+15 , BL2=BL2+15 where email = '$product02[email]'";
            $level3=mysqli_query($conn, $levelsql3);             
            // Level 3 update
            $levelsql4="UPDATE level set L3=L3+5 , BL3=BL3+5 where email = '$product03[email]'";
            $level4=mysqli_query($conn, $levelsql4);       
            // Level 4 update
            $levelsql5="UPDATE level set L4=L4+5 , BL4=BL4+5 where email = '$product04[email]'";
            $level5=mysqli_query($conn, $levelsql5);        
            // Level 5 update
            $levelsql6="UPDATE level set L5=L5+5 , BL5=BL5+5  where email = '$product05[email]'";
            $level6=mysqli_query($conn, $levelsql6);
            // level 6 update
            $levelsql7="UPDATE level set L6=L6+10 , BL6=BL6+10 where email = '$product06[email]'";
            $level7=mysqli_query($conn, $levelsql7);
            // level 7 update                   
            $levelsql8="UPDATE level set L7=L7+10 , BL7=BL7+10 where email = '$product07[email]'";
            $level8=mysqli_query($conn, $levelsql8);
                                        
            echo '<script type ="text/JavaScript">  
                alert("Topup Successfully")  
                </script>';
            echo"<script>
            window.location.href='topup.php';
            </script>
            ";
        }
    }

}
else{
    echo"<script>window.location.href='topup.php';</script> ";
}
?>