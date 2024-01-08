// *Crea una página en la que se lea un archivo JSON existente, se añada un nuevo elemento y
// *finalmente, se escriba en un nuevo archivo JSON.
//Pasos:
// 1. Lee el archivo JSON existente (por ejemplo, datos.json, en el que haya varios usuarios con al
// menos 3 datos).
// 2. Convierte el contenido a un objeto JavaScript.
// 3. Modifica los datos agregando un nuevo usuario.
// 4. Convierte el objeto JavaScript modificado a una cadena JSON.
// 5. Escribe la cadena JSON en un nuevo archivo (datos_modificados.json).
// 6. Repite el proceso anterior, pero ahora escribe los nuevos usuarios sobre el mismo fichero inicial
// (datos.json).

// Compare this snippet from Cliente/Atemp2/node%206%20Json/index.mjs:
import fs from 'node:fs';
// Lee el archivo JSON existente
fs.readFile('datos.json', 'utf8', (err, data) => {
 if (err) {
 console.error('Error al leer el archivo:', err);
 return;
 }
 // Convierte el contenido del archivo JSON a un objeto JavaScript
 const datos = JSON.parse(data);
 // Modifica los datos agregando un nuevo usuario
 datos.usuarios.push({ id: 5, nombre: "NuevoUsuario5", edad: 28 }, { id: 6, nombre: "NuevoUsuario6", edad: 28 });
 // Convierte el objeto JavaScript modificado a una cadena JSON
 const datosJSON = JSON.stringify(datos, null, 2);
 // Escribe la cadena JSON en un nuevo archivo
 fs.writeFile('datos.json', datosJSON, 'utf8', (err) => {
 if (err) {
 console.error('Error al escribir en el archivo:', err);
 return;
 }
 console.log('Datos escritos exitosamente en datos.json');
 });
});