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
}

/************************************************************************************************/
/************************************ USING JQUERY FROM HERE ************************************/
/************************************************************************************************/

$(document).ready(function() {
    /*-------------------- INITIALIZE THE FROALA EDITOR --------------------*/
    $('#askedQuestion').froalaEditor({
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

    $('#post_comment').on("click", function(event) { // CODE FOR WHEN THE USER CLICKS POST COMMENT
        event.preventDefault();

        var comment_content = $('#comment_content').val(); // get the comment content
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
    }); // End of posting comment 
});



