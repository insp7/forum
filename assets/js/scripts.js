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
		}else if(this.responseText === "false") {
			document.getElementById("authentication-error-div").classList.remove("hidden");
		}		
	};

	myRequest.open("POST", "manage-ajax.php", true); 
	myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	myRequest.send("login-email="+email+"&login-password="+password+"&manage=login");
}

function postQuestionClicked(event) {
    /*-------------------- CODE FOR IF POST_QUESTION BUTTON IS CLICKED --------------------*/
	event.preventDefault();
    var questionTags = document.getElementById("question_tags").value;
	var askedQuestion = document.getElementById("askedQuestion").value;
	
	if(askedQuestion === ""){
		document.getElementById("askedQuestion-error").classList.remove("hidden");
	}else {
		if(!document.getElementById("askedQuestion-error").classList.contains('hidden'))
			document.getElementById("askedQuestion-error").classList.add('hidden');
		postQuestion(askedQuestion, questionTags);
	}
}

function postQuestion(askedQuestion, questionTags){
    /*-------------------- CODE TO POST QUESTION USING POST AJAX WITHOUT JQUERY --------------------*/
	var myRequest = new XMLHttpRequest();

	myRequest.onload = function(){
		// RESPONSE
		if(this.responseText === "true") {
			document.getElementById("post-question-form").submit();
		}else if(this.responseText === "false") {
			document.getElementById("askedQuestion-error").innerHTML = "Something Wrong happened!";
		}		
	};

	//https://stackoverflow.com/questions/4007969/application-x-www-form-urlencoded-or-multipart-form-data
	myRequest.open("POST", "../manage-ajax.php", true); 
	myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	myRequest.send("post_content="+askedQuestion+"&post_tags="+questionTags+"&manage=posting_question");
}

function logoutButtonClicked(event) {
    /*-------------------- CODE FOR IF LOGOUT BUTTON IS CLICKED --------------------*/    
    event.preventDefault();
    var myRequest = new XMLHttpRequest();

    myRequest.onload = function() {
        // RESPONSE
        window.location["pathname"] = this.responseText;
    };

    var location = window.location["pathname"];
    var regex = new RegExp("\/forum\/[a-zA-Z0-9\-\_]*\.php"); // Add more to this later

    if(regex.test(location)) { 
        /* Logout button was clicked from some page which is located in the root directory 
        ex. root/somepage.php */ 
        myRequest.open("POST", "manage-ajax.php", true); // so redirect to "manage-ajax.php"
    } else { 
        /* Logout button was clicked from some page which is not located one level down the root directory 
        ex. root/somefolder/somepage.php */
        myRequest.open("POST", "../manage-ajax.php", true); // so redirect to "../manage-ajax.php"
    }
    //https://stackoverflow.com/questions/4007969/application-x-www-form-urlencoded-or-multipart-form-data
    myRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    myRequest.send("manage=logout");
}

/************************************************************************************************/
/************************************ USING JQUERY FROM HERE ************************************/
/************************************************************************************************/

$(document).ready(function() {
    /*-------------------- INITIALIZE THE FROALA EDITOR --------------------*/
    $('#askedQuestion').froalaEditor({
    	toolbarButtons: ['bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'color', 'insertLink', 
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

    
    $.validator.addMethod("eightCharsLong", function(value, element){
    	return this.optional(element) || value.length >= 8;
    }, "Your password must be atleast 8 characters long.");

    $.validator.addMethod("containsLetter", function(value, element){
    	return this.optional(element) || /[a-z]/i.test(value);
    }, "Your password must contain alteast 1 letter.");

    $.validator.addMethod("containsNumber", function(value, element){
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
    	}
    });
    /*-------------------------------- END OF REGISTER FORM VALIDATIONS --------------------------------*/

    $('[data-toggle="tooltip"]').tooltip();
});




