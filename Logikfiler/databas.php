<?php

	$databas = mysqli_connect('localhost', 'root', '', 'kommentarDB');

	if($databas->connect_errno > 0) {
		die('Could not connect to database [' . $databas->connect_errno . ']');
	}

?>