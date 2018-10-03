<?php 
	require_once("classes/Database.php");
	require_once("classes/Login.php");
	require_once("classes/Posts.php");
	
	if(session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	
	if(isset($_POST['manage'])){
		// code for managing different POST ajax requests
		if($_POST['manage'] === "login") {
			// code for managing the login requests 
			$email = $_POST['login-email'];
			$password = $_POST['login-password'];
			
			$login = new Login();
			$validation = $login->validateLogin($email, $password);

			if($validation)
				echo "true";
			else
				echo "false";
		} else if($_POST['manage'] === "posting_question") {
			// code to (Post) insert question into the database
			$post_content = $_POST['post_content'];
			$post_tags = $_POST['post_tags'];
			
			$posts = new Posts();
			$is_inserted = $posts->insertPost($post_content, $post_tags);
			
			if($is_inserted) 
				echo "true";
			else 
				echo "false";
		} else if($_POST['manage'] === "logout") {
			// Code to logout successfully
			session_unset();
			session_destroy();
			echo "forum/login.php";
		}
	}
?>