<?php
include("redirect0.php");
include('connect.php');
$email= $_SESSION['email'];
$query03 = "SELECT * FROM level WHERE email='$email'  ";
$result03 = mysqli_query($conn, $query03);
$user03 = mysqli_fetch_assoc($result03);
$query02 = "SELECT directactive FROM login WHERE email='$email'  ";
$result02 = mysqli_query($conn, $query02);
$user02 = mysqli_fetch_assoc($result02);
if($user02['directactive']<4)
{
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Please Active 4 Direct ID!")';  
    echo '</script>';
    echo '<script type ="text/JavaScript">';  
    echo 'window.location.href = "autopool.php";';  
    echo '</script>';
}
//pool1
$pool1d=$user03['pool1']*1;
$pool1b=$user03['pool1b']-$pool1d;
//pool2
$pool2d=$user03['pool2']*1;
$pool2b=$user03['pool2b']-$pool2d;
//pool3
$pool3d=$user03['pool3']*0.5;
$pool3b=$user03['pool3b']-$pool3d;
//pool4
$pool4d=$user03['pool4']*0.2;
$pool4b=$user03['pool4b']-$pool4d;
//pool5
$pool5d=$user03['pool5']*0.1;
$pool5b=$user03['pool5b']-$pool5d;
//pool6
$pool6d=$user03['pool6']*0.05;
$pool6b=$user03['pool6b']-$pool6d;


if (isset($_POST['one2'])){
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Fund not Available !")';  
    echo '</script>';
    echo '<script type ="text/JavaScript">';  
    echo 'window.location.href = "autopool.php";';  
    echo '</script>';
}
if (isset($_POST['two2'])){
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Fund not Available !")';  
    echo '</script>';
    echo '<script type ="text/JavaScript">';  
    echo 'window.location.href = "autopool.php";';  
    echo '</script>';
}
if (isset($_POST['three2'])){
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Fund not Available !")';  
    echo '</script>';
    echo '<script type ="text/JavaScript">';  
    echo 'window.location.href = "autopool.php";';  
    echo '</script>';
}
if (isset($_POST['four2'])){
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Fund not Available !")';  
    echo '</script>';
    echo '<script type ="text/JavaScript">';  
    echo 'window.location.href = "autopool.php";';  
    echo '</script>';
}
if (isset($_POST['five2'])){
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Fund not Available !")';  
    echo '</script>';
    echo '<script type ="text/JavaScript">';  
    echo 'window.location.href = "autopool.php";';  
    echo '</script>';
}
if (isset($_POST['six2'])){
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Fund not Available !")';  
    echo '</script>';
    echo '<script type ="text/JavaScript">';  
    echo 'window.location.href = "autopool.php";';  
    echo '</script>';
}
if (isset($_POST['one'])){
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Already Done! Try Tomarrow")';  
    echo '</script>';
    echo '<script type ="text/JavaScript">';  
    echo 'window.location.href = "autopool.php";';  
    echo '</script>';
}
if (isset($_POST['two'])){
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Already Done! Try Tomarrow ")';  
    echo '</script>';
    echo '<script type ="text/JavaScript">';  
    echo 'window.location.href = "autopool.php";';  
    echo '</script>';
}
if (isset($_POST['three'])){
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Already Done! Try Tomarrow")';  
    echo '</script>';
    echo '<script type ="text/JavaScript">';  
    echo 'window.location.href = "autopool.php";';  
    echo '</script>';
}
if (isset($_POST['four'])){
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Already Done! Try Tomarrow")';  
    echo '</script>';
    echo '<script type ="text/JavaScript">';  
    echo 'window.location.href = "autopool.php";';  
    echo '</script>';
}
if (isset($_POST['five'])){
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Already Done! Try Tomarrow")';  
    echo '</script>';
    echo '<script type ="text/JavaScript">';  
    echo 'window.location.href = "autopool.php";';  
    echo '</script>';
}
if (isset($_POST['six'])){
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Already Done! Try Tomarrow")';  
    echo '</script>';
    echo '<script type ="text/JavaScript">';  
    echo 'window.location.href = "autopool.php";';  
    echo '</script>';
}
if (isset($_POST['one1'])){
    if($user02['directactive']>=4)
    {
    $sql01="INSERT INTO levelhistory (email , date ,pool ,Status,trx ) VALUES ('$email' ,current_timestamp(), 1 ,'Success','$pool1d');";
    $result01=mysqli_query($conn,$sql01);
    $sql02="UPDATE level set  pool1b='$pool1b' where email='$email'";
    $result02=mysqli_query($conn,$sql02);
    $sql="UPDATE login set  wallet=wallet+'$pool1d' where email='$email'";
    $result=mysqli_query($conn,$sql);
    echo '<script type ="text/JavaScript">';  
    echo 'window.location.href = "autopool.php";';  
    echo '</script>';
    }
    if($user02['directactive']<4)
    {
        echo '<script type ="text/JavaScript">';  
        echo 'alert("Please Active 4 Direct ID!")';  
        echo '</script>';
        echo '<script type ="text/JavaScript">';  
        echo 'window.location.href = "autopool.php";';  
        echo '</script>';
    }

}
if (isset($_POST['two1'])){
    if($user02['directactive']>=4)
    {
    $sql11="INSERT INTO levelhistory (email , date ,pool ,Status,trx ) VALUES ('$email' ,current_timestamp(), 2 ,'Success','$pool2d');";
    $result11=mysqli_query($conn,$sql11);
    $sql12="UPDATE level set  pool2b='$pool2b' where email='$email'";
    $result12=mysqli_query($conn,$sql12);
    $sql="UPDATE login set  wallet=wallet+'$pool2d' where email='$email'";
    $result=mysqli_query($conn,$sql);
    echo '<script type ="text/JavaScript">';  
    echo 'window.location.href = "autopool.php";';  
    echo '</script>';
    }
    if($user02['directactive']<4)
    {
        echo '<script type ="text/JavaScript">';  
        echo 'alert("Please Active 4 Direct ID!")';  
        echo '</script>';
        echo '<script type ="text/JavaScript">';  
        echo 'window.location.href = "autopool.php";';  
        echo '</script>';
    }


}
if (isset($_POST['three1'])){
    if($user02['directactive']>=4)
    {
    $sql21="INSERT INTO levelhistory (email , date ,pool ,Status,trx ) VALUES ('$email' ,current_timestamp(), 3 ,'Success','$pool3d');";
    $result21=mysqli_query($conn,$sql21);
    $sql22="UPDATE level set  pool3b='$pool3b' where email='$email'";
    $result22=mysqli_query($conn,$sql22);
    $sql="UPDATE login set  wallet=wallet+'$pool3d' where email='$email'";
    $result=mysqli_query($conn,$sql);
    echo '<script type ="text/JavaScript">';  
    echo 'window.location.href = "autopool.php";';  
    echo '</script>';
    }
    if($user02['directactive']<4)
    {
        echo '<script type ="text/JavaScript">';  
        echo 'alert("Please Active 4 Direct ID!")';  
        echo '</script>';
        echo '<script type ="text/JavaScript">';  
        echo 'window.location.href = "autopool.php";';  
        echo '</script>';
    }
}
if (isset($_POST['four1'])){
    if($user02['directactive']>=4)
    {
    $sql31="INSERT INTO levelhistory (email , date ,pool ,Status,trx ) VALUES ('$email' ,current_timestamp(), 4 ,'Success','$pool4d');";
    $result31=mysqli_query($conn,$sql31);
    $sql32="UPDATE level set  pool4b='$pool4b' where email='$email'";
    $result32=mysqli_query($conn,$sql32);
    $sql="UPDATE login set  wallet=wallet+'$pool4d' where email='$email'";
    $result=mysqli_query($conn,$sql);
    echo '<script type ="text/JavaScript">';  
    echo 'window.location.href = "autopool.php";';  
    echo '</script>';
    }
    if($user02['directactive']<4)
    {
        echo '<script type ="text/JavaScript">';  
        echo 'alert("Please Active 4 Direct ID!")';  
        echo '</script>';
        echo '<script type ="text/JavaScript">';  
        echo 'window.location.href = "autopool.php";';  
        echo '</script>';
    }

}


