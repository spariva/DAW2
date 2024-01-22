const express = require('express');
const app = express();

// Ruta principal con un parámetro de nombre
app.get('/', (req, res) => {
    res.send('Hola Mundo!');
});

// Iniciar el servidor
app.listen(3000, () => {
    console.log('Servidor iniciado en el puerto 3000');
});

// Para cerrar la conexión haremos crtl+C