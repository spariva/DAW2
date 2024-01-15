// Desarrollo de un servidor HTTP para manejo de Solicitudes en Node.js. Crea un
// programa que maneje diferentes rutas y responda con mensajes personalizados según
// la ruta solicitada.
// • Configurar el servidor para responder a tres rutas diferentes: `/saludo`, `/
// despedida` y la ruta principal (`/`).
// • Cuando el servidor recibe una solicitud para la ruta `/saludo`, responde con el
// mensaje "¡Hola! Bienvenido a la página de saludos.".
// • Cuando la solicitud es para la ruta `/despedida`, responde con el mensaje
// "¡Hasta luego! Gracias por visitar la página de despedida.”.
// • Para cualquier otra ruta, responde con "¡Bienvenido! Esta es la página
// principal.”.
// • Crea un nuevo directorio para el ejercicio. Dentro del directorio, crea una
// carpeta llamada public que contendrá tus archivos estáticos (HTML, CSS,
// JS).

// Path: Cliente/Atemp2/node%203/server.js
const http = require('http');
const url = require('url');
const path = require('path');
const fs = require('fs');

const server = http.createServer((req, res) => {
    const path = url.parse(req.url, true).pathname; //true para sacar las propiedades, tipo el path, versión etc

    if (path === './saludo') {
        res.writeHead(200, {'Content-Type': 'text/html'});
        res.end('¡Hola! Bienvenide a saludos.');
    } else if (path === '/despedida') {
        res.writeHead(200, {'Content-Type': 'text/plain'});
        res.end('Gracias por visitar la despedida.');
    } else {
        res.writeHead(200, {'Content-Type': 'text/plain'});
        res.end('Esta es la página principal.');
    }
});

server.listen(3000, () => {
    console.log('Server listening on port 3000');
}
);

