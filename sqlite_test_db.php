<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "powercalc";

try {
		$con = new PDO("mysql:host={$host};dbname={$dbname}",$user,$pass);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if ($con) {
			echo "Connected";
		}
	} catch (PDOException $e ) {
		echo "ERROR: " . $e->getMessage() . "<br/>";
		die();
	}

?>