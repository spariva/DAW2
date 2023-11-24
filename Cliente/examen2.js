//me aseguro que todo el documento se haya cargado
document.addEventListener('DOMContentLoaded', function () {
    //Selecciono mis elementos del DOM
    //const board = document.getElementById("board");
    const startGameBtn = document.getElementsByClassName("button")[0];
    const redS = document.getElementById("r");
    const greenS = document.getElementById("g");
    const blueS = document.getElementById("b");
    const yellowS = document.getElementById("y");
    const counter = document.getElementById("counter");
    var sequence = "";
    var actualSequence = [];

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
    redS.addEventListener('click', function (event) {
        checkSequence(event);
    });
    greenS.addEventListener('click', function (event) {
        checkSequence(event);
    });
    blueS.addEventListener('click', function (event) {
        checkSequence(event);
    });
    yellowS.addEventListener('click', function (event) {
        checkSequence(event);
    });


    //Función que inicia el juego, que llamaría a generar juego que haría una secuencia random.
    function startGame() {
        state.gameStarted = true;
        //randomiza la sequence
        generateGame();
        //va generando la sequence de squares, mientras hayas acertado.
        simonSays();

    }

    function simonSays() {
        if (state.gameStarted == false) {
            console.log("problema con el state.gameStarted");
        }
        state.loop = setInterval(() => {
            if (!checkSequence) {
                clearInterval(state.loop);
                lose();
            }
            for (let i = 0; i < sequence.length; i++) {
                console.log("Bucle Externo Iteración: " + i + " secuencia[i]:  " + sequence[i] + " longitud Actualsequence : " + actualSequence.length);
                console.log(actualSequence);
                actualSequence.push(sequence[i]);
                actualSequence.forEach(item => {
                    console.log(Array.isArray(item));
                });
                console.log(actualSequence);
                console.log("Bucle externo: aS: " + actualSequence);
                for (let j = 0; j < actualSequence.length; j++) {
                    console.log("Bucle interno: Iteración j: " + j + " aS: " + actualSequence[j]);
                    switch (actualSequence[j]) {
                        case "r":
                            console.log("switch red " + actualSequence[j] + " j: " + j + " i: " + i);
                            redS.classList.add('square');
                            console.log(redS.classList);
                            setTimeout(() => {
                                redS.classList.remove('square');
                            }, 6000);
                            break;
                        case "g":
                            console.log("switch green " + actualSequence[j] + " j: " + j + " i: " + i);
                            greenS.classList.add('square');
                            setTimeout(() => {
                                greenS.classList.remove('square');
                            }, 1000);
                            break;
                        case "b":
                            console.log("switch blue " + actualSequence[j] + " j: " + j + " i: " + i);
                            blueS.classList.add('square');
                            setTimeout(() => {
                                blueS.classList.remove('square');
                            }, 1000);
                            break;
                        case "y":
                            console.log("switch yellow " + actualSequence[j] + " j: " + j + " i: " + i);
                            yellowS.classList.add('square');
                            setTimeout(() => {
                                yellowS.classList.remove('square');
                            }, 1000);
                            break;
                        default:
                            console.log("error en el switch del simonSays()");
                            break;
                    }
                }
            }
            state.totalSpheres++;
            counter.innerText = `${state.totalSpheres} aciertos`;
        }, 13000);
    }

    function checkSequence(sphereClickada) {
        //empieza por ver si no has terminado ya la sequence
        if (state.totalSpheres >= state.totalSequence) {
            victory();
        }

        //accedo al último valor de la actualSequence y compruebo según sea el caso. 
        //si aciertas devuelve true.
        switch (actualSequence[actualSequence.length - 1]) {
            case "r":
                if (!sphereClickada.target.id == "r") {
                    lose();
                }
                break;
            case "g":
                if (!sphereClickada.target.id == "g") {
                    lose();
                }
                break;
            case "b":
                if (!sphereClickada.target.id == "b") {
                    lose();
                }
                break;
            case "y":
                if (sphereClickada.target.id == "y") {
                    lose();
                }
                break;
            default:
                console.log("error en el switch del checkSequence()");
                break;
        }

    }

    //De momento voy a poner a capón la secuencia para probarlo.
    function generateGame() {
        sequence = ["r", "g", "b", "y", "r"];
        // return sequence;
    }

    //al perder sale un mensaje y te invita a darle al botón para reiniciar los parámetros y el juego
    function lose() {
        //reseteo parámetros
        state.gameStarted = false;
        clearInterval(state.loop);
        sequence = [];
        actualSequence = [];
        counter.style.color = "red";
        counter.textContent = `Acertaste ${state.totalSpheres} pero te has equivocado =( Pulsa start, para reiniciar`
    }

    //al ganar sale un mensaje y te invita a darle al botón para reiniciar los parámetros y el juego
    function victory() {
        state.gameStarted = false;
        clearInterval(state.loop);
        sequence = [];
        actualSequence = [];
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