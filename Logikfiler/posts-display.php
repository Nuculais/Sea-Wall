<?php
include "databas.php";

				$show = $databas->query("SELECT * FROM kommentarer");

				if($show->num_rows)
				{
					while($r = $show->fetch_object())
					{
						echo "<p class=\"commentUser\">Postat av: " . $r-> username . "</p>";
						echo "<div class=\"commentbox\"> <p class=\"commentText\">" . $r-> kommentar. "</p></div>";
					}
				}
				else{
				}
				
?>