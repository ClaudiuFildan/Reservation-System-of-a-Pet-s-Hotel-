<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center;}
		html{ 
				background: url(pet2.jpg) no-repeat center fixed; 
				background-size: cover;}
		table{
			padding:0;
		}
		.rosie{
				background-color:#cddc39;
				color: white;
				width: 40%
				padding: 10px;
				
				border-radius:20px;
				

				
				margin:25px;
			}
		.page-headerim {
				padding-bottom: 0px;
				margin: 40px 500 20px;
				border-bottom: 0px solid;
			}
		.center {
			margin:  0 auto;
			width: 40%;
			padding: 10px;
			text-align: center;
			}
		

		
    </style>
</head>
<body>
    <div class=" rosie center">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Bine ai venit pe site-ul nostru.</h1>
    
		<center><table>
    <!--<tr><td>Id utilizator:				    </td> <td><b><?php echo htmlspecialchars($_SESSION["id"]);       ?></b><br> </td></tr>
	-->
		<tr><td>Numele de utilizator:  			</td> <td><b><?php echo htmlspecialchars($_SESSION["username"]); ?></b><br> </td></tr>
		<tr><td>Nume de Familie: 			</td> <td><b><?php echo htmlspecialchars($_SESSION["lastname"]); ?></b><br> </td></tr>
		<tr><td>Prenume:				</td> <td><b><?php echo htmlspecialchars($_SESSION["firstname"]);?></b><br> </td></tr>
		<tr><td>Data sosire:        			</td> <td><b><?php echo htmlspecialchars($_SESSION["checkin"]);  ?></b><br> </td></tr>
		<tr><td>Data plecare:      			</td> <td><b><?php echo htmlspecialchars($_SESSION["checkout"]); ?></b><br> </td></tr>
		<tr><td>Numele cainelui:		        </td> <td><b><?php echo htmlspecialchars($_SESSION["dogname"]);  ?></b><br> </td></tr>
		<tr><td>Rasa cainelui:		    	        </td> <td><b><?php echo htmlspecialchars($_SESSION["race"]);     ?></b><br> </td></tr>
		<tr><td>Varsta cainelui:			</td> <td><b><?php echo htmlspecialchars($_SESSION["age"]);      ?></b><br> </td></tr>
		<tr><td>Sexul cainelui:		    `  	        </td> <td><b><?php echo htmlspecialchars($_SESSION["sex"]);      ?></b><br> </td></tr>
		<tr><td>Descrierea cainelui:  		        </td> <td><b><?php echo htmlspecialchars($_SESSION["des"]);      ?></b><br> </td></tr>
		<tr><td>Numarul de telefon:  		        </td> <td><b><?php echo htmlspecialchars($_SESSION["phone"]);    ?></b><br> </td></tr>
		
   
		<table></center>
		<br>
        <a href="reset-password.php" class="w3-button w3-aqua">Resetare parola</a>
        <a href="logout.php" class="w3-button w3-red">Iesire din cont</a>
	
    <form action="action.php" method="post">
			<h2><br>Introduceti urmatoarele date: <br></h2>
			<center><table>
		                         <!-- Username: <input type="text" name="input1" value=<?php echo $_SESSION["username"]?> > -->
            
			<tr>           <td>             Nume :</td> <td> <input type="text" name="input8"></td></tr>
            
		        <tr>           <td>           Prenume:</td> <td> <input type="text" name="input9"></td></tr>
            
			<tr>           <td> Numele Animalului:</td> <td> <input type="text" name="input2"></td></tr>
            
			<tr>           <td>            Idchip:</td> <td> <input type="text" name="input3"></td></tr>
            
			<tr>           <td>              Rasa:</td> <td> <input type="text" name="input4"></td></tr>
            
                        <tr>           <td>             Varsta:</td> <td><input type="text" name="input5"></td></tr>
            
			<tr>           <td>                Sex:</td> <td><input type="text" name="input6"></td></tr>
            
			<tr>           <td>         Descrierea:</td> <td> <input type="text" name="input7"></td></tr>
            
			<tr>           <td>        Data sosire:</td> <td> <input type="text" name="input10"></td></tr>
            
		        <tr>           <td>       Data plecare:</td> <td> <input type="text" name="input11"></td></tr>
			
			<tr>           <td>              Phone:</td> <td> <input type="text" name="input12"></td></tr>
            
			<table></center>
			<br><br>
			<input class="w3-button w3-white" type="submit" value="Inserare date">
			<br><br>
        </form>
		
		
		 
		<form action="actiondelete.php" method="post">
                    <?php $_SESSION["username"]?>
					<!--Username: <input type="text" name="input1"> -->
			<br>
			
			<input class="w3-button w3-white" type="submit" value="Stergeti toate datele contului">	
        </form>
		
		
		
		
		
	 </div>	
	</div>
</body>
</html>