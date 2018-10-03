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
				echo "Error : ".$this->connection->errno;
				return;
			}
			return $result_set;
		}

		public function addUser($first_name, $last_name, $user_name, $email, $password, $user_dob, $user_branch) {
			$no_of_posts = 3; // Change this later
			$user_role = "user"; // Default user_role
			$user_profile_img = ""; // Provide a functionality for uploading image once the user logs in 
			$user_created_at = date('Y-m-d h:i:sa');

			$sql = "INSERT INTO users(first_name, last_name, user_name, user_password, user_email, user_dob, user_branch, user_posts, user_role, user_profile_img, user_created_at) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
			$preparedStatement = $this->connection->prepare($sql);
			$preparedStatement->bind_param("sssssssisss", $first_name, $last_name, $user_name, $password, $email, $user_dob, $user_branch, $no_of_posts, $user_role, $user_profile_img, $user_created_at);
			$preparedStatement->execute();
			$preparedStatement->store_result();

			if($this->connection->errno){
				echo "Error :".$this->connection->errno;
				return;
			}
		}
	}
?>