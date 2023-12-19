
var puntos = document.getElementById("puntos");  // coge el hueco donde saldrán los puntos 
var contador = 0;         // Contador de puntos inici0
puntos.textContent = contador;    // Muestra en el html los puntos acumulados

function sumarPuntos(masPuntos) {  // Funcion que suma los puntos al contador
    contador = contador + masPuntos;
    puntos.textContent = contador;
}


//Variables globales
var tiempoJuego = 120000; //2 minutos
var temporizador;
// var dificultadActual; //esta variable la necesitamos para rellamar a los topos
var juegoEnCurso = false;
const TAMAÑO_FACIL = 300;
const TAMAÑO_NORMAL = 200;
const TAMAÑO_DIFICIL = 100;
var puntuacion = 0;
var arrayTopos = ["img/topo2.png", "img/topo1.png", "img/topo3.png", "img/topo4.png"];
var arrayToposFeos = ["img/topoFeo1.png", "img/topoFeo2.png", "img/topoFeo3.png", "img/topoFeo4.png"];


// Iniciar Juego

function iniciarJuego() {
  if (!juegoEnCurso) {
    juegoEnCurso = true;
    //deshabilito los botones mientras que el juego está en curso menos el botón detener juego
    var botones = document.getElementsByTagName("button");
    for (var i = 0; i < botones.length; i++) {
      if (botones[i] !== botonDetenerJuego) {
        botones[i].disabled = true;
      }
    }

    //esto me lo ha chivado paco para que simule un temporizador porq no lo conseguía, llama a la función actualizar temposizador para que vaya saliendo
    var tiempoInicio = Date.now();
    temporizador = setInterval(function () {
      var tiempoTranscurrido = Date.now() - tiempoInicio;
      var tiempoRestante = tiempoJuego - tiempoTranscurrido;
      if (tiempoRestante <= 0) {
        detenerJuego();
      } else {
        actualizarTemporizador(tiempoRestante);
      }
    }, 1000);

    actualizarTemporizador(tiempoJuego);
  }
}

function actualizarTemporizador(tiempoRestante) {
  var minutos = Math.floor(tiempoRestante / 60000);
  var segundos = Math.floor((tiempoRestante % 60000) / 1000);
  var tiempoMostrado = minutos + ":" + (segundos < 10 ? "0" : "") + segundos;
  document.getElementById("tiempoRestante").textContent = tiempoMostrado;
}

// Cojo todos los botones para hacer un listener
var botones = document.getElementsByTagName("button");
// Agrega un event listener a cada botón, con esto se queda con el value de cada uno para que identifique qué nivel es e idenfica cuál ha sido pulsado
for (var i = 0; i < botones.length; i++) {
  botones[i].addEventListener("click", function (event) {
    seleccionJuego(event.target.value);
  });
}

// como el ha oído una dificultad y llama a la función con la dificultad específica, se generan imágenes de un tipo u otro y se inicia el juego que básicamente inicia el temporizador y deshabilita botones
function seleccionJuego(dificultad) {
  switch (dificultad) {
    case "facil":
      generarImagenes("facil");
      iniciarJuego();
      break;
    case "normal":
      generarImagenes("normal");
      iniciarJuego();
      break;
    case "dificil":
      generarImagenes("dificil");
      iniciarJuego();
      break;
  }
}

function generarImagenes(dificultad) {
  // dificultadActual = dificultad;
  clearInterval(temporizador); // Detiene el temporizador anterior si existe
  switch (dificultad) {
    case "facil":
      var dificultadIntervalos = 2000;
      break;
    case "normal":
      var dificultadIntervalos = 1000;
      break;
    case "dificil":
      var dificultadIntervalos = 500;
      break;

  }
 //genera la aparición de imágenes con una velocidad diferente, tiene en cuenta si se le ha dado al botón detener
  temporizador = setInterval(function () {
    if(juegoEnCurso){
    creadorImagenes(dificultad);
    }
  }, dificultadIntervalos); // Genera imágenes cada 2 segundos

}


