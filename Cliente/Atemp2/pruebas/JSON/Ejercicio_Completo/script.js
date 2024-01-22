/*Crea una página en la que se lea un archivo JSON existente, se añada un nuevo elemento y
finalmente, se escriba en un nuevo archivo JSON.
1. Lee el archivo JSON existente (por ejemplo, datos.json, en el que haya varios usuarios con al
menos 3 datos).
2. Convierte el contenido a un objeto JavaScript.
3. Modifica los datos agregando un nuevo usuario.
4. Convierte el objeto JavaScript modificado a una cadena JSON.
5. Escribe la cadena JSON en un nuevo archivo (datos_modificados.json).
* 6. Repite el proceso anterior, pero ahora escribe los nuevos usuarios sobre el mismo fichero inicial
(datos.json).*/
const fs = require('fs');

function leerFichero() {
    fs.readFile('pokedex.json', 'utf8', (err, data) => {
        if (err) {
            console.error('Error al leer el archivo:', err);
            return;
        }

        var datos = JSON.parse(data);
        var lector = 'Listado: \n';

        datos.pokemons.forEach(pokemon => {
            lector += (`Id: ${pokemon.id}, Nombre: ${pokemon.nombre}, Tipo: ${pokemon.tipo}`);
            lector += '\n';
        });

        document.getElementById('mostrarTexto1').innerHTML = lector;
    });
}

function agregarPokemon() {
    var nombre = document.getElementById('nombre').value;
    var tipo = document.getElementById('tipo').value;
    var id = document.getElementById('id').value;

    // Lee el archivo JSON existente
    fs.readFile('pokedex.json', 'utf8', (err, data) => {
        if (err) {
            console.error('Error al leer el archivo:', err);
            return;
        }

        // Convierte el contenido del archivo JSON a un objeto JavaScript
        var datos = JSON.parse(data);

        // Asegúrate de que `pokemons` existe en el objeto `datos`
        if (!datos.pokemons) {
            datos.pokemons = [];
        }

        var nuevoPokemon = {
            id: id,
            nombre: nombre,
            tipo: tipo
        };

        datos.pokemons.push(nuevoPokemon);

        const datosJSONActualizado = JSON.stringify(datos, null, 2);

        // Escribe el archivo JSON actualizado
        fs.writeFile('pokedex.json', datosJSONActualizado, 'utf8', (err) => {
            if (err) {
                console.error('Error al escribir el archivo:', err);
                return;
            }

            console.log('Datos añadidos correctamente.');

            // Llamar a leerFichero después de agregar el Pokémon
            leerFichero();
        });
    });
}
