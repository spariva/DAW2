import express from 'node:express';
import fs from 'node:fs';

const app = express();
const port = 3000;

app.post('/consultarCiudades', (req, res) => {
    const dosLetras = req.body.dosLetras.toLowerCase();
    const ciudadesJSON = require('tu_archivo.json'); 
    const ciudadesCoincidentes = ciudadesJSON.filter(ciudad => {
      const nombreCiudad = ciudad.nombre.toLowerCase();
      return nombreCiudad.includes(dosLetras);
    });
    res.json(ciudadesCoincidentes);
  });