
console.log("working");

document.getElementById("change_last_name_form").addEventListener("submit", validate_change_lname);

function validate_change_lname(event){

  event.preventDefault();

    var returnval = true;
    
    var fname =document.getElementById('last_name').value.trim();

    if(!fname) {
      alert('last name can not be empty!');
      returnval = false;
    }
    

    if( returnval == false ) {
      return ;
    }

    const form = document.getElementById('change_last_name_form');

    const formData = new FormData(form);

    const data = {};
    formData.forEach( (value, key) => {
      data[key] = value;
      console.log(key);
      console.log(value);
    });

    const xhr = new XMLHttpRequest();

    xhr.open('POST', '../controller/settings.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.send(JSON.stringify(data));

      // Handle the response
      xhr.onload = function () {
        if (this.readyState == 4 && xhr.status == 200) {
            const response = JSON.parse(xhr.responseText); 
            const responseElement = document.getElementById('response4');
    
            
            if (response.status === 'success') {
                responseElement.style.color = 'green';
            } else {
                responseElement.style.color = 'red';
            }
    
            responseElement.innerText = response.message;
        } else {
            
            console.error('Request Error:', {
                status: this.status,
                statusText: this.statusText,
                responseText: this.responseText
            });
    
           
            document.getElementById('response4').innerText = `Error occurred! Status: ${this.status}, Status Text: ${this.statusText}`;
        }
    };
    
}