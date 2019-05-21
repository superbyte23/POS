<?php
	include 'includes/config.php';
	$get_invoice = "SELECT 	* FROM `invoice` ORDER BY `transaction_id` DESC LIMIT 1";
	$pdo->get_invoice_number($get_invoice);
?>