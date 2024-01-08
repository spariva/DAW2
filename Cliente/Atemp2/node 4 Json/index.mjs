import fs from 'node:fs'

// Lee el archivo JSON
fs.readFile('datos.json', 'utf8', (err, data) => {
    if (err) {
    console.error('Error al leer el archivo:', err);
    return;
    }
    // Convierte el contenido del archivo JSON a un objeto JavaScript
    const datos = JSON.parse(data);

    // Accede a los valores del objeto JSON 
    console.log('Usuarios:');
    datos.usuarios.forEach(usuario => {
    // Muestra información de cada usuario en la consola
        console.log(`ID: ${usuario.id}, Nombre: ${usuario.nombre}, Edad: ${usuario.edad}`);
    });
});
