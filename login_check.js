function checkUser() {
	// fetches the username from the login and register page.
	var username = document.getElementById("username").value;
	var dataString = {username : username}// create a datastring to process the AJAX request and run the values.
	console.log(JSON.stringify(dataString))
	// create the AJAX request by utilizing jquery method
	$.ajax({
	type: "POST", 	
	url: "user_check.php", 
	dataType: "json",
	contentType: 'application/json',
	data: JSON.stringify(dataString), 
	success: function(data) {
		//recieves a jason response containing a value, that checks avaiability 
		if (data.availability === false){ 
		$("#message").html("Please choose another username, as the current one is unavailable");
		$("#submit").prop('disabled',true);
		} // send a message prompt to the user
        else if (data.availability === true){
			$("#message").html("The username is currently available");
			$("#username").css;
			$("#submit").prop('disabled',false);
			}
		},// a function that processes the message, controls when the error is displayed or not
	error:function (xhr, ajaxOptions, thrownError) {
			console.log(xhr.status);
			console.log(thrownError);
		  }
	});
}

$('document').ready(function() {
	$("#reg_form").validate({
	rules:
	{
		username: {required: true, minlength: 5},
		password: {required: true, minlength: 5, maxlength: 20},
		email: {required: true, email: true},
    },
	messages:// the validation gives condition to the user, in order to enter the menu page
	{
		user_name: "please enter your username",
		password:{
			minlength: "password should have 5 to 10 characters",
			required: "please enter a password",
			},
		email: "please enter a valid email address",
        password_2:{// confirms if both passwords are same
            required: "please retype your password",
            equalTo: "password doesn't match !"
            }
    },
	//submitHandler: submitForm
});

});


function checkempty(){
	var username = document.getElementById("username").value;
	var password = document.getElementById("password").value;
	var password_2 = document.getElementById("password_2").value;
	var email = document.getElementById("email").value;
	
	if (username === '' || password === '' || password_2 === '' || email === '') {
	  alert("Please Fill All Fields");
	  return false;
	}
	else {
	  return true;
	}
  }
