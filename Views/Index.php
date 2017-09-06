<?php
include ("../Logikfiler/databas.php");
include ("../Logikfiler/login-process.php"); 
include "_header.php"; ?>


<!DOCTYPE html>
<html>
	<head>
	<script src="../Validering/validate-post.js"></script>
	<script src="../Validering/validate-login.js"></script>
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css" />
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
	<?php LogIn(); ?>
	</head>
	<body>

		<div class='main'>
			<div id='posted'>
			<div id='kommentarerna'>
				<?php
				
				include "../Logikfiler/posts-display.php";
			
				?>
					</div>	
			</div>
			
<?php        if(!empty($_SESSION['Username']))
        {
?>	
			<div id='posting'>					
			<form action='../Logikfiler/posts-process.php' name='kommentar' method='POST' id='kommentar' onsubmit='return validateForm()'>
				<p id='octo'>Vad tycker du om havet?</p>	
				<textarea rows='10' columns='50' id='kommentaren' name='kommentaren' ></textarea><br/>
				<input type='submit' value='Posta kommentar' name='posta' id='posta'>
			</form>
		</div>
		
		<?php 
        } 

        ?>						
		<?php include "_footer.php"; ?>
	</body>
</html>
