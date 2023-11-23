//me aseguro que todo el documento se haya cargado

//! No funciona  =( en la línea 27 da error el eventListener que inicia todo el juego. 
//? En caso de funcionar el resto, lo que me faltaría es meter la secuencia de forma aleatoria en la función generateGame()

document.addEventListener('DOMContentLoaded', function () {
//Selecciono mis elementos del DOM
    //const board = document.getElementById("board");
    const startGameBtn = document.getElementsByClassName("button");
    const redS = document.getElementById("r");
    const greenS = document.getElementById("g");
    const blueS = document.getElementById("b");
    const yellowS = document.getElementById("y");
    const counter = document.getElementById("counter");
    const sequence = "";
    const actualSequence = "";

    //para acceder a si el juego ha empezado y número de aciertos, y número total de la secuencia
    //termino el juego una vez el totalSpheres == totalSequence,
    //haciéndolo así luego podría poner niveles de dificultad que cambiasen el totalSequence.
    const state = {
        gameStarted: false,
        totalSequence: 5,
        totalSpheres: 0,
        loop: null
    }

//Añado listeners a cada elemento.
    startGameBtn.addEventListener('click', startGame);
    //las esferas llaman a checkSequence y las paso como event.
    redS.addEventListener('click', checkSequence(sphere));
    greenS.addEventListener('click', checkSequence(sphere));
    blueS.addEventListener('click', checkSequence(sphere));
    yellowS.addEventListener('click', checkSequence(sphere));


//Función que inicia el juego, que llamaría a generar juego que haría una secuencia random.
    function startGame() {
        state.gameStarted = true;
        //randomiza la sequence
        generateGame();
        //va generando la sequence de squares, mientras hayas acertado.
        simonSays();

    }

    function simonSays(){
        //cada 3 segundos se activa el intervalo, comprueba si la esfera clickada es correcta
        //si lo es, suma un acierto y se reinicia la secuencia
        if(state.gameStarted == false){
            console.log("problema con el state.gameStarted");
        }
        state.loop = setInterval(() => {
            //para no hacer spaguetti if else digo que si la checkSequence returnea false, llama a derrota y termina el juego.
            if(!checkSequence){
                clearInterval(state.loop);
                lose();
            }
            //recorro la sequence para ver a que esfera toca ponerle la clase square.
            for (let i = 0; i < sequence.length; i++) {
                //voy guardando un nuevo array de la sequence actual
                actualSequence = actualSequence.push(sequence[i]);
                    //reccorro la sequence actual para ir en el orden poniendo a cada una la clase square.
                    for (let j = 0; j < actualSequence.length; j++) {
                        //con un switch compruebo uno a uno de la sequence actual cuál es, y según ello le modifico la clase.
                        switch (actualSequence[j]) {
                            case "r":
                                redS.classList.toggle('square');
                                //Para que no le deje cuadrado después de un segundo.
                                setTimeout(redS.classList.remove('square'), 1000);
                                break;
                            case "g":
                                greenS.classList.toggle('square');
                                setTimeout(greenS.classList.remove('square'), 1000);
                                break;
                            case "b":
                                blueS.classList.toggle('square');
                                setTimeout(blueS.classList.remove('square'), 1000);
                                break;
                            case "y":
                                yellowS.classList.toggle('square');
                                setTimeout(yellowS.classList.remove('square'), 1000);
                                break;
                            default:
                                console.log("error en el switch del simonSays()");
                                break;
                        }
                    }
            }
            state.totalSpheres ++;
            counter.innerText = `${state.totalSpheres} aciertos`;
        }, 3000);
    }

    function checkSequence(sphereClickada){
        //empieza por ver si no has terminado ya la sequence
        if (!state.totalSpheres < state.totalSequence) {
            victory();
        }
        
        //accedo al último valor de la actualSequence y compruebo según sea el caso. 
        //si aciertas devuelve true.
        switch (actualSequence[actualSequence.length - 1]) {
            case "r":
                if(sphereClickada.target.id == "r"){
                    return true;
                }
                break;
            case "g":
                if(sphereClickada.target.id == "g"){
                    return true;
                }
                break;
            case "b":
                if(sphereClickada.target.id == "b"){
                    return true;
                }
                break;
            case "y":
                if(sphereClickada.target.id == "y"){
                    return true;
                }
                break;
            default:
                return false;
                console.log("error en el switch del checkSequence()");
                break;
        }

    }

//De momento voy a poner a capón la secuencia para probarlo.
    function generateGame(){
        sequence = ["r", "g", "b", "y", "r"];
        return sequence;
    }

//al perder sale un mensaje y te invita a darle al botón para reiniciar los parámetros y el juego
    function lose(){
        state.gameStarted = false;
        counter.style.color = "red";
        counter.textContent = `Acertaste ${state.totalSpheres} pero te has equivocado =( Pulsa start, para reiniciar`
    }

    //al ganar sale un mensaje y te invita a darle al botón para reiniciar los parámetros y el juego
    function victory(){
        state.gameStarted = false;
        counter.style.color = "green";
        counter.textContent = `Acertaste ${state.totalSpheres} ganaste! Pulsa start, para reiniciar`
    }

// //Como en mi juego, añado un eventListener al board, y si contiene la clase sphere,
// //llama a la función que comprueba si es la secuencia correcta.
//     function attachEventListeners(){
//            board.addEventListener('click', function(event) {
//         if (event.target.classList.contains('sphere')){

//         }
//     }); 
//     }

});