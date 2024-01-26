

document.addEventListener('DOMContentLoaded', function () {
    loadTask();
    
});

function loadTask() {
    fetch('http://localhost:3000/api/tasks', {
        method: 'GET',
        headers: { 'Content-Type': 'application/json' },
    })
        .then(response => response.json())
        .then(data => {

            updateTable(data);
        })
        .catch(error => console.error("Error al añadir tarea", error));
}
function addTask() {
    var name = document.getElementById("addTask").value;
    fetch('http://localhost:3000/api/tasks', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ name }),
    })
        .then(response => response.json())
        .then(data => {

            updateTable(data);
        })
        .catch(error => console.error("Error al añadir tarea", error));
}

function editTask(id, editedName, editButton) {



       fetch(`http://localhost:3000/api/tasks/${id}`, {
        method: 'PUT',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ name: editedName }),
    })
        .then(response => response.json())
        .then(data => {

            updateTable(data);
        })
        .catch(error => console.error("Error al editar tarea", error));
}
    


function deleteTask(id) {
    fetch(`http://localhost:3000/api/tasks/${id}`, {
        method: 'DELETE',
        headers: { 'Content-Type': 'application/json' },
    })
        .then(response => response.json())
        .then(data => {
            updateTable(data);
        })
        .catch(error => console.error("Error al eliminar tarea", error));
}
function deleteAllTasks(){
    fetch(`http://localhost:3000/api/tasks/`, {
        method: 'DELETE',
        headers: { 'Content-Type': 'application/json' },
    })
        .then(response => response.json())
        .then(data => {
            updateTable(data);
        })
        .catch(error => console.error("Error al eliminar tarea", error));  
}
function moveTask(taskId, direction) {
    // Realizar la solicitud al servidor para mover la tarea
    fetch(`http://localhost:3000/api/tasks/${taskId}/move/${direction}`, {
        method: 'PUT',
        headers: { 'Content-Type': 'application/json' },
    })
        .then(response => response.json())
        .then(data => {
            // Actualizar la tabla con los datos actualizados
            updateTable(data);
        })
        .catch(error => console.error("Error al mover tarea", error));
}

function updateTable(tasks) {
    var table = document.getElementById("taskTable");

    while (table.rows.length > 1) {
        table.deleteRow(1);
    }


    tasks.forEach(task => {
        var row = table.insertRow();
        for (var i = 0; i < task.state; i++) {
            row.insertCell(-1);  // Insertar celdas al final de la fila
        }

        var cell = row.insertCell(-1);
        var nameElement = document.createElement("span");
        nameElement.innerText = task.name;

        var idElement = document.createElement("span");
        idElement.innerText = task.id;

        // Agregar elementos al DOM
        cell.appendChild(nameElement);
        cell.appendChild(document.createTextNode(" "));
        cell.appendChild(idElement);

        var editButton = document.createElement("button");
        editButton.innerHTML = "Editar";
        editButton.addEventListener("click", function () {

            modifyName(task.id, nameElement, editButton);
        });

        var deleteButton = document.createElement("button");
        deleteButton.innerHTML = "Eliminar";
        deleteButton.addEventListener("click", function () {
            deleteTask(task.id);
        });
        var rightArrow = document.createElement("button");
        rightArrow.innerHTML = "Derecha";
        rightArrow.addEventListener("click", function () {
            moveTask(task.id,1);
        });
        var leftArrow = document.createElement("button");
        leftArrow.innerHTML = "Izquierda";
        leftArrow.addEventListener("click", function () {
            moveTask(task.id,-1);
        });
        cell.appendChild(editButton);
        cell.appendChild(deleteButton);
        cell.appendChild(rightArrow);
        cell.appendChild(leftArrow)
    });
}

function modifyName(id, nameElement, editButton) {


    //editButton.innerHTML = "Cancelar";


    //nameElement.removeEventListener("click", editTask);


    nameElement.setAttribute("contenteditable", "true");
    nameElement.focus();


    nameElement.addEventListener("blur", function () {

        var editedName = nameElement.innerText;
        // nameElement.addEventListener("click", function () {
        //    editTask(id, nameElement, editButton);
        //});
        // editButton.innerHTML = "Editar";
        //if (currentName !== editedName) {
       editTask(id,editedName,editButton)
        //}
    });
}
function downloadPDF() {
    const table = document.getElementById("taskTable");

    html2pdf()
        .set({
            margin: 1,
            filename: 'document.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 3, letterRendering: true },
            jsPDF: { unit: 'in', format: 'a3', orientation: 'portrait' }
        })
        .from(table)
        .save()
        .catch(err => console.log(err));
}