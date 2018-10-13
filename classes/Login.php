<?php
    	
   /******************************************************************************************************
	******************************************** LOGIN CLASS *********************************************
	******************************************************************************************************/

	require_once("Database.php");

	class Login {
		private $connection;

		public function __construct(){
			global $database;
			$this->connection = $database->getConnection();
		}

		/*
		public function validateLogin($email, $password){
			$sql = "SELECT * FROM users WHERE user_email = '$email' AND user_password = '$password'";
			$result_set = $this->connection->query($sql);
			$num_rows = mysqli_num_rows($result_set); // Returns the number of rows in the result_set

			if($num_rows > 0) { 
				return true;
			}else {
				return false;
			}
		}*/

		public function getCredentials($email) {
			$sql = "SELECT * FROM users WHERE user_email = '$email'";
			$result_set = $this->connection->query($sql);
			
			if($this->connection->errno){
				echo "Error: ".$this->connection->errno;
			}
			return $result_set;
		}

		// using preparedStatements
		public function validateLogin($email, $password) {
			$sql = "SELECT * FROM users WHERE user_email = ? AND user_password = ?";
			$preparedStatement = $this->connection->prepare($sql);
			$preparedStatement->bind_param("ss", $email, $password);
			$preparedStatement->execute();
			$preparedStatement->store_result(); 
			
			if($preparedStatement->num_rows > 0) { 
				return true;
			}else {
				return false;
			}
		}
	}
?>