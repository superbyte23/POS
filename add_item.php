<?php require 'includes/config.php';
	if (isset($_POST['add'])) {
		$barcode = $_POST['barcode'];
		$invoice = $_POST['invoice_id'];
		$quantity = $_POST['quantity'];

		if (extract($pdo->get_product($barcode))) {

			if ($item_quantity < $quantity) {
				$_SESSION['less_qty'] = true;
			header('location: sales.php?invoice='.$invoice.'&no_stock=1');
				
			}else{
				$total_amount = $item_price * $quantity;
				$prevat = $total_amount * 0.12;
				$vat = round($prevat, 2);
				$t_price = $total_amount + $vat;
				$total_price = round($t_price,2);
				if ($pdo->insert_invoice_detail($invoice, $item_id, $quantity, $item_price, $total_amount, $vat, $total_price)) {

					if ($pdo->update_stock_out_item_quantity($item_id, $quantity)) {
						header('location: sales.php?invoice='.$invoice);
					}
				}
			}

		}else{
			$_SESSION['invalid_item'] = true;
			header('location: sales.php?invoice='.$invoice.'&item=0');
		}
		

	}
?>