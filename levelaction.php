<?php
include("redirect0.php");
include('connect.php');
$email= $_SESSION['email'];
$query02 = "SELECT * FROM login WHERE email='$email'  ";
$result02 = mysqli_query($conn, $query02);
$user02 = mysqli_fetch_assoc($result02);
$query03 = "SELECT * FROM level WHERE email='$email'  ";
$result03 = mysqli_query($conn, $query03);
$user03 = mysqli_fetch_assoc($result03);
//Direct
$direct=$user02['directactive'];
//level 1
$level1d=$user03['L1']*0.01;
$level1b=$user03['BL1']-$level1d;
//level 2
$level2d=$user03['L2']*0.01;
$level2b=$user03['BL2']-$level2d;
//level 3
$level3d=$user03['L3']*0.01;
$level3b=$user03['BL3']-$level3d;
//level 4
$level4d=$user03['L4']*0.01;
$level4b=$user03['BL4']-$level4d;
//level 5
$level5d=$user03['L5']*0.01;
$level5b=$user03['BL5']-$level5d;
//level 1
$level6d=$user03['L6']*0.01;
$level6b=$user03['BL6']-$level6d;
//level 1
$level7d=$user03['L7']*0.01;
$level7b=$user03['BL7']-$level7d;

if (isset($_POST['one'])){
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Already Done! Try Tomarrow")';  
    echo '</script>';
    echo '<script type ="text/JavaScript">';  
    echo 'window.location.href = "levelincome.php";';  
    echo '</script>';
}
if (isset($_POST['two'])){
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Already Done! Try Tomarrow ")';  
    echo '</script>';
    echo '<script type ="text/JavaScript">';  
    echo 'window.location.href = "levelincome.php";';  
    echo '</script>';
}
if (isset($_POST['three'])){
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Already Done! Try Tomarrow")';  
    echo '</script>';
    echo '<script type ="text/JavaScript">';  
    echo 'window.location.href = "levelincome.php";';  
    echo '</script>';
}
if (isset($_POST['four'])){
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Already Done! Try Tomarrow")';  
    echo '</script>';
    echo '<script type ="text/JavaScript">';  
    echo 'window.location.href = "levelincome.php";';  
    echo '</script>';
}
if (isset($_POST['five'])){
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Already Done! Try Tomarrow")';  
    echo '</script>';
    echo '<script type ="text/JavaScript">';  
    echo 'window.location.href = "levelincome.php";';  
    echo '</script>';
}
if (isset($_POST['six'])){
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Already Done! Try Tomarrow")';  
    echo '</script>';
    echo '<script type ="text/JavaScript">';  
    echo 'window.location.href = "levelincome.php";';  
    echo '</script>';
}
if (isset($_POST['seven'])){
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Already Done! Try Tomarrow")';  
    echo '</script>';
    echo '<script type ="text/JavaScript">';  
    echo 'window.location.href = "levelincome.php";';  
    echo '</script>';
}
if (isset($_POST['one1'])){
    if($level1b>=0){
        $sql01="INSERT INTO levelhistory (email , date ,level ,Status,trx ) VALUES ('$email' ,current_timestamp(), 1 ,'Success','$level1d');";
        $result01=mysqli_query($conn,$sql01);
        $sql02="UPDATE level set  BL1='$level1b' where email='$email'";
        $result02=mysqli_query($conn,$sql02);
        $sql="UPDATE login set  wallet=wallet+'$level1d' where email='$email'";
        $result=mysqli_query($conn,$sql);
        echo '<script type ="text/JavaScript">';  
        echo 'window.location.href = "levelincome.php";';  
        echo '</script>';
    }
}
if (isset($_POST['two1'])){
    if($level2b>=0){
        if($direct>=2)
        {
            $sql11="INSERT INTO levelhistory (email , date ,level ,Status,trx ) VALUES ('$email' ,current_timestamp(), 2 ,'Success','$level2d');";
            $result11=mysqli_query($conn,$sql11);
            $sql12="UPDATE level set  BL2='$level2b' where email='$email'";
            $result12=mysqli_query($conn,$sql12);
            $sql="UPDATE login set  wallet=wallet+'$level2d' where email='$email'";
            $result=mysqli_query($conn,$sql);
            echo '<script type ="text/JavaScript">';  
            echo 'window.location.href = "levelincome.php";';  
            echo '</script>';
        }
        else{
            echo '<script type ="text/JavaScript">';  
            echo 'alert("2 Active Direct Required")';  
            echo '</script>';
            echo '<script type ="text/JavaScript">';  
            echo 'window.location.href = "levelincome.php";';  
            echo '</script>';
        }
    }
}
if (isset($_POST['three1'])){
    if($level3b>=0){
        if($direct>=3)
        {
            $sql21="INSERT INTO levelhistory (email , date ,level ,Status,trx ) VALUES ('$email' ,current_timestamp(), 3 ,'Success','$level3d');";
            $result21=mysqli_query($conn,$sql21);
            $sql22="UPDATE level set  BL3='$level3b' where email='$email'";
            $result22=mysqli_query($conn,$sql22);
            $sql="UPDATE login set  wallet=wallet+'$level3d' where email='$email'";
            $result=mysqli_query($conn,$sql);
            echo '<script type ="text/JavaScript">';  
            echo 'window.location.href = "levelincome.php";';  
            echo '</script>';
        }
        else{
            echo '<script type ="text/JavaScript">';  
            echo 'alert("3 Active Direct Required")';  
            echo '</script>';
            echo '<script type ="text/JavaScript">';  
            echo 'window.location.href = "levelincome.php";';  
            echo '</script>';
        }
    }
}
if (isset($_POST['four1'])){
    if($level4b>=0){
        if($direct>=4)
        {
        $sql31="INSERT INTO levelhistory (email , date ,level ,Status,trx ) VALUES ('$email' ,current_timestamp(), 4 ,'Success','$level4d');";
        $result31=mysqli_query($conn,$sql31);
        $sql32="UPDATE level set  BL4='$level4b' where email='$email'";
        $result32=mysqli_query($conn,$sql32);
        $sql="UPDATE login set  wallet=wallet+'$level4d' where email='$email'";
        $result=mysqli_query($conn,$sql);
        echo '<script type ="text/JavaScript">';  
        echo 'window.location.href = "levelincome.php";';  
        echo '</script>';
        }
        else{
            echo '<script type ="text/JavaScript">';  
            echo 'alert("4 Active Direct Required")';  
            echo '</script>';
            echo '<script type ="text/JavaScript">';  
            echo 'window.location.href = "levelincome.php";';  
            echo '</script>';
        }
    }
}
if (isset($_POST['five1'])){
    if($level5b>=0){
        if($direct>=6)
        {
        $sql41="INSERT INTO levelhistory (email , date ,level ,Status,trx ) VALUES ('$email' ,current_timestamp(), 5 ,'Success','$level5d');";
        $result41=mysqli_query($conn,$sql41);
        $sql42="UPDATE level set  BL5='$level5b' where email='$email'";
        $result42=mysqli_query($conn,$sql42);
        $sql="UPDATE login set  wallet=wallet+'$level5d' where email='$email'";
        $result=mysqli_query($conn,$sql);
        echo '<script type ="text/JavaScript">';  
        echo 'window.location.href = "levelincome.php";';  
        echo '</script>';
        }
        else{
            echo '<script type ="text/JavaScript">';  
            echo 'alert("6 Active Direct Required")';  
            echo '</script>';
            echo '<script type ="text/JavaScript">';  
            echo 'window.location.href = "levelincome.php";';  
            echo '</script>';
        }
    }
}
if (isset($_POST['six1'])){
    if($level6b>=0){
        if($direct>=8)
        {
        $sql51="INSERT INTO levelhistory (email , date ,level ,Status,trx ) VALUES ('$email' ,current_timestamp(), 6 ,'Success','$level6d');";
        $result51=mysqli_query($conn,$sql51);
        $sql52="UPDATE level set  BL6='$level6b' where email='$email'";
        $result52=mysqli_query($conn,$sql52);
        $sql="UPDATE login set  wallet=wallet+'$level6d' where email='$email'";
        $result=mysqli_query($conn,$sql);
        echo '<script type ="text/JavaScript">';  
        echo 'window.location.href = "levelincome.php";';  
        echo '</script>';
        }
        else{
            echo '<script type ="text/JavaScript">';  
            echo 'alert("8 Active Direct Required")';  
            echo '</script>';
            echo '<script type ="text/JavaScript">';  
            echo 'window.location.href = "levelincome.php";';  
            echo '</script>';
        }
    }
}
if (isset($_POST['seven1'])){
    if($level7b>=0){
        if($direct>=10)
        {
        $sql71="INSERT INTO levelhistory (email , date ,level ,Status,trx ) VALUES ('$email' ,current_timestamp(), 7 ,'Success','$level7d');";
        $result71=mysqli_query($conn,$sql71);
        $sql72="UPDATE level set  BL7='$level7b' where email='$email'";
        $result72=mysqli_query($conn,$sql72);
        $sql="UPDATE login set  wallet=wallet+'$level7d' where email='$email'";
        $result=mysqli_query($conn,$sql);
        echo '<script type ="text/JavaScript">';  
        echo 'window.location.href = "levelincome.php";';  
        echo '</script>';
        }
        else{
            echo '<script type ="text/JavaScript">';  
            echo 'alert("10 Active Direct Required")';  
            echo '</script>';
            echo '<script type ="text/JavaScript">';  
            echo 'window.location.href = "levelincome.php";';  
            echo '</script>';
        }
    }
}
echo '<script type ="text/JavaScript">';  
echo 'window.location.href = "levelincome.php";';  
echo '</script>';
?>