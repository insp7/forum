<?php
	
	/*****************************************************************************************************
	******************************************** POSTS CLASS *********************************************
	******************************************************************************************************/

	/*
	posts(post_id, post_content, post_image, post_user_id, created_at, deleted_at, deleted, updated_at, parent_post_id, 
	post_points, post_points_dirty_bit)
	*/

	require_once("Database.php");

	class Posts {
		private $connection;

		public function __construct() {
			global $database;
			$this->connection = $database->getConnection();
		}

		public function getAllPosts() {
			$sql = "SELECT * FROM posts WHERE is_deleted = 0"; // Select all the posts which are not set to be deleted
			$result_set = $this->connection->query($sql);
			if($this->connection->errno) {
				echo "Error: ".$this->connection->errno;
				return;
			}
			return $result_set;
		}

		public function insertPost($question, $question_tags) { 
			$user_id = $_SESSION['user_id'];
			$date = date('Y-m-d H:i:s');
			$post_points = 0; 

			$sql = "INSERT INTO posts(post_content, post_tags, post_user_id, created_at, post_points) VALUES(?, ?, ?, ?, ?)";
			$preparedStatement = $this->connection->prepare($sql);
			$preparedStatement->bind_param("ssisi", $question, $question_tags, $user_id, $date, $post_points);
			$preparedStatement->execute();
			$preparedStatement->store_result(); 
			
			if(!$this->connection->errno)
				return true;
			else
				return false;
		}

		/*  Function to get all post details specified by the '$columns' parameter using the $post_id
			Ex. IF $columns = "post_content", $post_id = 1 THEN
				$sql = "SELECT post_content FROM posts WHERE post_id = 1"

			returns a single row with 'n' number of columns specified in the $columns parameter 
			OR returns null if no such row exists
		*/
		public function getPostById($post_id, $columns) {
			$sql = "SELECT $columns FROM posts WHERE post_id = $post_id";
			$result_set = $this->connection->query($sql);

			if($this->connection->errno) {
				die("Error while getting user details : ".$this->connection->errno);
			}
			return $result_set;
		}
	}
?>