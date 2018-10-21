// Using Vanilla Javascript here
function loginButtonClicked(event) {
    /*-------------------- CODE FOR IF LOGIN BUTTON IS CLICKED --------------------*/
	event.preventDefault();// Prevent the default action

    // BASE CASE 
	if(!document.getElementById("email-error-div").classList.contains('hidden'))
		document.getElementById("email-error-div").classList.add('hidden');

	if(!document.getElementById("password-error-div").classList.contains('hidden'))
		document.getElementById("password-error-div").classList.add('hidden');

	if(!document.getElementById("authentication-error-div").classList.contains('hidden'))
		document.getElementById("authentication-error-div").classList.add('hidden');

	var email = document.getElementById("login-email").value;
	var password = document.getElementById("login-password").value;

	if(email === "") {
		document.getElementById("email-error-div").classList.remove("hidden");
	}

	if(password === "") {
		document.getElementById("password-error-div").classList.remove("hidden");
	}

	if(email != "" && password != "") {
		authenticateInfo(email, password);
	}
}

function authenticateInfo(email, password) {
    /*-------------------- CODE TO AUTHENTICATE USER INFO USING POST AJAX WITHOUT JQUERY --------------------*/
	var myRequest = new XMLHttpRequest();
	
	myRequest.onload = function() {
		//RESPONSE
		if(this.responseText === "true") {
			document.getElementById("login-form").submit();
		} else if(this.responseText === "false") {
			document.getElementById("authentication-error-div").classList.remove("hidden");
		}		
	};

	myRequest.open("POST", "http://localhost/forum/manage-ajax.php", true); 
	myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	myRequest.send("login-email="+email+"&login-password="+password+"&manage=login");
}

// function normalizeData(askedQuestion) {
//     console.log(askedQuestion.includes("<br>"));
//     return askedQuestion.replace(/\<br\>/g, "</div><div>");
// }


function postQuestionClicked(event) {
    /*-------------------- CODE FOR IF POST_QUESTION BUTTON IS CLICKED --------------------*/
	event.preventDefault();
    
    var questionTags = document.getElementById("question_tags").value;
	var askedQuestion = document.getElementById("askedQuestion").value;

	if(askedQuestion === "") {
		document.getElementById("askedQuestion-error").classList.remove("hidden");
	} else {
		if(!document.getElementById("askedQuestion-error").classList.contains('hidden'))
			document.getElementById("askedQuestion-error").classList.add('hidden');
		postQuestion(askedQuestion, questionTags);
	}
}

function postQuestion(askedQuestion, questionTags) {
    /*-------------------- CODE TO POST QUESTION USING POST AJAX WITHOUT JQUERY --------------------*/
	var myRequest = new XMLHttpRequest();

	myRequest.onload = function(){
		// RESPONSE
		if(this.responseText === "true") {
            // SET TO BLANK
            document.getElementById("question_tags").value = "";
            $('#askedQuestion').froalaEditor('html.set' , '');
            
            /* ------- SET TOASTR OPTIONS ------- */
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": false,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": true,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "4000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.success("We'll keep you notified", "Question posted!"); // Show toastr
		} else if(this.responseText === "false") {
			document.getElementById("askedQuestion-error").innerHTML = "Something Wrong happened!";
		}		
	};

	//https://stackoverflow.com/questions/4007969/application-x-www-form-urlencoded-or-multipart-form-data
	myRequest.open("POST", "http://localhost/forum/manage-ajax.php", true); 
	myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	myRequest.send("post_content="+askedQuestion+"&post_tags="+questionTags+"&manage=posting_question");
}

