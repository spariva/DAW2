const nombre = document.getElementById("nombre");
const apellido = document.getElementById("apellido");   
//const enviar = document.getElementsById("enviar");


enviar.addEventListener("click", () => {
    let nombreUri = encodeURIComponent(nombre.value);
    let apellidoUri = encodeURIComponent(apellido.value);

    window.location.href = "tarjeta.html?nombre=" + nombreUri + "&apellido=" +
        apellidoUri;
});


