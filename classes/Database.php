<?php
    /*
    Tables: 
    users(user_id, user_name, user_password, user_email, user_dob, user_branch, user_posts, user_role, user_profile_img)
    
    roles(role_id, role_name) // Dropped

    posts(post_id, post_content, post_image, post_user_id, created_at, deleted_at, deleted, updated_at, post_points)

    post_votes(post_votes_id, post_id, user_id, vote) // Dropped

    notifications(notification_id, from_user_id, to_user_id, notification_content, notified) // Dropped
     */
    
    class Database {
        private $servername;
        private $username;
        private $password;
        private $database;
        private $connection;
        
        public function __construct(){
            $this->servername = "localhost";
            $this->username = "aniket";
            $this->password = "aniket";
            $this->database = "forumdb";
            $this->connectDB();
        }

        public function connectDB(){
            $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->database);

            if(mysqli_connect_error()){ //if connection not successful
                die("Connection Failed : ".mysqli_error());
            }

            // FOR TESTING 
            if(!$this->connection)
                echo "Database not connected";
            // else
            //     echo "Connected successfully";
        }

        public function getConnection(){
            return $this->connection;
        }
    }

    $database = new Database();
?>