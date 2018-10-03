<?php 
	require_once("Database.php");

	class Users{
		private $connection;

		public function __construct(){
			global $database;
			$this->connection = $database->getConnection();
		}

		public function getAllUsers(){
			$sql = "SELECT * FROM users";
			$result_set = $this->connection->query($sql);
			if($this->connection->errno){
				echo "Error: ".$this->connection->errno;
				return;
			}
			return $result_set;
		}
	}
?>