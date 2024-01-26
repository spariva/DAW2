const contraste = document.getElementById('contraste');
const nocontraste = document.getElementById('nocontraste');
const colorFondo = elemento.style.backgroundColor;
const colorTexto = elemento.style.color;

document.addEventListener('DOMContentLoaded', function () {
    verificarContraste(contraste);
    verificarContraste(nocontraste);
});


function verificarContraste(idElemento) {
    // Aquí puedes extraer los elementos sobre los que se va a comprobar su contraste, ¿que propiedades va a
    // sacar? Recuerda que es lo que compara la relación de contraste.
    //     ¿Cómo calcular el contraste?
    // OBTENER CONTRASTE <- OBTENER LUMINANCIA <- OBTENER RGBA
    // Necesitas calcular la luminancia de cada color usando lo siguiente: (Math.max(luminancia1, luminancia2) +
    // 0.05) / (Math.min(luminancia1, luminancia2) + 0.05);

    // colorFondo = idElemento.style.backgroundColor;
    // colorTexto = idElemento.style.color;


    colorFondo = getComputedStyle(idElemento).backgroundColor;
    colorTexto = getComputedStyle(idElemento).color;
    var luminancia1 = calcularLuminancia(colorFondo);
    var luminancia2 = calcularLuminancia(colorTexto);
    var contraste = (Math.max(luminancia1, luminancia2) + 0.05) / (Math.min(luminancia1, luminancia2) + 0.05);
    if (contraste >= 4.5) {
        document.getElementById(idElemento).innerText = "Muy bien";
    } else {
        document.getElementById(idElemento).innerText = "Mal =(";
    }
}

function calcularLuminancia(color) {
    const rgba = obtenerRGBA(color);
    const correccionGamma = (valor) => {
        valor /= 255;
        return valor <= 0.03928 ? valor / 12.92 : Math.pow((valor + 0.055) / 1.055, 2.4);
    };

    const r = correccionGamma(rgba[0]);
    const g = correccionGamma(rgba[1]);
    const b = correccionGamma(rgba[2]);
    const luminancia = 0.2126 * r + 0.7152 * g + 0.0722 * b;
    return luminancia * 255;
}

function obtenerRGBA(color) {
    const canvas = document.createElement('canvas');
    canvas.width = 1;
    canvas.height = 1;

    const contexto = canvas.getContext('2d');
    contexto.fillStyle = color;
    contexto.fillRect(0, 0, 1, 1);

    const datos = contexto.getImageData(0, 0, 1, 1).data;
    return [datos[0], datos[1], datos[2], datos[3] / 255];
}