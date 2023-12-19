console.log("Scripts ok");

//! Panel del juego y array con las cartas del juego y marcos
const panel = document.getElementById("panelJuego");
const listaCartas = document.querySelectorAll(".carta");
const listaMarcos = document.querySelectorAll(".marco");
//! Constante con el total de cartas que deben coincidir
const VICTORIA = 16;
//! El resto de elementos del documento
const menu = document.getElementById("menu");
const inicio = document.getElementById("iniciar");
const parrafoContador = document.getElementById("parrafoContador");
const parrafoTemporizador = document.getElementById("parrafoTemporizador");
const spanTemporizador = document.getElementById("spanTemporizador");
const modoJuegoPuntos = document.getElementById("botonPuntos");
const botonAbandonar = document.getElementById("abandonar");
const modoJuegoTiempo = document.getElementById("botonTiempo");
const parrafoResultado = document.getElementById("parrafoResultado");

//! Variables para comparar las cartas y de comprobación
let cartasIguales = 0;
let cartaUno = "";
let cartaDos = "";
let elegidasDosCartas = false;
let contadorParesRotados = 0;


//!  Variables y recursos de audio
var audioFallo = new Audio('./media/mixkit-explainer-video-game-alert-sweep-236.wav');
var audioAcierto = new Audio('./media/mixkit-unlock-game-notification-253.wav');
audioAcierto.volume = 0.5;
var audioVictoria = new Audio('./media/tomp3.cc-Victory-Sound.mp3');
audioVictoria.volume = 0.5;
var audioDerrota = new Audio('./media/tomp3.cc-Lose-sound-effect.mp3');
audioDerrota.volume = 0.5;
var audioFondoMenu = new Audio('./media/tomp3.cc-no-copyright-music-In-Dreamland.mp3');
audioFondoMenu.volume = 0.1;
var audioFondoJuego = new Audio('./media/Cats.mp3');
audioFondoJuego.volume = 0.1;

//! For each para todas las cartas
listaCartas.forEach( function (elementoCarta)  { 
    // Añadimos evento clic a todos los elementos .carta
    elementoCarta.addEventListener("click", rotarCarta);
    elementoCarta.classList.add("rotar");
});

//! Funcion para rotar las cartas 
function rotarCarta(evento) { 
    // Almacenamos la carta pulsada
    let cartaPulsada = evento.target;

    // Si la carta pulsada es distinta a cartaUno y el boolean false
    if(cartaPulsada !== cartaUno && !elegidasDosCartas){
        // Añade a la carta pulsada una clase 
        cartaPulsada.classList.add("rotar");
        // Si cartaUno tiene cadena vacia 
        if(cartaUno == ""){
            // Devuelve la cartaUno con el valor de cartaPulsada
            return cartaUno = cartaPulsada;
        }
        // Si no, ejecuta las siguientes lineas
        cartaDos = cartaPulsada;
        elegidasDosCartas = true;
        let cartaUnoImg = cartaUno.querySelector(".gatoImagen").src;
        let cartaDosImg = cartaDos.querySelector(".gatoImagen").src;
        comprobarCartas(cartaUnoImg, cartaDosImg);
    }
}