function logoutButtonClicked(event) {
    /*-------------------- CODE FOR IF LOGOUT BUTTON IS CLICKED --------------------*/    
    event.preventDefault();
    var myRequest = new XMLHttpRequest();

    myRequest.onload = function() {
        // RESPONSE
        // window.location["pathname"] = this.responseText; 
        window.location = this.responseText; // Setting the absolute path(A better way than before)
    };

    /* Redirection to manage-ajax file : This was too complex(yet static) and unnecessary logic for implementing simple logout */
    /* Also it was made static i.e. it was only working for when logout was clicked from : 
        1) files inside root directory, 
        2) files one level down the root directory */
    // var location = window.location["pathname"];
    // var regex = new RegExp("\/forum\/[a-zA-Z0-9\-\_]*\.php"); // Add more to this later

    // if(regex.test(location)) { 
    //     /* Logout button was clicked from some page which is located in the root directory 
    //     ex. root/somepage.php */ 
    //     myRequest.open("POST", "manage-ajax.php", true); // so redirect to "manage-ajax.php"
    // } else { 
    //     /* Logout button was clicked from some page which is located one level down the root directory 
    //     ex. root/somefolder/somepage.php */
    //     myRequest.open("POST", "../manage-ajax.php", true); // so redirect to "../manage-ajax.php"
    // }

    // A more simpler and full-proof(dynamically working from all directories) approach is to set absolute path.
    myRequest.open("POST", "http://localhost/forum/manage-ajax.php", true);
    myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    myRequest.send("manage=logout");
}

function register() {
    /*-------------------- CODE FOR IF REGISTER BUTTON IS CLICKED --------------------*/
    
    // Take the user data
    var firstname = document.getElementById("firstname").value;
    var lastname = document.getElementById("lastname").value;
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var user_branch = document.getElementById("user_branch").value;
    var user_dob = document.getElementById("user_dob").value;

    /*-------------------- CODE TO REGISTER(create) NEW USER USING POST AJAX WITHOUT JQUERY --------------------*/
    var myRequest = new XMLHttpRequest(); //XMLHttpRequest

    myRequest.onload = function() { // RESPONSE
        // Set blank
        document.getElementById("firstname").value = "";
        document.getElementById("lastname").value = "";
        document.getElementById("username").value = "";
        document.getElementById("email").value = "";
        document.getElementById("password").value = "";
        document.getElementById("confirm_password").value = "";
        document.getElementById("user_branch").value = "";
        document.getElementById("user_dob").value = "";

        /* ------- SET TOASTR OPTIONS ------- */
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": false,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "4000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        toastr.success("Get Started, ain't no need to wait!", "User Created"); // Show toastr
    };

    myRequest.open("POST", "http://localhost/forum/manage-ajax.php", true); 
    myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    myRequest.send("firstname="+firstname+"&lastname="+lastname+"&username="+username+"&email="+email+"&password="+password+"&user_branch="+user_branch+"&user_dob="+user_dob+"&manage=creating_user");
} // END OF REGISTER FUNCTION

/*---------------------- CODE FOR WHEN USER/ADMIN UPVOTES A POST OR CANCELS AN UPVOTE OF AN UPVOTED POST ----------------------*/
function upvotePostClicked(event, post_id, upvoteBtn) {
    event.preventDefault();
    var myRequest, parts = {};

    if(upvoteBtn.classList.contains('post-not-upvoted-mine')) { 
        // UPVOTE THE POST
        upvoteBtn.classList.remove("post-not-upvoted-mine");
        upvoteBtn.classList.add("post-upvoted-mine"); 

        // Code to insert who upvoted which post into database using ajax
        myRequest = new XMLHttpRequest();

        myRequest.onload = function() { // RESPONSE
            parts = this.responseText.split(":");
            if(parts[0] === "true") {
                upvoteBtn.innerHTML = " "+parts[1]; // parts[1] indicates the post_points of this post
            } else {
                alert(this.responseText);
                console.log(this.responseText);
            }
        }

        myRequest.open("POST", "http://localhost/forum/manage-ajax.php", true); 
        myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        myRequest.send("post_id="+post_id+"&manage=upvote_post");
    } else { 
        // CANCEL THE UPVOTE OF THAT POST
        upvoteBtn.classList.remove("post-upvoted-mine");
        upvoteBtn.classList.add("post-not-upvoted-mine"); 

        // Code to delete upvoter's id from database using ajax i.e. to cancel the upvote of the post specified by post_id
        myRequest = new XMLHttpRequest();

        myRequest.onload = function() { // RESPONSE
            parts = this.responseText.split(":");
            if(parts[0] === "true") {
                upvoteBtn.innerHTML = " "+parts[1]; // parts[1] indicates the post_points of this post
            } else {
                alert(this.responseText);
                console.log(this.responseText);
            }
        }

        myRequest.open("POST", "http://localhost/forum/manage-ajax.php", true); 
        myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        myRequest.send("post_id="+post_id+"&manage=cancel_post_upvote");
    }
}


