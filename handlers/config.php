<?php

	$dbhost = 'locahost';
	$dbname = 'chatapp';
	$dbuser = 'root';
	$dbpass = '';

	try {

		$db = new PDO( "mysql:dbhost=$dbhost;dbname=$dbname", "$dbuser", "$dbpass" );
	} catch ( PDOException $e ) {
		echo 'Failed to connect' . $e -> getMessage();
	}

?>