const endingCry = "https://i.pinimg.com/originals/e2/08/95/e208950e412f5c9b9a90a4fb50ef51cc.jpg";
const endingGhost = "https://custom-progress-bar.com/cdn/images/95/pixel-ghost-custom-progress-bar-m.png";
const endingFire = "https://preview.redd.it/this-is-fine-pixelart-versi%C3%B3n-artist-me-v0-bhpx9mpaowrb1.png?width=640&crop=smart&auto=webp&s=aa0847aaf28b8529b9f919bc0a9ebc9fcf08be59";
const candidates = document.getElementById("candidates");
const anthony = document.getElementById("Anthony");
const ghostkid = document.getElementById("Ghostkid");
const zoe = document.getElementById("Zoe");
const linkDate = document.getElementById("linkDate");

candidates.addEventListener("mouseover", function(e){
    if(e.target.classList.contains("dating")){
    e.target.classList.add("resaltado-pastel");
    }
    if(e.target.classList.contains("deleting")){
        e.target.classList.add("resaltado-agro");
    }
});
candidates.addEventListener("mouseout", function(e){
    e.target.classList.remove("resaltado-pastel");
    e.target.classList.remove("resaltado-agro");
});

candidates.addEventListener("click", function(e){
    console.log(e.target.id);
    console.log(e.target.parentElement);
    console.log(e.target.parentElement.id);
    if(e.target.classList.contains("dating")){
        switch (e.target.id) {
            case 'anthony':
                linkDate.textContent = "Prepare to your date with " + e.target.parentElement.id + "!";
                break;
            case 'ghostkid':
                linkDate.textContent = "Prepare to your date with " + e.target.id + "!";
                break;
            case 'zoe':  
                linkDate.textContent = "Prepare to your date with " + e.target.id + "!";
                break;
            default:
                console.log("error en el switch dating");
                break;
        }
    }
    if(e.target.classList.contains("deleting")){
        switch (e.target.id) {
            case 'anthony':
                linkDate.textContent = "Anthony has left the room pissed off.";
                e.target.classList.add("hidden");
                break;
            case 'ghostkid':
                linkDate.textContent = "Ghostkid has left the room pissed off.";
                e.target.classList.add("hidden");
                break;
            case 'zoe':
                linkDate.textContent = "Zoe left has the room pissed off.";
                e.target.classList.add("hidden");
                break;
            default:
                break;
        }
    }
});
        //goes to #chat and the thumbnail changes and also the linkDate?



function del(e){
    e.target.parentElement.classList.add("delete");
    setTimeout(() => {
        alert(e.target.parentElement.id + " left the room pissed off.");
    }, 100);
}


        // Agrega un manejador de eventos de clic a la lista
        lista.addEventListener("click", function(event) {
            // Evita que el evento de clic se propague al párrafo
            event.stopPropagation();

            // Obtiene el elemento de la lista en el que se hizo clic
            const elementoClicado = event.target;

            // Muestra el mensaje en el párrafo
            mensaje.textContent = "Hiciste clic en el elemento: " + elementoClicado.textContent;

            // Muestra un mensaje de alerta
            alert("Hiciste clic en la lista");
        });
// let mychat = new FakeChat('#mychat', {
//     messages: [
//         {
//             text: 'Hello my friend!✌',
//             timer: 0,
//         },
//         {
//             text: 'Looking for a plugin that simulates chat?',
//             timer: 3000,
//         },
//         {
//             text: 'You found it! - <b>Fake-chat.js</b>',
//             timer: 5000,
//         },
//     ],
//     visible: true,
//     adding: 'beforeend',
//     theme: {
//         theme: 'timber',
//         angle: 'square',
//     },
//     animation: {
//         class: 'animation_class',
//         function: 'animation_func',
//     }
// });

//*keydown keyup.
let playPauseBtn = document.getElementById('play-pause-btn');
let mLofly = document.getElementById('m-lofly');

function toggleMusic() {
    if (mLofly.paused) {
        mLofly.play();
        playPauseBtn.innerHTML = '<span id="pause-emoji">▐▐</span><span id="pause-text">PAUSE</span>';
    } else {
        mLofly.pause();
        playPauseBtn.innerHTML = '<span id="play-emoji">▶</span><span id="play-text">PLAY</span>';
    }
}

playPauseBtn.addEventListener('click', toggleMusic);

function startMusic() {
    toggleMusic();
    playPauseBtn.style.display = 'inline-flex';
}

function toWhite() {
    setTimeout(function () {
        let titulo = document.getElementsByClassName("titulo");
        let coming = document.getElementById("coming");
        titulo[0].style.color = "white";
        startMusic();
        coming.style.display = "inherit";
    }, 850);
}

