<?php
    /*
        All Database Tables: 

        users(user_id, first_name, last_name, user_name, user_password, user_email, user_dob, user_branch, user_posts, user_role, user_profile_img, user_created_at, is_deleted, deletd_by, deleted_at);
        roles(role_id, role_name); 
        posts(post_id, post_content, post_image, post_user_id, post_tags, created_at, deleted_at, is_deleted, deleted_by, updated_at, updated_by, post_points);
        post_votes(post_votes_id, post_id, user_id, vote);
        notifications(notification_id, from_user_id, to_user_id, notification_content, notified);
        comments(comment_id, comment_post_id, comment_author, comment_author_id, comment_content, created_at, updated_at, is_deleted, deleted_by);
    */
    
    /**
     * Database class for establishing connection with the database; 
     * Also will he used for getting this database connection object.
     * 
     * @package forum
     * @subpackage classes
     * @access public
     */
    class Database {
        private $servername;
        private $username;
        private $password;
        private $database;
        private $connection;
        
        /**
         * Creates a new Database object and sets the necessary details(servername, username, password, database) 
         * for establishing connection with the database.
         * 
         * @access public
         */
        public function __construct() {
            $this->servername = "localhost";
            $this->username = "aniket";
            $this->password = "aniket";
            $this->database = "forumdb";
            $this->connectDB();
        }

        /**
         * Function for establishing connection with the database;
         * The connection is stored in the '$connection' variable.
         * 
         * @access public
         */
        public function connectDB() {
            $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->database);

            if(mysqli_connect_error()){ // if connection not successful
                die("Connection Failed : ".mysqli_error());
            }

            // FOR TESTING 
            if(!$this->connection)
                echo "Database not connected";
            // else
            //     echo "Connected successfully";
        }

        /**
         * Function to get the established connection.
         * 
         * @access public
         * @return mysqli 'mysqli' connection object is returned if connection is established successfully
         */
        public function getConnection() {
            return $this->connection;
        }
    }

    $database = new Database();
?>