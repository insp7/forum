<?php  
	/*****************************************************************************************************/
	/******************************************* NOTIFICATIONS CLASS *************************************/
	/*****************************************************************************************************/

	/* notifications(notification_id, from_user_id, to_user_id, notification_content, notified); */

	require_once("Database.php");

	/**
	 * Notifications class for performing various operations
	 * on the data-table 'notifications'
	 * 
	 * @package forum
	 * @subpackage classes
	 * @author insp7
	 * @access public
	 */
	class Notifications {
		private $connection;

		/**
		 * Creates a new Notifications object and sets the $connection variable for this object equal to the database connection object.
		 * 
		 * @global resource The universally available database connection (msqli)object named '$database'.
		 * @access public
		 */
		public function __construct() {
			global $database;
			$this->connection = $database->getConnection();
		}

		/**
		 * Function to get all data from 'notifications' table.
		 * 
		 * @access public
		 * @return mysqli_result '$result_set' from 'notifications' table upon successful execution, else prints error-details
		 */
		public function getAllNotifications() {
			$sql = "SELECT * FROM notifications";
			$result_set = $this->connection->query($sql); 

			if($this->connection->errno) {
				echo "Error: ".$this->connection->error;
				return;
			}
			return $result_set;
		}

		// Function to delete notification specified by 'notification_id' FROM THE DATABASE
		/**
		 * Function to delete notification specified by 'notification_id' FROM THE DATABASE.
		 * 
		 * @access public
		 * @param int $notification_id Specifies the unique notification id
		 * @return string 'true' upon successful deletion, else error-details specified by '$this->connection->error'
		 */
		public function deleteNotificationById($notification_id) {
			$sql = "DELETE FROM notifications WHERE notification_id = $notification_id";
			$result_set = $this->connection->query($sql);

			if($this->connection->error) {
				return "Error while deleting notifications: ".$this->connection->error;
			}
			return "true";
		}

		// Pending to Add more methods for the notification functionality
	}
?>