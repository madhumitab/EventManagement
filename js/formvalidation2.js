/*
Created 09/27/09										
Questions/Comments: jorenrapini@gmail.com						
COPYRIGHT NOTICE		
Copyright 2009 Joren Rapini
*/
//http://jorenrapini.com/blog/javascript/the-simple-quick-and-small-jquery-html-form-validation-solution

	
$(document).ready(function(){
	// Place ID's of all required fields here.
	required = ["name", "id","email", "Description", "category", "date1", "llimit", "ulimit", "date2","login","password","password2","group"];
	// If using an ID other than #email or #error then replace it here
	email = $("#email");
       password=$("#password");
       password2=$("#password2");
	errornotice = $("#error");
	// The text to show up within a field when it is incorrect
	emptyerror = "Please fill out this field.";
	emailerror = "Please enter a valid e-mail.";
	passworderror ="Password should be atleast 6 charecters";
	passwordmismatch="Two Passwords should be same.;
	$("#form1").submit(function(){	
		//Validate required fields
		for (i=0;i<required.length;i++) {
			var input = $('#'+required[i]);
			if ((input.val() == "") || (input.val() == emptyerror)) {
                           // alert("No vlaue");
				input.addClass("needsfilled");
				input.val(emptyerror);
				errornotice.fadeIn(750);
			} else {
				input.removeClass("needsfilled");
			}
		}
		// Validate the e-mail.
	if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(email.val())) {
			email.addClass("needsfilled");
			email.val(emailerror);
		}

	if(password.length <6)
	{
			password.addClass("needsfilled");
			password.val(passworderror);
	}
	if(password.val()!=password2.val())
	{
			password2.addClass("needsfilled");
			password2.val(passwordmismatch);
	
	}
		//if any inputs on the page have the class 'needsfilled' the form will not submit
		if ($(":input").hasClass("needsfilled")) {
			return false;
		} else {
			errornotice.hide();
			return true;
		}
	});

$(":input").focus(function(){		
	   if ($(this).hasClass("needsfilled") ) {
			$(this).val("");
			$(this).removeClass("needsfilled");
	   }
	});
});