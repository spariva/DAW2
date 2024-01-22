const express = require('express');
const app = express();

// Middleware para la verificación de autenticación
const verificarAutenticacion = (req, res, next) => {
    const token = req.headers.authorization;

    if (token && token === 'miTokenSecreto') {
        // Si el token es válido, continúa con la siguiente función middleware
        next();
    } else {
        // Si el token no es válido, responde con un código de estado 401 (No autorizado)
        res.status(401).send('No autorizado');
    }
};

// Middleware para realizar otras tareas intermedias (pueden ser adicionales)
const otroMiddleware = (req, res, next) => {
    // Realizar otras tareas intermedias si es necesario
    console.log('Otro middleware ejecutado');
    next();
};

// Ruta protegida con verificación de autenticación
app.get('/recursoProtegido', verificarAutenticacion, otroMiddleware, (req, res) => {
    // Si se llega aquí, significa que la verificación de autenticación fue exitosa
    res.send('Acceso permitido al recurso protegido');
});

// Iniciar el servidor en el puerto 3000
app.listen(3000, () => {
    console.log('Servidor iniciado en el puerto 3000');
});


//NO ENTIENDO NADA DE QUE ES ESTO YO PASO