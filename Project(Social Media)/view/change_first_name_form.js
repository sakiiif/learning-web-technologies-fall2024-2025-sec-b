
console.log("working");

document.getElementById("change_first_name_form").addEventListener("submit", validate_change_fname);

function validate_change_fname(event){
  
  event.preventDefault();

    var returnval = true;
    
    var fname =document.getElementById('first_name').value.trim();

    if(!fname) {
      alert('first name can not be empty!');
      returnval = false;
    }
    

    if( returnval == false ) {
      return ;
    }

    const form = document.getElementById('change_first_name_form');

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

      xhr.onload = function () {
        if (this.readyState == 4 && xhr.status == 200) {
            const response = JSON.parse(xhr.responseText); 
            const responseElement = document.getElementById('response3');
    
            
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
    
           
            document.getElementById('response3').innerText = `Error occurred! Status: ${this.status}, Status Text: ${this.statusText}`;
        }
    };
    
    
    
    
}