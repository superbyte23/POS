<?php 

	class products{
			
		private $db;
		
		function __construct($con)
		{
			$this->db = $con;
		}



		public function load_products($sql){
			try {
				$stmt = $this->db->prepare($sql);
				$stmt->execute();
				return $stmt;
			} catch (PDOException $e) {
				// echo $e->getMessage();
			}
		} 

		public function add_product($request) {
			try {

				$stmt = $this->db->prepare("INSERT INTO `tbl_items`(`item_code`, `item_name`, `item_quantity`, `item_price`) VALUES (:item_code, :item_name, :item_quantity, :item_price)");
				$stmt->bindParam(':item_code', $request['code']);
				$stmt->bindParam(':item_name', $request['name']);
				$stmt->bindParam(':item_quantity', $request['quantity']);
				$stmt->bindParam(':item_price', $request['price']);
				$stmt->execute();

				header("Location: products.php");

			} catch (PDOException $e) {
				// echo $e->getMessage();
			}
		}
	}
?>
