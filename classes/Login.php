<?php
    	
   /******************************************************************************************************
	******************************************** LOGIN CLASS *********************************************
	******************************************************************************************************/

	require_once("Database.php");

	/**
	 * Login class for performing check operations while logging in.
	 * 
	 * @package forum
	 * @subpackage classes
	 * @author inspiration7
	 * @access public
	 */
	class Login {
		private $connection;

		/**
		 * Creates a new Login object and sets the $connection variable for this object equal to the database connection object.
		 * 
		 * @global resource The universally available database connection (msqli)object named '$database'.
		 * @access public
		 */
		public function __construct(){
			global $database;
			$this->connection = $database->getConnection();
		}

		// Without using prepared statements
		// public function validateLogin($email, $password) {
		// $sql = "SELECT * FROM users WHERE user_email = '$email' AND user_password = '$password'";
		// 	$result_set = $this->connection->query($sql);
		// 	$num_rows = mysqli_num_rows($result_set); // Returns the number of rows in the result_set

		// 	if($num_rows > 0) { 
		// 		return true;
		// 	} else {
		// 		return false;
		// 	}
		// }

		/**
		 * Function to get all details of the user specified by $email.
		 * 
		 * @access public
		 * @param string $email Specifies the email of the user trying to login
		 * @return mysqli_result|string Single row $result_set from 'users' table on successful retrival, else dies and error-details specified by '$this->connection->error' 
		 */
		public function getCredentials($email) {
			$sql = "SELECT * FROM users WHERE user_email = '$email'";
			$result_set = $this->connection->query($sql);
			
			if($this->connection->errno){
				die("Error: ".$this->connection->errno);
			}
			return $result_set;
		}

		/**
		 * Function to check if the user trying to login exists in the database.
		 * 
		 * @access public
		 * @param string $email Specifies the email of the user trying to login
		 * @param string $password Specifies the password of the user trying to login
		 * @return bool 'true' when such user exists in the database, else 'false'
		 */
		public function validateLogin($email, $password) { // using preparedStatements
			$sql = "SELECT * FROM users WHERE user_email = ? AND user_password = ?";
			$preparedStatement = $this->connection->prepare($sql);
			$preparedStatement->bind_param("ss", $email, $password);
			$preparedStatement->execute();
			$preparedStatement->store_result(); // php 7 method
			
			if($preparedStatement->num_rows > 0) { 
				return true;
			}else {
				return false;
			}
		}
	}
?>