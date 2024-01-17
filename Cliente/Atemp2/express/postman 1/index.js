// Crear un servidor con Express con el mensaje Hola Mundo

// 1. Será necesario importar el módulo express y crear una instancia del mismo
import express from 'express';
// import { createRequire } from 'node:module';

// 2. Crear una instancia de express
// ```
// The createRequire function from the node:module module is used to create a require function.
// This is necessary because the script is using ECMAScript modules 
// (indicated by the .mjs file extension and the import statements), 
// but the body-parser module is a CommonJS module, which needs to be imported using require.
// ```
// const require = createRequire(import.meta.url);
const app = express();
const port = 3000;
// const bodyParser = require('body-parser');

// // 3. Crear una ruta para el método GET
// app.use(bodyParser.urlencoded({ extended: false }));
// app.use(bodyParser.json());

app.get('/', (req, res) => {
    res.send('Hello World!');
});

// // 4. Crear una ruta para el método POST
// app.post('/post', (req, res) => {
//     console.log(req.body);
//     res.send('POST request to the homepage');
// }
// );

// 5. Iniciar el servidor en el puerto 3000 y mostrar un mensaje en la consola
app.listen(port, () => {
    console.log(`Example app listening at http://localhost:${port}`);
}
);


