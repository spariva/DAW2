const express = require('express');
const bodyParser = require('body-parser');
const app = express();
const port = 3000;

app.use(bodyParser.json());

let tasks = [];
app.use(express.static(__dirname));
app.get('/', (req, res) => {
    res.sendFile(__dirname + '/h.html'); 
});
app.post('/api/tasks', (req, res) => {
    const newTask = {
        id: Date.now(),
        name: req.body.name,
        state:0
    };

    tasks.push(newTask);

    res.json(tasks);
});
app.get('/api/tasks', (req, res) => {

    res.json(tasks);
});
app.put('/api/tasks/:id', (req, res) => {
    const taskId = parseInt(req.params.id, 10);
    const taskToUpdate = tasks.find(task => task.id === taskId);
    taskToUpdate.name = req.body.name;
    res.json(tasks);
});
app.put('/api/tasks/:id/move/:direction', (req, res) => {
    const taskId = parseInt(req.params.id, 10);
    const direction = parseInt(req.params.direction, 10);

    const taskIndex = tasks.findIndex(task => task.id === taskId);


    if (taskIndex === -1) {
        return res.status(404).json({ error: 'Tarea no encontrada' });
    }

    const task = tasks[taskIndex];

    if (direction === 1 && task.state === 2) {
        //return res.status(400).json({ error: 'No se puede mover más a la derecha' });
    }

   else if (direction === -1 && task.state === 0) {
       // return res.status(400).json({ error: 'No se puede mover más a la izquierda' });
    }
else {
        task.state += direction;
    }


    res.json(tasks);
});

app.delete('/api/tasks/:id', (req, res) => {
    const taskId = parseInt(req.params.id, 10);
    tasks = tasks.filter(task => task.id !== taskId);
    res.json(tasks);
});
app.delete('/api/tasks/', (req, res) => {
    tasks=[]
    res.json(tasks);
});

app.listen(port, () => {
    console.log(`Servidor escuchando en http://localhost:${port}`);
});