if (isset($_POST['five1'])){
    if($user02['directactive']>=8)
    {
    $sql41="INSERT INTO levelhistory (email , date ,pool ,Status,trx ) VALUES ('$email' ,current_timestamp(), 5 ,'Success','$pool5d');";
    $result41=mysqli_query($conn,$sql41);
    $sql42="UPDATE level set  pool5b='$pool5b' where email='$email'";
    $result42=mysqli_query($conn,$sql42);
    $sql="UPDATE login set  wallet=wallet+'$pool5d' where email='$email'";
    $result=mysqli_query($conn,$sql);
    echo '<script type ="text/JavaScript">';  
    echo 'window.location.href = "autopool.php";';  
    echo '</script>';
    }
    if($user02['directactive']<8)
    {
        echo '<script type ="text/JavaScript">';  
        echo 'alert("Please Active Total 8 Direct ID!")';  
        echo '</script>';
        echo '<script type ="text/JavaScript">';  
        echo 'window.location.href = "autopool.php";';  
        echo '</script>';
    }

}
if (isset($_POST['six1'])){
    if($user02['directactive']>=5)
    {
    $sql51="INSERT INTO levelhistory (email , date ,pool ,Status,trx ) VALUES ('$email' ,current_timestamp(), 6 ,'Success','$pool6d');";
    $result51=mysqli_query($conn,$sql51);
    $sql52="UPDATE level set  pool6b='$pool6b' where email='$email'";
    $result52=mysqli_query($conn,$sql52);
    $sql="UPDATE login set  wallet=wallet+'$pool6d' where email='$email'";
    $result=mysqli_query($conn,$sql);
    echo '<script type ="text/JavaScript">';  
    echo 'window.location.href = "autopool.php";';  
    echo '</script>';
    }
    if($user02['directactive']<6)
    {
        echo '<script type ="text/JavaScript">';  
        echo 'alert("Please Active Total 8 Direct ID!")';  
        echo '</script>';
        echo '<script type ="text/JavaScript">';  
        echo 'window.location.href = "autopool.php";';  
        echo '</script>';
    }

}
echo '<script type ="text/JavaScript">';  
echo 'window.location.href = "autopool.php";';  
echo '</script>';