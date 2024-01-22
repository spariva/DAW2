const express = require('express');
const app = express();

// Middleware para procesar la información de authorization
app.use((req, res, next) => {
    const info = req.headers.authorization; // La info que viene en el header
    req.customInfo = info; // Agrega la información a la solicitud para que esté disponible en las rutas
    next(); // Llama a la siguiente función en la pila de middleware
});

// Ruta principal con dos parámetros: nombre y autor
app.get('/:nombre/:autor', (req, res) => {
    // Accede al parámetro de nombre en la URL
    const nombre = req.params.nombre || 'nombre de la obra';
    
    // Accede al parámetro de autor en la URL
    const autor = req.params.autor || 'autor';
    
    var texto = (`La obra se llama: ${nombre}<br><br>`);

    if (autor != null) {
        texto += (`El autor es: ${autor}`);
    }

    res.send(texto);
});

// Iniciar el servidor
app.listen(3000, () => {
    console.log('Servidor iniciado en el puerto 3000');
});


// Para cerrar la conexión haremos crtl+C