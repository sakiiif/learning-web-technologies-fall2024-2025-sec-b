function validate_date_of_birth(dob) {
 
  const day = dob.substring(0, 2); 
  const month = dob.substring(3, 5); 
  const year = dob.substring(6, 10); 

  if (dob.length !== 10 || dob.charAt(2) !== '-' || dob.charAt(5) !== '-') {
      alert("Please enter a valid date in DD-MM-YYYY format.");
      return false;
  }

  if (day.length !== 2 || isNaN(day) || parseInt(day) < 1 || parseInt(day) > 31) {
      alert("Day must be a 2-digit number between 01 and 31.");
      return false;
  }

  if (month.length !== 2 || isNaN(month) || parseInt(month) < 1 || parseInt(month) > 12) {
      alert("Month must be a 2-digit number between 01 and 12.");
      return false;
  }

  if (year.length !== 4 || isNaN(year)) {
      alert("Year must be a 4-digit number.");
      return false;
  }
  return true;
}
console.log("working");

document.getElementById("about_form").addEventListener("submit", validate_about_form);

function validate_about_form(event){
  
  event.preventDefault();

    var returnval = true;
    

    var dob = document.getElementById('dob').value.trim();
    var city = document.getElementById('city').value.trim();
    var bio = document.getElementById('bio').value.trim();
    var address = document.getElementById('address').value.trim();
    var relationship = document.getElementById('relationship').value.trim();
    var country = document.getElementById('country').value.trim();
    var edu = document.getElementById('edu').value.trim();

    

    if( !dob || !city || !bio || !address || !relationship || !country || !edu ) {
      alert('Please Fill up all the fields!');
      returnval = false;
    }
    if(!validate_date_of_birth(dob))
    {
      returnval = false;
    }

    if( returnval == false ) {
      return ;
    }

    const form = document.getElementById('about_form');

    const formData = new FormData(form);

    const data = {};
    formData.forEach( (value, key) => {
      data[key] = value;
      console.log(key);
      console.log(value);
    });

    const xhr = new XMLHttpRequest();

    xhr.open('POST', '../controller/about.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    console.log("here");
    console.log(data);
    xhr.send(JSON.stringify(data));
    const result = { status: 'success', message: 'Updated successfully' };
    xhr.onload = function(){
      if ( this.readyState==4 && xhr.status == 200) {
        const response = JSON.parse(xhr.responseText);
        const responseElement = document.getElementById('response');

        if (result.status === 'success') {
           document.getElementById('dob_info').innerHTML = `<strong>Date of Birth:</strong> ${data.dob}`;
            document.getElementById('city_info').innerHTML = `<strong>City:</strong> ${data.city}`;
            document.getElementById('bio_info').innerHTML = `<strong>Bio:</strong> ${data.bio}`;
            document.getElementById('address_info').innerHTML = `<strong>Address:</strong> ${data.address}`;
            document.getElementById('relationship_info').innerHTML = `<strong>Relationship Status:</strong> ${data.relationship}`;
            document.getElementById('country_info').innerHTML = `<strong>Country:</strong> ${data.country}`;
            document.getElementById('edu_info').innerHTML = `<strong>Education:</strong> ${data.edu}`;

          responseElement.textContent = result.message; 
          responseElement.style.color = 'green';
      }
        else {
          responseElement.style.color = 'red';
        }

        document.getElementById('response').innerText = response.message;
        
        
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