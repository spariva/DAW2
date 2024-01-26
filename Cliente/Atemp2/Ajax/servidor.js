const express = require('express');
const fs = require('fs');


const app = express();
const port = 3000;

app.use(express.urlencoded({ extended: true }));

app.get('/', (req, res) => {
  const dosLetras = req.body.toLowerCase();
  const ciudadesJSON = require('tu_archivo.json');

  const ciudadesCoincidentes = ciudadesJSON.filter(ciudad => {
    const nombreCiudad = ciudad.nombre.toLowerCase();
    return nombreCiudad.includes(dosLetras);
  });
  res.json(ciudadesCoincidentes);
});

app.post('/consultarCiudades', (req, res) => {
    const dosLetras = req.body.dosLetras.toLowerCase();
    const ciudadesJSON = require('tu_archivo.json'); 
    const ciudadesCoincidentes = ciudadesJSON.filter(ciudad => {
      const nombreCiudad = ciudad.nombre.toLowerCase();
      return nombreCiudad.includes(dosLetras);
    });
    res.json(ciudadesCoincidentes);
  });

app.listen(port, () => {
  console.log(`Servidor escuchando en http://localhost:${port}`);
});