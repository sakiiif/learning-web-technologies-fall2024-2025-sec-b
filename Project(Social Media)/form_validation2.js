
console.log("working");

$(document).ready(function () {
    // Form submission handler
    $("#signupForm").on("submit", function (event) {
      event.preventDefault(); // Prevent default form submission
  
      // Validate form fields
      const first_name = $("#first_name").val().trim();
      const last_name = $("#last_name").val().trim();
      const gender = $("#gender").val().trim();
      const email = $("#email").val().trim();
      const password = $("#password").val().trim();
      const confirm_password = $("#confirm_password").val().trim();
  
      if (!first_name || !last_name || !gender || !email || !password || !confirm_password ) {
        alert("All fields are required.");
        return;
      }
  
      if (!validateEmail(email)) {
        alert("Please enter a valid email address.");
        return;
      }
  
      // Send data via AJAX
      $.ajax({
        url: "signup.php", // PHP file to process the data
        type: "POST",
        data: JSON.stringify({
          first_name: first_name,
          last_name: last_name,
          gender: gender,
          email: email,
          password: password,
          confirm_password: confirm_password,
        }),
        contentType: "application/json",
        success: function (response) {
          $("#response").text(response.message); // Display success or error message
        },
        error: function () {
          $("#response").text("An error occurred while processing the request.");
        },
      });
    });
  
    // Email validation function
    function validateEmail(email) {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailRegex.test(email);
    }
  });
  

/*
function clearErrors(){

    errors = document.getElementsByClassName('formerror');
    for(let item of errors)
    {
        item.innerHTML = "";
    }


}
function seterror(id, error){
    //sets error inside tag of id 
    element = document.getElementById(id);
    element.getElementsByClassName('formerror')[0].innerHTML = error;

}

function validateForm(){
    var returnval = true;
    clearErrors();

    //perform validation and if validation fails, set the value of returnval to false
    var fname = document.forms['signupForm']["ffirst_name"].value;
    if (fname.length<5){
        seterror("first_name", "*Length of name is too short");
        returnval = false;
    }

    var lname = document.forms['signupForm']["flast_name"].value;
    if (lname.length<5){
        seterror("last_name", "*Length of name is too short");
        returnval = false;
    }

    var email = document.forms['signupForm']["femail"].value;
    if (email.length>15){
        seterror("email", "*Email length is too long");
        returnval = false;
    }
    /*
    var gender = document.forms['signupForm']["fgender"].value;
    if (gender.length != 10){
        seterror("gender", "*Phone number should be of 10 digits!");
        returnval = false;
    }

    var password = document.forms['signupForm']["fpassword"].value;
    if (password.length < 6){

        // Quiz: create a logic to allow only those passwords which contain atleast one letter, one number and one special character and one uppercase letter
        seterror("password", "*Password should be atleast 6 characters long!");
        returnval = false;
    }

    var cpassword = document.forms['signupForm']["fconfirm_password"].value;
    if (cpassword != password){
        seterror("confirm_password", "*Password and Confirm password should match!");
        returnval = false;
    }

    return returnval;
}

*/

