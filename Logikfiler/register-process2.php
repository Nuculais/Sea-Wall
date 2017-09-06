<?php
 include 'databas.php' ; 
 include_once '../Views/_registrering.php'; ?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</html>
<?php

		# Server side-validering #
if(!empty($_POST))
{
   
    if(empty($_POST['username']))
    {
         die("Du måste välja ett användarnamn.");
    }
    
    
    if(empty($_POST['password']))
    {
        die("Du måste välja ett lösenord.");
    }
    

    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    {
        die("Du måste ange en giltig e-mailadress.");
    } 
		# Validering klar #
																
				$username = $_POST['username'];
			    $password = $_POST['password'];
			    $email = $_POST['email']; 
				
				# SQL injection-skydd #	
				$databas->real_escape_string('$username');					
				$databas->real_escape_string('$password');
				$databas->real_escape_string('$email');
				
					
				# Hashande #			
				 								     
				$password_hash = password_hash($password, PASSWORD_DEFAULT);
				 
			    $checkusername = $databas->query("SELECT * FROM inloggning WHERE username = '$username'");
			    $checkemail = $databas->query("SELECT * FROM inloggning WHERE email = '$email'");
			    $Valid = true;
	 
			    if($checkusername->num_rows == 1)
			    {
			       echo "<h1>Ett fel har inträffat:</h1>";
			       echo "<p>Användarnamnet är upptaget.</p>";
			       echo "<meta http-equiv='refresh' content=3>";
			       $Valid = false;
			    }

			    if($checkemail->num_rows == 1)
			    {
			       echo "<h1>Ett fel har inträffat:</h1>";
			       echo "<p>Ett konto med den här e-mailadressen finns redan.</p>";
			       echo "<meta http-equiv='refresh' content=3>";
			       $Valid = false;
			    }

			    if($Valid)
			    {													
			       $registerquery = "INSERT INTO inloggning (username, email, password_hash) VALUES('$username', '$email', '$password_hash');";
			       
			
			       if($bleh = $databas->query($registerquery))
			       {
			           echo "<h1>Registreringen lyckades!</h1>";
			           echo "<p>Ditt konto har nu skapats</p>";
			       }
				   
			       else
		        	{
		            	echo "<h1>Ett fel har inträffat:</h1>";
		            	echo "<p>Registreringen misslyckades</p>";
		            	echo "<meta http-equiv='refresh' content=3>";    
			   		} 
			    }
				
				
					# EFTER ALLT #
	
					header("Location: ../Views/Index.php");
						die("Redirecting to index.php"); 
				}
						?>