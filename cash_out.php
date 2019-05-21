<?php require 'includes/config.php';
	if (isset($_POST['cash_out'])) {
		$total_payment = $_POST['total_payment'];
		$change = $_POST['change'];
		$cash_tendered = $_POST['cash_tendered'];
		$invoice_number = $_POST['invoice_number'];
		if ($pdo->invoice_success($invoice_number, $total_payment, $cash_tendered, $change)) {
			header('location: index.php');
		}
	}
?>