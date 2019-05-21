<?php 

	class users{
			
		private $db;
		
		function __construct($con)
		{
			$this->db = $con;
		}

		public function login($request){
			try {
				$stmt = $this->db->prepare('SELECT * FROM users WHERE username = :username AND password = :password');
				$stmt->bindParam(':username', $request['username']);
				$stmt->bindParam(':password', $request['password']);
				$stmt->execute();
				return $stmt;
			} catch (PDOException $e) {
				return $e->getMessage();
			}
		}
	}
?>