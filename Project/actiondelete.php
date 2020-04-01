<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proiecta1";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}





// $inputa1=$_POST['input1']; 
$inputa1=$_SESSION["username"];


	
	$sql = "DELETE FROM biga  
			WHERE Username ='$inputa1'";
	
	if (mysqli_query($conn, $sql)) {
		echo " <br>";}
 	else {
		echo "Error deleting record; " . $sql . "<br>" . mysqli_error($conn); }
	
	
	$sql = "DELETE FROM bigc  
			WHERE Usernamep ='$inputa1'";
	
	if (mysqli_query($conn, $sql)) {
		echo " <br>";}
 	else {
		echo "Error deleting record; " . $sql . "<br>" . mysqli_error($conn); }
	

mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<div class="w3-container">
		<a href="logout.php" class="w3-button w3-red">Este necesara iesire din cont pentru a vedea datele actualizate.</a>
	</div>
</body>
</html>	