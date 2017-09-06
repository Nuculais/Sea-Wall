<?php
include_once "databas.php";
include "../Views/Index.php";

if(isset($_POST['posta']))
	{
			# Serversidesvalidering #
		    if(empty($_POST['kommentaren']))
		{
			die("Tomma kommentarer är ej tillåtna.");
		}
			else {					
                    {  
                            $username = $_SESSION['Username'];                            
                            $kommentar = $_POST['kommentaren'];
                           
						#SQL Injection-skydd #
						$databas->real_escape_string('$kommentar');
						
                            $post = "INSERT INTO kommentarer (username, kommentar) VALUES('$username', '$kommentar');";
							
                            if($a = $databas->query($post));   
							{
								echo "Tack för din kommentar!";
								echo "<meta http-equiv='refresh' content=3>";
							}		
							else 
							{
								echo "Kommentarspostandet misslyckades.";
								echo "<meta http-equiv='refresh' content=3>";  
							}						   
                    }
		  }
        }
?>