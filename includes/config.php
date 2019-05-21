<?php session_start();

// if (isset($_SESSION['user_id'])) {
// 	header('Location: index.php');

// }else{
// 	header('Location: login.php');
	
// }

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "point_of_sale_inventory_db";

	try {
		$con = new PDO("mysql:host={$host};dbname={$dbname}",$user,$pass);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e ) {
		echo "ERROR: " . $e->getMessage() . "<br/>";
		die();
	}
require 'library/cashiering_lib.php';
require 'library/user_lib.php';
require 'library/products_lib.php';

$pdo = new get_item($con);

$users = new users($con);

$product = new products($con);

?>