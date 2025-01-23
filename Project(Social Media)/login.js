
console.log("working");

// Attach an event listener to the form to prevent the default submission
document.getElementById("loginForm").addEventListener("submit", validateForm);

function validateForm(event){
  
  // Prevent the form from submitting and refreshing the page
  event.preventDefault();

    var returnval = true;

    //perform validation and if validation fails, set the value of returnval to false
    var email = document.getElementById('email').value.trim();
    var password = document.getElementById('password').value.trim();

    if( !email || !password  ) {
      alert('Please Fill up all the fields!');
      returnval = false;
    }

    if( returnval == false ) {
      return ;
    }
    console.log('par hoise');

    const form = document.getElementById('loginForm');

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
    xhr.open('POST', 'login.php', true);
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
            window.location.href = 'profile.php';
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
