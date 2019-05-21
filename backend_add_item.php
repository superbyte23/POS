<?php
	require 'includes/config.php';
	if (isset($_POST['barcode'])) {
		$quantity = $_POST['quantity_item'];
		$invoice = $_POST['invoice'];
		function check_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}    
		$barcode = check_input($_POST['barcode']);
		if (!preg_match("/^[a-zA-Z0-9_]*$/",$barcode)) {
			return false;
		}else{
			try {
				$sql = "SELECT * FROM `tbl_items` WHERE `item_code` = '".$barcode."'";
				$pdo->get_product($sql, $quantity, $invoice);
				// extract($pdo->get_id($id));
				$pdo->insert_invoice_detail($invoice, $item_id, $quantity, $item_price, $total_amount, $total_price);
			} catch (PDOException $e) {
				echo $e->getMessage();
				return false;
			}
		}
	}
?>