/***************************************************************************************************************/
/***************************************** CODE FOR ALL DELETE BUTTONS *****************************************/
/***************************************************************************************************************/

/*---------------------------- CODE FOR WHEN ADMIN CLICKS DELETE_COMMENT BUTTON ----------------------------*/
function deleteCommentClicked(event, comment_id, row) {
    event.preventDefault();

    swal({
        title: 'Are you sure?',
        text: "This comment shall be moved to 'deleted-comments' section",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirm'
    }).then((result) => {
        if(result.value) { // If true, perform delete operation
            var myRequest = new XMLHttpRequest();

            function deleteThisRow(row) {
                var index = row.parentNode.parentNode.rowIndex;
                document.getElementById("comments-table").deleteRow(index);
            }

            myRequest.onload = function() {
                // RESPONSE
                if(this.responseText === "true") {
                    deleteThisRow(row);

                    // Show sweetalert
                    swal({
                        type: 'success', 
                        text: 'Comment Deleted!', 
                        title: 'Gone with the wind',
                        showConfirmButton: false,
                        timer: 1600
                    });
                } else {
                    alert(this.responseText);
                    console.log(this.responseText);
                }
            };
            
            myRequest.open("POST", "http://localhost/forum/manage-ajax.php", true);
            myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            myRequest.send("comment_id="+comment_id+"&manage=delete_comment");
        }
    });
    
    
}

/*------------------------- CODE FOR WHEN ADMIN CLICKS DELETE_NOTIFICATION BUTTON -------------------------*/
function deleteNotificationClicked(event, notification_id, row) {
    event.preventDefault();
    
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirm'
    }).then((result) => {
        if(result.value) { // If true, perform delete operation
            var myRequest = new XMLHttpRequest();

            function deleteThisRow(row) {
                var index = row.parentNode.parentNode.rowIndex;
                document.getElementById("notifications-table").deleteRow(index);
            }

            myRequest.onload = function() {
                // RESPONSE
                if(this.responseText === "true") {
                    deleteThisRow(row);

                    // Show sweetalert
                    swal({
                        type: 'success', 
                        title: 'Notification Deleted!', 
                        text: 'Ain\'t that ironic?',
                        showConfirmButton: false,
                        timer: 1600
                    });
                } else {
                    alert(this.responseText);
                    console.log(this.responseText);
                }
            };
            
            myRequest.open("POST", "http://localhost/forum/manage-ajax.php", true);
            myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            myRequest.send("notification_id="+notification_id+"&manage=delete_notification");
        }
    });
}

/*------------------------- CODE FOR WHEN ADMIN CLICKS DELETE_NOTIFICATION BUTTON -------------------------*/
function deletePostClicked(event, post_id, row) {
    event.preventDefault();

    swal({
        title: 'Are you sure?',
        text: "This post shall be moved to 'deleted-posts' section",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirm'
    }).then((result) => {
        if(result.value) { // If true, perform delete operation
            var myRequest = new XMLHttpRequest();

            function deleteThisRow(row) {
                var index = row.parentNode.parentNode.rowIndex;
                document.getElementById("posts-table").deleteRow(index);
            }

            myRequest.onload = function() {
                // RESPONSE
                if(this.responseText === "true") {
                    deleteThisRow(row);

                    // Show sweetalert
                    swal({
                        type: 'success', 
                        text: 'Post Deleted!', 
                        title: 'Gone with the wind',
                        showConfirmButton: false,
                        timer: 1600
                    });
                } else {
                    alert(this.responseText);
                    console.log(this.responseText);
                }
            };
            
            myRequest.open("POST", "http://localhost/forum/manage-ajax.php", true);
            myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            myRequest.send("post_id="+post_id+"&manage=delete_post");
        }
    });
}

