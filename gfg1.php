<?php
include("connect.php");
// Get the user id
$spemail = $_REQUEST['spemail'];


if ($spemail !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($conn, "SELECT Name,Id
	 FROM login WHERE email='$spemail'");

	$row = mysqli_fetch_array($query);

	// Get the  name
	$search = $row["Name"];
	$search1 = $row["Name"];
	$sponsor = $row["Id"];



}

// Store it in a array
$result = array("$search","$search1","$sponsor");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>