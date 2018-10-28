<?php
	
	/*****************************************************************************************************/
	/******************************************** POSTS CLASS ********************************************/
	/*****************************************************************************************************/

	/* posts(post_id, post_content, post_image, post_user_id, post_tags, created_at, deleted_at, is_deleted, deleted_by, updated_at, updated_by, post_points); */
	require_once("Database.php");
	// require_once("Users.php"); Uncomment this if any errors occur

	/**
	 * Posts class to perform various operations 
	 * on the data-table 'posts'.
	 * 
	 * @package forum
	 * @subpackage classes
	 * @author inspiration7
	 * @access public
	 */
	class Posts {
		private $connection;

		/**
		 * Creates a new Posts object and sets the $connection variable for this object equal to the database connection object.
		 * 
		 * @global resource The universally available database connection (msqli)object named '$database'.
		 * @access public
		 */
		public function __construct() {
			global $database;
			$this->connection = $database->getConnection();
		}

		/**
		 * Function to get all the data from 'posts' table.
		 * 
		 * @access public
		 * @return mysqli_result|void $result_set of 'posts' table on successful retrival, else prints error-details specified by '$this->connection->error' and returns void
		 */
		public function getAllPosts() {
			$sql = "SELECT * FROM posts WHERE is_deleted = 0"; // Select all the posts which are not set to be deleted
			$result_set = $this->connection->query($sql);
			
			if($this->connection->errno) {
				echo "Error: ".$this->connection->errno;
				return;
			}
			return $result_set;
		}

		/**
		 * Function to insert a post into the database.
		 * 
		 * @access public 
		 * @param string $question Specifies the question string
		 * @param string $question_tags Specifies the tags for that question
		 * @return string 'true' when insertion operation is successful, else error-details specified by '$preparedStatement->error'
		 */
		public function insertPost($question, $question_tags) { 
			$user_id = $_SESSION['user_id'];
			$date = date('Y-m-d H:i:s');
			$post_points = 0; // Default post_points
			$question = htmlspecialchars($question); // For preventing the use of Tags in the input(XSS Prevention)
			$question_tags = htmlspecialchars($question_tags);

			$sql = "INSERT INTO posts(post_content, post_tags, post_user_id, created_at, post_points) VALUES(?, ?, ?, ?, ?)";
			$preparedStatement = $this->connection->prepare($sql);
			$preparedStatement->bind_param("ssisi", $question, $question_tags, $user_id, $date, $post_points);
			$preparedStatement->execute();
			$preparedStatement->store_result();

			if($this->connection->errno) {
				return "".$preparedStatement->error;
			}

			// Update no. of posts by this user in the users table
			$sql = "SELECT user_posts FROM users WHERE user_id = $user_id";
			$result_set = $this->connection->query($sql);
			extract(mysqli_fetch_assoc($result_set));
			$user_posts++;

			if($this->connection->error) {
				return "".$this->connection->error;
			} 

			$sql = "UPDATE users SET user_posts = ? WHERE user_id = ?";
			$preparedStatement = $this->connection->prepare($sql);
			$preparedStatement->bind_param("ii",$user_posts,  $user_id);
			$preparedStatement->execute();

			if($this->connection->error) {
				return "".$preparedStatement->error;
			} else {
				return "true";
			}
		}

		/**
		 * Function to get all post details specified by the '$columns' parameter using the '$post_id'.
		 * 
		 * Ex. IF $columns = "post_content", $post_id = 1 THEN 
		 * $sql = "SELECT post_content FROM posts WHERE post_id = 1"
		 * 
		 * @access public
		 * @param int $post_id Specifies the post_id
		 * @param string $columns Specifies the column names to be retrieved from the data-table 'posts' 
		 * @return msqli_result '$result_set' consisting of single row with 'n' number of columns specified by $columns, else null if no such row exists
		 */
		public function getPostById($post_id, $columns) {
			$sql = "SELECT $columns FROM posts WHERE post_id = $post_id";
			$result_set = $this->connection->query($sql);

			if($this->connection->errno) {
				die("Error while getting post details : ".$this->connection->errno);
			}
			return $result_set;
		}

		/**
		 * Function to delete a post row specified by post_id; 
		 * Below function actually sets the 'is_deleted' column to 1;
		 * The post is NOT ACTUALLY deleted from database.
		 * 
		 * @access public
		 * @param int $post_id Specifies the unique post id
		 * @return string 'true' when updation is successful, else returns error-details specified by '$this->connection->error'
		 */
		public function deletePostById($post_id) {
			$admin_id = $_SESSION['user_id'];
			$date = date('Y-m-d H:i:s');
			$sql = "UPDATE posts SET is_deleted = 1, deleted_by = $admin_id, deleted_at = '$date' WHERE post_id = $post_id";
			$result_set = $this->connection->query($sql);

			if($this->connection->error) {
				return "Error while deleting post: ".$this->connection->error;
			} 
			
			// Update no. of posts by this user in the users table
			$sql = "SELECT user_posts FROM users WHERE user_id = $admin_id";
			$result_set = $this->connection->query($sql);
			extract(mysqli_fetch_assoc($result_set));
			$user_posts--;

			if($this->connection->error) {
				return "".$this->connection->error;
			} 

			$sql = "UPDATE users SET user_posts = ? WHERE user_id = ?";
			$preparedStatement = $this->connection->prepare($sql);
			$preparedStatement->bind_param("ii",$user_posts,  $admin_id);
			$preparedStatement->execute();

			if($this->connection->error) {
				return "".$preparedStatement->error;
			} else {
				return "true";
			}
		}

		/**
		 * Function to update $post_tags, $post_content, $admin_id & $date using the $post_id.
		 * 
		 * @access public
		 * @param int $post_id Specifies the unique post id
		 * @param string $post_tags Specifies the tags for that question/post
		 * @param string $post_content Specifies the post/question content
		 * @param int $admin_id Specifies the unique admin id
		 * @param string $date Specifies the date on which the updation was performed
		 * @return string 'true' when updation is successful, else returns error-details specified by '$this->connection->error'
		 */
		public function updatePostById($post_id, $post_tags, $post_content, $admin_id, $date) {
			$sql = "UPDATE posts SET post_tags = '$post_tags', post_content = '$post_content', updated_at = '$date', updated_by = $admin_id WHERE post_id = $post_id";
			$result_set = $this->connection->query($sql);

			if($this->connection->error) {
				return "Error while Updating comment: ".$this->connection->error;
			}
			return "true";
		}
	}
?>