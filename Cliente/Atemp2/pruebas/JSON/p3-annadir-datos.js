const fs = require('fs');
//import fs from 'node:fs'; A MAKI LE GUSTA (dice q es mejor...)

// Lee el archivo JSON existente
fs.readFile('datos.json', 'utf8', (err, data) => {
  if (err) {
    console.error('Error al leer el archivo:', err);
    return;
  }

  // Convierte el contenido del archivo JSON a un objeto JavaScript
  const datos = JSON.parse(data);

  // Añade nuevos datos al objeto
  const nuevosDatos = {
    usuarios: [
      { id: 4, nombre: 'Laura Martínez', edad: 22 },
      { id: 5, nombre: 'Pedro López', edad: 35 }
    ]
  };
  
  // The ... operator before nuevosDatos.usuarios is the spread syntax in JavaScript. It allows an iterable (like an array or string) to be expanded in places where zero or more arguments or elements are expected. Here, it's being used to expand the nuevosDatos.usuarios array into individual elements.

  // So, datos.usuarios.push(...nuevosDatos.usuarios); is adding all the elements from the nuevosDatos.usuarios array to the end of the datos.usuarios array.
  
  // To improve this code, consider checking if nuevosDatos.usuarios is indeed an array before trying to spread its elements. This can prevent unexpected errors if nuevosDatos.usuarios is not an array.
  
  datos.usuarios.push(...nuevosDatos.usuarios);
  //...-> los nuevos usuarios se añadan individualmente al array existente en lugar de añadir todo el array nuevosDatos.usuarios como un solo elemento.

  const datosJSONActualizado = JSON.stringify(datos, null, 2);

  // Escribe el archivo JSON actualizado
  fs.writeFile('datos.json', datosJSONActualizado, 'utf8', (err) => {
    if (err) {
      console.error('Error al escribir el archivo:', err);
      return;
    }

    console.log('Datos añadidos correctamente.');
  });
});

// 