document.addEventListener("DOMContentLoaded", function () {
  const addButton = document.getElementById("add-button");
  const taskInput = document.getElementById("task");
  const priorityInput = document.getElementById("priority");
  const table = document.getElementById("table");

  addButton.addEventListener("click", function () {
    if (taskInput.value.trim() !== "") {
      const row = document.createElement("tr");
      const taskCell = document.createElement("td");
      taskCell.textContent = taskInput.value;
      const priorityCell = document.createElement("td");
      priorityCell.textContent = priorityInput.value;
      const removeButtonCell = document.createElement("td");
      const removeButton = document.createElement("button");
      removeButton.type = "button";
      removeButton.id = "remove-button";
      removeButton.className = "btn btn-danger text-white";
      removeButton.textContent = "Remove";
      removeButtonCell.appendChild(removeButton);
      row.appendChild(taskCell);
      row.appendChild(priorityCell);
      row.appendChild(removeButtonCell);
      table.append(row);
      taskInput.value = "";
      priorityInput.value = "Coastal Zone";
    } else {
      alert("You can't add an empty district!");
    }
  });

  document.addEventListener("click", function (event) {
    if (event.target && event.target.id === "remove-button") {
      event.target.parentElement.parentElement.remove();
    }
  });
});
