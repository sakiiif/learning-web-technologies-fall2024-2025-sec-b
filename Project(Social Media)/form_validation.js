
console.log("working");

// Attach an event listener to the form to prevent the default submission
document.getElementById("signupForm").addEventListener("submit", validateForm);

function validateForm(event){
  
  // Prevent the form from submitting and refreshing the page
  event.preventDefault();

    var returnval = true;

    //perform validation and if validation fails, set the value of returnval to false
    var fname = document.getElementById('first_name').value.trim();
    var lname = document.getElementById('last_name').value.trim();
    var email = document.getElementById('email').value.trim();
    var gender = document.getElementById('gender').value.trim();
    var password = document.getElementById('password').value.trim();
    var cpassword = document.getElementById('confirm_password').value.trim();

    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    if( !fname || !lname || !email || !gender || !password || !cpassword ) {
      alert('Please Fill up all the fields!');
      returnval = false;
    }
    else if (!emailPattern.test(email)) {
      alert('Please enter a valid email address!');
      returnval = false;
    }
    else if (fname.length < 4 ) {
      alert('First name must be at least 4 characters long.');
      returnval = false;
    }
    else if (lname.length < 2 ) {
      alert('Last name must be at least 2 characters long.');
      returnval = false;
    }
    else if(password != cpassword) {
      alert('Password and confirm password did not not match!');
      returnval = false;
    }
    else if (password.length < 8 ) {
      alert('Password must be at least 8 characters long.');
      returnval = false;
    }
    else if (!passwordPattern.test(password)) {
      alert('Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.');
      returnval = false;
    }

    if( returnval == false ) {
      return ;
    }

    const form = document.getElementById('signupForm');

    // Create a FormData object from the form
    const formData = new FormData(form);

      // Convert the FormData to JSON
    const data = {};
    formData.forEach( (value, key) => {
      data[key] = value;
      console.log(key);
      console.log(value);
    });

      // Create a new XMLHttpRequest object
    const xhr = new XMLHttpRequest();

      // Set up the request
    xhr.open('POST', 'signup.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.send(JSON.stringify(data));

      // Handle the response
    xhr.onload = function(){
      if ( this.readyState==4 && xhr.status == 200) {
        const response = JSON.parse(xhr.responseText);
        const responseElement = document.getElementById('response');

        if(response.status === 'success') {
          responseElement.style.color = 'green';
        }
        else {
          responseElement.style.color = 'red';
        }

        document.getElementById('response').innerText = response.message;
        
        if(response.status === 'success') {
          setTimeout(() => {
            window.location.href = 'login.php';
          }, 2000);
        }
      } 
      else {
          console.error('Request Error:', {
            status: this.status,
            statusText: this.statusText,
            responseText: this.responseText
        });
        document.getElementById('response').innerText = `Error occurred! Status: ${this.status}, Status Text: ${this.statusText}`;

        }
      };
}
