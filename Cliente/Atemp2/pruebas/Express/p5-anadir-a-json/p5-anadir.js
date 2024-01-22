//Crear una aplicación web con Express y JSON, que añada nuevos datos a un fichero de datos.json, NO LOS SOBREESCRIBA.
const express = require('express');
const fs = require('fs').promises;
const app = express();
const PORT = 3000;
const rutaJson = 'fichero.json';

app.use(express.json());

app.use(express.urlencoded({ extended: true }));

app.post('/anadir.html', async (req, res) => {
    const { id, asignatura, info } = req.body;

    try{
        // Leer el contenido del archivo datos.json
        const data = await fs.readFile(rutaJson, 'utf-8');
        const datos = JSON.parse(data);
    
        // Añadir los nuevos datos al array existente
        datos.push({ id, asignatura, info });

        // Escribir los datos actualizados en el archivo datos.json
        await fs.writeFile(rutaJson, JSON.stringify(datos, null, 2));
    
        // Enviar una respuesta con los datos recibidos
        res.send(`Datos recibidos correctamente :)<br>ID: ${id},<br>Asignatura: ${asignatura},<br>Info: ${info}`);
    }catch(err){
        // Manejar errores y enviar una respuesta de error
        console.error(err);
        res.status(500).send('Hubo un error al procesar tu solicitud');
    }
});

app.listen(PORT, () => {
    console.log(`Servidor escuchando en http://localhost:${PORT}`);
});