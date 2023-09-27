var mas = "";
const DAW = document.getElementById('').textContent; 
const DWES = document.getElementById('').textContent;
const DIW = document.getElementById('').textContent;
const textoOriginal = document.getElementById('').textContent;


function addSuma(){
    document.getElementById("asignatura").value = "+";
}

// Función para agregar el símbolo "+" al texto 
function agregarSimbolo() {
    // Obtener el texto actual textContent es como innehtml
    let textoActual = textoOriginal.textContent;

    // Agregar el símbolo "+" al texto
    textoActual += '+';

    // Actualizar el texto en el elemento
    textoOriginal.textContent = textoActual;
}

// Agregar un evento de clic al botón
agregarButton.addEventListener('click', agregarSimbolo);
