window.onload = function () {
    const nombreTarjeta = document.getElementById("nombreTarjeta");
    const apellidoTarjeta = document.getElementById("apellidoTarjeta");

    let parametros = new URLSearchParams(window.location.search);
    nombreTarjeta.textContent = decodeURIComponent(parametros.get('nombre'));
    apellidoTarjeta.textContent = decodeURIComponent(parametros.get('apellido'));
}
