<?php require 'includes/config.php';
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$item_id = $_GET['item_id'];
		$invoice = $_GET['invoice'];
		if (extract($pdo->get_invoice_details($id))) {
			$item_quan = $item_quantity;
			if ($pdo->return_stock_quantity($item_id, $item_quan)) {
				if ($pdo->remove_item($id)) {
					header('location: index.php');
				}
			}
		}
		
	}
?>