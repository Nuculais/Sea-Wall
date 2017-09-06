<?php session_start(); ?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	function LogIn()
	{		
		include "databas.php";
		
		if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))		
		{
				?>			
			<div id='controlwrap1'>
			<div class="userControl">
				<form id='userButtons'>	
					<input type='button' value='Logga ut' id='LogOut' onClick="parent.location='../Logikfiler/logout-process.php'">
				</form>
			</div>	
			</div>
		     <?php
		}
		
		elseif(!empty($_POST['username']) && !empty($_POST['password']))
	{	
			$username = $_POST['username'];
		    $password = $_POST['password'];
			

			# SQL Injection-skydd #
			$databas->real_escape_string('$username');
			$databas->real_escape_string('$password');
			
			
			
			# Verifierar att användaren finns och att lösenordet är rätt #		
		$dbhash = $databas->query("SELECT password_hash FROM inloggning WHERE username = '$username'");
		while ($row = $dbhash->fetch_assoc()) {
		$hash = $row["password_hash"];						
		
				if(password_verify($password, $hash))
			{		
		
		$checklogin = $databas->query("SELECT * FROM inloggning WHERE username = '$username' ");
		if($checklogin->num_rows == 1) 
			{								
		        $_SESSION['Username'] = $username;
		        $_SESSION['LoggedIn'] = 1;
		         
		        echo "<meta http-equiv='refresh' content=1>";
		    } 
		
			else
		    {
		        echo "<h1>Felaktigt användarnamn.</h1>";
				echo "<meta http-equiv='refresh' content=1>";
		    }
		}
		else
		{
			echo "<h1>Felaktigt lösenord.</h1>";					
			echo "<meta http-equiv='refresh' content=1>";
		}
	}}
			
		else
		{
		    ?>
			<div id='controlwrap2'>
			<div class="userControl">
				<form method="post" name="loginform" id='loginform' onsubmit='return validateForm()'>
					<input type='text' placeholder='Användarnamn' name='username' id='username'><br />
					<input type='password' placeholder='Lösenord' name='password' id='password'><br />	
					<input type='submit' value='Logga in' id='LogIn' name='LogIn'><br />
					<input type='button' value='Registrera' id='Register' onClick="parent.location='../Logikfiler/register-process2.php'"><br />
				</form>
			</div>
				</div>
		<?php
		}
	}
	
?>