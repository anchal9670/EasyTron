<?php
include("connect.php");
// Get the user id
$useremail = $_REQUEST['useremail'];
if ($useremail !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($conn, "SELECT Name,Id,Status
	 FROM login WHERE email='$useremail'");

	$row = mysqli_fetch_array($query);

	// Get the  name
	$search = $row["Name"];
	$search1 = $row["Name"];
	$user = $row["Id"];
	$status=$row["Status"];
	$status1=$row["Status"];
	

	
}

// Store it in a array
$result = array("$search","$search1","$user","$status","$status1");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>