const fs = require('fs');

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
//null: En este caso, no se está utilizando un replacer (reemplazador). 
//Pasar null significa que no se están realizando cambios en los valores durante la serialización.
//2: Esto indica que se deben utilizar 2 espacios en blanco para la indentación, haciendo que la cadena JSON resultante sea más fácil de leer.


// Escribe la cadena JSON en el archivo
fs.writeFile('nuevo_datos.json', nuevoDatosJSON, 'utf8', (err) => {
    if (err) {
        console.error('Error al escribir en el archivo:', err);
        return;
    }
    console.log('Datos escritos exitosamente en nuevo_datos.json');
});