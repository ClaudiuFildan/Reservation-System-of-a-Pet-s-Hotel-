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

//$inputa1=$_POST['input1'];
$inputa1=$_SESSION["username"];

$inputa2=$_POST['input2'];
$inputa3=$_POST['input3'];
$inputa4=$_POST['input4'];
$inputa5=$_POST['input5'];
$inputa6=$_POST['input6'];
$inputa7=$_POST['input7'];
$inputa8=$_POST['input8'];
$inputa9=$_POST['input9'];
$inputa10=$_POST['input10'];
$inputa11=$_POST['input11'];
$inputa12=$_POST['input12'];

if(!empty($_POST['input2']))
{
	$cone2=$_POST['input2'];
	$sql = "UPDATE biga SET Numeleanimalului ='$cone2' 
			WHERE Username   ='$inputa1'";
	if (mysqli_query($conn, $sql)) {
		echo "Numele animalului a fost introdus cu succes.<br>";}
 	else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn); }
}
if(!empty($_POST['input3']))
{
	$cone3=$_POST['input3'];
	$sql = "UPDATE biga SET Idchip ='$cone3' 
			WHERE Username   ='$inputa1'";
	if (mysqli_query($conn, $sql)) {
		echo "Numarul de identificare a chipului animalului a fost introdus cu succes. <br>";}
 	else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn); }
}
if(!empty($_POST['input4']))
{
	$cone4=$_POST['input4'];
	$sql = "UPDATE biga SET Rasa ='$cone4' 
			WHERE Username   ='$inputa1'";
	if (mysqli_query($conn, $sql)) {
		echo "Rasa animalului a fost introdus cu succes. <br>";}
 	else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn); }
}
if(!empty($_POST['input5']))
{
	$cone5=$_POST['input5'];
	$sql = "UPDATE biga SET Varsta ='$cone5' 
			WHERE Username   ='$inputa1'";
	if (mysqli_query($conn, $sql)) {
		echo "Varsta animalului a fost introdus cu succes. <br>";}
 	else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn); }
}
if(!empty($_POST['input6']))
{
	$cone6=$_POST['input6'];
	$sql = "UPDATE biga SET Sex ='$cone6' 
			WHERE Username   ='$inputa1'";
	if (mysqli_query($conn, $sql)) {
		echo "Sexul animalului a fost introdus cu succes. <br>";}
 	else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn); }
}
if(!empty($_POST['input7']))
{
	$cone7=$_POST['input7'];
	$sql = "UPDATE biga SET Descriere ='$cone7' 
			WHERE Username   ='$inputa1'";
	if (mysqli_query($conn, $sql)) {
		echo "Descrierea animalului a fost introdus cu succes.<br>";}
 	else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn); }
}
if(!empty($_POST['input8']))
{
	$cone8=$_POST['input8'];
	$sql = "UPDATE biga SET Nume ='$cone8' 
			WHERE Username   ='$inputa1'";
	if (mysqli_query($conn, $sql)) {
		echo "Numele proprietarului a fost introdus cu succes.<br>";}
 	else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn); }
}
if(!empty($_POST['input9']))
{
	$cone9=$_POST['input9'];
	$sql = "UPDATE biga SET Prenume ='$cone9' 
			WHERE Username   ='$inputa1'";
	if (mysqli_query($conn, $sql)) {
		echo "Prenumele proprietarului a fost introdus cu succes.<br>";}
 	else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn); }
}
if(!empty($_POST['input10']))
{
	$cone10=$_POST['input10'];
	$sql = "UPDATE biga SET Checkin ='$cone10' 
			WHERE Username   ='$inputa1'";
	if (mysqli_query($conn, $sql)) {
		echo "Data sosiri a fost introdus cu succes. <br>";}
 	else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn); }
}
if(!empty($_POST['input11']))
{
	$cone11=$_POST['input11'];
	$sql = "UPDATE biga SET Checkout ='$cone11' 
			WHERE Username   ='$inputa1'";
	if (mysqli_query($conn, $sql)) {
		echo "Data plecari a fost introdus cu succes.<br>";}
 	else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn); }
}
if(!empty($_POST['input12']))
{
	$cone12=$_POST['input12'];
	$sql = "UPDATE bigc SET Phone ='$cone12' 
			WHERE Usernamep   ='$inputa1'";
	if (mysqli_query($conn, $sql)) {
		echo "Telefonul proprietarului a fost introdus cu succes.<br>";}
 	else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn); }
} 




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