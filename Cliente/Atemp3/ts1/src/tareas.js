var formTask = document.querySelector('form');
var inputTask = document.getElementById('inputTask');
var taskList = document.getElementById('taskList');
var todo = document.getElementById('to-do');
var doing = document.getElementById('doing');
var done = document.getElementById('done');
formTask.addEventListener('submit', function (event) {
    event.preventDefault();
    var column = document.getElementById('column');
    addTask(inputTask.value, column.value);
    inputTask.value = '';
});
function addTask(task, col) {
    var taskItem = document.createElement('li');
    taskItem.textContent = task;
    taskItem.classList.add('task');
    switch (col) {
        case "to-do":
            taskItem.classList.add('todo');
            todo.appendChild(taskItem);
            break;
        case "doing":
            taskItem.classList.add('doing');
            doing.appendChild(taskItem);
            break;
        case "done":
            taskItem.classList.add('done');
            done.appendChild(taskItem);
            break;
    }
}
