<?php 
	require_once("classes/Database.php");
	require_once("classes/Login.php");
	require_once("classes/Posts.php");
	require_once("classes/Users.php");
	require_once("classes/Comments.php");
	require_once("classes/Notifications.php");
	require_once("classes/Roles.php");
	
	if(session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	
	if(isset($_POST['manage'])) {
		/*------------------------- Code for managing different POST ajax requests -------------------------*/
		if($_POST['manage'] === "login") {
			/* Code for managing the login requests */
			$email = $_POST['login-email'];
			$password = $_POST['login-password'];
			
			$login = new Login();
			$validation = $login->validateLogin($email, $password);

			if($validation)
				echo "true";
			else
				echo "false";
		} else if($_POST['manage'] === "posting_question") {
			/* Code to (Post) insert question into the database */
			$post_content = $_POST['post_content'];
			$post_tags = $_POST['post_tags'];
			
			$posts = new Posts();
			$is_inserted = $posts->insertPost($post_content, $post_tags);
			
			echo $is_inserted;
		} else if($_POST['manage'] === "logout") {
			/* Code to logout successfully */
			session_unset();
			session_destroy();
			// echo "forum/login.php"; // This was a pretty bad approach
			echo "http://localhost/forum/login.php"; // Setting absolute path (Better way than before)
		} else if($_POST['manage'] === "creating_user") {
			/* Code to create new user */
			$first_name = $_POST['firstname'];
	        $last_name = $_POST['lastname'];
	        $user_name = $_POST['username'];
	        $email = $_POST['email'];
	        $password = $_POST['password'];
	        $user_branch = $_POST['user_branch'];
	        $user_dob = $_POST['user_dob'];
	        
	        $users = new Users();
	        $users->addUser($first_name, $last_name, $user_name, $email, $password, $user_dob, $user_branch);
		} else if($_POST['manage'] === "posting_comment") {
			/* Code to post a comment on a question */
			$post_id = $_POST['post_id'];
			$comment_content = $_POST['comment_content'];

			$comments = new Comments();
			$is_inserted = $comments->insertComment($post_id, $comment_content);
			
			if($is_inserted) {
				$latest_comment_creation_time = $comments->getLatestCommentCreationTime();
				extract(mysqli_fetch_assoc($latest_comment_creation_time));
				echo "true~".$_SESSION['user_name']."~".$created_at;
			}
			else
				echo $is_inserted;
		} else if($_POST['manage'] === "delete_comment") {
			// Code to delete a comment specified by comment_id
			$comment_id = $_POST['comment_id'];

			$comments = new Comments();
			$is_deleted = $comments->deleteCommentById($comment_id);

			echo $is_deleted;
		} else if($_POST['manage'] === "delete_notification") {
			// Code to delete a notification specified by the notification_id
			$notification_id = $_POST['notification_id'];

			$notifications = new Notifications();
			$is_deleted = $notifications->deleteNotificationById($notification_id);

			echo $is_deleted;
		} else if($_POST['manage'] === "delete_post") {
			// Code to delete a post specified by the post_id
			$post_id = $_POST['post_id'];

			$posts = new Posts();
			$is_deleted = $posts->deletePostById($post_id);

			echo $is_deleted;
		} else if($_POST['manage'] === "delete_role") {
			// Code to delete a role specified by the role_id
			$role_id = $_POST['role_id'];

			$roles = new Roles();
			$is_deleted = $roles->deleteRoleById($role_id);

			echo $is_deleted;
		} else if($_POST['manage'] === "delete_user") {
			// Code to delete a user specified by the user_id
			$user_id = $_POST['user_id'];

			$users = new Users();
			$is_deleted = $users->deleteUserById($user_id);

			echo $is_deleted;
		}
	} 
?>