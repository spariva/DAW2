const endingCry = "https://i.pinimg.com/originals/e2/08/95/e208950e412f5c9b9a90a4fb50ef51cc.jpg";
const endingGhost = "https://custom-progress-bar.com/cdn/images/95/pixel-ghost-custom-progress-bar-m.png";
const endingFire = "https://preview.redd.it/this-is-fine-pixelart-versi%C3%B3n-artist-me-v0-bhpx9mpaowrb1.png?width=640&crop=smart&auto=webp&s=aa0847aaf28b8529b9f919bc0a9ebc9fcf08be59";
const anthony = document.getElementById("Anthony");
const ghostkid = document.getElementById("Ghostkid");
const zoe = document.getElementById("Zoe");
const message = document.getElementById("message");
const dating = document.getElementsByClassName("dating");
const deleting = document.getElementsByClassName("deleting");

dating.addEventListener("mouseover", function(e){
    e.target.classList.add("resaltado-pastel");
});
dating.addEventListener("mouseout", function(e){
    e.target.classList.remove("resaltado-pastel");
});
deleting.addEventListener("mouseover", function(e){
    e.target.classList.add("resaltado-agro");
});
deleting.addEventListener("mouseout", function(e){
    e.target.classList.remove("resaltado-agro");
});



function del(e){
    e.target.parentElement.classList.add("delete");
    setTimeout(() => {
        alert(e.target.parentElement.id + " left the room pissed off.");
    }, 500);
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