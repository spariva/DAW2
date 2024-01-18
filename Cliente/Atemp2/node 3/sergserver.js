const http = require('http');
const fs = require('fs');
const path = require('path');
const url = require('url');


const server = http.createServer((req, res) => {
    const path = url.parse(req.url, true).pathname; //true lo usamos para sacar las propiedades, por defecto esta a false

    if (path === '/saludo') {
        enviarArchivo(res, 'saludo.html');
    } else if (path === '/despedida') {
        enviarArchivo(res, 'despedida.html');
    } else if (path === '/') {
        res.writeHead(200, { 'Content-Type': 'text/html' });
        res.end('¡Bienvenido! Esta es la página principal.');
    } else {
        res.writeHead(404, { 'Content-Type': 'text/plain' });
        res.end('404 Not Found');
    }
});

const enviarArchivo = (res, archivo) => {
    const filePath = path.join(__dirname, archivo);
    fs.readFile(filePath, 'utf8', (err, data) => {
        if (err) {
            res.writeHead(404, { 'Content-Type': 'text/plain' });
            res.end('404 Not Found');
        } else {
            res.writeHead(200, { 'Content-Type': 'text/html' });
            res.end(data);
        }
    });
};

const puerto = 3000;
server.listen(puerto, () => {
    console.log(`Servidor en funcionamiento en http://localhost:${puerto}`);
});
