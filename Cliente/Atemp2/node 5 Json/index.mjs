import fs from 'node:fs';
// Datos a escribir en el archivo JSON
const nuevoDatos = {
 usuarios: [
 { id: 1, nombre: "NuevoUsuario1", edad: 25 },
 { id: 2, nombre: "NuevoUsuario2", edad: 30 },
 { id: 3, nombre: "NuevoUsuario3", edad: 22 }
 ]
};
// Convierte el objeto JavaScript a una cadena JSON
const nuevoDatosJSON = JSON.stringify(nuevoDatos, null, 2);
// Escribe la cadena JSON en el archivo
fs.writeFile('nuevo_datos.json', nuevoDatosJSON, 'utf8', (err) => {
 if (err) {
 console.error('Error al escribir en el archivo:', err);
 return;
 }
 console.log('Datos escritos exitosamente en nuevo_datos.json');
});