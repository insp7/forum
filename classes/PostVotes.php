<?php
	
	/*********************************************************************************************************/
	/******************************************** POSTVOTES CLASS ********************************************/
	/*********************************************************************************************************/

	/* post_votes(post_votes_id, post_id, user_id, vote); */

	require_once("Database.php");

	/**
	 * PostVotes class for performing various operations(select, insert, update, delete) 
	 * on the data-table 'post_votes'.
	 * 
	 * @package forum
	 * @subpackage classes
	 * @author inspiration7
	 * @access public
	 */
	class PostVotes {
		private $connection;

		/**
		 * Creates a new PostVotes object and sets the $connection variable for this object equal to the database connection object.
		 * 
		 * @global resource The universally available database connection (msqli)object named '$database'.
		 * @access public 
		 */
		public function __construct() {
			global $database;
			$this->connection = $database->getConnection();
		}

		/** 
		* Function to get all the data from 'post_votes' table.
		* 
		* @access public
		* @return mysqli_result|string $result_set of 'post_votes' table on successful retrival, else error-details specified by '$this->connection->error'
		*/
		public function getAllPostsVotes() {
			$sql = "SELECT * FROM post_votes"; // Select all the posts which are not set to be deleted
			$result_set = $this->connection->query($sql);
			
			if($this->connection->errno) {
				return "Error while getting postVotes: ".$this->connection->error;
			}
			return $result_set;
		}

		/**
		 * Function to upvote post specified by '$post_id' and to insert(remember) the upvoter's id specified by '$upvoter_id';
		 * And also INCREMENTS the post_points of the post specified by 'post_id' in the 'posts' table by 1.
		 * 
		 * @access public
		 * @param int $post_id unique id of post 
		 * @param int $upvoter_id unique id of the upvoter(i.e. the one who upvoted this post specified by $post_id)
		 * @return string 'true:'.$post_points upon successful insertion(into 'post_votes') & updation(on 'posts'), else error-details specified by '$this->connection->error'
		 */
		public function upvotePostById($post_id, $upvoter_id) {
			$sql = "INSERT INTO post_votes(post_id, user_id, vote) VALUES($post_id, $upvoter_id, 'upvote')";
			$result_set = $this->connection->query($sql);

			if($this->connection->errno) {
				return "Error while inserting into post_votes: ".$this->connection->error;
			}

			// increment post_points by 1
			$sql = "UPDATE posts SET post_points = post_points+1 WHERE post_id = $post_id"; 
			$result_set = $this->connection->query($sql);

			if($this->connection->errno) {
				return "Error while incrementing post_points from posts: ".$this->connection->error;
			}

			// get post_points of the post specified by $post_id
			$sql = "SELECT post_points FROM posts WHERE post_id = $post_id";
			$result_set = $this->connection->query($sql);

			if($this->connection->errno) {
				return "Error while selecting post_points from posts: ".$this->connection->error;
			}

			extract(mysqli_fetch_assoc($result_set));
			return "true:".$post_points;
		}

		/**
		 * Function to cancel upvote of an upvoted post specified by '$post_id' i.e. to delete the upvoter's id specified by '$post_upvote_canceller_id';
		 * And also DECREMENTS the post_points of the post specified by 'post_id' in the 'posts' table by 1.
		 * 
		 * @access public
		 * @param int $post_id unique id of post
		 * @param int $post_upvote_canceller_id unique id of the user/admin who cancelled the upvote of this post(specified by $post_id)
		 * @return string 'true:'.$post_points upon successful deletion(from 'post_votes') & updation(on 'posts'), else error-details specified by '$this->connection->error'
		 */
		public function cancelUpvoteOfPostById($post_id, $post_upvote_canceller_id) {
			$sql = "DELETE FROM post_votes WHERE post_id = $post_id AND user_id = $post_upvote_canceller_id";
			$result_set = $this->connection->query($sql);

			if($this->connection->error) {
				return "Error while deleting from post_votes: ".$this->connection->error; 
			}

			// decrement post_points by 1
			$sql = "UPDATE posts SET post_points = post_points-1 WHERE post_id = $post_id";
			$result_set = $this->connection->query($sql);

			if($this->connection->error) {
				return "Error while decrementing post_points from posts: ".$this->connection->error;
			}

			// get post_points of the post specified by $post_id
			$sql = "SELECT post_points FROM posts WHERE post_id = $post_id";
			$result_set = $this->connection->query($sql);

			if($this->connection->error) {
				return "Error while selecting post_points from posts: ".$this->connection->error;
			}

			extract(mysqli_fetch_assoc($result_set));
			return "true:".$post_points;
		}

		/**
		 * Function to get all the upvoted posts' id by the currently logged in user/admin.
		 * 
		 * @access public
		 * @return mysqli_result|string $result_set from 'post_votes' table on successful retrival, else error-details specified by '$this->connection->error'
		 */
		public function getUpvotedPostsByMe() {
			$user_id = $_SESSION['user_id'];
			$sql = "SELECT post_id FROM post_votes WHERE user_id = $user_id AND vote = 'upvote'";
			$result_set = $this->connection->query($sql);

			if($this->connection->error) {
				return "Error while getting upvoted posts from me: ".$this->connection->error; 
			}
			return $result_set;
		}
	}
?>
