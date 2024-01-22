//Recoger los datos del formulario y mostrarlos 

const express = require('express');
const app = express();
const PORT = 3000;

app.use(express.urlencoded({ extended: true }));

app.post('/formulario.html', (req, res) => {
    const { nombre, email, passwd } = req.body;
    res.send(`Bienvenido ${nombre},\n<br>Email: ${email},\n<br>Contraseña: ${passwd}`);
});

app.listen(PORT, () => {
    console.log(`Servidor escuchando en http://localhost:${PORT}`);
});

//Para ejecutar hacemos node p4... y en el nvegador abrimos el formulario.html 
//lo rellenamos y como esta escuchando lo hace solo