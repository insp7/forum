<?php 
	/*****************************************************************************************************
	******************************************** USERS CLASS *********************************************
	******************************************************************************************************/
	
	/* users(user_id, first_name, last_name, user_name, user_password, user_email, user_dob, user_branch, user_posts, user_role, user_profile_img, user_created_at, is_deleted, deletd_by, deleted_at); */

	require_once("Database.php");

	/**
	 * Users class for performing various operations(select, insert, delete)
	 * on the data-table 'users'.
	 * 
	 * @package forum
	 * @subpackage classes
	 * @author insp7
	 * @access public
	 */
	class Users {
		private $connection;

		/**
		 * Creates a new Users object and sets the $connection variable for this object equal to the database connection object.
		 * 
		 * @global resource The universally available database connection (msqli)object named '$database'.
		 * @access public
		 */
		public function __construct() {
			global $database;
			$this->connection = $database->getConnection();
		}

		/**
		 * Function to get all the data from 'users' table.
		 * 
		 * @access public
		 * @return mysqli_result|void $result_set of 'users' table on successful retrival, else prints error-details specified by '$this->connection->error' and returns void
		 */
		public function getAllUsers() {
			$sql = "SELECT * FROM users WHERE is_deleted = 0";
			$result_set = $this->connection->query($sql);
			
			if($this->connection->errno){
				echo "Error : ".$this->connection->errno;
				return;
			}
			return $result_set;
		}

		/**
		 * Function to insert a user into the data-table 'users';
		 * returns void; if connection-error occurs, prints the error-details specified by '$this->connection->errno'
		 * 
		 * @access public
		 * @param string $first_name Specifies the first name of the user 
		 * @param string $last_name Specifies the last name of the user
		 * @param string $user_name Specifies the username of the user (This will be publicly visible)
		 * @param string $email Specifies the email of the user
		 * @param string $password Speciifes the password of the user
		 * @param string $user_dob Specifies the user's date of birth
		 * @param string $user_branch Specifies the user's branch
		 */
		public function addUser($first_name, $last_name, $user_name, $email, $password, $user_dob, $user_branch) {
			$no_of_posts = 0; // By default the user will have zero posts
			$user_role = "user"; // Default user_role
			$user_profile_img = ""; // Provide a functionality for uploading image once the user logs in 
			$user_created_at = date('Y-m-d h:i:sa');

			$sql = "INSERT INTO users(first_name, last_name, user_name, user_password, user_email, user_dob, user_branch, user_posts, user_role, user_profile_img, user_created_at) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
			$preparedStatement = $this->connection->prepare($sql);
			$preparedStatement->bind_param("sssssssisss", $first_name, $last_name, $user_name, $password, $email, $user_dob, $user_branch, $no_of_posts, $user_role, $user_profile_img, $user_created_at);
			$preparedStatement->execute();
			$preparedStatement->store_result();

			if($this->connection->errno) {
				echo "Error :".$this->connection->errno;
				return;
			}
		}

		/**
		 * Function to get all user details specified by the '$columns' parameter using the $user_id;
		 * if there's a connection-error, dies and prints the error-details specified by '$this->conntion->errno'.
		 * 
		 * Ex. IF $columns = "first_name, last_name, user_name", $user_id = 1 THEN
		 * $sql = "SELECT first_name, last_name, user_name FROM users WHERE user_id = 1".
		 * 
		 * @access public
		 * @param int $user_id Speciifes the unique user id
		 * @param string $columns Specifies the column names to be retrieved
		 * @return mysqli_result '$result_set' consisting of a single row upon successful execution, else returns null if no such row exists
		 */
		public function getUserDetailsById($user_id, $columns) {
			$sql = "SELECT $columns FROM users WHERE user_id = $user_id";
			$result_set = $this->connection->query($sql);

			if($this->connection->errno) {
				die("Error while getting user details : ".$this->connection->errno);
			}
			return $result_set; 
		}

		/**
		 * Function to delete a user row specified by user_id;
		 * Below function actually sets the 'is_deleted' column to 1;
		 * The post is NOT ACTUALLY deleted from database.
		 * 
		 * @access public
		 * @param int $user_id Specifies the unique user_id
		 * @return string 'true' upon successful updation, else returns error-details specified by '$this->connection->error'
		 */
		public function deleteUserById($user_id) {
			$admin_id = $_SESSION['user_id'];
			$date = date('Y-m-d H:i:s');
			$sql = "UPDATE users SET is_deleted = 1, deleted_by = $admin_id, deleted_at = '$date' WHERE user_id = $user_id";
			$result_set = $this->connection->query($sql);

			if($this->connection->error) {
				return "Error while deleting User: ".$this->connection->error;
			} 
			return "true";
		}
	}	
?>