/*------------------------- CODE FOR WHEN ADMIN CLICKS DELETE_ROLE BUTTON -------------------------*/
function deleteRoleClicked(event, role_id, row) {
    event.preventDefault();
    
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirm'
    }).then((result) => {
        if(result.value) { // If true, perform delete operation
            var myRequest = new XMLHttpRequest();

            function deleteThisRow(row) {
                var index = row.parentNode.parentNode.rowIndex;
                document.getElementById("roles-table").deleteRow(index);
            }

            myRequest.onload = function() {
                // RESPONSE
                if(this.responseText === "true") {
                    deleteThisRow(row);           

                    // Show sweetalert
                    swal({
                        type: 'success', 
                        text: 'Role Deleted!', 
                        title: 'Gone with the wind',
                        showConfirmButton: false,
                        timer: 1600
                    }); 
                } else {
                    alert(this.responseText);
                    console.log(this.responseText);
                }
            };
            
            myRequest.open("POST", "http://localhost/forum/manage-ajax.php", true);
            myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            myRequest.send("role_id="+role_id+"&manage=delete_role");
        }
    });    
}

/*------------------------- CODE FOR WHEN ADMIN CLICKS DELETE_USER BUTTON -------------------------*/
function deleteUserClicked(event, user_id, row) {
    event.preventDefault();
    
    swal({
        title: 'Are you sure?',
        text: "This user shall be moved to 'deleted-users' section",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirm'
    }).then((result) => {
        if(result.value) { // If true, perform delete operation
            var myRequest = new XMLHttpRequest();

            function deleteThisRow(row) {
                var index = row.parentNode.parentNode.rowIndex;
                document.getElementById("users-table").deleteRow(index);
            }

            myRequest.onload = function() {
                // RESPONSE
                if(this.responseText === "true") {
                    deleteThisRow(row);

                    // Show sweetalert
                    swal({
                        type: 'success', 
                        text: 'User Deleted!', 
                        title: 'Gone with the wind',
                        showConfirmButton: false,
                        timer: 1600
                    });
                } else {
                    alert(this.responseText);
                    console.log(this.responseText);
                }
            };
            
            myRequest.open("POST", "http://localhost/forum/manage-ajax.php", true);
            myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            myRequest.send("user_id="+user_id+"&manage=delete_user");
        }
    });
}
/*------------------------------------- END OF CODE FOR ALL DELETE BUTTONS --------------------------------------*/


/*****************************************************************************************************************/ 
/******************************************* CODE FOR ALL EDIT BUTTONS *******************************************/
/*****************************************************************************************************************/

