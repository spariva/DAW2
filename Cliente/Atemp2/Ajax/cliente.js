const inputCiudad = document.getElementById('inputCiudad');

inputCiudad.addEventListener('keyup', function () {
    const xmlhr = new XMLHttpRequest();
    xmlhr.onreadystatechange = function () {
        if (xmlhr.readyState === 4 && xmlhr.status === 200) {
            const ciudades = JSON.parse(xmlhr.responseText);

            const resultado = document.getElementById('resultado');
            resultado.innerHTML = '';

            ciudades.forEach(ciudad => {
                const elementos = document.createElement('li');
                elementos.textContent = ciudad.nombre;
                resultado.appendChild(elementos);
            });
        }
    };
});

xmlhr.open('POST', '/consultarCiudades', true);
xmlhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
xmlhr.send(JSON.stringify({ dosLetras: dosLetras }));
