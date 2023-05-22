document.addEventListener("DOMContentLoaded", function () {
  const addButton = document.getElementById("add-button");
  const districtInput = document.getElementById("district");
  const zoneInput = document.getElementById("zone");
  const table = document.getElementById("table");
  const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
  addButton.addEventListener("click", function () {
    addButton.innerHTML = '<div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>';

    if (districtInput.value.trim() !== "") {

      const xhr = new XMLHttpRequest();
      xhr.open('post', 'cafoDistrictspost', true);
      xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken); // assuming CSRF token is stored in a variable called csrfToken
      
      const formData = new FormData();
      formData.append('districtname', districtInput.value.trim());
      formData.append('districtZone', zoneInput.value.trim());
      
      xhr.send(formData);
      xhr.onload = () => {
        if (xhr.status === 200) {
          addButton.textContent = 'Add';
          const response = xhr.response;
          // console.log(response); // log the server response to the console
      const row = document.createElement("tr");
      const districtCell = document.createElement("td");
      districtCell.textContent = districtInput.value;
      const zoneCell = document.createElement("td");
      zoneCell.textContent = zoneInput.value;
      const removeButtonCell = document.createElement("td");
      const removeButton = document.createElement("button");
      removeButton.type = "button";
      removeButton.id = "remove-button";
      removeButton.className = "btn btn-danger text-white";
      removeButton.textContent = "Remove";
      removeButtonCell.appendChild(removeButton);
      row.appendChild(districtCell);
      row.appendChild(zoneCell);
      row.appendChild(removeButtonCell);
      table.append(row);
      districtInput.value = "";
      zoneInput.value = "Coastal Zone";
          // reset the form after successful submission
          // form.reset();
        } else {
          console.error('Error:', xhr.status);
        }
      };
       
      } else {
      alert("You can't add an empty district!");
    }
  });

  document.addEventListener("click", function (event) {
    if (event.target && event.target.id === "remove-button") {
      
const id = event.target.getAttribute('districtid');
event.target.innerHTML = '<div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>';


const xhr = new XMLHttpRequest();
xhr.open('post', 'cafoDistrictsdelete', true);
xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken); // assuming CSRF token is stored in a variable called csrfToken

const formData = new FormData();
formData.append('districtid', id); 

xhr.send(formData);
xhr.onload = () => {
  if (xhr.status === 200) {
    event.target.textContent = 'Remove';
    const response = xhr.response;
    event.target.parentElement.parentElement.remove();
  } else {
    console.error('Error:', xhr.status);
  }
};

 }
  });







});

// const form = document.querySelector('#myForm');

// form.addEventListener('submit', (event) => {
//   event.preventDefault();
  
//   const nameInput = document.querySelector('#name');
//   const emailInput = document.querySelector('#email');
  
//   const xhr = new XMLHttpRequest();
//   xhr.open('POST', '/submit-form');
//   xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken); // assuming CSRF token is stored in a variable called csrfToken
  
//   const formData = new FormData();
//   formData.append('name', nameInput.value);
//   formData.append('email', emailInput.value);
  
//   xhr.send(formData);
// });
