<?php  
	/*****************************************************************************************************
	******************************************** NOTIFICATIONS CLASS *************************************
	******************************************************************************************************/

	/* notifications(notification_id, from_user_id, to_user_id, notification_content, notified); */

	require_once("Database.php");

	class Notifications {
		private $connection;

		public function __construct() {
			global $database;
			$this->connection = $database->getConnection();
		}

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