//! Funcion para comparar las cartas 
function comprobarCartas(img1, img2) {
    // Si dos cartas/imágenes son iguales
    if(img1 === img2){ 
        // Incremento de las variables para parejas rotadas y cartas iguales
        cartasIguales++;
        contadorParesRotados++;
        parrafoContador.textContent = "Parejas volteadas: " +contadorParesRotados;
        // Si cartasIguales es 8, significa que encontro todas las parejas
        if(cartasIguales == VICTORIA){
            // Funcion victoria = juego ganado/acabado
            victoria();
        }
        // Reproduce audio acierto, pausado y reinciado al pasar 0.6 segundo
        audioAcierto.play();
        setTimeout(() => {
            audioAcierto.pause();
            audioAcierto.currentTime = 0;
          }, 600);
        //Mostrar el marco cuando el usuario acierta una pareja
        cartaUno.querySelector(".marco").style.display = "block";
        cartaDos.querySelector(".marco").style.display = "block";
        //Remover la escucha de evento al acertar una pareja
        cartaUno.removeEventListener("click", rotarCarta);
        cartaDos.removeEventListener("click", rotarCarta);
        // Variables restablecidas y retornado boolean 
        cartaUno = "";
        cartaDos = "";
        elegidasDosCartas = false;
    }

    //Si dos cartas/imágenes no coinciden
    if(img1 !== img2){
        // Incremento de variable parejas rotadas
        contadorParesRotados++;
        parrafoContador.textContent = "Parejas volteadas: " +contadorParesRotados;
        // Funcion con retraso que añade la misma clase a ambas cartas y 
        //  reproduce audio fallo despues de 0.4 segundos
        setTimeout( function() {
            cartaUno.classList.add("agitar");
            cartaDos.classList.add("agitar");
            audioFallo.play();
        }, 400);
        // Funcion con retraso para retirar las clases y
        //   restablecer variables comprobación de cartas
        setTimeout( function() {
            cartaUno.classList.remove("agitar","rotar");
            cartaDos.classList.remove("agitar", "rotar");
            cartaUno = ""; 
            cartaDos = "";
            elegidasDosCartas = false;
        }, 800);
    }
    
}


//! Funcion para mezclar las cartas - Reiniciar el juego
function mezclarCartas() {
    //Funcion para restablecer variables de control
    resetearJuego();

    // Array con 16 posiciones, 0-15, para cada número de imagen
    // let arrayNumeroCartas = [1, 2, 3, 4, 5, 6, 7, 8, 1, 2, 3, 4, 5, 6, 7, 8];
    // Array con 32 posiciones, 0-31, para cada número de imagen
    let arrayNumeroCartas = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16];
    // Ordenados aleatoriamente con operador ternario
    arrayNumeroCartas.sort(() => Math.random() > 0.5 ? 1 : -1); // sorting array randomly
    
    // For each para el array de las cartas. Incluido un parametro para el indice
    listaCartas.forEach( function(elementoCarta, indice) { 
        elementoCarta.classList.remove("rotar");
        // Elemento img con clase .gatoImagen modificado su ruta src con el indice
        let cartaImg = elementoCarta.querySelector(".gatoImagen");
        cartaImg.src= `./media/michi${arrayNumeroCartas[indice]}.jpg`;
        // Damos de nuevo a la carta escucha de evento click y funcion robarCarta
        elementoCarta.addEventListener("click", rotarCarta);
    });
    
}

//! Resetear valores del juego
function resetearJuego() {
    cartasIguales = 0;
    cartaUno = "";
    cartaDos = "";
    elegidasDosCartas = false;
    contadorParesRotados = 0;
    parrafoContador.textContent = "Parejas volteadas: " +contadorParesRotados;
    segundosReloj = MINUTO;
    spanTemporizador.textContent = segundosReloj;
    spanTemporizador.style.color = "white";
    listaMarcos.forEach( function (elementoMarco) { 
        elementoMarco.style.display = "none";
    });
}


//! Mostrar elementos
function mostrarElementos(elementos) {
    elementos.forEach( function(elemento) {
        elemento.style.display = "block";
    });
}

//! Ocultar elemento
function ocultarElementos(elementos) {
    elementos.forEach( function(elemento) {
        elemento.style.display = "none";
    });
}


//! Iniciar escoger modo de juego
function comenzarJuego() {
    audioFondoMenu.play();
    menu.style.display = "flex";
    ocultarElementos([inicio]);
    
}

//! Comenzar juego por vueltas
function comenzarJuegoPuntos() {
    mezclarCartas();
    audioFondoMenu.pause();
    audioFondoJuego.play();
    audioFondoJuego.loop = true;
    ocultarElementos([modoJuegoPuntos, modoJuegoTiempo]);
    mostrarElementos([panel, parrafoContador, botonAbandonar]);
}

//! Abandonar juego
function abandonar() {
    audioFondoJuego.pause();
    audioFondoMenu.play();
    audioFondoJuego.currentTime = 0;
    mezclarCartas();
    mostrarElementos([modoJuegoPuntos, modoJuegoTiempo]);
    ocultarElementos([botonAbandonar, parrafoContador, panel, parrafoTemporizador, parrafoResultado]);
    clearInterval(tiempoJuego);
}

