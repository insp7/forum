<?php  
	/*****************************************************************************************************
	******************************************** ROLES CLASS *********************************************
	******************************************************************************************************/

	/* roles(role_id, role_name); */

	require_once("Database.php");

	class Roles {
		private $connection;

		public function __construct() {
			global $database;
			$this->connection = $database->getConnection();
		}

		public function getAllRoles() {
			$sql = "SELECT * FROM roles";
			$result_set = $this->connection->query($sql); 

			if($this->connection->errno) {
				echo "Error: ".$this->connection->error;
				return;
			}
			return $result_set;
		}

		/*
			Function to check if the passed role_name is valid
			i.e. to check if the given role exists in the roles' table
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
	}
?>