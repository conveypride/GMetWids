// ====================================addfiveday forecast==============================
const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

function validatefivedaytableForm() {
    // Get all required input and select elements
    let requiredElements = document.querySelectorAll('.fiverequired');
  
    // Loop through each required element
    for (let i = 0; i < requiredElements.length; i++) {
      let element = requiredElements[i];
     
      // Check if the element is an input or select
      if (element.tagName === 'INPUT' || element.tagName === 'SELECT') {
        // Check if the element has a value or selected option
        if (element.value === 'null' || element.value === '') {
          // If the element is empty, add the "required-error" class to highlight it
          element.classList.add('required-error');
          // If the element is empty, show an error message and prevent form submission
          alert('Error: You have not filled all the fields, please do so to continue. Thank you!!');
          return false;
        } else{
            // If the element is not empty, remove the "required-error" class if it was previously added
        element.classList.remove('required-error');
        }
      


      }
    }
  
    // If all required inputs and selects have a value or selected option, allow form submission
    return true;
  }
  
  


buttonpublish5Day.addEventListener('click', () => {
    var all5DAYfieldsfilled = validatefivedaytableForm();
    // buttonpublish5Day
    const buttonpublish5Day = document.getElementById('buttonpublish5Day'); 
    buttonpublish5Day.innerHTML = '<div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>';
if(all5DAYfieldsfilled == true){
 // Define the class name of the elements you want to select
const className = "";

// Select all table rows with class name "eachrow"
var rows = document.querySelectorAll('.eachrow');

// Create an array to store the values
var valuesArray = [];

// Iterate over each row
rows.forEach(function(row) {
  // Find the input and select elements within the row
  var inputElements = row.querySelectorAll('input');
  var selectElement = row.querySelector('select');

  // Retrieve the values of the input and select elements
  var inputValues = Array.from(inputElements).map(function(input) {
    return input.value;
  });
  var selectValue = selectElement.value;

  // Create an object to store the values of each row
  var rowValues = {
    inputs: inputValues,
    select: selectValue
  };

  // Add the row values to the array
  valuesArray.push(rowValues);
});

// Output the array of values
console.log(valuesArray);


var jsonData = JSON.stringify(valuesArray);
const xhr = new XMLHttpRequest();
  xhr.open('post', 'addFiveDayForecastpost', true);
  xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken); // assuming CSRF token is stored in a variable called csrfToken
  xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.send(jsonData);

  // xhr.send(JSON.stringify(data));
  xhr.onload = () => {
    if (xhr.readyState === 4 && xhr.status === 200) {
        buttonpublish5Day.textContent = 'Successful';
      const response = xhr.response;
      window.location.href = "/admin/fiveDayForecast" 

    } else {
      console.error('Error:', xhr.status);
    }
  };

}
});