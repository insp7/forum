<?php
	
	/*****************************************************************************************************
	******************************************** COMMENTS CLASS ******************************************
	******************************************************************************************************/

	/*
		comments(comment_id, comment_post_id, comment_author, comment_author_id, comment_content, created_at, updated_at, is_deleted, deleted_by);
	*/

	require_once("Database.php");

	if(session_status() == PHP_SESSION_NONE) {
        session_start(); // Session not started so start the session
    }
    
    /**
     * Comments class for performing various operations(select, insert, delete) 
     * on the data-table 'comments'.
     * 
     * @package forum
     * @subpackage classes
     * @author insp7
     * @access public
     */
	class Comments {
		private $connection;

		/**
		 * Creates a new Comments object and sets the $connection variable for this object equal to the database connection object.
		 * 
		 * @global resource The universally available database connection (msqli)object named '$database'.
		 * @access public
		 */
		public function __construct() {
			global $database;
			$this->connection = $database->getConnection();
		}

		/**
		 * Function to get all the data from 'comments' table.
		 * 
		 * @access public
		 * @return mysqli_result|void $result_set of 'comments' table on successful retrival, else prints error-details specified by '$this->connection->error'
		 */
		public function getAllComments() {
			$sql = "SELECT * FROM comments WHERE is_deleted = 0"; // Select all the posts which are not set to be deleted
			$result_set = $this->connection->query($sql);
			
			if($this->connection->errno) {
				echo "Error: ".$this->connection->errno;
				return;
			}
			return $result_set;
		}

		/**
		 * Function to insert comment into comments table.
		 * 
		 * @access public
		 * @param int $comment_post_id Specifies the id of the post on which this comment is getting posted
		 * @param string $comment_content Specifies the comment content 
		 * @return bool|string 'true' upon successful insertion of comment, else returns the msqli_error string specified by '$this->connection->error'
		 */
		public function insertComment($comment_post_id, $comment_content) { 
			$comment_author = $_SESSION['user_name']; // because the currently logged in user is the author of comments he posts.
			$comment_author_id = $_SESSION['user_id'];
			$date = date('Y-m-d H:i:s'); 

			$sql = "INSERT INTO comments(comment_post_id, comment_author, comment_author_id, comment_content, created_at) VALUES(?, ?, ?, ?, ?)";
			$preparedStatement = $this->connection->prepare($sql);
			$preparedStatement->bind_param("isiss", $comment_post_id, $comment_author, $comment_author_id, $comment_content, $date);
			$preparedStatement->execute();
			$preparedStatement->store_result(); 
			
			if(!$this->connection->errno)
				return true;
			else
				return $this->connection->error;
		}

		/**
		 * Function to get all the comments of a particular post specified by $comment_post_id.
		 * 
		 * @access public
		 * @param int $comment_post_id Specifies the post_id on which comments are posted
		 * @return mysqli_result '$result_set' upon successful retrival, else dies and prints error specified by '$this->connection->error'
		 */
		public function getAllCommentsByPostId($comment_post_id) { // Redundant function
			$sql = "SELECT * FROM comments WHERE comment_post_id = $comment_post_id AND is_deleted = 0";
			$result_set = $this->connection->query($sql);

			if($this->connection->errno) {
				die("Error while getting user details : ".$this->connection->error);
			}
			return $result_set;
		}

		/**
		 * Function to get the creation time of the latest comment created.
		 * 
		 * @access public
		 * @return mysqli_result '$result_set' upon successful retrival, else dies and prints error specified by '$this->connection->error'
		 */
		public function getLatestCommentCreationTime() {
			$sql = "SELECT comment_id, created_at FROM comments WHERE comment_id IN (SELECT max(comment_id) FROM comments)";
			$comment_creation_time = $this->connection->query($sql); 

			if($this->connection->errno) {
				die("Error while getting user details : ".$this->connection->error);
			}
			return $comment_creation_time;
		}

		/**
		 * Function to get all comment details specified by the '$columns' parameter using the $comment_id.
		 * 
		 * @access public
		 * @param int $comment_id Specifies the unique comment_id
		 * @param string $columns 
		 * @return msqli_result|null '$result_set' consisting of single row with 'n' number of columns specified by $columns, else null if no such row exists
		 */
		public function getCommentDetailsById($comment_id, $columns) {
			$sql = "SELECT $columns FROM comments WHERE comment_id = $comment_id AND is_deleted = 0";
			$result_set = $this->connection->query($sql);

			if($this->connection->errno) {
				die("Error while getting user details : ".$this->connection->error);
			}
			return $result_set;
		}

		/**
		 * Function to delete a comment row specified by comment_id; Below function actually sets the 'is_deleted' column to 1;
		 * The comment is NOT ACTUALLY deleted from database.
		 * 
		 * @access public
		 * @param int $comment_id Specifies the unique comment_id
		 * @return string 'true' upon successful execution(updation), else error-details specified by '$this->connection->error' 
		 */
		public function deleteCommentById($comment_id) {
			$admin_id = $_SESSION['user_id'];
			$sql = "UPDATE comments SET is_deleted = 1, deleted_by = $admin_id WHERE comment_id = $comment_id";
			$result_set = $this->connection->query($sql);

			if($this->connection->error) {
				return "Error while deleting comment: ".$this->connection->error;
			} 
			return "true";
		}
	}
?>