function creadorImagenes(dificultad) {
  // Saber el tamaño del tablero:
  var div = document.getElementById("juego");
  var divAncho = div.offsetWidth;
  var divAlto = div.offsetHeight;
  // para las imágenes
  var posicionX;
  var posicionY;
  var imgElement = creadorDeTopos(); //llamamos al creador de topos para que lo haga de manera aleatoria
  imgElement.style.position = "absolute";

  switch (dificultad) {
    case "facil":
      // Configuración para dificultad "facil"
      imgElement.style.width = TAMAÑO_FACIL + "px";
      imgElement.style.height = TAMAÑO_FACIL + "px";
      posicionX = Math.random() * (divAncho - TAMAÑO_FACIL);
      posicionY = Math.random() * (divAlto - TAMAÑO_FACIL);
      break;
    case "normal":
      // Configuración para dificultad "normal"
      imgElement.style.width = TAMAÑO_NORMAL + "px";
      imgElement.style.height = TAMAÑO_NORMAL + "px";
      posicionX = Math.random() * (divAncho - TAMAÑO_NORMAL);
      posicionY = Math.random() * (divAlto - TAMAÑO_NORMAL);
      break;
    case "dificil":
      // Configuración para dificultad "dificil"
      imgElement.style.width = TAMAÑO_DIFICIL + "px";
      imgElement.style.height = TAMAÑO_DIFICIL + "px";
      posicionX = Math.random() * (divAncho - TAMAÑO_DIFICIL);
      posicionY = Math.random() * (divAlto - TAMAÑO_DIFICIL);
      break;
  }

  imgElement.style.top = posicionY + "px";
  imgElement.style.left = posicionX + "px";
  div.appendChild(imgElement);

  // Elimina la imagen después de 2 segundos
  setTimeout(function () {
    div.removeChild(imgElement);
  }, 2000);
}



function creadorDeTopos() { //queremos que nos genere topos de diferentes tipos, ojo están puestas mazas como feos
  //calcular la aleatoriedad
  var esTopoMono = Math.random() < 0.5;
  //elegimos la imagen aleatoria
  var imagenes = esTopoMono ? arrayTopos : arrayToposFeos; //asignamos según la aleatoriedad en imagenes si será un array u otro
  var imagen = imagenes[Math.floor(Math.random() * imagenes.length)]; // cogemos una imagen del array aleatorio
  var imgElement = document.createElement("img"); //creamos el elemento imagen
  imgElement.src = imagen; //asignamos la imagen generada a ese elemento
  imgElement.setAttribute("value", esTopoMono ? "bonito" : "feo"); // en función de si salió bonito o feo le asignamos un value al elemento para después poder asignar los puntos
  imgElement.onclick = function(){  //Se añade a las imagenes un onclick, para que cuando la pulses sume o reste puntos
    var valor = imgElement.getAttribute("value"); 
    reproducirSonidoTopo();
    if (valor == "feo") {      // Si el topo es feo suma
      sumarPuntos(100);
    }else{                      // Si el topo es bonito resta
      sumarPuntos(-75);
    }
    var div = document.getElementById("juego");  // Para que al pulsar en el topo se borre el topo
    div.removeChild(imgElement);
  }
  return imgElement; //devuelve la imagen generada
}
//poner sonido cuando pulsemos topo
function reproducirSonidoTopo() {
  var sonidoTopo = document.getElementById("sonidoTopo");
  sonidoTopo.play();
}


function finDeJuego() {
  clearInterval(temporizador);
  juegoActivo = false;
  var botones = document.getElementsByTagName("button");
  for (var i = 0; i < botones.length; i++) {
    botones[i].disabled = false;
  }

  actualizarTemporizador(0); // Actualizar el temporizador a 0 cuando se detiene el juego
  alert("Fin del juego. Tu puntuación final es: " + contador);
  contador = 0; //Reiniciamos contador
}

//Detener el juego en cualquier momento.
var botonDetenerJuego = document.getElementById("detenerJuego");
botonDetenerJuego.addEventListener("click", detenerJuego);

function detenerJuego() {
  clearInterval(temporizador);
  juegoEnCurso = false;
  var botones = document.getElementsByTagName("button");
  for (var i = 0; i < botones.length; i++) {
    botones[i].disabled = false;
  }
  actualizarTemporizador(0); // Actualizar el temporizador a 0 cuando se detiene el juego
  //alert("Juego detenido. Tu puntuación final es: " + contador);
  Swal.fire({   // PopUp con la info de finalizada partida
    title: 'Juego terminado',
    html: 'Tu puntuación es: ' + contador,
    imageUrl: 'img/topoFinal.jpg',  
    imageWidth: 300,  // 
    imageHeight: 250,  //
    imageAlt: 'img/topoFinal.jpg',
    showCancelButton: false,
    confirmButtonText: 'Aceptar',
    reverseButtons: true,
    customClass: {
      confirmButton: 'swal-confirm-button',
    },
  }).then(() => {
    location.reload();
  });
}