/*------------------------- CODE FOR WHEN ADMIN CLICKS EDIT_POST BUTTON -------------------------*/
// NOTE: Operations like displaying, updation, hiding(of TABLES) and insertion of data into database 
// are SOLELY IMPLEMENTED USING AJAX
function editPostClicked(event, post_id, table_id, row) {
    event.preventDefault(); 

    // Hide the entire HTML Table
    document.getElementById(table_id).classList.add("hidden");

    // Now show the hidden 'edit-post' page
    document.getElementById("edit-post-page").classList.remove("hidden");

    // Setting the previous post_tags and post_content using ajax
    var myRequest = new XMLHttpRequest();
    
    myRequest.onload = function() { // RESPONSE
        var parts = this.responseText.split("`&`"); // spliting by `&`
        var postDetails = {}; // Store in the postDetails associative array

        postDetails['post_tags'] = parts[0];
        postDetails['post_content'] = parts[1];

        // SET VALUES 
        document.getElementById("edit_question_tags").value = postDetails['post_tags'];
        $('#question-to-edit').froalaEditor('html.set', postDetails['post_content']);

        // When the update-post button is clicked, update the data using ajax 
        $('#update-question').on("click", function(event) {
            event.preventDefault();

            // BASE CASE 
            if(!document.getElementById("question-to-edit-error").classList.contains("hidden"))
                document.getElementById("question-to-edit-error").classList.add("hidden");

            // Check if the admin/user has submitted blank 
            if($('#question-to-edit').froalaEditor('html.get') === "") {
                document.getElementById("question-to-edit-error").classList.remove("hidden");
            } else {
                // GET THE UPDATED VALUES
                postDetails['post_tags'] = document.getElementById("edit_question_tags").value;
                postDetails['post_content'] = $('#question-to-edit').froalaEditor('html.get');

                myRequest.onload = function() { // RESPONSE
                    var response = this.responseText.split("`&`");
                    var updationDetails = {};

                    // Store the updation details such as 'updated_by' & 'updated_at' inside this array associatively.
                    updationDetails['updated_by'] = response[1];
                    updationDetails['updated_at'] = response[2];

                    // Now Hide the 'edit-post' page again
                    document.getElementById("edit-post-page").classList.add("hidden");

                    // function to update HTML table contents dynamically without refreshing the page
                    function updateTableContents() {
                        var table = document.getElementById(table_id); // Get the HTML table
                        var rows = table.rows.length; // Gets the number of rows of that table
                        var index = row.parentNode.parentNode.rowIndex; // Gets the index of the row of which the edit button was clicked

                        // Loops through rows
                        for(var i = 0; i < rows; i++) {
                            if(i == index) {
                                var cells = table.rows.item(i).cells; // Gets cells of current row 
                                var cellLength = cells.length; // Gets amount of cells of current row

                                //loops through each cell in current row
                                for(var j = 0; j < cellLength; j++) { 
                                    // we want 2nd, 4th, 6th & 7th columns of the table to be updated
                                    switch(j) {
                                        case 2: cells.item(j).innerHTML = postDetails['post_content'];
                                                break;

                                        case 4: cells.item(j).innerHTML = postDetails['post_tags'];
                                                break;

                                        case 6: cells.item(j).innerHTML = updationDetails['updated_at'];
                                                break;

                                        case 7: cells.item(j).innerHTML = updationDetails['updated_by'];
                                                break;
                                    }
                                }
                                break; // once the matching row index is found, break 
                            }
                        }
                    } updateTableContents();

                    // Show the entire HTML Table again
                    document.getElementById(table_id).classList.remove("hidden");

                    // Show sweetalert
                    swal({
                        type: 'success', 
                        title: 'With Lightning fast speed!', 
                        text: 'Contents are Updated!',
                        showConfirmButton: false,
                        timer: 1600
                    });
                };

                myRequest.open("POST", "http://localhost/forum/manage-ajax.php", true); 
                myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                myRequest.send("post_id="+post_id+"&post_tags="+postDetails['post_tags']+"&post_content="+postDetails['post_content']+"&manage=update_post_clicked");
            }
        });
    };

    myRequest.open("POST", "http://localhost/forum/manage-ajax.php", true); 
    myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    myRequest.send("post_id="+post_id+"&manage=edit_post_clicked");
} // END OF editPostClicked() FUNCTION
/*------------------------------------- END OF CODE FOR ALL EDIT BUTTONS --------------------------------------*/

/************************************************************************************************/
/************************************ USING JQUERY FROM HERE ************************************/
/************************************************************************************************/