//! Comenzar juego por tiempo
function juegoPorTiempo() {
    comenzarJuegoPuntos();
    juegoTemporizado();
    mostrarElementos([parrafoTemporizador]);
    ocultarElementos([parrafoContador, modoJuegoTiempo]);
}


//! Modo de juego por tiempo
// Variables de control para el juego juego por tiempo
const MINUTO = 60;
const DIEZ = 10;
let segundosReloj = MINUTO;
let tiempoJuego = null;
// Evita que se inicien varios contadores al abandonar y jugar el juego repetidamente
// También servira para reconocer que modo de juego es en la victoria
let juegoTiempoActivo = false;

// Función para manejar el juego por tiempo
function juegoTemporizado() {
    juegoTiempoActivo = true;
    function restarReloj() {
        // Resta 1 a segundosReloj y actualizamos el elemento spanTemporizador
        segundosReloj--;
        spanTemporizador.textContent = segundosReloj;
        // Añadir estilo rojo al contador al alcanzar los diez segundos
        if(segundosReloj <= DIEZ){
            spanTemporizador.style.color = "red";          
        }
        if(segundosReloj == 0){
            audioFondoJuego.pause();
            audioDerrota.play();
            //impedir girar cartas al perder
            elegidasDosCartas = true;
            // Termina el intervado al perder
            clearInterval(tiempoJuego);
            // Muestra resultado al jugador
            mostrarElementos([parrafoResultado]);
            parrafoResultado.textContent = "¡Ha perdido!";
        }
    }
    // Variable con el intervalo que ejecutará la función restarReloj cada segundo
    tiempoJuego = setInterval(restarReloj, 1000);
    
}

//! Puntuación de juego por vueltas
// Constantes con las puntuaciones del juego por vueltas
const PERFECTA = 16;
const BUENA = 30;
const MEDIA = 40;
const MALA = 41;
// Función encargada de los resultados del juego por vueltas
function puntuacionJuegoVueltas() {
    if(contadorParesRotados == PERFECTA){
        parrafoResultado.textContent = "Puntuación: ¡Perfecta!";
    } else if (contadorParesRotados <= BUENA){
        parrafoResultado.textContent = "Puntuación: Buena";
    } else if (contadorParesRotados <= MEDIA){
        parrafoResultado.textContent = "Puntuación: Media";
    } else if (contadorParesRotados >= MALA){
        parrafoResultado.textContent = "Puntuación: Mala";
    }
}

//! Puntuación de juego por tiempo
// Constantes con las metas de tiempo 
const PERFECTA_TIEMPO = 50;
const BUENA_TIEMPO = 30;
const MEDIA_TIEMPO = 11;
const MALA_TIEMPO = 10;
function puntuacionJuegoTiempo() {
    //Detener el intervalo que resta segundos al minuto de juego cuando gana
    clearInterval(tiempoJuego);
    if(segundosReloj >= PERFECTA_TIEMPO){
        parrafoResultado.textContent = "Tiempo: ¡Perfecto!";
    } else if (segundosReloj >= BUENA_TIEMPO){
        parrafoResultado.textContent = "Tiempo: Rápido";
    } else if (segundosReloj >= MEDIA_TIEMPO){
        parrafoResultado.textContent = "Tiempo: Medio";
    } else if (segundosReloj <= MALA_TIEMPO){
        parrafoResultado.textContent = "Tiempo: Lento";
    }
}

//! Victoria juego por vueltas y por tiempo
function victoria() {
    audioFondoJuego.pause();
    audioVictoria.play();
    
    //Boleano para identificar el modo de juego
    if (juegoTiempoActivo) {
        mostrarElementos([parrafoResultado]);
        puntuacionJuegoTiempo();
        juegoTiempoActivo = false;
        segundosReloj = MINUTO;
    } else if (!juegoTiempoActivo){
        mostrarElementos([parrafoResultado]);
        puntuacionJuegoVueltas();
    }
}

// Intercambiar la imagen del logo al pasar el raton sobre comenzar juego
const logo = document.getElementById("titulo__logo");
inicio.addEventListener("mouseenter", function () {
    logo.src= "./media/logoActivo.png";
});
inicio.addEventListener("mouseout", function () {
    logo.src= "./media/logo.png";
})
