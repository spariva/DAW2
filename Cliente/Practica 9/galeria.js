//lo ideal sería una sola función, vamos a ello.
var listas =["https://open.spotify.com/embed/playlist/6T442Dd7j4FYpP7rtCh4Mp?utm_source=generator","https://open.spotify.com/embed/playlist/6hW4rvfy42xQb0I8A99ysJ?utm_source=generator","https://open.spotify.com/embed/playlist/6lHivMtxlldZdqEvpwGRxZ?utm_source=generator"];
const carouselActive = document.getElementsByClassName('active');
const carousel0 = document.getElementById('primero');
const carousel1 = document.getElementById('segundo');
const carousel2 = document.getElementById('tercero');
const playlist = document.getElementById('playlista');

console.log(playlist.src); 
function cambiarImagen(indice) {
    switch (indice) {
        case 0:
            carousel0.classList.add('active');
            playlist.src = listas[0];
            break;
        case 1:
            carousel1.classList.add('active');
            playlist.src = listas[1];
            break;
        case 2:
            carousel2.classList.add('active');  
            playlist.src = listas[2];  
            break;
        default:
            alert("Error");
            break;
    }
}