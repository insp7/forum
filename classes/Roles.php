<?php  
	/*****************************************************************************************************
	******************************************** ROLES CLASS *********************************************
	******************************************************************************************************/

	/* roles(role_id, role_name); */

	require_once("Database.php");

	/**
	 * Roles class for performing various operations(select, checkIfRolevalid, delete)
	 * on the data-table 'roles'
	 * 
	 * @package forum
	 * @subpackage classes 
	 * @access public
	 */
	class Roles {
		private $connection;

		/**
		 * Creates a new Roles object and sets the $connection variable for this object equal to the database connection object.
		 * 
		 * @global resource The universally available database connection (msqli)object named '$database'.
		 * @access public
		 */
		public function __construct() {
			global $database;
			$this->connection = $database->getConnection();
		}

		/**
		 * Function to get all the data from 'roles' table.
		 * 
		 * @access public
		 * @return mysqli_result|void $result_set of 'roles' table on successful retrival, else prints error-details specified by '$this->connection->error' and returns void
		 */
		public function getAllRoles() {
			$sql = "SELECT * FROM roles";
			$result_set = $this->connection->query($sql); 

			if($this->connection->errno) {
				echo "Error: ".$this->connection->error;
				return;
			}
			return $result_set;
		}

		/**
		 * Function to check if the passed role_name is valid;
		 * i.e. to check if the given role exists in the roles' table.
		 * 
		 * @access public
		 * @param string $role_name Specifies the role name
		 * @return bool 'true' if the given $role_name exists, else 'false'; if connection error occurs, prints error-details specified by '$this->connection->error'
		 */
		public function isRoleValid($role_name) {
			$sql = "SELECT * FROM roles WHERE role_name = $role_name";
			$result_set = $this->connection->query($sql);

			if($this->connection->errno) {
				echo "Error: ".$this->connection->error;
				return;
			}

			if($result_set->num_rows > 0) 
				return true; // Indicating that there exists a role specified by $role_name
			else
				return false; // Indicating that role does not exists 
		}

		/**
		 * Function to delete role specified by 'role_id' FROM THE DATABASE.
		 * 
		 * @access public
		 * @param int $role_id Specifies the unique role id
		 * @return string 'true' upon successful deletion, else returns error-details specified by '$this->connection->error'
		 */
		public function deleteRoleById($role_id) {
			$sql = "DELETE FROM roles WHERE role_id = $role_id";
			$result_set = $this->connection->query($sql);

			if($this->connection->error) {
				return "Error while deleting roles: ".$this->connection->error;
			}
			return "true";
		}
	}
?>