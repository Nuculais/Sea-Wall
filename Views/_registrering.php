<!DOCTYPE HTML>
<html>
	<head>
	<script src="../Validering/validate-registrering.js"></script>	
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<link rel="stylesheet" type="text/css" href="../assets/css/style.css"/>
			<?php include '_header.php';?>
			<?php include '_footer.php';?>
	</head>
	<body>
				<div id='registreringsruta'>
				
			   	<form class='registrering' name='registrering' id='registrering' action='../Logikfiler/register-process2.php' method='POST' onsubmit='return validateForm()'>
				   	<h3 id='regrubrik'>Registrera dig här för att kunna posta kommentarer</h3>			     
					<p><label for='username' >Användarnamn: </label></p>
					<p><input type='text' name='username' id='username'></p>

					<p><label for='email' >E-Mail:</label></p>
					<p><input type='text' name='email' id='email' ></p>

					<p><label for='password' >Lösenord:</label></p>
					<p><input type='password' name='password' id='password'></p>

					<p><input type='submit' name='Submit' id='Submit' value='Registrera mig!' ></p>
				</form>
				
				</div>
	</body>
</html>