$(document).ready(function() {
    /*-------------------- INITIALIZE THE FROALA EDITOR --------------------*/
    // For asking Question
    $('#askedQuestion').froalaEditor({
    	toolbarButtons: ['bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'insertLink', 
    					'insertImage', 'insertVideo', 'selectAll', 'clearFormatting', 'print', 'undo', 'redo'],
        enter: $.FroalaEditor.ENTER_DIV,
        tabSpaces: 4
    });

    // For editing the question
    $('#question-to-edit').froalaEditor({
        toolbarButtons: ['bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'insertLink', 
                        'insertImage', 'insertVideo', 'selectAll', 'clearFormatting', 'print', 'undo', 'redo'],
        enter: $.FroalaEditor.ENTER_DIV,
        tabSpaces: 4
    });

    /*-------------------------------------------------------------------------------------------------*/
    /*---------------------- REGISTER FORM VALIDATIONS USING jQuery.validate.js -----------------------*/
    /*-------------------------------------------------------------------------------------------------*/
    $.validator.setDefaults({
    	errorClass: "help-block small",
    	highlight: function(element) { // if some input is invalid(for any element), please highlight the display message using this function
    		$(element).closest(".form-group").addClass("has-error"); // 'has-error' - a bootstrap class indicating invalid input by making the border of the input red.
    	},
    	unhighlight: function(element) {
    		$(element).closest(".form-group").removeClass("has-error");
    	},
    });

    
    $.validator.addMethod("eightCharsLong", function(value, element) {
    	return this.optional(element) || value.length >= 8;
    }, "Your password must be atleast 8 characters long.");

    $.validator.addMethod("containsLetter", function(value, element) {
    	return this.optional(element) || /[a-z]/i.test(value);
    }, "Your password must contain alteast 1 letter.");

    $.validator.addMethod("containsNumber", function(value, element) {
    	return this.optional(element) || /\d/.test(value);
    }, "Your password must contain alteast 1 number.");

    $("#register_form").validate({
    	rules: {
    		firstname: {
    			required: true,
    			nowhitespace: true,
    			lettersonly: true
    		},
    		lastname: {
    			required: true,
    			nowhitespace: true,
    			lettersonly: true
    		},
    		username: {
    			required: true		
    		},
    		email: {
    			required: true,
    			email: true
    		},
    		password: {
    			required: true,
    			eightCharsLong: true,
    			containsLetter: true,
    			containsNumber: true
    		},
    		confirm_password: {
    			required: true,
    			equalTo: "#password"
    		},
            user_branch: {
                required: true,
                lettersonly: true
            },
            user_dob: {
                required: true
            }
    	},
    	messages: {
    		firstname: {
    			required: "Please enter your first name.",
    			nowhitespace: "Please do not enter whitespaces between letters.",
    			lettersonly: "Please enter letters only."
    		},
    		lastname: {
    			required: "Please enter your last name.",
    			nowhitespace: "Please do not enter whitespaces between letters.",
    			lettersonly: "Please enter letters only."
    		},
    		username: {
    			required: "Please enter a username.",
    		},
    		email: {
    			required: "Please enter an email address.",
    			email: "Please enter a <em>valid</em> email address."
    		},
    		password: {
    			required: "Please enter a password."
    		},
    		confirm_password: {
    			required: "Please re-type your password."
    		},
            user_branch: {
                required: "Please enter your branch.",
                lettersonly: "Please enter lettes only."
            },
            user_dob: {
                required: "Please enter a <em>valid<em> date."
            }
    	},
        submitHandler: function(form) {
            register();
        }
    });
    /*-------------------------------- END OF REGISTER FORM VALIDATIONS --------------------------------*/

    // CODE FOR WHEN THE USER CLICKS POST COMMENT
    $('#post_comment').on("click", function(event) { 
        event.preventDefault();

        // Set the 'empty-comment-error' div to hidden, if its already not hidden
        if(!document.getElementById("empty-comment-error").classList.contains("hidden"))
            document.getElementById("empty-comment-error").classList.add("hidden");

        var comment_content = $('#comment_content').val(); // get the comment content

        if(comment_content !== "") { // If the entered comment is not blank(null)
            document.getElementById("comment_content").value = ""; // Set to "" onclick

            // To access the url variables (without using php)
            var parts = window.location.search.substr(1).split("&");
            var $_GET = {}; // Store in the $_GET array
            for (var i = 0; i < parts.length; i++) {
                var temp = parts[i].split("=");
                $_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
            }

            function postComment(post_id, comment_content) {
                /*------------------------ MAIN CODE TO POST COMMENT USING AJAX(XMLHttpRequest) ------------------------*/
                var myRequest = new XMLHttpRequest();

                function addComment(user_name, comment_created_at) {
                    var div = document.createElement('div');
                    div.innerHTML = '<div class="well well-sm"><div style="font-size: 16px; font-family: \'Cantora One\';">'+user_name+'</div><div style="font-size: 12px;">answered on '+comment_created_at+'</div><h4></h4><p>'+comment_content+'</p></div>';
                    document.getElementById('comment_posted_using_ajax').append(div);
                }

                myRequest.onload = function() {
                    // RESPONSE
                    var response = this.responseText.split("~");
                    if(response[0] === "true") {
                        addComment(response[1], response[2]);    
                    } else {
                        alert(this.responseText); // FOR TESTING PURPOSES
                    }
                };

                myRequest.open("POST", "http://localhost/forum/manage-ajax.php", true); 
                myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                myRequest.send("post_id="+post_id+"&comment_content="+comment_content+"&manage=posting_comment"); 
            }

            postComment($_GET['post_id'], comment_content);
        } else { // if the entered comment is blank
            if(document.getElementById("empty-comment-error").classList.contains("hidden")) 
                document.getElementById("empty-comment-error").classList.remove("hidden");
        }
    }); // End of posting comment

    /* Tooltip */
    $('[data-toggle="tooltip"]').tooltip(); 
});