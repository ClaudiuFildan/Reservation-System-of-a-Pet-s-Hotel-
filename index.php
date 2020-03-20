<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: welcome.php");
  exit;
} 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Introduceti numele utilizatorului.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "<br>Introduceti parola utilizatorului.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT Idclient, Username, Nume, Prenume, Idchip, Checkin, Checkout, Numeleanimalului, Rasa, Varsta, Sex, Descriere, Phone, Password FROM biga INNER JOIN bigc ON biga.Username=bigc.Usernamep WHERE Username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $lastname, $firstname, $Idchip, $checkin, $checkout, $dogname, $race, $age, $sex, $des,$phone , $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
							$_SESSION["lastname"] = $lastname;                            
							$_SESSION["firstname"] = $firstname;	
							$_SESSION["checkin"] = $checkin;                            
							$_SESSION["checkout"] = $checkout;
							$_SESSION["dogname"] = $dogname;                            
							$_SESSION["race"] = $race;
							$_SESSION["age"] = $age;                            
							$_SESSION["sex"] = $sex;
							$_SESSION["des"] = $des;
							$_SESSION["phone"] = $phone;
							
                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "<br> Parola nu este valida.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "<br> Nu exista cont cu acest nume al utilizatorului.";
                }
            } else{
                echo "<br> Oops! Ceva nu a functionat. Te rugam incearca mai tarziu.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel Rex | Login</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style type="text/css">
        body{   font-family: Arial, Helvetica, sans-serif; color: black;}
				.wrapper{ width: 350px; padding: 20px; }
		html{ 
				background: url(pet2.jpg) no-repeat center fixed; 
				background-size: cover;}
		div.gallery {
						margin: 10px;
						border: 10px solid #ccc;
						float: left;
						width: 350px;
					}
		div.gallery:hover{border: 10px solid #999;}
					
		div.gallery img {
						width: 100%;
						height: auto;
						}

		div.desc	{
						padding: 15px;
						text-align: center;
					}	
		.rosie{
				background-color: tomato;
				color: white;
				padding: 10px;
				text-align: center;
			} 

		.center {
			margin: auto;
			width: 30%;
			padding: 10px;
			}
		.w3-button {width:150px;}

</style>
</head>
<body>
<!-- Comments are not displayed in the browser -->

<h1  align="middle" >BINE ATI VENIT </h1>


	<center>
	<textarea align="middle" name="comments" id="comments" style="width:90%;height:210px;background-color:gold;color:olive;border:none;padding:2%;font:22px/30px sans-serif;cols=50">
		Daca doresti sa pleci in vacanta, dar nu poti din cauza pufoseniei tale preferate, Hotel REX este locul perfect pentru animalul tau de companie. Noi oferim o gama variata de servici precum  Dog Hair Stylist, Medic Veterinarian, Medic Nutritionist and Non-Stop Nursing Assistants. Pentru a beneficia de servicile noastre si de a fi in contact cu prietenul tau cel mai bun noi iti oferim posibilitatea de a folosi noul nostru spatiu virtual.
	</textarea></center>
	
	
<!-- Comments are not displayed in the browser -->
    <div class="rosie center">
        <h2>Login</h2>
        <p>Introduceti datele.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Nume utilizator<br></label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Parola<br></label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="w3-button w3-section w3-green" value="Login">
            </div>
            <p>Nu aveti un cont? <a href="register.php">Inregistreazate acum</a>.</p>
        </form>
    </div> 
	
	<!-- pictures -->
 	
	<div class="gallery">
		<a target="_blank" href="img1.jpg">
		<img src="ima1.jpg" alt="Imagine Indisponibila" style="height:250px;" >
		</a>
		<div class="rosie">Intrare Centrala</div>
	</div>

	<div class="gallery">
		<a target="_blank" href="img2.jpg">
		<img src="ima2.jpg" alt="Imagine Indisponibila" style="height:250px;" >
		</a>
		<div class="rosie">Camera de Joaca</div>
	</div>

	<div class="gallery">
		<a target="_blank" href="img3.jpg">
		<img src="g1.gif" alt="Imagine Indisponibila" style="height:250px;" >
		</a>
		<div class="rosie">Centrul de Ingrijire</div>
	</div>

	<div class="gallery">
		<a target="_blank" href="img4.jpg">
		<img src="ima3.jpg" alt="Imagine Indisponibila" style="height:250px;" >
		</a>
		<div class="rosie">Sala de relaxare</div>
	</div>
	
	<!-- pictures --> 
	<!-- link -->
	<div class="w3-container">
		<a href="documentatie.php" class="w3-button w3-black">Documentatie</a>
	</div>
	<!-- link -->
</body>
</html>