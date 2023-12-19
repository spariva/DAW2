const http = require('http');
const url = require('url');
const path = require('path');

const server = http.createServer((req, res) => {
    const path = url.parse(req.url, true).pathname; //true para sacar las propiedades, tipo el path, versión etc

    if (path === '/saludo') {
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
});