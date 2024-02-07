const formTask: HTMLFormElement = document.querySelector('form') as HTMLFormElement;
const inputTask: HTMLInputElement = document.getElementById('inputTask') as HTMLInputElement;
const taskList: HTMLDivElement = document.getElementById('taskList') as HTMLDivElement;
const todo: HTMLDivElement = document.getElementById('to-do') as HTMLDivElement;
const doing: HTMLDivElement = document.getElementById('doing') as HTMLDivElement;
const done: HTMLDivElement = document.getElementById('done') as HTMLDivElement;


formTask.addEventListener('submit', (event) => {
  event.preventDefault();
    const column: HTMLSelectElement = document.getElementById('column') as HTMLSelectElement;
  addTask(inputTask.value, column.value);
  inputTask.value = '';
});

function addTask(task: string, col: string) {
  const taskItem: HTMLLIElement = document.createElement('li');
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

